<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>GYM - Riwayat Transaksi</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
        /* Tambahan style khusus untuk tabel transaksi agar selaras dengan tema */
        .transaction-table th {
            font-weight: 600;
            color: #1e1e1e;
            border-bottom: 2px solid #eaeaea;
            padding: 15px;
        }

        .transaction-table td {
            vertical-align: middle;
            color: #4a4a4a;
            padding: 15px;
            border-bottom: 1px solid #eaeaea;
        }

        .transaction-table tbody tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <div class="page-heading member-area-heading">
        <a href="{{ url('/') }}" class="back-to-home-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="member-badge">Member Area</span>
                    <h3>Halo, {{ Auth::user()->name ?? 'Member' }}!</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 mb-5">
                    <div class="sidebar-menu">
                        <h4>Menu Member</h4>
                        <ul>
                            <li>
                                <a href="/member/dashboard">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="/member/transaksi" class="active">
                                    <i class="fas fa-file-invoice-dollar"></i> Transaksi
                                </a>
                            </li>
                            <li>
                                <a href="/member/trainer">
                                    <i class="fas fa-dumbbell"></i> Personal Trainer
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-key"></i> Change Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class=" fas fa-power-off"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="properties section" style="margin-top: 0; padding-bottom: 0;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading text-left" style="margin-bottom: 40px;">
                                    <h6>| Administrasi</h6>
                                    <h2>Riwayat Transaksi</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="item" style="background: var(--glass-bg, #ffffff); backdrop-filter: blur(10px); border: 1px solid var(--glass-border, #eaeaea); border-radius: 15px; padding: 30px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);">

                                    <div class="table-responsive">
                                        <table class="table transaction-table">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Layanan</th>
                                                    <th>Diskon</th>
                                                    <th>Total Harga</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($transaksis as $trx)
                                                <tr>
                                                    <td>
                                                        <span style="font-weight: 500; color: #1e1e1e;">
                                                            {{ \Carbon\Carbon::parse($trx->created_at)->translatedFormat('d M Y') }}
                                                        </span>
                                                        <br>
                                                        <small style="color: #aaa;">{{ \Carbon\Carbon::parse($trx->created_at)->format('H:i') }} WIB</small>
                                                    </td>
                                                    <td>
                                                        @if($trx->paket_id)
                                                        <div style="margin-bottom: 4px;">
                                                            <i class="fas fa-box" style="color: #f35525; margin-right: 5px;"></i> Paket Gym
                                                        </div>
                                                        @endif

                                                        @if($trx->trainer_id)
                                                        <div>
                                                            <i class="fas fa-dumbbell" style="color: #f35525; margin-right: 5px;"></i> Personal Trainer
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        Rp {{ number_format($trx->discount ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    <td style="font-weight: 600; color: #f35525;">
                                                        Rp. {{number_format($trx->harga ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    <td>
                                                        @if(strtolower($trx->status) == 'sukses' || strtolower($trx->status) == 'lunas')
                                                        <span class="status-badge" style="background-color: #d1e7dd; color: #0f5132;">Lunas</span>

                                                        @elseif(strtolower($trx->status) == 'pending')
                                                        <span class="status-badge" style="background-color: #fff3cd; color: #664d03;">Menunggu Verifikasi</span>
                                                        @else
                                                        <span class="status-badge" style="background-color: #f8d7da; color: #842029;">{{ ucfirst($trx->status) }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center" style="padding: 40px 20px;">
                                                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5" style="margin-bottom: 15px;">
                                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                        <h5 style="color: #7a7a7a;">Belum Ada Transaksi</h5>
                                                        <p style="color: #aaa; font-size: 14px;">Anda belum melakukan pembelian paket gym maupun personal trainer.</p>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="col-lg-8">
                <p>Copyright © 2026 GYM., Ltd. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>