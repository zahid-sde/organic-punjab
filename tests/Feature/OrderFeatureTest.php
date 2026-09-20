<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_add_item_to_cart(): void
    {
        $response = $this->postJson(route('cart.add'), [
            'name' => 'Pure Organic A2 Desi Cow Ghee',
            'price' => 899.00,
            'weight' => '500g Jar',
            'image' => 'images/products/ghee-500g.png',
            'quantity' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $response->assertJsonPath('cart.count', 2);
        $response->assertJsonPath('cart.subtotal', 1798);
    }

    public function test_can_apply_coupon_code(): void
    {
        $this->postJson(route('cart.add'), [
            'name' => 'Green Mirchi Powder',
            'price' => 500.00,
            'quantity' => 1,
        ]);

        $response = $this->postJson(route('cart.coupon'), [
            'code' => 'ORGANIC10',
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $response->assertJsonPath('cart.discount', 50);
    }

    public function test_can_place_order_and_redirect_to_confirmation(): void
    {
        // Add item to cart first
        $this->postJson(route('cart.add'), [
            'name' => 'Pure Organic A2 Desi Cow Ghee',
            'price' => 899.00,
            'weight' => '500g Jar',
            'image' => 'images/products/ghee-500g.png',
            'quantity' => 1,
        ]);

        $response = $this->post(route('checkout.store'), [
            'customer_name' => 'Test Customer',
            'customer_email' => 'customer@test.com',
            'customer_phone' => '9876543210',
            'shipping_address' => '123 Farm House, GT Road',
            'city' => 'Amritsar',
            'state' => 'Punjab',
            'pincode' => '143001',
            'payment_method' => 'upi',
            'notes' => 'Deliver before 5 PM',
        ]);

        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Test Customer',
            'customer_email' => 'customer@test.com',
            'payment_method' => 'upi',
            'payment_status' => 'paid',
            'order_status' => 'processing',
        ]);

        $order = Order::where('customer_email', 'customer@test.com')->first();
        $this->assertNotNull($order);
        $this->assertCount(1, $order->items);

        $response->assertRedirect(route('orders.show', ['order_number' => $order->order_number]));
    }

    public function test_admin_can_update_order_status(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $order = Order::create([
            'order_number' => 'OP-2026-TEST1',
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
            'customer_phone' => '9876543210',
            'shipping_address' => 'Street 1',
            'city' => 'Amritsar',
            'state' => 'Punjab',
            'pincode' => '143001',
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'order_status' => 'processing',
            'subtotal' => 899.00,
            'shipping_fee' => 0,
            'total_amount' => 899.00,
        ]);

        $response = $this->actingAs($admin)->patch(route('admin.orders.update-status', $order), [
            'order_status' => 'shipped',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'order_status' => 'shipped',
        ]);
    }
}
