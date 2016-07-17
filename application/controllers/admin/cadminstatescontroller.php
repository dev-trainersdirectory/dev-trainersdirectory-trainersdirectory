<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminStatesController extends CAdminSystemController {

	public $_arrstrStateFields = array( 
		'id' => NULL,
		'name' => NULL,
		'is_published' => NULL
		);

	public function index() {

		$arrstrStates = ( array ) CStates::fetchAllStates( $this->db );
		$arrstrCities = ( array ) CCities::fetchCitiesByStateIds( array_keys( $arrstrStates ), $this->db );

		$data['states'] = $arrstrStates;
		$data['cities'] = $arrstrCities;

		$this->load->view( 'admin/view_admin_states', $data );
	}

	public function addState() {

		$objState = new CState();
		$data['state'] = $objState;

		$this->load->view( 'admin/edit_admin_state', $data );
	}

	public function insertState() {

		$objState = new CState();

		$objState->applyRequestForm( $this->input->post( 'state' ), $this->_arrstrStateFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objState->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'State added.' ) );
		}
	}

	public function editState() {

		$intStateId = $this->input->post( 'id' );

		$objState = CStates::fetchStateById( $intStateId, $this->db );

		$data['state'] = $objState;

		$this->load->view( 'admin/edit_admin_state', $data );
	}

	public function updateState() {

		$intStateId = $this->input->post( 'state' )['id'];
		$objState = CStates::fetchStateById( $intStateId, $this->db );

		$objState->applyRequestForm( $this->input->post( 'state' ), $this->_arrstrStateFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objState->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'State updated.' ) );
		}
	}
}
