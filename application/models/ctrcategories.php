<?php

class CTrCategories extends CEosPlural {
	
	function __construct()
	{
		parent::__construct();
	}

	public function fetchTrCategories( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrCategory', $strSQL, $objDatabase );
	}

	public function fetchTrCategory( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrCategory', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrCategories( $objDatabase ) {
		$strSQL = 'SELECT * FROM tr_categories';

		return self::fetchTrCategories( $strSQL, $objDatabase );
	}

	public static function fetchTrCategoryById( $intId, $objDatabase ) {
		$strSQL = 'SELECT * FROM tr_categories WHERE id = ' . ( int ) $intId;

		return self::fetchTrCategory( $strSQL, $objDatabase );
	}
	public static function fetchTrCategoriesCountByName( $objDatabase ) {
		return 0;
	}

	public static function fetchParentCategories( $objDatabase ) {
		$strSQL = 'SELECT * FROM tr_categories WHERE parent_tr_category_id IS NULL AND is_published = 1';
		return self::fetchTrCategories( $strSQL, $objDatabase );
	}
}

?>