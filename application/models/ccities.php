<?php

class CCities extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchCities( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CCity', $strSQL, $objDatabase );
	}

	public function fetchCity( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CCity', $strSQL, $objDatabase );
	}

	public static function fetchAllCities( $objDatabase ) {
		$strSQL = 'SELECT * FROM cities';

		return self::fetchCities( $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedCities( $objDatabase ) {
		$strSQL = 'SELECT * FROM cities WHERE is_published = true';

		return self::fetchCities( $strSQL, $objDatabase );
	}

	public static function fetchCityById( $intCityId, $objDatabase ) {
		$strSQL = 'SELECT * FROM cities WHERE id = ' . ( int ) $intCityId;

		return self::fetchCity( $strSQL, $objDatabase );
	}

	public static function fetchCitiesByStateIds( $arrstrStateIds, $objDatabase ) {

		$strSQL = ' SELECT
						*
					FROM 
						cities
					WHERE
						state_id IN ( ' . implode( ',', $arrstrStateIds ) . ' )';

		return self::fetchCities( $strSQL, $objDatabase );
	}
}

?>