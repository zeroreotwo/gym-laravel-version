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
                            <a href="{{ url('/dashboard/') }}" class="nav-link active">
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
                            <a href="{{ url('/dashboard/member') }}" class="nav-link">
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
                        <li class="nav-item">
                            <a href="{{ url('/dashboard/transaksi') }}" class="nav-link">

                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                </svg>
                                Transaksi

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
                <h1 class="page-title">Dashboard Overview</h1>
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
                            <h3>Transaksi Bulan ini</h3>
                            <div class="stat-value">Rp. {{$pendapatanBulanIni}}</div>
                            <!-- <span class="stat-change positive">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                </svg>
                            </span> -->
                        </div>
                        <div class="stat-icon cyan">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--emerald-light)" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23" />
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Active Member</h3>
                            <div class="stat-value">{{ number_format($activeUsers) }}</div>
                            <!-- <span class="stat-change positive">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                </svg>
                            </span> -->
                        </div>
                        <div class="stat-icon magenta">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="2">
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
                            <h3>Total Member</h3>
                            <div class="stat-value">{{ number_format($totalUsers) }}</div>
                            <!-- <span class="stat-change positive">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                </svg>
                            </span> -->
                        </div>
                        <div class="stat-icon magenta">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="2">
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
                            <h3>Total Orders</h3>
                            <div class="stat-value">{{$transaksiBulanIni}}</div>
                            <!-- <span class="stat-change negative">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 18 13.5 8.5 8.5 13.5 1 6" />
                                </svg>
                                -3.1%
                            </span> -->
                        </div>
                        <div class="stat-icon purple">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--coral)" stroke-width="2">
                                <circle cx="9" cy="21" r="1" />
                                <circle cx="20" cy="21" r="1" />
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                            </svg>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Content Grid -->
            <section class="content-grid">
                <!-- Chart Card -->

                <div class="glass-card chart-card">
                    <div class="card-header">
                        <div>
                            <h2 class="card-title">Analisis Pendapatan</h2>
                            <p class="card-subtitle">Pendapatan Bulanan</p>
                        </div>
                        <div class="card-actions">
                            <button class="card-btn active">Bulanan</button>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                        <div class="chart-container">
                            <div class="chart-y-axis">
                                <span class="y-value">Rp {{ number_format($maxRevenue, 0, ',', '.') }}</span>
                                <span class="y-value">Rp {{ number_format($maxRevenue * 0.8, 0, ',', '.') }}</span>
                                <span class="y-value">Rp {{ number_format($maxRevenue * 0.6, 0, ',', '.') }}</span>
                                <span class="y-value">Rp {{ number_format($maxRevenue * 0.4, 0, ',', '.') }}</span>
                                <span class="y-value">Rp {{ number_format($maxRevenue * 0.2, 0, ',', '.') }}</span>
                                <span class="y-value">Rp 0</span>
                            </div>

                            <div class="chart-placeholder">
                                @php
                                    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                    $colors = ['emerald', 'gold', 'coral', 'teal', 'amber', 'emerald', 'gold', 'coral', 'teal', 'amber', 'emerald', 'gold'];
                                    $maxHeightPx = 200; // Tinggi maksimum div di CSS Anda
                                @endphp

                                @foreach($revenueData as $monthNum => $total)
                                    @php
                                        $monthIndex = $monthNum - 1;
                                        // Rumus: (Total Bulan Ini / Total Tertinggi) * Maksimal Pixel
                                        $height = ($total / $maxRevenue) * $maxHeightPx;
                                    @endphp
                                    
                                    <div class="chart-bar-group">
                                        <div class="chart-bar bar-{{ $colors[$monthIndex] }}" 
                                            style="height: {{ $height }}px;" 
                                            title="Rp {{ number_format($total, 0, ',', '.') }}">
                                        </div>
                                        <span class="chart-label">{{ $months[$monthIndex] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="glass-card">
                    <div class="calendar-header">
                        <h2 class="card-title">January 2025</h2>
                        <div class="calendar-nav">
                            <button class="calendar-nav-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="15 18 9 12 15 6" />
                                </svg></button>
                            <button class="calendar-nav-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="9 18 15 12 9 6" />
                                </svg></button>
                        </div>
                    </div>
                    <div class="calendar-grid">
                        <span class="calendar-day-name">Sun</span><span class="calendar-day-name">Mon</span><span class="calendar-day-name">Tue</span><span class="calendar-day-name">Wed</span><span class="calendar-day-name">Thu</span><span class="calendar-day-name">Fri</span><span class="calendar-day-name">Sat</span>
                        <span class="calendar-day other-month">29</span><span class="calendar-day other-month">30</span><span class="calendar-day other-month">31</span><span class="calendar-day today">1</span><span class="calendar-day">2</span><span class="calendar-day">3</span><span class="calendar-day">4</span>
                        <span class="calendar-day">5</span><span class="calendar-day">6</span><span class="calendar-day">7</span><span class="calendar-day">8</span><span class="calendar-day">9</span><span class="calendar-day">10</span><span class="calendar-day">11</span>
                        <span class="calendar-day">12</span><span class="calendar-day">13</span><span class="calendar-day">14</span><span class="calendar-day">15</span><span class="calendar-day">16</span><span class="calendar-day">17</span><span class="calendar-day">18</span>
                        <span class="calendar-day">19</span><span class="calendar-day">20</span><span class="calendar-day">21</span><span class="calendar-day">22</span><span class="calendar-day">23</span><span class="calendar-day">24</span><span class="calendar-day">25</span>
                        <span class="calendar-day">26</span><span class="calendar-day">27</span><span class="calendar-day">28</span><span class="calendar-day">29</span><span class="calendar-day">30</span><span class="calendar-day">31</span><span class="calendar-day other-month">1</span>
                    </div>
                </div>
                <!-- Data Table -->
                <div class="glass-card table-card">
                    <div class="card-header">
                        <div>
                            <h2 class="card-title">Recent Transactions</h2>
                            <p class="card-subtitle">Latest orders and payments</p>
                        </div>
                        <div class="card-actions">
                            <button class="card-btn">View All</button>
                            <button class="card-btn">Export</button>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table class="data-table">
                             <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Member</th>
                                    <th>Layanan</th>
                                    <th>Total Tagihan</th>
                                    <th>Bukti Bayar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data_transaksi as $trx)
                                <tr>
                                    
                                    <td>
                                        <div style="font-weight: 500; font-size: 14px;">{{ $trx->created_at->format('d M Y') }}</div>
                                        <div style="font-size: 12px; opacity: 0.7;">{{ $trx->created_at->format('H:i') }} WIB</div>
                                    </td>
                                    <td>
                                        <span class="table-user-name" style="font-weight: 600;">{{ $trx->user->name ?? 'User '.$trx->user_id }}</span>
                                    </td>

                                    <td>
                                        @if($trx->paket_id)
                                        <span style="background: rgba(4, 160, 255, 0.2); color: #007bff; padding: 4px 10px; border-radius: 6px; font-size: 13px;">Paket Gym</span>
                                        @endif
                                        @if($trx->trainer_id)
                                        <span style="background: rgba(255, 152, 0, 0.2); color: #ff9800; padding: 4px 10px; border-radius: 6px; font-size: 13px;">Trainer</span>
                                        @endif
                                    </td>

                                    <td style="font-weight: 600;">
                                        Rp. {{number_format($trx->harga ?? 0, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        @if($trx->gambar)
                                        <a href="{{ asset('assets/images/gambar/' . $trx->gambar) }}" target="_blank" style="color: #4CAF50; text-decoration: underline; font-size: 13px; font-weight: 500;">
                                            Lihat Gambar
                                        </a>
                                        @else
                                        <span style="color: #999; font-size: 13px; font-style: italic;">Belum Upload</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(strtolower($trx->status) == 'pending')
                                        <span style="background: rgba(255, 193, 7, 0.2); color: #ffb300; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">Pending</span>
                                        @elseif(strtolower($trx->status) == 'lunas' || strtolower($trx->status) == 'sukses')
                                        <span style="background: rgba(76, 175, 80, 0.2); color: #4CAF50; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">Lunas</span>
                                        @else
                                        <span style="background: rgba(244, 67, 54, 0.2); color: #f44336; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">{{ ucfirst($trx->status) }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="display: flex; gap: 8px;">
                                            @if(strtolower($trx->status) == 'pending')
                                            <form action="{{ url('/dashboard/transaksi/'.$trx->id.'/verifikasi') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="card-btn" style="background: #4CAF50; color: white; border: none; padding: 6px 12px; font-weight: 500; cursor: pointer;">
                                                    Setujui
                                                </button>
                                            </form>
                                            @endif

                                            <form action="/dashboard/transaksi/{{$trx->id}}" method="POST" id="form-delete-{{$trx->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="myFunction()" class="card-btn" style="color: #ff6b6b; border-color: rgba(255, 107, 107, 0.3); background: transparent; padding: 6px 12px; cursor: pointer;">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" style="text-align: center; padding: 30px; color: #999;">
                                        Belum ada data transaksi dari member.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Bottom Grid -->

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
</body>

</html>