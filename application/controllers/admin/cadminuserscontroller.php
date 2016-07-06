<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminUsersController extends CAdminSystemController {

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

	public function index() {

		$arrstrFilter = array( 'name' => '', 'email_id' => '', 'contact_number' => '' );
		$arrstrPostFilter = ( array ) $this->input->post( 'filter' );
		$arrstrPostFilter = array_filter( $arrstrPostFilter );

		if( true == array_key_exists( 'reset', $arrstrPostFilter ) ) {
			$arrstrPostFilter = array();
		}
		$arrstrFilter = array_merge( $arrstrFilter, $arrstrPostFilter );
		
		$arrobjUsers = ( array ) CUsers::fetchUsersByFilter( $arrstrFilter, $this->db );

		$arrintUserIds =  array_keys( $arrobjUsers );
		$arrobjLeads = ( array ) CLeads::fetchLeadsByUserIds( $arrintUserIds, $this->db );
		$arrobjLeads = ( array ) rekeyObjects( 'UserId', $arrobjLeads );

		$arrobjStatuses = ( array ) CStatuses::fetchAllStatuses( $this->db );
		
		$data = array();
		$data['users'] 		= $arrobjUsers;
		$data['leads'] 		= $arrobjLeads;
		$data['statuses'] 	= $arrobjStatuses;
		$data['filter'] 	= $arrstrFilter;

		$this->load->view( 'admin/view_users', $data );
	}

	public function editUser() {

		$intUserId = $this->input->post( 'id' );

		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$arrobjStatuses = ( array ) CStatuses::fetchAllStatuses( $this->db );
		$arrobjCities = ( array ) CCities::fetchAllPublishedCities( $this->db );
		$arrobjStates = ( array ) CStates::fetchAllPublishedStates( $this->db );

		$data = array();
		$data['user'] = $objUser;
		$data['lead'] = $objLead;
		$data['statuses'] = $arrobjStatuses;
		$data['cities'] = $arrobjCities;
		$data['states'] = $arrobjStates;

		$this->load->view( 'admin/edit_user', $data );
	}

	public function updateUser() {

		$intUserId = $this->input->post('user')['id'];
		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );

		/*$strTempImagePath = $_FILES['lead']['tmp_name']['profile_image'];
		$strFilePath = 'public\images\profile_pics\\';
		$strFileName = 'pp_' . $intUserId . '_' . $_FILES['lead']['name']['profile_image'];
		$strThumbFilePath = $strFilePath . 'thumbnail\\';

		$strDestFilePath = FCPATH . $strFilePath . $strFileName;
		$strThumnailFile = FCPATH . $strThumbFilePath . $strFileName;*/

		$objUser->applyRequestForm( $this->input->post( 'user' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'lead' ), $this->_arrstrLeadFields );

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

				if( false == $objUser->update( $this->db ) ) {
					break;
				}

				if( false == $objLead->update( $this->db ) ) {
					break;
				}

				$this->db->trans_commit();
				$objUser = CUsers::fetchUserById( $intUserId, $this->db );
				display($objUser);
				exit;
		}

		$this->db->trans_rollback();
	}
}
