<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminCitiesController extends CAdminSystemController {

	public $_arrstrCityFields = array( 
		'id' => NULL,
		'name' => NULL,
		'state_id' => NULL,
		'is_published' => NULL
		);

	public function index() {

		$arrobjCities = ( array ) CCities::fetchAllCities( $this->db );
		foreach( $arrobjCities as $objCity ) {
			$arrintStateIds[$objCity->getStateId()] = $objCity->getStateId();
		}

		$arrobjStates = ( array ) CStates::fetchStatesByIds( array_keys( $arrintStateIds ), $this->db );

		$data['cities'] = $arrobjCities;
		$data['states'] = $arrobjStates;
		$this->load->view( 'admin/view_admin_cities', $data );
	}

	public function addCity() {

		$objCity = new CCity();
		$arrobjStates = CStates::fetchAllPublishedStates( $this->db );
		
		$data['states'] = $arrobjStates;
		$data['city'] = $objCity;

		$this->load->view( 'admin/edit_admin_city', $data );
	}

	public function insertCity() {

		$objCity = new CCity();

		$objCity->applyRequestForm( $this->input->post( 'city' ), $this->_arrstrCityFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objCity->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'City added.' ) );
		}
	}

	public function editCity() {

		$intCityId = $this->input->post( 'id' );

		$objCity = CCities::fetchCityById( $intCityId, $this->db );
		$arrobjStates = CStates::fetchAllPublishedStates( $this->db );

		$data['city'] = $objCity;
		$data['states'] = $arrobjStates;

		$this->load->view( 'admin/edit_admin_city', $data );
	}

	public function updateCity() {

		$intCityId = $this->input->post( 'city' )['id'];
		$objCity = CCities::fetchCityById( $intCityId, $this->db );

		$objCity->applyRequestForm( $this->input->post( 'city' ), $this->_arrstrCityFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objCity->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'City updated.' ) );
		}
	}
}
