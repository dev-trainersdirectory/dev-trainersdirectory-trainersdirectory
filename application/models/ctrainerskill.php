<?php

class CTrainerSkill extends CEosSingular
{
	public $intId;
	public $intTrainerId;
	public $intTrSubjectId;
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

		if( true == array_key_exists( 'trainer_id', $arrstrRequestData ) )
			$this->setTrainerId( $arrstrRequestData['trainer_id'] );

		if( true == array_key_exists( 'tr_subject_id', $arrstrRequestData ) )
			$this->setTrSubjectId( $arrstrRequestData['tr_subject_id'] );

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

	public function setTrainerId( $intTrainerId ) {
		$this->intTrainerId = $intTrainerId;
	}

	public function setTrSubjectId( $intTrSubjectId ) {
		$this->intTrSubjectId = $intTrSubjectId;
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

	public function getTrainerId() {
		return $this->intTrainerId;
	}

	public function getTrSubjectId() {
		return $this->intTrSubjectId;
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_trainer_skills', $this->db );
		}
		$arrStrInsertData = array(
								'id'			=> $this->intId,
								'trainer_id' 	=> $this->intTrainerId,
								'tr_subject_id' => $this->intTrSubjectId,
								'created_by'	=> $this->intCreatedBy,
								'created_on'	=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'trainer_skills', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intTrainerId ) ) $arrStrUpdateData['trainer_id'] = $this->intTrainerId;
		if( false == is_null( $this->intTrSubjectId ) ) $arrStrUpdateData['tr_subject_id'] = $this->intTrSubjectId;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'trainer_skills', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrDeleteData = array(
								'deleted_by' => $this->intDeletedBy,
								'deleted_on' => getCurrentDateTime( $this->db )
							);

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->update( 'trainer_skills', $arrStrDeleteData ) ) return false;

		return true;
	}
	
}

?>