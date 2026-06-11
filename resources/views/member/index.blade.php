<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>GYM - Member Dashboard</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
                                <a href="/member/dashboard" class="active">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="/member/transaksi">
                                    <i class="fas fa-file-invoice-dollar"></i> Transaksi
                                </a>
                            </li>
                            <li>
                                <a href="/member/trainer">
                                    <i class="fas fa-dumbbell"></i> Personal Trainer
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.change-password') }}">
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

                    <div class="fun-facts">
                        <div class="wrapper">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="counter">
                                        <h2 class="timer count-title count-number" data-to="{{ $sisaHari }}" data-speed="1000">{{ $sisaHari }}</h2>
                                        <p class="count-text">Sisa Hari<br>Langganan</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="counter">
                                        <h2 class="timer count-title count-number" data-to="{{  $sisaHariTrainer  }}" data-speed="1000">{{ $sisaHariTrainer }}</h2>
                                        <p class="count-text">Sisa Hari<br>Langganan Trainer</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="properties section" id="paket">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading text-left">
                                    <h6>| Status Member</h6>
                                    <h2>Paket Aktif Anda</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mb-4">

                                @if($user->paket_id != 0 && $user->paketGym)
                                <div class="item" style="background: var(--glass-bg); backdrop-filter: blur(10px); border: 1px solid var(--glass-border); border-radius: 15px; padding: 25px;">

                                    <span class="category" style="color: var(--emerald-light); font-weight: 600;">
                                        {{ $user->paketGym->tag }}
                                    </span>

                                    <h6 class="status-active" style="float: right; color: var(--success); font-weight: bold;">Aktif</h6>

                                    <h4 style="margin-top: 15px; margin-bottom: 15px;">{{ $user->paketGym->nama }}</h4>

                                    <p style="color: var(--text-secondary); margin-bottom: 20px;">
                                        {{ $user->paketGym->detail }}
                                    </p>

                                    <ul class="paket-details" style="list-style: none; padding: 0; border-top: 1px solid var(--glass-border); padding-top: 15px;">
                                        <li style="margin-bottom: 8px;">Mulai:
                                            <span style="color: var(--text-primary); font-weight: 500;">
                                                {{ \Carbon\Carbon::parse($user->paket_day)->subDays($user->paketGym->hari)->translatedFormat('d M Y') }}
                                            </span>
                                        </li>

                                        <li>Berakhir:
                                            <span style="color: var(--text-primary); font-weight: 500;">
                                                {{ \Carbon\Carbon::parse($user->paket_day)->translatedFormat('d M Y') }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <div class="item" style="background: var(--glass-bg); backdrop-filter: blur(10px); border: 1px dashed var(--glass-border); border-radius: 15px; padding: 40px; text-align: center;">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="1.5" style="margin-bottom: 15px;">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                    </svg>
                                    <h4 style="color: var(--text-secondary);">Tidak Ada Paket Aktif</h4>
                                    <p style="color: var(--text-muted); margin-top: 10px;">Anda belum berlangganan paket gym apapun. Silakan kunjungi menu daftar paket untuk memulai perjalanan kebugaran Anda.</p>
                                    <a href="{{ url('/dashboard/paket') }}" class="btn btn-primary" style="margin-top: 20px;">Lihat Pilihan Paket</a>
                                </div>
                                @endif

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="info-table">
                                <ul>
                                    @if($user->trainer_id != 0 && $user->trainer)
                                    <li>
                                        <img src="{{ asset('assets/images/info-icon-01.png') }}" alt="Icon Jadwal">
                                        <h4>
                                            {{ $user->trainer->nama }} ({{ \Carbon\Carbon::parse($user->trainer_day)->subDays($user->trainer->hari)->translatedFormat('d M Y') }})
                                            <br>
                                            <span class="subtitle">
                                                {{ $user->trainer->detail }} (Durasi: {{ $user->trainer->hari }} Hari)
                                            </span>
                                        </h4>

                                    </li>

                                    @else
                                    <li>
                                        <img src="{{ asset('assets/images/info-icon-01.png') }}" alt="Icon Trainer Placeholder" style="filter: grayscale(100%); opacity: 0.5;">
                                        <h4>
                                            Belum Ada Pendamping
                                            <br>
                                            <span class="subtitle">
                                                Tingkatkan hasil latihan Anda dengan menyewa personal trainer kami.
                                            </span>
                                        </h4>
                                    </li>
                                    @endif

                                </ul>
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