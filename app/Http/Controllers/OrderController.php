<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display order confirmation receipt.
     */
    public function show(string $order_number): View
    {
        $order = Order::with('items')->where('order_number', $order_number)->firstOrFail();

        return view('order.confirmation', compact('order'));
    }

    /**
     * Public order tracking page/action.
     */
    public function track(Request $request): View
    {
        $search = $request->query('query');
        $order = null;

        if ($search) {
            $order = Order::with('items')
                ->where('order_number', trim($search))
                ->orWhere('customer_phone', trim($search))
                ->latest()
                ->first();
        }

        return view('order.track', compact('order', 'search'));
    }

    /**
     * Admin action to update order status.
     */
    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'order_status' => 'required|string|in:pending,processing,shipped,delivered,cancelled',
            'payment_status' => 'nullable|string|in:pending,paid,failed',
        ]);

        $order->order_status = $validated['order_status'];

        if (isset($validated['payment_status'])) {
            $order->payment_status = $validated['payment_status'];
        }

        $order->save();

        return redirect()->back()->with('success', "Order #{$order->order_number} status updated to ".ucfirst($order->order_status).'!');
    }
}
