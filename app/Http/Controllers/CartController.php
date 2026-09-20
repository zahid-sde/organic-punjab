<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Get current cart details from session.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->getCartData());
    }

    /**
     * Add an item to the shopping cart.
     */
    public function add(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'product_id' => 'nullable|integer',
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'weight' => 'nullable|string',
            'image' => 'nullable|string',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $cart = Session::get('cart', []);
        $weight = $validated['weight'] ?? 'Standard Pack';
        $itemKey = md5($validated['name'].'_'.$weight);
        $quantity = (int) ($validated['quantity'] ?? 1);

        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] += $quantity;
            $cart[$itemKey]['subtotal'] = $cart[$itemKey]['quantity'] * $cart[$itemKey]['price'];
        } else {
            $cart[$itemKey] = [
                'item_key' => $itemKey,
                'product_id' => $validated['product_id'] ?? null,
                'name' => $validated['name'],
                'price' => (float) $validated['price'],
                'weight' => $weight,
                'image' => $validated['image'] ?? 'images/logo.png',
                'quantity' => $quantity,
                'subtotal' => (float) $validated['price'] * $quantity,
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => "{$validated['name']} ({$weight}) added to your cart!",
            'cart' => $this->getCartData(),
        ]);
    }

    /**
     * Update quantity for a cart item.
     */
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'item_key' => 'required|string',
            'quantity' => 'required|integer|min:0',
        ]);

        $cart = Session::get('cart', []);
        $itemKey = $validated['item_key'];
        $quantity = (int) $validated['quantity'];

        if (isset($cart[$itemKey])) {
            if ($quantity <= 0) {
                unset($cart[$itemKey]);
            } else {
                $cart[$itemKey]['quantity'] = $quantity;
                $cart[$itemKey]['subtotal'] = $quantity * $cart[$itemKey]['price'];
            }
            Session::put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully',
            'cart' => $this->getCartData(),
        ]);
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'item_key' => 'required|string',
        ]);

        $cart = Session::get('cart', []);
        $itemKey = $validated['item_key'];

        if (isset($cart[$itemKey])) {
            unset($cart[$itemKey]);
            Session::put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
            'cart' => $this->getCartData(),
        ]);
    }

    /**
     * Clear all cart contents.
     */
    public function clear(): JsonResponse
    {
        Session::forget(['cart', 'coupon']);

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared',
            'cart' => $this->getCartData(),
        ]);
    }

    /**
     * Apply discount coupon code.
     */
    public function applyCoupon(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code' => 'required|string',
        ]);

        $code = strtoupper(trim($validated['code']));

        if ($code === 'ORGANIC10') {
            Session::put('coupon', [
                'code' => 'ORGANIC10',
                'discount_percent' => 10,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Coupon ORGANIC10 applied! 10% discount applied to your order.',
                'cart' => $this->getCartData(),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid coupon code. Try using ORGANIC10',
        ], 422);
    }

    /**
     * Helper to compute cart totals.
     */
    private function getCartData(): array
    {
        $cart = Session::get('cart', []);
        $subtotal = 0;
        $totalItems = 0;

        foreach ($cart as $item) {
            $subtotal += $item['subtotal'];
            $totalItems += $item['quantity'];
        }

        $coupon = Session::get('coupon');
        $discount = 0;

        if ($coupon && isset($coupon['discount_percent'])) {
            $discount = round(($subtotal * $coupon['discount_percent']) / 100, 2);
        }

        // Free shipping if subtotal >= 399 or subtotal == 0
        $shippingFee = ($subtotal >= 399 || $subtotal == 0) ? 0 : 49;
        $total = max(0, $subtotal - $discount + $shippingFee);

        return [
            'items' => array_values($cart),
            'count' => $totalItems,
            'subtotal' => round($subtotal, 2),
            'discount' => round($discount, 2),
            'shipping_fee' => round($shippingFee, 2),
            'total' => round($total, 2),
            'coupon' => $coupon,
        ];
    }
}
