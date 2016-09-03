<?php

class CLeads extends CEosPlural
{
	public $intId;
	public $intUserTypeId;
	public $strEmailId;
	public $strPassword;
	public $intFacebookId;
	public $intGoogleId;
	public $intStatusId;
	public $intVerifiedBy;
	public $strVerifiedOn;
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function fetchLeads( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CLead', $strSQL, $objDatabase );
	}

	public function fetchLead( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CLead', $strSQL, $objDatabase );
	}

	public function fetchAllLeads( $objDatabase ) {
		$strSQL = 'SELECT * FROM leads';
		
		return self::fetchLeads( $strSQL, $objDatabase );
	}

	public function fetchLeadById( $intLeadId, $objDatabase ) {

		if( NULL == $intLeadId ) return false;

		$strSQL = ' SELECT
						*
					FROM
						leads
					WHERE
						id = ' . $intLeadId;
		
		return self::fetchLead( $strSQL, $objDatabase );
	}

	public function fetchLeadsByIds( $arrintLeadIds ) {

		if( NULL == $arrintLeadIds ) return false;

		$strSQL = ' SELECT
						*
					FROM
						leads
					WHERE
						id IN ( ' . $intLeadId . ' )';
		
		return self::fetchLeads( $strSQL, $objDatabase );
	}

	public static function fetchLeadsByUserIds( $arrintUserIds, $objDatabase ) {
		if( false == valArr( $arrintUserIds ) ) return NULL;

		$strSQL = ' SELECT
						*
					FROM
						leads
					WHERE
						user_id IN ( ' . implode( $arrintUserIds, ',' ) . ' )';
		
		return self::fetchLeads( $strSQL, $objDatabase );
	}

	public static function fetchLeadByUserId( $intUserId, $objDatabase ) {
		$strSQL = 'SELECT * FROM leads WHERE user_id = ' . (int) $intUserId;
		return self::fetchLead( $strSQL, $objDatabase );
	}

	public function fetchLeadNamesByUserIds( $arrintUserIds, $objDatabase ) {
		if( false == valArr( $arrintUserIds ) ) return NULL;

		$strSQL = 'SELECT id, user_id, first_name, last_name FROM leads WHERE user_id IN ( ' . implode( ',', $arrintUserIds ) .' )';

		return self::fetchLeads( $strSQL, $objDatabase );
	}

	public function fetchLeadNamesByLeadIds( $arrintUserIds, $objDatabase ) {
		if( false == valArr( $arrintUserIds ) ) return NULL;

		$strSQL = 'SELECT id, user_id, first_name, last_name FROM leads WHERE id IN ( ' . implode( ',', $arrintUserIds ) .' )';

		return self::fetchLeads( $strSQL, $objDatabase );
	}

	public function fetchLeadNamesByLeadId( $intUserId, $objDatabase ) {

		$strSQL = 'SELECT id, user_id, first_name, last_name FROM leads WHERE id = ' . (int) $intUserId;

		return self::fetchLead( $strSQL, $objDatabase );
	}

	public function fetchLeadNamesByKey( $key, $objDatabase ) {
		
		$strCond = '';
		if( '' != $key ) {
			$strCond = ' WHERE first_name LIKE "%' . $key . '%"	OR last_name LIKE "%' . $key . '%"';
		}

		$strSQL = ' SELECT
						id,
						user_id,
						first_name,
						last_name
					FROM
						leads' . $strCond;

		return self::fetchLeads( $strSQL, $objDatabase );
	}

	public function fetchLeadNamesByTrainerIds( $arrintTrainerIds, $objDatabase ) {
		if( false == valArr( $arrintTrainerIds ) ) return NULL;

		$strSQL = ' SELECT
						l.id,
						l.user_id,
						l.first_name,
						l.last_name,
						t.id
					FROM
						leads l
						JOIN trainers t ON ( t.lead_id = l.id )
					WHERE t.id IN ( ' . implode( ',', $arrintTrainerIds ) .' )';

		return self::fetchLeads( $strSQL, $objDatabase );
	}

	public static function fetchLeadDetailsByUserId( $intUserId, $objDatabase ) {

		$strSQL = ' SELECT
						*,
						u.email_id,
						u.contact_number
					FROM
						leads l
						JOIN users u ON ( l.user_id = u.id )
					WHERE
						user_id = ' . $intUserId;
		
		return self::fetchLead( $strSQL, $objDatabase );
	}


}

?>