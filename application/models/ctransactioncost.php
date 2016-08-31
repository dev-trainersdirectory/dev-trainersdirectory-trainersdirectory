<?php

class CTransactionCost extends CEosSingular {

	public $intId;
	public $intTransactionTypeId;
	public $intCoins;
	public $intUpdatedBy;
	public $strUpdatedOn;

	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'transaction_type_id', $arrstrRequestData ) )
			$this->setTransactionTypeId( $arrstrRequestData['transaction_type_id'] );

		if( true == array_key_exists( 'coins', $arrstrRequestData ) )
			$this->setCoins( $arrstrRequestData['coins'] );

		if( true == array_key_exists( 'updated_by', $arrstrRequestData ) )
			$this->setUpdatedBy( $arrstrRequestData['updated_by'] );

		if( true == array_key_exists( 'updated_on', $arrstrRequestData ) )
			$this->setUpdatedOn( $arrstrRequestData['updated_on'] );
	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setTransactionTypeId( $strTransactionTypeId ) {
		$this->strTransactionTypeId = $strTransactionTypeId;
	}

	public function setCoins( $intCoins ) {
		$this->intCoins = $intCoins;
	}

	public function setUpdatedBy( $intUpdatedBy ) {
		$this->intUpdatedBy = $intUpdatedBy;
	}

	public function setUpdatedOn( $intUpdatedOn ) {
		$this->intUpdatedOn = $intUpdatedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getTransactionTypeId() {
		return $this->strTransactionTypeId;
	}

	public function getCoins() {
		return $this->intCoins;
	}

	public function getUpdatedBy() {
		return $this->intUpdatedBy;
	}

	public function getUpdatedOn() {
		return $this->intUpdatedOn;
	}

	public function validate( $strAction, $objDatabase ) {

		$boolResult = true;

		switch ( $strAction ) {
			case 'insert':
			case 'update':
			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function insert() {

		$arrStrInsertData = array(
								'transaction_type_id' => $this->intTransactionTypeId,
								'coins' => $this->intCoins
							);

		if( false == $this->db->insert( 'transaction_costs', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['coins'] = $this->intCoins;
		$arrStrUpdateData['updated_by'] = 1;
		$arrStrUpdateData['updated_on'] = 'NOW()';

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'transaction_costs', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'transaction_costs' ) ) return false;

		return true;
	}
	
}

?>