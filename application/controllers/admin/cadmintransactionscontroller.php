<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminTransactionsController extends CAdminSystemController {

	public $_arrstrVideosImagesFields = array( 
		'id' => NULL,
		'trainer_id' => NULL,
		'trainer_skill_id' => NULL,
		'vidw_link' => NULL,
		'is_published' => NULL
		);

	public function index() {

		$arrobjTransactionTypes = CTransactionTypes::fetchAllTransactionTypes( $this->db );
		$arrobjTransactionCosts = CTransactionCosts::fetchAllTransactionCosts( $this->db );

		$data['transaction_types'] = $arrobjTransactionTypes;
		$data['transaction_costs'] = $arrobjTransactionCosts;

		$this->load->view( 'admin/view_transaction_costs', $data );
	}

	public function updateTransactionCosts() {

		$intTransactionCostId = $this->input->post( 'transaction_cost_id' );
		$objTransactionCost = CTransactionCosts::fetchTransactionCostById( $intTransactionCostId, $this->db );

		$objTransactionCost->setCoins( $this->input->post( 'coin' ) );
		$objTransactionCost->setId( $intTransactionCostId );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objTransactionCost->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Cost updated.' ) );
		}
	}

}
