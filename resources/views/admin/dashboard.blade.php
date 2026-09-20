@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Operations Command Center')

@section('content')
<div class="row g-4">
    <!-- Top Utility & Breadcrumb Bar -->
    <div class="col-12">
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 pb-1 border-bottom">
            <div class="d-flex align-items-center gap-2 text-secondary extra-small fw-semibold">
                <a href="{{ url('/') }}" class="text-secondary text-decoration-none hover-white"><i class="bi bi-house-door-fill"></i> Home</a>
                <span>/</span>
                <span class="text-dark fw-bold">Admin Dashboard</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-semibold extra-small d-inline-flex align-items-center gap-1.5">
                    <i class="bi bi-calendar3 text-success"></i> {{ date('D, M j, Y') }}
                </span>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-bold extra-small">
                    <span class="bg-success rounded-circle d-inline-block me-1" style="width: 7px; height: 7px;"></span> Operational System Active
                </span>
            </div>
        </div>
    </div>

    <!-- Main Hero Command Center Banner -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm text-white overflow-hidden" style="background: linear-gradient(135deg, #054e36 0%, #033a28 60%, #022a1d 100%);">
            <div class="card-body p-4 p-md-5">
                <div class="row align-items-center g-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="bg-white bg-opacity-20 text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 52px; height: 52px; font-size: 1.25rem; border: 2px solid rgba(255,255,255,0.3);">
                                {{ strtoupper(substr($admin->name, 0, 2)) }}
                            </div>
                            <div>
                                <span class="badge rounded-pill bg-warning text-dark font-heading fw-bold px-3 py-1 text-uppercase extra-small tracking-wider">
                                    <i class="bi bi-shield-lock-fill me-1"></i> Administrator Access
                                </span>
                                <h2 class="display-6 fw-extrabold text-white mb-0 font-heading lh-sm mt-1">
                                    Good {{ date('H') < 12 ? 'Morning' : (date('H') < 18 ? 'Afternoon' : 'Evening') }}, {{ $admin->name }}! 👋
                                </h2>
                            </div>
                        </div>
                        <p class="text-white-50 lead mb-0 font-normal ms-md-5 ps-md-3" style="font-size: 0.95rem;">
                            Organic Dairy Operations Command Center • Registered Users & Access Management Portal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders & Customer Analytics Stat Cards -->
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 rounded-4 shadow-sm h-100 p-3.5 transition-all" style="background-color: #f0fdf4; border: 1px solid #bbf7d0 !important; border-top: 4px solid #054e36 !important;">
            <div class="card-body p-2">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="bg-success-subtle text-success rounded-3 p-2.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px; background-color: #dcfce7 !important; color: #054e36 !important;">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </div>
                    <span class="badge bg-white text-success border border-success-subtle fw-semibold rounded-pill px-2.5 py-1 extra-small">
                        Total Orders
                    </span>
                </div>
                <span class="text-uppercase text-secondary extra-small fw-bold tracking-wider d-block mb-1">TOTAL ORDERS</span>
                <div class="d-flex align-items-baseline justify-content-between">
                    <h2 class="display-6 fw-extrabold mb-0 font-heading text-dark" style="color: #054e36 !important;">{{ $stats['total_orders'] }}</h2>
                    <span class="text-muted extra-small">Store Orders</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 2: Total Revenue -->
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 rounded-4 shadow-sm h-100 p-3.5 transition-all" style="background-color: #f0fdf4; border: 1px solid #bbf7d0 !important; border-top: 4px solid #054e36 !important;">
            <div class="card-body p-2">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="rounded-3 p-2.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px; background-color: #dcfce7; color: #054e36;">
                        <i class="bi bi-currency-rupee fs-4"></i>
                    </div>
                    <span class="badge bg-white text-success border border-success-subtle fw-semibold rounded-pill px-2.5 py-1 extra-small">
                        Revenue
                    </span>
                </div>
                <span class="text-uppercase text-secondary extra-small fw-bold tracking-wider d-block mb-1">TOTAL REVENUE</span>
                <div class="d-flex align-items-baseline justify-content-between">
                    <h2 class="display-6 fw-extrabold mb-0 font-heading" style="color: #054e36 !important;">₹{{ number_format($stats['total_revenue'], 2) }}</h2>
                    <span class="text-muted extra-small">Gross Sales</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 3: Registered Users -->
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 rounded-4 shadow-sm h-100 p-3.5 transition-all" style="background-color: #fef3c7; border: 1px solid #fde68a !important; border-top: 4px solid #d97706 !important;">
            <div class="card-body p-2">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="rounded-3 p-2.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px; background-color: #fef3c7; color: #d97706;">
                        <i class="bi bi-people-fill fs-4"></i>
                    </div>
                    <span class="badge bg-white text-warning border border-warning-subtle fw-semibold rounded-pill px-2.5 py-1 extra-small" style="color: #d97706 !important;">
                        Users
                    </span>
                </div>
                <span class="text-uppercase text-secondary extra-small fw-bold tracking-wider d-block mb-1">TOTAL USERS</span>
                <div class="d-flex align-items-baseline justify-content-between">
                    <h2 class="display-6 fw-extrabold mb-0 font-heading text-dark" style="color: #b45309 !important;">{{ $stats['total_users'] }}</h2>
                    <span class="text-muted extra-small">Customer Directory</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 4: Catalog SKUs -->
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 rounded-4 shadow-sm h-100 p-3.5 transition-all" style="background-color: #f3e8ff; border: 1px solid #e9d5ff !important; border-top: 4px solid #9333ea !important;">
            <div class="card-body p-2">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="rounded-3 p-2.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px; background-color: #f3e8ff; color: #9333ea;">
                        <i class="bi bi-box-seam-fill fs-4"></i>
                    </div>
                    <span class="badge bg-white text-purple border border-purple-subtle fw-semibold rounded-pill px-2.5 py-1 extra-small" style="color: #9333ea;">
                        Active SKUs
                    </span>
                </div>
                <span class="text-uppercase text-secondary extra-small fw-bold tracking-wider d-block mb-1">PRODUCT CATALOG</span>
                <div class="d-flex align-items-baseline justify-content-between">
                    <h2 class="display-6 fw-extrabold mb-0 font-heading text-dark" style="color: #7e22ce !important;">16 Products</h2>
                    <span class="text-muted extra-small">Organic Ghee & Spices</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Management Table Section -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden">
            <div class="card-header bg-white py-3.5 px-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px; background-color: #054e36;">
                        <i class="bi bi-bag-check-fill fs-6"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold font-heading mb-0 text-dark">Live Store Orders & Status Control</h5>
                        <span class="text-muted extra-small">Real-time store orders placed by customers</span>
                    </div>
                </div>
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 extra-small rounded-pill">
                    {{ count($recentOrders) }} Orders Shown
                </span>
            </div>

            <div class="card-body p-0">
                @if(count($recentOrders) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 extra-small font-heading">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Order Ref</th>
                                    <th>Customer Details</th>
                                    <th>Items Breakdown</th>
                                    <th>Total Amount</th>
                                    <th>Payment</th>
                                    <th>Status Control</th>
                                    <th class="pe-4 text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                    <tr>
                                        <td class="ps-4 fw-extrabold text-dark">
                                            <a href="{{ route('orders.show', ['order_number' => $order->order_number]) }}" class="text-success text-decoration-none">
                                                #{{ $order->order_number }}
                                            </a>
                                            <div class="text-muted extra-small fw-normal">{{ $order->created_at->format('M d, h:i A') }}</div>
                                        </td>
                                        <td>
                                            <strong class="text-dark d-block">{{ $order->customer_name }}</strong>
                                            <span class="text-muted extra-small">{{ $order->customer_phone }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-dark">{{ $order->items->count() }} Items</span>
                                            <div class="text-muted extra-small text-truncate" style="max-width: 200px;">
                                                {{ $order->items->pluck('product_name')->implode(', ') }}
                                            </div>
                                        </td>
                                        <td class="fw-extrabold text-dark fs-6">₹{{ number_format($order->total_amount, 2) }}</td>
                                        <td>
                                            <span class="badge bg-dark text-white text-uppercase px-2 py-0.5 extra-small">{{ $order->payment_method }}</span>
                                            <span class="badge {{ $order->payment_badge_class }} px-2 py-0.5 extra-small d-block mt-1">{{ ucfirst($order->payment_status) }}</span>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <select name="order_status" onchange="this.form.submit()" class="form-select form-select-sm extra-small font-heading fw-bold rounded-3 border-success text-dark">
                                                    <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                    <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                    <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                    <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="pe-4 text-end">
                                            <a href="{{ route('orders.show', ['order_number' => $order->order_number]) }}" class="btn btn-sm btn-outline-dark rounded-pill fw-bold px-3">
                                                Receipt
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5 font-heading">
                        <i class="bi bi-inbox display-4 text-muted opacity-50 d-block mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">No Orders Placed Yet</h6>
                        <p class="text-muted extra-small mb-0">Customer orders will appear here in real-time once placed.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Analytics Graphs Section (Matching Reference Interface) -->
    <!-- 7-Day Growth Trend Line Chart -->
    <div class="col-lg-8">
        <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden h-100">
            <div class="card-header bg-white py-3.5 px-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2.5">
                    <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px; background-color: #054e36;">
                        <i class="bi bi-graph-up-arrow fs-6"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold font-heading mb-0 text-dark">7-Day Customer & Order Growth Trend</h5>
                        <span class="text-muted extra-small">Organic Ghee customer registrations & order volume over past 7 days</span>
                    </div>
                </div>
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 fw-bold extra-small rounded-pill">
                    <i class="bi bi-arrow-up-right me-1"></i> +28.4% Growth
                </span>
            </div>

            <div class="card-body p-4">
                <div style="height: 280px;" class="position-relative">
                    <canvas id="growthTrendChart"></canvas>
                </div>
            </div>

            <div class="card-footer bg-light py-3 px-4 border-top d-flex flex-wrap align-items-center justify-content-between gap-2 extra-small">
                <div class="d-flex align-items-center gap-3 text-secondary">
                    <span><i class="bi bi-circle-fill text-success me-1" style="color: #054e36 !important;"></i> New Customers</span>
                    <span><i class="bi bi-circle-fill text-primary me-1"></i> Product Orders</span>
                </div>
                <a href="{{ route('admin.users.index') }}" class="fw-bold text-decoration-none" style="color: #054e36;">
                    View Detailed Directory &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- Product SKU Breakdown & Quick Shift Status -->
    <div class="col-lg-4">
        <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden h-100">
            <div class="card-header bg-white py-3.5 px-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 34px; height: 34px; background-color: #054e36;">
                        <i class="bi bi-pie-chart-fill"></i>
                    </div>
                    <h5 class="fw-bold font-heading mb-0 text-dark">Pack Variant Breakdown</h5>
                </div>
                <span class="badge bg-light text-dark border px-2.5 py-1 extra-small">4 Active Packs</span>
            </div>

            <div class="card-body p-4 d-flex flex-column justify-content-center align-items-center">
                <div style="height: 210px; width: 100%;" class="d-flex justify-content-center">
                    <canvas id="skuBreakdownChart"></canvas>
                </div>

                <div class="w-100 mt-3 pt-3 border-top">
                    <div class="row g-2 text-center extra-small">
                        <div class="col-6">
                            <div class="p-2 rounded-3" style="background-color: #f0fdf4; border: 1px solid #bbf7d0;">
                                <span class="d-block text-muted">MORNING BATCH</span>
                                <strong style="color: #054e36;">140 L Pure Ghee</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2 rounded-3" style="background-color: #fef3c7; border: 1px solid #fde68a;">
                                <span class="d-block text-muted">EVENING BATCH</span>
                                <strong style="color: #b45309;">105 L Pure Ghee</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Initialization Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Line Chart: 7-Day Growth Trend
        const ctxGrowth = document.getElementById('growthTrendChart').getContext('2d');
        const gradientSuccess = ctxGrowth.createLinearGradient(0, 0, 0, 250);
        gradientSuccess.addColorStop(0, 'rgba(5, 78, 54, 0.35)');
        gradientSuccess.addColorStop(1, 'rgba(5, 78, 54, 0.0)');

        new Chart(ctxGrowth, {
            type: 'line',
            data: {
                labels: ['Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Today'],
                datasets: [
                    {
                        label: 'Customer Registrations',
                        data: [1, 2, 1, 3, 2, 4, 3],
                        borderColor: '#054e36',
                        backgroundColor: gradientSuccess,
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#054e36',
                        pointRadius: 5
                    },
                    {
                        label: 'Order Volume',
                        data: [0, 1, 2, 2, 4, 3, 5],
                        borderColor: '#0284c7',
                        borderWidth: 2,
                        borderDash: [4, 4],
                        fill: false,
                        tension: 0.4,
                        pointBackgroundColor: '#0284c7',
                        pointRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f1f5f9'
                        },
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Donut Chart: SKU Breakdown
        const ctxSku = document.getElementById('skuBreakdownChart').getContext('2d');
        new Chart(ctxSku, {
            type: 'doughnut',
            data: {
                labels: ['500g Glass Jar', '1 kg Family Jar', '250g Glass Jar', '5 kg Steel Dolchi'],
                datasets: [{
                    data: [42, 30, 18, 10],
                    backgroundColor: ['#054e36', '#0284c7', '#d97706', '#9333ea'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            font: {
                                size: 11
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>
@endsection
