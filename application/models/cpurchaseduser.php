<?php

class CPurchasedUser extends CEosSingular {

	public $intId;
	public $intUserId;
	public $intBoughtUserId;
	
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

		if( true == array_key_exists( 'bought_user_id', $arrstrRequestData ) )
			$this->setBoughtUserId( $arrstrRequestData['bought_user_id'] );

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

	public function setBoughtUserId( $intBoughtUserId ) {
		$this->intBoughtUserId = $intBoughtUserId;
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

	public function getBoughtUserId( $intBoughtUserId ) {
		return $this->intBoughtUserId;
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
			$this->intId = $this->getNextId( 'sq_purchased_users', $this->db );
		}
		$arrStrInsertData = array(
								'id'				=> $this->intId,
								'user_id'			=> $this->intUserId,
								'bought_user_id'	=> $this->intBoughtUserId,
								'notified_on'		=> $this->strNotifiedOn,
								'closed_on'			=> $this->strClosedOn,
								'created_on'		=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'purchased_users', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intUserId ) ) $arrStrUpdateData['user_id'] = $this->intUserId;
		if( false == is_null( $this->intBoughtUserId ) ) $arrStrUpdateData['bought_user_id'] = $this->intBoughtUserId;
		if( false == is_null( $this->strNotifiedOn ) ) $arrStrUpdateData['notified_on'] = $this->strNotifiedOn;
		if( false == is_null( $this->strClosedOn ) ) $arrStrUpdateData['closed_on'] = $this->strClosedOn;
								

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'purchased_users', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'purchased_users' ) ) return false;

		return true;
	}
}

?>