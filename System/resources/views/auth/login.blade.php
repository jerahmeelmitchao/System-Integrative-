<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/log.css">
    <title>Login</title>

</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area login-container">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="/assets/images/login.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Login</h2>
                        <p>Login to your account by filling in the details below.</p>
                    </div>

                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    {{-- Error Messages --}}
                    <div class="mb-3" id="error-messages" style="display: none;">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    {{-- Laravel form for login --}}
                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf

                        {{-- Email Input --}}
                        <div class="input-group mb-3">
                            <x-text-input id="email" class="form-control form-control-lg bg-light fs-6" type="email" name="email" placeholder="Email Address" :value="old('email')" required autofocus />

                        </div>

                        {{-- Password Input --}}
                        <div class="input-group mb-3">
                            <x-text-input id="password" class="form-control form-control-lg bg-light fs-6" type="password" name="password" placeholder="Password" required />

                        </div>

                        {{-- Remember Me --}}
                        <div class="form-check mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        {{-- Forgot Password --}}
                        <div class="d-flex justify-content-between mb-3">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">{{ __('Forgot your password?') }}</a>
                            @endif
                        </div>

                        {{-- Login Button --}}
                        <div class="input-group mb-3">
                            <x-primary-button class="btn btn-lg btn-primary w-100 fs-6">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>

                    {{-- Google Sign-In Option --}}
                    <div class="input-group mb-3">
                        <a href="https://myaccount.google.com/?utm_source=sign_in_no_continue&pli=1" target="_blank" class="btn btn-lg btn-light w-100 fs-6">
                            <img src="/assets/images/google.png" style="width:20px" class="me-2">
                            <small>Sign in with Google</small>
                        </a>
                    </div>


                    <div class="row">
                        <small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>
<script src="/assets/js/login.js"></script>

</html>