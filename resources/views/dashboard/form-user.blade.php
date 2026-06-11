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
                            <a href="analytics.html" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2L2 7l10 5 10-5-10-5z" />
                                    <path d="M2 17l10 5 10-5" />
                                    <path d="M2 12l10 5 10-5" />
                                </svg>
                                Paket
                                <span class="nav-badge">New</span>
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

            <div class="glass-card" style="max-width: 900px; margin: 0 auto;">

                <div class="card-header" style="margin-bottom: 30px; border-bottom: 1px solid var(--glass-border); padding-bottom: 15px;">
                    <h2 class="card-title">{{ isset($user) ? 'Edit User' : 'Add New User' }}</h2>
                </div>

                <form action="{{ isset($user) ? url('dashboard/member/'.$user->id) : url('dashboard/member') }}" method="POST">
                    @csrf

                    @if(isset($user))
                    @method('PUT')
                    @endif

                    <div class="form-grid">

                        <div class="form-group-settings">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="form-group-settings">
                            <label>Email Address</label>
                            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required placeholder="email@contoh.com">
                        </div>

                        <div class="form-group-settings">
                            <label>{{ isset($user) ? 'New Password (kosongkan jika tidak diubah)' : 'Password' }}</label>
                            <input type="password" name="password" {{ isset($user) ? '' : 'required' }} placeholder="Minimal 8 karakter">
                        </div>

                        <div class="form-group-settings">
                            <label>Role</label>
                            <select name="type" class="settings-select" style="width: 100%;" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="1" {{ old('type', $user->type ?? '') == 1 ? 'selected' : '' }}>Owner</option>
                                <option value="2" {{ old('type', $user->type ?? '') == 2 ? 'selected' : '' }}>Admin</option>
                                <option value="3" {{ old('type', $user->type ?? '') == 3 ? 'selected' : '' }}>Member</option>
                                <option value="4" {{ old('type', $user->type ?? '') == 4 ? 'selected' : '' }}>Pelajar</option>
                            </select>
                        </div>

                        <div class="form-group-settings">
                            <label>Status</label>
                            <select name="status" class="settings-select" style="width: 100%;" required>
                                <option value="1" {{ old('status', $user->status ?? 1) == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('status', $user->status ?? 1) == 0 ? 'selected' : '' }}>Non-aktif</option>
                            </select>
                        </div>

                    </div>

                    <div class="btn-group" style="margin-top: 40px; justify-content: flex-end;">
                        <a href="{{ url('/dashboard/member') }}" class="btn btn-secondary" style="width: auto;">Cancel</a>
                        <button type="submit" class="btn btn-primary" style="width: auto; padding: 12px 30px;">
                            {{ isset($user) ? 'Update User Data' : 'Save New User' }}
                        </button>
                    </div>

                </form>
            </div>

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

    <footer class="site-footer">
        <p>Copyright © 2026 GYM. </p>
    </footer>

    <script src="{{ asset('assets/admincss/admin.js') }}"></script>
</body>

</html>