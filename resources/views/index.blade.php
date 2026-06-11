<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>GYM Wariors</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--


-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> info@gym.com</li>
            <li><i class="fa fa-map"></i> Kuningan, Pasar Baru 33160</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="#index" class="logo">
              <h1>GYMW</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="#index" class="active">Home</a></li>
              <li><a href="#paket">paket</a></li>
              <li><a href="#contact">Contact Us</a></li>
              @auth
              <li>
                <a href="{{ Auth::user()->type == 3 ? url('/member/dashboard') : url('/dashboard') }}" style="display: flex; align-items: center; gap: 10px;">
                  <div class="user-avatar" style="
                    width: 32px; 
                    height: 32px; 
                    background-color: #f35525; 
                    color: #ffffff; 
                    border-radius: 50%; 
                    display: inline-flex; 
                    align-items: center; 
                    justify-content: center; 
                    font-weight: 700; 
                    font-size: 14px;
                    line-height: 1;
                ">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                  </div>
                  <span>{{ explode(' ', Auth::user()->name)[0] }}</span>
                </a>
              </li>
              @else
              <li><a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a></li>
              @endauth
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="index">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Kuningan, <em>Pasar Baru</em></span>
          <h2>Ayo!<br>Olah Tubuhmu!</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Kuningan, <em>Pasar Baru</em></span>
          <h2>Semangat!<br>Berubah menjadi lebih baik</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Kuningan, <em>Pasar Baru</em></span>
          <h2>Jadi member sekarang!<br>Dapatkan banyak keuntungan</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/aa.jpg" alt="">
            <a href="property-details.html"><img src="assets/images/weight1.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2>Paket Sharing </h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Detail Paket
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor similique esse consectetur, minima architecto odit aspernatur excepturi amet, natus ullam in eligendi placeat voluptas cum atque dolorem suscipit ab corporis!

                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Keuntungan Paket
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Kenapa harus di GYM?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/people.png" alt="" style="max-width: 52px;">
                <h4>Group<br><span>More People</span></h4>
              </li>
              <li>
                <img src="assets/images/smiley.png" alt="" style="max-width: 52px;">
                <h4>Fun<br><span>Moreeeee Fun!!</span></h4>
              </li>
              <li>
                <img src="assets/images/money-bag.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Cheap</span></h4>
              </li>
              <!-- <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video View</h6>
            <h2>Get Closer View & Different Feeling</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="assets/images/cc.jpg" alt="">
            <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="{{$activeUsers}}" data-speed="1000"></h2>
                  <p class="count-text ">Member<br>Aktif</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="5" data-speed="1000"></h2>
                  <p class="count-text ">Tahun<br>Pengalaman</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="18" data-speed="1000"></h2>
                  <p class="count-text ">Jam<br>Buka</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="properties section" id="paket">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Paket</h6>
            <h2>Kami menyediakan banyak pilihan paket </h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($pakets as $paket)
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <span class="category">{{ $paket->tag }}</span>

            <h6>Rp. {{$paket->harga }}</h6>

            <h4><a href="{{ url('/checkout/paket/' . $paket->id) }}">{{ $paket->nama }}</a></h4>

            <p>
              <strong>Masa Aktif: {{ $paket->hari }} Hari.</strong><br>
              {{ $paket->detail }}
            </p>

            <div class="main-button">
              <a href="{{ url('member/checkout/paket/' . $paket->id) }}">Pilih Paket</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="contact section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Kontak Kami</h6>
            <h2>Salurkan pendapat & pertanyaan anda</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11199.833496517465!2d108.28886376674635!3d-7.039916887915189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f39005de67065%3A0x1d7a51b9dc9b8409!2sBukit%20BADAFI!5e0!3m2!1sid!2sid!4v1780488920214!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>info@Gym.co<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2026 GYM., Ltd. All rights reserved.
        </p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>