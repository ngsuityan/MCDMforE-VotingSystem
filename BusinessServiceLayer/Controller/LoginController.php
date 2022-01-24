<?php 
require_once '../../BusinessServiceLayer/Model/LoginModel.php';

class LoginController{

	function adminLogin(){
        $user = new LoginModel();
        $user->Admin_ID = $_POST['Admin_ID'];
        $user->Admin_Password = $_POST['Admin_Password'];
        $stmt = $user->AD_Login();
        if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['AD_ID'] = $selected['AD_ID'];
            }
            $_SESSION["Admin_ID"] = $_POST['Admin_ID'];
            echo "<script>alert('Login Succesful! Welcome to UMP Online Voting System!');
            window.location = '../../ApplicationLayer/ManageCandidate/Candidate.php?AccType=admin&AD_ID=".$_SESSION['AD_ID']."';</script>"; 
        }
        else {
            $message = "Invalid username and password! Please try again!!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../index.php';</script>";
        }

    }

    function voterLogin(){
        $user = new LoginModel();
        $user->Voter_ID = $_POST['Voter_ID'];
        $user->Voter_Password = $_POST['Voter_Password'];
        $user->Voter_Status= $_POST['Voter_Status'];
        $stmt = $user->Vot_Login();
         if ($stmt->rowCount()==1){
            session_start();
            foreach ($stmt as $selected) {
                $_SESSION['Vot_ID'] = $selected['Vot_ID'];
            }
            $_SESSION["Voter_ID"] = $_POST['Voter_ID'];
            echo "<script>alert('Login Succesful! Welcome to UMP Online Voting System!');
            window.location = '../../ApplicationLayer/ManageVote/Voter.php?AccType=Voter&Vot_ID=".$_SESSION['Vot_ID']."';</script>"; 
        }
        else {
            $message = "This system only for UMP Student & Staff!!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../../index2.php';</script>";
        }

    }
}
?>