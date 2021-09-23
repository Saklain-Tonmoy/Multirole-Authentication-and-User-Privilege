<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GQ Group Of Companies</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('frontend/img/GQ-Logo.gif') }}" width="200px" height="200px" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="fas fa-user"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" required="" />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required=""/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="btn btn-primary" value="Log in"/>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>