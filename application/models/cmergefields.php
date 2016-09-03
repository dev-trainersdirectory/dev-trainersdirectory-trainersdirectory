<?php

class CMergeFields extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchMergeFields( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CMergeField', $strSQL, $objDatabase );
	}

	public function fetchMergeField( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CMergeField', $strSQL, $objDatabase );
	}

	public static function fetchAllMergeFields( $objDatabase ) {
		$strSQL = 'SELECT * FROM merge_fields';

		return self::fetchMergeFields( $strSQL, $objDatabase );
	}
}

?>