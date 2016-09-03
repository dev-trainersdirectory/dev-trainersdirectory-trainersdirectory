<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminBroadcastController extends CAdminSystemController {

	public $_arrstrSystemSmsFields = array(
			'id' => NULL,
			'sms_type_id' => NULL,
			'send_to' => NULL,
			'set_from' => NULL,
			'subject' => NULL,
			'content' => NULL,
			'communication_status_id' => NULL
		);

	public $_arrstrSystemEmailFields = array(
			'id' => NULL,
			'email_to' => NULL,
			'email_from' => NULL,
			'email_subject' => NULL,
			'email_body' => NULL,
			'communication_status_id' => NULL
		);

	public function index() {
		echo "In";
	}

	public function showSmsPopup() {

		$intLeadId = $this->input->post('lead_id');
		$intUserId = $this->input->post('user_id');

		$data['sms_templates'] = CSmsTemplates::fetchAllActiveSmsTemplates( $this->db );
		$data['lead'] = CLeads::fetchLeadNamesByLeadId( $intLeadId, $this->db );

		$this->load->view( 'admin/view_send_sms', $data );
	}

	public function sendSMS() {

		$objSystemSms = new CSystemSms();

		$objSystemSms->applyRequestForm( $this->input->post( 'broadcast' ), $this->_arrstrSystemSmsFields );

		$objSystemSms->setSentFrom('Admin');
		$objSystemSms->setCommunicationStatusId(1);

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objSystemSms->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}
				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success' ) );
		}

	}

	public function showEmailPopup() {

		$intLeadId = $this->input->post('lead_id');
		$intUserId = $this->input->post('user_id');

		$data['email_templates'] = CEmailTemplates::fetchAllActiveEmailTemplates( $this->db );
		$data['lead'] = CLeads::fetchLeadNamesByLeadId( $intLeadId, $this->db );

		$this->load->view( 'admin/view_send_email', $data );
	}

	public function sendEmail() {

		$objSystemEmail = new CSystemEmail();

		$objSystemEmail->applyRequestForm( $this->input->post( 'broadcast' ), $this->_arrstrSystemEmailFields );

		$objSystemEmail->setEmailFrom('Admin');
		$objSystemEmail->setCommunicationStatusId(1);

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objSystemEmail->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}
				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success' ) );
		}
	}

	public function showBulkSMSPopup() {

		$arrintUserIds = $this->input->post('broadcast')['user_ids'];

		$data['sms_templates'] = CSmsTemplates::fetchAllActiveSmsTemplates( $this->db );
		$data['leads'] = CLeads::fetchLeadNamesByUserIds( $arrintUserIds, $this->db );

		$this->load->view( 'admin/view_bulk_send_sms', $data );
	}

}