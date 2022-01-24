<?php

require_once '../../libs/database.php';

class LoginModel{

	function AD_Login(){
    	$sql = "select * from admin where Admin_ID=:Admin_ID and Admin_Password=:Admin_Password";
    	$args = [':Admin_ID'=>$this->Admin_ID, ':Admin_Password'=>$this->Admin_Password];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }

    function Vot_Login(){
        $sql = "select * from voter where Voter_ID=:Voter_ID and Voter_Password=:Voter_Password and Voter_Status=:Voter_Status";
        $args = [':Voter_ID'=>$this->Voter_ID, ':Voter_Password'=>$this->Voter_Password, ':Voter_Status'=>$this->Voter_Status];
        $stmt = DB::run($sql, $args);
        return $stmt;
    }
}

?>