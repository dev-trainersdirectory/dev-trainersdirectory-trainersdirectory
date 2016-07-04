<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAdminTrainersController extends CI_Controller {

	public function index() {

		$arrObjTrainers = CTrainers::fetchAllTrainersDetails( $this->db );
echo '<pre>'; print_r($arrObjTrainers); die;
		$arrMixAssignData['trainers'] = $arrObjTrainers;

		$this->load->view( 'admin/view_trainers', $arrMixAssignData );
	}

	public function view() {

		$intLeadId = $this->input->post( 'lead_id' );

		$objLead = CLeads::fetchLeadById( $intLeadId );

		$arrMixAssignData['objLead'] = $objLead;

		$this->load->view( 'admin/view_lead_details', $arrMixAssignData );
	}

	public function updateLead() {

		$objLead = new CLead();

		$objLead->intId = $this->input->post( 'lead_id' );
		$objLead->strFirstName = $this->input->post( 'lead_' );
		$objLead->strLastName = $this->input->post( 'lead_id' );
		$objLead->strGender = $this->input->post( 'lead_id' );
		$objLead->strBirthDate = $this->input->post( 'lead_id' );
		$objLead->strAddress = $this->input->post( 'lead_id' );
		$objLead->strCity = $this->input->post( 'lead_id' );
		$objLead->strState = $this->input->post( 'lead_id' );
		$objLead->intPinCode = $this->input->post( 'lead_id' );
		$objLead->strEmailAddress = $this->input->post( 'lead_id' );
		$objLead->strContactNumber = $this->input->post( 'lead_id' );
		$objLead->strAlternateContactNumber = $this->input->post( 'lead_id' );
		$objLead->boolIsNmberVerified = $this->input->post( 'lead_id' );
		$objLead->boolIsNumberPrivate = $this->input->post( 'lead_id' );
		$objLead->boolAllowSmsAlert = $this->input->post( 'lead_id' );
		$objLead->intCoins = $this->input->post( 'lead_id' );
		$objLead->boolIsActive = $this->input->post( 'lead_id' );
		$objLead->strCreatedBy = $this->input->post( 'lead_id' );
		$objLead->strCreatedOn = $this->input->post( 'lead_id' );


	}
}
