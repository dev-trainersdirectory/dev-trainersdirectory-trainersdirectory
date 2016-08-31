<?php

class CSystemEmail extends CEosSingular {

	public $intId;
	public $intCommunicationStatusId;

	public $strEmailSubject;
	public $strEmailTo;
	public $strEmailFrom;
	public $strEmailBody;
	public $strDeliveredOn;
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'email_subject', $arrstrRequestData ) )
			$this->setEmailSubject( $arrstrRequestData['email_subject'] );

		if( true == array_key_exists( 'email_to', $arrstrRequestData ) )
			$this->setEmailTo( $arrstrRequestData['email_to'] );

		if( true == array_key_exists( 'email_from', $arrstrRequestData ) )
			$this->setEmailFrom( $arrstrRequestData['email_from'] );

		if( true == array_key_exists( 'email_body', $arrstrRequestData ) )
			$this->setEmailBody( $arrstrRequestData['email_body'] );

		if( true == array_key_exists( 'communication_status_id', $arrstrRequestData ) )
			$this->setCommunicationStatusId( $arrstrRequestData['communication_status_id'] );

		if( true == array_key_exists( 'delivered_on', $arrstrRequestData ) )
			$this->delivered_on( $arrstrRequestData['delivered_on'] );
		
		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setEmailSubject( $strEmailSubject ) {
		$this->strEmailSubject = $strEmailSubject;
	}

	public function setEmailTo( $strEmailTo ) {
		$this->strEmailTo = $strEmailTo;
	}

	public function setEmailFrom( $strEmailFrom ) {
		$this->strEmailFrom = $strEmailFrom;
	}

	public function setEmailBody( $strEmailBody ) {
		$this->strEmailBody = $strEmailBody;
	}

	public function setCommunicationStatusId( $intCommunicationStatusId ) {
		$this->intCommunicationStatusId = $intCommunicationStatusId;
	}

	public function setDeliveredOn( $strDeliveredOn ) {
		$this->strDeliveredOn = $strDeliveredOn;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId( $intId ) {
		return $this->intId;
	}

	public function getEmailSubject( $strEmailSubject ) {
		return $this->strEmailSubject;
	}

	public function getEmailTo( $strEmailTo ) {
		return $this->strEmailTo;
	}

	public function getEmailFrom( $strEmailFrom ) {
		return $this->strEmailFrom;
	}

	public function getEmailBody( $strEmailBody ) {
		return $this->strEmailBody;
	}

	public function getCommunicationStatusId( $intCommunicationStatusId ) {
		return $this->intCommunicationStatusId;
	}

	public function getDeliveredOn( $strDeliveredOn ) {
		return $this->strDeliveredOn;
	}

	public function getCreatedOn( $strCreatedOn ) {
		return $this->strCreatedOn;
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
			$this->intId = $this->getNextId( 'sq_system_emails', $this->db );
		}
		$arrStrInsertData = array(
								'id'						=> $this->intId,
								'email_subject'				=> $this->strEmailSubject,
								'email_to'					=> $this->strEmailTo,
								'email_from'				=> $this->strEmailFrom,
								'email_body'				=> $this->strEmailBody,
								'communication_status_id'	=> $this->intCommunicationStatusId,
								'delivered_on'				=> $this->strDeliveredOn,
								'created_on'				=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'system_emails', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update( $arrStrColumns ) {

		$arrStrUpdateData = array();

		if( true == in_array( 'email_subject', $arrStrColumns ) ) $arrStrUpdateData['email_subject'] = $this->strEmailSubject;
		if( true == in_array( 'email_to', $arrStrColumns ) ) $arrStrUpdateData['email_to'] = $this->strEmailTo;
		if( true == in_array( 'email_from', $arrStrColumns ) ) $arrStrUpdateData['email_from'] = $this->strEmailFrom;
		if( true == in_array( 'email_body', $arrStrColumns ) ) $arrStrUpdateData['email_body']	= $this->strEmailBody;
		if( true == in_array( 'communication_status_id', $arrStrColumns ) ) $arrStrUpdateData['communication_status_id'] = $this->intCommunicationStatusId;
		if( true == in_array( 'delivered_on', $arrStrColumns ) ) $arrStrUpdateData['delivered_on'] = $this->strDeliveredOn;


		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'system_emails', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'system_emails' ) ) return false;

		return true;
	}

}

?>