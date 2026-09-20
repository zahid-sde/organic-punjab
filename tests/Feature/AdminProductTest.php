<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductTest extends TestCase
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
            'email' => 'customer@desighee.com',
        ]);
    }

    public function test_admin_can_access_products_index_page(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.products.index'));

        $response->assertStatus(200);
        $response->assertSee('Products Management');
    }

    public function test_customer_cannot_access_admin_products(): void
    {
        $response = $this->actingAs($this->customer)->get(route('admin.products.index'));

        $response->assertRedirect(route('customer.dashboard'));
    }

    public function test_admin_can_view_create_product_page(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.products.create'));

        $response->assertStatus(200);
        $response->assertSee('Add New Product');
    }

    public function test_admin_can_store_new_product(): void
    {
        $productData = [
            'name' => 'Organic Green Mirchi Powder - 250g Jar',
            'category' => 'green_mirchi',
            'weight' => '250g Jar',
            'price' => 399.00,
            'original_price' => 499.00,
            'stock' => 50,
            'image' => 'images/products/green-mirchi.jpg',
            'description' => '100% natural organic green chili powder.',
            'is_active' => '1',
        ];

        $response = $this->actingAs($this->admin)->post(route('admin.products.store'), $productData);

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('products', [
            'name' => 'Organic Green Mirchi Powder - 250g Jar',
            'category' => 'green_mirchi',
            'weight' => '250g Jar',
            'price' => 399.00,
        ]);
    }

    public function test_admin_can_edit_and_update_product(): void
    {
        $product = Product::create([
            'name' => 'Organic Haldi Powder 250g',
            'slug' => 'organic-haldi-powder-250g',
            'category' => 'haldi',
            'weight' => '250g',
            'price' => 249.00,
            'stock' => 20,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->get(route('admin.products.edit', $product->id));
        $response->assertStatus(200);
        $response->assertSee('Edit Product');

        $updateData = [
            'name' => 'Pure Organic Haldi Powder 250g',
            'category' => 'haldi',
            'weight' => '250g Jar',
            'price' => 229.00,
            'stock' => 25,
            'is_active' => '1',
        ];

        $updateResponse = $this->actingAs($this->admin)->put(route('admin.products.update', $product->id), $updateData);

        $updateResponse->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Pure Organic Haldi Powder 250g',
            'category' => 'haldi',
            'price' => 229.00,
        ]);
    }

    public function test_admin_can_delete_product(): void
    {
        $product = Product::create([
            'name' => 'Ghee to Delete',
            'slug' => 'ghee-to-delete',
            'weight' => '250g',
            'price' => 450.00,
            'stock' => 10,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->delete(route('admin.products.destroy', $product->id));

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
