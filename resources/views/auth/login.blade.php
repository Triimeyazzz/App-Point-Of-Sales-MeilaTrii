<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Aplikasi POS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
        .neonText {
            color: #000000;
        }

        body {
            font-size: 18px;
            background-color: #010a01;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1,
        h2 {
            text-align: center;
        }

        h1 {
            animation: pulsate 1.5s infinite alternate;
            border: 0.2rem solid #000000;
            border-radius: 2rem;
            padding: 0.4em;
            box-shadow: 0 0 .2rem #fff,
                0 0 .2rem #fff,
                0 0 2rem #a68bff,
                0 0 0.8rem #346aff,
                0 0 2.8rem #51b1ff,
                inset 0 0 1.3rem #001aff;
        }

        @keyframes pulsate {

            100% {

                text-shadow:
                    0 0 4px #fff,
                    0 0 11px #fff,
                    0 0 19px #fff,
                    0 0 40px #8af7ff,
                    0 0 80px #5be3fe,
                    0 0 90px #61bdff,
                    0 0 100px #13a4fe,
                    0 0 150px #3213fe;

            }

            0% {

                text-shadow:
                    0 0 2px #fff,
                    0 0 4px #fff,
                    0 0 6px #fff,
                    0 0 10px #aeffde,
                    0 0 45px #c1ffe0,
                    0 0 55px #68ffc5,
                    0 0 70px #2cffb9,
                    0 0 80px #13fe85;

            }
        }

        .card1 {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: transparent;
            background-clip: border-box;
            border: 0;
        }
        .posisi {
            float: left;
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Sacramento:400' rel='stylesheet' type='text/css'>
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-indigo">
            <div class="card-header text-center kotak">
                <h1 class="neonText">
                    <a href="javascript:void(0);"><a href="../../index2.html" class="h2"> <b>Login</b></a><br>Point
                        Of
                        Sales</a>
                </h1>
                <div class="card-body">
                    <div class="card1">
                        <p class="login-box-msg">Sign in to start your session</p>
                    </div>

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 posisi">
                                <div class="icheck-lime">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
