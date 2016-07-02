<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminDashboardController extends CAdminSystemController {

	public function index() {

		if( NULL == $this->session->userdata('userID') ) {
			header("location:".base_url()."admin/");
		}

		$this->load->view( 'admin/view_admin_dashboard' );
	}

	public function logout() {

		$this->session->sess_destroy();
		header("location:".base_url()."admin/");
	}

}
