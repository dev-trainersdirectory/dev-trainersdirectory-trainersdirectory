<?php

class COtp extends CEosSingular {

	public $intId;
	public $intUserId;
	public $strContactNumber;
	public $strOtp;
	public $strSentOn;
	public $strExpiresOn;
	public $strClosedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'user_id', $arrstrRequestData ) )
			$this->setUserId( $arrstrRequestData['user_id'] );

		if( true == array_key_exists( 'contact_number', $arrstrRequestData ) )
			$this->setContactNumber( $arrstrRequestData['contact_number'] );

		if( true == array_key_exists( 'otp', $arrstrRequestData ) )
			$this->setOtp( $arrstrRequestData['otp'] );
		
		if( true == array_key_exists( 'sent_on', $arrstrRequestData ) )
			$this->setSentOn( $arrstrRequestData['sent_on'] );

		if( true == array_key_exists( 'expires_on', $arrstrRequestData ) )
			$this->setExpiresOn( $arrstrRequestData['expires_on'] );

		if( true == array_key_exists( 'closed_on', $arrstrRequestData ) )
			$this->setClosedOn( $arrstrRequestData['closed_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setUserId( $intUserId ) {
		$this->intUserId = $intUserId;
	}

	public function setContactNumber( $strContactNumber ) {
		$this->strContactNumber = $strContactNumber;
	}

	public function setOtp( $strOtp ) {
		$this->strOtp = $strOtp;
	}

	public function setSentOn( $strSentOn ) {
		$this->strSentOn = $strSentOn;
	}

	public function setExpiresOn( $strExpiresOn ) {
		$this->boolIsPublished = $strExpiresOn;
	}

	public function setClosedOn( $strClosedOn ) {
		$this->strClosedOn = $strClosedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getUserId() {
		return $this->intUserId;
	}

	public function getContactNumber() {
		return $this->strContactNumber;
	}

	public function getOtp() {
		return $this->strOpt;
	}

	public function getSentOn() {
		return $this->strSentOn;
	}

	public function getExpiresOn() {
		return $this->boolIsPublished;
	}

	public function getClosedOn() {
		return $this->strClosedOn;
	}

	public function validate( $strAction ) {

		$boolResult = true;

		switch ( $strAction ) {
			
			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function insert() {

		$strExpiresOn = date("Y-m-d H:i:s", strtotime(getCurrentDateTime( $this->db )) + 120);

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_otps', $this->db );
		}

		$arrStrInsertData = array(
								'id'			=> $this->intId,
								'user_id' 		=> $this->intUserId,
								'contact_number' => $this->strContactNumber,
								'otp' 	=> $this->strOtp,
								'sent_on' => getCurrentDateTime( $this->db ),
								'expires_on' => $strExpiresOn
							);

		if( false == $this->db->insert( 'otps', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['closed_on'] = $this->strClosedOn;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'otps', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'otps' ) ) return false;

		return true;
	}
	
}

?>