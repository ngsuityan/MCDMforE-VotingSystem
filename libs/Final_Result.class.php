<?php

class Final_Result
{
	public $rates = [];
	public function __construct()
	{
		$this->_setRates();
	}

	private function _setRates()
	{
		require_once 'config.php';
		$db = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		$result = $db->query( 'SELECT * FROM rate' );
		
		$data = [];
		while( $row = $result->fetch_assoc() ) {
			$data[] = $row;
		}

		$data = array_column( $data, null, 'Vot_ID' );
		$data = array_map(function( $row ){
					unset( $row[ 'Rate_ID' ] );
					unset( $row[ 'Vot_ID' ] );
					return $row;
				}, $data );

		$this->rates = $data;
	}

	
}


// $finalResult = new Final_Result;

// print_r( $finalResult );