<?php

class CMergeFields extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchDays( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CDay', $strSQL, $objDatabase );
	}

	public function fetchDay( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CDay', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedDays( $objDatabase ) {
		$strSQL = 'SELECT * FROM days';

		return self::fetchDays( $strSQL, $objDatabase );
	}
}

?>