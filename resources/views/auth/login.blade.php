<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
	<link rel="stylesheet" href="../../dist/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Sacramento:400' rel='stylesheet' type='text/css'>
</head>
<body class="hold-transition login-page">
	<section>
		<div class="leaves">
			<div class="set">
				<div><img src="../../dist/img/daun1.png" width="30px" height="30px"></div>
				<div><img src="../../dist/img/daun2.png" width="30px" height="30px"></div>
				<div><img src="../../dist/img/daun1.png" width="30px" height="30px"></div>
				<div><img src="../../dist/img/daun2.png" width="30px" height="30px"></div>
				<div><img src="../../dist/img/daun1.png" width="30px" height="30px"></div>
				<div><img src="../../dist/img/daun2.png" width="30px" height="30px"></div>
				<div><img src="../../dist/img/daun1.png" width="30px" height="30px"></div>
				<div><img src="../../dist/img/daun2.png" width="30px" height="30px"></div>
			</div>
		</div>
		<img src="../../dist/img/hutan4.jpg" class="bg">
		<img src="../../dist/img/girl.png" class="girl">
		<img src="../../dist/img/trees.png" class="trees">
		<div class="login">
            <div class="card-header text-center kotak">
            <a href="javascript:void(0);"><a href="../../index2.html" class="h2"> <b>Login</b></a><br>Point Of Sales</a>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <hr>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="inputBox fa-sm">
                    <input id="email" type="email"
                    @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="inputBox fa-sm"">
                    <input id="password" type="password"
                        @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="icheck-primary">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="inputBox">
                        <button type="submit" class="btn btn-outline-primary btn-block">Sign In</button>
                    </div>
		</div>
        </div>
	</section>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
