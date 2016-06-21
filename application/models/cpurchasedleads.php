<?php

class CPurchasedLeads extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchPurchasedLeads( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CPurchasedLead', $strSQL, $objDatabase );
	}

	public function fetchPurchasedLead( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CPurchasedLead', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedPurchasedLeads( $objDatabase ) {
		$strSQL = 'SELECT * FROM purchased_leads';

		return self::fetchPurchasedLeads( $strSQL, $objDatabase );
	}

}

?>