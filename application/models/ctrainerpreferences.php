<?php

class CTrainerPreferences extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainerPreferences( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainerPreference', $strSQL, $objDatabase );
	}

	public function fetchTrainerPreferences( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainerPreference', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrainerPreferences( $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_preferences';

		return self::fetchSubjects( $strSQL, $objDatabase );
	}

}

?>