<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAdminAuthenticationController extends CI_Controller {

	public function index() {

		$this->load->view( 'admin/view_admin_login' );
	}

	public function login() {

		/*$objUser = new CUser();

		$objUser->strEmailId	= $this->input->post( 'admin_username' );
		$objUser->strPassword 	= $this->input->post( 'admin_password' );

		if( true == $objUser->processLogin() ) {
			$objUser->setSessionData();
			header("location:".base_url()."admin_dashboard/");
		}

		echo 'Invalid login cridentials';
		$this->load->view( 'admin/view_admin_login' );*/

		$arrMixSession['userID']	= 1;
		$arrMixSession['emailID']	= 'admin@td.lcl';
		$this->session->set_userdata( $arrMixSession );

		header("location:".base_url()."admin_dashboard/");

	}
}
