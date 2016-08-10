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

	public static function fetchAllReviewRatingsByFilter( $arrstrFilter, $objDatabase ) {
		$strWhere = ' WHERE true ';
		$arrstrFilter = array_filter( $arrstrFilter );
		if( true == valArr( $arrstrFilter ) ) {
			if( true == array_key_exists( 'name', $arrstrFilter ) )
				$strWhere .= 'AND  (lower( l.first_name ) like \'%'. trim( strtolower ($arrstrFilter['name'] ) ) . '%\' OR lower( l.last_name ) like \'%'. trim( strtolower ($arrstrFilter['name'] ) ) . '%\' )'; 
		}

		$strSQL = 'SELECT 
						rr.* 
					FROM 
						reviews_ratings rr 
						JOIN users u ON ( rr.reviewee_id = u.id )
						JOIN leads l ON ( l.user_id = u.id ) ' . $strWhere;

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