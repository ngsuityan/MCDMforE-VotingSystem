<?php

require_once '../../libs/database.php';

class CandidateModel{
	public $Candidate_ID, $Candidate_Name, $Candidate_Matric, $Candidate_Faculty, $Year, $Semester, $Candidate_Slogan, $Candidate_Photo;

	function addCandidate(){
		$sql = "INSERT INTO candidate(Candidate_Name, Candidate_Matric, Candidate_Faculty, Year, Semester, Candidate_Slogan, Candidate_Photo, Academic, Kesukarelawan, Leadership, CommunityService, Kesukanan, Kebudayaan, PengucapanAwam, DayaUsahaInovasi) VALUES(:Candidate_Name, :Candidate_Matric, :Candidate_Faculty, :Year, :Semester, :Candidate_Slogan, :Candidate_Photo, :Academic, :Kesukarelawan, :Leadership, :CommunityService, :Kesukanan,:Kebudayaan, :PengucapanAwam, :DayaUsahaInovasi )";
		$args = [':Candidate_Name'=>$this->Candidate_Name , ':Candidate_Matric'=>$this->Candidate_Matric, ':Candidate_Faculty'=>$this->Candidate_Faculty,':Year'=>$this->Year,':Semester'=>$this->Semester, ':Candidate_Slogan'=>$this->Candidate_Slogan,':Candidate_Photo'=>$this->Candidate_Photo, ':Academic'=>$this->Academic, ':Kesukarelawan'=>$this->Kesukarelawan, ':Leadership'=>$this->Leadership, ':CommunityService'=>$this->CommunityService, ':Kesukanan'=>$this->Kesukanan, ':Kebudayaan'=>$this->Kebudayaan, ':PengucapanAwam'=>$this->PengucapanAwam,':DayaUsahaInovasi'=>$this->DayaUsahaInovasi ];
		$stmt = DB::run($sql, $args);
		$count = $stmt->rowCount();
		return $count;
	}

	function viewallStud(){
        $sql = "SELECT * FROM candidate";
        return DB::run($sql);
    }

    function viewStud(){
        $sql = "SELECT * FROM candidate WHERE Candidate_ID=:Candidate_ID";
        $args = [':Candidate_ID'=>$this->Candidate_ID];
        return DB::run($sql,$args);
    }

    function modifyStud(){
    	$sql = "UPDATE candidate set Candidate_Name = :Candidate_Name, Candidate_Matric=:Candidate_Matric, Candidate_Faculty=:Candidate_Faculty, Year=:Year, Semester=:Semester,Candidate_Slogan=:Candidate_Slogan, Candidate_Photo=:Candidate_Photo, Academic=:Academic, Kesukarelawan=:Kesukarelawan, Leadership=:Leadership,CommunityService=:CommunityService, Kesukanan=:Kesukanan, Kebudayaan=:Kebudayaan,PengucapanAwam=:PengucapanAwam, DayaUsahaInovasi=:DayaUsahaInovasi WHERE Candidate_ID=:Candidate_ID";
    	$args = [':Candidate_Name'=>$this->Candidate_Name , ':Candidate_Matric'=>$this->Candidate_Matric, ':Candidate_Faculty'=>$this->Candidate_Faculty,':Year'=>$this->Year,':Semester'=>$this->Semester, ':Candidate_Slogan'=>$this->Candidate_Slogan,':Candidate_Photo'=>$this->Candidate_Photo, ':Academic'=>$this->Academic, ':Kesukarelawan'=>$this->Kesukarelawan, ':Leadership'=>$this->Leadership, ':CommunityService'=>$this->CommunityService, ':Kesukanan'=>$this->Kesukanan, ':Kebudayaan'=>$this->Kebudayaan, ':PengucapanAwam'=>$this->PengucapanAwam,':DayaUsahaInovasi'=>$this->DayaUsahaInovasi, ':Candidate_ID'=>$this->Candidate_ID];
    	return DB::run($sql,$args);

    }

    function deleteStud(){
        $sql = "DELETE FROM candidate WHERE Candidate_ID=:Candidate_ID";
        $args = [':Candidate_ID'=>$this->Candidate_ID];
        return DB::run($sql,$args);
    }

    
    // function RankAca(){
    //     $sql = "SELECT $Academic FROM candidate，criteria";
    //     $args = ['$Academic'=>$this->Academic, 'R1min'=>$this->R1min, 'R1max'=>$this->R1max, 'R2min'=>$this->R2min, 'R2max'=>$this->R2max, 'R3min'=>$this->R3min, 'R3max'=>$this->R3max, 'R4min'=>$this->R4min, 'R4max'=>$this->R4max, 'R5min'=>$this->R5min, 'R5max'=>$this->R5max];
    //     return DB::run($sql,$args);
    // }


}

?>