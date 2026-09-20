@extends('layouts.app')

@section('title', 'Customer Account Portal')

@section('content')
<div class="row g-4">
    <!-- Top Utility Bar -->
    <div class="col-12">
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 pb-1 border-bottom">
            <div class="d-flex align-items-center gap-2 text-secondary extra-small fw-semibold">
                <a href="{{ url('/') }}" class="text-secondary text-decoration-none hover-white"><i class="bi bi-house-door-fill"></i> Home</a>
                <span>/</span>
                <span class="text-dark fw-bold">Customer Portal</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-semibold extra-small">
                    <i class="bi bi-calendar3 text-success me-1"></i> {{ date('D, M j, Y') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Main Hero Banner Card -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm text-white overflow-hidden" style="background: linear-gradient(135deg, #054e36 0%, #033a28 60%, #022a1d 100%);">
            <div class="card-body p-4 p-md-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 54px; height: 54px; font-size: 1.2rem; color: #054e36 !important;">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div>
                                <span class="badge rounded-pill bg-warning text-dark font-heading fw-bold px-3 py-1 text-uppercase extra-small tracking-wider">
                                    Customer Account #{{ $user->id }}
                                </span>
                                <h2 class="display-6 fw-extrabold text-white mb-0 font-heading lh-sm mt-1">
                                    Welcome Back, {{ $user->name }}!
                                </h2>
                            </div>
                        </div>
                        <p class="text-white-50 lead mb-0 font-normal" style="font-size: 1rem;">
                            Your ORGANIC PUNJAB customer account dashboard and active order portal.
                        </p>
                    </div>

                    <div class="col-lg-4 text-lg-end">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-lg rounded-pill px-4 py-2.5 font-heading fw-bold text-dark shadow-sm">
                                <i class="bi bi-box-arrow-right me-1"></i> Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- My Orders Section -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden">
            <div class="card-header bg-white py-3.5 px-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 34px; height: 34px; background-color: #054e36;">
                        <i class="bi bi-bag-check-fill"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-0 text-dark">My Orders History</h5>
                </div>
                <span class="badge rounded-pill bg-success-subtle text-success fw-bold px-3 py-1.5 extra-small">
                    {{ count($orders) }} Total Orders
                </span>
            </div>
            <div class="card-body p-0">
                @if(count($orders) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 extra-small font-heading">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Order Number</th>
                                    <th>Date</th>
                                    <th>Items Count</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Total Amount</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="ps-4 fw-extrabold text-dark">
                                            <a href="{{ route('orders.show', ['order_number' => $order->order_number]) }}" class="text-success text-decoration-none">
                                                #{{ $order->order_number }}
                                            </a>
                                        </td>
                                        <td class="text-secondary">{{ $order->created_at->format('M d, Y') }}</td>
                                        <td class="fw-bold text-dark">{{ $order->items->count() }} Items</td>
                                        <td class="text-uppercase fw-bold text-secondary">{{ $order->payment_method }}</td>
                                        <td>
                                            <span class="badge {{ $order->payment_badge_class }} px-2.5 py-1">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $order->status_badge_class }} px-2.5 py-1">
                                                {{ ucfirst($order->order_status) }}
                                            </span>
                                        </td>
                                        <td class="fw-extrabold text-dark fs-6">₹{{ number_format($order->total_amount, 2) }}</td>
                                        <td class="pe-4 text-end">
                                            <a href="{{ route('orders.show', ['order_number' => $order->order_number]) }}" class="btn btn-sm btn-outline-dark rounded-pill fw-bold px-3">
                                                View Receipt
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5 font-heading">
                        <i class="bi bi-bag-x display-4 text-muted opacity-50 d-block mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">No Orders Yet</h6>
                        <p class="text-muted extra-small mb-3">You haven't placed any orders with us yet.</p>
                        <a href="{{ url('/#products-section') }}" class="btn btn-success rounded-pill px-4 py-2 font-heading fw-bold extra-small" style="background-color: #054e36;">
                            Browse Products &amp; Order Now
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Account Details Card -->
    <div class="col-lg-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white overflow-hidden">
            <div class="card-header bg-white py-3.5 px-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 34px; height: 34px; background-color: #054e36;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-0 text-dark">Profile Details</h5>
                </div>
                <span class="badge rounded-pill px-3 py-1.5 fw-bold extra-small border" style="background-color: #f0fdf4; color: #054e36; border-color: #bbf7d0 !important;">Verified Customer</span>
            </div>
            <div class="card-body p-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted"><i class="bi bi-person me-2 text-success"></i> Full Name</span>
                        <strong class="text-dark fs-6">{{ $user->name }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted"><i class="bi bi-envelope me-2 text-success"></i> Email Address</span>
                        <strong class="text-dark fs-6">{{ $user->email }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted"><i class="bi bi-telephone me-2 text-success"></i> Phone Number</span>
                        <strong class="text-dark fs-6">{{ $user->phone }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted"><i class="bi bi-shield-check me-2 text-success"></i> Account Role</span>
                        <span class="badge rounded-pill px-3 py-1.5 fw-bold extra-small" style="background-color: #054e36; color: white;">{{ ucfirst($user->role) }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Quick Shop Card -->
    <div class="col-lg-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white overflow-hidden">
            <div class="card-header bg-white py-3.5 px-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 34px; height: 34px; background-color: #054e36;">
                        <i class="bi bi-cart-fill"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-0 text-dark">Quick Shop</h5>
                </div>
            </div>
            <div class="card-body p-4 d-flex flex-column justify-content-between">
                <div class="p-3.5 rounded-3 mb-4" style="background-color: #f0fdf4; border: 1px solid #bbf7d0;">
                    <h6 class="fw-bold mb-1" style="color: #054e36;"><i class="bi bi-check-circle-fill me-1"></i> Customer Account Active</h6>
                    <p class="small mb-0 text-secondary">
                        Browse our 16 organic products, choose custom pack sizes, and enjoy 10% OFF with code <strong>ORGANIC10</strong>.
                    </p>
                </div>

                <a href="{{ url('/#products-section') }}" class="btn text-white w-100 py-3 rounded-pill font-heading fw-bold text-uppercase shadow-sm d-flex align-items-center justify-content-center gap-2" style="background-color: #054e36; letter-spacing: 0.5px;">
                    <i class="bi bi-cart-plus-fill fs-5"></i> Browse Product Catalog
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
