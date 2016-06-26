<?php

class COtps extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchOtps( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'COtp', $strSQL, $objDatabase );
	}

	public function fetchOtp( $strSQL, $objDatabase ) {
		return self::fetchObject( 'COtp', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedOtps( $objDatabase ) {
		$strSQL = 'SELECT * FROM otps';

		return self::fetchDays( $strSQL, $objDatabase );
	}
}

?>