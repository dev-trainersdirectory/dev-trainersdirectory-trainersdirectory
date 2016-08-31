<?php

class CSmsTemplates extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchSmsTemplates( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CSmsTemplate', $strSQL, $objDatabase );
	}

	public function fetchSmsTemplate( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CSmsTemplate', $strSQL, $objDatabase );
	}

	public static function fetchAllSmsTemplates( $objDatabase ) {
		$strSQL = 'SELECT 
						st.subject as sms_type,
						t.* 
					FROM 
						sms_templates t
						JOIN sms_types st ON ( t.sms_type_id = st.id )';

		return self::fetchSmsTemplates( $strSQL, $objDatabase );
	}

	public static function fetchSmsTemplateById( $intSmsTemplateId, $objDatabase ) {
		$strSQL = 'SELECT * 
					FROM 
						sms_templates t
					WHERE 
						id = ' . (int) $intSmsTemplateId;

		return self::fetchSmsTemplate( $strSQL, $objDatabase );
	}

	public static function fetchActiveSmsTemplateCountBySmsTypeId( $objDatabase ) {
		return 0;
	}

	public static function fetchAllActiveSmsTemplates( $objDatabase ) {
		$strSQL = 'SELECT 
						st.subject as sms_type,
						t.* 
					FROM 
						sms_templates t
						JOIN sms_types st ON ( t.sms_type_id = st.id )
					WHERE
						t.is_active = 1';

		return self::fetchSmsTemplates( $strSQL, $objDatabase );
	}
}

?>