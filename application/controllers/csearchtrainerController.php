<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/csystemcontroller.php' );

class CSearchTrainerController extends CSystemController {

	public function index() {
		$this->searchTrainer();
	}

	public function searchTrainer( $intSubjectId, $intCityId ) {

		$data = array();
		$data = $this->loadSearchFilter();

		$arrObjTrainers = CTrainers::fetchAllActiveTrainersBySubjectIdByCityId( $intSubjectId, $intCityId, $this->db );

		$data['baseUrl'] = base_url();
		$data['trainers'] = $arrObjTrainers;

		$this->load->view('search_trainer', $data);
	}
}
