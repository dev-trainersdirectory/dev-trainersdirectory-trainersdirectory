<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAdminTrainersController extends CI_Controller {

	public function index() {

		$arrobjUsers = CUsers::fetchUsersByUserTypeId( 3 ,$this->db );
//echo '<pre>'; print_r($arrobjUsers); die;
		$arrintUserIds = array();
		foreach( $arrobjUsers as $objUser )
			$arrintUserIds[] = $objUser->getId();

		$arrobjLeads = ( array ) CLeads::fetchLeadsByUserIds( $arrintUserIds, $this->db );
		$arrobjLeads = ( array ) rekeyObjects( 'UserId', $arrobjLeads );

		$arrobjTrainers = ( array ) Ctrainers::fetchTrainersByUserIds( $arrintUserIds, $this->db );
		$arrobjTrainers = ( array ) rekeyObjects( 'UserId', $arrobjTrainers );

		$arrobjStatuses = ( array ) CStatuses::fetchAllStatuses( $this->db );

		$data = array();
		$data['users'] = $arrobjUsers;
		$data['leads'] = $arrobjLeads;
		$data['statuses'] = $arrobjStatuses;
		$data['trainers'] = $arrobjTrainers;

		$this->load->view( 'admin/view_trainers', $data );
	}

	public function editTrainer() {

		$intUserId = $this->input->post( 'id' );

		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$objTrainer = CTrainers::fetchTrainerByUserId( $intUserId, $this->db );
		$arrobjStatuses = ( array ) CStatuses::fetchAllStatuses( $this->db );
		$arrobjCities = ( array ) CCities::fetchAllPublishedCities( $this->db );
		$arrobjStates = ( array ) CStates::fetchAllPublishedStates( $this->db );

		$data = array();
		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['trainer'] = $objTrainer;
		$data['statuses'] = $arrobjStatuses;
		$data['cities'] = $arrobjCities;
		$data['states'] = $arrobjStates;

		$this->load->view( 'admin/edit_trainer', $data );
	}

	public function updateTrainer() {

		$mixFormData = $this->input->post('user')['email_id'];

		echo $mixFormData;
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
