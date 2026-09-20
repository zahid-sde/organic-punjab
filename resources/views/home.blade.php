@extends('layouts.app')

@section('title', 'ORGANIC PUNJAB - 100% Pure Organic Desi Cow Ghee, Green Mirchi & Spices')

@section('content')

<!-- Organic India Style Hero Banner (Matching User Reference Image) -->
<div class="container pt-3 mb-4">
    <div class="rounded-4 overflow-hidden border shadow-sm position-relative p-4 p-md-5" style="background-color: #f7f3eb; background-image: radial-gradient(#e5dec9 1px, transparent 1px); background-size: 24px 24px;">
        <!-- Leaf Corner Decorations -->
        <i class="bi bi-leaf-fill text-success opacity-25 display-4 position-absolute top-0 start-0 m-3 d-none d-sm-block" style="color: #058a47 !important; transform: rotate(-45deg);"></i>
        <i class="bi bi-leaf-fill text-success opacity-25 display-4 position-absolute top-0 end-0 m-3 d-none d-sm-block" style="color: #058a47 !important; transform: rotate(45deg);"></i>
        
        <div class="row align-items-center g-4 position-relative" style="z-index: 2;">
            <!-- Left Side Banner Offer Text -->
            <div class="col-md-6 ps-md-4 text-center text-md-start">
                <h3 class="fw-normal text-dark text-uppercase tracking-wider mb-1 font-heading" style="letter-spacing: 0.15em; color: #2d3748; font-size: 1.75rem;">ENJOY</h3>
                
                <!-- Green Box Frame around 10% OFF* -->
                <div class="d-inline-block border border-3 border-success px-4 py-2 my-2 rounded-3 bg-white shadow-2xs" style="border-color: #058a47 !important;">
                    <span class="display-2 fw-extrabold font-heading mb-0 text-nowrap" style="color: #058a47; font-weight: 900; letter-spacing: -0.02em;">10% OFF*</span>
                </div>
                
                <h2 class="fw-extrabold text-dark text-uppercase tracking-tight font-heading mt-1 mb-2" style="font-size: 2rem; color: #1a202c; letter-spacing: 0.02em;">ON ALL PRODUCTS</h2>
                <p class="fw-bold text-secondary mb-3 fs-6">MINIMUM ORDER VALUE INR 399/-</p>

                <!-- Green Ribbon Banner Coupon Code -->
                <div class="pt-1">
                    <div class="d-inline-flex align-items-center bg-success text-white fw-extrabold px-4 py-2.5 rounded-2 shadow-sm" style="background-color: #058a47 !important; font-size: 1.1rem; letter-spacing: 0.08em;">
                        <span class="me-2 text-uppercase opacity-90">USE CODE :</span>
                        <span class="bg-white text-success px-2.5 py-1 rounded-1 font-heading fw-black" style="color: #058a47;">ORGANIC10</span>
                    </div>
                </div>
            </div>

            <!-- Right Side Banner Logo & Organic Product Lineup -->
            <div class="col-md-6 text-center pe-md-4">
                <!-- ORGANIC PUNJAB Logo Badge -->
                <div class="mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="ORGANIC PUNJAB Logo" class="mb-2 bg-white rounded-circle p-1 shadow-2xs" style="height: 64px; width: auto; object-fit: contain;">
                    <h2 class="fw-black text-success font-heading mb-0 tracking-wider" style="color: #058a47 !important; font-size: 2.2rem;">ORGANIC PUNJAB</h2>
                    <div class="extra-small fw-extrabold text-success tracking-widest text-uppercase d-flex align-items-center justify-content-center gap-1.5 mt-1" style="color: #058a47 !important;">
                        <i class="bi bi-arrow-right-short fs-6"></i> HEALTHY CONSCIOUS LIVING <i class="bi bi-arrow-left-short fs-6"></i>
                    </div>
                </div>

                <!-- Showcase Row of Organic Products on Table Base -->
                <div class="p-3 bg-white bg-opacity-75 rounded-4 shadow-sm border border-warning border-opacity-50">
                    <div class="row row-cols-4 g-2 align-items-center justify-content-center">
                        <div class="col text-center">
                            <img src="{{ asset('images/products/ghee-1kg.png') }}" alt="Organic Cow Ghee" class="img-fluid rounded-3 shadow-2xs" style="max-height: 90px; object-fit: contain;">
                            <span class="d-block extra-small fw-bold text-dark mt-1" style="font-size: 0.65rem;">Desi Cow Ghee</span>
                        </div>
                        <div class="col text-center">
                            <img src="{{ asset('images/products/green-mirchi.jpg') }}" alt="Green Mirchi Powder" class="img-fluid rounded-3 shadow-2xs" style="max-height: 90px; object-fit: contain;">
                            <span class="d-block extra-small fw-bold text-dark mt-1" style="font-size: 0.65rem;">Green Mirchi</span>
                        </div>
                        <div class="col text-center">
                            <img src="{{ asset('images/products/haldi-powder.jpg') }}" alt="Organic Haldi" class="img-fluid rounded-3 shadow-2xs" style="max-height: 90px; object-fit: contain;">
                            <span class="d-block extra-small fw-bold text-dark mt-1" style="font-size: 0.65rem;">Organic Haldi</span>
                        </div>
                        <div class="col text-center">
                            <img src="{{ asset('images/products/lal-mirch.jpg') }}" alt="Lal Mirch" class="img-fluid rounded-3 shadow-2xs" style="max-height: 90px; object-fit: contain;">
                            <span class="d-block extra-small fw-bold text-dark mt-1" style="font-size: 0.65rem;">Lal Mirch</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Trust Highlights & Organic Guarantee Bar -->
<div class="container mb-4">
    <div class="bg-white rounded-4 p-3 shadow-2xs border">
        <div class="row row-cols-2 row-cols-md-4 g-3 text-center align-items-center">
            <div class="col border-end-md">
                <div class="d-flex align-items-center justify-content-center gap-2.5">
                    <div class="rounded-circle bg-success-subtle text-success p-2.5 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-patch-check-fill fs-4" style="color: #058a47;"></i>
                    </div>
                    <div class="text-start">
                        <h6 class="fw-bold font-heading mb-0 extra-small text-dark">100% Organic</h6>
                        <span class="text-muted extra-small" style="font-size: 0.7rem;">NPOP & USDA Certified</span>
                    </div>
                </div>
            </div>
            <div class="col border-end-md">
                <div class="d-flex align-items-center justify-content-center gap-2.5">
                    <div class="rounded-circle bg-warning-subtle text-warning p-2.5 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-award-fill fs-4 text-warning"></i>
                    </div>
                    <div class="text-start">
                        <h6 class="fw-bold font-heading mb-0 extra-small text-dark">Traditional Bilona</h6>
                        <span class="text-muted extra-small" style="font-size: 0.7rem;">A2 Vedic Cow Ghee</span>
                    </div>
                </div>
            </div>
            <div class="col border-end-md">
                <div class="d-flex align-items-center justify-content-center gap-2.5">
                    <div class="rounded-circle bg-info-subtle text-info p-2.5 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-shield-check fs-4 text-info"></i>
                    </div>
                    <div class="text-start">
                        <h6 class="fw-bold font-heading mb-0 extra-small text-dark">Lab Tested</h6>
                        <span class="text-muted extra-small" style="font-size: 0.7rem;">Zero Preservatives</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="d-flex align-items-center justify-content-center gap-2.5">
                    <div class="rounded-circle bg-danger-subtle text-danger p-2.5 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-truck fs-4 text-danger"></i>
                    </div>
                    <div class="text-start">
                        <h6 class="fw-bold font-heading mb-0 extra-small text-dark">Fast Shipping</h6>
                        <span class="text-muted extra-small" style="font-size: 0.7rem;">Express Pan-India</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main E-Commerce Catalog Layout (All 16 Organic Products on 1 Page) -->
<div class="container py-2 mb-5" id="products-section">
    <!-- Top Filter Bar & Product Count Header (Matching Reference Screenshot) -->
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-3 px-2">
        <div class="d-flex align-items-center gap-2">
            <span class="fw-bold font-heading text-dark fs-6">Filter: <i class="bi bi-sliders ms-1"></i></span>
            <span class="mx-2 text-muted">|</span>
            <label for="sortDropdown" class="fw-bold font-heading text-dark mb-0 extra-small">Sort by:</label>
            <select id="sortDropdown" class="form-select form-select-sm rounded-3 border px-3 py-1.5 extra-small font-heading fw-bold bg-white" style="width: auto; min-width: 140px;">
                <option value="featured" selected>Best selling</option>
                <option value="price_low">Price: Low to High</option>
                <option value="price_high">Price: High to Low</option>
                <option value="rating">Customer Rating</option>
            </select>
        </div>
        <div class="text-center text-sm-end">
            <span id="productCounterText" class="fw-bold text-dark font-heading fs-6">Showing 1– 16 of {{ count($products) }} products</span>
        </div>
    </div>

    <div class="row g-4">
        <!-- LEFT SIDEBAR: Filters (Category Checkboxes, Price Range, Availability) -->
        <aside class="col-lg-3">
            <div class="card border-0 rounded-4 p-4 sticky-top shadow-2xs" style="top: 90px; z-index: 10; background-color: #f4ebd9;">
                <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom border-dark border-opacity-10">
                    <h6 class="fw-extrabold font-heading mb-0 text-dark d-flex align-items-center justify-content-between w-100 fs-5">
                        <span>Category</span>
                        <i class="bi bi-chevron-up fs-6 text-secondary"></i>
                    </h6>
                </div>

                <!-- CATEGORY FILTER CHECKBOXES -->
                <div class="mb-4">
                    <div class="d-flex flex-column gap-3 text-dark font-heading extra-small fw-semibold">
                        <div class="form-check">
                            <input class="form-check-input category-checkbox rounded-1 border-secondary" type="checkbox" value="desi_ghee" id="cat_ghee">
                            <label class="form-check-label cursor-pointer text-dark fw-bold fs-6" for="cat_ghee">
                                Organic Cow Ghee <span class="text-muted fw-normal">(4)</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input category-checkbox rounded-1 border-secondary" type="checkbox" value="green_mirchi" id="cat_green_mirchi">
                            <label class="form-check-label cursor-pointer text-dark fw-bold fs-6" for="cat_green_mirchi">
                                Green Mirchi Powder <span class="text-muted fw-normal">(2)</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input category-checkbox rounded-1 border-secondary" type="checkbox" value="haldi" id="cat_haldi">
                            <label class="form-check-label cursor-pointer text-dark fw-bold fs-6" for="cat_haldi">
                                Organic Haldi (Turmeric) <span class="text-muted fw-normal">(2)</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input category-checkbox rounded-1 border-secondary" type="checkbox" value="lal_mirch" id="cat_lal_mirch">
                            <label class="form-check-label cursor-pointer text-dark fw-bold fs-6" for="cat_lal_mirch">
                                Organic Lal Mirch <span class="text-muted fw-normal">(2)</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input category-checkbox rounded-1 border-secondary" type="checkbox" value="spices" id="cat_spices">
                            <label class="form-check-label cursor-pointer text-dark fw-bold fs-6" for="cat_spices">
                                Spices &amp; Oils <span class="text-muted fw-normal">(4)</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input category-checkbox rounded-1 border-secondary" type="checkbox" value="herbal_wellness" id="cat_herbal">
                            <label class="form-check-label cursor-pointer text-dark fw-bold fs-6" for="cat_herbal">
                                Herbal &amp; Wellness <span class="text-muted fw-normal">(2)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <hr class="text-dark opacity-10 my-3">

                <!-- PRICE RANGE FILTER -->
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase extra-small text-secondary tracking-wider mb-2.5">Price Range</h6>
                    <div class="d-flex flex-column gap-2 extra-small text-dark font-heading fw-semibold">
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="priceRange" value="all" id="price_all" checked>
                            <label class="form-check-label cursor-pointer" for="price_all">All Prices</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="priceRange" value="under_300" id="price_300">
                            <label class="form-check-label cursor-pointer" for="price_300">Under ₹300</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="priceRange" value="300_600" id="price_300_600">
                            <label class="form-check-label cursor-pointer" for="price_300_600">₹300 - ₹600</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="priceRange" value="above_600" id="price_above_600">
                            <label class="form-check-label cursor-pointer" for="price_above_600">Above ₹600</label>
                        </div>
                    </div>
                </div>

                <button type="button" id="resetFiltersBtn" class="btn btn-outline-dark btn-sm rounded-pill w-100 fw-bold extra-small mt-2">
                    Reset All Filters
                </button>
            </div>
        </aside>

        <!-- RIGHT MAIN CONTENT: Product Cards Grid -->
        <main class="col-lg-9">
            <!-- PRODUCT CARDS GRID (Exact Reference 4-Column Grid - Showing All 16 Products) -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-3.5" id="products-grid">
                @foreach($products as $product)
                    <div class="col product-card-item" 
                         data-category="{{ $product['category'] }}" 
                         data-price="{{ $product['price'] }}"
                         data-name="{{ strtolower($product['name']) }}">
                        <div class="product-card h-100 d-flex flex-column border-0 bg-transparent">
                            <!-- Image Container & Discount Pill (Warm Tan Background Container matching Screenshot) -->
                            <div class="product-img-wrapper position-relative text-center p-3 rounded-4 shadow-2xs mb-2 overflow-hidden" style="background-color: #f4ebd9; height: 240px;">
                                <span class="discount-tag shadow-2xs" style="position: absolute; top: 12px; left: 12px; z-index: 2; background-color: #e5b94c; color: #1a1a1a; font-weight: 800; font-size: 0.78rem; padding: 4px 10px; border-radius: 12px;">
                                    {{ $product['discount'] }}
                                </span>
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid h-100 object-fit-contain py-2" style="transition: transform 0.3s ease;">
                            </div>

                            <!-- Card Contents -->
                            <div class="px-1 py-2 d-flex flex-column flex-grow-1">
                                <!-- Product Title -->
                                <h6 class="fw-extrabold text-dark mb-1 font-heading" style="font-size: 0.95rem; line-height: 1.35; height: 2.7em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                    {{ $product['name'] }}
                                </h6>

                                <!-- Star Rating -->
                                <div class="d-flex align-items-center gap-1 mb-2">
                                    <div class="text-warning extra-small">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="fw-bold extra-small text-dark">{{ $product['rating'] }}</span>
                                    <span class="text-muted extra-small">({{ $product['reviews_count'] }})</span>
                                </div>

                                <!-- Price Display -->
                                <div class="d-flex align-items-baseline gap-2 mb-2">
                                    <span class="fs-5 fw-extrabold text-dark font-heading product-price-display">₹{{ number_format($product['price']) }}</span>
                                    @if($product['original_price'])
                                        <span class="text-muted text-decoration-line-through extra-small">₹{{ number_format($product['original_price']) }}</span>
                                    @endif
                                </div>

                                <!-- Pack Size Selector Dropdown -->
                                <div class="mb-3">
                                    <select class="form-select form-select-sm rounded-3 extra-small bg-white border pack-size-select" style="font-size: 0.78rem;">
                                        <option value="{{ $product['price'] }}" data-weight="{{ $product['weight'] }}" selected>{{ $product['weight'] }} - ₹{{ number_format($product['price']) }}</option>
                                        @if($product['original_price'])
                                            <option value="{{ round($product['price'] * 0.6) }}" data-weight="Trial Pack (100g)">Trial Pack - ₹{{ number_format(round($product['price'] * 0.6)) }}</option>
                                        @endif
                                    </select>
                                </div>

                                <!-- Full Width Dark Green ADD TO CART Button -->
                                <button class="btn w-100 py-2 rounded-pill font-heading fw-bold extra-small text-white add-to-cart-btn mt-auto" 
                                        style="background-color: #058a47; border-color: #058a47; letter-spacing: 0.03em;"
                                        data-name="{{ $product['name'] }}" 
                                        data-price="{{ $product['price'] }}"
                                        data-weight="{{ $product['weight'] }}"
                                        data-image="{{ $product['image'] }}">
                                    <i class="bi bi-bag-plus-fill me-1"></i> ADD TO CART
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</div>

<!-- Bottom Newsletter Subscription Bar (Matching Reference Footer Bar) -->
<section class="py-4 text-white" style="background-color: #043927;">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-md-6">
                <h5 class="fw-bold font-heading mb-1 text-white">Sign Up To Get Updates & Offers</h5>
                <p class="small text-white-50 mb-0">Subscribe to receive 10% off your first order & weekly organic health tips.</p>
            </div>
            <div class="col-md-6">
                <form onsubmit="return false;" class="d-flex gap-2">
                    <input type="email" class="form-control rounded-pill px-3 py-2 extra-small border-0 bg-white" placeholder="Enter your email address...">
                    <button class="btn btn-warning rounded-pill px-4 py-2 font-heading fw-bold extra-small text-dark text-uppercase tracking-wider flex-shrink-0">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Cart Toast & Live Filter JavaScript -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1100;">
    <div id="cartToast" class="toast align-items-center text-white bg-dark border-0 rounded-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill text-warning fs-4"></i>
                <div>
                    <strong id="toastProductName" class="d-block text-white">Product</strong>
                    <span class="small text-light">Added to your shopping cart!</span>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let cartCount = 0;
        const headerCartCount = document.getElementById('headerCartCount');
        const cartToastEl = document.getElementById('cartToast');
        const toastProductName = document.getElementById('toastProductName');
        const toast = new bootstrap.Toast(cartToastEl);

        // Add to Cart Logic
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function() {
                const name = this.getAttribute('data-name');
                const price = parseFloat(this.getAttribute('data-price'));
                const weight = this.getAttribute('data-weight');
                const image = this.getAttribute('data-image');

                addToCart({
                    name: name,
                    price: price,
                    weight: weight,
                    image: image,
                    quantity: 1
                });
            });
        });

        // Live Pack Size Price Update
        document.querySelectorAll('.pack-size-select').forEach(select => {
            select.addEventListener('change', function() {
                const card = this.closest('.product-card');
                const priceDisplay = card.querySelector('.product-price-display');
                const btn = card.querySelector('.add-to-cart-btn');
                const selectedOption = this.options[this.selectedIndex];
                const weight = selectedOption.getAttribute('data-weight') || 'Standard Pack';

                if (priceDisplay && this.value) {
                    priceDisplay.textContent = '₹' + parseFloat(this.value).toLocaleString('en-IN');
                }

                if (btn) {
                    btn.setAttribute('data-price', this.value);
                    btn.setAttribute('data-weight', weight);
                }
            });
        });

        // Live Search & Category Filtering
        const categoryCheckboxes = document.querySelectorAll('.category-checkbox');
        const priceRadios = document.querySelectorAll('.price-radio');
        const inStockCheckbox = document.getElementById('inStockOnly');
        const navbarSearchInput = document.getElementById('navbarSearchInput');
        const sortDropdown = document.getElementById('sortDropdown');
        const productItems = document.querySelectorAll('.product-card-item');
        const productCounterText = document.getElementById('productCounterText');
        const resetFiltersBtn = document.getElementById('resetFiltersBtn');

        function filterProducts() {
            // Selected Categories
            const selectedCategories = Array.from(categoryCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            // Selected Price Range
            let selectedPriceRange = 'all';
            priceRadios.forEach(r => {
                if (r.checked) selectedPriceRange = r.value;
            });

            // Search Keyword
            const keyword = navbarSearchInput ? navbarSearchInput.value.toLowerCase().trim() : '';

            let visibleCount = 0;

            productItems.forEach(item => {
                const category = item.getAttribute('data-category');
                const price = parseFloat(item.getAttribute('data-price'));
                const name = item.getAttribute('data-name');

                let matchesCat = (selectedCategories.length === 0) || selectedCategories.includes(category);
                
                let matchesPrice = true;
                if (selectedPriceRange === 'under_300') matchesPrice = (price < 300);
                else if (selectedPriceRange === '300_600') matchesPrice = (price >= 300 && price <= 600);
                else if (selectedPriceRange === 'above_600') matchesPrice = (price > 600);

                let matchesKeyword = (!keyword || name.includes(keyword) || category.includes(keyword));

                if (matchesCat && matchesPrice && matchesKeyword) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (productCounterText) {
                productCounterText.textContent = `Showing ${visibleCount} products`;
            }
        }

        categoryCheckboxes.forEach(cb => cb.addEventListener('change', filterProducts));
        priceRadios.forEach(r => r.addEventListener('change', filterProducts));
        if (navbarSearchInput) {
            navbarSearchInput.addEventListener('input', filterProducts);
        }

        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', function() {
                categoryCheckboxes.forEach(cb => cb.checked = false);
                document.getElementById('price_all').checked = true;
                if (navbarSearchInput) navbarSearchInput.value = '';
                filterProducts();
            });
        }
    });
</script>

@endsection
