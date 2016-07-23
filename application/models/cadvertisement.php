<?php

class CAdvertisement extends CEosSingular {

	public $intId;
	public $intAdvertiserId;
	public $strImagePath;
	public $strRedirectLink;
	public $strCategoryIds;
	public $strNotes;
	public $boolIsActive;
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

		if( true == array_key_exists( 'advertiser_id', $arrstrRequestData ) )
			$this->setAdevrtiserId( $arrstrRequestData['advertiser_id'] );

		if( true == array_key_exists( 'image_path', $arrstrRequestData ) )
			$this->setImagePath( $arrstrRequestData['image_path'] );
		
		if( true == array_key_exists( 'redirect_link', $arrstrRequestData ) )
			$this->setRedirectLink( $arrstrRequestData['redirect_link'] );

		if( true == array_key_exists( 'category_ids', $arrstrRequestData ) )
			$this->setCategoryIds( $arrstrRequestData['category_ids'] );

		if( true == array_key_exists( 'notes', $arrstrRequestData ) )
			$this->setIsActive( $arrstrRequestData['notes'] );

		if( true == array_key_exists( 'is_active', $arrstrRequestData ) )
			$this->setIsActive( $arrstrRequestData['is_active'] );

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

	public function setAdevrtiserId( $intAdvertiserId ) {
		$this->intAdvertiserId = $intAdvertiserId;
	}

	public function setImagePath( $strImagePath ) {
		$this->strImagePath = $strImagePath;
	}

	public function setRedirectLink( $strRedirectLink ) {
		$this->strRedirectLink = $strRedirectLink;
	}

	public function setCategoryIds( $strCategoryIds ) {
		$this->strCategoryIds = $strCategoryIds;
	}

	public function setNotes( $strNotes ) {
		$this->strNotes = $strNotes;
	}

	public function setIsActive( $boolIsActive ) {
		$this->boolIsActive = $boolIsActive;
	}

	public function setDeletedBy( $intDeletedBy ) {
		$this->intDeletedBy = $intDeletedBy;
	}

	public function setDeletedOn( $strDeletedOn ) {
		$this->strDeletedOn = $strDeletedOn;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function setCreatedBy( $intCreatedBy ) {
		$this->intCreatedBy = $intCreatedBy;
	}

	public function getId() {
		return $this->intId;;
	}

	public function getAdevrtiserId() {
		return $this->intAdvertiserId;
	}

	public function getImagePath() {
		return $this->strImagePath;
	}

	public function getRedirectLink() {
		return $this->strRedirectLink;
	}

	public function getCategoryIds() {
		return $this->strCategoryIds;
	}

	public function getNotes() {
		return $this->strNotes;
	}

	public function getIsActive() {
		return $this->boolIsActive;
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

	public function validate( $strAction, $objDatabase ) {

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
								'advertiser_id' => $this->intAdvertiserId,
								'image_path' 	=> $this->strImagePath,
								'redirect_link' => $this->strRedirectLink,
								'category_ids' 	=> $this->strCategoryIds,
								'notes'			=> $this->strNotes,
								'is_active' 	=> $this->boolIsActive,
								'created_by' 	=> $this->intCreatedBy,
								'created_on' 	=> $this->strCreatedOn
							);

		if( false == $this->db->insert( 'advertisements', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['advertiser_id'] 	= $this->intAdvertiserId;
		$arrStrUpdateData['image_path'] 	= $this->strImagePath;
		$arrStrUpdateData['redirect_link'] 	= $this->strRedirectLink;
		$arrStrUpdateData['category_ids'] 	= $this->strCategoryIds;
		$arrStrUpdateData['notes'] 			= $this->strNotes;
		$arrStrUpdateData['is_active'] 		= $this->boolIsActive;
		$arrStrUpdateData['created_by'] 	= $this->intCreatedBy;
		$arrStrUpdateData['created_on'] 	= $this->strCreatedOn;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'advertisements', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrUpdateData = array(
								'deleted_by'	=> $this->intDeletedBy,
								'deleted_on' 	=> 'NOW()',
							);

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'advertisements', $arrStrUpdateData ) ) return false;

		return true;
	}
	
}

?>