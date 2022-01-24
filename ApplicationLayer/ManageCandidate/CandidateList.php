<?php include '../../src/navbar.php';?>
<?php
require_once '../../BusinessServiceLayer/Controller/CandidateController.php';

session_start();
$candidate = new candidateController();
$data = $candidate->viewAll();

if(isset($_POST['delete'])){
    $candidate->delete();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Candidate List</title>
	<!-- Bootstrap 5 CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
				        <a class="nav-link" aria-current="page" href="../../ApplicationLayer/ManageCandidate/Candidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
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
				        <a class="nav-link active" href="../../ApplicationLayer/ManageCandidate/CandidateList.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
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
				<h1 class="h2">Candidate List</h1>
				<p>This is the Candidate List Page.</p>
	      </div>
	      <div class="table-responsive col-md-9 ml-sm-auto col-lg-10 px-md-4">
	        <table id="example" class="table table-striped table-sm" style="width:100%">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Name</th>
	              <th>Matric</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>

	            <?php
	            $i = 1;
	            foreach($data as $row){
	               echo "<tr>"
	                    . "<td>".$i."</td>"
	                    . "<td>".$row['Candidate_Name']."</td>"
	                    . "<td>".$row['Candidate_Matric']."</td>";
	               ?>

	               			<td>
	               				<form action="" method="POST">
	               					<!-- Candidate Info -->
	               					<button type="button" class="btn btn-labeled btn-info" onclick="location.href='view.php?Candidate_ID=<?=$row['Candidate_ID']?>'" title="View Candidate" style="width: 40px;"><span class="btn-info"><i class="fa fa-info"></i></span></button>
	               					<!-- Candidate Edit -->
	               					<button type="button" class="btn btn-labeled btn-warning" onclick="location.href='editcandidate.php?Candidate_ID=<?=$row['Candidate_ID']?>'" title="Edit Candidate" style="width: 40px;">
	               					<span class="btn-warning"><i class="fa fa-edit"></i></span></button>
	               					<!-- Candidate Delete -->
	               					<input type="hidden" name="Candidate_ID" value="<?=$row['Candidate_ID']?>">
	               					<!-- <button type="submit" class="btn btn-labeled btn-danger" name="delete" title="Delete Student" style="width: 40px;><span class="btn-danger"><i class="fa fa-trash"></i></span></button> -->

	               					

	               				</form>

	               			</td>
	                      <!-- <td>
	                        <form action="" method="POST">
	                          <button class="btn btn-info" type="button" onclick="location.href='view.php?studID=<?=$row['studid']?>'" title="View Student"><span data-feather="info"></span></button>
	                          <button class="btn btn-warning" type="button" onclick="location.href='edit.php?studID=<?=$row['studid']?>'" title="Edit Student"><span data-feather="edit"></span></button>
	                          <input type="hidden" name="studID" value="<?=$row['studid']?>">
	                          <button class="btn btn-danger" type="submit" name="delete" title="Delete Student"><span data-feather="trash-2"></span></button>
	                        </form>
	                      </td> -->
	              <?php
	              $i++;
	             echo "</tr>";
	            }
	            ?>

	          </tbody>
	        </table>
	      </div>


				<footer class="pt-5 d-flex justify-content-between col-md-9 ml-sm-auto col-lg-10 px-md-4">
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

<?php include '../../src/script.php'; ?>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
	} );
</script>

</body>
</html>