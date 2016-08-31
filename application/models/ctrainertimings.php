<?php

class CTrainerTimings extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainerTimings( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainerTiming', $strSQL, $objDatabase );
	}

	public function fetchTrainerTiming( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainerTiming', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrainerTimings( $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_timings';

		return self::fetchTrainerTimings( $strSQL, $objDatabase );
	}

	public static function fetchTrainerTimingsByTrainerId( $intTrainerId , $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_timings WHERE trainer_id = ' . (int) $intTrainerId;

		return self::fetchTrainerTimings( $strSQL, $objDatabase );
	}
}

?>