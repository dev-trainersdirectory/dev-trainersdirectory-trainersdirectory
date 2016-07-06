<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAdminSystemController extends CI_Controller {

	public function index() {
	
	}

	public function loadCommonData() {

		$data['statuses'] = ( array ) CStatuses::fetchAllStatuses( $this->db );
		$data['cities'] = ( array ) CCities::fetchAllPublishedCities( $this->db );
		$data['states'] = ( array ) CStates::fetchAllPublishedStates( $this->db );
		$data['days'] = ( array ) CDays::fetchAllPublishedDays( $this->db );
		$data['times'] = ( array ) CTimes::fetchAllPublishedTimes( $this->db );
		$data['locations'] = ( array ) CLocations::fetchAllPublishedLocations( $this->db );
		$data['preferences'] = ( array ) CPreferences::fetchAllPublishedPrefernces( $this->db );

		return $data;
	}

}
