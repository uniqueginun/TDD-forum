<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class HomepageTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    protected function visitHomePage()
    {
        return $this->get(route('welcome'));
    }

    /**
     * test there is a valid home route that redirect to welcome view.
     *
     * @return void
     */
    public function test_any_visitor_can_visit_homepage()
    {
        $this->visitHomePage()->assertStatus(Response::HTTP_OK)->assertSeeText('Ginun Forum');
    }

    /**
     * test that visitors can see ordered articles on the home page.
     * 
     * @return void
     */
    public function test_visitors_can_see_ordered_articles_on_the_home_page()
    {

        $articles = Article::factory(2)->create([
            'created_at' => $creationDateTime = now()
        ]);

        $response = $this->visitHomePage();

        $response->assertStatus(Response::HTTP_OK);

        $firstArticle = $articles->first();

        $response->assertSeeTextInOrder([
            $firstArticle->title, 
            $articles->last()->title
        ]);

        $response->assertSeeText(
            "Posted {$creationDateTime->diffForHumans()} by {$firstArticle->creator->name}"
        );        
    }

}
