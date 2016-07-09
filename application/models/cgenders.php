<?php

class CGenders extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchGenders( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CGender', $strSQL, $objDatabase );
	}

	public function fetchGender( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CGender', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedGender( $objDatabase ) {
		$strSQL = 'SELECT * FROM genders';

		return self::fetchGenders( $strSQL, $objDatabase );
	}
}

?>