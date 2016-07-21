<?php

class CCoinTransactions extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchCoinTransaction( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'coin_transactions', $strSQL, $objDatabase );
	}

	public function fetchCoinTransactions( $strSQL, $objDatabase ) {
		return self::fetchObject( 'coin_transactions', $strSQL, $objDatabase );
	}

	public static function fetchAllCoinTransactions( $objDatabase ) {
		$strSQL = 'SELECT * FROM coin_transactions';

		return self::fetchCoinTransaction( $strSQL, $objDatabase );
	}
}

?>