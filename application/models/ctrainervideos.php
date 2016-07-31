<?php

class CTrainerVideos extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainerVideo( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainerVideo', $strSQL, $objDatabase );
	}

	public function fetchTrainerVideos( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainerVideo', $strSQL, $objDatabase );
	}

	public static function fetchAllTrainerVideos( $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_videos';

		return self::fetchTrainerVideos( $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrainerVideos( $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_videos WHERE is_published = 1';

		return self::fetchTrainerVideos( $strSQL, $objDatabase );
	}

	public function fetchVideoById( $intTrainerVideoId, $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_videos WHERE id = ' . ( int ) $intTrainerVideoId;

		return self::fetchTrainerVideo( $strSQL, $objDatabase );
	}

}

?>