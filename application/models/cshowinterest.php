<?php

class CShowInterest extends CEosSingular {

	public $intId;
	public $intUserId;
	public $intTrainerUserId;
	
	public $strNotifiedOn;
	public $strClosedOn;
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'user_id', $arrstrRequestData ) )
			$this->setUserId( $arrstrRequestData['user_id'] );

		if( true == array_key_exists( 'trainer_user_id', $arrstrRequestData ) )
			$this->setTrainerUserId( $arrstrRequestData['trainer_user_id'] );

		if( true == array_key_exists( 'notified_on', $arrstrRequestData ) )
			$this->setNotifiedOn( $arrstrRequestData['notified_on'] );

		if( true == array_key_exists( 'deleted_by', $arrstrRequestData ) )
			$this->setDeletedBy( $arrstrRequestData['deleted_by'] );

		if( true == array_key_exists( 'closed_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['closed_on'] );

		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setUserId( $intUserId ) {
		$this->intUserId = $intUserId;
	}

	public function setTrainerUserId( $intTrainerUserId ) {
		$this->intTrainerUserId = $intTrainerUserId;
	}

	public function setNotifiedOn( $strNotifiedOn ) {
		$this->strNotifiedOn = $strNotifiedOn;
	}

	public function setClosedOn( $strClosedOn ) {
		$this->strClosedOn = $strClosedOn;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId( $intId ) {
		return $this->intId;
	}

	public function getUserId( $intUserId ) {
		return $this->intUserId;
	}

	public function getTrainerUserId( $intTrainerUserId ) {
		return $this->intTrainerUserId;
	}

	public function getNotifiedOn( $strNotifiedOn ) {
		return $this->strNotifiedOn;
	}

	public function getClosedOn( $strClosedOn ) {
		return $this->strClosedOn;
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
			$this->intId = $this->getNextId( 'sq_show_interests', $this->db );
		}
		$arrStrInsertData = array(
								'id'				=> $this->intId,
								'user_id'			=> $this->intUserId,
								'trainer_user_id'	=> $this->intTrainerUserId,
								'notified_on'		=> $this->strNotifiedOn,
								'closed_on'			=> $this->strClosedOn,
								'created_on'		=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'show_interests', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intUserId ) ) $arrStrUpdateData['user_id'] = $this->intUserId;
		if( false == is_null( $this->intTrainerUserId ) ) $arrStrUpdateData['trainer_user_id'] = $this->intTrainerUserId;
		if( false == is_null( $this->strNotifiedOn ) ) $arrStrUpdateData['notified_on'] = $this->strNotifiedOn;
		if( false == is_null( $this->strClosedOn ) ) $arrStrUpdateData['closed_on'] = $this->strClosedOn;
								

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'show_interests', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'show_interests' ) ) return false;

		return true;
	}
}

?>