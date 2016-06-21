<?php

/**
* 
*/
class CTrainers extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainers( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainer', $strSQL, $objDatabase );
	}

	public function fetchTrainer( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainer', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrainers( $objDatabase ) {
		$strSQL = 'SELECT * FROM trainers';

		return self::fetchTrainers( $strSQL, $objDatabase );
	}

	public static function fetchAllActiveTrainersBySubjectIdByCityId( $intSubjectId, $intCityId, $objDatabase ) {
		
		$strSQL = ' SELECT
						t.*,
						l.first_name,
						l.last_name
					FROM
						trainers t
						JOIN leads l ON ( t.lead_id = l.id )
						JOIN cities c ON ( l.city_id = c.id )
						JOIN trainer_skills ts ON ( ts.trainer_id = t.id )
					WHERE
						ts.tr_subject_id = ' . $intSubjectId . '
						AND c.id = ' . $intCityId;

		return self::fetchTrainers( $strSQL, $objDatabase );
	}

	public static function fetchTrainerById( $intTrainerId, $objDatabase ) {
		
		$strSQL = 'SELECT * FROM trainers WHERE id = ' . $intTrainerId;

		return self::fetchTrainer( $strSQL, $objDatabase );
	}
}

?>