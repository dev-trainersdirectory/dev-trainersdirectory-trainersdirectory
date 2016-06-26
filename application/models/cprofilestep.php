<?php

class CProfileStep extends CEosSingular {

	public $intId;
	public $intUserTypeId;
	public $strName;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'user_type_id', $arrstrRequestData ) )
			$this->setUserTypeId( $arrstrRequestData['user_type_id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );
	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setUserTypeId( $intUserTypeId ) {
		$this->intUserTypeId = $intUserTypeId;
	}

	public function setName( $strName ) {
		$this->strName = $strName;
	}

	public function getId() {
		return $this->intId;
	}

	public function getName() {
		return $this->strName;
	}

	public function getUserTypeId() {
		return $this->intUserTypeId;
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
								'user_type_id' 	=> $this->boolIsGrouped,
								'name' 		=> $this->strName
							);

		if( false == $this->db->insert( 'profile_steps', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intUserTypeId ) ) $arrStrUpdateData['user_type_id'] 	= $this->intUserTypeId;
		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] 		= $this->strName;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'profile_steps', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'profile_steps' ) ) return false;

		return true;
	}
	
}

?>