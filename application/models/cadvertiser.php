<?php

class CAdvertiser extends CEosSingular {

	public $intId;
	public $strName;
	public $intContactNumber;
	public $strAddress;
	public $intCoins;
	public $intCreatedBy;
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

		if( true == array_key_exists( 'contact_number', $arrstrRequestData ) )
			$this->setContactNumber( $arrstrRequestData['contact_number'] );
		
		if( true == array_key_exists( 'address', $arrstrRequestData ) )
			$this->setAddress( $arrstrRequestData['address'] );

		if( true == array_key_exists( 'coins', $arrstrRequestData ) )
			$this->setCoins( $arrstrRequestData['coins'] );

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

	public function setContactNumber( $intContactNumber ) {
		$this->intContactNumber = $intContactNumber;
	}

	public function setAddress( $strAddress ) {
		$this->strAddress = $strAddress;
	}

	public function setCoins( $intCoins ) {
		$this->intCoins = $intCoins;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function setCreatedBy( $intCreatedBy ) {
		$this->intCreatedBy = $intCreatedBy;
	}

	public function getId() {
		return $this->intId;;
	}

	public function getName() {
		return $this->strName;
	}

	public function getContactNumber() {
		return $this->intContactNumber;
	}

	public function getAddress() {
		return $this->strAddress;
	}

	public function getCoins() {
		return $this->intCoins;
	}

	public function getCreatedBy() {
		return $this->intCreatedBy;
	}

	public function getCreatedOn() {
		return $this->strCreatedOn;
	}

	public function validate( $strAction, $objDatabase ) {

		$boolResult = true;

		switch ( $strAction ) {
			case 'insert':
			case 'update':
			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function insert() {

		$arrStrInsertData = array(
								'id'			=> $this->getNextId( 'sq_advertisers', $this->db ),
								'name' 			=> $this->strName,
								'contact_number' => $this->intContactNumber,
								'address' 		=> $this->strAddress,
								'coins' 		=> $this->intCoins,
								'created_by' 	=> $this->intCreatedBy,
								'created_on'	=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'advertisers', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['name'] 		= $this->strName;
		$arrStrUpdateData['contact_number'] 	= $this->intContactNumber;
		$arrStrUpdateData['address'] = $this->strAddress;
		$arrStrUpdateData['coins'] = $this->intCoins;
		$arrStrUpdateData['created_by'] = $this->intCreatedBy;
		$arrStrUpdateData['created_on'] = $this->strCreatedOn;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'advertisers', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'advertisers' ) ) return false;

		return true;
	}
	
}

?>