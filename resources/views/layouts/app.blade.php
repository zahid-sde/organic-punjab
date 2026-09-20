<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ORGANIC PUNJAB') - 100% Pure Organic Desi Ghee & Homemade Spices</title>


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --desi-green: #054e36;
            --desi-green-hover: #033a28;
            --desi-green-dark: #022a1d;
            --desi-teal: #054e36;
            --desi-teal-light: #076d4c;
            --desi-amber: #d97706;
            --desi-amber-hover: #b45309;
            --desi-gold: #f59e0b;
            --desi-cream: #f2f9f5;
            --desi-dark: #022a1d;
            --desi-slate: #1e293b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Outfit', sans-serif;
        }

        /* Announcement Bar */
        .announcement-bar {
            background-color: var(--desi-green);
            color: #ecfdf5;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* Navbar */
        .navbar-brand-custom {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--desi-green) !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px -2px rgba(0, 0, 0, 0.05);
        }

        .btn-amber {
            background-color: var(--desi-amber);
            color: #ffffff;
            font-weight: 600;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-amber:hover {
            background-color: var(--desi-amber-hover);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(217, 119, 6, 0.3);
        }

        .btn-teal {
            background-color: var(--desi-green);
            color: #ffffff;
            font-weight: 600;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-teal:hover {
            background-color: var(--desi-green-hover);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(5, 78, 54, 0.3);
        }

        .btn-green-primary {
            background-color: var(--desi-green);
            color: #ffffff;
            font-weight: 600;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-green-primary:hover {
            background-color: var(--desi-green-hover);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(5, 78, 54, 0.3);
        }

        /* E-commerce Product Cards */
        .product-card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #ffffff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.03);
            border-color: #a7f3d0;
        }

        .product-img-wrapper {
            position: relative;
            background-color: #f2f9f5;
            padding: 1.5rem;
            text-align: center;
            overflow: hidden;
        }

        .product-img-wrapper img {
            max-height: 230px;
            width: auto;
            object-fit: contain;
            transition: transform 0.4s ease;
        }

        .product-card:hover .product-img-wrapper img {
            transform: scale(1.06);
        }

        .product-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.35em 0.8em;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 2;
        }

        .discount-tag {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #ef4444;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25em 0.6em;
            border-radius: 6px;
            z-index: 2;
        }

        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            background: #ffffff;
        }

        .badge-role-admin {
            background-color: #ef4444;
            color: #ffffff;
            font-weight: 600;
            padding: 0.45em 0.8em;
            border-radius: 6px;
        }

        .badge-role-customer {
            background-color: var(--desi-green);
            color: #ffffff;
            font-weight: 600;
            padding: 0.45em 0.8em;
            border-radius: 6px;
        }

        footer {
            margin-top: auto;
            background-color: var(--desi-green-dark);
            color: #94a3b8;
            padding: 3rem 0 1.5rem;
        }
    </style>
</head>
<body>


    <!-- 1. Top Header Navbar (Exact Organic India Style Cream Header) -->
    <header class="border-bottom py-3 sticky-top" style="z-index: 1030; background-color: #f7f3eb;">
        <div class="container">
            <div class="row align-items-center g-3">
                <!-- Left: Brand Emblem & Logo -->
                <div class="col-6 col-md-3 col-lg-3 d-flex align-items-center">
                    <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="ORGANIC PUNJAB Logo" class="img-fluid" style="height: 52px; width: auto; object-fit: contain;">
                    </a>
                </div>

                <!-- Center: Cream-Tinted Soft Pill Search Bar -->
                <div class="col-12 col-md-6 col-lg-6 mx-auto my-2 my-md-0">
                    <form id="globalSearchForm" onsubmit="return false;" class="position-relative">
                        <div class="input-group input-group-md rounded-pill overflow-hidden border-0 shadow-2xs" style="background-color: #ede3d1;">
                            <input type="text" id="navbarSearchInput" class="form-control border-0 ps-4 bg-transparent py-2.5" placeholder="Search" style="font-size: 0.95rem; color: #333;">
                            <button class="btn border-0 text-dark px-4 bg-transparent opacity-75" type="button" id="navbarSearchBtn">
                                <i class="bi bi-search fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right Action Icons (Account, Order Tracking, Shopping Bag) -->
                <div class="col-6 col-md-3 col-lg-3 d-flex align-items-center justify-content-end gap-3.5">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a class="btn btn-danger btn-sm rounded-pill px-3 py-1.5 fw-bold d-inline-flex align-items-center gap-1 shadow-2xs extra-small" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-shield-lock-fill"></i> Admin Panel
                            </a>
                        @else
                            <a class="text-dark fs-4 text-decoration-none p-1" href="{{ route('customer.dashboard') }}" title="My Account">
                                <i class="bi bi-person fs-4" style="color: #222;"></i>
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-light btn-sm rounded-circle p-2 text-danger border" title="Logout">
                                <i class="bi bi-box-arrow-right"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-dark fs-4 text-decoration-none p-1" title="Account Login">
                            <i class="bi bi-person fs-4" style="color: #222;"></i>
                        </a>
                    @endauth

                    <!-- Track Order Icon -->
                    <a href="{{ route('orders.track') }}" class="text-dark fs-4 text-decoration-none p-1" title="Track Order & Delivery">
                        <i class="bi bi-truck fs-4" style="color: #222;"></i>
                    </a>

                    <!-- Cart Bag Icon with Badge -->
                    <button type="button" class="btn p-1 border-0 bg-transparent text-dark position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas" title="Shopping Cart">
                        <i class="bi bi-bag fs-4" style="color: #222;"></i>
                        <span id="headerCartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark border border-white" style="font-size: 0.68rem;">
                            0
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. Secondary Navigation Links Bar (Exact Warm Cream Styling with Clean Spacing) -->
    <nav class="border-bottom py-2.5 d-none d-md-block" style="font-size: 0.92rem; background-color: #f7f3eb;">
        <div class="container d-flex align-items-center justify-content-center flex-wrap font-heading fw-bold" style="gap: 1.8rem;">
            <a href="{{ url('/#products-section') }}" class="text-decoration-none fw-extrabold" style="color: #058a47 !important;">Festive Special</a>
            <a href="{{ url('/#products-section') }}" class="text-dark text-decoration-none hover-teal">All Products</a>
            
            <div class="dropdown d-inline">
                <a class="text-dark text-decoration-none dropdown-toggle hover-teal" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Shop By Category
                </a>
                <ul class="dropdown-menu border-0 shadow-lg rounded-4 p-2 font-heading">
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Organic Desi Ghee</a></li>
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Green Mirchi Powder</a></li>
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Organic Haldi Powder</a></li>
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Organic Lal Mirch</a></li>
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Spices &amp; Oils</a></li>
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Herbal &amp; Wellness</a></li>
                </ul>
            </div>

            <div class="dropdown d-inline">
                <a class="text-dark text-decoration-none dropdown-toggle hover-teal" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Shop By Condition
                </a>
                <ul class="dropdown-menu border-0 shadow-lg rounded-4 p-2 font-heading">
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Immunity Booster</a></li>
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Digestive Health</a></li>
                    <li><a class="dropdown-item rounded-3 extra-small fw-bold py-2" href="#products-section">Daily Nutrition</a></li>
                </ul>
            </div>

            <a href="{{ url('/#products-section') }}" class="text-dark text-decoration-none hover-teal">Super Saver Combos</a>
            <a href="{{ url('/#products-section') }}" class="text-dark text-decoration-none hover-teal">Shop By Goal</a>
        </div>
    </nav>

    <!-- Main Body Container -->
    <main>
        <!-- Flash Messages -->
        <div class="container pt-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <a class="text-decoration-none mb-3 d-inline-flex align-items-center gap-2" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="ORGANIC PUNJAB Logo" class="img-fluid bg-white rounded-circle p-1" style="height: 48px; width: auto; object-fit: contain;">
                    </a>
                    <p class="small text-secondary mb-3">Purest 100% Certified Organic Desi Cow Ghee, Green Mirchi Powder, Organic Haldi, and Traditional Spices straight from organic farms.</p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-secondary p-2"><i class="bi bi-shield-check text-warning me-1"></i> FSSAI Approved</span>
                        <span class="badge bg-secondary p-2"><i class="bi bi-award text-warning me-1"></i> ISO 9001:2015</span>
                        <span class="badge bg-secondary p-2"><i class="bi bi-patch-check text-warning me-1"></i> NPOP Organic</span>
                    </div>
                </div>

                <div class="col-6 col-lg-2 ms-auto">
                    <h6 class="fw-bold text-white mb-3">Shop Products</h6>
                    <ul class="list-unstyled small d-grid gap-2">
                        <li><a href="#products-section" class="text-secondary text-decoration-none">Organic Desi Ghee</a></li>
                        <li><a href="#products-section" class="text-secondary text-decoration-none">Green Mirchi Powder</a></li>
                        <li><a href="#products-section" class="text-secondary text-decoration-none">Organic Haldi Powder</a></li>
                        <li><a href="#products-section" class="text-secondary text-decoration-none">Mathania Lal Mirch</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-2">
                    <h6 class="fw-bold text-white mb-3">Customer Support</h6>
                    <ul class="list-unstyled small d-grid gap-2">
                        <li><a href="{{ route('login') }}" class="text-secondary text-decoration-none">My Account</a></li>
                        <li><a href="{{ route('register') }}" class="text-secondary text-decoration-none">Track Order</a></li>
                        <li><a href="#lab-reports" class="text-secondary text-decoration-none">Lab Certificates</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h6 class="fw-bold text-white mb-3">Subscribe to Offers</h6>
                    <p class="small text-secondary">Get 10% off your first order & health tips.</p>
                    <div class="input-group input-group-sm mb-2">
                        <input type="email" class="form-control bg-dark border-secondary text-white" placeholder="Your email address">
                        <button class="btn btn-warning text-dark font-heading fw-bold" type="button">Subscribe</button>
                    </div>
                </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-secondary">
                <p class="mb-0">&copy; {{ date('Y') }} ORGANIC PUNJAB. All rights reserved.</p>
                <div class="d-flex gap-3 mt-2 mt-md-0">
                    <span>Privacy Policy</span>
                    <span>Terms of Service</span>
                    <span>Shipping Policy</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Offcanvas Cart Drawer -->
    <div class="offcanvas offcanvas-end rounded-start-4 border-0 shadow-lg" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel" style="width: 400px; max-width: 90vw;">
        <div class="offcanvas-header border-bottom py-3" style="background-color: #f7f3eb;">
            <h5 class="offcanvas-title font-heading fw-extrabold text-dark d-flex align-items-center gap-2" id="cartOffcanvasLabel">
                <i class="bi bi-bag-check-fill text-success"></i> Shopping Cart
                <span id="drawerCartBadge" class="badge rounded-pill bg-success text-white font-heading extra-small ms-1">0 Items</span>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body d-flex flex-column p-0">
            <!-- Scrollable Items Container -->
            <div id="cartDrawerItems" class="flex-grow-1 overflow-y-auto p-3">
                <!-- Dynamic Cart Items Rendered via JS -->
            </div>

            <!-- Cart Summary & Checkout Footer -->
            <div class="border-top p-3 bg-light mt-auto" id="cartDrawerFooter">
                <!-- Coupon Input -->
                <div class="input-group input-group-sm mb-2">
                    <input type="text" id="couponCodeInput" class="form-control rounded-start-3 text-uppercase font-heading" placeholder="Coupon Code (e.g. ORGANIC10)">
                    <button class="btn btn-dark font-heading fw-bold px-3 rounded-end-3" type="button" onclick="applyCartCoupon()">Apply</button>
                </div>

                <div id="couponNoticeArea"></div>

                <!-- Subtotal, Discount & Shipping -->
                <div class="d-grid gap-1 font-heading extra-small fw-semibold mb-3">
                    <div class="d-flex justify-content-between text-secondary">
                        <span>Subtotal</span>
                        <span id="drawerSubtotal" class="text-dark fw-bold">₹0.00</span>
                    </div>
                    <div class="d-flex justify-content-between text-success" id="drawerDiscountRow" style="display: none !important;">
                        <span>Coupon Discount</span>
                        <span id="drawerDiscount">- ₹0.00</span>
                    </div>
                    <div class="d-flex justify-content-between text-secondary">
                        <span>Express Shipping</span>
                        <span id="drawerShipping" class="text-success fw-bold">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top fs-5 fw-extrabold text-dark">
                        <span>Total Amount</span>
                        <span id="drawerTotal" class="text-success" style="color: #058a47 !important;">₹0.00</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <a href="{{ route('checkout.index') }}" id="checkoutDrawerBtn" class="btn btn-success w-100 py-2.5 rounded-pill font-heading fw-extrabold shadow-sm d-flex align-items-center justify-content-center gap-2" style="background-color: #058a47; border-color: #058a47;">
                    PROCEED TO CHECKOUT <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Global Dynamic Cart Script -->
    <script>
        const CART_ROUTES = {
            index: "{{ route('cart.index') }}",
            add: "{{ route('cart.add') }}",
            update: "{{ route('cart.update') }}",
            remove: "{{ route('cart.remove') }}",
            clear: "{{ route('cart.clear') }}",
            coupon: "{{ route('cart.coupon') }}",
            checkout: "{{ route('checkout.index') }}",
            csrf: "{{ csrf_token() }}"
        };

        document.addEventListener('DOMContentLoaded', function() {
            refreshCart();
        });

        function refreshCart() {
            fetch(CART_ROUTES.index, {
                headers: { 'Accept': 'application/json' }
            })
            .then(res => res.json())
            .then(data => renderCartUI(data))
            .catch(err => console.error('Cart fetch error:', err));
        }

        function addToCart(productData) {
            fetch(CART_ROUTES.add, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CART_ROUTES.csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(productData)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    renderCartUI(data.cart);
                    const offcanvasEl = document.getElementById('cartOffcanvas');
                    if (offcanvasEl) {
                        const bsOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl);
                        bsOffcanvas.show();
                    }
                }
            })
            .catch(err => console.error('Add to cart error:', err));
        }

        function updateCartQty(itemKey, newQty) {
            fetch(CART_ROUTES.update, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CART_ROUTES.csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ item_key: itemKey, quantity: newQty })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    renderCartUI(data.cart);
                }
            });
        }

        function removeCartItem(itemKey) {
            fetch(CART_ROUTES.remove, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CART_ROUTES.csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ item_key: itemKey })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    renderCartUI(data.cart);
                }
            });
        }

        function applyCartCoupon() {
            const codeInput = document.getElementById('couponCodeInput');
            const code = codeInput ? codeInput.value.trim() : '';

            if (!code) return;

            fetch(CART_ROUTES.coupon, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CART_ROUTES.csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ code: code })
            })
            .then(res => res.json())
            .then(data => {
                const noticeArea = document.getElementById('couponNoticeArea');
                if (data.success) {
                    renderCartUI(data.cart);
                    if (noticeArea) noticeArea.innerHTML = `<div class="alert alert-success extra-small p-2 py-1 rounded mb-2">${data.message}</div>`;
                } else {
                    if (noticeArea) noticeArea.innerHTML = `<div class="alert alert-danger extra-small p-2 py-1 rounded mb-2">${data.message}</div>`;
                }
            });
        }

        function renderCartUI(cart) {
            const headerCount = document.getElementById('headerCartCount');
            const drawerBadge = document.getElementById('drawerCartBadge');
            if (headerCount) headerCount.textContent = cart.count || 0;
            if (drawerBadge) drawerBadge.textContent = `${cart.count || 0} Items`;

            const itemsContainer = document.getElementById('cartDrawerItems');
            if (!itemsContainer) return;

            const checkoutBtn = document.getElementById('checkoutDrawerBtn');

            if (!cart.items || cart.items.length === 0) {
                itemsContainer.innerHTML = `
                    <div class="text-center py-5 font-heading">
                        <i class="bi bi-bag-x display-4 text-muted opacity-50 d-block mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Your cart is empty</h6>
                        <p class="text-muted extra-small mb-3">Explore our 100% pure organic items</p>
                        <a href="${window.location.origin}/#products-section" class="btn btn-sm btn-success rounded-pill px-4 fw-bold extra-small" style="background-color: #058a47;" data-bs-dismiss="offcanvas">
                            Shop Products
                        </a>
                    </div>
                `;
                if (checkoutBtn) checkoutBtn.classList.add('disabled');
            } else {
                if (checkoutBtn) checkoutBtn.classList.remove('disabled');
                let html = '';
                cart.items.forEach(item => {
                    const imgUrl = item.image.startsWith('http') ? item.image : `${window.location.origin}/${item.image}`;
                    html += `
                        <div class="d-flex align-items-center gap-3 py-2.5 border-bottom border-light font-heading">
                            <img src="${imgUrl}" alt="${item.name}" class="rounded-3 border p-1 bg-white object-fit-contain" style="width: 54px; height: 54px;">
                            <div class="flex-grow-1" style="min-width: 0;">
                                <h6 class="fw-bold text-dark mb-0 extra-small text-truncate" style="line-height: 1.3;" title="${item.name}">${item.name}</h6>
                                <span class="badge bg-light text-dark border extra-small mt-1">${item.weight}</span>
                                <div class="text-success fw-extrabold extra-small mt-0.5">₹${parseFloat(item.price).toFixed(2)}</div>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <div class="input-group input-group-sm rounded-pill overflow-hidden border" style="width: 80px;">
                                    <button class="btn btn-light btn-sm border-0 px-2 text-dark" onclick="updateCartQty('${item.item_key}', ${item.quantity - 1})">-</button>
                                    <span class="form-control text-center border-0 px-1 py-1 extra-small fw-bold bg-transparent">${item.quantity}</span>
                                    <button class="btn btn-light btn-sm border-0 px-2 text-dark" onclick="updateCartQty('${item.item_key}', ${item.quantity + 1})">+</button>
                                </div>
                                <button class="btn btn-link text-danger p-1 text-decoration-none ms-1" onclick="removeCartItem('${item.item_key}')" title="Remove">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                });
                itemsContainer.innerHTML = html;
            }

            const drawerSubtotal = document.getElementById('drawerSubtotal');
            const drawerTotal = document.getElementById('drawerTotal');
            if (drawerSubtotal) drawerSubtotal.textContent = `₹${parseFloat(cart.subtotal).toFixed(2)}`;
            if (drawerTotal) drawerTotal.textContent = `₹${parseFloat(cart.total).toFixed(2)}`;

            const discountRow = document.getElementById('drawerDiscountRow');
            if (discountRow) {
                if (cart.discount > 0) {
                    discountRow.style.setProperty('display', 'flex', 'important');
                    document.getElementById('drawerDiscount').textContent = `- ₹${parseFloat(cart.discount).toFixed(2)}`;
                } else {
                    discountRow.style.setProperty('display', 'none', 'important');
                }
            }

            const shippingEl = document.getElementById('drawerShipping');
            if (shippingEl) {
                if (cart.shipping_fee === 0) {
                    shippingEl.textContent = 'FREE';
                    shippingEl.className = 'text-success fw-bold';
                } else {
                    shippingEl.textContent = `₹${parseFloat(cart.shipping_fee).toFixed(2)}`;
                    shippingEl.className = 'text-dark fw-bold';
                }
            }
        }
    </script>
</body>
</html>
