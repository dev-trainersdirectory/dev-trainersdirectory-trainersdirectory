<?php

class CTrainerPreference extends CEosSingular {
	
	public $intId;
	public $intTrainerId;
	public $intPreferenceId;
	public $strCreatedBy;
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

		if( true == array_key_exists( 'preference_id', $arrstrRequestData ) )
			$this->setPreferenceId( $arrstrRequestData['preference_id'] );

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

	public function setPreferenceId( $intPreferenceId ) {
		$this->intPreferenceId = $intPreferenceId;
	}

	public function setCreatedBy( $strCreatedBy ) {
		$this->strCreatedBy = $strCreatedBy;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getTrainerId() {
		return $this->intTrainerId;
	}

	public function getPreferenceId() {
		return $this->intPreferenceId;
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_trainer_preferences', $this->db );
		}
		$arrStrInsertData = array(
								'id'			=> $this->intId,
								'trainer_id' 	=> $this->intTrainerId,
								'preference_id' => $this->intPreferenceId,
								'created_by' => $this->strCreatedBy,
								'created_on' => getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'trainer_prefereces', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intTrainerId ) ) $arrStrUpdateData['trainer_id'] = $this->intTrainerId;
		if( false == is_null( $this->intPreferenceId ) ) $arrStrUpdateData['preference_id'] = $this->intPreferenceId;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'trainer_prefereces', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'trainer_prefereces' ) ) return false;

		return true;
	}
	
}

?>