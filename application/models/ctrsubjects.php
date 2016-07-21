<?php

class CTrSubjects extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchSubjects( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrSubject', $strSQL, $objDatabase );
	}

	public function fetchSubject( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrSubject', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedSubjects( $objDatabase ) {
		$strSQL = 'SELECT * FROM tr_subjects WHERE deleted_by IS NULL AND deleted_on IS NULL';
		return self::fetchSubjects( $strSQL, $objDatabase );
	}

	public static function fetchSubjectsByTrcategoryId( $intTrCategoryId, $objDatabase ) {
		$strSQL = 'SELECT 
						* 
					FROM 
						tr_subjects 
					WHERE 
						tr_category_id = ' . ( int ) $intTrCategoryId . ' AND deleted_by IS NULL AND deleted_on IS NULL';

		return self::fetchSubjects( $strSQL, $objDatabase );
	}
}

?>