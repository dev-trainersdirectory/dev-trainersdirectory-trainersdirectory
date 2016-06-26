<?php

class CTrainer extends CBaseTrainer {

	public $strFirstName;
	public $strLastName;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		parent::assignData( $arrstrRequestData );

		if( true == array_key_exists( 'first_name', $arrstrRequestData ) )
			$this->setFirstName( $arrstrRequestData['first_name'] );

		if( true == array_key_exists( 'last_name', $arrstrRequestData ) )
			$this->setLastName( $arrstrRequestData['last_name'] );
	}

	public function setFirstName( $strFirstName ) {
		$this->strFirstName = $strFirstName;
	}

	public function setLastName( $strLastName ) {
		$this->strLastName = $strLastName;
	}

	public function getFirstName() {
		return $this->strFirstName;
	}

	public function getLastName() {
		return $this->strLastName;
	}
}

?>