<?php include '../../src/navbar2.php';?>
<?php

session_start();
require_once '../../BusinessServiceLayer/Controller/VoteController.php';

$vote = new voteController();
   
  if(isset($_POST['submit'])){
     $vote->addrating();
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rate</title>
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

*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;

}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
    visibility: hidden;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>

<script type="text/javascript">

	function ValidateForm()
{
    var radioA = document.querySelector('input[name="rateAcademic"]:checked');
    var radioB = document.querySelector('input[name="rateKesukarelawan"]:checked');
    var radioC = document.querySelector('input[name="rateLeadership"]:checked');
    var radioD = document.querySelector('input[name="rateCommunity"]:checked');
    var radioE = document.querySelector('input[name="rateKesukanan"]:checked');
    var radioF = document.querySelector('input[name="rateKebudayaan"]:checked');
    var radioG = document.querySelector('input[name="ratePengucapanAwam"]:checked');
    var radioH = document.querySelector('input[name="rateDayaUsahaInovasi"]:checked');

    if (radioA||radioB||radioC||radioD||radioE||radioF||radioG||radioH == null) {
			document.getElementById("disp").innerHTML= "Please Vote All Criteria!!";
		}

    
}

		
    


</script>

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
				        <a class="nav-link active" href="../../ApplicationLayer/ManageVote/Rate.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">
				          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
				          <span class="ml-2">Rate</span>
				        </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="../../ApplicationLayer/ManageVote/ViewResult.php?AccType=Voter&Vot_ID=<?=$_SESSION['Vot_ID']?>">
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
				<h1 class="h2">Please Rate The Following Information</h1>
        <br>
        <p>Please rate based on criteria. Please rate the criteria on your own belief of needs of personalities should have for a candidate to hold a position.</p>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

          </div>
            <form id="f2" enctype="multipart/form-data" method="post" action="" >
              <div class="row mb-4">
                <div class="col-lg-12 border-bottom">
                	<p id="disp" style="color:red; font-size:18px; font-weight:bold; text-align: center;"></p> 
                  <h4 class="text-info"><span data-feather="user" style="height: 30px;width: 30px;"></span>Please Rate</h4>

                  <h4 id="error" style= "color:red"> </h4>

                  	<div class="table-responsive">
	        						<table id="example" class="table table-striped table-sm" style="width:100%">
	        							<tr>

	        								<th>Criteria Name</th>
	        								<th>Star Rating</th>

	        							</tr>

	        							<tr>

	        								<td>Academic</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starA5" name="rateAcademic" value="5" required />
													    <label for="starA5" title="text">5 stars</label>
													    <input type="radio" id="starA4" name="rateAcademic" value="4" required/>
													    <label for="starA4" title="text">4 stars</label>
													    <input type="radio" id="starA3" name="rateAcademic" value="3" required/>
													    <label for="starA3" title="text">3 stars</label>
													    <input type="radio" id="starA2" name="rateAcademic" value="2" required/>
													    <label for="starA2" title="text">2 stars</label>
													    <input type="radio" id="starA1" name="rateAcademic" value="1" required/>
													    <label for="starA1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>

	        							<tr>

	        								<td>Kesukarelawan</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starB5" name="rateKesukarelawan" value="5" required/>
													    <label for="starB5" title="text">5 stars</label>
													    <input type="radio" id="starB4" name="rateKesukarelawan" value="4" />
													    <label for="starB4" title="text">4 stars</label>
													    <input type="radio" id="starB3" name="rateKesukarelawan" value="3" />
													    <label for="starB3" title="text">3 stars</label>
													    <input type="radio" id="starB2" name="rateKesukarelawan" value="2" />
													    <label for="starB2" title="text">2 stars</label>
													    <input type="radio" id="starB1" name="rateKesukarelawan" value="1" />
													    <label for="starB1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>

	        							<tr>

	        								<td>Leadership</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starC5" name="rateLeadership" value="5" required/>
													    <label for="starC5" title="text">5 stars</label>
													    <input type="radio" id="starC4" name="rateLeadership" value="4" />
													    <label for="starC4" title="text">4 stars</label>
													    <input type="radio" id="starC3" name="rateLeadership" value="3" />
													    <label for="starC3" title="text">3 stars</label>
													    <input type="radio" id="starC2" name="rateLeadership" value="2" />
													    <label for="starC2" title="text">2 stars</label>
													    <input type="radio" id="starC1" name="rateLeadership" value="1" />
													    <label for="starC1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>

	        							<tr>

	        								<td>CommunityService</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starD5" name="rateCommunity" value="5" required/>
													    <label for="starD5" title="text">5 stars</label>
													    <input type="radio" id="starD4" name="rateCommunity" value="4" />
													    <label for="starD4" title="text">4 stars</label>
													    <input type="radio" id="starD3" name="rateCommunity" value="3" />
													    <label for="starD3" title="text">3 stars</label>
													    <input type="radio" id="starD2" name="rateCommunity" value="2" />
													    <label for="starD2" title="text">2 stars</label>
													    <input type="radio" id="starD1" name="rateCommunity" value="1" />
													    <label for="starD1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>

	        							<tr>

	        								<td>Kesukanan</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starE5" name="rateKesukanan" value="5" required/>
													    <label for="starE5" title="text">5 stars</label>
													    <input type="radio" id="starE4" name="rateKesukanan" value="4" />
													    <label for="starE4" title="text">4 stars</label>
													    <input type="radio" id="starE3" name="rateKesukanan" value="3" />
													    <label for="starE3" title="text">3 stars</label>
													    <input type="radio" id="starE2" name="rateKesukanan" value="2" />
													    <label for="starE2" title="text">2 stars</label>
													    <input type="radio" id="starE1" name="rateKesukanan" value="1" />
													    <label for="starE1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>

	        							<tr>

	        								<td>Kebudayaan</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starF5" name="rateKebudayaan" value="5" required/>
													    <label for="starF5" title="text">5 stars</label>
													    <input type="radio" id="starF4" name="rateKebudayaan" value="4" />
													    <label for="starF4" title="text">4 stars</label>
													    <input type="radio" id="starF3" name="rateKebudayaan" value="3" />
													    <label for="starF3" title="text">3 stars</label>
													    <input type="radio" id="starF2" name="rateKebudayaan" value="2" />
													    <label for="starF2" title="text">2 stars</label>
													    <input type="radio" id="starF1" name="rateKebudayaan" value="1"/>
													    <label for="starF1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>

	        							<tr>

	        								<td>PengucapanAwam</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starG5" name="ratePengucapanAwam" value="5" required/>
													    <label for="starG5" title="text">5 stars</label>
													    <input type="radio" id="starG4" name="ratePengucapanAwam" value="4" />
													    <label for="starG4" title="text">4 stars</label>
													    <input type="radio" id="starG3" name="ratePengucapanAwam" value="3" />
													    <label for="starG3" title="text">3 stars</label>
													    <input type="radio" id="starG2" name="ratePengucapanAwam" value="2" />
													    <label for="starG2" title="text">2 stars</label>
													    <input type="radio" id="starG1" name="ratePengucapanAwam" value="1" />
													    <label for="starG1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>

	        							<tr>

	        								<td>DayaUsahaInovasi</td>
	        								<td>

	        									<div class="rate">
													    <input type="radio" id="starH5" name="rateDayaUsahaInovasi" value="5" required/>
													    <label for="starH5" title="text">5 stars</label>
													    <input type="radio" id="starH4" name="rateDayaUsahaInovasi" value="4" />
													    <label for="starH4" title="text">4 stars</label>
													    <input type="radio" id="starH3" name="rateDayaUsahaInovasi" value="3" />
													    <label for="starH3" title="text">3 stars</label>
													    <input type="radio" id="starH2" name="rateDayaUsahaInovasi" value="2" />
													    <label for="starH2" title="text">2 stars</label>
													    <input type="radio" id="starH1" name="rateDayaUsahaInovasi" value="1" />
													    <label for="starH1" title="text">1 star</label>
													  </div>

	        								</td>


	        							</tr>


                  		</table>
                  	</div>

                  	

                  	<div class="row mb-10" >

	                  	<input type="hidden" name="Vot_ID" value="<?=$_SESSION['Vot_ID']?>">

	                  	<br><br><br>

	                  	<button class="btn btn-success" type="submit" name="submit" style="width: 150px; position: absolute;left: 50%;" onclick="ValidateForm()">Submit</button>

	                  	




                  </div>
                  	
            

					</div>


          </div>
        </form>



        </main>


	  </div>
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

	

</body>
</html>