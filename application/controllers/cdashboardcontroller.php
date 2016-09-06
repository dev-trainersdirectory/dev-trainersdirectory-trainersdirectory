<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/csystemcontroller.php' );

class CDashboardController extends CSystemController {

	public function index() {
		show('In Dashboard');
	}

}
