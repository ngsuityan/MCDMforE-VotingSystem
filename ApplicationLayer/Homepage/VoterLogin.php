<?php
require_once '../../BusinessServiceLayer/Controller/LoginController.php';
$user = new LoginController();

if(isset($_POST['login2'])){
    $user->voterLogin();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Voter Login</title>
	<link rel="stylesheet" a href="../../src/css/style2.css">
</head>
<body>

	<div class="container">
		<form action="", method="POST">
			<br><br><br><br><br>

			<img src="https://i.ibb.co/TwTdNmx/universiti-malaysia-pahang-logo-DB6632-F337-seeklogo-com.png" style="width:300px;height:128px;">

			<h3>UMP ONLINE VOTING SYSTEM <br>
			VOTER PAGE</h3>

			<div>
				<input type="text" name="Voter_ID" placeholder="Matric ID" required>
			</div>
			<div>
				<input type="password" name="Voter_Password" placeholder="Password" required>
			</div>
			<div>
				<select class="selectbox" name="Voter_Status" required>
					<option>Select Type</option>
					<option value="1">Student</option>
					<option value="2">Staff</option>
				</select>
			</div>
			<button type="submit" name="login2" class="btn-login">Login</button>


		</form>

	</div>

</body>
</html>