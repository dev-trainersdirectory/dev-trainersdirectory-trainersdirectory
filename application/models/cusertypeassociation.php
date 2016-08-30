<?php

class CUserTypeAssociation extends CEosSingular {

	public $intId;
	public $intUserId;
	public $intUserTypeId;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'user_id', $arrstrRequestData ) )
			$this->setUserId( $arrstrRequestData['user_id'] );

		if( true == array_key_exists( 'user_type_id', $arrstrRequestData ) )
			$this->setUserTypeId( $arrstrRequestData['user_type_id'] );
	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setUserId( $intUserId ) {
		$this->intUserId = $intUserId;
	}

	public function setUserTypeId( $intUserTypeId ) {
		$this->intUserTypeId = $intUserTypeId;
	}

	public function getId() {
		return $this->intId;
	}

	public function getUserId() {
		return $this->intUserId;
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_user_type_associations', $this->db );
		}

		$arrStrInsertData = array(
								'id'		=> $this->intId,
								'user_id' 	=> $this->intUserId,
								'user_type_id' => $this->intUserTypeId,
							);

		if( false == $this->db->insert( 'user_type_associations', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['user_id'] = $this->intUserId;
		$arrStrUpdateData['user_type_id'] = $this->intUserTypeId;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'user_type_associations', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'user_type_associations' ) ) return false;

		return true;
	}
	
}

?>