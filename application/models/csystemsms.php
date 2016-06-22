<?php

class CSystemSms extends CEosSingular {
	
	public $intId;
	public $intCommunicationTypeId;
	public $intSendTo;
	public $intSentFrom;
	public $intCommunicationStatusId;

	public $strContent;
	public $strSubject;
	public $strDeliveredOn;
	public $strCreatedOn;

	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'subject', $arrstrRequestData ) )
			$this->setSubject( $arrstrRequestData['subject'] );

		if( true == array_key_exists( 'communication_type_id', $arrstrRequestData ) )
			$this->setCommunicationTypeId( $arrstrRequestData['communication_type_id'] );

		if( true == array_key_exists( 'send_to', $arrstrRequestData ) )
			$this->setSendTo( $arrstrRequestData['send_to'] );

		if( true == array_key_exists( 'sent_from', $arrstrRequestData ) )
			$this->setSentFrom( $arrstrRequestData['sent_from'] );

		if( true == array_key_exists( 'content', $arrstrRequestData ) )
			$this->setContent( $arrstrRequestData['content'] );

		if( true == array_key_exists( 'communication_status_id', $arrstrRequestData ) )
			$this->setCommunicationStatusId( $arrstrRequestData['communication_status_id'] );
		
		if( true == array_key_exists( 'delivered_on', $arrstrRequestData ) )
			$this->setDeliveredOn( $arrstrRequestData['delivered_on'] );

		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setSubject( $strSubject ) {
		$this->strSubject = $strSubject;
	}

	public function setCommunicationTypeId( $intCommunicationTypeId ) {
		$this->intCommunicationTypeId = $intCommunicationTypeId;
	}

	public function setSendTo( $intSendTo ) {
		$this->intSendTo = $intSendTo;
	}

	public function setSentFrom( $intSentFrom ) {
		$this->intSentFrom = $intSentFrom;
	}

	public function setContent( $strContent ) {
		$this->strContent = $strContent;
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

	public function getId() {
		return $this->intId;
	}

	public function getSubject() {
		return $this->strSubject;
	}

	public function getCommunicationTypeId() {
		return $this->intCommunicationTypeId;
	}

	public function getSendTo() {
		return $this->intSendTo;
	}

	public function getSentFrom() {
		return $this->intSentFrom;
	}

	public function getContent() {
		return $this->strContent;
	}

	public function getCommunicationStatusId() {
		$this->intCommunicationStatusId;
	}

	public function getDeliveredOn() {
		$this->strDeliveredOn;
	}

	public function getCreatedOn() {
		$this->strCreatedOn;
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

		$arrStrInsertData = array(
								'subject'					=> $this->strSubject,
								'communication_type_id'		=> $this->intCommunicationTypeId,
								'send_to'					=> $this->intSendTo,
								'sent_from'					=> $this->intSentFrom,
								'content'					=> $this->strContent,
								'communication_status_id'	=> $this->intCommunicationStatusId,
								'delivered_on'				=> $this->strDeliveredOn,
								'created_on'				=> 'NOW()',
							);

		if( false == $this->db->insert( 'system_sms', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update( $arrStrColumns ) {

		$arrStrUpdateData = array();

		if( true == in_array( 'subject', $arrStrColumns ) ) $arrStrUpdateData['subject'] = $this->strSubject;
		if( true == in_array( 'communication_type_id', $arrStrColumns ) ) $arrStrUpdateData['communication_type_id'] = $this->intCommunicationTypeId;
		if( true == in_array( 'send_to', $arrStrColumns ) ) $arrStrUpdateData['send_to']	= $this->intSendTo;
		if( true == in_array( 'sent_from', $arrStrColumns ) ) $arrStrUpdateData['sent_from'] = $this->intSentFrom;
		if( true == in_array( 'content', $arrStrColumns ) ) $arrStrUpdateData['content']	= $this->strContent;
		if( true == in_array( 'communication_status_id', $arrStrColumns ) ) $arrStrUpdateData['communication_status_id'] = $this->intCommunicationStatusId;
		if( true == in_array( 'delivered_on', $arrStrColumns ) ) $arrStrUpdateData['delivered_on'] = $this->strDeliveredOn;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'system_sms', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'system_sms' ) ) return false;

		return true;
	}

}

?>