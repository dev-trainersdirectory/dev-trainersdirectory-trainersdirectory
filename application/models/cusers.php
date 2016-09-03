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
//show($strSQL);
		return self::fetchUser( $strSQL, $objDatabase );
	}

	public static function fetchUsersByFilter( $arrstrFilter, $objDatabase ) {
		$strWhere = ' WHERE true ';
		$arrstrFilter = array_filter( $arrstrFilter );
		if( true == valArr( $arrstrFilter ) ) {
			if( true == array_key_exists( 'name', $arrstrFilter ) )
				$strWhere .= 'AND lower( l.first_name ) like \'%'. trim( strtolower ($arrstrFilter['name'] ) ) . '%\' ';
			if( true == array_key_exists( 'email_id', $arrstrFilter ) )
				$strWhere .= 'AND lower( u.email_id ) like \'%'. trim( strtolower ($arrstrFilter['email_id'] ) ) . '%\' ';
			if( true == array_key_exists( 'contact_number', $arrstrFilter ) )
				$strWhere .= 'AND u.contact_number like \'%'. trim( $arrstrFilter['contact_number'] ) . '%\' ';
			if( true == array_key_exists( 'user_type_id', $arrstrFilter ) )
				$strWhere .= 'AND uta.user_type_id = ' . ( int ) $arrstrFilter['user_type_id'];
		}

		$strSQL = 'SELECT
						u.*
					FROM 
						users u
						JOIN user_type_associations uta ON ( u.id = uta.user_id )
						JOIN leads l ON ( u.id = l.user_id )' . $strWhere;

		return self::fetchUsers( $strSQL, $objDatabase );
	}

	public function fetchUsersByUserTypeId( $intUserTypeId, $objDatabase ) {
		
		$strSQL = 'SELECT
						u.*
					FROM 
						users u
						JOIN user_type_associations uta ON ( u.id = uta.user_id )
					WHERE
						uta.user_type_id = ' . ( int ) $intUserTypeId;

		return self::fetchUsers( $strSQL, $objDatabase );
	}

	public static function fetchUsersByFilterByOffsetByLimit( $arrstrFilter, $intLimit, $intOffset, $objDatabase ) {
		$strWhere = ' WHERE true ';
		$strJoin = '';
		$arrstrFilter = array_filter( $arrstrFilter );
		if( true == valArr( $arrstrFilter ) ) {
			if( true == array_key_exists( 'name', $arrstrFilter ) )
				$strWhere .= 'AND lower( l.first_name ) like \'%'. trim( strtolower ($arrstrFilter['name'] ) ) . '%\' ';
			if( true == array_key_exists( 'email_id', $arrstrFilter ) )
				$strWhere .= 'AND lower( u.email_id ) like \'%'. trim( strtolower ($arrstrFilter['email_id'] ) ) . '%\' ';
			if( true == array_key_exists( 'contact_number', $arrstrFilter ) )
				$strWhere .= 'AND u.contact_number like \'%'. trim( $arrstrFilter['contact_number'] ) . '%\' ';
			if( true == array_key_exists( 'user_type_id', $arrstrFilter ) ) {
				$strWhere .= 'AND uta.user_type_id = ' . ( int ) $arrstrFilter['user_type_id'];
				$strJoin .= 'JOIN user_type_associations uta ON ( u.id = uta.user_id )';
			}

		}

		$strSQL = ' SELECT
						u.*
					FROM 
						users u ' . $strJoin . '						
						JOIN leads l ON ( u.id = l.user_id )' . $strWhere .'
					LIMIT ' . $intLimit .' OFFSET ' . $intOffset;

		return self::fetchUsers( $strSQL, $objDatabase );
	}

	public function fetchUserCountByContactNumber( $intContactNumber, $objDatabase ) {

		$strSQL = 'SELECT count(id) as cnt FROM users WHERE contact_number = ' . $intContactNumber ;
		$arrResult = fetchData( $strSQL, $objDatabase );
		if( false == valArr( $arrResult ) ) return 0;
		return reset($arrResult)['cnt'];
	}

	public static function fetchUserDetailsById( $intUserId, $objDatabase ) {
		$strSQL = 'SELECT
						u.*, l.first_name, l.last_name
					FROM 
						users u
						JOIN user_type_associations uta ON ( u.id = uta.user_id )
						JOIN leads l ON ( u.id = l.user_id )
					WHERE 
						u.id =' . $intUserId;

		return self::fetchUser( $strSQL, $objDatabase );

	}

}

?>