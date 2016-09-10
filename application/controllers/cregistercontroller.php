<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/csystemcontroller.php' );

class CRegisterController extends CSystemController {

	public $assignData;

	public $_arrstrUserFields = array( 
		'id' => NULL,
		'contact_number' => NULL,
		'email_id' => NULL,
		'password' => NULL,
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

	function index()
	{
		parent::__construct();
		
		$this->loadCommonData();
	}

	public function loadCommonData() {
		$this->assignData[ 'arrStrStates' ] = $this->CStates->fetchAllPublishedStates( $this->db );
		$this->assignData[ 'arrStrCities' ] = $this->CCities->fetchAllPublishedCities( $this->db );
	}

	public function login() {

		$objUser = new CUser();

		$objUser->strEmailId	= $this->input->post('login')['email'];
		$objUser->strPassword 	= $this->input->post('login')['password'];

		if( true == $objUser->processLogin() ) {
			echo json_encode( array( 'type' => 'success', 'location' => base_url()."dashboard/" ) );
		} else {
			echo json_encode( array( 'type' => 'error', 'message' => 'Invalid login cre' ) );
		}
	}

	public function generateOtp() {

		$strMobileNumber = $this->input->post('otp')['mobile_number'];

		$objLead = new CLead();

		$objLead->setContactNumber( $strMobileNumber );

		$objCommunicationLibrary = new CCommunicationLibrary();
		$objCommunicationLibrary->setDatabase( $this->db );
		$objCommunicationLibrary->setReceiverLead( $objLead );

		$objCommunicationLibrary->generateOPT();

		echo json_encode( array( 'type' => 'success', 'mobile_number' => $strMobileNumber ) );
	}

	public function validateOtp() {

		$strMobileNumber = $this->input->post('otp_2')['mobile_number'];
		$strOtp = $this->input->post('otp_2')['otp_number'];
		$intUserType = $this->input->post('otp_2')['user_type'];

		$objOtp = COtps::fetchOtpByMobileNumber( $strMobileNumber, $strOtp, $this->db );

		if( false == valObj( $objOtp, 'Cotp' ) ) {
			echo json_encode( array( 'type' => 'error', 'message' => 'Invalid / Expired OTP, please try again' ) );
		} else {
			echo json_encode( array( 'type' => 'success', 'user_type' => $intUserType, 'mobile_number' => $strMobileNumber ) );
		}
	}

	public function signup() {

		$boolIsSuccess = true;

		$objUser = new CUser();
		$objLead = new CLead();
		$objUserTypeAssociation = new CUserTypeAssociation();

		$objUser->applyRequestForm( $this->input->post( 'register' ), $this->_arrstrUserFields );
		$objLead->applyRequestForm( $this->input->post( 'register' ), $this->_arrstrLeadFields );

		$objUserTypeAssociation->setUserTypeId( $this->input->post( 'register' )['user_type'] );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objUser->insert( $this->db ) ) {
					$boolIsSuccess = false;
					$this->db->trans_rollback();
					break;
				}

				$objLead->setUserId( $objUser->getId() );
				if( false == $objLead->insert( $this->db ) ) {
					$boolIsSuccess = false;
					$this->db->trans_rollback();
					break;
				}

				$objUserTypeAssociation->setUserId( $objUser->getId() );
				if( false == $objUserTypeAssociation->insert( $this->db ) ) {
					$boolIsSuccess = false;
					$this->db->trans_rollback();
					break;
				}
				
				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'User added.', 'location' => base_url()."dashboard/") );
		}

		if( false == $boolIsSuccess )
			echo json_encode( array( 'type' => 'error', 'message' => 'Register Error' ) );
	}

}

