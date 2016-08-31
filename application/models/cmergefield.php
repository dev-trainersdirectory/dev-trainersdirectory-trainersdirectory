<?php

class CMergeField extends CEosSingular {

	public $intId;
	public $strName;
	public $strLable;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );

		if( true == array_key_exists( 'lable', $arrstrRequestData ) )
			$this->setLable( $arrstrRequestData['lable'] );
		
	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setName( $strName ) {
		$this->strName = $strName;
	}

	public function setLable( $strLable ) {
		$this->strLable = $strLable;
	}

	public function getId() {
		return $this->intId;
	}

	public function getName() {
		return $this->strName;
	}

	public function getLable() {
		return $this->strLable;
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
			$this->intId = $this->getNextId( 'sq_merge_fields', $this->db );
		}
		
		$arrStrInsertData = array(
								'id'		=> $this->intId,
								'name' 		=> $this->strName,
								'lable' 	=> $this->strLable
							);

		if( false == $this->db->insert( 'merge_fields', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] 		= $this->strName;
		if( false == is_null( $this->strLable ) ) $arrStrUpdateData['lable'] 	= $this->strLable;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'merge_fields', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'merge_fields' ) ) return false;

		return true;
	}
	
}

?>