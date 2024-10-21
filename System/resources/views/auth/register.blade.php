<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/log.css">
    <title> Registration</title>
   
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Registration Container -------------------------->

        <div class="register-container"> <!-- Add this div with class register-container -->
            <div class="row border rounded-5 p-3 bg-white shadow box-area">

                <!--------------------------- Left Box ----------------------------->

                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                    <div class="featured-image mb-3">
                        <img src="/assets/images/1.png" class="img-fluid" style="width: 250px;">
                    </div>
                    <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small>
                </div>

                <!--------------------------- Right Box ---------------------------->

                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Register</h2>
                            <p>Create your account by filling in the details below.</p>
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

                        {{-- Laravel form for registration --}}
                        <form method="POST" action="{{ route('register') }}" id="registration-form">
                            @csrf

                            {{-- Name Input --}}
                            <div class="input-group mb-3">
                                <x-text-input id="name" class="form-control form-control-lg bg-light fs-6" type="text" name="name" placeholder="Full Name" :value="old('name')" required autofocus />
                            </div>

                            {{-- Email Input --}}
                            <div class="input-group mb-3">
                                <x-text-input id="email" class="form-control form-control-lg bg-light fs-6" type="email" name="email" placeholder="Email Address" :value="old('email')" required />
                    
                            </div>

                            {{-- Password Input --}}
                            <div class="input-group mb-3">
                                <x-text-input id="password" class="form-control form-control-lg bg-light fs-6" type="password" name="password" placeholder="Password" required />
                      
                            </div>

                            {{-- Confirm Password Input --}}
                            <div class="input-group mb-3">
                                <x-text-input id="password_confirmation" class="form-control form-control-lg bg-light fs-6" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                          
                            </div>

                            {{-- Register Button --}}
                            <div class="input-group mb-3">
                                <x-primary-button class="btn btn-lg btn-primary w-100 fs-6">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <div class="row">
                            <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

  

</body>
<script src="/assets/js/register.js"></script>
</html>
