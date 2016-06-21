<?php

class CStatuses extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchStatuses( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CStatus', $strSQL, $objDatabase );
	}

	public function fetctStatus( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CStatus', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedStatuses( $objDatabase ) {
		$strSQL = 'SELECT * FROM statuses';

		return self::fetchStatuses( $strSQL, $objDatabase );
	}
}

?>