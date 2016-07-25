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
		$strSQL = 'SELECT 
						adv.*,
						ad.name AS advertiser_name 
					FROM advertisements adv 
					JOIN advertisers ad ON( adv.advertiser_id = ad.id )';

		return self::fetchAdvertisements( $strSQL, $objDatabase );
	}

	public static function fetchAdvertisementById( $intAdvertisementId, $objDatabase ) {
		$strSQL = 'SELECT 
						adv.*,
						ad.name AS advertiser_name 
					FROM advertisements adv 
					JOIN advertisers ad ON( adv.advertiser_id = ad.id )
					WHERE adv.id = ' . (int) $intAdvertisementId;

		return self::fetchAdvertisement( $strSQL, $objDatabase );
	}
}

?>