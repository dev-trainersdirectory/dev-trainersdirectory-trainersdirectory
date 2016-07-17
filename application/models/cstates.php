<?php

class CStates extends CEosPlural
{
	
	function __construct() {
		parent::__construct();
	}

	public function fetchStates( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CState', $strSQL, $objDatabase );
	}

	public function fetchState( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CState', $strSQL, $objDatabase );
	}

	public static function fetchAllStates( $objDatabase ) {
		$strSQL = 'SELECT * FROM states';

		return self::fetchStates( $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedStates( $objDatabase ) {
		$strSQL = 'SELECT * FROM states WHERE is_published = true';

		return self::fetchStates( $strSQL, $objDatabase );
	}

	public static function fetchStateById( $intStateId, $objDatabase ) {
		$strSQL = 'SELECT * FROM states WHERE id = ' . ( int ) $intStateId;

		return self::fetchState( $strSQL, $objDatabase );
	}

	public static function fetchStatesByIds( $arrintStateIds, $objDatabase ) {
		$strSQL = 'SELECT * FROM states WHERE id IN ( '  . implode( ',', $arrintStateIds ) . ' )';

		return self::fetchStates( $strSQL, $objDatabase );
	}
	
}

?>