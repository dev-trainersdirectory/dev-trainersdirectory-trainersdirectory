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

}

?>