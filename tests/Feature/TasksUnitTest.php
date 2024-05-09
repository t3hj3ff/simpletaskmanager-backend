<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class TasksUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_retrieve_all_tasks()
    {
        $user = User::factory()->create();
        Task::factory()->count(3)->create(['owner_id' => $user->id]);
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', '/api/tasks');
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
