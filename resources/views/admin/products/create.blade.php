@extends('layouts.admin')

@section('title', 'Add New Product')

@section('breadcrumbs')
    <a href="{{ route('admin.products.index') }}" class="text-secondary text-decoration-none hover-dark">Products</a>
    <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
    <span class="text-dark fw-bold">Add Product</span>
@endsection

@section('content')
<div class="row g-4 justify-content-center">
    <div class="col-lg-11">
        <!-- Header Title Row -->
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
            <div>
                <h2 class="fw-bold font-heading mb-1 text-dark">Add New Product</h2>
                <p class="text-secondary small mb-0">Register a new organic ghee pack variant in the system</p>
            </div>
            <div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-light border rounded-pill px-4 py-2.5 font-heading fw-bold extra-small text-secondary shadow-2xs">
                    &larr; Back to List
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card border-0 rounded-4 shadow-sm bg-white p-4 p-md-5">
                <div class="row g-4">
                    <!-- SECTION 1: Product Information -->
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center shadow-2xs" style="width: 42px; height: 42px; background-color: #f0fdf4; color: #054e36; border: 1px solid #bbf7d0;">
                                <i class="bi bi-box-seam fs-5"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold font-heading mb-0 text-dark">Product Information</h5>
                                <span class="text-muted extra-small">Enter the basic details of the ghee product</span>
                            </div>
                        </div>

                        <div class="row g-3 ms-md-4 ps-md-3">
                            <div class="col-md-5">
                                <label for="name" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">PRODUCT NAME <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-pill py-2.5 px-3 extra-small bg-white @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Pure Organic Haldi Powder - 250g Jar" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="category" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">CATEGORY <span class="text-danger">*</span></label>
                                <select class="form-select rounded-pill py-2.5 px-3 extra-small bg-white @error('category') is-invalid @enderror" id="category" name="category" required>
                                    @foreach($categories as $key => $label)
                                        <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="weight" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">PACK / WEIGHT <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-pill py-2.5 px-3 extra-small bg-white @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}" placeholder="e.g. 500g Jar / 250g Pack" required>
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <label for="description" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">FULL DESCRIPTION</label>
                                <textarea class="form-control rounded-4 p-3 extra-small bg-white @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter complete details, churning methods, or nutritional specs...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 text-muted opacity-25">

                    <!-- SECTION 2: Pricing, Inventory & Image Upload -->
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center shadow-2xs" style="width: 42px; height: 42px; background-color: #f0fdf4; color: #054e36; border: 1px solid #bbf7d0;">
                                <i class="bi bi-tag fs-5"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold font-heading mb-0 text-dark">Pricing, Inventory & Product Image</h5>
                                <span class="text-muted extra-small">Configure retail price, stock level, and upload product photo</span>
                            </div>
                        </div>

                        <div class="row g-3 ms-md-4 ps-md-3">
                            <div class="col-md-4">
                                <label for="price" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">SELLING PRICE (₹) <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="form-control rounded-pill py-2.5 px-3 extra-small bg-white @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="899.00" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="original_price" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">ORIGINAL MRP (₹)</label>
                                <input type="number" step="0.01" class="form-control rounded-pill py-2.5 px-3 extra-small bg-white @error('original_price') is-invalid @enderror" id="original_price" name="original_price" value="{{ old('original_price') }}" placeholder="1099.00">
                                @error('original_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="stock" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">STOCK QUANTITY <span class="text-danger">*</span></label>
                                <input type="number" class="form-control rounded-pill py-2.5 px-3 extra-small bg-white @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', 100) }}" placeholder="100" required>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- DIRECT IMAGE FILE UPLOAD -->
                            <div class="col-12 mt-3">
                                <div class="p-3.5 rounded-4 bg-light border">
                                    <div class="row align-items-center g-3">
                                        <div class="col-md-7">
                                            <label for="image_file" class="form-label fw-extrabold text-dark extra-small text-uppercase tracking-wider d-flex align-items-center gap-1.5">
                                                <i class="bi bi-cloud-arrow-up-fill text-success fs-5"></i> UPLOAD PRODUCT IMAGE FILE
                                            </label>
                                            <input type="file" class="form-control rounded-pill py-2 px-3 extra-small bg-white @error('image_file') is-invalid @enderror" id="image_file" name="image_file" accept="image/*">
                                            <span class="text-muted extra-small d-block mt-1">Select an image file (JPG, PNG, WEBP) to upload directly from your computer (Max 5MB).</span>
                                            @error('image_file')
                                                <div class="invalid-feedback d-block extra-small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 border-start-md ps-md-4">
                                            <label for="image" class="form-label fw-extrabold text-secondary extra-small text-uppercase tracking-wider">OR IMAGE PATH / URL</label>
                                            <input type="text" class="form-control rounded-pill py-2 px-3 extra-small bg-white @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" placeholder="images/products/ghee-500g.png">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 text-muted opacity-25">

                    <!-- SECTION 3: Status & Participation -->
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center shadow-2xs" style="width: 42px; height: 42px; background-color: #dcfce7; color: #166534;">
                                <i class="bi bi-shield-check fs-5"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold font-heading mb-0 text-dark">Status & Participation</h5>
                                <span class="text-muted extra-small">Set the product visibility status on ORGANIC PUNJAB</span>
                            </div>
                        </div>

                        <div class="ms-md-4 ps-md-3">
                            <div class="p-3.5 rounded-4 bg-light border d-flex align-items-center gap-3">
                                <div class="form-check form-switch m-0 ps-5">
                                    <input class="form-check-input fs-4 cursor-pointer" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                </div>
                                <div>
                                    <strong class="d-block text-dark font-heading extra-small fw-bold">Active Status</strong>
                                    <span class="text-muted extra-small">Active products can be viewed & purchased on storefront</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FORM ACTIONS -->
                    <div class="col-12 pt-3">
                        <div class="d-flex align-items-center gap-3">
                            <button type="submit" class="btn text-white rounded-pill px-4 py-2.5 font-heading fw-bold extra-small shadow-sm d-inline-flex align-items-center gap-1.5" style="background-color: #054e36; border-color: #054e36;">
                                <i class="bi bi-check-lg fs-6"></i> SAVE PRODUCT
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light rounded-pill px-4 py-2.5 font-heading fw-bold extra-small text-secondary border">
                                &times; CANCEL
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
