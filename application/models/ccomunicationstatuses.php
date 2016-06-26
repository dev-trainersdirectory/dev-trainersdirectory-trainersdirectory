<?php

class CComunicationStatuses extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchComunicationStatuses( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CComunicationStatus', $strSQL, $objDatabase );
	}

	public function fetchComunicationStatus( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CComunicationStatus', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedComunicationStatus( $objDatabase ) {
		$strSQL = 'SELECT * FROM comunication_statuses';

		return self::fetchComunicationStatuses( $strSQL, $objDatabase );
	}

}

?>