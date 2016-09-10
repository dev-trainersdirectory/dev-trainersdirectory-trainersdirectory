<?php

class CCoinTransaction extends CEosSingular {

	public $intId;
	public $intUserId;
	public $floatCredit;
	public $floatDebit;
	public $intPurchasedUserId;
	public $strRemark;
	public $boolStatus;
	public $intCoinTransactionId;
	public $strCreatedOn;
	public $strCreatedBy;

	const STATUS_PENDING = 1;
	const STATUS_APPROVED = 2;
	const STATUS_CANCELLED = 3;
	function __construct()
	{
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'user_id', $arrstrRequestData ) )
			$this->setUserId( $arrstrRequestData['user_id'] );

		if( true == array_key_exists( 'credit', $arrstrRequestData ) )
			$this->setCredit( $arrstrRequestData['credit'] );

		if( true == array_key_exists( 'debit', $arrstrRequestData ) )
			$this->setDebit( $arrstrRequestData['debit'] );

		if( true == array_key_exists( 'purchased_user_id', $arrstrRequestData ) )
			$this->setPurchasedUserId( $arrstrRequestData['purchased_user_id'] );

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

	public function setUserId( $intUserId ) {
		$this->intUserId = $intUserId;
	}

	public function setCredit( $floatCredit ) {
		$this->floatCredit = $floatCredit;
	}

	public function setDebit( $floatDebit ) {
		$this->floatDebit = $floatDebit;
	}

	public function setPurchasedUserId( $intPurchasedUserId ) {
		$this->intPurchasedUserId = $intPurchasedUserId;
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

	public function getUserId() {
		return $this->intUserId;
	}

	public function getCredit() {
		return $this->floatCredit;
	}

	public function getDebit() {
		return $this->floatDebit;
	}

	public function getPurchasedUserId() {
		return $this->intPurchasedUserId;
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_coin_transactions', $this->db );
		}
		$arrStrInsertData = array(
								'id'				=> $this->intId,
								'user_id'			=> $this->intUserId,
								'credit'			=> $this->floatCredit,
								'debit'				=> $this->floatDebit,
								'purchased_user_id' => $this->intPurchasedUserId,
								'remark'			=> $this->strRemark,
								'status'			=> $this->boolStatus,
								'created_by'		=> 1,
								'created_on'		=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'coin_transactions', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intUserId ) ) $arrStrUpdateData['user_id'] = $this->intUserId;
		if( false == is_null( $this->floatCredit ) ) $arrStrUpdateData['credit'] = $this->floatCredit;
		if( false == is_null( $this->floatDebit ) ) $arrStrUpdateData['debit'] = $this->floatDebit;
		if( false == is_null( $this->intPurchasedUserId ) ) $arrStrUpdateData['purchased_user_id'] = $this->intPurchasedUserId;
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