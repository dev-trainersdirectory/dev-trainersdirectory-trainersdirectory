<?php

class CPreferences extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchPrefernces( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CPreference', $strSQL, $objDatabase );
	}

	public function fetchPrefernce( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CPreference', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedPrefernces( $objDatabase ) {
		$strSQL = 'SELECT * FROM preferences';

		return self::fetchPrefernces( $strSQL, $objDatabase );
	}

}

?>