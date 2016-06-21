<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/CSystemController.php' );

class CSearchTrainerController extends CSystemController {

	public function index() {
		$this->search();
	}

	public function search() {
		//$intSubjectId = $this->input->post( 'search_subject_id' );

		$arrObjTrainers = CTrainers::fetchAllActiveTrainersBySubjectIdByCityId( 1, 1, $this->db );

		print "<pre>";
print_r($arrObjTrainers);
print "</pre>";
die;
	}
}
