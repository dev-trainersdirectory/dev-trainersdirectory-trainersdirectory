<?php

class CShowInterests extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchCShowInterests( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CShowInterest', $strSQL, $objDatabase );
	}

	public function fetchCShowInterest( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CShowInterest', $strSQL, $objDatabase );
	}

}

?>