<?php
require_once( getcwd(). '\application\libraries\commonfunctions.php' );

class CEosSingular extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function applyRequestForm( $arrstrRequestData, $arrstrFields ) {

		foreach( $arrstrRequestData as $key => $value) {
			if( false == array_key_exists( $key, $arrstrFields ) )
				unset( $arrstrRequestData[$key]);
		}
		$arrstrRequestData = array_merge( $arrstrFields, $arrstrRequestData );
		$this->assignData( $arrstrRequestData );
	}

	function getnextId( $strSequence, $objDatabase ) {
		$arrResult = fetchData( 'SELECT nextval( "' . $strSequence . '") as id ', $objDatabase );
		if( false == valArr( $arrResult ) ) return 0;
		return (int) reset( $arrResult )['id'];
	}

}
?>