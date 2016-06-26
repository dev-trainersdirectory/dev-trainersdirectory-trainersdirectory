<?php

class CSmsTypes extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchSmsTypes( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CSmsType', $strSQL, $objDatabase );
	}

	public function fetchSmsType( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CSmsType', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedSmsTemplates( $objDatabase ) {
		$strSQL = 'SELECT * FROM sms_types';

		return self::fetchSmsTypes( $strSQL, $objDatabase );
	}
}

?>