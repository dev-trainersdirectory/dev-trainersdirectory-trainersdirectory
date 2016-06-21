<?php

class CTrCategories extends CEosPlural {
	
	function __construct()
	{
		parent::__construct();
	}

	public function fetchTrCategories( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrCategory', $strSQL, $objDatabase );
	}

	public function fetchTrCategorie( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrCategory', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrCategories( $objDatabase ) {
		$strSQL = 'SELECT * FROM tr_categories';

		return self::fetchTrCategories( $strSQL, $objDatabase );
	}

}

?>