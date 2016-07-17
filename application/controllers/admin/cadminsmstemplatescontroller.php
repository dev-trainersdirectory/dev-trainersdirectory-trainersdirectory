<?php if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminSmsTemplatesController extends CAdminSystemController {

	public $_arrstrSmsTemplateFields = array(
		'id' => NULL,
		'sms_type_id' => NULL,
		'content' => '',
		'is_active' => false
		);

	public function index() {

		$arrobjSmsTemplates = ( array ) CSmsTemplates::fetchAllSmsTemplates( $this->db );

		$data = array();
		$data['smsTemplates'] 	= $arrobjSmsTemplates;

		$this->load->view( 'admin/view_sms_templates', $data );
	}

	public function addSmsTemplate() {

		$arrobjSmsTypes = ( array ) CSmsTypes::fetchAllSmsTypes( $this->db );
		$objSmsTemplate = new CSmsTemplate();

		$data = array();
		$data['smsTypes'] 	 = $arrobjSmsTypes;
		$data['smsTemplate'] = $objSmsTemplate;

		$this->load->view( 'admin/add_edit_sms_template', $data );
	}

	public function insertSmsTemplate() {
		
		$objSmsTemplate = new CSmsTemplate();
		$objSmsTemplate->applyRequestForm( $this->input->post( 'sms_template' ), $this->_arrstrSmsTemplateFields );

		switch( true ) {
			default:
				if( false == $objSmsTemplate->validate( 'insert', $this->db ) ) {
					break;
				}

				if( false == $objSmsTemplate->insert( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'SMS Template Added Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to add sms template' ) );
		exit;
	}

	public function editSmsTemplate() {

		$intSmsTemplateId = $this->input->post( 'sms_template_id' );

		$arrobjSmsTypes = ( array ) CSmsTypes::fetchAllSmsTypes( $this->db );
		$objSmsTemplate = CSmsTemplates::fetchSmsTemplateById( $intSmsTemplateId, $this->db );

		$data = array();
		$data['smsTypes'] 	 = $arrobjSmsTypes;
		$data['smsTemplate'] = $objSmsTemplate;

		$this->load->view( 'admin/add_edit_sms_template', $data );
	}

	public function updateSmsTemplate() {
		
		$intSmsTemplateId = $this->input->post( 'sms_template' )['id'];

		$objSmsTemplate = CSmsTemplates::fetchSmsTemplateById( $intSmsTemplateId, $this->db );
		$objSmsTemplate->applyRequestForm( $this->input->post( 'sms_template' ), $this->_arrstrSmsTemplateFields );

		switch( true ) {
			default:
				if( false == $objSmsTemplate->validate( 'update', $this->db ) ) {
					break;
				}

				if( false == $objSmsTemplate->update( $this->db ) ) {
					break;
				}

				echo json_encode( array( 'type' => 'success', 'message' => 'SMS Template Added Successfully.' ) );
				exit;
		}
		echo json_encode( array( 'type' => 'Error', 'message' => 'Failed to add sms template' ) );
		exit;
	}
}