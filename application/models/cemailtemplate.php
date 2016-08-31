<?php

class CEmailTemplate extends CEosSingular {

	public $intId;
	public $intEmailTypeId;
	public $strSendFromEmailId;
	public $intUserTypeId;
	public $strSubject;
	public $strContent;
	public $boolIsActive;

	public $strEmailType;
	public $strUserType;

	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'email_type_id', $arrstrRequestData ) )
			$this->setEmailTypeId( $arrstrRequestData['email_type_id'] );

		if( true == array_key_exists( 'send_from_email_id', $arrstrRequestData ) )
			$this->setSendFromEmailId( $arrstrRequestData['send_from_email_id'] );
		
		if( true == array_key_exists( 'user_type_id', $arrstrRequestData ) )
			$this->setUserTypeId( $arrstrRequestData['user_type_id'] );

		if( true == array_key_exists( 'subject', $arrstrRequestData ) )
			$this->setSubject( $arrstrRequestData['subject'] );

		if( true == array_key_exists( 'content', $arrstrRequestData ) )
			$this->setContent( $arrstrRequestData['content'] );

		if( true == array_key_exists( 'is_active', $arrstrRequestData ) )
			$this->setIsActive( $arrstrRequestData['is_active'] );

		if( true == array_key_exists( 'email_type', $arrstrRequestData ) )
			$this->setEmailType( $arrstrRequestData['email_type'] );

		if( true == array_key_exists( 'user_type', $arrstrRequestData ) )
			$this->setUserType( $arrstrRequestData['user_type'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setEmailTypeId( $intEmailTypeId ) {
		$this->intEmailTypeId = $intEmailTypeId;
	}

	public function setSendFromEmailId( $strSendFromEmailId ) {
		$this->strSendFromEmailId = $strSendFromEmailId;
	}

	public function setUserTypeId( $intUserTypeId ) {
		$this->intUserTypeId = $intUserTypeId;
	}

	public function setSubject( $strSubject ) {
		$this->strSubject = $strSubject;
	}

	public function setContent( $strContent ) {
		$this->strContent = $strContent;
	}

	public function setIsActive( $boolIsActive ) {
		$this->boolIsActive = $boolIsActive;
	}

	public function setEmailType( $strEmailType ) {
		$this->strEmailType = $strEmailType;
	}

	public function setUserType( $strUserType ) {
		$this->strUserType = $strUserType;
	}
	public function getId() {
		return $this->intId;;
	}

	public function getEmailTypeId() {
		return $this->intEmailTypeId;
	}

	public function getSendFromEmailId() {
		return $this->strSendFromEmailId;
	}

	public function getUserTypeId() {
		return $this->intUserTypeId;
	}

	public function getSubject() {
		return $this->strSubject;
	}

	public function getContent() {
		return $this->strContent;
	}

	public function getIsActive() {
		return $this->boolIsActive;
	}

	public function getEmailType() {
		return $this->strEmailType;
	}

	public function getUserType() {
		return $this->strUserType;
	}
	
	public function validate( $strAction, $objDatabase ) {

		$boolResult = true;

		switch ( $strAction ) {
			
			case 'insert':
			case 'update':
				break;

			default:
				break;
		}

		return $boolResult;
	}

	public function insert() {

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_email_templates', $this->db );
		}
		$arrStrInsertData = array(
								'id'					=> $this->intId,
								'email_type_id' 		=> $this->intEmailTypeId,
								'send_from_email_id' 	=> $this->strSendFromEmailId,
								'user_type_id' 			=> $this->intUserTypeId,
								'subject' 		=> $this->strSubject,
								'content' 		=> $this->strContent,
								'is_active' 	=> $this->boolIsActive,
							);

		if( false == $this->db->insert( 'email_templates', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['email_type_id'] 		= $this->intEmailTypeId;
		$arrStrUpdateData['send_from_email_id'] = $this->strSendFromEmailId;
		$arrStrUpdateData['user_type_id'] 	= $this->intUserTypeId;
		$arrStrUpdateData['subject'] 		= $this->strSubject;
		$arrStrUpdateData['content'] 		= $this->strContent;
		$arrStrUpdateData['is_active'] 		= $this->boolIsActive;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'email_templates', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'email_templates' ) ) return false;

		return true;
	}
}
?>