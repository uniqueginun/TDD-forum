<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_any_visitor_can_visit_homepage()
    {

        $this->withoutExceptionHandling();

        $this->get('/')->assertStatus(200)->assertSeeText('Ginun Forum');
    }

    
}
