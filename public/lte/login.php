<?php
	session_start();
	include '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Control Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-43">
						Login
					</span>
					<div class="wrap-input100 rs1 validate-input" data-validate = "Username tidak boleh kosong">
						<input class="input100" type="text" name="username">
						<span class="label-input100">Username</span>
					</div>
					<div class="wrap-input100 rs2 validate-input" data-validate="Password tidak boleh kosong">
						<input class="input100" type="password" name="password">
						<span class="label-input100">Password</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_l">
							Login
						</button>
					</div>
					<div class="text-center w-full p-t-23">
						<a href="#" class="txt1">
							Lupa password?
						</a>
					</div>
				</form>
				<?php
					if(isset($_POST['btn_l'])){
						$l = $db->pdo->prepare("select * from tbl_admin where username = '".$_POST['username']."'
				                              	AND password = '".md5($_POST['password'])."'");
				      	$l->execute();
				      	if($l->rowCount() > 0){
				          	$rl = $l->fetch();
				          	$_SESSION['authid'] = $rl['id_admin'];
				          	$_SESSION['status'] = $rl['status'];
				          	echo "<script>location.href='index.php'</script>";
				      	}else{
				      		echo "<script>alert('Username atau password, SALAH!')</script>";
				      	}
					}
				?>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
</body>
</html>