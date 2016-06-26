<?php

class CReviewRatings extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchReviewRatings( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CReviewRating', $strSQL, $objDatabase );
	}

	public function fetchReviewRating( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CReviewRating', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedReviewRatings( $objDatabase ) {
		$strSQL = 'SELECT * FROM review_ratings';

		return self::fetchDays( $strSQL, $objDatabase );
	}
}

?>