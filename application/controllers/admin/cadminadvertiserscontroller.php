<?php if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminAdvertisersController extends CAdminSystemController {

	public $_arrstrAdvertiserFields = array(
		'id' => NULL,
		'name' => NULL,
		'address' => NULL,
		'contact_number' => NULL,
		);

	public function index() {

		$arrobjAdvertisers = ( array ) CAdvertisers::fetchAllAdvertisers( $this->db );

		$data = array();
		$data['advertisers'] 	= $arrobjAdvertisers;

		$this->load->view( 'admin/view_advertisers', $data );
	}

	public function addAdvertiser() {
		$objAdvertiser = new CAdvertiser();

		$data = array();
		$data['advertiser'] = $objAdvertiser;

		$this->load->view( 'admin/add_edit_advertiser', $data );
	}

	public function insertAdvertiser() {
		$objAdvertiser = new CAdvertiser();
		$objAdvertiser->applyRequestForm( $this->input->post( 'advertiser' ), $this->_arrstrAdvertiserFields );

		switch( true ) {
			default:
				if( false == $objAdvertiser->validate( 'insert', $this->db ) ) {
					break;
				}

				if( false == $objAdvertiser->insert( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'Advertiser Added Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to add Advertiser' ) );
		exit;
	}

	public function editAdvertiser() {
		$intAdvertiserId = $this->input->post( 'advertiser_id' );
		$objAdvertiser = CAdvertisers::fetchAdvertiserById( $intAdvertiserId, $this->db );

		$data = array();
		$data['advertiser'] = $objAdvertiser;

		$this->load->view( 'admin/add_edit_advertiser', $data );
	}

	public function updateAdvertiser() {
		
		$intAdvertiserId = $this->input->post( 'advertiser' )['id'];

		$objAdvertiser = CAdvertisers::fetchAdvertiserById( $intAdvertiserId, $this->db );
		$objAdvertiser->applyRequestForm( $this->input->post( 'advertiser' ), $this->_arrstrAdvertiserFields );

		switch( true ) {
			default:
				if( false == $objAdvertiser->validate( 'update', $this->db ) ) {
					break;
				}

				if( false == $objAdvertiser->update( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'Advertiser updated Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to update Advertiser' ) );
		exit;
	}

}