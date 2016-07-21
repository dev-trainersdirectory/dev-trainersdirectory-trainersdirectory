<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminCoinTransactionsController extends CAdminSystemController {

	public $_arrstrCoinTransactionFields = array( 
		'id' => NULL,
		'lead_id' => NULL,
		'credit' => NULL,
		'debit' => NULL,
		'purchased_lead_id' => NULL,
		'remark' => NULL,
		'status' => NULL,
		'coin_transaction_id' => NULL
		);

	public function index() {

		$arrobjCoinTransactions = CCoinTransactions::fetchAllCoinTransactions( $this->db );
		$arrobjCoinTransactions = rekeyObjects( 'LeadId', $arrobjCoinTransactions);

		$arrobjLeads = CLeads::fetchLeadNamesByLeadIds( array_keys( $arrobjCoinTransactions ), $this->db );

		$data['coin_transactions'] = $arrobjCoinTransactions;
		$data['leads'] = $arrobjLeads;

		$this->load->view( 'admin/view_coin_transaction', $data );
	}

	public function addCoins() {

		$objCoinTransaction = new CCoinTransaction();
		$arrobjLeads = CLeads::fetchAllLeads( $this->db );
		
		$data['coin_transaction'] = $objCoinTransaction;
		$data['leads'] = $arrobjLeads;

		$this->load->view( 'admin/edit_coin_transaction', $data );
	}

	public function insertCoins() {

		$objCoinTransaction = new CCoinTransaction();

		$objCoinTransaction->applyRequestForm( $this->input->post( 'coin_transaction' ), $this->_arrstrCoinTransactionFields );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objCoinTransaction->insert( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Coins added.' ) );
		}
	}

}
