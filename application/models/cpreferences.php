<?php

class CPrefernces extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchPrefernces( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CPrefernce', $strSQL, $objDatabase );
	}

	public function fetchPrefernce( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CPrefernce', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedPrefernces( $objDatabase ) {
		$strSQL = 'SELECT * FROM prefernces';

		return self::fetchPrefernces( $strSQL, $objDatabase );
	}

}

?>