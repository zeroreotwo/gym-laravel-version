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
                                <a href="/member/dashboard">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="/member/transaksi">
                                    <i class="fas fa-file-invoice-dollar"></i> Transaksi
                                </a>
                            </li>
                            <li>
                                <a href="/member/trainer" class="active">
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
                                    <h6>| Fasilitas Member</h6>
                                    <h2>Pilih Personal Trainer</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($trainers as $trainer)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="trainer-card glass-card glass-card-3d" style="padding: 25px;">
                                    <div class="trainer-content">

                                        <span class="specialty" style="color: var(--emerald-light); font-weight: 600; display: block; margin-bottom: 10px;">
                                            {{ $trainer->nama }}
                                        </span>

                                        <h4 style="margin-bottom: 15px; font-size: 22px;">{{ $trainer->hari }} Hari</h4>

                                        <p style="color: var(--text-secondary); margin-bottom: 20px; min-height: 50px;">
                                            {{ $trainer->detail }}
                                        </p>

                                        <div class="trainer-meta" style="border-top: 1px solid var(--glass-border); padding-top: 15px; margin-bottom: 20px;">
                                            <span style="font-weight: 500; color: var(--gold);">
                                                Rp. {{$trainer->harga}}
                                            </span>
                                        </div>

                                        <form action="{{ route('checkout.trainer', $trainer->id) }}" method="GET">
                                            @csrf
                                            <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
                                            <button type="submit" class="trainer-btn" style="width: 100%;">Pilih Paket</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            @endforeach
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