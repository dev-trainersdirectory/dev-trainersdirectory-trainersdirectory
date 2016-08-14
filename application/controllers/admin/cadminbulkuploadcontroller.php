<?php if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminBulkUploadController extends CAdminSystemController {

	public function index() {
	}

	public function viewAddUsers() {
		$data = array();

		$this->load->view( 'admin/view_admin_bulk_upload_users', $data );
	}

	public function addUsers() {
		$strMimeTypes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');

		$arrstrFile = $_FILES['bulk_upload'];

		if( false == in_array( $arrstrFile['type'], $strMimeTypes ) ){
			echo json_encode( array( 'type' => 'Error', 'message' => 'Only CSV files are allowed.' ) );
			exit;
		}

		$strTempImagePath = $arrstrFile['tmp_name'];
		$strFilePath = 'public\csv_uploads\\';
		$strFileName = 'csv_' . time() . '_' . $arrstrFile['name'];

		$strDestFilePath = FCPATH . $strFilePath . $strFileName;

		if( false == copy( $strTempImagePath, $strDestFilePath ) ) {
			echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to upload csv.' ) );
			exit;
		}

		$arrUsers = $this->readCsvFile( $strDestFilePath );

		if( false == $this->createUsers( $arrUsers, CUserType::USER_TYPE_STUDENT ) ) {
			echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to add one or more users.' ) );
			exit;
		}

		echo json_encode( array( 'type' => 'Success', 'message' => 'Users added successfully.' ) );
		exit;
	}

	public function viewAddTrainers() {
	}

	function readCsvFile( $strFile ) {
		$fp = fopen( $strFile,'r') or die("can't open file");
		$arrResult = array();
		$arrstrKeys = array();
		$intLineNo = 0;
		while($csv_line = fgetcsv($fp,1024)) {
		    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
		        
				if( $intLineNo == 0 ) {
					$arrstrKeys[$i] = $csv_line[$i];
				} else {
					$arrResult[$intLineNo][$arrstrKeys[$i]] = $csv_line[$i];
				}
		    }
		    $intLineNo++;
		}
		fclose($fp) or die("can't close file");

		return $arrResult;
	}

	public function createUsers( $arrstrUsers, $intUserTypeId ) {
		$arrobjUsers = $arrobjUserTypeAssociations = $arrobjLeads = array();

		foreach( $arrstrUsers as $arrstrUser ) {
			$objUser = new CUser();
			$objUserTypeAssociation = new CUserTypeAssociation();
			$objLead = new CLead();

			//set User Data
			//$objUser->setId();
			$objUser->setContactNumber($arrstrUser['contact_number']);
			$objUser->setEmailAddress($arrstrUser['email_address']);

			//set User Type Association
			//$objUserTypeAssociation->setId();
			$objUserTypeAssociation->setUserTypeId( $intUserTypeId );
			$objUserTypeAssociation->setUserId( $objUser->getId() );

			//set Lead Data
			//$objLead->setId();
			$objLead->setUserId( $objUser->getId() );
			$objLead->setFirstName($arrstrUser['first_name']);
			$objLead->setLastName($arrstrUser['last_name']);

			$arrobjUsers[] = $objUser;
			$arrobjUserTypeAssociations[] = $objUserTypeAssociation;
			$arrobjLeads[] = $objLead;
		}

		$boolResult = true;
		for( $intI = 0; $intI < count( $arrobjUsers ); $intI++ ) {
			if( false == $arrobjUsers[$intI]->insert() ) {
				$boolResult = false;
				continue;
			}
			
			if( false == $arrobjUserTypeAssociations[$intI]->insert() ) {
				$boolResult = false;
				continue;
			}

			if( false == $arrobjLeads[$intI]->insert() ) {
				$boolResult = false;
				continue;
			}
		}

		return $boolResult;
	}
}