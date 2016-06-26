<?php
class CEosSingular extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function applyRequestForm( $arrstrRequestData, $arrstrFields ) {

		foreach( $arrstrRequestData as $key => $value) {
			if( false == array_key_exists( $key, $arrstrFields ) )
				unset( $arrstrRequestData[$key]);
		}

		$this->assignData( $arrstrRequestData );
	}
}
?>