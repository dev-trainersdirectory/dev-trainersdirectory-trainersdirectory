<?php

class CAdvertisers extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchAdvertisers( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CAdvertiser', $strSQL, $objDatabase );
	}

	public function fetchAdvertiser( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CAdvertiser', $strSQL, $objDatabase );
	}

	public static function fetchAllAdvertisers( $objDatabase ) {
		$strSQL = 'SELECT * FROM advertisers';

		return self::fetchAdvertisers( $strSQL, $objDatabase );
	}

	public static function fetchAdvertiserById( $intAdvertiserId, $objDatabase ) {
		$strSQL = 'SELECT * FROM advertisers WHERE id = ' . (int) $intAdvertiserId;

		return self::fetchAdvertiser( $strSQL, $objDatabase );
	}
}

?>