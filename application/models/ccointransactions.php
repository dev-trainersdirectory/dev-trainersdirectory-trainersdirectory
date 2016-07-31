<?php

class CCoinTransactions extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchCoinTransaction( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CCoinTransaction', $strSQL, $objDatabase );
	}

	public function fetchCoinTransactions( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CCoinTransaction', $strSQL, $objDatabase );
	}

	public static function fetchAllCoinTransactions( $objDatabase ) {
		$strSQL = 'SELECT * FROM coin_transactions';

		return self::fetchCoinTransactions( $strSQL, $objDatabase );
	}
}

?>