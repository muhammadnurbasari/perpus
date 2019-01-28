<?php 
session_start();

require 'config/crud.php';
$conn = new db_crud();




if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM user WHERE nama_user = '$username' AND password_user = '$password'";

	$cekUser = $conn->read($query);

	if (!$cekUser) {
		$error = true;
	} else {
		$_SESSION['login'] = true;
		$_SESSION['id'] = $cekUser[0]['id_user'];
		$_SESSION['nama'] = $cekUser[0]['nama_user'];
	}
	
}

if (isset($_SESSION['login'])) {
	header('Location: index.php');
}

 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<title>Login</title>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/bootstrap.min.css">
	<script  src="assets/jquery.min.js"></script>
	<script src="assets/bootstrap.min.js"></script>
	<style type="text/css">
		.header {
			position: absolute;
			width: 1365px;
			height: 100px;
			left: 0;
			right: 0;
			background-color: lightblue;
		}
		.img {
			width: 80px;
			height: 80px;
			margin-top: 10px;
			margin-left: 10px;
		}
		.panel {
			margin-top: 150px;
			text-align: center;
			width: 350px;
			margin-left: 500px;
		}
		.footer {
			position: absolute;
			width: 1365px;
			height: 80px;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: lightblue;
		}
	</style>
 </head>
 <body>
 	<form method="POST" action="">
 	<div class="container-fluid">
 		<div class="header">
 			<img src="images/Books-icon.png" class="img">
 			<strong><kbd>Perpustakaan_Online</kbd></strong>
 		</div>
 		<div class="panel panel-info">
 			<div class="panel-heading"><strong>LOGIN</strong></div>
 			<div class="panel-body">

 				<!-- menampilkan error -->

 				<?php if (isset($error)) { ?>
 					<div class="alert alert-danger fade in">
 						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 						<strong>Username atau Password Salah !!!!</strong>
 					</div>
 				<?php } ?>


 				<!-- selesai error -->

 				<div class="form-group">
 					<input class="form-control" type="text" name="username" placeholder="Username..." autocomplete="off" required/>
 				</div>
 				<div class="form-group">
 					<input class="form-control" type="password" name="password" placeholder="Password..." required/>
 				</div>
 			</div>
 			<div class="panel-footer">
 				<div class="form-group">
 					<button class="btn btn-info btn-block" type="submit" name="login">LOGIN</button>
 				</div>
 			</div>
 		</div>
 		<div class="footer"></div>
 		<div><p style="padding-top: 10px;padding-left: 620px;">Copyright &copy; 2019</p></div>
 		<div><p style="padding-top: 20px;padding-left: 560px;">Powered By Muhammad Nur Basari</p></div>
 	</div>
 	</form>
 </body>
 </html>