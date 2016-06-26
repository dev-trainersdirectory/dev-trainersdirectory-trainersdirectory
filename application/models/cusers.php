<?php

class CUsers extends CEosPlural
{
	function __construct() {
		parent::__construct();
	}

	public function fetchUsers( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CUser', $strSQL, $objDatabase );
	}

	public function fetchUser( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CUser', $strSQL, $objDatabase );
	}

	public static function fetchAllUsers( $objDatabase ) {
		$strSQL = 'SELECT * FROM users';

		return self::fetchUsers( $strSQL, $objDatabase );
	}

}

?>