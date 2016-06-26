<?php

class CCoinTransactions extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchCoinTransaction( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'coin_transaction', $strSQL, $objDatabase );
	}

	public function fetchCoinTransactions( $strSQL, $objDatabase ) {
		return self::fetchObject( 'coin_transaction', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedCoinTransactions( $objDatabase ) {
		$strSQL = 'SELECT * FROM coin_transaction';

		return self::fetchCoinTransaction( $strSQL, $objDatabase );
	}
}

?>