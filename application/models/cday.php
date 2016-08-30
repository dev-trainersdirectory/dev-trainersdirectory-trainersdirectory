<?php

class CDay extends CEosSingular {

	public $intId;
	public $strName;
	public $boolIsGrouped;
	public $boolIsPublished;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );

		if( true == array_key_exists( 'is_grouped', $arrstrRequestData ) )
			$this->setIsGrouped( $arrstrRequestData['is_grouped'] );
		
		if( true == array_key_exists( 'is_published', $arrstrRequestData ) )
			$this->setIsPublished( $arrstrRequestData['is_published'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setName( $strName ) {
		$this->strName = $strName;
	}

	public function setIsGrouped( $boolIsGrouped ) {
		$this->boolIsGrouped = $boolIsGrouped;
	}

	public function setIsPublished( $boolIsPublished ) {
		$this->boolIsPublished = $boolIsPublished;
	}

	public function getId() {
		return $this->intId;
	}

	public function getName() {
		return $this->strName;
	}

	public function getIsGrouped() {
		return $this->boolIsGrouped;
	}

	public function getIsPublished() {
		return $this->boolIsPublished;
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
								'id'			=> $this->getNextId( 'sq_days', $this->db ),
								'name' 			=> $this->strName,
								'is_grouped' 	=> $this->boolIsGrouped,
								'is_published' 	=> $this->boolIsPublished,
							);

		if( false == $this->db->insert( 'days', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] 		= $this->strName;
		if( false == is_null( $this->boolIsGrouped ) ) $arrStrUpdateData['is_grouped'] 	= $this->boolIsGrouped;
		if( false == is_null( $this->boolIsPublished ) ) $arrStrUpdateData['is_published'] = $this->boolIsPublished;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'days', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'days' ) ) return false;

		return true;
	}
	
}

?>