<?php

class CLocations extends CEosPlural
{
	
	function __construct() {
		parent::__construct();
	}

	public function fetchLocations( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CLocation', $strSQL, $objDatabase );
	}

	public function fetchLocation( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CLocation', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedLocations( $objDatabase ) {
		$strSQL = 'SELECT * FROM locations';

		return self::fetchLocations( $strSQL, $objDatabase );
	}

}

?>