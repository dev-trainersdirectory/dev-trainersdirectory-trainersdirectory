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
		$strSQL = 'SELECT * FROM tr_subjects';

		return self::fetchSubjects( $strSQL, $objDatabase );
	}
}

?>