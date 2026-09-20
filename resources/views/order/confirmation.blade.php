@extends('layouts.app')

@section('title', 'Order Confirmation #' . $order->order_number . ' - ORGANIC PUNJAB')

@section('content')
<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <!-- Order Success Header Card -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4 bg-white text-center">
                <div class="p-4 p-md-5 text-white" style="background: linear-gradient(135deg, #054e36 0%, #033a28 50%, #022a1d 100%);">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white text-success rounded-circle mb-3 shadow" style="width: 72px; height: 72px;">
                        <i class="bi bi-check-circle-fill display-5" style="color: #058a47;"></i>
                    </div>
                    <h2 class="display-6 fw-extrabold font-heading text-white mb-2">Thank You For Your Order!</h2>
                    <p class="lead text-white-50 font-normal mb-3" style="font-size: 1.1rem;">
                        Your organic order has been placed successfully and is being prepared with utmost purity.
                    </p>
                    <div class="d-inline-flex align-items-center gap-2 bg-white bg-opacity-20 px-4 py-2 rounded-pill border border-white border-opacity-30 text-white font-heading fw-bold">
                        <span>Order Reference:</span>
                        <span class="text-warning fs-5 tracking-wider">{{ $order->order_number }}</span>
                    </div>
                </div>

                <div class="p-4 bg-light border-bottom d-flex flex-wrap align-items-center justify-content-around gap-3 extra-small font-heading fw-bold text-dark">
                    <div>
                        <span class="text-muted d-block">Order Date</span>
                        <i class="bi bi-calendar-event me-1 text-success"></i> {{ $order->created_at->format('M d, Y - h:i A') }}
                    </div>
                    <div>
                        <span class="text-muted d-block">Payment Method</span>
                        <span class="badge bg-dark text-white px-2.5 py-1 uppercase">{{ strtoupper($order->payment_method) }}</span>
                    </div>
                    <div>
                        <span class="text-muted d-block">Payment Status</span>
                        <span class="badge {{ $order->payment_badge_class }} px-2.5 py-1">{{ ucfirst($order->payment_status) }}</span>
                    </div>
                    <div>
                        <span class="text-muted d-block">Order Status</span>
                        <span class="badge {{ $order->status_badge_class }} px-2.5 py-1">{{ ucfirst($order->order_status) }}</span>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <!-- Order Items Breakdown -->
                <div class="col-md-7">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                        <h5 class="fw-extrabold font-heading text-dark pb-3 mb-3 border-bottom d-flex align-items-center gap-2">
                            <i class="bi bi-bag-check-fill text-success"></i> Ordered Items
                        </h5>

                        <div class="d-grid gap-3 mb-4">
                            @foreach($order->items as $item)
                                <div class="d-flex align-items-center gap-3 pb-3 border-bottom border-light">
                                    <img src="{{ asset($item->product_image ?? 'images/logo.png') }}" alt="{{ $item->product_name }}" class="rounded-3 border p-1 bg-light object-fit-contain" style="width: 58px; height: 58px;">
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold font-heading text-dark mb-0 extra-small">{{ $item->product_name }}</h6>
                                        <span class="badge bg-light text-dark border extra-small mt-1">{{ $item->pack_size }}</span>
                                        <div class="text-muted extra-small">Qty: {{ $item->quantity }} &times; ₹{{ number_format($item->price, 2) }}</div>
                                    </div>
                                    <div class="text-end fw-extrabold font-heading text-dark fs-6">
                                        ₹{{ number_format($item->subtotal, 2) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Calculations Table -->
                        <div class="d-grid gap-2 font-heading extra-small fw-semibold pt-2 border-top mt-auto">
                            <div class="d-flex justify-content-between text-secondary">
                                <span>Subtotal</span>
                                <span class="text-dark fw-bold">₹{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            @if($order->discount > 0)
                                <div class="d-flex justify-content-between text-success fw-bold">
                                    <span>Discount ({{ $order->coupon_code ?? 'ORGANIC10' }})</span>
                                    <span>- ₹{{ number_format($order->discount, 2) }}</span>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between text-secondary">
                                <span>Shipping Fee</span>
                                @if($order->shipping_fee == 0)
                                    <span class="text-success fw-bold">FREE</span>
                                @else
                                    <span class="text-dark fw-bold">₹{{ number_format($order->shipping_fee, 2) }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top fs-5 fw-extrabold">
                                <span class="text-dark">Total Paid</span>
                                <span class="text-success" style="color: #058a47 !important;">₹{{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address Details -->
                <div class="col-md-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-extrabold font-heading text-dark pb-3 mb-3 border-bottom d-flex align-items-center gap-2">
                                <i class="bi bi-geo-alt-fill text-success"></i> Delivery Address
                            </h5>

                            <div class="font-heading extra-small mb-4">
                                <h6 class="fw-extrabold text-dark fs-6 mb-1">{{ $order->customer_name }}</h6>
                                <p class="text-secondary mb-2 leading-relaxed">
                                    {{ $order->shipping_address }}<br>
                                    {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}
                                </p>
                                <div class="text-dark fw-semibold mb-1">
                                    <i class="bi bi-telephone-fill me-1 text-success"></i> {{ $order->customer_phone }}
                                </div>
                                <div class="text-dark fw-semibold">
                                    <i class="bi bi-envelope-fill me-1 text-success"></i> {{ $order->customer_email }}
                                </div>
                            </div>

                            @if($order->notes)
                                <div class="alert alert-light border rounded-3 p-3 extra-small font-heading mb-4">
                                    <strong class="d-block text-dark mb-1"><i class="bi bi-sticky-fill text-warning me-1"></i> Delivery Note:</strong>
                                    {{ $order->notes }}
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <button onclick="window.print()" class="btn btn-outline-dark btn-sm rounded-pill fw-bold font-heading py-2">
                                <i class="bi bi-printer-fill me-1"></i> Print Receipt / Invoice
                            </button>
                            <a href="{{ route('orders.track', ['query' => $order->order_number]) }}" class="btn btn-success btn-sm rounded-pill fw-bold font-heading py-2" style="background-color: #058a47; border-color: #058a47;">
                                <i class="bi bi-truck me-1"></i> Track Order Status
                            </a>
                            <a href="{{ url('/') }}" class="btn btn-light btn-sm rounded-pill fw-bold font-heading py-2 text-dark border">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
