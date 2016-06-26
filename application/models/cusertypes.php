<?php

class CUserTypes extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchUserTypes( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CUserType', $strSQL, $objDatabase );
	}

	public function fetchUserType( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CUserType', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedUserTypes( $objDatabase ) {
		$strSQL = 'SELECT * FROM user_type';

		return self::fetchUserTypes( $strSQL, $objDatabase );
	}
}

?>