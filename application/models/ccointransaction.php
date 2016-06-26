<?php

class CCoinTransaction extends CEosSingular {

	public $intId;
	public $intLeadId;
	public $floatCredit;
	public $floatDebit;
	public $intPurchasedLeadId;
	public $strRemark;
	public $boolStatus;
	public $intCoinTransactionId;
	public $strCreatedOn;
	public $strCreatedBy;

	function __construct()
	{
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'lead_id', $arrstrRequestData ) )
			$this->setLeadId( $arrstrRequestData['lead_id'] );

		if( true == array_key_exists( 'credit', $arrstrRequestData ) )
			$this->setCredit( $arrstrRequestData['credit'] );

		if( true == array_key_exists( 'debit', $arrstrRequestData ) )
			$this->setDebit( $arrstrRequestData['debit'] );

		if( true == array_key_exists( 'purchased_lead_id', $arrstrRequestData ) )
			$this->setPurchasedLeadId( $arrstrRequestData['purchased_lead_id'] );

		if( true == array_key_exists( 'remark', $arrstrRequestData ) )
			$this->setRemark( $arrstrRequestData['remark'] );

		if( true == array_key_exists( 'status', $arrstrRequestData ) )
			$this->setStatus( $arrstrRequestData['status'] );

		if( true == array_key_exists( 'coin_transaction_id', $arrstrRequestData ) )
			$this->setCoinTransactionId( $arrstrRequestData['coin_transaction_id'] );
		
		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setLeadId( $intLeadId ) {
		$this->intLeadId = $intLeadId;
	}

	public function setCredit( $floatCredit ) {
		$this->floatCredit = $floatCredit;
	}

	public function setDebit( $floatDebit ) {
		$this->floatDebit = $floatDebit;
	}

	public function setPurchasedLeadId( $intPurchasedLeadId ) {
		$this->intPurchasedLeadId = $intPurchasedLeadId;
	}

	public function setRemark( $strRemark ) {
		$this->strRemark = $strRemark;
	}

	public function setStatus( $boolStatus ) {
		$this->boolStatus = $boolStatus;
	}

	public function setCoinTransactionId( $intCoinTransactionId ) {
		$this->intCoinTransactionId = $intCoinTransactionId;
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

	public function getLeadId() {
		return $this->intLeadId;
	}

	public function getCredit() {
		return $this->floatCredit;
	}

	public function getDebit() {
		return $this->floatDebit;
	}

	public function getPurchasedLeadId() {
		return $this->intPurchasedLeadId;
	}

	public function getRemark() {
		return $this->strRemark;
	}

	public function getStatus() {
		return $this->boolStatus;
	}

	public function getCoinTransactionId() {
		return $this->intCoinTransactionId;
	}

	public function getCreatedOn() {
		return $this->strCreatedOn;
	}

	public function getCreatedBy() {
		return $this->strCreatedBy;
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
								'user_id'			=> $this->intUserId,
								'credit'			=> $this->floatCredit,
								'debit'				=> $this->floatDebit,
								'purchased_lead_id' => $this->intPurchasedLeadId,
								'remark'			=> $this->strRemark,
								'status'			=> $this->boolStatus,
								'created_on'		=> NOW(),
							);

		if( false == $this->db->insert( 'coin_transactions', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intUserId ) ) $arrStrUpdateData['user_id'] = $this->intUserId;
		if( false == is_null( $this->floatCredit ) ) $arrStrUpdateData['credit'] = $this->floatCredit;
		if( false == is_null( $this->floatDebit ) ) $arrStrUpdateData['debit'] = $this->floatDebit;
		if( false == is_null( $this->intPurchasedLeadId ) ) $arrStrUpdateData['purchased_lead_id'] = $this->intPurchasedLeadId;
		if( false == is_null( $this->strRemark ) ) $arrStrUpdateData['remark'] = $this->strRemark;
		if( false == is_null( $this->boolStatus ) ) $arrStrUpdateData['status'] = $this->boolStatus;
		
		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'coin_transactions', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'coin_transactions' ) ) return false;

		return true;
	}
}

?>