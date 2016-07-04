<?php

class CLead extends CEosSingular {
	
	public $intId;
	public $intUserId;
	public $strFirstName;
	public $strLastName;
	public $intGenderId;
	public $strBirthDate;
	public $strProfilePic;
	public $strAddress;
	public $intCityId;
	public $intStateId;
	public $intPinCode;
	public $intAlternateContactNumber;
	public $boolIsNumberVerified;
	public $boolIsNumberPrivate;
	public $boolAllowSmsAlert;	
	public $intCoins;
	public $boolIsActive;
	public $strCreatedBy;
	public $strCreatedOn;

	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'user_id', $arrstrRequestData ) )
			$this->setUserId( $arrstrRequestData['user_id'] );

		if( true == array_key_exists( 'first_name', $arrstrRequestData ) )
			$this->setFirstName( $arrstrRequestData['first_name'] );

		if( true == array_key_exists( 'last_name', $arrstrRequestData ) )
			$this->setLastName( $arrstrRequestData['last_name'] );

		if( true == array_key_exists( 'gender_id', $arrstrRequestData ) )
			$this->setGenderId( $arrstrRequestData['gender_id'] );

		if( true == array_key_exists( 'birth_date', $arrstrRequestData ) )
			$this->setBirthdate( $arrstrRequestData['birth_date'] );

		if( true == array_key_exists( 'profile_pic', $arrstrRequestData ) )
			$this->setProfilePic( $arrstrRequestData['profile_pic'] );

		if( true == array_key_exists( 'address', $arrstrRequestData ) )
			$this->setAddress( $arrstrRequestData['address'] );

		if( true == array_key_exists( 'city_id', $arrstrRequestData ) )
			$this->setCityId( $arrstrRequestData['city_id'] );
		
		if( true == array_key_exists( 'state_id', $arrstrRequestData ) )
			$this->setStateId( $arrstrRequestData['state_id'] );

		if( true == array_key_exists( 'pin_code', $arrstrRequestData ) )
			$this->setPinCode( $arrstrRequestData['pin_code'] );

		if( true == array_key_exists( 'alternate_contact_number', $arrstrRequestData ) )
			$this->setAlternateContactNumber( $arrstrRequestData['alternate_contact_number'] );

		if( true == array_key_exists( 'is_number_verified', $arrstrRequestData ) )
			$this->setIsNumberVerified( $arrstrRequestData['is_number_verified'] );

		if( true == array_key_exists( 'is_number_private', $arrstrRequestData ) )
			$this->setIsNumberPrivate( $arrstrRequestData['is_number_private'] );

		if( true == array_key_exists( 'allow_sms_alert', $arrstrRequestData ) )
			$this->setAllowSmsAlert( $arrstrRequestData['allow_sms_alert'] );

		if( true == array_key_exists( 'coins', $arrstrRequestData ) )
			$this->setCoins( $arrstrRequestData['coins'] );

		if( true == array_key_exists( 'is_active', $arrstrRequestData ) )
			$this->setIsActive( $arrstrRequestData['is_active'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );

		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setUserId( $intUserId ) {
		$this->intUserId = $intUserId;
	}

	public function setFirstName( $strFirstName ) {
		$this->strFirstName = $strFirstName;
	}

	public function setLastName( $strLastName ) {
		$this->strLastName = $strLastName;
	}

	public function setGenderId( $intGenderId ) {
		$this->intGenderId = $intGenderId;
	}

	public function setBirthdate( $strBirthDate ) {
		$this->strBirthDate = $strBirthDate;
	}

	public function setProfilePic( $strProfilePic ) {
		$this->strProfilePic = $strProfilePic;
	}

	public function setAddress( $strAddress ) {
		$this->strAddress = $strAddress;
	}

	public function setCityId( $intCityId ) {
		$this->intCityId = $intCityId;
	}

	public function setStateId( $intStateId ) {
		$this->intStateId = $intStateId;
	}

	public function setPinCode( $intPinCode ) {
		$this->intPinCode = $intPinCode;
	}

	public function setAlternateContactNumber( $intAlternateContactNumber ) {
		$this->intAlternateContactNumber = $intAlternateContactNumber;
	}

	public function setIsNumberVerified( $boolIsNumberVerified ) {
		$this->boolIsNumberVerified = $boolIsNumberVerified;
	}

	public function setIsNumberPrivate( $boolIsNumberPrivate ) {
		$this->boolIsNumberPrivate = $boolIsNumberPrivate;
	}

	public function setAllowSmsAlert( $boolAllowSmsAlert ) {
		$this->boolAllowSmsAlert = $boolAllowSmsAlert;
	}

	public function setCoins( $intCoins ) {
		$this->intCoins = $intCoins;
	}

	public function setIsActive( $boolIsActive ) {
		$this->boolIsActive = $boolIsActive;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function setCreatedBy( $strCreatedBy ) {
		$this->strCreatedBy = $strCreatedBy;
	}

	public function getId() {
		return $this->intId;
	}

	public function getUserId() {
		return $this->intUserId;
	}

	public function getFirstName() {
		return $this->strFirstName;
	}

	public function getLastName() {
		return $this->strLastName;
	}

	public function getGenderId() {
		return $this->intGenderId;
	}

	public function getBirthdate() {
		return $this->strBirthDate;
	}

	public function getProfilePic() {
		return $this->strProfilePic;
	}

	public function getAddress() {
		return $this->strAddress;
	}

	public function getCityId() {
		return $this->intCityId;
	}

	public function getStateId() {
		return $this->intStateId;
	}

	public function getPinCode() {
		return $this->intPinCode;
	}

	public function getAlternateContactNumber() {
		return $this->intAlternateContactNumber;
	}

	public function getIsNumberVerified() {
		return $this->boolIsNumberVerified;
	}

	public function getIsNumberPrivate() {
		return $this->boolIsNumberPrivate;
	}

	public function getAllowSmsAlert() {
		return $this->boolAllowSmsAlert;
	}

	public function getCoins() {
		return $this->intCoins;
	}

	public function getIsActive() {
		return $this->boolIsActive;
	}

	public function getCreatedOn() {
		return $this->strCreatedOn;
	}

	public function getCreatedBy() {
		return $this->strCreatedBy;
	}

	public function getFullName() {
		return $this->getFirstName() . ' ' . $this->getLastName();
	}

	public function validate() {

		$boolResult = true;

		switch ( $strAction ) {
			
			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function insert() {

		$arrStrInsertData = array(
								'first_name'				=> $this->strFirstName,
								'last_name'					=> $this->strLastName,
								'gender_id'					=> $this->intGenderId,
								'birth_date'				=> $this->strBirthDate,
								'address' 					=> $this->strAddress,
								'city'						=> $this->strCity,
								'state'						=> $this->strState,
								'pin_code'					=> $this->intPinCode,
								'alternate_contact_number'	=> $this->intAlternateContactNumber,
								'is_number_verified'		=> $this->boolIsNumberPrivate,
								'is_number_private'			=> $this->boolIsNumberVerified,
								'allow_sms_alert'			=> $this->boolAllowSmsAlert,
								'coins'						=> $this->intCoins,
								'is_active'					=> $this->boolIsActive,
								'created_by'				=> $this->strCreatedBy,
								'created_on'				=> NOW(),
							);

		if( false == $this->db->insert( 'leads', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();
		$arrStrUpdateData['first_name'] = $this->strFirstName;
		$arrStrUpdateData['last_name'] = $this->strLastName;
		$arrStrUpdateData['gender_id'] = $this->intGenderId;
		$arrStrUpdateData['birth_date'] = $this->strBirthDate;
		$arrStrUpdateData['address'] = $this->strAddress;
		$arrStrUpdateData['city_id'] = $this->intCityId;
		$arrStrUpdateData['state_id']	= $this->intStateId;
		$arrStrUpdateData['pin_code'] = $this->intPinCode;
		$arrStrUpdateData['alternate_contact_number'] = $this->intAlternateContactNumber;
		$arrStrUpdateData['is_number_private'] = $this->boolIsNumberPrivate;
		$arrStrUpdateData['is_number_verified']	= $this->boolIsNumberVerified;
		$arrStrUpdateData['allow_sms_alert'] = $this->boolAllowSmsAlert;
		$arrStrUpdateData['coins'] = $this->intCoins;
		$arrStrUpdateData['is_active']	= $this->boolIsActive;
		
		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'leads', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'leads' ) ) return false;

		return true;
	}

}

?>