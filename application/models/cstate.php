<?php

class CState extends CEosSingular {
	
	public $intId;
	public $intDeletedBy;
	public $intCreatedBy;

	public $strName;
	public $strMapLocation;
	public $strDeletedOn;
	public $strCreatedOn;

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

	public function setCreatedOn( $intCreatedOn ) {
		$this->intCreatedOn = $intCreatedOn;
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

	public function getCreatedOn( $intCreatedOn ) {
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
								'name'			=> $this->strName,
								'map_location'	=> $this->strMapLocation,
								'is_published'	=> $this->boolIsPublished,
								'created_by'	=> $this->intCreatedBy,
								'created_on'	=> NOW(),
							);

		if( false == $this->db->insert( 'states', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->strName ) ) $arrStrInsertData['name'] = $this->strName;
		if( false == is_null( $this->strMapLocation ) ) $arrStrInsertData['map_location'] = $this->strMapLocation;
		if( false == is_null( $this->boolIsPublished ) ) $arrStrInsertData['is_published'] = $this->boolIsPublished;
		
		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'states', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {
		
		$arrStrUpdateData = array(
								'deleted_by'	=> $this->intDeletedBy,
								'deleted_on' 	=> 'NOW()',
							);

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'states', $arrStrUpdateData ) ) return false;

		return true;
	}

}

?>