<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminReviewsController extends CAdminSystemController {

	public $_arrstrReviewFields = array( 
		'id' => NULL,
		'review' => NULL,
		'ratings' => NULL
		);

	public function index() {

		$arrstrFilter 		= array( 'name' => '' );
		$arrstrPostFilter 	= ( array ) $this->input->post( 'filter' );
		$arrstrPostFilter 	= array_filter( $arrstrPostFilter );

		if( true == array_key_exists( 'reset', $arrstrPostFilter ) ) {
			$arrstrPostFilter = array();
		}
		$arrstrFilter = array_merge( $arrstrFilter, $arrstrPostFilter );

		$arrobjReviewRatings = ( array ) CReviewRatings::fetchAllReviewRatingsByFilter( $arrstrFilter, $this->db );

		foreach( $arrobjReviewRatings as $objReviewRating ) {
			$arrintUserIds[$objReviewRating->getReviewerId()] = $objReviewRating->getReviewerId();
			$arrintUserIds[$objReviewRating->getRevieweeId()] = $objReviewRating->getRevieweeId();
		}

		$arrobjLeads = ( array ) CLeads::fetchLeadNamesByUserIds( array_keys( $arrintUserIds ), $this->db );
		$arrobjLeads = ( array ) rekeyObjects( 'UserId', $arrobjLeads );

		$data['filter'] = $arrstrFilter;
		$data['reviews'] = $arrobjReviewRatings;
		$data['leads'] = $arrobjLeads;

		$this->load->view( 'admin/view_admin_reviews', $data );
	}

	public function editReview() {

		$intReviewId = $this->input->post( 'review_id' );

		$objReview = CReviewRatings::fetchReviewById( $intReviewId, $this->db );
		$arrobjLeads = ( array ) CLeads::fetchLeadNamesByUserIds( array( $objReview->getRevieweeId(), $objReview->getReviewerId() ), $this->db );
		$arrobjLeads = ( array ) rekeyObjects( 'UserId', $arrobjLeads );

		$data['review'] = $objReview;
		$data['leads'] = $arrobjLeads;

		$this->load->view( 'admin/edit_admin_review', $data );
	}

	public function updateReview() {

		$intReviewId = $this->input->post( 'review' )['id'];
		$objReview = CReviewRatings::fetchReviewById( $intReviewId, $this->db );

		$objReview->applyRequestForm( $this->input->post( 'review' ), $this->_arrstrReviewFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objReview->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Review updated.' ) );
		}
	}
}
