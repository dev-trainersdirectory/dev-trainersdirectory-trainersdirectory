<?php if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminAdvertisementsController extends CAdminSystemController {

	public $_arrstrAdvertisementFields = array(
		'id' => NULL,
		'advertiser_id' => NULL,
		'image_path'	=> NULL,
		'redirect_link' => NULL,
		'notes' 		=> NULL,
		'is_active' 	=> false
	);

	public function index() {

		$arrobjAdvertisements = ( array ) CAdvertisements::fetchAllAdvertisements( $this->db );

		$data = array();
		$data['advertisements'] 	= $arrobjAdvertisements;

		$this->load->view( 'admin/view_advertisements', $data );
	}

	public function addAdvertisement() {
		$objAdvertisement = new CAdvertisement();

		$data = array();
		$data['advertisement'] = $objAdvertisement;

		$this->load->view( 'admin/add_edit_advertisement', $data );
	}

	public function insertAdvertisement() {
		$objAdvertisement = new CAdvertisement();
		$objAdvertisement->applyRequestForm( $this->input->post( 'advertisement' ), $this->_arrstrAdvertisementFields );

		switch( true ) {
			default:
				if( false == $objAdvertisement->validate( 'insert', $this->db ) ) {
					break;
				}

				if( false == $objAdvertisement->insert( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'Advertisement Added Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to add Advertisement' ) );
		exit;
	}

	public function editAdvertisement() {
		$intAdvertisementId = $this->input->post( 'advertisement_id' );
		$objAdvertisement = CAdvertisements::fetchAdvertisementById( $intAdvertisementId, $this->db );

		$data = array();
		$data['advertisement'] = $objAdvertisement;

		$this->load->view( 'admin/add_edit_advertisement', $data );
	}

	public function updateAdvertisement() {
		
		$intAdvertisementId = $this->input->post( 'advertisement' )['id'];

		$objAdvertisement = CAdvertisements::fetchAdvertisementById( $intAdvertisementId, $this->db );
		$objAdvertisement->applyRequestForm( $this->input->post( 'advertisement' ), $this->_arrstrAdvertisementFields );

		switch( true ) {
			default:
				if( false == $objAdvertisement->validate( 'update', $this->db ) ) {
					break;
				}

				if( false == $objAdvertisement->update( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'Advertisement updated Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to update Advertisement' ) );
		exit;
	}

}