<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminUsersController extends CAdminSystemController {

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

	public function index() {

		$arrstrFilter = array( 'name' => '', 'email_id' => '', 'contact_number' => '' );
		
		$data['filter'] 	= $arrstrFilter;
		$this->load->view( 'admin/view_users', $data );
	}

	public function viewPaginatedUsers() {

		$arrstrFilter = array( 'name' => '', 'email_id' => '', 'contact_number' => '' );

		$arrstrPostFilter = ( array ) $this->input->post( 'filter' );
		$arrstrPostFilter = array_filter( $arrstrPostFilter );

		if( true == array_key_exists( 'reset', $arrstrPostFilter ) && 1 == $arrstrPostFilter['reset'] ) {
			$arrstrPostFilter = array();
		}
		$arrstrFilter = array_merge( $arrstrFilter, $arrstrPostFilter );

		$intLimit = 5;
		if( $this->input->post('page') ) {
			$intOffset = $this->input->post('page');
		} else {
			$intOffset = 0;
		}

		$arrobjUsers = ( array ) CUsers::fetchUsersByFilter( $arrstrFilter, $this->db );

		$config['target']      	= '#js-user_inner_content';
        $config['base_url']    	= base_url().'admin_users/viewPaginatedUsers';
        $config['total_rows']  	= count( $arrobjUsers );
        $config['per_page']    	= 5;
        $config['cur_page']   	= $intOffset;

        $this->pagination->initialize($config);

        $arrobjUsers = CUsers::fetchUsersByFilterByOffsetByLimit( $arrstrFilter, $intLimit, $intOffset, $this->db );

		$arrintUserIds =  array_keys( $arrobjUsers );
		$arrobjLeads = ( array ) CLeads::fetchLeadsByUserIds( $arrintUserIds, $this->db );
		$arrobjLeads = ( array ) rekeyObjects( 'UserId', $arrobjLeads );

		$arrobjStatuses = ( array ) CStatuses::fetchAllStatuses( $this->db );

		$data = array();
		$data['users'] 		= $arrobjUsers;
		$data['leads'] 		= $arrobjLeads;
		$data['statuses'] 	= $arrobjStatuses;

		$this->load->view( 'admin/view_users_list', $data );
	}

	public function addUser() {

		$data = $this->loadCommonData();

		$objUser = new CUser();
		$objLead = new CLead();
		$objUserTypeAssociations = new CUserTypeAssociation();

		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['user_type_associations'] = $objUserTypeAssociations;

		$this->load->view( 'admin/edit_user', $data );
	}

	public function insertUser() {
		
		$objUser = new CUser();
		$objLead = new CLead();
		$objTrainer = NULL;
		$objCloneUserTypeAssociations = new CUserTypeAssociation();

		$objUser->applyRequestForm( $this->input->post( 'user' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'lead' ), $this->_arrstrLeadFields );

		foreach( $this->input->post('user_type_associations') as $intUserTypeId ){
			$objUserTypeAssociations = clone $objCloneUserTypeAssociations;
			$objUserTypeAssociations->setUserTypeId( $intUserTypeId );
			$arrobjInsertingUserTypeAssociations[ $intUserTypeId ] = $objUserTypeAssociations;
		}

		if( true == array_key_exists( CUserType::USER_TYPE_TRAINER , $arrobjInsertingUserTypeAssociations )){
			$objTrainer = new CTrainer();
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

				if( NULL != $objTrainer ) {
					$objTrainer->setUserId( $objUser->getId() );
					$objTrainer->setLeadId( $objLead->getId() );
					if( false == $objTrainer->insert( $this->db ) ) {
						$this->db->trans_rollback();
						break;
					}
				}

				foreach( $arrobjInsertingUserTypeAssociations as $objInsertingUserTypeAssociation) {
					$objInsertingUserTypeAssociation->setUserId( $objUser->getId() );
					if( false == $objInsertingUserTypeAssociation->insert( $this->db ) ) {
						$this->db->trans_rollback();
						break;
					}
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'User added.' ) );
		}
	}

	public function editUser() {

		$data = $this->loadCommonData();

		$intUserId = $this->input->post( 'id' );

		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$objUserTypeAssociations = CUserTypeAssociations::fetchUserTypeAssociationsByUserId( $intUserId, $this->db );
		$objUserTypeAssociations = ( array ) rekeyObjects( 'UserTypeId', $objUserTypeAssociations );

		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['user_type_associations'] = $objUserTypeAssociations;

		$this->load->view( 'admin/edit_user', $data );
	}

	public function uploadProfileImage() {

		$intUserId = $this->input->post('user')['id'];
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );

		$strTempImagePath = $_FILES['lead']['tmp_name']['profile_image'];
		$strFilePath = 'public\images\profile_pics\\';
		$strFileName = 'pp_' . $intUserId . '_' . $_FILES['lead']['name']['profile_image'];
		$strThumbFilePath = $strFilePath . 'thumbnail\\';

		$strDestFilePath = FCPATH . $strFilePath . $strFileName;
		$strThumnailFile = FCPATH . $strThumbFilePath . $strFileName;

		$objLead->setProfilePic( $strFilePath . $strFileName );

		switch( NULL ) {
			default:

				if( false == copy( $strTempImagePath, $strDestFilePath ) ) {
					break;
				}

				if( false == compressImage( $strDestFilePath, $strThumnailFile ) ) {
					break;
				}
				
				$this->db->trans_begin();

				if( false == $objLead->update( $this->db ) ) {
					break;
				}

				$this->db->trans_commit();
				echo $strThumbFilePath . $strFileName;
				exit;
		}

		$this->db->trans_rollback();
	}

	public function updateUser() {

		$intUserId = $this->input->post('user')['id'];
		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$arrobjUserTypeAssociations = CUserTypeAssociations::fetchUserTypeAssociationsByUserId( $intUserId, $this->db );
		$arrobjUserTypeAssociations = ( array ) rekeyObjects( 'UserTypeId', $arrobjUserTypeAssociations );
		$objTrainer = NULL;
		$objCloneUserTypeAssociations = new CUserTypeAssociation();

		$objUser->applyRequestForm( $this->input->post( 'user' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'lead' ), $this->_arrstrLeadFields );

		foreach( $this->input->post('user_type_associations') as $intUserTypeId ){
			$objUserTypeAssociations = clone $objCloneUserTypeAssociations;
			$objUserTypeAssociations->setUserTypeId( $intUserTypeId );
			$arrobjInsertingUserTypeAssociations[ $intUserTypeId ] = $objUserTypeAssociations;
		}

		if( true == array_key_exists( CUserType::USER_TYPE_TRAINER , $arrobjInsertingUserTypeAssociations )
			&& false == array_key_exists( CUserType::USER_TYPE_TRAINER , $arrobjUserTypeAssociations ) ){
			$objTrainer = new CTrainer();
		}

		$arrobjDeletingUserTypeAssociations = array_diff_key( $arrobjUserTypeAssociations, $arrobjInsertingUserTypeAssociations );
		$arrobjInsertingUserTypeAssociations = array_diff_key( $arrobjInsertingUserTypeAssociations, $arrobjUserTypeAssociations );

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

				if( NULL != $objTrainer ) {
					$objTrainer->setUserId( $objUser->getId() );
					$objTrainer->setLeadId( $objLead->getId() );
					if( false == $objTrainer->insert( $this->db ) ) {
						$this->db->trans_rollback();
						break;
					}
				}

				foreach( $arrobjInsertingUserTypeAssociations as $objInsertingUserTypeAssociation) {
					$objInsertingUserTypeAssociation->setUserId( $objUser->getId() );
					if( false == $objInsertingUserTypeAssociation->insert( $this->db ) ) {
						$this->db->trans_rollback();
						break 2;
					}
				}

				foreach ( $arrobjDeletingUserTypeAssociations as $objDeletingUserTypeAssociation ) {
					if( false == $objDeletingUserTypeAssociation->delete( $this->db ) ) {
						$this->db->trans_rollback();
						break 2;
					}
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'User added.' ) );
		}

		$this->db->trans_rollback();
	}
}
