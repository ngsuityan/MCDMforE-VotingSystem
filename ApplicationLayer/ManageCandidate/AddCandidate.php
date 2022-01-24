<?php include '../../src/navbar.php';?>
<?php
   require_once '../../BusinessServiceLayer/Controller/CandidateController.php';

   session_start();
   $candidate = new candidateController();
   
   if(isset($_POST['add'])){
       $candidate->add();
   }
   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add New Candidate</title>
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
				        <a class="nav-link" aria-current="page" href="../../ApplicationLayer/ManageCandidate/Candidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
				          <span class="ml-2">Dashboard</span>
				        </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link active" href="../../ApplicationLayer/ManageCandidate/AddCandidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">
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

				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
               <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                  <h1 class="h2">Add New Candidate</h1>
               </div>
               <form enctype="multipart/form-data" method="post" action="">
                  <div class="row mb-4">
                     <div class="col-lg-12 border-bottom">
                        <h4 class="text-info"><span data-feather="user" style="height: 30px;width: 30px;"></span> Register Information</h4>
                        <hr>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group row">
                                 <label class="col-sm-2 col-form-label font-weight-bold">Name: </label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" name="namestudent" placeholder="Student Name" required>
                                 </div>
                              </div>

                              <br>

                              <div class="form-group row">
                                 <label class="col-sm-2 col-form-label font-weight-bold">Matric ID: </label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" name="matric" placeholder="Matric Number" required>
                                 </div>
                              </div>

                              <br>

                              <div class="form-group row">
                                 <label class="col-sm-2 col-form-label font-weight-bold">Faculty:</label>
                                 <div class="col-sm-10">
                                    <select class="form-control" name="faculty" required>
                                       <option>Select Faculty</option>
                                       <option value="FK">FAKULTI KOMPUTERAN</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option> 
                                    </select>
                                 </div>
                              </div>

                              <br>

                              <div class="form-group row">
                                 <label class="col-sm-2 col-form-label font-weight-bold">Year:</label>
                                 <div class="col-sm-10">
                                    <select class="form-control" name="year" required>
                                       <option>Select Year</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option> 
                                    </select>
                                 </div>
                              </div>

                              <br>

                              <div class="form-group row">
                                 <label class="col-sm-2 col-form-label font-weight-bold">Semester:</label>
                                 <div class="col-sm-10">
                                    <select class="form-control" name="semester" required>
                                       <option>Select Semester</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                    </select>
                                 </div>
                              </div>

                              <br>  

                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Slogan:</label>
                                <div class="col-sm-10">

                                <textarea class="form-control" name="slogan" rows="3" cols="150" placeholder="Enter Slogan Here" required></textarea>

                                 </div>
                              </div>

                              <br>

                           </div>
                           <div class="col-lg-6">
                              <div class="form-group row">
                                 <div class="d-flex flex-row">
                                    <div class="p-2"><label class="col-sm-2 col-form-label font-weight-bold">Photo: </label></div>
                                    <div class="p-2"><img src="https://i.ibb.co/yYD9gyH/imgplaceholder.png" width="100" height="100"></div>
                                    <div class="p-2">
                                       <div class="d-flex flex-column">
                                          <div class="p-2"><input type="file" name="studphoto" class="form-control-plaintext" required></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row mb-4">
                     <div class="col-lg-12 border-bottom">
                        <h4 class="text-info"><span data-feather="user" style="height: 30px;width: 30px;"></span>Student Merit Demerit</h4>
                        <hr>
                        <p>This is the Merit Demerit of the Student.(E-community UMP-->Merit Demerit)</p>
                        <p>(Minimum:0  Maximum:300  [Except Academic Max=40]  )</p>
                        
                        <div class="row">
                           <div class="col-lg-5">
                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Academic: </label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="40" step="0.01" value="0.00" class="form-control" name="Academic" required>
                                 </div>
                              </div>
                              <br>
                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Kesukarelawan:</label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="300" step="0.01" value="0.00" class="form-control" pattern=".{12,12}" name="Kesukarelawan" required>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-lg-7">
                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Leadership: </label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="300" step="0.01" value="0.00" class="form-control" name="Leadership" required><br>
                                 </div>
                              </div>
                              

                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Community Service:</label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="300" step="0.01" value="0.00" class="form-control" pattern=".{12,12}" name="CommunityService" required><br>
                                 </div>
                              </div>
                           </div>
                        <br>

                        <div class="col-lg-5">
                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Kesukanan: </label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="300" step="0.01" value="0.00" class="form-control" name="Kesukanan" required>
                                 </div>
                              </div>
                              <br>
                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Kebudayaan:</label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="300" step="0.01" value="0.00" class="form-control" pattern=".{12,12}" name="Kebudayaan" required>
                                 </div>
                              </div>
                           </div>
                        <br>
                        <div class="col-lg-7">
                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Pengucapan Awam: </label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="300" step="0.01" value="0.00" class="form-control" name="PengucapanAwam" required>
                                 </div>
                              </div>
                              <br>
                              <div class="form-group row">
                                 <label class="col-sm-3 col-form-label font-weight-bold">Daya Usaha Inovasi:</label>
                                 <div class="col-sm-7">
                                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="300" step="0.01" value="0.00" class="form-control" pattern=".{12,12}" name="DayaUsahaInovasi" required>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <br>
                     </div>
                  </div>

                  <div class="row mb-4" >
                      <button class="btn btn-success" type="submit" name="add" style="width: 150px; position: absolute;left: 45%;">Save</button>
                      <button class="btn btn-danger" type="submit" name="cancel" style="width: 150px;position: absolute; right: 35%;" href="../../ApplicationLayer/ManageCandidate/AddCandidate.php?AccType=admin&AD_ID=<?=$_SESSION['AD_ID']?>">Cancel</button>
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

<!-- Image
<a href="https://ibb.co/QcfNZ58"><img src="https://i.ibb.co/j5TMdpV/imgplaceholder.png" alt="imgplaceholder" border="0"></a> -->