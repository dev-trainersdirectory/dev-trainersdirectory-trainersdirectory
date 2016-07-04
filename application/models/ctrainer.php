<?php

class CTrainer extends CBaseTrainer {

	public $strFirstName;
	public $strLastName;
	public $strSkills;
	public $strProfilePic;
	public $intRating;
	
	function __construct() {
		parent::__construct();
		$this->intRating = 4;
		$this->strProfilePic = 'public/images/trainer.jpg';
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		parent::assignData( $arrstrRequestData );

		if( true == array_key_exists( 'first_name', $arrstrRequestData ) )
			$this->setFirstName( $arrstrRequestData['first_name'] );

		if( true == array_key_exists( 'last_name', $arrstrRequestData ) )
			$this->setLastName( $arrstrRequestData['last_name'] );

		if( true == array_key_exists( 'skills', $arrstrRequestData ) )
			$this->setSkills( $arrstrRequestData['skills'] );

		if( true == array_key_exists( 'profile_pic', $arrstrRequestData ) )
			$this->setProfilePic( $arrstrRequestData['profile_pic'] );
	}

	public function setFirstName( $strFirstName ) {
		$this->strFirstName = $strFirstName;
	}

	public function setLastName( $strLastName ) {
		$this->strLastName = $strLastName;
	}

	public function setRating( $intRating ) {
		$this->intRating = $intRating;
	}

	public function setSkills( $strSkills ) {
		$this->strSkills = $strSkills;
	}

	public function setProfilePic( $strProfilePic ) {
		$this->strProfilePic = $strProfilePic;
	}

	public function getFirstName() {
		return $this->strFirstName;
	}

	public function getLastName() {
		return $this->strLastName;
	}

	public function getName() {
		return $this->strFirstName . ' ' . $this->strLastName;
	}

	public function getSkills() {
		return $this->strSkills;
	}

	public function getRating() {
		return $this->intRating;
	}

	public function getProfilePic() {
		return $this->strProfilePic;
	}
}

?>