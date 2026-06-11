<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - 3D Glassmorphism Dashboard</title>
    <meta name="description" content="3D Glassmorphism Dashboard Template by TemplateMo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admincss/admin.css') }}">
    <!--


-->
</head>

<body>
    <!-- Animated Background -->
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="login-page">
        <!-- Theme Toggle -->


        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h1 class="login-title">Welcome Back</h1>
                    <p class="login-subtitle">Sign in to continue to GYM Wariors</p>
                </div>

                <form action="/login" method="POST" data-validate data-redirect="index.html">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input name="email" type="email" id="email" class="form-input" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input name="password" type="password" id="password" class="form-input" placeholder="Enter your password" required>
                    </div>


                    <button type="submit" class="btn btn-primary">
                        Sign In
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12" />
                            <polyline points="12 5 19 12 12 19" />
                        </svg>
                    </button>
                </form>
                <div class="divider"></div>
                <p class="login-footer">
                    Tidak Punya akun? <a href="register.html">Buat Akun</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <footer class="site-footer">
            <p>Copyright © 2026 GYM. </p>
        </footer>
    </div>

    <script src="admin.js"></script>
    <!-- TemplateMo 607 Glass Admin -->
</body>

</html>