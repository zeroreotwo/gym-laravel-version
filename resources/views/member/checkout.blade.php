<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>GYM - Checkout Pembayaran</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body>
    @php
    if(isset($trainer)) {
    $tipe_layanan = 'Personal Trainer';
    $nama_item = $trainer->nama;
    $hari_item = $trainer->hari;
    $harga_item = $trainer->harga;
    $id_item = $trainer->id;
    $input_name = 'trainer_id';
    $form_action = route('checkout.process'); // Rute proses trainer
    $url_kembali = url('/member/trainer');
    $teks_kembali = 'Kembali Pilih Trainer';
    } elseif(isset($paket)) {
    $tipe_layanan = 'Paket Gym';
    $nama_item = $paket->nama;
    $hari_item = $paket->hari;
    $harga_item = $paket->harga;
    $id_item = $paket->id;
    $input_name = 'paket_id';
    $form_action = route('checkout.paket.process'); // Rute proses paket
    $url_kembali = url('/#paket');
    $teks_kembali = 'Kembali Pilih Paket';
    }
    @endphp

    <div class="page-heading member-area-heading" style="padding: 100px 0 50px 0;">
        <a href="{{ $url_kembali }}" class="back-to-home-btn">
            <i class="fas fa-arrow-left"></i> {{ $teks_kembali }}
        </a>
        <div class="container text-center">
            <span class="member-badge">Pembayaran</span>
            <h3>Selesaikan Pesanan Anda</h3>
        </div>
    </div>

    <div class="dashboard-area">
        <div class="container">
            <form action="{{ $form_action }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="{{ $input_name }}" value="{{ $id_item }}">

                <div class="row justify-content-center">
                    <div class="col-lg-5 mb-4">
                        <div class="item" style="background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);">
                            <h4 style="font-weight: 700; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">Ringkasan Pesanan</h4>

                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h6 style="color: #1e1e1e; font-size: 16px;">{{ $tipe_layanan }}</h6>
                                    <small style="color: #f35525; font-weight: 600;">{{ $nama_item }} ({{ $hari_item }} Hari)</small>
                                </div>
                                <span style="font-weight: 600;">Rp. {{$harga_item }}</span>
                            </div>

                            <div class="d-flex justify-content-between mt-4" style="border-top: 1px solid #eee; padding-top: 20px;">
                                <span style="font-size: 18px; font-weight: 700;">Total Tagihan</span>
                                <span style="font-size: 18px; font-weight: 700; color: #f35525;">Rp. {{$harga_item}}</span>
                            </div>

                            <div class="mt-4" style="background: #fdf5f2; border: 1px dashed #f35525; padding: 15px; border-radius: 10px;">
                                <h6 style="font-size: 14px; color: #f35525; margin-bottom: 10px;">Silakan transfer ke salah satu rekening berikut:</h6>
                                <p style="font-size: 14px; font-weight: 600; color: #1e1e1e; margin-bottom: 5px;">BCA: 123-456-7890 (A/N GYM Official)</p>
                                <p style="font-size: 14px; font-weight: 600; color: #1e1e1e; margin-bottom: 0;">Mandiri: 098-765-4321 (A/N GYM Official)</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="item" style="background: #fff; border-radius: 15px; padding: 30px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);">
                            <h4 style="font-weight: 700; margin-bottom: 25px;">Verifikasi Pembayaran</h4>

                            <div class="form-check mb-3" style="border: 1px solid #eee; padding: 15px 15px 15px 40px; border-radius: 10px;">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" id="bankTransfer" value="transfer" required checked>
                                <label class="form-check-label w-100" for="bankTransfer" style="font-weight: 500; cursor: pointer;">
                                    Transfer Bank Manual
                                </label>
                            </div>

                            <div class="mb-4">
                                <label for="gambar" style="font-weight: 600; color: #1e1e1e; display: block; margin-bottom: 10px;">Upload Bukti Transfer</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/jpeg, image/png, image/jpg" required style="padding: 10px; border-radius: 8px;">
                                <small style="color: #7a7a7a; font-size: 12px; margin-top: 5px; display: block;">Format JPG/PNG. Maksimal 2MB.</small>
                                @error('gambar')
                                <small style="color: red; font-size: 12px;">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="orange-button" style="width: 100%; height: 50px; border-radius: 25px; background: #f35525; color: white; border: none; font-weight: 600; font-size: 16px; transition: 0.3s;">
                                Konfirmasi Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>