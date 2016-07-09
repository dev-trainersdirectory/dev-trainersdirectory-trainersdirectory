<?php

class CUserTypeAssociations extends CEosPlural {

	function __construct() {
		parent::__construct();
	}

	public function fetchUserTypeAssociations( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CUserTypeAssociation', $strSQL, $objDatabase );
	}

	public function fetchUserTypeAssociation( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CUserTypeAssociation', $strSQL, $objDatabase );
	}

	public static function fetchAllUserTypeAssociations( $objDatabase ) {
		$strSQL = 'SELECT * FROM user_type_associations';

		return self::fetchUserTypeAssociations( $strSQL, $objDatabase );
	}

	public function fetchUserTypeAssociationsByUserId( $intUserId, $objDatabase ) {
		$strSQL = 'SELECT * FROM user_type_associations WHERE user_id = ' . ( int ) $intUserId;

		return self::fetchUserTypeAssociations( $strSQL, $objDatabase );
	}
}

?>