<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the customer dashboard.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        $orders = Order::with('items')
            ->where('user_id', $user->id)
            ->orWhere('customer_email', $user->email)
            ->latest()
            ->get();

        return view('customer.dashboard', compact('user', 'orders'));
    }
}
