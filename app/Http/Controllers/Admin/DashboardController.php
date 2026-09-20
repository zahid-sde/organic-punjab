<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(Request $request): View
    {
        $admin = Auth::user();

        $stats = [
            'total_users' => User::count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'total_admins' => User::where('role', 'admin')->count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::sum('total_amount'),
        ];

        $recentUsers = User::latest()->take(5)->get();
        $recentOrders = Order::with('items')->latest()->take(10)->get();

        return view('admin.dashboard', compact('admin', 'stats', 'recentUsers', 'recentOrders'));
    }
}
