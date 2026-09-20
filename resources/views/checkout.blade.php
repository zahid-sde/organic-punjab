@extends('layouts.app')

@section('title', 'Checkout - ORGANIC PUNJAB')

@section('content')
<div class="container py-4 py-md-5">
    <div class="row g-4">
        <!-- LEFT COLUMN: Shipping & Payment Form -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-4 border-bottom">
                    <h4 class="fw-extrabold font-heading text-dark mb-0 d-flex align-items-center gap-2">
                        <i class="bi bi-geo-alt-fill text-success"></i> Delivery Shipping Address
                    </h4>
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill">Step 1 of 2</span>
                </div>

                <form action="{{ route('checkout.store') }}" method="POST" id="checkoutForm">
                    @csrf

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="customer_name" class="form-label fw-bold extra-small text-dark">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 py-2.5 @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ old('customer_name', $user->name ?? '') }}" placeholder="e.g. Gurpreet Singh" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="customer_phone" class="form-label fw-bold extra-small text-dark">Mobile Phone Number <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold text-muted">+91</span>
                                <input type="tel" class="form-control rounded-end-3 py-2.5 @error('customer_phone') is-invalid @enderror" id="customer_phone" name="customer_phone" value="{{ old('customer_phone', $user->phone ?? '') }}" placeholder="9876543210" required>
                            </div>
                            @error('customer_phone')
                                <div class="text-danger extra-small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="customer_email" class="form-label fw-bold extra-small text-dark">Email Address (For Invoice & Tracking) <span class="text-danger">*</span></label>
                            <input type="email" class="form-control rounded-3 py-2.5 @error('customer_email') is-invalid @enderror" id="customer_email" name="customer_email" value="{{ old('customer_email', $user->email ?? '') }}" placeholder="name@domain.com" required>
                            @error('customer_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="shipping_address" class="form-label fw-bold extra-small text-dark">Full Street Address & House/Flat No. <span class="text-danger">*</span></label>
                            <textarea class="form-control rounded-3 @error('shipping_address') is-invalid @enderror" id="shipping_address" name="shipping_address" rows="3" placeholder="House/Flat No., Building, Street Name, Area/Locality" required>{{ old('shipping_address') }}</textarea>
                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label for="city" class="form-label fw-bold extra-small text-dark">City / District <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 py-2.5 @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" placeholder="Amritsar / Chandigarh" required>
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label fw-bold extra-small text-dark">State <span class="text-danger">*</span></label>
                            <select class="form-select rounded-3 py-2.5 @error('state') is-invalid @enderror" id="state" name="state" required>
                                <option value="Punjab" {{ old('state') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                                <option value="Chandigarh" {{ old('state') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
                                <option value="Delhi" {{ old('state') == 'Delhi' ? 'selected' : '' }}>Delhi NCR</option>
                                <option value="Haryana" {{ old('state') == 'Haryana' ? 'selected' : '' }}>Haryana</option>
                                <option value="Himachal Pradesh" {{ old('state') == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh</option>
                                <option value="Rajasthan" {{ old('state') == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
                                <option value="Other" {{ old('state') == 'Other' ? 'selected' : '' }}>Other Indian State</option>
                            </select>
                            @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="pincode" class="form-label fw-bold extra-small text-dark">Pincode <span class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-3 py-2.5 @error('pincode') is-invalid @enderror" id="pincode" name="pincode" value="{{ old('pincode') }}" placeholder="143001" maxlength="6" required>
                            @error('pincode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="notes" class="form-label fw-bold extra-small text-dark">Order Notes / Special Delivery Instructions (Optional)</label>
                            <input type="text" class="form-control rounded-3 py-2" id="notes" name="notes" value="{{ old('notes') }}" placeholder="e.g. Please call before delivery / Leave with guard">
                        </div>
                    </div>

                    <!-- Payment Method Selection -->
                    <div class="border-top pt-4">
                        <h4 class="fw-extrabold font-heading text-dark mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-credit-card-2-front-fill text-success"></i> Select Payment Method
                        </h4>

                        <div class="d-grid gap-3 mb-4">
                            <!-- UPI Payment Option -->
                            <div class="border rounded-4 p-3 bg-light cursor-pointer payment-option-card" style="border-color: #058a47 !important;">
                                <div class="form-check d-flex align-items-center justify-content-between mb-0">
                                    <div>
                                        <input class="form-check-input payment-radio me-2" type="radio" name="payment_method" id="pay_upi" value="upi" checked>
                                        <label class="form-check-label fw-extrabold text-dark font-heading cursor-pointer" for="pay_upi">
                                            UPI Instant Payment (Google Pay / PhonePe / Paytm / QR)
                                        </label>
                                        <p class="text-muted extra-small mb-0 ms-4">Instant payment approval & zero extra convenience fee.</p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-success">
                                        <i class="bi bi-qr-code-scan fs-4"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Cash On Delivery (COD) -->
                            <div class="border rounded-4 p-3 bg-white cursor-pointer payment-option-card">
                                <div class="form-check d-flex align-items-center justify-content-between mb-0">
                                    <div>
                                        <input class="form-check-input payment-radio me-2" type="radio" name="payment_method" id="pay_cod" value="cod">
                                        <label class="form-check-label fw-extrabold text-dark font-heading cursor-pointer" for="pay_cod">
                                            Cash On Delivery (COD)
                                        </label>
                                        <p class="text-muted extra-small mb-0 ms-4">Pay in cash when your fresh organic order arrives at your door.</p>
                                    </div>
                                    <div class="text-secondary">
                                        <i class="bi bi-cash-stack fs-4"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Card / Netbanking Option -->
                            <div class="border rounded-4 p-3 bg-white cursor-pointer payment-option-card">
                                <div class="form-check d-flex align-items-center justify-content-between mb-0">
                                    <div>
                                        <input class="form-check-input payment-radio me-2" type="radio" name="payment_method" id="pay_card" value="card">
                                        <label class="form-check-label fw-extrabold text-dark font-heading cursor-pointer" for="pay_card">
                                            Debit Card / Credit Card / Netbanking
                                        </label>
                                        <p class="text-muted extra-small mb-0 ms-4">All major Indian banks & Visa, Mastercard, RuPay cards supported.</p>
                                    </div>
                                    <div class="text-secondary">
                                        <i class="bi bi-credit-card fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-3 rounded-pill font-heading fw-extrabold fs-5 shadow-sm d-flex align-items-center justify-content-center gap-2" style="background-color: #058a47; border-color: #058a47;">
                            <i class="bi bi-shield-lock-fill"></i> CONFIRM &amp; PLACE ORDER (₹{{ number_format($totalAmount, 2) }})
                        </button>
                        <p class="text-center text-muted extra-small mt-2 mb-0">
                            <i class="bi bi-shield-check text-success"></i> 256-Bit SSL Encrypted &amp; 100% Safe Checkout
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- RIGHT COLUMN: Order Summary Card -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top bg-white" style="top: 90px; z-index: 10;">
                <h5 class="fw-extrabold font-heading text-dark pb-3 mb-3 border-bottom d-flex align-items-center justify-content-between">
                    <span>Order Summary</span>
                    <span class="badge bg-secondary rounded-pill font-heading extra-small">{{ count($cartItems) }} Items</span>
                </h5>

                <!-- Cart Items List -->
                <div class="mb-4 pe-1 overflow-y-auto" style="max-height: 280px;">
                    @foreach($cartItems as $item)
                        <div class="d-flex align-items-center gap-3 py-2 border-bottom border-light">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="rounded-3 border p-1 bg-light object-fit-contain" style="width: 54px; height: 54px;">
                            <div class="flex-grow-1">
                                <h6 class="fw-bold font-heading text-dark mb-0 extra-small" style="line-height: 1.3;">{{ $item['name'] }}</h6>
                                <span class="badge bg-light text-dark border extra-small mt-1">{{ $item['weight'] }}</span>
                                <div class="text-muted extra-small">Qty: {{ $item['quantity'] }} &times; ₹{{ number_format($item['price'], 2) }}</div>
                            </div>
                            <div class="text-end fw-extrabold font-heading text-dark fs-6">
                                ₹{{ number_format($item['subtotal'], 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Price Calculations -->
                <div class="d-grid gap-2 border-bottom pb-3 mb-3 font-heading extra-small fw-semibold">
                    <div class="d-flex justify-content-between text-secondary">
                        <span>Items Subtotal</span>
                        <span class="text-dark fw-bold">₹{{ number_format($subtotal, 2) }}</span>
                    </div>

                    @if($discount > 0)
                        <div class="d-flex justify-content-between text-success fw-bold">
                            <span>Coupon Discount ({{ $coupon['code'] ?? 'ORGANIC10' }})</span>
                            <span>- ₹{{ number_format($discount, 2) }}</span>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between text-secondary">
                        <span>Standard Express Shipping</span>
                        @if($shippingFee == 0)
                            <span class="text-success fw-bold"><i class="bi bi-tag-fill me-1"></i> FREE</span>
                        @else
                            <span class="text-dark fw-bold">₹{{ number_format($shippingFee, 2) }}</span>
                        @endif
                    </div>
                </div>

                <!-- Total Amount -->
                <div class="d-flex justify-content-between align-items-center mb-4 font-heading">
                    <div>
                        <span class="fw-extrabold text-dark fs-5 d-block">Grand Total</span>
                        <span class="text-muted extra-small">Inclusive of all organic taxes</span>
                    </div>
                    <span class="display-6 fw-extrabold text-success" style="color: #058a47 !important;">
                        ₹{{ number_format($totalAmount, 2) }}
                    </span>
                </div>

                <!-- Guarantee Badges -->
                <div class="rounded-3 p-3 bg-light border border-dashed">
                    <div class="d-flex align-items-center gap-2 extra-small text-dark font-heading fw-bold mb-1">
                        <i class="bi bi-patch-check-fill text-success fs-5"></i>
                        <span>100% Purity &amp; Freshness Guarantee</span>
                    </div>
                    <p class="text-muted extra-small mb-0" style="font-size: 0.75rem;">
                        Handcrafted traditionally with Vedic wooden churned method. Shipped directly from certified organic farms in Punjab.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
