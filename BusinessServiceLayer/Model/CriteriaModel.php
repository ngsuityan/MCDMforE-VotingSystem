<?php

require_once '../../libs/database.php';

class CriteriaModel{
	public $Criteria_ID, $Criteria_Name;


	function viewallCriteria(){
        $sql = "SELECT * FROM criteria";
        return DB::run($sql);
    }

    function viewCrit(){
        $sql = "SELECT * FROM criteria WHERE Criteria_ID=:Criteria_ID";
        $args = [':Criteria_ID'=>$this->Criteria_ID];
        return DB::run($sql,$args);
    }

    function modifyCriteria(){
        $sql = "UPDATE criteria set R1min = :R1min, R1max = :R1max, R2min = :R2min, R2max = :R2max,R3min = :R3min, R3max = :R3max,R4min = :R4min, R4max = :R4max,R5min = :R5min, R5max = :R5max WHERE Criteria_ID=:Criteria_ID";
        $args = [':R1min'=>$this->R1min, ':R1max'=>$this->R1max,':R2min'=>$this->R2min, ':R2max'=>$this->R2max,':R3min'=>$this->R3min, ':R3max'=>$this->R3max,':R4min'=>$this->R4min, ':R4max'=>$this->R4max,':R5min'=>$this->R5min, ':R5max'=>$this->R5max,':Criteria_ID'=>$this->Criteria_ID];
        return DB::run($sql,$args);

    }

    
}

?>