<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminTrainersController extends CAdminSystemController {

	public $_arrstrUserFields = array( 
		'id' => NULL,
		'contact_number' => NULL,
		'email_id' => NULL,
		'status_id' => NULL,
		'user_id' => NULL );

	public $_arrstrLeadFields = array(
		'first_name' => NULL,
		'last_name'  => NULL,
		'alternate_contact_number' => NULL,
		'gender_id' => NULL,
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

		$arrstrFilter = array( 'name' => '', 'email_id' => '', 'contact_number' => '' );
		$arrstrPostFilter = ( array ) $this->input->post( 'filter' );
		$arrstrPostFilter = array_filter( $arrstrPostFilter );

		if( true == array_key_exists( 'reset', $arrstrPostFilter ) ) {
			$arrstrPostFilter = array();
		}
		$arrstrFilter = array_merge( $arrstrFilter, $arrstrPostFilter );
		$arrstrFilter['user_type_id'] = CUserType::USER_TYPE_TRAINER;

		$arrobjUsers = CUsers::fetchUsersByFilter( $arrstrFilter, $this->db );

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
		$data['filter'] 	= $arrstrFilter;

		$this->load->view( 'admin/view_trainers', $data );
	}

	public function editTrainer() {

		$intUserId = $this->input->post( 'id' );

		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$objTrainer = CTrainers::fetchTrainerByUserId( $intUserId, $this->db );
		$arrobjTrainerLocations = ( array ) CTrainerLocations::fetchTrainerLocationsByTrainerId( $objTrainer->getId(), $this->db );
		$arrobjTrainerPreferences = ( array ) CTrainerPreferences::fetchTrainerPreferencesByTrainerId( $objTrainer->getId(), $this->db );
		$arrobjTrainerPreferences = rekeyObjects( 'PreferenceId', $arrobjTrainerPreferences );

		$data = $this->loadCommonData();

		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['trainer'] = $objTrainer;
		$data['trainer_locations'] = $arrobjTrainerLocations;
		$data['trainer_preferences'] = $arrobjTrainerPreferences;
		
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

	public function addTrainer() {

		$data = $this->loadCommonData();

		$objUser = new CUser();
		$objLead = new CLead();
		$objTrainer = new CTrainer();
		$arrobjTrainerLocations = ( array ) CTrainerLocations::fetchTrainerLocationsByTrainerId( $objTrainer->getId(), $this->db );
		$arrobjTrainerPreferences = ( array ) CTrainerPreferences::fetchTrainerPreferencesByTrainerId( $objTrainer->getId(), $this->db );
		$arrobjTrainerPreferences = rekeyObjects( 'PreferenceId', $arrobjTrainerPreferences );

		$data = $this->loadCommonData();

		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['trainer'] = $objTrainer;
		$data['trainer_locations'] = $arrobjTrainerLocations;
		$data['trainer_preferences'] = $arrobjTrainerPreferences;

		$this->load->view( 'admin/edit_trainer', $data );
	}

	public function insertTrainer() {

		$objUser = new CUser();
		$objLead = new CLead();
		$objTrainer = new CTrainer();
		$objUserTypeAssociation = new CUserTypeAssociation();
		$objClonableTrainerPreference = new CTrainerPreference();

		$objUser->applyRequestForm( $this->input->post( 'user' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'lead' ), $this->_arrstrLeadFields );
		$objTrainer->applyRequestForm( $this->input->post( 'trainer' ), $this->_arrstrTrainerFields );
		$objUserTypeAssociation->setUserTypeId( CUserType::USER_TYPE_TRAINER );

		foreach( $this->input->post('trainer_preferences') as $intPreferenceId ){
			$objTrainerPreference = clone $objClonableTrainerPreference;
			$objTrainerPreference->setPreferenceId( $intPreferenceId );
			$arrobjInsertingTrainerPreferences[ $intPreferenceId ] = $objTrainerPreference;
		}

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objUser->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$objLead->setUserId( $objUser->getId() );
				if( false == $objLead->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$objTrainer->setUserId( $objUser->getId() );
				$objTrainer->setLeadId( $objLead->getId() );
				if( false == $objTrainer->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$objUserTypeAssociation->setUserId( $objUser->getId() );
				if( false == $objUserTypeAssociation->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				foreach( $arrobjInsertingTrainerPreferences as $objInsertingTrainerPreference ) {
					$objInsertingTrainerPreference->setTrainerId( $objTrainer->getId() );
					if( false == $objInsertingTrainerPreference->insert( $this->db ) ) {
						$this->db->trans_rollback();
						break 2;
					}
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Trainer added.' ) );
		}

	}

}
