<?php

class CProfileSteps extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchProfileSteps( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CProfileStep', $strSQL, $objDatabase );
	}

	public function fetchProfileStep( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CProfileStep', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedProfileSteps( $objDatabase ) {
		$strSQL = 'SELECT * FROM profile_steps';

		return self::fetchProfileSteps( $strSQL, $objDatabase );
	}
}

?>