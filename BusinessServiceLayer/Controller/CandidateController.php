<?php
require_once '../../BusinessServiceLayer/Model/CandidateModel.php';

class candidateController{

	function add(){
		
		$newFileName = time() . '_' . $_FILES['studphoto']['name'];
        $localUpload = move_uploaded_file($_FILES['studphoto']['tmp_name'],"../../image/".$newFileName);

        $candidate = new CandidateModel();
        $candidate->Candidate_Name = $_POST['namestudent'];
        $candidate->Candidate_Matric = $_POST['matric'];
        $candidate->Candidate_Faculty = $_POST['faculty'];
        $candidate->Year = $_POST['year'];
        $candidate->Semester = $_POST['semester'];
        $candidate->Candidate_Slogan = $_POST['slogan'];
        $candidate->Candidate_Photo = $newFileName;
        $candidate->Academic=$_POST['Academic'];
        $candidate->Kesukarelawan=$_POST['Kesukarelawan'];
        $candidate->Leadership=$_POST['Leadership'];
        $candidate->CommunityService=$_POST['CommunityService'];
        $candidate->Kesukanan=$_POST['Kesukanan'];
        $candidate->Kebudayaan=$_POST['Kebudayaan'];
        $candidate->PengucapanAwam=$_POST['PengucapanAwam'];
        $candidate->DayaUsahaInovasi=$_POST['DayaUsahaInovasi'];
        

        if($candidate->addCandidate() > 0){
            $message = "Success Insert!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManageCandidate/AddCandidate.php';</script>";
        }

	}

	function viewAll(){
		$candidate = new CandidateModel();
		return $candidate->viewallStud();
	}

    function viewUser($Candidate_ID){
        $candidate = new CandidateModel();
        $candidate->Candidate_ID = $Candidate_ID;
        return $candidate->viewStud();
    }

    function editUser(){
        if($_FILES["studphoto"]["error"] == 0){
            $filename .= time() . '_' . $_FILES['studphoto']['name'];
            $localUpload = move_uploaded_file($_FILES['studphoto']['tmp_name'],"../../image/".$filename);

        } else {
            $getUser = $this->viewUser($_POST['Candidate_ID']);
            if($row = $getUser->fetch(PDO::FETCH_ASSOC)){
              $rows = $row;
            }
            
            $filename = $rows['Candidate_Photo'];
        }

        $candidate =  new CandidateModel();
        $candidate->Candidate_Name = $_POST['namestudent'];
        $candidate->Candidate_Matric = $_POST['matric'];
        $candidate->Candidate_Faculty = $_POST['faculty'];
        $candidate->Year = $_POST['year'];
        $candidate->Semester = $_POST['semester'];
        $candidate->Candidate_Slogan = $_POST['slogan'];
        $candidate->Candidate_Photo = $filename;
        $candidate->Candidate_ID = $_POST['Candidate_ID'];
        $candidate->Academic=$_POST['Academic'];
        $candidate->Kesukarelawan=$_POST['Kesukarelawan'];
        $candidate->Leadership=$_POST['Leadership'];
        $candidate->CommunityService=$_POST['CommunityService'];
        $candidate->Kesukanan=$_POST['Kesukanan'];
        $candidate->Kebudayaan=$_POST['Kebudayaan'];
        $candidate->PengucapanAwam=$_POST['PengucapanAwam'];
        $candidate->DayaUsahaInovasi=$_POST['DayaUsahaInovasi'];

        if($candidate->modifyStud()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManageCandidate/view.php?Candidate_ID=".$_POST['Candidate_ID']."';</script>";
        }

    }

    function delete(){
        $candidate = new CandidateModel();
        $candidate->Candidate_ID = $_POST['Candidate_ID'];
        if($candidate->deleteStud()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManageCandidate/CandidateList.php';</script>";
        }
    }

    function RankAcademic(){

        $candidate =  new CandidateModel();

        if($candidate->RankAca()){
            if('Academic' < 'R1min'){
                echo '1';
            }
        }


    }

} 


?>