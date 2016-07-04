<?php

class CStates extends CEosPlural
{
	
	function __construct() {
		parent::__construct();
	}

	public function fetchStates( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CState', $strSQL, $objDatabase );
	}

	public function fetchState( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CState', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedStates( $objDatabase ) {
		$strSQL = 'SELECT * FROM states WHERE is_published = true';

		return self::fetchStates( $strSQL, $objDatabase );
	}
}

?>