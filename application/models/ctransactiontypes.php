<?php

class CTransactionTypes extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTransactionTypes( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTransactionType', $strSQL, $objDatabase );
	}

	public function fetchTransactionType( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTransactionType', $strSQL, $objDatabase );
	}

	public static function fetchAllTransactionTypes( $objDatabase ) {
		$strSQL = 'SELECT * FROM transaction_types';

		return self::fetchTransactionTypes( $strSQL, $objDatabase );
	}

}

?>