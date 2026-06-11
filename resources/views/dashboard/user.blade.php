<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM</title>
    <meta name="description" content="3D Glassmorphism Dashboard Template by TemplateMo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admincss/admin.css') }}">

</head>

<body>
    <!-- Animated Background -->
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <span class="logo-text">GYM Wariors</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-section">
                    <span class="nav-section-title">Main Menu</span>
                    <ul>
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="3" width="7" height="7" rx="1" />
                                    <rect x="14" y="3" width="7" height="7" rx="1" />
                                    <rect x="3" y="14" width="7" height="7" rx="1" />
                                    <rect x="14" y="14" width="7" height="7" rx="1" />
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/dashboard/member') }}" class="nav-link active">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                                Member
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dashboard/paket') }}" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z" />
                                    <path d="M2 17l10 5 10-5" />
                                    <path d="M2 12l10 5 10-5" />
                                </svg>
                                Paket

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dashboard/trainer') }}" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="6" y1="12" x2="18" y2="12"></line>

                                    <rect x="4" y="8" width="2" height="8" rx="1"></rect>
                                    <rect x="2" y="10" width="2" height="4" rx="1"></rect>

                                    <rect x="18" y="8" width="2" height="8" rx="1"></rect>
                                    <rect x="20" y="10" width="2" height="4" rx="1"></rect>
                                </svg>
                                Paket Trainer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dashboard/paket') }}" class="nav-link">

                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                Featured

                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-section">
                    <span class="nav-section-title">Account</span>
                    <ul>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                                class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" y1="12" x2="9" y2="12" />
                                </svg>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>

                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>

                        <div class="user-role">
                            @if(auth()->user()->type == 1)
                            Owner
                            @elseif(auth()->user()->type == 2)
                            Admin
                            @else
                            Member @endif
                        </div>
                    </div>

                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navbar -->
            <nav class="navbar">
                <div class="page-header">
                    <h1 class="page-title">Users</h1>
                    <div class="page-breadcrumb">
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        <span>/</span>
                        <span>Users</span>
                    </div>
                </div>
                <div class="navbar-right">

                    <button class="nav-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                        <span class="notification-dot"></span>
                    </button>

                </div>
            </nav>
            <!-- Stats Cards -->
            <section class="stats-grid">
                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Total Users</h3>
                            <div class="stat-value">{{ number_format($totalUsers) }}</div>

                        </div>
                        <div class="stat-icon cyan">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--emerald-light)" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Active User</h3>
                            <div class="stat-value">{{ number_format($activeUsers) }}</div>

                        </div>

                        <div class="stat-icon success">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--success)" stroke-width="2">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>New Today</h3>
                            <div class="stat-value">{{ number_format($newToday) }}</div>

                        </div>
                        <div class="stat-icon success">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--success)" stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <line x1="20" y1="8" x2="20" y2="14" />
                                <line x1="23" y1="11" x2="17" y2="11" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Non-aktif User</h3>
                            <div class="stat-value">{{ number_format($inactiveUsers) }}</div>

                        </div>
                        <div class="stat-icon purple">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--coral)" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 6v6l4 2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Users Table -->
            <section class="content-grid" style="grid-template-columns: 1fr;">
                <div class="glass-card table-card" style="grid-column: span 1;">
                    <div class="card-header" style="flex-wrap: wrap;">
                        <div class="card-title">User Management</div>

                        <div class="card-actions" style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
                            <form action="{{ url()->current() }}" method="GET" style="display: flex; gap: 12px; align-items: center;">
                                <select name="sort_status" class="settings-select" onchange="this.form.submit()">
                                    <option value="">Sort by Status</option>
                                    <option value="asc" {{ request('sort_status') == 'asc' ? 'selected' : '' }}>Status (Non-aktif - Aktif)</option>
                                    <option value="desc" {{ request('sort_status') == 'desc' ? 'selected' : '' }}>Status (Aktif - Non-aktif)</option>
                                </select>

                                <div class="search-box">
                                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                    <input type="text" name="search" class="search-input" placeholder="Search name/email..." value="{{ request('search') }}">
                                </div>
                            </form>

                            <a href="{{ url('dashboard/member/create') }}" class="btn btn-primary" style="padding: 10px 20px; width: auto; font-size: 14px;">
                                + Add User
                            </a>
                        </div>
                    </div>

                    <div class="table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_user as $user)
                                <tr>
                                    <td>
                                        <div class="table-user">
                                            @php
                                            $initials = collect(explode(' ', $user->name))->map(function($segment) {
                                            return strtoupper(substr($segment, 0, 1));
                                            })->take(2)->join('');
                                            @endphp

                                            <div class="table-avatar" style="background: linear-gradient(135deg, var(--emerald-light), var(--emerald));">
                                                {{ $initials }}
                                            </div>
                                            <div class="table-user-info">
                                                <span class="table-user-name">{{ $user->name }}</span>
                                                <span class="table-user-email">{{ $user->email }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        {{ match((int) $user->type) {
                                            1 => 'Owner',
                                            2 => 'Admin',
                                            3 => 'Member',
                                            4 => 'Pelajar',
                                            default => 'Unknown'
                                        } }}
                                    </td>

                                    <td>
                                        @if($user->paket_id >= "1")
                                        <span class="status-badge completed">Aktif</span>
                                        @else
                                        <span class="status-badge pending">Non-Aktif</span>
                                        @endif
                                    </td>

                                    <td>{{ $user->created_at->format('M d, Y') }}</td>

                                    <td>
                                        <div style="display: flex ;">
                                            <a class="card-btn" href="/dashboard/member/{{$user->id}}/edit" style="padding: 6px 12px; margin-right: 1em;">Edit</a>
                                            <form action="/dashboard/member/{{$user->id}}" method="POST" id="form-delete-{{$user->id}}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" onclick="myFunction()" class="card-btn" style="color: #ff6b6b; border-color: rgba(255, 107, 107, 0.3);">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; padding: 30px;">
                                        No users found matching your criteria.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="pagination-container">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item {{ $data_user->onFirstPage() ? 'disabled' : '' }}">
                                        <a href="{{ $data_user->url(1) }}" class="page-link">First</a>
                                    </li>

                                    <li class="page-item {{ $data_user->onFirstPage() ? 'disabled' : '' }}">
                                        <a href="{{ $data_user->previousPageUrl() }}" class="page-link">‹</a>
                                    </li>

                                    @php
                                    $current = $data_user->currentPage();
                                    $last = $data_user->lastPage();
                                    $start = max(1, $current - 2);
                                    $end = min($last, $current + 2);
                                    @endphp

                                    @if ($start > 1)
                                    <li class="page-item"><a href="{{ $data_user->url(1) }}" class="page-link">1</a></li>
                                    @if ($start > 2)
                                    <li class="page-item disabled"><span class="page-link elipsis">…</span></li>
                                    @endif
                                    @endif

                                    @for ($i = $start; $i <= $end; $i++)
                                        <li class="page-item {{ $current == $i ? 'active' : '' }}">
                                        <a href="{{ $data_user->url($i) }}" class="page-link">{{ $i }}</a>
                                        </li>
                                        @endfor

                                        @if ($end < $last)
                                            @if ($end < $last - 1)
                                            <li class="page-item disabled"><span class="page-link elipsis">…</span></li>
                                            @endif
                                            <li class="page-item"><a href="{{ $data_user->url($last) }}" class="page-link">{{ $last }}</a></li>
                                            @endif

                                            <li class="page-item {{ !$data_user->hasMorePages() ? 'disabled' : '' }}">
                                                <a href="{{ $data_user->nextPageUrl() }}" class="page-link">›</a>
                                            </li>

                                            <li class="page-item {{ $current == $last ? 'disabled' : '' }}">
                                                <a href="{{ $data_user->url($last) }}" class="page-link">Last</a>
                                            </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <!-- Footer -->
    <footer class="site-footer">
        <p>Copyright © 2026 GYM. </p>
    </footer>

    <script src="{{ asset('assets/admincss/admin.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function myFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Kamu tidak bisa mengembalikan data yang di hapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                reverseButtons: true,

                customClass: {
                    cancelButton: 'swal-btn swal-btn-secondary',
                    confirmButton: 'swal-btn swal-btn-primary'

                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Di Hapus!',
                        'Datamu berhasil di hapus.',
                        'success',
                    )
                    form.submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Di batalkan',
                        'Data tidak di hapus',
                        'error'
                    )
                }
            })
        }
    </script>
</body>

</html>