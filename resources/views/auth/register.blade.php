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
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                <div class="signup-image">
                        <figure><img src="{{ asset('frontend/img/GQ-Logo.gif') }}" width="200px" height="200px" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="fas fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation"><i class="fas fa-lock"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required=""/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="btn btn-primary" value="Register"/>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>

    </div>

    <script src="{{asset('js/app.js')}}"></script>

    
</body>
</html>