<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - ORGANIC PUNJAB</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts (Outfit & Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --brand-primary: #054e36;
            --brand-dark: #033a28;
            --brand-accent: #fde68a;
            --bg-canvas: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            color: #1e293b;
            min-height: 100vh;
        }

        .font-heading {
            font-family: 'Outfit', sans-serif;
        }

        /* Sidebar Styling */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 270px;
            background: linear-gradient(180deg, #054e36 0%, #033a28 100%);
            color: #ffffff;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-menu {
            padding: 1.25rem 0.85rem;
            flex-grow: 1;
        }

        .menu-header {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(255, 255, 255, 0.5);
            padding: 0.85rem 1rem 0.4rem;
        }

        .nav-link-admin {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.82);
            font-weight: 600;
            font-size: 0.92rem;
            border-radius: 0.65rem;
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 0.2rem;
        }

        .nav-link-admin:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.12);
            transform: translateX(3px);
        }

        .nav-link-admin.active {
            color: #054e36;
            background: #fde68a;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(253, 230, 138, 0.3);
        }

        .admin-main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .admin-topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.85rem 2rem;
        }

        .extra-small {
            font-size: 0.78rem;
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar Navigation -->
        <aside class="admin-sidebar">
            <div>
                <!-- Brand Logo -->
                <!-- Brand Logo Area -->
                <div class="sidebar-brand d-flex align-items-center justify-content-between">
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none d-flex align-items-center gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="ORGANIC PUNJAB Logo" style="height: 36px; width: auto;" class="bg-white p-1 rounded-circle">
                        <span class="fw-extrabold font-heading text-white fs-5 tracking-tight">ORGANIC PUNJAB<span style="color: #fde68a;">.</span></span>
                    </a>
                    <span class="badge bg-white bg-opacity-20 text-white extra-small px-2 py-1 rounded-pill">Admin</span>
                </div>

                <!-- Navigation Links -->
                <div class="sidebar-menu">
                    <div class="menu-header">Core Management</div>
                    
                    <a href="{{ route('admin.dashboard') }}" class="nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.products.index') }}" class="nav-link-admin {{ request()->routeIs('admin.products.index') || request()->routeIs('admin.products.show') ? 'active' : '' }}">
                        <i class="bi bi-box-seam-fill"></i>
                        <span>All Products</span>
                    </a>

                    <a href="{{ route('admin.products.create') }}" class="nav-link-admin {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle-fill"></i>
                        <span>Add New Product</span>
                    </a>

                    <div class="menu-header mt-3">User & Security</div>

                    <a href="{{ route('admin.users.index') }}" class="nav-link-admin {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Users Directory</span>
                    </a>

                    <div class="menu-header mt-3">Store Navigation</div>

                    <a href="{{ url('/') }}" target="_blank" class="nav-link-admin">
                        <i class="bi bi-shop me-1"></i>
                        <span>View Storefront</span>
                        <i class="bi bi-arrow-up-right small ms-auto opacity-75"></i>
                    </a>
                </div>
            </div>

            <!-- Footer / User Badge -->
            <div class="p-3 border-top border-white border-opacity-10">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <div class="bg-warning text-dark rounded-circle fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; font-size: 0.85rem;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                        </div>
                        <div class="overflow-hidden">
                            <div class="fw-bold text-white extra-small text-truncate">{{ Auth::user()->name ?? 'Admin User' }}</div>
                            <div class="text-white-50 extra-small text-truncate" style="font-size: 0.7rem;">Store Admin</div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light border-0 rounded-circle text-white-50 hover-white p-1" title="Sign Out">
                            <i class="bi bi-box-arrow-right fs-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="admin-main">
            <!-- Topbar Navigation Header (Matching Reference Screenshot) -->
            <header class="admin-topbar d-flex flex-wrap align-items-center justify-content-between gap-3 bg-white border-bottom px-4 py-3">
                <!-- Breadcrumbs -->
                <div class="d-flex align-items-center gap-2 text-secondary extra-small fw-semibold">
                    <a href="{{ route('admin.dashboard') }}" class="text-secondary text-decoration-none hover-dark">Home</a>
                    <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
                    @yield('breadcrumbs')
                </div>

                <!-- Right Utility Badges & User Profile -->
                <div class="d-flex align-items-center gap-2.5">
                    <!-- Date & Shift Pill -->
                    <div class="d-inline-flex align-items-center gap-2 bg-light border rounded-pill px-3 py-1.5 extra-small font-heading">
                        <span class="fw-bold" style="color: #054e36;"><i class="bi bi-calendar-event me-1"></i> {{ date('D, M j, Y') }}</span>
                        <span class="text-muted">•</span>
                        <span class="badge rounded-pill fw-bold text-dark-emphasis px-2 py-0.5" style="background-color: #fef08a; color: #854d0e !important; font-size: 0.7rem;">MORNING SHIFT</span>
                    </div>

                    <!-- Role Badge -->
                    <span class="badge rounded-3 px-3 py-2 fw-bold extra-small border" style="background-color: #f0fdf4; color: #054e36; border-color: #bbf7d0 !important;">
                        Manager
                    </span>

                    <!-- User Profile Avatar Pill -->
                    <div class="dropdown">
                        <button class="btn btn-link text-decoration-none p-0 d-flex align-items-center gap-2 text-dark dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="rounded-circle text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 38px; height: 38px; background-color: #054e36; font-size: 0.9rem;">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <div class="text-start d-none d-sm-block">
                                <span class="d-block fw-bold text-dark font-heading lh-sm" style="font-size: 0.85rem;">{{ Auth::user()->name ?? 'Store Admin' }}</span>
                                <span class="d-block text-muted extra-small" style="font-size: 0.72rem;">{{ Auth::user()->email ?? 'admin@desighee.com' }}</span>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3 border-0 mt-2">
                            <li><a class="dropdown-item extra-small font-heading fw-semibold" href="{{ url('/') }}" target="_blank"><i class="bi bi-shop me-2 text-success"></i> Storefront View</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item extra-small font-heading fw-semibold text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Body Container -->
            <div class="p-4 p-md-5">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 bg-success-subtle text-success-emphasis mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0 mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
