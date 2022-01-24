<?php
require_once '../../BusinessServiceLayer/Model/VoteModel.php';

class voteController{

	function addrating(){

		$vote = new voteModel();
		$vote->Vot_ID=$_SESSION['Vot_ID'];
		$vote->Academic=$_POST['rateAcademic'];
		$vote->Kesukarelawan=$_POST['rateKesukarelawan'];
		$vote->Leadership=$_POST['rateLeadership'];
		$vote->CommunityService=$_POST['rateCommunity'];
		$vote->Kesukanan=$_POST['rateKesukanan'];
		$vote->Kebudayaan=$_POST['rateKebudayaan'];
		$vote->PengucapanAwam=$_POST['ratePengucapanAwam'];
		$vote->DayaUsahaInovasi=$_POST['rateDayaUsahaInovasi'];

		$stmt= $vote-> get_user();

		if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['Vot_ID'] = $selected['Vot_ID'];
            }
            $_SESSION["Vot_ID"] = $_POST['Vot_ID'];
            echo "<script>alert('Unsuccessfully Submit!You have submitted before!');
            window.location = '../../ApplicationLayer/ManageVote/Rate.php?AccType=Voter&Vot_ID=".$_SESSION['Vot_ID']."';</script>";; 
        }
        else if($vote->addrate()>0){
            $message = "Successfully Vote!Thank You!";
        	echo "<script type='text/javascript'>alert('$message');
        	window.location = '../../ApplicationLayer/ManageVote/Rate.php?AccType=Voter&Vot_ID=".$_SESSION['Vot_ID']."';</script>";
        }

        
	}

}

?>