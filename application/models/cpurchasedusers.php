<?php

class CPurchasedLeads extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchPurchasedUsers( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CPurchasedUser', $strSQL, $objDatabase );
	}

	public function fetchPurchasedUser( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CPurchasedUser', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedPurchasedUsers( $objDatabase ) {
		$strSQL = 'SELECT * FROM purchased_users';

		return self::fetchPurchasedUsers( $strSQL, $objDatabase );
	}

}

?>