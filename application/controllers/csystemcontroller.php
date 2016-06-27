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

		return $data;
	}
}
