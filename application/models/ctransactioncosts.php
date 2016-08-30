<?php

class CTransactionCosts extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTransactionCosts( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTransactionCost', $strSQL, $objDatabase );
	}

	public function fetchTransactionCost( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTransactionCost', $strSQL, $objDatabase );
	}

	public static function fetchAllTransactionCosts( $objDatabase ) {
		$strSQL = 'SELECT * FROM transaction_costs';

		return self::fetchTransactionCosts( $strSQL, $objDatabase );
	}

	public static function fetchTransactionCostById( $intId, $objDatabase ) {

		$strSQL = 'SELECT * FROM transaction_costs where id = ' . (int) $intId;

		return self::fetchTransactionCost( $strSQL, $objDatabase );
	}

}

?>