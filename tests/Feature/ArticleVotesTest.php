<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleVotesTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test that guest can't vote for articles.
     *
     * @return void
     */
    public function test_guests_can_not_vote_for_articles()
    {
        $article = Article::factory()->create();

        $this->post(route('articles.vote', $article->id))
            ->assertRedirect(route('login'));
    }

    /**
     * A basic feature test that authenticated user can vote for articles.
     *
     * @return void
     */
    public function test_authenticated_users_can_vote_for_articles()
    {

        $this->withExceptionHandling();

        $article = Article::factory()->create();

        $user = User::factory()->createOne();

        $this->actingAs($user)
            ->post(route('articles.vote', $article->id))
            ->assertRedirect();
    }
}
