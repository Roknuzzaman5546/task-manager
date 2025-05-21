<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Client;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class TaskAssignmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_assign_task_to_client()
    {
        // Create an admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create a client
        $client = Client::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
        ]);

        // Simulate admin login
        $this->actingAs($admin);

        // Send POST request to create a task
        $response = $this->post(route('tasks.store'), [
            'title' => 'Test Task',
            'description' => 'A sample task for testing.',
            'due_date' => now()->addDays(7)->format('Y-m-d'),
            'priority' => 'high',
            'client_id' => $client->id,
        ]);

        // Assert it exists in the database
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'client_id' => $client->id,
            'description' => 'A sample task for testing.',
        ]);

        // Confirm redirect or success
        $response->assertRedirect();
    }
}
