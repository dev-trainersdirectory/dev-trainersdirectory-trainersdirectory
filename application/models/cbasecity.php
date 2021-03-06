<?php

class CCity extends CEosSingular {

	public $intId;
	public $intCreatedBy;
	public $intDeletedBy;
	
	public $boolIsPublished;
	
	public $strDeletedOn;
	public $strName;
	public $strMapLocation;

	
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );

		if( true == array_key_exists( 'map_location', $arrstrRequestData ) )
			$this->setMapLocation( $arrstrRequestData['map_location'] );

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

	public function setName( $strName ) {
		$this->strName = $strName;	
	}

	public function setMapLocation( $strMapLocation ) {
		$this->strMapLocation = $strMapLocation;
	}

	public function setIsPublished( $boolIsPublished ) {
		$this->boolIsPublished = $boolIsPublished;
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

	public function getId( $intId ) {
		return $this->intId;
	}

	public function getName( $strName ) {
		return $this->strName;
	}

	public function getMapLocation( $strMapLocation ) {
		return $this->strMapLocation;
	}

	public function getIsPublished( $boolIsPublished ) {
		return $this->boolIsPublished;
	}

	public function getDeletedBy( $intDeletedBy ) {
		return $this->intDeletedBy;
	}

	public function getDeletedOn( $strDeletedOn ) {
		return $this->strDeletedOn;
	}

	public function getCreatedBy( $intCreatedBy ) {
		return $this->intCreatedBy;
	}

	public function getCreatedOn( $strCreatedOn ) {
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_cities', $this->db );
		}

		$arrStrInsertData = array(
								'id'			=> $this->intId,
								'name'			=> $this->strName,
								'map_location'	=> $this->strMapLocation,
								'is_published'	=> $this->boolIsPublished,
								'deleted_by'	=> $this->intDeletedBy,
								'deleted_on' 	=> $this->intDeletedOn,
								'created_by'	=> $this->intCreatedBy,
								'created_on'	=> $this->strCreatedOn,
							);

		if( false == $this->db->insert( 'cities', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] = $this->strName;
		if( false == is_null( $this->strMapLocation ) ) $arrStrUpdateData['map_location'] = $this->strMapLocation;
		if( false == is_null( $this->boolIsPublished ) ) $arrStrUpdateData['is_published'] = $this->boolIsPublished;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'cities', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrDeleteData = array(
								'deleted_by'	=> $this->intDeletedBy,
								'deleted_on' 	=> NOW(),
							);

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'cities', $arrStrDeleteData ) ) return false;

		return true;
	}

}

?>