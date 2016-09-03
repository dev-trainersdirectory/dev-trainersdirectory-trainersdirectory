<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CSystemController extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function loadSearchFilter() {

		$arrstrTrCategories = CTrCategories::fetchAllPublishedTrCategories( $this->db );

		foreach( $arrstrTrCategories as $strTrCategory ) {
			if( NULL == $strTrCategory->getParentTrCategoryId() ) {
				$arrstrParentTrCategories[$strTrCategory->getId()] = $strTrCategory;
			} else {
				$arrstrSubTrCategories[$strTrCategory->getId()] = $strTrCategory;
			}
		}

		$arrstrTrSubjects = CTrSubjects::fetchAllPublishedSubjects( $this->db );

		$data['arrstrParentTrCategories'] = $arrstrParentTrCategories;
		$data['arrstrSubTrCategories'] = $arrstrSubTrCategories;
		$data['arrstrTrSubjects'] = $arrstrTrSubjects;
		$data['search_filter'] = $this->load->view( 'search_filter', NULL, TRUE );

		$data['preferences'] = CPreferences::fetchAllPublishedPrefernces( $this->db );
		$data['times'] = CTimes::fetchAllPublishedTimes( $this->db );
		$data['locations'] = CLocations::fetchAllPublishedLocations( $this->db );

		return $data;
	}

	public function validateUser( $intUserId ) {
		$arrUserTypeAssociations = ( array ) CUserTypeAssociations::fetchUserTypeAssociationsByUserId( $intUserId, $this->db );
		if( false == valArr( $arrUserTypeAssociations ) ) {
			return false;
		}

		foreach( $arrUserTypeAssociations as $objUserTypeAssociation ) {
			if( true == in_array( $objUserTypeAssociation->getUserTypeId(), array( CUserType::STUDENT, CUserType::TRAINER, CUserType::INSTITUTE ) ) ) return true;
		}

		return false;
	}
}
