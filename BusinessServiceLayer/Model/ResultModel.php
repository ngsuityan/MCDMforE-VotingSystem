<?php

require_once '../../libs/database.php';

class ResultModel{

	function publishResult(){
		$sql = "INSERT INTO result(Candidate_ID, Candidate_Name, Candidate_Matric, Points) VALUES (:Candidate_ID, :Candidate_Name, :Candidate_Matric, :Points)";
		$args = [':Candidate_ID'=>$this->Candidate_ID, ':Candidate_Name'=>$this->Candidate_Name, ':Candidate_Matric'=>$this->Candidate_Matric, ':Points'=>$this->Points];
		$stmt = DB::run($sql, $args);
		$count = $stmt->rowCount();
		return $count;
	}




}

?>