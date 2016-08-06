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

	public static function fetchAllReviewRatings( $objDatabase ) {
		$strSQL = 'SELECT * FROM reviews_ratings';

		return self::fetchReviewRatings( $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedReviewRatings( $objDatabase ) {
		$strSQL = 'SELECT * FROM reviews_ratings';

		return self::fetchReviewRatings( $strSQL, $objDatabase );
	}

	public static function fetchReviewById( $intReviewId, $objDatabase ) {
		$strSQL = 'SELECT * FROM reviews_ratings WHERE id = ' . ( int ) $intReviewId;

		return self::fetchReviewRating( $strSQL, $objDatabase );
	}

	public static function fetchReviewRatingsByTrainerIdByLimit( $intTrainerId, $intLimit, $objDatabase ) {
		$strSQL = 'SELECT * FROM reviews_ratings WHERE reviewee_id = ' . ( int ) $intTrainerId .' limit ' . $intLimit;

		return self::fetchReviewRatings( $strSQL, $objDatabase );
	}
	
}

?>