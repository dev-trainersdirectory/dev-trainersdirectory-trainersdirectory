<?php

class CTrCategory extends CEosSingular {
	
	public $intId;
	public $intParentTrCategoryId;
	public $strName;
	public $strDescription;
	public $strIcon;
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

		if( true == array_key_exists( 'parent_tr_category_id', $arrstrRequestData ) )
			$this->setParentTrCategoryId( $arrstrRequestData['parent_tr_category_id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );

		if( true == array_key_exists( 'description', $arrstrRequestData ) )
			$this->setDescription( $arrstrRequestData['description'] );

		if( true == array_key_exists( 'icon', $arrstrRequestData ) )
			$this->setIcon( $arrstrRequestData['icon'] );

		if( true == array_key_exists( 'is_published', $arrstrRequestData ) )
			$this->setIsPublished( $arrstrRequestData['is_published'] );

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

	public function setParentTrCategoryId( $intParentTrCategoryId ) {
		$this->intParentTrCategoryId = $intParentTrCategoryId;
	}

	public function setName( $strName ) {
		$this->strName = $strName;
	}

	public function setDescription( $strDescription ) {
		$this->strDescription = $strDescription;
	}

	public function setIcon( $strIcon ) {
		$this->strIcon = $strIcon;
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

	public function setDeletedOn( $intDeletedOn ) {
		$this->intDeletedOn = $intDeletedOn;
	}

	public function setCreatedBy( $intCreatedBy ) {
		$this->intCreatedBy = $intCreatedBy;
	}

	public function setCreatedOn( $intCreatedOn ) {
		$this->intCreatedOn = $intCreatedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getParentTrCategoryId() {
		return $this->intParentTrCategoryId;
	}

	public function getName() {
		return $this->strName;
	}

	public function getDescription() {
		return $this->strDescription;
	}

	public function getIcon() {
		return $this->strIcon;
	}

	public function getIsPublished() {
		return $this->boolIsPublished;
	}

	public function getOrderNum() {
		return $this->intOrderNum;
	}

	public function getDeletedBy() {
		return $this->intDeletedBy;
	}

	public function getDeletedOn() {
		return $this->intDeletedOnn;
	}

	public function getCreatedBy() {
		return $this->intCreatedBy;
	}

	public function getCreatedOn() {
		return $this->intCreatedOn;
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
								'parent_tr_category_id'	=> $this->intParentTrCategoryId,
								'name'					=> $this->strName,
								'description'			=> $this->strDescription,
								'icon'					=> $this->strIcon,
								'is_published'			=> $this->boolIsPublished,
								'order_num'				=> $this->intOrderNum,
								'created_by'			=> $this->intCreatedBy,
								'created_on'			=> 'NOW()',
							);

		if( false == $this->db->insert( 'tr_categories', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intParentTrCategoryId ) ) $arrStrUpdateData['parent_tr_category_id'] = $this->intParentTrCategoryId;
		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] = $this->strName;
		if( false == is_null( $this->strDescription ) ) $arrStrUpdateData['description'] = $this->strDescription;
		if( false == is_null( $this->strIcon ) ) $arrStrUpdateData['icon'] = $this->strIcon;
		if( false == is_null( $this->intOrderNum ) ) $arrStrUpdateData['order_num'] = $this->intOrderNum;
		if( false == is_null( $this->boolIsPublished ) ) $arrStrUpdateData['is_published'] = $this->boolIsPublished;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'tr_categories', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrDeleteData = array(
								'delete_by'	=> $this->intDeletedBy,
								'delete_by'	=> 'NOW()',
							);

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'tr_categories', $arrStrDeleteData ) ) return false;

		return true;
	}

}

?>