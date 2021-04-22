<!DOCTYPE html>
<html>
<head>
	<base href="<?=base_url()?>">
	<link rel="shortcut icon" href="public/imgs/favicon.ico" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="public/style.css">
	<meta charset="utf-8">

	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url()?>/assets/bootstrap/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/bootstrap/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter" >
		<div class="container-login100" align="middle">
			<div class="wrap-login100" align="middle" >
				<div class="login100-pic js-tilt" data-tilt align="middle">
					<img src="<?=base_url()?>/assets/bootstrap/img/logo.png" alt="IMG"  style="margin-left:17%" , style="margin-bottom:-35%";>
					<br><br>
					
				</div>

				
		
			<div class="wrap-input100 validate-input"  style="margin-left:4.5%">
			<?php echo form_open('Login_controller/login_validation'); ?>
				<form class="form" method="post" >
					
					<div class="form-group">
					<?php echo form_error("username"); ?>
						<label>Utilizador</label>
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<label>Palavra-chave</label>
						<input class="input100" type="password" name="password" placeholder="Password" required>
					</div>
					<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					<input type="submit" name="formsend" class="login100-form-btn" value="Iniciar Sessão"></input>
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
					
					
	
	

	
<!--===============================================================================================-->	
	<script src="<?=base_url()?>/assets/bootstrap/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/assets/bootstrap/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>/assets/bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/assets/bootstrap/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/assets/bootstrap/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>/assets/bootstrap/js/main.js"></script>

</body>
</html>
