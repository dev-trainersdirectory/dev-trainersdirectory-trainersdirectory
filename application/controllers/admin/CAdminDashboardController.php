<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAdminDashboardController extends CI_Controller {

	public function index() {

		if( NULL == $this->session->userdata('userID') ) {
			header("location:".base_url()."admin/");
		}

		$this->load->view( 'admin/view_admin_dashboard' );
	}

}
