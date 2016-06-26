<?php

class CSmsTemplate extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchSmsTemplates( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CSmsTemplate', $strSQL, $objDatabase );
	}

	public function fetchSmsTemplate( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CSmsTemplate', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedSmsTemplates( $objDatabase ) {
		$strSQL = 'SELECT * FROM sms_templates';

		return self::fetchSmsTemplates( $strSQL, $objDatabase );
	}
}

?>