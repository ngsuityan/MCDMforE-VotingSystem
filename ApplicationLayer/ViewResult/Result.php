<?php
require_once '../../BusinessServiceLayer/Controller/ResultController.php';
include '../../include/connect.php';
session_start();


$finalResults = getFinalResults();
// $ranks = getAllRanks();
// $criteria = getCriteria();

// echo "<pre>";
// print_r( $criteria );exit();


include '../../src/navbar.php';
#---------------------------------------------------------------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Report-Final Result</title>
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
							<a class="nav-link" aria-current="page" href="../../ApplicationLayer/ManageCandidate/Candidate.php?AccType=admin&AD_ID=<?= $_SESSION['AD_ID'] ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
									<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
									<polyline points="9 22 9 12 15 12 15 22"></polyline>
								</svg>
								<span class="ml-2">Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../ApplicationLayer/ManageCandidate/AddCandidate.php?AccType=admin&AD_ID=<?= $_SESSION['AD_ID'] ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
									<path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
									<polyline points="13 2 13 9 20 9"></polyline>
								</svg>
								<span class="ml-2">Add Candidate</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../ApplicationLayer/ManageCriteria/Criteria.php?AccType=admin&AD_ID=<?= $_SESSION['AD_ID'] ?>"">
						  <svg xmlns=" http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
								<circle cx="9" cy="21" r="1"></circle>
								<circle cx="20" cy="21" r="1"></circle>
								<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
								<span class="ml-2">Manage Criteria</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../../ApplicationLayer/ManageCandidate/CandidateList.php?AccType=admin&AD_ID=<?= $_SESSION['AD_ID'] ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
									<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
									<circle cx="9" cy="7" r="4"></circle>
									<path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
									<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
								</svg>
								<span class="ml-2">Candidate List</span>
							</a>
						</li>
						<li class="nav-item dropdown">

							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
									<line x1="18" y1="20" x2="18" y2="10"></line>
									<line x1="12" y1="20" x2="12" y2="4"></line>
									<line x1="6" y1="20" x2="6" y2="14"></line>
								</svg>
								<span class="ml-2">Reports</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../../ApplicationLayer/ViewResult/CandidateData.php?AccType=admin&AD_ID=<?= $_SESSION['AD_ID'] ?>">Candidate Data</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item active" href="../../ApplicationLayer/ViewResult/Result.php?AccType=admin&AD_ID=<?= $_SESSION['AD_ID'] ?>">Final Result</a>
							</div>
						</li>


					</ul>
				</div>
			</nav>

			<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="../../ApplicationLayer/ManageCandidate/Candidate.php?AccType=admin&AD_ID=<?= $_SESSION['AD_ID'] ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Overview</li>
					</ol>
				</nav>
				<h1 class="h2">Final Result</h1>
				<p>This is the Final Result Page with the calculation of MCDM method. The second table will show the current points get by each of the candidate.</p>
				<form enctype="multipart/form-data" method="post" action="">
				<div class="table-responsive">

					<table id="example" class="table table-bordered table-dark text-center">
						<thead>
							<tr>
								<th rowspan="2">Voter</th>
								<th rowspan="2">Candidate</th>
								<th colspan="8">Criteria</th>
								<th rowspan="2">Total</th>
								<th rowspan="2">Rank</th>
							</tr>
							<tr>
								<th>Academic</th>
								<th>Kesukarelawan</th>
								<th>Leadership</th>
								<th>Community Service</th>
								<th>Kesukanan</th>
								<th>Kebudayaan</th>
								<th>Pengucapan Awam</th>
								<th>Daya Usaha Inovasi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							//Declare rank
							$rank_0 = 0;
							$rank_1 = 5;
							$rank_2 = 4;
							$rank_3 = 3;
							$rank_4 = 2;
							$rank_5 = 1;
							$pointC = [];
							foreach ($finalResults as $voterID => $result) :
								$totalOfCandidates = count($result);
								$x = 0;
								$arr_res = [];
							?>
								<?php
								//Here you starting the rank so add the if else after this
								foreach ($result as $candidateID => $cols) :
									$point = 0;
									if ($cols['rank'] == 1) {
										$rank_1++;
										$point = 5;
									} else if ($cols['rank'] == 2) {
										$rank_2++;
										$point = 4;
									} else if ($cols['rank'] == 3) {
										$rank_3++;
										$point = 3;
									} else if ($cols['rank'] == 4) {
										$rank_4++;
										$point = 2;
									} else if ($cols['rank'] == 5) {
										$rank_5++;
										$point = 1;
									} else {
										$rank_0++;
										$point = 0;
									}
									$query_candidate = mysqli_query($db, "SELECT Candidate_Name from candidate where Candidate_ID  = '$candidateID'");
									$res_candidate = $query_candidate->fetch_assoc();

								?>
									<tr>
										<?php if (!$x) :

										?>
											<td rowspan="<?php echo $totalOfCandidates ?>"><?php echo $voterID ?></td>
										<?php endif; ?>
										<td><?php echo $candidateID . "(" . $res_candidate['Candidate_Name'] . ")"; ?></td>
										<td><?php echo number_format($cols['Academic'], 2) ?></td>
										<td><?php echo number_format($cols['Kesukarelawan'], 2) ?></td>
										<td><?php echo number_format($cols['Leadership'], 2) ?></td>
										<td><?php echo number_format($cols['CommunityService'], 2) ?></td>
										<td><?php echo number_format($cols['Kesukanan'], 2) ?></td>
										<td><?php echo number_format($cols['Kebudayaan'], 2) ?></td>
										<td><?php echo number_format($cols['PengucapanAwam'], 2) ?></td>
										<td><?php echo number_format($cols['DayaUsahaInovasi'], 2) ?></td>
										<td><?php echo number_format($cols['total'], 2) ?></td>
										<td><?php echo $cols['rank'] ?></td>
									</tr>
									<?php
									array_push($arr_res, array($candidateID => $point));

									// $pointC = $pointd + $arr_res[$x][2];
									// $pointC = $pointe + $arr_res[$x][3];
									// $pointC = $pointf + $arr_res[$x][4];
									$x++;
									$lp = $x - 1;
									if (!isset($pointC[$candidateID])) {
										$pointC[$candidateID] = $arr_res[$lp][$x];
									} else {
										$pointC[$candidateID] = $pointC[$candidateID] + $arr_res[$lp][$x];
									}
									?>

								<?php endforeach; ?>
							<?php endforeach;

							$sqlWinners = "SELECT * FROM winner";
							$resultWinners = mysqli_query($db, $sqlWinners);
							

							$sqlCandidate = "SELECT * FROM candidate;";
							$resultCandidate = mysqli_query($db, $sqlCandidate);

							$sqlTruncate = "TRUNCATE TABLE winner";
							mysqli_multi_query($db,$sqlTruncate);


							while ($rowCandidate = mysqli_fetch_assoc($resultCandidate)) {

										$sqlInsert = "INSERT INTO winner (candidate_id, current_points) 
										VALUES ('".$rowCandidate["Candidate_ID"]."', '".$pointC[$rowCandidate['Candidate_ID']]."')";
										mysqli_multi_query($db,$sqlInsert);
									}
						

							// while ($rowCandidate = mysqli_fetch_assoc($resultCandidate)) {

							// 	if(!$rowWinners = mysqli_fetch_assoc($resultWinners)) {
							// 		if($rowWinners["candidate_id"] != $rowCandidate["Candidate_ID"]) {
							// 			echo $sqlInsert = "INSERT INTO winner (candidate_id, current_points) 
							// 			VALUES ('".$rowCandidate["Candidate_ID"]."', '".$pointC[$rowCandidate['Candidate_ID']]."')";
							// 			mysqli_multi_query($db,$sqlInsert);
							// 		}
							// 	} 
								// else {
								// 	$sqlUpdate = "UPDATE winner SET candidate_id = '".$rowCandidate["Candidate_ID"]."', current_point = '".$pointC[$rowCandidate['Candidate_ID']]."' WHERE winner_id = '".$rowWinners['winner_id']."';";
									
								// 	mysqli_multi_query($db, $sqlUpdate);
								// }
							// }

							// while($rowWinners["Candidate_Matric"] != )
							//after end the foreach then can echo the result of the sum already
							// echo $rank_0;
							// echo $rank_1;
							// echo $rank_2;
							// echo $rank_3;
							// echo $rank_4							// echo $rank_5;
							//print_r($pointC);
							// print_r($arr_res)

							?>
						</tbody>
					</table>
				</div>

				<div class="table-responsive">
					<table id="example" class="table table-bordered table-dark text-center">
						<tr>
							<th>No</th>
							<th>Candidate Name</th>
							<th>Matric Number</th>
							<th>Current Points</th>
						</tr>
						<tr>
							<?php
							$i = 1;
							$query_candidate = mysqli_query($db, "SELECT * from candidate");
							while ($res_candidate = $query_candidate->fetch_assoc()) { ?>

								<td><?php echo $i++; ?></td>
								<td><?php echo $res_candidate['Candidate_Name'] ?></td>
								<td><?php echo $res_candidate['Candidate_Matric'] ?></td>
							
								<td>
									<?php echo $pointC[$res_candidate['Candidate_ID']];?>
								</td>
						</tr>
					<?php } ?>

					</table>

					
				</div>
			</form>

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