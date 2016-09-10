<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/csystemcontroller.php' );

class CRechargeController extends CSystemController {

	public function index() {

		//$intUserId = get userId from session
		//get Other data i.e. Amount from post/request data


		$objCoinTransaction = new CCoinTransaction();
		$objCoinTransaction->setUserId( $intUserId );
		$objCoinTransaction->setCredit();
		$objCoinTransaction->setStatus( CCoinTransaction::STATUS_PENDING );

		if( false == $objCoinTransaction->insert() ) {
			echo 'Failed to process payment'; exit;
		}

		$data = array();
		$data['action'] = 'https://secure.payu.in/_payment';
		$data['success_url'] = base_url() . 'recharge/success/' . $intUserId . '/' . $objCoinTransaction->getId() . '/' . $returnUrl;
		$this->load->view('recharge_redirect', $data);
	}

	public function success( $intUserId, $intTransactionId, $returnUrl ) {
		
		$objCoinTransaction = CCoinTransactions::fetchCoinTransactionByIdByUserId( $intTransactionId, $intUserId, $this->db );

		if( NULL == $objCoinTransaction ) {
			echo 'Incorrect data passed.';exit;
		}

		$objCoinTransaction->setStatus( CCoinTransaction::STATUS_APPROVED );
		$objLead = CLeads::fetchLeadByUserId( $intUserId, $this->db );
		$intCoins = (int) $objLead->getCoins() + (int) $objCoinTransaction->getCredit();
		$objLead->setCoins( $intCoins );

		switch( true ) {
			default:
				if( false == $objCoinTransaction->update() ) {
					break;
				}

				if( false == $objLead->update() ) {
					break;
				}

				header( $returnUrl );
				exit;
		}

		echo 'Failed to process payment';exit;
	}


}
