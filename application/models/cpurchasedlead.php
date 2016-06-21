<?php

class CPurchasedLead extends CEosSingular {

	public $intId;
	public $intLeadId;
	public $intBoughtLeadId;
	
	public $strNotifiedOn;
	public $strClosedOn;
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'lead_id', $arrstrRequestData ) )
			$this->setLeadId( $arrstrRequestData['lead_id'] );

		if( true == array_key_exists( 'bought_lead_id', $arrstrRequestData ) )
			$this->setBoughtLeadId( $arrstrRequestData['bought_lead_id'] );

		if( true == array_key_exists( 'notified_on', $arrstrRequestData ) )
			$this->setNotifiedOn( $arrstrRequestData['notified_on'] );

		if( true == array_key_exists( 'deleted_by', $arrstrRequestData ) )
			$this->setDeletedBy( $arrstrRequestData['deleted_by'] );

		if( true == array_key_exists( 'closed_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['closed_on'] );

		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setLeadId( $intLeadId ) {
		$this->intLeadId = $intLeadId;
	}

	public function setBoughtLeadId( $intBoughtLeadId ) {
		$this->intBoughtLeadId = $intBoughtLeadId;
	}

	public function setNotifiedOn( $strNotifiedOn ) {
		$this->strNotifiedOn = $strNotifiedOn;
	}

	public function setClosedOn( $strClosedOn ) {
		$this->strClosedOn = $strClosedOn;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId( $intId ) {
		return $this->intId;
	}

	public function getLeadId( $intLeadId ) {
		return $this->intLeadId;
	}

	public function getBoughtLeadId( $intBoughtLeadId ) {
		return $this->intBoughtLeadId;
	}

	public function getNotifiedOn( $strNotifiedOn ) {
		return $this->strNotifiedOn;
	}

	public function getClosedOn( $strClosedOn ) {
		return $this->strClosedOn;
	}

	public function setCreatedOn() {
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

		$arrStrInsertData = array(
								'lead_id'			=> $this->intLeadId,
								'bought_lead_id'	=> $this->intBoughtLeadId,
								'notified_on'		=> $this->strNotifiedOn,
								'closed_on'			=> $this->strClosedOn,
								'created_on'		=> NOW(),
							);

		if( false == $this->db->insert( 'purchased_leads', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intLeadId ) ) $arrStrUpdateData['lead_id'] = $this->intLeadId;
		if( false == is_null( $this->intBoughtLeadId ) ) $arrStrUpdateData['bought_lead_id'] = $this->intBoughtLeadId;
		if( false == is_null( $this->strNotifiedOn ) ) $arrStrUpdateData['notified_on'] = $this->strNotifiedOn;
		if( false == is_null( $this->strClosedOn ) ) $arrStrUpdateData['closed_on'] = $this->strClosedOn;
								

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'purchased_leads', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'purchased_leads' ) ) return false;

		return true;
	}
}

?>