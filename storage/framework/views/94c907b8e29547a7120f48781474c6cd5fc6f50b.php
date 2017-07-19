<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bungloon - Sign in form</title>
    <link href="<?php echo e(asset('public/style/login/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/style/login/plugin/FontAwesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
</head>
<body>
	<div id="container" class="bungloon-outline" data-background="<?php echo e(asset('public/style/login/img/bg.jpg')); ?>">
		<div class="box box-sm">
			<div class="logo">
				<span style="color:rgba(255,255,255,.4);">Sign in form</span>
				<h1 style="font-size:32pt;letter-spacing:-3px;">BUNG<span style="color:yellow">LOON</span></h1>
			</div>
			<div class="form">
				<form method="POST" action="<?php echo e(route('cekLogin.admin')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <?php if($errors->has('email')): ?>
                            <span style="color:red;">
                                <?php echo e($errors->first('email')); ?>

                            </span>
                    <?php endif; ?>
					<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
						<span class="form-icon"><i class="fa fa-user"></i></span>
						<input type="email" class="form-input" name="email" placeholder="email">
					</div>
                    <?php if($errors->has('password')): ?>
                            <span style="color:red;">
                                <?php echo e($errors->first('password')); ?>

                            </span>
                    <?php endif; ?>
					<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
						<span class="form-icon"><i class="fa fa-lock"></i></span>
						<input type="password" name="password" class="form-input" placeholder="password">
					</div>
					<button class="btn btn-success btn-block">Sign in</button>
					<div class="form-text">
						Belum Punya Akun ? <a href="<?php echo e(route('register.admin')); ?>">Klik Here</a>
						<br>
						Lupa Password? <a href="#"> Klik Here</a>
						<br>
						<a href="https://futnet.id" target="_blank">&copyFutnet.id</a>
				</form>
			</div>
		</div>
	</div>
    <script src="<?php echo e(asset('public/style/login/plugin/jQuery/jquery-3.2.1.slim.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/style/login/js/script.js')); ?>"></script>
</body>
</html>