<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminUsersController extends CAdminSystemController {

	public $_arrstrUserFields = array( 
		'id' => NULL,
		'contact_number' => NULL,
		'email_address' => NULL );

	public function index() {

		$arrstrFilter = $this->input->post( 'filter' );
		$arrobjUsers = ( array ) CUsers::fetchUsersByFilter( $arrstrFilter, $this->db );

		$arrintUserIds = array();
		foreach( $arrobjUsers as $objUser )
			$arrintUserIds[] = $objUser->getId();

		$arrobjLeads = ( array ) CLeads::fetchLeadsByUserIds( $arrintUserIds, $this->db );
		$arrobjLeads = ( array ) rekeyObjects( 'UserId', $arrobjLeads );

		$arrobjStatuses = ( array ) CStatuses::fetchAllStatuses( $this->db );
		
		$data = array();
		$data['users'] = $arrobjUsers;
		$data['leads'] = $arrobjLeads;
		$data['statuses'] = $arrobjStatuses;

		$this->load->view( 'admin/view_users', $data );
	}

	public function editUser() {

		//$intUserId = $this->input->post( 'user')['id'];
		$intUserId = 2;

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
		
		$intUserId = $this->input->post( 'user')['id'];
		$objUser = CUsers::fetchUserById( $intUserId, $this->db );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		
		$objUser->applyRequestForm( $this->input->post( 'user'), $this->_arrstrUserFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objUser->update( $this->db ) ) {
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
