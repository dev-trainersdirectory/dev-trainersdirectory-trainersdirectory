<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAdminAuthenticationController extends CI_Controller {

	public function index() {

		$data['errorMesssage'] = '';
		$this->load->view( 'admin/view_admin_login', $data );
	}

	public function login() {

		$data['errorMesssage'] = '';

		$objUser = new CUser();

		$objUser->strEmailId	= $this->input->post( 'admin_username' );
		$objUser->strPassword 	= $this->input->post( 'admin_password' );

		if( NULL != $objUser->processLogin( CUserType::USER_TYPE_ADMIN ) ) {
			$objUser->setSession();
			header("location:".base_url()."admin_dashboard/");
		}

		$data['errorMesssage'] = 'Invalid login cridentials';
		$this->load->view( 'admin/view_admin_login', $data );

	}
}
