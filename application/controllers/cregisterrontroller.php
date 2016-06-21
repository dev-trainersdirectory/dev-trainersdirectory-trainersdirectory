<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/CSystemController.php' );

class CRegisterController extends CSystemController {

	public $assignData;

	public function CRegisterController()
	{
		parent::__construct();
		
		$this->loadCommonData();
	}

	public function loadCommonData() {
		$this->assignData[ 'arrStrStates' ] = $this->CStates->fetchAllPublishedStates( $this->db );
		$this->assignData[ 'arrStrCities' ] = $this->CCities->fetchAllPublishedCities( $this->db );
	}

	public function login() {

		if( $_POST ) {
			$objUser = new CUser();

			$objUser->strEmailId	= $this->input->post( 'login_email' );
			$objUser->strPassword 	= $this->input->post( 'login_password' );

			if( true == $objUser->processLogin() ) {
				header("location:".base_url()."student/dashboard/");			
			}
		
			echo 'Invalid login cridentials';
		}
		$this->load->view( 'login', $this->assignData );
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

