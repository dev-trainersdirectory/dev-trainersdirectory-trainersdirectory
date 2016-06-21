<?php

class CUser extends CEosSingular {
	
	public $intId;
	public $intUserTypeId;
	public $intFacebookId;
	public $intGoogleId;
	public $intStatusId;
	public $intVerifiedBy;

	public $strEmailId;
	public $strPassword;
	public $strVerifiedOn;
	public $strCreatedOn;

	public $objUser;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'user_type_id', $arrstrRequestData ) )
			$this->setUserTypeId( $arrstrRequestData['user_type_id'] );

		if( true == array_key_exists( 'facebook_id', $arrstrRequestData ) )
			$this->setFacebookId( $arrstrRequestData['facebook_id'] );

		if( true == array_key_exists( 'google_id', $arrstrRequestData ) )
			$this->setGoogleId( $arrstrRequestData['google_id'] );

		if( true == array_key_exists( 'status_id', $arrstrRequestData ) )
			$this->setStatusId( $arrstrRequestData['status_id'] );

		if( true == array_key_exists( 'verified_by', $arrstrRequestData ) )
			$this->setVerifiedBy( $arrstrRequestData['verified_by'] );

		if( true == array_key_exists( 'email_id', $arrstrRequestData ) )
			$this->setEmailId( $arrstrRequestData['email_id'] );

		if( true == array_key_exists( 'password', $arrstrRequestData ) )
			$this->setPassword( $arrstrRequestData['password'] );

		if( true == array_key_exists( 'verified_on', $arrstrRequestData ) )
			$this->setVerifiedOn( $arrstrRequestData['verified_on'] );
		
		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId ( $intId ) {
		$this->intId = $intId;
	}

	public function setUserTypeId ( $intUserTypeIds ) {
		$this->intUserTypeId = $intUserTypeId;
	}

	public function setFacebookId ( $intFacebookId ) {
		$this->intFacebookId = $intFacebookId;
	}

	public function setGoogleId ( $intGoogleId ) {
		$this->intGoogleId = $intGoogleId;
	}

	public function setStatusId ( $intStatusId ) {
		$this->intStatusId = $intStatusId;
	}

	public function setVerifiedBy ( $intVerifiedBy ) {
		$this->intVerifiedBy = $intVerifiedBy;
	}

	public function setEmailId ( $strEmailId ) {
		$this->strEmailId = $strEmailId;
	}

	public function setPassword ( $strPassword ) {
		$this->strPassword = $strPassword;
	}

	public function setVerifiedOn ( $strVerifiedOn ) {
		$this->strVerifiedOn = $strVerifiedOn;
	}

	public function setCreatedOn ( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId ( $intId ) {
		return $this->intId;
	}

	public function getUserTypeId ( $intUserTypeIds ) {
		return $this->intUserTypeId;
	}

	public function getFacebookId ( $intFacebookId ) {
		return $this->intFacebookId;
	}

	public function getGoogleId ( $intGoogleId ) {
		return $this->intGoogleId;
	}

	public function getStatusId ( $intStatusId ) {
		return $this->intStatusId;
	}

	public function getVerifiedBy ( $intVerifiedBy ) {
		return $this->intVerifiedBy;
	}

	public function getEmailId ( $strEmailId ) {
		return $this->strEmailId;
	}

	public function getPassword ( $strPassword ) {
		return $this->strPassword;
	}

	public function getVerifiedOn ( $strVerifiedOn ) {
		return $this->strVerifiedOn;
	}

	public function getCreatedOn ( $strCreatedOn ) {
		return $this->strCreatedOn;
	}

	public function validate( $strAction ) {

		$boolResult = true;

		switch ( $strAction ) {
			case 'login':
				$boolResult = $this->validateLogin();
				break;

			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function validateLogin() {

		if( '' == $this->strEmailId || '' == $this->strPassword ) return false;

		if( true == isset( $this->strEmailId ) ) {
			return filter_var( $this->strEmailId, FILTER_VALIDATE_EMAIL );
		}
	}

	public function processLogin() {

		if( false == $this->validate( 'login' ) ) return false;

		$this->intUserId = CUsers::fetchUserIdByEmailByPassword( $this->strEmailId, $this->strPassword );

		if( NULL != $this->objUserId ) return false;
	}

	public function insert() {

		$arrStrInsertData = array(
								'user_type_id'	=> $this->intUserTypeId,
								'email_id'		=> $this->strEmailId,
								'password'		=> $this->strPassword,
								'facebook_id'	=> $this->intFacebookId,
								'google_id' 	=> $this->intGoogleId,
								'status_id'		=> $this->intStatusId,
								'verified_by'	=> $this->intVerifiedBy,
								'verified_on'	=> $this->strVerifiedOn,
								'created_on'	=> $this->strCreatedOn,
							);

		if( false == $this->db->insert( 'users', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intUserTypeId ) ) $arrStrUpdateData['user_type_id'] = $this->intUserTypeId;
		if( false == is_null( $this->strEmailId ) ) $arrStrUpdateData['email_id'] = $this->strEmailId;
		if( false == is_null( $this->strEmailId ) ) $arrStrUpdateData['password'] = $this->strPassword;
		if( false == is_null( $this->intFacebookId ) ) $arrStrUpdateData['facebook_id'] = $this->intFacebookId;
		if( false == is_null( $this->intGoogleId ) ) $arrStrUpdateData['google_id'] = $this->intGoogleId;
		if( false == is_null( $this->intStatusId ) ) $arrStrUpdateData['status_id'] = $this->intStatusId;
		if( false == is_null( $this->intVerifiedBy ) ) $arrStrUpdateData['verified_by'] = $this->intVerifiedBy;
		if( false == is_null( $this->strVerifiedOn ) ) $arrStrUpdateData['verified_on'] = $this->strVerifiedOn;
		if( false == is_null( $this->strCreatedOn ) ) $arrStrUpdateData['created_on' ] = $this->strCreatedOn;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'users', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'users' ) ) return false;

		return true;
	}

	public function setSession() {
		$objLoggedinUser = CUsers::fetchUserById( $this->intUserId );

		$arrMixSession['userID']	= $objLoggedinUser->strUserId;
		$arrMixSession['emailID']	= $objLoggedinUser->strEmailId;
		$this->session->set_userdata( $arrMixSession );
	}

}

?>