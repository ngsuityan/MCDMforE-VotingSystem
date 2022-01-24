<?php include '../../src/navbar2.php';?>
<?php

session_start();

$Vot_ID = $_GET['Vot_ID'];
$AccType = 'Voter';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Voter Home page</title>
	<link rel="stylesheet" type="text/css" href="../../src/css/style.css">
</head>

<style type="text/css">

.flex{
  display: flex;
  width: 500px;
  height: 200px;
  column-gap: 200px;
  margin-top: 85px;
}

.flex> div {
  border: 5px solid black;
  border-radius: 25px;
  background-color: white;
}

.flex2{
  display: flex;
  width: 350px;
  height: 180px;
  column-gap: 200px;
}

.flex2> div {
  border: 5px solid black;
  border-radius: 25px;
  background-color: white;
}

p{
	text-align: center;
	font-weight: 640;
}



</style>
<center>
<body>

	<br>
	<br>
	<br>

	<div class="flex">
		<div>
			<br>
			<a href="../../ApplicationLayer/ManageVote/Rate.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">
				<img src="https://i.ibb.co/WBmbhcM/rate.png" style="width:180px;height:110px;">
				<br>
				<p>Rate Candidate</p>
			</a>
		</div>

		<div>
			<br>
			<a href="../../ApplicationLayer/ManageVote/ViewResult.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">
				<img src="https://i.ibb.co/4MJFdWG/viewresult.png" style="width:180px;height:110px;">
				<br>
				<p>View Result</p>
			</a>
		</div>

	</div>

	<br>


</body>
</center>
</html>