<?php if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminEmailTemplatesController extends CAdminSystemController {

	public $_arrstrEmailTemplateFields = array(
		'id' => NULL,
		'email_type_id' => NULL,
		'user_type_id' => NULL,
		'send_from_email_id' => '',
		'subject' => '',
		'content' => '',
		'is_active' => false
		);

	public function index() {
		$arrobjEmailTemplates = ( array ) CEmailTemplates::fetchAllEmailTemplates( $this->db );

		$data = array();
		$data['emailTemplates'] 	= $arrobjEmailTemplates;

		$this->load->view( 'admin/view_email_templates', $data );
	}

	public function addEmailTemplate() {

		$arrobjEmailTypes = ( array ) CEmailTypes::fetchAllEmailTypes( $this->db );
		$arrobjUserTypes = ( array ) CUserTypes::fetchAllPublishedUserTypes( $this->db );
		$objEmailTemplate = new CEmailTemplate();

		$data = array();
		$data['emailTypes'] 	= $arrobjEmailTypes;
		$data['userTypes'] 	 	= $arrobjUserTypes;
		$data['emailTemplate'] 	= $objEmailTemplate;

		$this->load->view( 'admin/add_edit_email_template', $data );
	}

	public function insertEmailTemplate() {
		
		$objEmailTemplate = new CEmailTemplate();
		$objEmailTemplate->applyRequestForm( $this->input->post( 'email_template' ), $this->_arrstrEmailTemplateFields );

		switch( true ) {
			default:
				if( false == $objEmailTemplate->validate( 'insert', $this->db ) ) {
					break;
				}

				if( false == $objEmailTemplate->insert( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'Email Template Added Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to add email template' ) );
		exit;
	}

	public function editEmailTemplate() {

		$intEmailTemplateId = $this->input->post( 'email_template_id' );

		$arrobjEmailTypes = ( array ) CEmailTypes::fetchAllEmailTypes( $this->db );
		$arrobjUserTypes = ( array ) CUserTypes::fetchAllPublishedUserTypes( $this->db );
		$objEmailTemplate = CEmailTemplates::fetchEmailTemplateById( $intEmailTemplateId, $this->db );

		$data = array();
		$data['emailTypes'] 	= $arrobjEmailTypes;
		$data['userTypes'] 	 	= $arrobjUserTypes;
		$data['emailTemplate'] 	= $objEmailTemplate;

		$this->load->view( 'admin/add_edit_email_template', $data );
	}

	public function updateEmailTemplate() {
		
		$intEmailTemplateId = $this->input->post( 'email_template' )['id'];

		$objEmailTemplate = CEmailTemplates::fetchEmailTemplateById( $intEmailTemplateId, $this->db );
		$objEmailTemplate->applyRequestForm( $this->input->post( 'email_template' ), $this->_arrstrEmailTemplateFields );

		switch( true ) {
			default:
				if( false == $objEmailTemplate->validate( 'update', $this->db ) ) {
					break;
				}

				if( false == $objEmailTemplate->update( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'Email Template updated Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to update email template.' ) );
		exit;
	}
}