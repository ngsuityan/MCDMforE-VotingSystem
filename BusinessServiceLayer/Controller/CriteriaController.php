<?php
require_once '../../BusinessServiceLayer/Model/CriteriaModel.php';

class criteriaController{


	function viewAll(){
		$criteria = new CriteriaModel();
		return $criteria->viewallCriteria();
	}

	function viewUser($Criteria_ID){
        $criteria = new CriteriaModel();
        $criteria->Criteria_ID = $Criteria_ID;
        return $criteria->viewCrit();
    }

    function editCriteria(){
    	$criteria = new CriteriaModel();
    	$criteria->R1min = $_POST['R1min'];
    	$criteria->R1max = $_POST['R1max'];
    	$criteria->R2min = $_POST['R2min'];
    	$criteria->R2max = $_POST['R2max'];
    	$criteria->R3min = $_POST['R3min'];
    	$criteria->R3max = $_POST['R3max'];
    	$criteria->R4min = $_POST['R4min'];
    	$criteria->R4max = $_POST['R4max'];
    	$criteria->R5min = $_POST['R5min'];
    	$criteria->R5max = $_POST['R5max'];
    

    if($criteria->modifyCriteria()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManageCriteria/editcriteria.php?Criteria_ID=".$_POST['Criteria_ID']."';</script>";
    }

	}

	
}

?>