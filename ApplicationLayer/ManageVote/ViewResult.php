<?php 
ob_start();
include('../../ApplicationLayer/ViewResult/Result.php');
ob_end_clean();

include '../../src/navbar2.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Voter Dashboard</title>
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

</style>

<body>

	<div class="container-fluid">
	  <div class="row">
	      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	          <!-- sidebar content goes in here -->
	          <div class="position-sticky pt-md-5">
				  <ul class="nav flex-column">
				      <li class="nav-item">
				        <a class="nav-link" aria-current="page" href="../../ApplicationLayer/ManageVote/Voter.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
				          <span class="ml-2">Dashboard</span>
				        </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="../../ApplicationLayer/ManageVote/Rate.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
				          <span class="ml-2">Rate</span>
				        </a>
				      </li>
				      <li class="nav-item ">
				        <a class="nav-link active" href="../../ApplicationLayer/ManageVote/ViewResult.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
				          <span class="ml-2">View Result</span>
				        </a>
				      </li>
				      
				      
				    </ul>
				</div>
	      </nav>

	      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	      	<br>
	      	<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="../../ApplicationLayer/HomePage/VoterHomePage.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Overview</li>
				  </ol>
				</nav>
				<h1 class="h2">Final Result</h1>
				<p>This is the page for the voter to view the final result</p>
        <br>


        <h1> Congratulation!! </h1>
        <div class="table-responsive">
        <table id="example" class="table table-bordered table-dark text-left">
        <tr>
        	<th>Position</th>
        	<td>Candidate Name</td>
        	<td>Candidate Matric</td>
        </tr>
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
        <tr>
        	<th>President</th>
        		<td><?php if(array_key_exists(0, $result_array)) { echo $result_array[0]["Candidate_Name"]; } ?></td>
        		<td><?php if(array_key_exists(0, $result_array)) { echo $result_array[0]["Candidate_Matric"]; } ?></td>
        	<?php ?>
        </tr>
        <tr>
        	<th>Vice President</th>
        				<td><?php if(array_key_exists(1, $result_array)) { echo $result_array[1]["Candidate_Name"]; } ?></td>
        		<td><?php if(array_key_exists(1, $result_array)) { echo $result_array[1]["Candidate_Matric"]; } ?></td>
        </tr>
        <tr>
        	<th>Secretary</th>
        		<td><?php if(array_key_exists(2, $result_array)) { echo $result_array[2]["Candidate_Name"]; } ?></td>
        		<td><?php if(array_key_exists(2, $result_array)) { echo $result_array[2]["Candidate_Matric"]; } ?></td>
        </tr>
        <tr>
        	<th>Vice Secretary</th>
        		<td><?php if(array_key_exists(3, $result_array)) { echo $result_array[3]["Candidate_Name"]; } ?></td>
        		<td><?php if(array_key_exists(3, $result_array)) { echo $result_array[3]["Candidate_Matric"]; } ?></td>
        </tr>	
        <tr>
        	<th>Treasurer</th>
        		<td><?php if(array_key_exists(4, $result_array)) { echo $result_array[4]["Candidate_Name"]; } ?></td>
        		<td><?php if(array_key_exists(4, $result_array)) { echo $result_array[4]["Candidate_Matric"]; } ?></td>
        </tr>

        <tr>
        	<th>Vice Treasurer</th>
        		<td><?php if(array_key_exists(5, $result_array)) { echo $result_array[5]["Candidate_Name"]; } ?></td>
        		<td><?php if(array_key_exists(5, $result_array)) { echo $result_array[5]["Candidate_Matric"]; } ?></td>
        </tr>

        <tr>
        	<th>AJK</th>
        			<td>
        				<?php if(array_key_exists(6, $result_array)) { echo $result_array[6]["Candidate_Name"]; } ?>
        				<br>
        				<?php if(array_key_exists(7, $result_array)) { echo $result_array[7]["Candidate_Name"]; } ?>
        				<br>
        				<?php if(array_key_exists(8, $result_array)) { echo $result_array[8]["Candidate_Name"]; } ?>
        				<br>
        				<?php if(array_key_exists(9, $result_array)) { echo $result_array[9]["Candidate_Name"]; } ?>
        				<br>
        				<?php if(array_key_exists(10, $result_array)) { echo $result_array[10]["Candidate_Name"]; } ?>
        			</td>
        			<td>
        				<?php if(array_key_exists(6, $result_array)) { echo $result_array[6]["Candidate_Matric"]; } ?>
        				<br>
        				<?php if(array_key_exists(7, $result_array)) { echo $result_array[7]["Candidate_Matric"]; } ?>
        				<br>
        				<?php if(array_key_exists(8, $result_array)) { echo $result_array[8]["Candidate_Matric"]; } ?>
        				<br>
        				<?php if(array_key_exists(9, $result_array)) { echo $result_array[9]["Candidate_Matric"]; } ?>
        				<br>
        				<?php if(array_key_exists(10, $result_array)) { echo $result_array[10]["Candidate_Matric"]; } ?>
        			</td>
        </tr>
        	
        </table>
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