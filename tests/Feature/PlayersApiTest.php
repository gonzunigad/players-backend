<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayersApiTest extends TestCase
{
    /** @test */
    public function assertDoesNotReturnMoreThan500()
    {
        $response = $this->json('GET', '/api/players', ['per_page' => 600]);
        $response->assertJsonCount(500, 'data');
        $response->assertStatus(200);
    }

    /** @test */
    public function itReturnTheLengthProvided()
    {
        $response = $this->json('GET', '/api/players', ['per_page' => 100]);
        $response->assertJsonCount(100, 'data');
        $response->assertStatus(200);
    }

    /** @test */
    public function itReturnsOneResultIfIdMatches()
    {
        $response = $this->json('GET', '/api/players', ['per_page' => 100, 'q' => 10]);
        $response->assertJson(['id_match' => true, 'data' => ['id' => 10]]);
    }
}
