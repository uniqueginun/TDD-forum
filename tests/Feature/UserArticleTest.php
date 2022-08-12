<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserArticleTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * Test guests cannot create articles
     *
     * @return void
     */
    public function test_guests_cannot_create_articles()
    {
        $this->get(route('articles.create'))
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertRedirect(route('login'));
    }
}
