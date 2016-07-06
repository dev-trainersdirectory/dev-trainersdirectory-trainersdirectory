<?php

class CTrainerPreferences extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainerPreferences( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainerPreference', $strSQL, $objDatabase );
	}

	public function fetchTrainerPreference( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainerPreference', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrainerPreferences( $objDatabase ) {
		$strSQL = 'SELECT * FROM  trainer_prefereces';

		return self::fetchTrainerPreferences( $strSQL, $objDatabase );
	}

	public static function fetchTrainerPreferencesByTrainerId( $intTrainerId, $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_prefereces WHERE trainer_id = ' . ( int ) $intTrainerId;

		return self::fetchTrainerPreferences( $strSQL, $objDatabase );
	}

}

?>