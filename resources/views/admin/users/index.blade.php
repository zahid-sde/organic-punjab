@extends('layouts.admin')

@section('title', 'Registered Users Directory')

@section('breadcrumbs')
    <a href="{{ route('admin.users.index') }}" class="text-secondary text-decoration-none hover-dark">Users</a>
    <i class="bi bi-chevron-right text-muted" style="font-size: 0.75rem;"></i>
    <span class="text-dark fw-bold">Directory</span>
@endsection

@section('content')
<div class="row g-4">
    <!-- Header Title Row -->
    <div class="col-12">
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
            <div>
                <h2 class="fw-bold font-heading mb-1 text-dark">Registered Users Directory</h2>
                <p class="text-secondary small mb-0">Manage customer accounts, system permissions, and user access records</p>
            </div>
            <div>
                <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-semibold extra-small">
                    <i class="bi bi-person-lines-fill me-1" style="color: #054e36;"></i> {{ $stats['total_users'] }} Total Registered Users
                </span>
            </div>
        </div>
    </div>

    <!-- Search & Filter Card -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm bg-white p-4">
            <label class="form-label fw-extrabold extra-small text-uppercase tracking-wider text-secondary mb-2">SEARCH USERS</label>
            <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3">
                <div class="col-md-7">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control bg-white border-start-0 rounded-end-pill py-2.5 extra-small" placeholder="Search by name, email address or phone number..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="role" class="form-select bg-white rounded-pill py-2.5 extra-small">
                        <option value="">All Roles (Admins & Customers)</option>
                        <option value="customer" {{ request('role') === 'customer' ? 'selected' : '' }}>Customers Only</option>
                        <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admins Only</option>
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

    <!-- Users Data Table Card -->
    <div class="col-12">
        <div class="card border-0 rounded-4 shadow-sm overflow-hidden bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #ffffff; border-bottom: 2px solid #f1f5f9;">
                        <tr class="extra-small text-uppercase fw-extrabold text-secondary tracking-wider">
                            <th class="ps-4 py-3.5" style="width: 110px;">USER CODE</th>
                            <th class="py-3.5" style="min-width: 220px;">USER PROFILE</th>
                            <th class="py-3.5" style="min-width: 220px;">EMAIL / CONTACT</th>
                            <th class="py-3.5" style="width: 140px;">ACCESS ROLE</th>
                            <th class="py-3.5 text-center" style="width: 120px;">STATUS</th>
                            <th class="py-3.5 pe-4 text-end" style="width: 140px;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr style="border-bottom: 1px solid #f8fafc;">
                                <!-- USER CODE Pill -->
                                <td class="ps-4 py-3.5">
                                    <span class="badge rounded-3 px-3 py-2 font-heading fw-bold extra-small border" style="background-color: #f0fdf4; color: #054e36; border-color: #bbf7d0 !important; font-size: 0.78rem;">
                                        USR-00{{ $user->id }}
                                    </span>
                                </td>

                                <!-- USER PROFILE -->
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle text-white font-heading fw-bold d-flex align-items-center justify-content-center flex-shrink-0 shadow-2xs" style="width: 38px; height: 38px; background-color: #054e36; font-size: 0.85rem;">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <strong class="text-dark font-heading fw-bold d-block" style="font-size: 0.95rem;">{{ $user->name }}</strong>
                                            <span class="text-muted extra-small">Registered {{ $user->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- EMAIL / CONTACT -->
                                <td>
                                    <span class="text-dark d-block fw-medium extra-small">{{ $user->email }}</span>
                                    <span class="text-muted extra-small"><i class="bi bi-telephone me-1"></i>{{ $user->phone }}</span>
                                </td>

                                <!-- ACCESS ROLE -->
                                <td>
                                    @if($user->role === 'admin')
                                        <span class="badge rounded-pill text-white px-3 py-1.5 font-heading fw-bold extra-small" style="background-color: #054e36;">
                                            <i class="bi bi-shield-check me-1"></i> Admin
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-1.5 font-heading fw-bold extra-small border" style="background-color: #f0fdf4; color: #054e36; border-color: #bbf7d0 !important;">
                                            <i class="bi bi-person me-1"></i> Customer
                                        </span>
                                    @endif
                                </td>

                                <!-- STATUS -->
                                <td class="text-center">
                                    <span class="badge rounded-pill px-3 py-1.5 font-heading fw-bold extra-small d-inline-flex align-items-center gap-1.5" style="background-color: #dcfce7; color: #166534; border: 1px solid #bbf7d0;">
                                        <span class="bg-success rounded-circle" style="width: 6px; height: 6px; display: inline-block;"></span> Active
                                    </span>
                                </td>

                                <!-- ACTIONS -->
                                <td class="pe-4 text-end">
                                    <div class="d-flex align-items-center justify-content-end gap-1.5 font-heading extra-small fw-bold">
                                        @if($user->id !== Auth::id())
                                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user account?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm rounded-pill px-2.5 py-1 extra-small font-heading fw-bold text-danger d-inline-flex align-items-center gap-1 border transition-all" style="background-color: #fef2f2; border-color: #fecaca !important;" title="Delete User">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        @else
                                            <span class="badge rounded-pill bg-light text-secondary border px-2.5 py-1 extra-small fw-bold">Current User</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-person-x fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                    No registered users found matching your search.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="card-footer bg-light py-3 px-4 border-top">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
