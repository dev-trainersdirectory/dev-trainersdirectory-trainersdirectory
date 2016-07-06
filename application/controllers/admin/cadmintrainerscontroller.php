<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminTrainersController extends CAdminSystemController {

	public $_arrstrUserFields = array( 
		'id' => NULL,
		'contact_number' => NULL,
		'email_address' => NULL,
		'user_id' => NULL );

	public $_arrstrLeadFields = array(
		'first_name' => NULL,
		'last_name'  => NULL,
		'alternate_contact_number' => NULL,
		'address' => NULL,
		'city_id' => NULL,
		'state_id' => NULL,
		'pin_code' => NULL,
		'is_number_verified' => false,
		'is_number_private' => false,
		'allow_sms_alert' => false
		);

	public $_arrstrTrainerFields = array( 
		'description' => NULL,
		'experience' => NULL,
		'min_rate' => NULL,
		'max_rate' => NULL,
		'is_paid_profile' => NULL,
		'completed_on' => NULL,
		'has_taught_in_school_colleges' => NULL,
		'has_vehicle' => NULL,
		'views' => NULL,
		'available_day_id' => NULL,
		'available_start_time_id' => NULL,
		'available_end_time_id' => NULL,
		'qualities' => NULL );

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
		$objTrainerLocation = CTrainerLocations::fetchTrainerLocationsByTrainerId( $objTrainer->getId(), $this->db );
		$objTrainerPreferences = CTrainerPreferences::fetchTrainerPreferencesByTrainerId( $objTrainer->getId(), $this->db );

		$data = $this->loadCommonData();

		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['trainer'] = $objTrainer;
		$data['trainer_locations'] = $objTrainerLocation;
		$data['trainer_preferences'] = $objTrainerPreferences;
		
		$this->load->view( 'admin/edit_trainer', $data );
	}

	public function updateTrainer() {

		$intUserId = $this->input->post('user')['id'];
		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$objTrainer = CTrainers::fetchTrainerByUserId( $intUserId, $this->db );

		$objUser->applyRequestForm( $this->input->post( 'user' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'lead' ), $this->_arrstrLeadFields );
		$objTrainer->applyRequestForm( $this->input->post( 'trainer' ), $this->_arrstrTrainerFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objUser->update( $this->db ) ) {
					break;
				}

				if( false == $objLead->update( $this->db ) ) {
					break;
				}

				if( false == $objTrainer->update( $this->db ) ) {
					break;
				}

				$this->db->trans_commit();
				$this->index();
		}

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
