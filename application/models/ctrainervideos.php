<?php

class CTrainerVideos extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainerVideo( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainerVideo', $strSQL, $objDatabase );
	}

	public function fetchTrainerVideos( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainerVideo', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrainerSkills( $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_videos';

		return self::fetchTrainerVideos( $strSQL, $objDatabase );
	}

}

?>