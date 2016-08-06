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

	public function viewTrainer(){

		$strSubjects = '';
		$intTrainerId = $this->input->post('id');

		$objTrainer = CTrainers::fetchTrainerDetailById( $intTrainerId, $this->db );

		$arrObjTraineReviews = CReviewRatings::fetchReviewRatingsByTrainerIdByLimit( $intTrainerId, 5, $this->db );

		$objTrainerSkills = (array) CTrainerSkills::fetchTrainerSkillsByTrainerId( $intTrainerId, $this->db );
		$objTrainerSkills = (array) rekeyObjects( 'TrSubjectId', $objTrainerSkills );

		$arrobjSubjectNames = (array) CTrSubjects::fetchSubjectNamesByIds( array_keys( $objTrainerSkills ), $this->db );

		foreach ( $arrobjSubjectNames as $objSubjectName ) {
			$strSubjects .= $objSubjectName->getName().',';
		}

		$data['trainer'] = $objTrainer;
		$data['tr_subject_names'] = rtrim( $strSubjects, ',' );
		$data['trainer_reviews'] = $arrObjTraineReviews;

		$this->load->view('view_trainer_details_popup', $data);
	}
}
