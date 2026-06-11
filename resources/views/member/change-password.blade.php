<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>GYM - Ubah Password</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body>
    <div class="page-heading member-area-heading">
        <a href="{{ url('/') }}" class="back-to-home-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
        </a>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="member-badge">Keamanan Akun</span>
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
                                <a href="/member/trainer">
                                    <i class="fas fa-dumbbell"></i> Personal Trainer
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.change-password') }}" class="active">
                                    <i class="fas fa-key"></i> Ubah Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off"></i> Logout
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
                                <div class="section-heading text-left" style="margin-bottom: 30px;">
                                    <h6>| Pengaturan</h6>
                                    <h2>Perbarui Kata Sandi</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="item" style="background: #fff; border-radius: 15px; padding: 40px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);">

                                    @if(session('success'))
                                    <div class="alert alert-success" style="border-radius: 10px; font-weight: 500;">
                                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                                    </div>
                                    @endif

                                    <form action="{{ route('member.update-password') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="current_password" style="font-weight: 600; color: #1e1e1e; display: block; margin-bottom: 10px;">Password Saat Ini</label>
                                            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Masukkan password lama Anda" required style="padding: 12px 15px; border-radius: 8px; border: 1px solid #eaeaea;">
                                            @error('current_password')
                                            <small style="color: red; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="password" style="font-weight: 600; color: #1e1e1e; display: block; margin-bottom: 10px;">Password Baru</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Buat password baru (Min. 8 karakter)" required style="padding: 12px 15px; border-radius: 8px; border: 1px solid #eaeaea;">
                                            @error('password')
                                            <small style="color: red; font-size: 13px; margin-top: 5px; display: block;">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="password_confirmation" style="font-weight: 600; color: #1e1e1e; display: block; margin-bottom: 10px;">Konfirmasi Password Baru</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ulangi password baru Anda" required style="padding: 12px 15px; border-radius: 8px; border: 1px solid #eaeaea;">
                                        </div>

                                        <button type="submit" class="orange-button" style="width: 100%; height: 50px; border-radius: 25px; background: #f35525; color: white; border: none; font-weight: 600; font-size: 16px; margin-top: 10px; transition: 0.3s;">
                                            Simpan Perubahan
                                        </button>
                                    </form>

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
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>