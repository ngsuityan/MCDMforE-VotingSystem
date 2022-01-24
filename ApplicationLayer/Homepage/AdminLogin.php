<?php
require_once '../../BusinessServiceLayer/Controller/LoginController.php';
$user = new LoginController();

if(isset($_POST['login'])){
    $user->adminLogin();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login </title>
	<link rel="stylesheet" a href="../../src/css/style.css">
	<link rel="stylesheet" a href="../../src/css/font-awesome.min.css">

</head>
<body>
	<div class="container">
		<form action="" method="POST">
			<br><br><br><br><br>

			<img src="https://i.ibb.co/HxBKBW5/universiti-malaysia-pahang-logo-DB6632-F337-seeklogo-com.png" style="width:300px;height:128px;">
			<!-- <img src="https://ibb.co/7SzL02d" style="width:128px;height:128px;"> -->
			<h3>UMP ONLINE VOTING SYSTEM <br>
			ADMIN PAGE</h3>

			<div class="form-wrapper">
				<input type="text" name="Admin_ID" placeholder="AdminID" required>
			</div>
			<div class="form-wrapper">
				<input type="password" name="Admin_Password" id="Admin_Password" placeholder="Password">
			</div>

<!-- 			<button type="submit" name="login" class="btn-login"><label style="font-size: medium;">Log In</label></button> -->
			<button type="submit" name="login" class="btn-login">Login</button>


		</form>

	</div>

</body>
</html>