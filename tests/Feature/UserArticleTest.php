<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserArticleTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * Test guests cannot visit create articles page
     *
     * @return void
     */
    public function test_guests_cannot_create_articles()
    {
        $this->get(route('articles.create'))
            ->assertStatus(Response::HTTP_FOUND)
            ->assertRedirect(route('login'));
    }

    /**
     * Test auth_users can visit create articles page
     *
     * @return void
     */
    public function test_auth_users_can_create_articles()
    {

        $this->actingAs(User::factory()->createOne())->get(route('articles.create'))
            ->assertStatus(Response::HTTP_OK)
            ->assertSeeText('Create new article')
            ->assertSeeText('Publish Article');
    }

    /**
     * Test it can validates create article fields
     * 
     * @return void
     */
    public function test_can_validate_articles_creation_fields()
    {
        $this->actingAs($user = User::factory()->createOne())
            ->post(route('articles.store'), [
                'title' => '',
                'body' => ''
            ])->assertSessionHasErrors($fields = [
                'title', 'body'
            ]);

        $this->actingAs($user)
            ->post(route('articles.store'), [
                'title' => 'my title',
                'body' => 'my body'
            ])->assertSessionDoesntHaveErrors($fields);
    }

    /**
     * Test can store articles in the database
     * 
     * @return void
     */
    public function test_can_store_articles_in_the_database()
    {

        $this->actingAs($user = User::factory()->createOne())
            ->post(route('articles.store'), [
                'title' => $title = 'my article title',
                'body' => $body = 'my article body'
            ])
            ->assertSessionHas('success', 'article created successfully');

        $this->assertDatabaseCount($table = 'articles', 1);

        $this->assertDatabaseHas($table, [
            'user_id' => $user->id,
            'title' => $title,
            'body' => $body
        ]);
    }
}
