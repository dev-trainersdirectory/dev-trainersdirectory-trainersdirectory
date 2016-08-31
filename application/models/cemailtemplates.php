<?php

class CEmailTemplates extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchEmailTemplates( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CEmailTemplate', $strSQL, $objDatabase );
	}

	public function fetchEmailTemplate( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CEmailTemplate', $strSQL, $objDatabase );
	}

	public static function fetchAllEmailTemplates( $objDatabase ) {
		$strSQL = 'SELECT 
						et.subject as email_type,
						ut.name as user_type,
						t.* 
					FROM 
						email_templates t
						JOIN email_types et ON ( t.email_type_id = et.id )
						JOIN user_types ut ON ( t.user_type_id = ut.id )';

		return self::fetchEmailTemplates( $strSQL, $objDatabase );
	}

	public static function fetchEmailTemplateById( $intEmailTemplateId, $objDatabase ) {
		$strSQL = 'SELECT * 
					FROM 
						email_templates t
					WHERE 
						id = ' . (int) $intEmailTemplateId;

		return self::fetchEmailTemplate( $strSQL, $objDatabase );
	}

	public static function fetchActiveEmailTemplateCountByEmailTypeIdByUserTypeId( $objDatabase ) {
		return 0;
	}

	public function fetchAllActiveEmailTemplates( $objDatabase ) {
		$strSQL = 'SELECT 
						et.subject as email_type,
						ut.name as user_type,
						t.* 
					FROM 
						email_templates t
						JOIN email_types et ON ( t.email_type_id = et.id )
						JOIN user_types ut ON ( t.user_type_id = ut.id )
					WHERE
						t.is_active = 1';

		return self::fetchEmailTemplates( $strSQL, $objDatabase );
	}
}

?>