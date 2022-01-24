<?php include '../../src/navbar.php';?>
<?php
session_start();
include '../../include/connect.php';
ob_start();
include('../../ApplicationLayer/ViewResult/Result.php');
ob_end_clean();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
</head>

<style type="text/css">
 .sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100;
  padding: 90px 0 0;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
  z-index: 99;
}

@media (max-width: 767.98px) {
  .sidebar {
    top: 11.5rem;
    padding: 0;
  }
}

.navbar {
  box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
}

@media (min-width: 767.98px) {
  .navbar {
    top: 0;
    position: sticky;
    z-index: 999;
  }
}

.sidebar .nav-link {
  color: #333;
}

.sidebar .nav-link.active {
  color: #0d6efd;
}

span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}

.candidate {
    margin: auto;
    width: 25vw;
    padding: 0 10px;
    border-radius: 20px;
    margin-bottom: 1em;
    display: flex;
    border: 3px solid #00000008;
    background: #8080801a;

}
.candidate_name {
    margin: 8px;
    margin-left: 3.4em;
    margin-right: 3em;
    width: 100%;
}

.img-field {
	    display: flex;
	    height: 8vh;
	    width: 4.3vw;
	    padding: .3em;
	    background: #80808047;
	    border-radius: 50%;
	    position: absolute;
	    left: -.7em;
	    top: -.7em;
	}
	
.candidate img {
    height: 100%;
    width: 100%;
    margin: auto;
    border-radius: 50%;
}

.vote-field {

    position: absolute;
    font-weight: 700;
    width: 6vw;
    padding: 0 16px;
    border-radius: 16px;   
    display: flex;
    border: 4px solid #00000008;
    background: lightgreen;
    right: 0;
    bottom: -.3em;
}
</style>

<body>

	<div class="container-fluid">
	  <div class="row">
	      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	          <!-- sidebar content goes in here -->
	          <div class="position-sticky pt-md-5">
				  <ul class="nav flex-column">
				      <li class="nav-item">
				        <a class="nav-link active" aria-current="page" href="../../ApplicationLayer/ManageCandidate/Candidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
				          <span class="ml-2">Dashboard</span>
				        </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="../../ApplicationLayer/ManageCandidate/AddCandidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
				          <span class="ml-2">Add Candidate</span>
				        </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="../../ApplicationLayer/ManageCriteria/Criteria.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
				          <span class="ml-2">Manage Criteria</span>
				        </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="../../ApplicationLayer/ManageCandidate/CandidateList.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
				          <span class="ml-2">Candidate List</span>
				        </a>
				      </li>
				      <li class="nav-item dropdown">

								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
								  <span class="ml-2">Reports</span>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <a class="dropdown-item active" href="../../ApplicationLayer/ViewResult/CandidateData.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">Candidate Data</a>
								  <div class="dropdown-divider"></div>
								  <a class="dropdown-item" href="../../ApplicationLayer/ViewResult/Result.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">Final Result</a>
								</div>
							  </li>
				      
				    </ul>
				</div>
	      </nav>
	      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
	          <nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="../../ApplicationLayer/ManageCandidate/Candidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Overview</li>
				  </ol>
				</nav>
				<h1 class="h2">Dashboard</h1>
				<p>This is the homepage of a simple admin interface of UMP Online Voting System.</p>

				<div class="row">
				<div class="card col-md-3 offset-2 bg-info float-left">
				<div class="card-body text-white">
					<h4><b>Voters</b></h4>
					<hr>
					<span class="card-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
					</span>
					<h3 class="text-right"><b><?php echo $db->query('SELECT * FROM voter ')->num_rows ?></b></h3>
				</div>
			</div>
			<div class="card col-md-3 offset-0 bg-primary ml-4 float-left">
				<div class="card-body text-white">
					<h4><b>Candidate</b></h4>
					<hr>
					<span class="card-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
					</span>
					<h3 class="text-right"><b><?php echo $db->query('SELECT * FROM candidate ')->num_rows ?></b></h3>
				</div>
			</div>

		</div>

			<br>

			<div class="row mt-3 ml-3 mr-3">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
						<h3>Current Rank</h3>

							<div class="row mt-3">

								<?php 
					        $sql = "SELECT * FROM winner
					        INNER JOIN candidate
					        ON winner.candidate_id = candidate.Candidate_ID
					        ORDER BY winner.current_points DESC";

					        $result = mysqli_query($db, $sql);

					        $result_array = array();
					        while($row = mysqli_fetch_assoc($result)) {
					        	$result_array[] = $row;
					        }
					      ?>
							<div class="candidate" style="position: relative;">
								<div class="img-field">
									<img src="../../image/<?php if(array_key_exists(0, $result_array)) { echo $result_array[0]["Candidate_Photo"]; } ?>" alt="">
								</div>
								<div class="candidate_name"><?php if(array_key_exists(0, $result_array)) { echo $result_array[0]["Candidate_Name"]; } ?></div>
								<div class="vote-field">
									<p>Rank 1</p>
								</div>
														
							</div>
						</div>

						<div class="row mt-3">

							<div class="candidate" style="position: relative;">
								<div class="img-field">
									<img src="../../image/<?php if(array_key_exists(1, $result_array)) { echo $result_array[1]["Candidate_Photo"]; } ?>" alt="">
								</div>
								<div class="candidate_name"><?php if(array_key_exists(1, $result_array)) { echo $result_array[1]["Candidate_Name"]; } ?></div>
								<div class="vote-field">
									<p>Rank 2</p>
								</div>
														
							</div>
						</div>

						<div class="row mt-3">

							<div class="candidate" style="position: relative;">
								<div class="img-field">
									<img src="../../image/<?php if(array_key_exists(2, $result_array)) { echo $result_array[2]["Candidate_Photo"]; } ?>">
								</div>
								<div class="candidate_name"><?php if(array_key_exists(2, $result_array)) { echo $result_array[2]["Candidate_Name"]; } ?></div>
								<div class="vote-field">
									<p>Rank 3</p>
								</div>
														
							</div>
						</div>

						<div class="row mt-3">

							<div class="candidate" style="position: relative;">
								<div class="img-field">
									<img src="../../image/<?php if(array_key_exists(3, $result_array)) { echo $result_array[3]["Candidate_Photo"]; } ?>" alt="">
								</div>
								<div class="candidate_name"><?php if(array_key_exists(3, $result_array)) { echo $result_array[3]["Candidate_Name"]; } ?></div>
								<div class="vote-field">
									<p>Rank 4</p>
								</div>
														
							</div>
						</div>

						<div class="row mt-3">

							<div class="candidate" style="position: relative;">
								<div class="img-field">
									<img src="../../image/<?php if(array_key_exists(4, $result_array)) { echo $result_array[4]["Candidate_Photo"]; } ?>" alt="">
								</div>
								<div class="candidate_name"><?php if(array_key_exists(4, $result_array)) { echo $result_array[4]["Candidate_Name"]; } ?></div>
								<div class="vote-field">
									<p>Rank 5</p>
								</div>
														
							</div>
						</div>

						</div>
					</div>
				</div>
			</div>

			<footer class="pt-5 d-flex justify-content-between">
				  <span>Copyright © 2020-2021 <a href="https://www.ump.edu.my/en">University Malaysia Pahang</a></span>
				  <ul class="nav m-0">
				      <li class="nav-item">
				        <a class="nav-link text-secondary" aria-current="page" href="#">Privacy Policy</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-secondary" href="#">Terms and conditions</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-secondary" href="#">Contact</a>
				      </li>
				    </ul>
				</footer>
				
			</main>



	  </div>
	</div>

	

</body>
</html>