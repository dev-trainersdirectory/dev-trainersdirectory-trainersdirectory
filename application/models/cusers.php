<?php

class CUsers extends CEosPlural
{
	function __construct() {
		parent::__construct();
	}

	public function fetchUsers( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CUser', $strSQL, $objDatabase );
	}

	public function fetchUser( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CUser', $strSQL, $objDatabase );
	}

	public static function fetchAllUsers( $objDatabase ) {
		$strSQL = 'SELECT * FROM users';

		return self::fetchUsers( $strSQL, $objDatabase );
	}

	public static function fetchUserById( $intId, $objDatabase ) {
		$strSQL = 'SELECT * FROM users WHERE id = ' . ( int ) $intId;

		return self::fetchUser( $strSQL, $objDatabase );
	}	

	public static function fetchUserIdByEmailByPasswordByUserType( $strEmailId, $strPassword, $intUserType, $objDatabase ) {

		if( NULL != $intUserType ) $strCond = 'JOIN user_type_associations ua ON ( ua.user_id = u.id AND ua.user_type_id = '. $intUserType .' )';

		$strSQL = ' SELECT
						*
					FROM
						users u
					' . $strCond . '
					WHERE
					email_id = \'' . $strEmailId . '\'
					AND encrypted_password = \'' . md5( $strPassword ) . '\'';

		return self::fetchUser( $strSQL, $objDatabase );
	}

	public static function fetchUsersByFilter( $arrstrFilter, $objDatabase ) {
		$strWhere = '';
		if( true == valArr( $arrstrFilter ) ) {
			$strWhere = '';
		}

		$strSQL = 'SELECT
						u.*
					FROM 
						users u
						JOIN user_type_associations uta ON ( u.id = uta.user_id )';

		return self::fetchUsers( $strSQL, $objDatabase );
	}

}

?>