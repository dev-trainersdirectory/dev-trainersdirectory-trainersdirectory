<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/csystemcontroller.php' );

class CRegisterController extends CSystemController {

	public $assignData;

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

	public function signup() {

		if( $_POST ) {
			$objUser = new CUser();

			$objUser->strFirstName	= $this->input->post( 'signup_firstname' );
			$objUser->strLastName	= $this->input->post( 'signup_lastname' );
			$objUser->strContact	= $this->input->post( 'signup_contact' );
			$objUser->strState		= $this->input->post( 'signup_state' );
			$objUser->strCity		= $this->input->post( 'signup_city' );
			$objUser->strEmailId	= $this->input->post( 'signup_email' );
			$objUser->strPassword	= $this->input->post( 'signup_password' );

			if( true == $objUser->processSignup() ) {
				header("location:" . base_url() . "student/dashboard/");			
			}
			
			echo 'Error in signup';
		}
		
		$this->load->view( 'register', $this->assignData );	
	}

}

