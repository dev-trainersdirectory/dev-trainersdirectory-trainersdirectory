<?php

class CReviewRating extends CEosSingular {

	public $intId;
	public $intReviewerid;
	public $intRevieweeid;
	public $strReview;
	public $intRatings;
	public $intDeletedBy;
	public $strDeletedOn;
	public $intCreatedBy;
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'reviewer_id', $arrstrRequestData ) )
			$this->setReviewerId( $arrstrRequestData['reviewer_id'] );

		if( true == array_key_exists( 'reviewee_id', $arrstrRequestData ) )
			$this->setRevieweeId( $arrstrRequestData['reviewee_id'] );

		if( true == array_key_exists( 'review', $arrstrRequestData ) )
			$this->setReview( $arrstrRequestData['review'] );

		if( true == array_key_exists( 'ratings', $arrstrRequestData ) )
			$this->setRatings( $arrstrRequestData['ratings'] );
		
		if( true == array_key_exists( 'deleted_by', $arrstrRequestData ) )
			$this->setDeletedBy( $arrstrRequestData['deleted_by'] );

		if( true == array_key_exists( 'deleted_on', $arrstrRequestData ) )
			$this->setDeletedOn( $arrstrRequestData['deleted_on'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );

		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setReviewerId( $intReviewerid ) {
		$this->intReviewerid = $intReviewerid;
	}

	public function setRevieweeId( $intRevieweeid ) {
		$this->intRevieweeid = $intRevieweeid;
	}

	public function setReview( $strReview ) {
		$this->strReview = $strReview;
	}

	public function setRatings( $intRatings ) {
		$this->intRatings = $intRatings;
	}

	public function setDeletedBy( $intDeletedBy ) {
		$this->intDeletedBy = $intDeletedBy;
	}

	public function setDeletedOn( $strDeletedOn ) {
		$this->strDeletedOn = $strDeletedOn;
	}

	public function setCreatedBy( $intCreatedBy ) {
		$this->intCreatedBy = $intCreatedBy;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getReviewerId() {
		return $this->intReviewerid;
	}

	public function getRevieweeId() {
		return $this->intRevieweeid;
	}

	public function getReview() {
		return $this->strReview;
	}

	public function getRatings() {
		return $this->intRatings;
	}

	public function getDeletedBy() {
		return $this->intDeletedBy;
	}

	public function getDeletedOn() {
		return $this->strDeletedOn;
	}

	public function getCreatedBy() {
		return $this->intCreatedBy;
	}

	public function getCreatedOn() {
		return $this->strCreatedOn;
	}

	public function validate( $strAction ) {

		$boolResult = true;

		switch ( $strAction ) {
			
			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function insert() {

		$arrStrInsertData = array(
								'reviewer_id' 	=> $this->intReviewerid,
								'reviewee_id' 	=> $this->intRevieweeid,
								'review' 		=> $this->strReview,
								'ratings' 		=> $this->intRatings,
								'deleted_by' 	=> $this->intDeletedBy,
								'deleted_on' 	=> $this->strDeletedOn,
								'created_by' 	=> 1,
								'created_on' 	=> 'NOW()',
							);

		if( false == $this->db->insert( 'reviews_ratings', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['reviewer_id'] = $this->intReviewerid;
		$arrStrUpdateData['reviewee_id'] = $this->intRevieweeid;
		$arrStrUpdateData['review'] = $this->strReview;
		$arrStrUpdateData['ratings'] = $this->intRatings;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'reviews_ratings', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrUpdateData = array(
									'deleted_by' => 1,
									'deleted_on' => 'NOW()'
								);

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'reviews_ratings', $arrStrUpdateData ) ) return false;

		return true;
	}
	
}

?>