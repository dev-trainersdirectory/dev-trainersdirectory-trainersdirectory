<?php

class CTrSubject extends CEosSingular {
	
	public $intId;
	public $intTrCategoryId;
	public $strName;
	public $strDescription;
	public $boolIsPublished;
	public $intOrderNum;
	public $intDeletedBy;
	public $strDeletedOn;
	public $intCreatedBy;
	public $strCreatedOn;

	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'tr_category_id', $arrstrRequestData ) )
			$this->setTrCategoryId( $arrstrRequestData['tr_category_id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );

		if( true == array_key_exists( 'description', $arrstrRequestData ) )
			$this->setDescription( $arrstrRequestData['description'] );

		if( true == array_key_exists( 'is_published', $arrstrRequestData ) )
			$this->setIsPublished( $arrstrRequestData['is_published'] );

		if( true == array_key_exists( 'order_num', $arrstrRequestData ) )
			$this->setOrderNum( $arrstrRequestData['order_num'] );

		if( true == array_key_exists( 'deleted_by', $arrstrRequestData ) )
			$this->setDeletedBy( $arrstrRequestData['deleted_by'] );
		
		if( true == array_key_exists( 'deleted_on', $arrstrRequestData ) )
			$this->setDeletedOn( $arrstrRequestData['deleted_on'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );
		
		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );
	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setTrCategoryId( $intTrCategoryId ) {
		$this->intTrCategoryId = $intTrCategoryId;
	}

	public function setName( $strName ) {
		$this->strName = $strName;
	}

	public function setDescription( $strDescription ) {
		$this->strDescription = $strDescription;
	}

	public function setIsPublished( $boolIsPublished ) {
		$this->boolIsPublished = $boolIsPublished;
	}

	public function setOrderNum( $intOrderNum ) {
		$this->intOrderNum = $intOrderNum;
	}

	public function setDeletedBy( $intDeletedBy ) {
		$this->intDeletedBy = $intDeletedBy;
	}

	public function setDeletedOn( $strDeletedOn ) {
		$this->strDeletedOn = $strDeletedOn;
	}

	public function setCreatedBy( $intCreatedBy ) {
		$this->intCreatedBy = $intCreatedBy;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getTrCategoryId() {
		return $this->intTrCategoryId;
	}

	public function getName() {
		return $this->strName;
	}

	public function getDescription() {
		return $this->strDescription;
	}

	public function getIsPublished() {
		return $this->boolIsPublished;
	}

	public function getDeletedBy() {
		return $this->intDeletedBy;
	}

	public function getDeletedOn() {
		return $this->strDeletedOn;
	}

	public function getCreatedBy() {
		return $this->intCreatedBy;
	}

	public function getCreatedOn() {
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
								'tr_category_id'	=> $this->intTrCategoryId,
								'name'			=> $this->strName,
								'description'	=> $this->strDescription,
								'is_published'	=> $this->boolIsPublished,
								'created_by'	=> $this->intCreatedBy,
								'created_on'	=> 'NOW()',
							);

		if( false == $this->db->insert( 'tr_subjects', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] = $this->strName;
		if( false == is_null( $this->strDescription ) ) $arrStrUpdateData['description'] = $this->strDescription;
		if( false == is_null( $this->intTrCategoryId ) ) $arrStrUpdateData['tr_category_id'] = $this->intTrCategoryId;
		if( false == is_null( $this->boolIsPublished ) ) $arrStrUpdateData['is_published'] = $this->boolIsPublished;
		if( false == is_null( $this->intOrderNum ) ) $arrStrUpdateData['order_num'] = $this->intOrderNum;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'tr_subjects', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrDeleteData = array(
								'deleted_by'	=> $this->intDeletedBy,
								'deleted_on' 	=> 'NOW()',
							);

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'tr_subjects', $arrStrDeleteData ) ) return false;

		return true;
	}
	
}

?>