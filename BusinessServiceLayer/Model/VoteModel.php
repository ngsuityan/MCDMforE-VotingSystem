<?php

require_once '../../libs/database.php';

class voteModel{

	public $Rate_ID, $Vot_ID, $Academic, $Kesukarelawan, $Leadership, $CommunityService, $Kesukanan, $Kebudayaan, $PengucapanAwam, $DayaUsahaInovasi;

	function addrate(){

		$sql = "INSERT INTO rate (Vot_ID, Academic, Kesukarelawan, Leadership, CommunityService, Kesukanan, Kebudayaan, PengucapanAwam, DayaUsahaInovasi) VALUES (:Vot_ID, :Academic, :Kesukarelawan, :Leadership, :CommunityService, :Kesukanan, :Kebudayaan, :PengucapanAwam, :DayaUsahaInovasi)";
		$args = ['Vot_ID'=>$this->Vot_ID, 'Academic'=>$this->Academic, 'Kesukarelawan'=>$this->Kesukarelawan, 'Leadership'=>$this->Leadership, ':CommunityService'=>$this->CommunityService, ':Kesukanan'=>$this->Kesukanan, ':Kebudayaan'=>$this->Kebudayaan, ':PengucapanAwam'=>$this->PengucapanAwam, ':DayaUsahaInovasi'=>$this->DayaUsahaInovasi];
		$stmt = DB::run($sql, $args);
		$count = $stmt->rowCount();
		return $count;

	}

	function get_user(){

		$sql = "select * from rate where Vot_ID=:Vot_ID";;
		$args = [':Vot_ID'=>$this->Vot_ID];
		$stmt = DB::run($sql, $args);
        return $stmt;

	}

}