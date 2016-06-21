<?php

class CSystemSmses extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchSystemSmses( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CSystemSms', $strSQL, $objDatabase );
	}

	public function fetchSystemSms( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CSystemSms', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedSystemSmses( $objDatabase ) {
		$strSQL = 'SELECT * FROM system_smses';

		return self::fetchSystemSmses( $strSQL, $objDatabase );
	}

}

?>