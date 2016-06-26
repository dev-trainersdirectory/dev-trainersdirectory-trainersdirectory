<?php

class CSystemEmails extends CEosPlural
{
	function __construct() {
		parent::__construct();
	}

	public function fetchSystemEmails( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CSystemEmail', $strSQL, $objDatabase );
	}

	public function fetchSubject( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CSystemEmail', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedSystemEmails( $objDatabase ) {
		$strSQL = 'SELECT * FROM system_emails';

		return self::fetchSystemEmails( $strSQL, $objDatabase );
	}
	
}

?>