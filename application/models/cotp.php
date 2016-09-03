<?php

class COtp extends CEosSingular {

	public $intId;
	public $intUserId;
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

		if( true == array_key_exists( 'otp', $arrstrRequestData ) )
			$this->setOtp( $arrstrRequestData['opt'] );
		
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

	public function setOtp( $strOpt ) {
		$this->strOpt = $strOpt;
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

	public function setOtp() {
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_otps', $this->db );
		}
		$arrStrInsertData = array(
								'id'			=> $this->intId,
								'name' 			=> $this->strName,
								'is_grouped' 	=> $this->boolIsGrouped,
								'is_published' 	=> $this->boolIsPublished,
							);

		if( false == $this->db->insert( 'days', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] 		= $this->strName;
		if( false == is_null( $this->boolIsGrouped ) ) $arrStrUpdateData['is_grouped'] 	= $this->boolIsGrouped;
		if( false == is_null( $this->boolIsPublished ) ) $arrStrUpdateData['is_published'] = $this->boolIsPublished;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'days', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'days' ) ) return false;

		return true;
	}
	
}

?>