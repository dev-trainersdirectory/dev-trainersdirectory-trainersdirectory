<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/csystemcontroller.php' );

class CHomeController extends CSystemController {

	public function index() {

		$arrstrTrCategories = CTrCategories::fetchAllPublishedTrCategories( $this->db );

		$arrstrExitTages['search'] = base_url() . '/search';

		foreach( $arrstrTrCategories as $strTrCategory ) {
			if( NULL == $strTrCategory->getParentTrCategoryId() ) {
				$arrstrParentTrCategories[$strTrCategory->getId()] = $strTrCategory;
			} else {
				$arrstrSubTrCategories[$strTrCategory->getId()] = $strTrCategory;
			}
		}

		$arrstrTrSubjects = CTrSubjects::fetchAllPublishedSubjects( $this->db );

		$data['arrstrParentTrCategories'] = $arrstrParentTrCategories;
		$data['arrstrSubTrCategories'] = $arrstrSubTrCategories;
		$data['arrstrTrSubjects'] = $arrstrTrSubjects;
		$data['search_filter'] = $this->load->view('search_filter', NULL, TRUE);

		$this->load->view('home', $data);
	}

	public function sendSms() {
		$ch = curl_init();  
 
 		$message = 'hello How are you?';

 		$url = "http://sms.messagefunda.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=3644AZmxwBWoF5587fc96&message=$message&senderId=TrainD&routeId=1&mobileNos=9860640501&smsContentType=english";

	    curl_setopt($ch,CURLOPT_URL,$url);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	 
	    $output=curl_exec($ch);
	 
	    curl_close($ch);
	    print_r($output);
	}

	public function processImage() {
		$assignData['displayMessage'] = '';
		$this->load->view( 'view_image', $assignData );
	}

	public function uploadImage() {
		$this->load->library( 'commonfunctions' );

		if( false == $this->commonfunctions->storeImage( $_FILES ) ) {
			$assignData['displayMessage'] =  "Error while uploading file";
		} else {
			$assignData['displayMessage'] =  "Image uploaded successfully";
		}

		$this->load->view( 'view_image', $assignData );
	}
}
