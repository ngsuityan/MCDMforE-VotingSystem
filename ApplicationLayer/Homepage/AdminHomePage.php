<?php include '../../src/navbar.php';?>

<?php

session_start();

$AD_ID = $_GET['AD_ID'];
$AccType = 'Admin';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Home page</title>
	<link rel="stylesheet" type="text/css" href="../../src/css/style.css">
</head>

<style type="text/css">

.flex{
  display: flex;
  width: 350px;
  height: 180px;
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

	<div class="flex">
		<div>
			<br>
			<a href="../../ApplicationLayer/ManageCandidate/AddCandidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				<img src="https://i.ibb.co/5ByWKzQ/candidate.png" style="width:160px;height:100px;">
				<br>
				<p>Add New Candidate</p>
			</a>
		</div>

		<div>
			<br>
			<a href="../../ApplicationLayer/ManageCandidate/CandidateList.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				<img src="https://i.ibb.co/jfGHtgT/list.png" style="width:160px;height:100px;">
				<br>
				<p>Candidate List</p>
			</a>
		</div>

	</div>

	<br>

	<div class="flex 2">

		<div>
			<br>
			<a href="../../ApplicationLayer/ManageCriteria/Criteria.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				<img src="https://i.ibb.co/JtDYhJh/criteria.png" style="width:160px;height:100px;">
				<br>
				<p>Manage Criteria</p>
			</a>
		</div>

		<div>
			<br>
			<a href="../../ApplicationLayer/ViewResult/Result.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				<img src="https://i.ibb.co/kXbwhsX/result.png" style="width:160px;height:100px;">
				<br>
				<p>Report</p>
			</a>
		</div>


</body>
</center>
</html>