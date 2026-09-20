@extends('layouts.app')

@section('title', 'Sign In')

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
                            Handcrafted Pure Desi Ghee Directly From Organic Farms
                        </h2>

                        <!-- Description Paragraph -->
                        <p class="text-white-50 leading-relaxed mb-4 font-normal" style="font-size: 0.95rem;">
                            Empowering health-conscious households with 100% pure, lab-certified organic Desi Ghee. Traditional wooden churned purity delivered to your doorstep with complete batch traceability.
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

                <!-- Right Form Column (Clean Login Form) -->
                <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-center bg-white">
                    <div class="max-w-md mx-auto w-100 px-lg-3">
                        
                        <div class="mb-4">
                            <h3 class="display-6 fw-extrabold font-heading text-dark mb-1">Welcome Back</h3>
                            <p class="text-secondary small">Sign in to your Desi Ghee Store account.</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3 mb-4 py-2.5 px-3">
                                <div class="fw-bold small mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Authentication failed:</div>
                                <ul class="mb-0 ps-3 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

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
                                       placeholder="manager@dairy.com" 
                                       required 
                                       autofocus 
                                       style="background-color: #f0fdf4; border-color: #bbf7d0; color: #1e293b; font-weight: 500;">
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label text-uppercase fw-bold text-secondary extra-small mb-0">
                                        PASSWORD <span class="text-danger">*</span>
                                    </label>
                                    <a href="#" class="extra-small fw-bold text-decoration-none" style="color: #054e36;">Forgot password?</a>
                                </div>
                                <div class="position-relative">
                                    <input type="password" 
                                           class="form-control rounded-3 py-2.5 px-3 pe-5 bg-light border-light-subtle @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="••••••••••••" 
                                           required 
                                           style="background-color: #f0fdf4; border-color: #bbf7d0; color: #1e293b; font-weight: 500;">
                                    <button type="button" class="btn border-0 position-absolute end-0 top-50 translate-middle-y text-secondary pe-3" id="togglePasswordBtn">
                                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Session -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label small text-secondary fw-semibold" for="remember">
                                    Remember my active session
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn text-white w-100 py-3 rounded-pill fw-bold text-uppercase shadow-sm mb-4 d-flex align-items-center justify-content-center gap-2" style="background-color: #054e36; border: none; letter-spacing: 0.5px;">
                                <i class="bi bi-box-arrow-in-right fs-5"></i> SIGN IN TO STORE
                            </button>

                            <p class="text-center mb-0 text-secondary small">
                                Don't have an account? <a href="{{ route('register') }}" class="fw-bold text-primary text-decoration-none">Register here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePasswordBtn = document.getElementById('togglePasswordBtn');
        const passwordInput = document.getElementById('password');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');

        if (togglePasswordBtn && passwordInput && togglePasswordIcon) {
            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePasswordIcon.classList.toggle('bi-eye');
                togglePasswordIcon.classList.toggle('bi-eye-slash');
            });
        }
    });
</script>
@endsection
