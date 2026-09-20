@extends('layouts.app')

@section('title', 'Customer Registration')

@section('content')
<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-11">
            <div class="row g-0 rounded-4 overflow-hidden shadow-lg border bg-white">
                <!-- Left Banner Column (Enterprise Organic Dairy Brand Identity) -->
                <div class="col-lg-6 p-4 p-md-5 text-white d-flex flex-column justify-content-between position-relative" style="background: linear-gradient(135deg, #054e36 0%, #033a28 50%, #022a1d 100%); min-height: 520px;">
                    <div>
                        <!-- Header Brand -->
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <img src="{{ asset('images/logo.png') }}" alt="ORGANIC PUNJAB Logo" style="height: 48px; width: auto;" class="bg-white p-1 rounded-circle shadow-sm">
                            <div>
                                <h4 class="fw-extrabold font-heading text-white mb-0 lh-1">ORGANIC PUNJAB<span class="text-warning">.</span></h4>
                                <span class="text-white-50 extra-small fw-bold text-uppercase tracking-wider">Organic Pure Dairy & Spices</span>
                            </div>
                        </div>

                        <!-- Status Pill Badge -->
                        <div class="mb-4">
                            <span class="badge rounded-pill bg-white bg-opacity-15 text-white px-3 py-2 fw-semibold border border-white border-opacity-20 d-inline-flex align-items-center gap-2">
                                <span class="bg-warning rounded-circle" style="width: 8px; height: 8px;"></span> Organic A2 Cow Dairy Platform
                            </span>
                        </div>

                        <!-- Main Headline -->
                        <h2 class="display-6 fw-extrabold font-heading text-white mb-3 lh-sm">
                            Join Our Organic Desi Ghee Community Today
                        </h2>

                        <!-- Description Paragraph -->
                        <p class="text-white-50 leading-relaxed mb-4 font-normal" style="font-size: 0.95rem;">
                            Create your account to order 100% pure, lab-certified organic Desi Ghee directly from dairy farms. Enjoy doorstep delivery with complete batch transparency.
                        </p>
                    </div>

                    <!-- Bottom Features Grid -->
                    <div>
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="p-3 rounded-3 bg-white bg-opacity-10 border border-white border-opacity-15">
                                    <h3 class="fw-bold font-heading text-white mb-1">100%</h3>
                                    <span class="text-white-50 small">Pure A2 Cow Milk</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 rounded-3 bg-white bg-opacity-10 border border-white border-opacity-15">
                                    <h3 class="fw-bold font-heading text-white mb-1">Lab-Tested</h3>
                                    <span class="text-white-50 small">Zero Adulteration</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3 border-top border-white border-opacity-15 extra-small text-white-50">
                            <span>&copy; {{ date('Y') }} Desi Ghee Store System.</span>
                            <span>Pure Organic Edition</span>
                        </div>
                    </div>
                </div>

                <!-- Right Form Column (Clean Registration Form) -->
                <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-center bg-white">
                    <div class="max-w-md mx-auto w-100 px-lg-3">
                        
                        <div class="mb-4">
                            <h3 class="display-6 fw-extrabold font-heading text-dark mb-1">Create Account</h3>
                            <p class="text-secondary small">Register to start ordering pure organic Desi Ghee.</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 mb-4 py-2.5 px-3">
                                <div class="fw-bold small mb-1"><i class="bi bi-exclamation-octagon-fill me-1"></i> Please fix the following errors:</div>
                                <ul class="mb-0 ps-3 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Full Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label text-uppercase fw-bold text-secondary extra-small mb-1">
                                    FULL NAME <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control rounded-3 py-2.5 px-3 bg-light border-light-subtle @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       placeholder="Rahul Sharma" 
                                       required 
                                       autofocus 
                                       style="background-color: #f0fdf4; border-color: #bbf7d0; color: #1e293b; font-weight: 500;">
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label text-uppercase fw-bold text-secondary extra-small mb-1">
                                    EMAIL ADDRESS <span class="text-danger">*</span>
                                </label>
                                <input type="email" 
                                       class="form-control rounded-3 py-2.5 px-3 bg-light border-light-subtle @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="name@example.com" 
                                       required 
                                       style="background-color: #f0fdf4; border-color: #bbf7d0; color: #1e293b; font-weight: 500;">
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone Field -->
                            <div class="mb-3">
                                <label for="phone" class="form-label text-uppercase fw-bold text-secondary extra-small mb-1">
                                    PHONE NUMBER <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control rounded-3 py-2.5 px-3 bg-light border-light-subtle @error('phone') is-invalid @enderror" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone') }}" 
                                       placeholder="+91 88378 82648" 
                                       required 
                                       style="background-color: #f0fdf4; border-color: #bbf7d0; color: #1e293b; font-weight: 500;">
                                @error('phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label text-uppercase fw-bold text-secondary extra-small mb-1">
                                    PASSWORD <span class="text-danger">*</span>
                                </label>
                                <input type="password" 
                                       class="form-control rounded-3 py-2.5 px-3 bg-light border-light-subtle @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Minimum 8 characters" 
                                       required 
                                       style="background-color: #f0fdf4; border-color: #bbf7d0; color: #1e293b; font-weight: 500;">
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label text-uppercase fw-bold text-secondary extra-small mb-1">
                                    CONFIRM PASSWORD <span class="text-danger">*</span>
                                </label>
                                <input type="password" 
                                       class="form-control rounded-3 py-2.5 px-3 bg-light border-light-subtle" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       placeholder="Re-enter password" 
                                       required 
                                       style="background-color: #f0fdf4; border-color: #bbf7d0; color: #1e293b; font-weight: 500;">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn text-white w-100 py-3 rounded-pill fw-bold text-uppercase shadow-sm mb-4 d-flex align-items-center justify-content-center gap-2" style="background-color: #054e36; border: none; letter-spacing: 0.5px;">
                                <i class="bi bi-person-plus-fill fs-5"></i> REGISTER ACCOUNT
                            </button>

                            <p class="text-center mb-0 text-secondary small">
                                Already have an account? <a href="{{ route('login') }}" class="fw-bold text-primary text-decoration-none">Sign in here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
