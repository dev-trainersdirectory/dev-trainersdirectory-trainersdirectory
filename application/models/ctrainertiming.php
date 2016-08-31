<?php

class CTrainerTiming extends CEosSingular {
	
	public $intId;
	public $intTrainerId;
	public $intTimeId;
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

		if( true == array_key_exists( 'time_id', $arrstrRequestData ) )
			$this->setTimeId( $arrstrRequestData['time_id'] );

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

	public function setTimeId( $intTimeId ) {
		$this->intTimeId = $intTimeId;
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

	public function getTimeId() {
		return $this->intTimeId;
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
								'trainer_id' => $this->intTrainerId,
								'time_id'	 => $this->intTimeId,
								'created_by' => 1,
								'created_on' => 'NOW()'
							);

		if( false == $this->db->insert( 'trainer_timings', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['trainer_id'] = $this->intTrainerId;
		$arrStrUpdateData['time_id'] = $this->time_id;
		
		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'trainer_timings', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'trainer_timings' ) ) return false;

		return true;
	}
	
}

?>