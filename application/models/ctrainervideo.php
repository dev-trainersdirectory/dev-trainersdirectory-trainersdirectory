<?php

class CTrainerVideo extends CEosSingular
{
	public $intId;
	public $intTrainerId;
	public $intTrainerSkillId;
	public $strVideoLink;
	public $boolIsPublished;
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

		if( true == array_key_exists( 'trainer_skill_id', $arrstrRequestData ) )
			$this->setTrainerSkillId( $arrstrRequestData['trainer_skill_id'] );

		if( true == array_key_exists( 'video_link', $arrstrRequestData ) )
			$this->setVideoLink( $arrstrRequestData['video_link'] );

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

	public function setTrainerId( $intTrainerId ) {
		$this->intTrainerId = $intTrainerId;
	}

	public function setTrainerSkillId( $intTrainerSkillId ) {
		$this->intTrainerSkillId = $intTrainerSkillId;
	}

	public function setVideoLink( $strVideoLink ) {
		$this->strVideoLink = $strVideoLink;
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

	public function getId() {
		return $this->intId;
	}

	public function getTrainerId() {
		return $this->intTrainerId;
	}

	public function getTrainerSkillId() {
		return $this->intTrainerSkillId;
	}

	public function getVideoLink() {
		return $this->strVideoLink;
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
								'trainer_id' 		=> $this->intTrainerId,
								'trainer_skill_id' 	=> $this->intTrainerSkillId,
								'video_link' 		=> $this->strVideoLink,
								'is_published' 		=> $this->boolIsPublished,
								'created_by'		=> 1,
								'created_on'		=> 'NOW()'
							);

		if( false == $this->db->insert( 'trainer_videos', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['trainer_id'] = $this->intTrainerId;
		$arrStrUpdateData['trainer_skill_id'] = $this->intTrainerSkillId;
		$arrStrUpdateData['video_link'] = $this->strVideoLink;
		$arrStrUpdateData['is_published'] = $this->boolIsPublished;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'trainer_videos', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrDeleteData = array(	
								'deleted_by' => 1,
								'deleted_on' => 'NOW()'
							);

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->update( 'trainer_videos', $arrStrDeleteData ) ) return false;

		return true;
	}
	
}

?>