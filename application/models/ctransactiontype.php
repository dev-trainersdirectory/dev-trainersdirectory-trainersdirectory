<?php

class CTransactionType extends CEosSingular {

	public $intId;
	public $strName;

	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );
	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setName( $strName ) {
		$this->strName = $strName;
	}

	public function getId() {
		return $this->intId;;
	}

	public function getName() {
		return $this->strName;
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
								'name' => $this->strName
							);

		if( false == $this->db->insert( 'transaction_types', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['name'] 		= $this->strName;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'transaction_types', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'transaction_types' ) ) return false;

		return true;
	}
	
}

?>