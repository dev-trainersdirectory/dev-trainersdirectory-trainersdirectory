<?php

class CCities extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchCities( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CCity', $strSQL, $objDatabase );
	}

	public function fetchCity( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CCity', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedCities( $objDatabase ) {
		$strSQL = 'SELECT * FROM cities';

		return self::fetchCities( $strSQL, $objDatabase );
	}
}

?>