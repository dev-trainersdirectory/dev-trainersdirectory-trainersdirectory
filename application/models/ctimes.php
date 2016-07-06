<?php

class Ctimes extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTimes( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTime', $strSQL, $objDatabase );
	}

	public function fetchTime( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTime', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTimes( $objDatabase ) {
		$strSQL = 'SELECT * FROM times';

		return self::fetchTimes( $strSQL, $objDatabase );
	}

}

?>