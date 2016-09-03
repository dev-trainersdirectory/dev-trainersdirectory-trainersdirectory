<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CAdminDashboardController extends CI_Controller {

	public function index() {

		if( NULL == $this->session->userdata('userID') ) {
			header("location:".base_url()."admin/");
		}
		$intUserId = $this->session->userdata('userID');
		$objUser = CUsers::fetchUserDetailsById( $intUserId, $this->db );

		$data = array();
		$data['user'] 	= $objUser;

		$this->load->view( 'admin/view_admin_dashboard', $data );
	}

	public function admin_panel() {
		$this->load->view( 'admin/view_admin_panel' );
	}

	public function logout() {

		$this->session->sess_destroy();
		header("location:".base_url()."admin/");
	}

}
