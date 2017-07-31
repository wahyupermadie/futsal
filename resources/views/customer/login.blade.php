<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bungloon - Sign in form</title>
    <link href="{{ asset('style/login/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('style/login/plugin/FontAwesome/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
	<div id="container" class="bungloon-outline" data-background="{{ asset('style/login/img/bg.jpg') }}">
		<div class="box box-sm">
			<div class="logo">
				<span style="color:rgba(255,255,255,.4);">Sign in form</span>
				<!--<h1 style="font-size:32pt;letter-spacing:-3px;">BUNG<span style="color:yellow">LOON</span></h1>-->
                <img  src="{{ asset('style/login/img/logo.png' )}}" alt="logoFutnet">
			</div>
			<div class="form">
				<form method="POST" action="{{ route('customer.login') }}">
                    {{ csrf_field() }}
                    @if ($errors->has('email'))
                            <span style="color:red;">
                                {{ $errors->first('email') }}
                            </span>
                    @endif
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<span class="form-icon"><i class="fa fa-user"></i></span>
						<input type="email" class="form-input" name="email" placeholder="email">
					</div>
                    @if ($errors->has('password'))
                            <span style="color:red;">
                                {{ $errors->first('password') }}
                            </span>
                    @endif
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<span class="form-icon"><i class="fa fa-lock"></i></span>
						<input type="password" name="password" class="form-input" placeholder="password">
					</div>
					<button type="submit" class="btn btn-success btn-block">Sign in</button>
					<div class="form-text">
						<span> Lupa password ? <a href="#"> klik disini</a> </span>
				</form>
			</div>
		</div>
	</div>
    <script src="{{ asset('style/login/plugin/jQuery/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('style/login/js/script.js') }}"></script>
</body>
</html>