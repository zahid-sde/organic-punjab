@extends('layouts.admin')

@section('title', 'Products Management')

@section('breadcrumbs')
    <a href="{{ route('admin.products.index') }}" class="text-secondary text-decoration-none hover-dark">Products</a>
    <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
    <span class="text-dark fw-bold">List</span>
@endsection

@section('content')
<div class="row g-4">
    <!-- Header Title & Action Button Row -->
    <div class="col-12">
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
            <div>
                <h2 class="fw-bold font-heading mb-1 text-dark">Products Management</h2>
                <p class="text-secondary small mb-0">Register and manage organic ghee products, weight packs, and storefront pricing</p>
            </div>
            <div>
                <a href="{{ route('admin.products.create') }}" class="btn text-white rounded-pill px-4 py-2.5 font-heading fw-bold shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #054e36; border-color: #054e36; font-size: 0.88rem; letter-spacing: 0.04em;">
                    <i class="bi bi-plus-lg fs-6"></i> ADD PRODUCT
                </a>
            </div>
        </div>
    </div>

    <!-- Search & Filter Card -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm bg-white p-4">
            <form method="GET" action="{{ route('admin.products.index') }}" class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label class="form-label fw-extrabold extra-small text-uppercase tracking-wider text-secondary mb-2">SEARCH PRODUCTS</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control bg-white border-start-0 rounded-end-pill py-2.5 extra-small" placeholder="Search by product name, pack weight or SKU code..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-extrabold extra-small text-uppercase tracking-wider text-secondary mb-2">CATEGORY FILTER</label>
                    <select name="category" class="form-select bg-white rounded-pill py-2.5 extra-small" onchange="this.form.submit()">
                        <option value="">All Organic Categories</option>
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn text-white rounded-pill w-100 py-2.5 font-heading fw-bold extra-small text-uppercase tracking-wider shadow-sm" style="background-color: #054e36; border-color: #054e36;">
                        FILTER
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm overflow-hidden bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #ffffff; border-bottom: 2px solid #f1f5f9;">
                        <tr class="extra-small text-uppercase fw-extrabold text-secondary tracking-wider">
                            <th class="ps-4 py-3.5" style="width: 140px;">SKU CODE</th>
                            <th class="py-3.5" style="min-width: 230px;">PRODUCT NAME</th>
                            <th class="py-3.5" style="width: 160px;">CATEGORY</th>
                            <th class="py-3.5" style="min-width: 180px;">PACK / WEIGHT</th>
                            <th class="py-3.5" style="width: 120px;">PRICE (₹)</th>
                            <th class="py-3.5 text-center" style="width: 110px;">STATUS</th>
                            <th class="py-3.5 pe-4 text-end" style="width: 220px;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr style="border-bottom: 1px solid #f8fafc;">
                                <!-- SKU CODE Pill -->
                                <td class="ps-4 py-3.5">
                                    <span class="badge rounded-3 px-3 py-2 font-heading fw-bold extra-small border" style="background-color: #f0fdf4; color: #054e36; border-color: #bbf7d0 !important; font-size: 0.78rem;">
                                        SKU-{{ strtoupper(str_replace(['-', ' '], '', $product->weight)) }}
                                    </span>
                                </td>

                                <!-- PRODUCT NAME -->
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-white rounded-3 p-1 border shadow-2xs d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; border-color: #e2e8f0 !important;">
                                            @if($product->image)
                                                <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid object-fit-contain" style="max-height: 34px;" onerror="this.onerror=null; this.src='https://via.placeholder.com/42?text=Product';">
                                            @else
                                                <i class="bi bi-box-seam text-secondary fs-5"></i>
                                            @endif
                                        </div>
                                        <strong class="text-dark font-heading fw-bold" style="font-size: 0.95rem;">{{ $product->name }}</strong>
                                    </div>
                                </td>

                                <!-- CATEGORY -->
                                <td>
                                    <span class="badge rounded-pill px-3 py-1.5 font-heading fw-bold extra-small border bg-light text-dark" style="font-size: 0.76rem;">
                                        <i class="bi bi-tag-fill me-1 text-success"></i> {{ $product->category_name }}
                                    </span>
                                </td>

                                <!-- PACK / WEIGHT -->
                                <td>
                                    <span class="badge bg-warning-subtle text-dark border border-warning font-heading extra-small fw-bold px-2.5 py-1">
                                        {{ $product->weight }}
                                    </span>
                                </td>

                                <!-- PRICE -->
                                <td>
                                    <span class="fw-bold text-dark font-heading" style="font-size: 0.95rem;">₹{{ number_format($product->price, 2) }}</span>
                                </td>

                                <!-- STATUS -->
                                <td class="text-center">
                                    @if($product->is_active)
                                        <span class="badge rounded-pill px-3 py-1.5 font-heading fw-bold extra-small d-inline-flex align-items-center gap-1.5" style="background-color: #dcfce7; color: #166534; border: 1px solid #bbf7d0;">
                                            <span class="bg-success rounded-circle" style="width: 6px; height: 6px; display: inline-block;"></span> Active
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-1.5 font-heading fw-bold extra-small bg-light text-secondary border">
                                            Hidden
                                        </span>
                                    @endif
                                </td>

                                <!-- ACTIONS -->
                                <td class="pe-4 text-end">
                                    <div class="d-flex align-items-center justify-content-end gap-1.5 font-heading extra-small fw-bold">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm rounded-pill px-2.5 py-1 extra-small font-heading fw-bold d-inline-flex align-items-center gap-1 text-decoration-none transition-all" style="background-color: #f0fdf4; color: #054e36; border: 1px solid #bbf7d0;" title="View Details">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm rounded-pill px-2.5 py-1 extra-small font-heading fw-bold d-inline-flex align-items-center gap-1 text-decoration-none transition-all" style="background-color: #fef3c7; color: #b45309; border: 1px solid #fde68a;" title="Edit Product">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" onsubmit="return confirm('Are you sure you want to delete this product?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm rounded-pill px-2.5 py-1 extra-small font-heading fw-bold text-danger d-inline-flex align-items-center gap-1 border transition-all" style="background-color: #fef2f2; border-color: #fecaca !important;" title="Delete Product">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                    No products found in the catalog.
                                    <div class="mt-3">
                                        <a href="{{ route('admin.products.create') }}" class="btn btn-sm text-white rounded-pill px-4" style="background-color: #054e36; border-color: #054e36;">
                                            Add First Product
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
                <div class="card-footer bg-light py-3 px-4 border-top">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
