<?php

class CEmailTypes extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchEmailTypes( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CEmailType', $strSQL, $objDatabase );
	}

	public function fetchEmailType( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CEmailType', $strSQL, $objDatabase );
	}

	public static function fetchAllEmailTypes( $objDatabase ) {
		$strSQL = 'SELECT * FROM email_types';

		return self::fetchEmailTypes( $strSQL, $objDatabase );
	}
}

?>