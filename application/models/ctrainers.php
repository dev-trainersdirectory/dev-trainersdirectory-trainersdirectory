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

	public static function fetchTrainerById( $intTrainerId, $objDatabase ) {
		
		$strSQL = 'SELECT * FROM trainers WHERE id = ' . $intTrainerId;

		return self::fetchTrainer( $strSQL, $objDatabase );
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

	public static function fetchAllTrainersDetails( $objDatabase ) {

		$strSQL = ' SELECT
						u.*,
						l.first_name,
						l.last_name
					FROM
						users u
						JOIN leads l ON ( l.user_id = u.id )';

		return self::fetchTrainers( $strSQL, $objDatabase );
	}

	public function fetchTrainersByUserIds( $arrintUserIds, $objDatabase ) {
		if( false == valArr( $arrintUserIds ) ) return NULL;

		$strSQL = ' SELECT
						*
					FROM
						trainers
					WHERE
						user_id IN ( ' . implode( $arrintUserIds, ',' ) . ' )';
		
		return self::fetchTrainers( $strSQL, $objDatabase );
	}

	public function fetchTrainerByUserId( $intUserId, $objDatabase ) {
		if( false == isset( $intUserId ) ) return NULL;

		$strSQL = ' SELECT
						*
					FROM
						trainers
					WHERE
						user_id = ' . ( int ) $intUserId;
		
		return self::fetchTrainer( $strSQL, $objDatabase );
	}

	public function fetchTrainerDetailsByIds( $arrintIds, $objDatabase ) {
		
		$strSQL = ' SELECT
						t.id,
						l.first_name,
						l.last_name
					FROM
						trainers t
						JOIN leads l ON ( l.id = t.lead_id )
					WHERE
						t.id IN ( ' . implode( ',', $arrintIds ) .' )';
		
		return self::fetchTrainers( $strSQL, $objDatabase );
	}
}

?>