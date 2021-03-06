<?php

class CTrainerLocations extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainerLocations( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainerLocation', $strSQL, $objDatabase );
	}

	public function fetchTrainerLocation( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainerLocation', $strSQL, $objDatabase );
	}

	public static function fetchTrainerLocationsByTrainerId( $intTrainerId, $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_locations WHERE trainer_id = ' . ( int ) $intTrainerId;

		return self::fetchTrainerLocations( $strSQL, $objDatabase );
	}
}

?>