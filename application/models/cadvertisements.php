<?php

class CAdvertisements extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchAdvertisements( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CAdvertisement', $strSQL, $objDatabase );
	}

	public function fetchAdvertisement( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CAdvertisement', $strSQL, $objDatabase );
	}

	public static function fetchAllAdvertisements( $objDatabase ) {
		$strSQL = 'SELECT * FROM advertisements';

		return self::fetchAdvertisements( $strSQL, $objDatabase );
	}
}

?>