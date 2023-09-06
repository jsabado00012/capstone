<!DOCTYPE html>
<!-- saved from url=(0055)https://adminlte.io/themes/v3/pages/examples/login.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- <link rel="stylesheet" href="./AdminLTE 3 _ Log in_files/css"> -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <!-- <link rel="stylesheet" href="./AdminLTE 3 _ Log in_files/all.min.css"> -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

    <!-- <link rel="stylesheet" href="./AdminLTE 3 _ Log in_files/icheck-bootstrap.min.css"> -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- <link rel="stylesheet" href="./AdminLTE 3 _ Log in_files/adminlte.min.css"> -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="login-page" style="min-height: 496.781px;">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Capstone</b>Project</a>
        </div>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                Sign in to start your session
            </div>
            <div class="card-body login-card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sign In') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <p class="mb-1">
                    <a href="https://www.dmmmsu.edu.ph/author/dmmmsu-mluc/">Capstone Project MIT</a>
                </p>
            </div>
        </div>
    </div>

    <script src="./AdminLTE 3 _ Log in_files/jquery.min.js.download"></script>

    <script src="./AdminLTE 3 _ Log in_files/bootstrap.bundle.min.js.download"></script>

    <script src="./AdminLTE 3 _ Log in_files/adminlte.min.js.download"></script>


</body>
</html>