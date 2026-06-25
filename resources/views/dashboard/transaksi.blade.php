<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM - Manajemen Transaksi</title>
    <meta name="description" content="3D Glassmorphism Dashboard Template by TemplateMo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admincss/admin.css') }}">
</head>

<body>
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="dashboard">
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
                            <a href="{{ url('/dashboard/transaksi') }}" class="nav-link active">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                Transaksi
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/dashboard/featured') }}" class="nav-link">
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
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                            @if(auth()->user()->type == 1) Owner
                            @elseif(auth()->user()->type == 2) Admin
                            @else Member @endif
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="main-content">
            <nav class="navbar">
                <div class="page-header">
                    <h1 class="page-title">Transaksi</h1>
                    <div class="page-breadcrumb">
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        <span>/</span>
                        <span>Transaksi</span>
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

            <section class="content-grid" style="grid-template-columns: 1fr;">
                <div class="glass-card table-card" style="grid-column: span 1;">
                    <div class="card-header" style="flex-wrap: wrap;">
                        <div class="card-title">Manajemen Transaksi Member</div>
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

                        <div class="pagination-container">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item {{ $data_transaksi->onFirstPage() ? 'disabled' : '' }}">
                                        <a href="{{ $data_transaksi->url(1) }}" class="page-link">First</a>
                                    </li>
                                    <li class="page-item {{ $data_transaksi->onFirstPage() ? 'disabled' : '' }}">
                                        <a href="{{ $data_transaksi->previousPageUrl() }}" class="page-link">‹</a>
                                    </li>

                                    @php
                                    $current = $data_transaksi->currentPage();
                                    $last = $data_transaksi->lastPage();
                                    $start = max(1, $current - 2);
                                    $end = min($last, $current + 2);
                                    @endphp

                                    @if ($start > 1)
                                    <li class="page-item"><a href="{{ $data_transaksi->url(1) }}" class="page-link">1</a></li>
                                    @if ($start > 2)
                                    <li class="page-item disabled"><span class="page-link elipsis">…</span></li>
                                    @endif
                                    @endif

                                    @for ($i = $start; $i <= $end; $i++)
                                        <li class="page-item {{ $current == $i ? 'active' : '' }}">
                                        <a href="{{ $data_transaksi->url($i) }}" class="page-link">{{ $i }}</a>
                                        </li>
                                        @endfor

                                        @if ($end < $last)
                                            @if ($end < $last - 1)
                                            <li class="page-item disabled"><span class="page-link elipsis">…</span></li>
                                            @endif
                                            <li class="page-item"><a href="{{ $data_transaksi->url($last) }}" class="page-link">{{ $last }}</a></li>
                                            @endif

                                            <li class="page-item {{ !$data_transaksi->hasMorePages() ? 'disabled' : '' }}">
                                                <a href="{{ $data_transaksi->nextPageUrl() }}" class="page-link">›</a>
                                            </li>
                                            <li class="page-item {{ $current == $last ? 'disabled' : '' }}">
                                                <a href="{{ $data_transaksi->url($last) }}" class="page-link">Last</a>
                                            </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <button class="mobile-menu-toggle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
    </button>

    <footer class="site-footer">
        <p>Copyright © 2026 GYM.</p>
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
                } else if (result.dismiss === Swal.DismissReason.cancel) {
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