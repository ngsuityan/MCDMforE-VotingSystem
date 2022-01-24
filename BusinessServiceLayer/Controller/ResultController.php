<?php 
require_once '../../BusinessServiceLayer/Controller/CriteriaController.php';
require_once '../../BusinessServiceLayer/Controller/CandidateController.php';
require_once '../../libs/Final_Result.class.php';

// session_start();

	function getCriteria()
	{
		static $criteria = null;
		if ( !$criteria ) $criteria = new criteriaController();

		$criteriaResult = $criteria->viewAll();
		$criteriaData = $criteriaResult->fetchAll(PDO::FETCH_ASSOC);

		# Sort criteriaData array to help comparison task
			$criteriaData2 = [];
			foreach ( $criteriaData as $i => $criteriaRow ) {
				$criteriaName = $criteriaRow[ 'Criteria_Name' ];

				$criteriaData2[ $criteriaName ]['R1'] = [ 'min'=> (float) $criteriaRow[ 'R1min' ], 'max'=> (float) $criteriaRow[ 'R1max' ] ];
				$criteriaData2[ $criteriaName ]['R2'] = [ 'min'=> (float) $criteriaRow[ 'R2min' ], 'max'=> (float) $criteriaRow[ 'R2max' ] ];
				$criteriaData2[ $criteriaName ]['R3'] = [ 'min'=> (float) $criteriaRow[ 'R3min' ], 'max'=> (float) $criteriaRow[ 'R3max' ] ];
				$criteriaData2[ $criteriaName ]['R4'] = [ 'min'=> (float) $criteriaRow[ 'R4min' ], 'max'=> (float) $criteriaRow[ 'R4max' ] ];
				$criteriaData2[ $criteriaName ]['R5'] = [ 'min'=> (float) $criteriaRow[ 'R5min' ], 'max'=> (float) $criteriaRow[ 'R5max' ] ];
		}
		return $criteriaData2;
	}

	function getRank( $candidate, $category )
	{
		$criteriaData = getCriteria();
		$subCriteria = $criteriaData[ $category ];
		$achievement = $candidate[ $category ];

		if ( $achievement < $subCriteria['R5']['min'] ) {
			return 0;
		} elseif ( $achievement >= $subCriteria['R5']['min'] && $achievement <= $subCriteria['R5']['max'] ) {//rank 5
			return 5;
		} elseif ( $achievement >= $subCriteria['R4']['min'] && $achievement <= $subCriteria['R4']['max'] ) {//rank 4
			return 4;
		} elseif ( $achievement >= $subCriteria['R3']['min'] && $achievement <= $subCriteria['R3']['max'] ) {//rank 3
			return 3;
		} elseif ( $achievement >= $subCriteria['R2']['min'] && $achievement <= $subCriteria['R2']['max'] ) {//rank 2
			return 2;
		} elseif ( $achievement >= $subCriteria['R1']['min'] && $achievement <= $subCriteria['R1']['max'] ) {//rank 1
			return 1;
		}else {
			return 0;
		}
	}

	function getAllRanks()
	{
		static $candidate = null;
		if ( !$candidate ) $candidate = new candidateController();
		
		$candidateResult = $candidate->viewAll();
		$candidateData = $candidateResult->fetchAll(PDO::FETCH_ASSOC);

		$ranks = [];
		foreach ( $candidateData as $i => $candidateRow ) {
			$academic = getRank( $candidateRow, 'Academic' );
			$kesukarelawan = getRank( $candidateRow, 'Kesukarelawan' );
			$leadership = getRank( $candidateRow, 'Leadership' );
			$communityService = getRank( $candidateRow, 'CommunityService' );
			$kesukanan = getRank( $candidateRow, 'Kesukanan' );
			$kebudayaan = getRank( $candidateRow, 'Kebudayaan' );
			$pengucapanAwam = getRank( $candidateRow, 'PengucapanAwam' );
			$dayaUsahaInovasi = getRank( $candidateRow, 'DayaUsahaInovasi' );

			$candidateID = $candidateRow[ 'Candidate_ID' ];
			$ranks[ $candidateID ] = [
										'Candidate_Name' => $candidateRow[ 'Candidate_Name' ],
										'Candidate_Photo' => $candidateRow[ 'Candidate_Photo' ],
										'Candidate_Matric' => $candidateRow[ 'Candidate_Matric' ],
										'Academic' => $academic,
										'Kesukarelawan' => $kesukarelawan,
										'Leadership' => $leadership,
										'CommunityService' => $communityService,
										'Kesukanan' => $kesukanan,
										'Kebudayaan' => $kebudayaan,
										'PengucapanAwam' => $pengucapanAwam,
										'DayaUsahaInovasi' => $dayaUsahaInovasi,
									];
		}
		return $ranks;
	}

# Get norminator for all subjects
	function getNorminators() {
		static $norminators = [];
		if ( !count($norminators) ) {
			$ranks = getAllRanks();
			# Sort 
				$Academic = [];
				$Kesukarelawan = [];
				$Leadership = [];
				$CommunityService = [];
				$Kesukanan = [];
				$Kebudayaan = [];
				$PengucapanAwam = [];
				$DayaUsahaInovasi = [];
				
				foreach ( $ranks as $candidateID => $candidateRank ) {
					$Academic[] = $candidateRank[ 'Academic' ];
					$Kesukarelawan[] = $candidateRank[ 'Kesukarelawan' ];
					$Leadership[] = $candidateRank[ 'Leadership' ];
					$CommunityService[] = $candidateRank[ 'CommunityService' ];
					$Kesukanan[] = $candidateRank[ 'Kesukanan' ];
					$Kebudayaan[] = $candidateRank[ 'Kebudayaan' ];
					$PengucapanAwam[] = $candidateRank[ 'PengucapanAwam' ];
					$DayaUsahaInovasi[] = $candidateRank[ 'DayaUsahaInovasi' ];
				}
				$norminators = compact( 'Academic','Kesukarelawan','Leadership','CommunityService','Kesukanan','Kebudayaan','PengucapanAwam','DayaUsahaInovasi' );
			
			# Set highest rank as norminator for each subject
				foreach ( $norminators as $subject => $rankList ) {
					$rankList = array_unique( $rankList );
					sort( $rankList, SORT_NATURAL );
					
					$norminators[ $subject ] = end( $rankList );
				}
		}

		return $norminators;
	}

	function getNorminator( $category )
	{
		$norminators = getNorminators();
		return $norminators[ $category ];
	}

	function getPoint( $candidateRanks )
	{
		$norminators = getNorminators();

		$Academic = $candidateRanks['Academic'] / $norminators[ 'Academic' ];
		$Kesukarelawan = $candidateRanks['Kesukarelawan'] / $norminators[ 'Kesukarelawan' ];
		$Leadership = $candidateRanks['Leadership'] / $norminators[ 'Leadership' ];
		$CommunityService = $candidateRanks['CommunityService'] / $norminators[ 'CommunityService' ];
		$Kesukanan = $candidateRanks['Kesukanan'] / $norminators[ 'Kesukanan' ];
		$Kebudayaan = $candidateRanks['Kebudayaan'] / $norminators[ 'Kebudayaan' ];
		$PengucapanAwam = $candidateRanks['PengucapanAwam'] / $norminators[ 'PengucapanAwam' ];
		$DayaUsahaInovasi = $candidateRanks['DayaUsahaInovasi'] / $norminators[ 'DayaUsahaInovasi' ];

		return compact( 'Academic','Kesukarelawan','Leadership','CommunityService','Kesukanan','Kebudayaan','PengucapanAwam','DayaUsahaInovasi' );
	}

	function getAllPoints()
	{
		$ranks = getAllRanks();
		$points = [];
		foreach ( $ranks as $candidateID => $candidateRanks ) {
			$points[ $candidateID ] = getPoint( $candidateRanks );
		}
		return $points;
	}

#--------------------------------------------------------------------------------------------------------------------
	function getRatingStars()
	{
		static $data = [];
		if ( $data ) {
			return $data;
		}

		require_once '../../libs/config.php';
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

		return $data;
	}

	function getRatingStarsByVotID( $voterID )
	{
		$rates = getRatingStars();
		return $rates[ $voterID ];
	}

	function getRatingStarsInPercent()
	{
		# Getting rating stars
			$ratingStars = getRatingStars();

		# Convert rating stars to percent
			$ratingPercent = [];
			foreach ( $ratingStars as $voterID => $rating ) {
				$total = array_sum( $rating );
				
				$Academic = ($rating[ 'Academic' ] / $total) * 100;
				$Kesukarelawan = ($rating[ 'Kesukarelawan' ] / $total) * 100;
				$Leadership = ($rating[ 'Leadership' ] / $total) * 100;
				$CommunityService = ($rating[ 'CommunityService' ] / $total) * 100;
				$Kesukanan = ($rating[ 'Kesukanan' ] / $total) * 100;
				$Kebudayaan = ($rating[ 'Kebudayaan' ] / $total) * 100;
				$PengucapanAwam = ($rating[ 'PengucapanAwam' ] / $total) * 100;
				$DayaUsahaInovasi = ($rating[ 'DayaUsahaInovasi' ] / $total) * 100;
				
				$ratingPercent[ $voterID ] = compact( 'Academic','Kesukarelawan','Leadership','CommunityService','Kesukanan','Kebudayaan','PengucapanAwam','DayaUsahaInovasi' );
			}

		return $ratingPercent;
	}

	function set_ranks_for_final_result( &$finalResults )
	{
		# Getting total for each candidate
			$totals = [];
			foreach ( $finalResults as $candidateID => $result ) {
				$totals[ $candidateID ] = $result[ 'total' ];
			}

		# Sort totals
			natsort( $totals );
			$totals = array_reverse( $totals, true );

		# Set ranks
			$i = 0;
			$previousTotal = null;
			foreach ( $totals as $candidateID => $total ) {
				$i++;
				if ( $previousTotal == $total ) {
					$i--;
				}
				$finalResults[ $candidateID ][ 'rank' ] = $i;
				$previousTotal = $total;
			}

		// print_r( $totals );
	}

	function getFinalResults()
	{
		$ratingPercent = getRatingStarsInPercent();
		$allPoints = getAllPoints();

		$finalResults = [];
		foreach ( $ratingPercent as $voterID => $rating ) {
			foreach ( $allPoints as $candidateID => $point ) {
				$cols = [];
					foreach ( $rating as $criteria => $rate ) {
						$cols[ $criteria ] = $rate * $point[ $criteria ];
					}
				$finalResults[ $voterID ][ $candidateID ] = $cols;
				$finalResults[ $voterID ][ $candidateID ][ 'total' ] = array_sum( $cols );
			}
			set_ranks_for_final_result( $finalResults[ $voterID ] );
		}
		return $finalResults;
	}





	
	// print_r( $ranks );
	// $ranks = getAllRanks();

	// $norminators = getNorminators();
	// $norminator = getNorminator( 'DayaUsahaInovasi' );

	// $points = getAllPoints();
	
	// $ratingStars = getRatingStarsByVotID( 3 );
	
	// $ratingStars = getRatingStars();
	
	// $ratingPercent = getRatingStarsInPercent();
	// $points = getAllPoints();
	// $finalResults = getFinalResults();

	// echo "<pre>";
	// print_r( $ratingStars );
	// print_r( $ratingPercent[1] );
	// print_r( $points[1] );
	// print_r( $norminators );
	// print_r( $finalResults );
