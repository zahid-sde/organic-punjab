@extends('layouts.app')

@section('title', 'Track Order - ORGANIC PUNJAB')

@section('content')
<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Search Header -->
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white text-center mb-4">
                <div class="d-inline-flex align-items-center justify-content-center bg-success-subtle text-success rounded-circle mb-3 mx-auto" style="width: 64px; height: 64px;">
                    <i class="bi bi-truck display-6" style="color: #058a47;"></i>
                </div>
                <h3 class="fw-extrabold font-heading text-dark mb-2">Track Your Organic Order</h3>
                <p class="text-secondary extra-small mb-4">Enter your 11-digit Order Number (e.g. OP-2026-98124) or Phone Number below.</p>

                <form action="{{ route('orders.track') }}" method="GET" class="row g-2 justify-content-center">
                    <div class="col-md-8">
                        <input type="text" name="query" class="form-control form-control-lg rounded-pill px-4 extra-small font-heading" placeholder="Enter Order Number or Phone..." value="{{ $search ?? '' }}" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill font-heading fw-bold extra-small" style="background-color: #058a47; border-color: #058a47;">
                            <i class="bi bi-search me-1"></i> Track Order
                        </button>
                    </div>
                </form>
            </div>

            <!-- Order Result -->
            @if($search)
                @if($order)
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pb-3 border-bottom mb-4">
                            <div>
                                <h5 class="fw-extrabold font-heading text-dark mb-0">Order #{{ $order->order_number }}</h5>
                                <span class="text-muted extra-small">Placed on {{ $order->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                            <div>
                                <span class="badge {{ $order->status_badge_class }} px-3 py-2 fs-6 rounded-pill">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Progress Steps Timeline -->
                        <div class="mb-5 px-3">
                            <div class="position-relative m-4">
                                <div class="progress" style="height: 4px;">
                                    @php
                                        $progressWidth = match($order->order_status) {
                                            'pending' => '25%',
                                            'processing' => '50%',
                                            'shipped' => '75%',
                                            'delivered' => '100%',
                                            default => '10%',
                                        };
                                    @endphp
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progressWidth }};"></div>
                                </div>
                                <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-success rounded-circle" style="width: 2rem; height:2rem;"><i class="bi bi-check"></i></button>
                                <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm {{ in_array($order->order_status, ['processing', 'shipped', 'delivered']) ? 'btn-success' : 'btn-secondary' }} rounded-circle" style="width: 2rem; height:2rem;"><i class="bi bi-gear-fill"></i></button>
                                <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm {{ $order->order_status == 'delivered' ? 'btn-success' : 'btn-secondary' }} rounded-circle" style="width: 2rem; height:2rem;"><i class="bi bi-box-seam"></i></button>
                            </div>
                            <div class="d-flex justify-content-between extra-small font-heading fw-bold text-dark pt-1">
                                <span>Order Placed</span>
                                <span>Processing / Dispatch</span>
                                <span>Delivered</span>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <h6 class="fw-bold font-heading text-dark border-bottom pb-2 mb-3">Order Items</h6>
                        <div class="d-grid gap-2 mb-3">
                            @foreach($order->items as $item)
                                <div class="d-flex align-items-center justify-content-between extra-small py-1">
                                    <span>{{ $item->product_name }} ({{ $item->pack_size }}) &times; {{ $item->quantity }}</span>
                                    <span class="fw-bold">₹{{ number_format($item->subtotal, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-2 border-top font-heading fw-extrabold fs-6">
                            <span>Total Amount</span>
                            <span class="text-success">₹{{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning border rounded-4 p-4 text-center font-heading">
                        <i class="bi bi-exclamation-triangle-fill display-6 text-warning d-block mb-2"></i>
                        <h5 class="fw-extrabold text-dark mb-1">No Order Found</h5>
                        <p class="text-secondary extra-small mb-0">We couldn't find any order matching "<strong>{{ $search }}</strong>". Please verify your Order Number or Mobile Phone.</p>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
