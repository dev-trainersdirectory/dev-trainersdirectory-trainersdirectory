<?php

class CUser extends CEosSingular {
	
	public $intId;
	public $intContactNumber;
	public $intFacebookId;
	public $intGoogleId;
	public $intStatusId;
	public $intVerifiedBy;

	public $strEmailId;
	public $strEncryptedPassword;
	public $strVerifiedOn;
	public $strCreatedOn;

	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'contact_number', $arrstrRequestData ) )
			$this->setContactNumber( $arrstrRequestData['contact_number'] );

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
			$this->strEncryptedPassword( $arrstrRequestData['password'] );

		if( true == array_key_exists( 'verified_on', $arrstrRequestData ) )
			$this->setVerifiedOn( $arrstrRequestData['verified_on'] );
		
		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId ( $intId ) {
		$this->intId = $intId;
	}

	public function setContactNumber( $intContactNumber ) {
		$this->intContactNumber = $intContactNumber;
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

	public function setEncryptedPassword ( $strEncryptedPassword ) {
		$this->strEncryptedPassword = $strEncryptedPassword;
	}

	public function setVerifiedOn ( $strVerifiedOn ) {
		$this->strVerifiedOn = $strVerifiedOn;
	}

	public function setCreatedOn ( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId ( ) {
		return (int) $this->intId;
	}

	public function getContactNumber() {
		return $this->intContactNumber;
	}

	public function getFacebookId ( ) {
		return $this->intFacebookId;
	}

	public function getGoogleId ( ) {
		return $this->intGoogleId;
	}

	public function getStatusId ( ) {
		return $this->intStatusId;
	}

	public function getVerifiedBy ( ) {
		return $this->intVerifiedBy;
	}

	public function getEmailId ( ) {
		return $this->strEmailId;
	}

	public function getEncryptedPassword (  ) {
		return $this->strEncryptedPassword;
	}

	public function getVerifiedOn (  ) {
		return $this->strVerifiedOn;
	}

	public function getCreatedOn (  ) {
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

		if( '' == $this->strEmailId || '' == $this->strEncryptedPassword ) return false;

		if( true == isset( $this->strEmailId ) ) {
			return filter_var( $this->strEmailId, FILTER_VALIDATE_EMAIL );
		}
	}

	public function processLogin( $intUserType = NULL ) {

		//if( false == $this->validate( 'login' ) ) return false;

		$this->intId = CUsers::fetchUserIdByEmailByPasswordByUserType( $this->strEmailId, $this->strEncryptedPassword, $intUserType, $this->db );

		return $this->intId;
	}

	public function insert() {

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_users', $this->db );
		}
		$arrStrInsertData = array(
								'id'					=> $this->intId,
								'email_id'				=> $this->strEmailId,
								'encrypted_password' 	=> $this->strEncryptedPassword,
								'contact_number'		=> $this->intContactNumber,
								'facebook_id'			=> $this->intFacebookId,
								'google_id' 			=> $this->intGoogleId,
								'status_id'				=> $this->intStatusId,
								'verified_by'			=> $this->intVerifiedBy,
								'verified_on'			=> $this->strVerifiedOn,
								'created_on'			=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'users', $arrStrInsertData ) ) return false;

		$this->setId( $this->db->insert_id() );

		return true;
	}

	public function update( $objDatabase, $arrStrUpdateData = array() ) {

		$arrStrUpdateData = array();

		$arrStrUpdateData['email_id'] = $this->strEmailId;
		$arrStrUpdateData['contact_number'] = $this->intContactNumber;
		$arrStrUpdateData['encrypted_password'] = $this->strEncryptedPassword;
		$arrStrUpdateData['facebook_id'] = $this->intFacebookId;
		$arrStrUpdateData['google_id'] = $this->intGoogleId;
		$arrStrUpdateData['status_id'] = $this->intStatusId;
		$arrStrUpdateData['verified_by'] = $this->intVerifiedBy;
		$arrStrUpdateData['verified_on'] = $this->strVerifiedOn;
		$arrStrUpdateData['created_on' ] = $this->strCreatedOn;

		$this->db->where( 'id =', $this->intId );

		if( false == $objDatabase->update( 'users', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'users' ) ) return false;

		return true;
	}

	public function setSession() {
		$objLoggedinUser = CUsers::fetchUserById( $this->intId, $this->db );

		$arrMixSession['userID']	= $objLoggedinUser->intId;
		$arrMixSession['emailID']	= $objLoggedinUser->strEmailId;
		$this->session->set_userdata( $arrMixSession );
	}

}

?>