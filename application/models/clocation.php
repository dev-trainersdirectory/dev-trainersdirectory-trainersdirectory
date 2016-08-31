<?php

class CLocation extends CEosSingular {
	
	public $intId;
	public $intStateId;
	public $intCityId;
	public $intCreatedBy;

	public $strName;
	public $strMapLocation;
	public $strCreatedOn;

	public $boolIsPublished;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'state_id', $arrstrRequestData ) )
			$this->setStateId( $arrstrRequestData['state_id'] );

		if( true == array_key_exists( 'city_id', $arrstrRequestData ) )
			$this->setCityId( $arrstrRequestData['city_id'] );

		if( true == array_key_exists( 'name', $arrstrRequestData ) )
			$this->setName( $arrstrRequestData['name'] );

		if( true == array_key_exists( 'map_location', $arrstrRequestData ) )
			$this->setMapLocation( $arrstrRequestData['map_location'] );

		if( true == array_key_exists( 'is_published', $arrstrRequestData ) )
			$this->setIsPublished( $arrstrRequestData['is_published'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );
		
		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setStateId( $intStateId ) {
		$this->intStateId = $intStateId;
	}

	public function setCityId( $intCityId ) {
		$this->intCityId = $intCityId;
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

	public function setCreatedBy( $intCreatedBy ) {
		$this->intCreatedBy = $intCreatedBy;
	}

	public function setCreatedOn( $intCreatedOn ) {
		$this->intCreatedOn = $intCreatedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getStateId() {
		return $this->intStateId;
	}

	public function getCityId() {
		return $this->intCityId;
	}

	public function getName() {
		return $this->strName;
	}

	public function getMapLocation() {
		return $this->strMapLocation;
	}

	public function getIsPublished() {
		return $this->boolIsPublished;
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_locations', $this->db );
		}
		$arrStrInsertData = array(
								'id'			=> $this->intId,
								'state_id'		=> $this->intStateId,
								'city_id'		=> $this->intCityId,
								'name'			=> $this->strName,
								'map_location'	=> $this->strMapLocation,
								'is_published'	=> $this->boolIsPublished,
								'created_by'	=> $this->intCreatedBy,
								'created_on'	=> getCurrentDateTime( $this->db ),
							);

		if( false == $this->db->insert( 'locations', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intStateId ) ) $arrStrUpdateData['state_id'] = $this->intStateId;
		if( false == is_null( $this->intCityId ) ) $arrStrUpdateData['city_id'] = $this->intCityId;
		if( false == is_null( $this->strName ) ) $arrStrUpdateData['name'] = $this->strName;
		if( false == is_null( $this->strMapLocation ) ) $arrStrUpdateData['map_location'] = $this->strMapLocation;
		if( false == is_null( $this->boolIsPublished ) ) $arrStrUpdateData['is_published'] = $this->boolIsPublished;
		
		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'locations', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'locations' ) ) return false;

		return true;
	}

}

?>