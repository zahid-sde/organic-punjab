<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Display the Checkout Page.
     */
    public function index(): View|RedirectResponse
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Your cart is empty. Please add products before checking out.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['subtotal'];
        }

        $coupon = Session::get('coupon');
        $discount = 0;
        if ($coupon && isset($coupon['discount_percent'])) {
            $discount = round(($subtotal * $coupon['discount_percent']) / 100, 2);
        }

        $shippingFee = ($subtotal >= 399) ? 0 : 49;
        $totalAmount = max(0, $subtotal - $discount + $shippingFee);

        $user = Auth::user();

        return view('checkout', [
            'cartItems' => array_values($cart),
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shippingFee' => $shippingFee,
            'totalAmount' => $totalAmount,
            'coupon' => $coupon,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created Order & OrderItems in database.
     */
    public function store(Request $request): RedirectResponse
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
            'payment_method' => 'required|string|in:cod,upi,card,netbanking',
            'notes' => 'nullable|string',
        ]);

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['subtotal'];
        }

        $coupon = Session::get('coupon');
        $discount = 0;
        if ($coupon && isset($coupon['discount_percent'])) {
            $discount = round(($subtotal * $coupon['discount_percent']) / 100, 2);
        }

        $shippingFee = ($subtotal >= 399) ? 0 : 49;
        $totalAmount = max(0, $subtotal - $discount + $shippingFee);

        $orderNumber = 'OP-2026-'.strtoupper(substr(uniqid(), -6));
        $paymentStatus = in_array($validated['payment_method'], ['upi', 'card', 'netbanking']) ? 'paid' : 'pending';

        DB::beginTransaction();
        try {
            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => Auth::id(),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'shipping_address' => $validated['shipping_address'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'pincode' => $validated['pincode'],
                'payment_method' => $validated['payment_method'],
                'payment_status' => $paymentStatus,
                'order_status' => 'processing',
                'subtotal' => $subtotal,
                'discount' => $discount,
                'shipping_fee' => $shippingFee,
                'total_amount' => $totalAmount,
                'coupon_code' => $coupon['code'] ?? null,
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $item['name'],
                    'product_image' => $item['image'] ?? 'images/logo.png',
                    'pack_size' => $item['weight'] ?? 'Standard',
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit();

            // Clear session cart
            Session::forget(['cart', 'coupon']);

            return redirect()->route('orders.show', ['order_number' => $order->order_number])
                ->with('success', "Order #{$order->order_number} placed successfully! Thank you for ordering from ORGANIC PUNJAB.");
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()->with('error', 'Failed to place order: '.$e->getMessage());
        }
    }
}
