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

		$arrstrFilter = array( 'name' => '', 'email_id' => '', 'contact_number' => '', 'user_type_id' => CUserType::USER_TYPE_TRAINER );

		$filterData['filter'] = $arrstrFilter;
		$this->load->view( 'admin/view_trainers', $filterData );
	}

	public function viewPaginatedTrainers() {

		$arrstrFilter = array( 'name' => '', 'email_id' => '', 'contact_number' => '' );
		$arrstrPostFilter = ( array ) $this->input->post( 'filter' );
		$arrstrPostFilter = array_filter( $arrstrPostFilter );

		if( true == array_key_exists( 'reset', $arrstrPostFilter ) && 1 == $arrstrPostFilter['reset'] ) {
			$arrstrPostFilter = array();
		}
		$arrstrFilter = array_merge( $arrstrFilter, $arrstrPostFilter );
		$arrstrFilter['user_type_id'] = CUserType::USER_TYPE_TRAINER;

		$intLimit = 5;
		if( $this->input->post('page') ) {
			$intOffset = $this->input->post('page');
		} else {
			$intOffset = 0;
		}

		$arrobjUsers = CUsers::fetchUsersByFilter( $arrstrFilter, $this->db );

		$config['target']      	= '#js-trainer_inner_content';
        $config['base_url']    	= base_url().'admin_trainers/viewPaginatedTrainers';
        $config['total_rows']  	= count( $arrobjUsers );
        $config['per_page']    	= 5;
        $config['cur_page']   	= $intOffset;

        $this->pagination->initialize($config);

        $arrobjUsers = CUsers::fetchUsersByFilterByOffsetByLimit( $arrstrFilter, $intLimit, $intOffset, $this->db );

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

		$this->load->view( 'admin/view_trainers_list', $data );
	}

	public function editTrainer() {

		$intUserId = $this->input->post( 'id' );

		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$objTrainer = CTrainers::fetchTrainerByUserId( $intUserId, $this->db );
		$objTrainerTimings = CTrainerTimings::fetchTrainerTimingsByTrainerId( $objTrainer->getId(), $this->db );
		$objTrainerTimings = rekeyObjects( 'Id', $objTrainerTimings );

		$arrobjTrainerLocations = ( array ) CTrainerLocations::fetchTrainerLocationsByTrainerId( $objTrainer->getId(), $this->db );
		$arrobjTrainerPreferences = ( array ) CTrainerPreferences::fetchTrainerPreferencesByTrainerId( $objTrainer->getId(), $this->db );
		$arrobjTrainerPreferences = rekeyObjects( 'PreferenceId', $arrobjTrainerPreferences );

		$data = $this->loadCommonData();

		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['trainer'] = $objTrainer;
		$data['trainer_timings'] = $objTrainerTimings;
		$data['trainer_locations'] = $arrobjTrainerLocations;
		$data['trainer_preferences'] = $arrobjTrainerPreferences;
		
		$this->load->view( 'admin/edit_trainer', $data );
	}

	public function updateTrainer() {

		$intUserId = $this->input->post('user')['id'];
		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$objTrainer = CTrainers::fetchTrainerByUserId( $intUserId, $this->db );
		$arrobjTrainerPreferences = ( array ) CTrainerPreferences::fetchTrainerPreferencesByTrainerId( $objTrainer->getId(), $this->db );
		$objClonableTrainerPreference = new CTrainerPreference();

		$objUser->applyRequestForm( $this->input->post( 'user' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'lead' ), $this->_arrstrLeadFields );
		$objTrainer->applyRequestForm( $this->input->post( 'trainer' ), $this->_arrstrTrainerFields );

		foreach( $this->input->post('trainer_preferences') as $intPreferenceId ){
			$objTrainerPreference = clone $objClonableTrainerPreference;
			$objTrainerPreference->setPreferenceId( $intPreferenceId );
			$arrobjInsertingTrainerPreferences[ $intPreferenceId ] = $objTrainerPreference;
		}

		$arrobjDeletingTrainerPreferences = array_diff_key( $arrobjTrainerPreferences, $arrobjInsertingTrainerPreferences );
		$arrobjInsertingTrainerPreferences = array_diff_key( $arrobjInsertingTrainerPreferences, $arrobjTrainerPreferences );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objUser->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				if( false == $objLead->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				if( false == $objTrainer->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				if( true == valArr( $arrobjInsertingTrainerPreferences ) ) {
					foreach( $arrobjInsertingTrainerPreferences as $objInsertingTrainerPreference ) {
						$objInsertingTrainerPreference->setTrainerId( $objTrainer->getId() );
						if( false == $objInsertingTrainerPreference->insert( $this->db ) ) {
							$this->db->trans_rollback();
							break 2;
						}
					}
				}

				if( true == valArr( $arrobjDeletingTrainerPreferences )  ) {
					foreach( $arrobjDeletingTrainerPreferences as $objDeletingTrainerPreference ) {
						if( false == $objDeletingTrainerPreference->delete( $this->db ) ) {
							$this->db->trans_rollback();
							break 2;
						}
					}
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Trainer added.' ) );
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
		$objClonableTrainerTimings = new CTrainerTiming();
		$objUserTypeAssociation = new CUserTypeAssociation();
		$objClonableTrainerPreference = new CTrainerPreference();

		$objUser->applyRequestForm( $this->input->post( 'user' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'lead' ), $this->_arrstrLeadFields );
		$objTrainer->applyRequestForm( $this->input->post( 'trainer' ), $this->_arrstrTrainerFields );
		$objUserTypeAssociation->setUserTypeId( CUserType::USER_TYPE_TRAINER );

		if( true == valArr( $this->input->post('trainer_preferences') ) ) {
			foreach( $this->input->post('trainer_preferences') as $intPreferenceId ){
				$objTrainerPreference = clone $objClonableTrainerPreference;
				$objTrainerPreference->setPreferenceId( $intPreferenceId );
				$arrobjInsertingTrainerPreferences[ $intPreferenceId ] = $objTrainerPreference;
			}
		}

		foreach( $this->input->post('trainer_timings') as $intTrainerTimingId ) {
			$objTrainerTimings = clone $objClonableTrainerTimings;
			$objTrainerTimings->setTimeId( $intTrainerTimingId );
			$arrobjInsertingTrainerTimings[ $intTrainerTimingId ] = $objTrainerTimings;
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

				if( true == valArr( $arrobjInsertingTrainerPreferences ) ) {
					foreach( $arrobjInsertingTrainerPreferences as $objInsertingTrainerPreference ) {
						$objInsertingTrainerPreference->setTrainerId( $objTrainer->getId() );
						if( false == $objInsertingTrainerPreference->insert( $this->db ) ) {
							$this->db->trans_rollback();
							break 2;
						}
					}
				}

				if( true == valArr( $arrobjInsertingTrainerTimings ) ) {
					foreach( $arrobjInsertingTrainerTimings as $objInsertingTrainerTiming ) {
						$objInsertingTrainerTiming->setTrainerId( $objTrainer->getId() );
						if( false == $objInsertingTrainerTiming->insert( $this->db ) ) {
							$this->db->trans_rollback();
							break 2;
						}
					}
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Trainer added.' ) );
		}

	}

}
