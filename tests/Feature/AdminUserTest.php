<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected User $customer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@desighee.com',
        ]);

        $this->customer = User::factory()->create([
            'role' => 'customer',
            'name' => 'John Customer',
            'email' => 'customer@desighee.com',
        ]);
    }

    public function test_admin_can_view_users_directory(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.users.index'));

        $response->assertStatus(200);
        $response->assertSee('Registered Users Directory');
        $response->assertSee('John Customer');
    }

    public function test_admin_can_filter_users_by_search(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.users.index', ['search' => 'John']));

        $response->assertStatus(200);
        $response->assertSee('John Customer');
    }

    public function test_admin_can_delete_customer_user(): void
    {
        $response = $this->actingAs($this->admin)->delete(route('admin.users.destroy', $this->customer->id));

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', [
            'id' => $this->customer->id,
        ]);
    }

    public function test_admin_cannot_delete_self(): void
    {
        $response = $this->actingAs($this->admin)->delete(route('admin.users.destroy', $this->admin->id));

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('users', [
            'id' => $this->admin->id,
        ]);
    }
}
