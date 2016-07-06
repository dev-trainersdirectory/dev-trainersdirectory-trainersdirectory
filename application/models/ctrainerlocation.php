<?php

class CTrainerLocation extends CEosSingular {

	public $intId;
	public $intTrainerId;
	public $intLocationId;
	public $intCreatedBy;
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'trainer_id', $arrstrRequestData ) )
			$this->setTrainerId( $arrstrRequestData['trainer_id'] );
		
		if( true == array_key_exists( 'location_id', $arrstrRequestData ) )
			$this->setLocationId( $arrstrRequestData['location_id'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );

		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setTrainerId( $intTrainerId ) {
		$this->intTrainerId = $intTrainerId;
	}

	public function setLocationId( $intLocationId ) {
		$this->intLocationId = $intLocationId;
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

	public function getTrainerId() {
		return $this->intTrainerId;
	}

	public function getLocationId() {
		return $this->intLocationId;
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
								'trainer_id'	=> $this->intTrainerId,
								'location_id'  	=> $this->intLocationId,
								'created_by'	=> $this->intCreatedBy,
								'created_on'	=> 'NOW()';
							);

		if( false == $this->db->insert( 'trainer_locations', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intTrainerId ) ) $arrStrUpdateData['trainer_id'] = $this->intTrainerId;
		if( false == is_null( $this->intLocationId ) ) $arrStrUpdateData['location_id'] = $this->intLocationId;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'trainer_locations', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'trainer_locations' ) ) return false;

		return true;
	}
	
}

?>