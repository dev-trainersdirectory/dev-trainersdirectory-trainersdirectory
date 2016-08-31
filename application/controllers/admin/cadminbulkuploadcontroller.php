<?php if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminBulkUploadController extends CAdminSystemController {

	public function index() {
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

		$intUserTypeId = $_POST['user_type'];
		if( 0 == $intUserTypeId ) {
			echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to recorgnise input.' ) );
			exit;
		}

		$arrUsers = $this->readCsvFile( $strDestFilePath );

		if( false == $this->createUsers( $arrUsers, $intUserTypeId ) ) {
			echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to add one or more users.' ) );
			exit;
		}

		echo json_encode( array( 'type' => 'Success', 'message' => 'Data uploaded successfully.' ) );
		header( 'location:' . base_url() . 'admin_dashboard/' );
		exit;
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

		$intCounter = 0;
		foreach( $arrstrUsers as $arrstrUser ) {
			$objUser = new CUser();
			$objUserTypeAssociation = new CUserTypeAssociation();
			$objLead = new CLead();

			//set User Data
			$objUser->setId( $objUser->getNextId( 'sq_users', $this->db ) );
			$objUser->setContactNumber($arrstrUser['contact_number']);
			$objUser->setEmailId($arrstrUser['email_address']);
			$objUser->setStatusId($arrstrUser['status']);

			//set User Type Association
			$objUserTypeAssociation->setId( $objUserTypeAssociation->getNextId( 'sq_user_type_associations', $this->db ) );
			$objUserTypeAssociation->setUserTypeId( $intUserTypeId );
			$objUserTypeAssociation->setUserId( $objUser->getId() );

			//set Lead Data
			$objLead->setId( $objLead->getNextId( 'sq_leads', $this->db ) );
			$objLead->setUserId( $objUser->getId() );
			$objLead->setFirstName($arrstrUser['first_name']);
			$objLead->setLastName($arrstrUser['last_name']);

			if( CUserType::USER_TYPE_TRAINER == $intUserTypeId ) {
				//set Trainer Data
				$objTrainer = new CTrainer();
				$objTrainer->setId( $objTrainer->getNextId( 'sq_trainers', $this->db ) );
				$objTrainer->setUserId( $objUser->getId() );
				$objTrainer->setLeadId( $objLead->getId() );
				$objTrainer->setDescription($arrstrUser['description']);
				$objTrainer->setExperience($arrstrUser['experience']);

				$objTrainerVideo = new CTrainerVideo();
				$objTrainerVideo->setId( $objTrainerVideo->getNextId( 'sq_trainer_videos', $this->db ) );
				$objTrainerVideo->setTrainerId( $objTrainer->getId() );
				$objTrainerVideo->setVideoLink($arrstrUser['video_link']);

				$arrobjTrainers[$intCounter] = $objTrainer;
				$arrobjTrainerVideos[$intCounter] = $objTrainerVideo;
			}

			$arrobjUsers[$intCounter] = $objUser;
			$arrobjUserTypeAssociations[$intCounter] = $objUserTypeAssociation;
			$arrobjLeads[$intCounter] = $objLead;
			$intCounter++;
		}

		$boolResult = true;
		for( $intI = 0; $intI < count( $arrobjUsers ); $intI++ ) {
			
			if( false == $arrobjUsers[$intI]->validate( 'insert' ) ) {
				$boolResult = false;
				continue;
			}

			$this->db->trans_begin();
			
			if( false == $arrobjUsers[$intI]->insert() ) {
				$boolResult = false;
				$this->db->trans_rollback();
				continue;
			}
			
			if( false == $arrobjUserTypeAssociations[$intI]->insert() ) {
				$boolResult = false;
				$this->db->trans_rollback();
				continue;
			}

			if( false == $arrobjLeads[$intI]->insert() ) {
				$boolResult = false;
				$this->db->trans_rollback();
				continue;
			}

			if( true == array_key_exists($intI, $arrobjTrainers) && false == $arrobjTrainers[$intI]->insert() ) {
				$boolResult = false;
				$this->db->trans_rollback();
				continue;
			}

			if( true == array_key_exists($intI, $arrobjTrainerVideos) && false == $arrobjTrainerVideos[$intI]->insert() ) {
				$boolResult = false;
				$this->db->trans_rollback();
				continue;
			}
			$this->db->trans_commit();
		}

		return $boolResult;
	}

	public function download_sample_document() {

		$file = FCPATH . 'public/csv_uploads/sample_doc.csv';

		if( file_exists( $file ) ) {
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename="'.basename($file).'"');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file));
		    readfile($file);
		    exit;
		}
	}
}