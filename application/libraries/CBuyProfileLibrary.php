<?php

class CBuyProfileLibrary extends CBaseLibrary {
	
	public $intCommunicationTypeId;
	public $intUserId;
	public $intBoughtUserId;
	public $intTransactionTypeId;

	public $objDatabase;

	public function buyProfile() {

		$objTransactionCost = CTransactionCosts::fetchTransactionCostByTransactionTypeId( $this->intTransactionTypeId, $this->objDatabase );

		if( NULL == $objTransactionCost ) {
			return false;
		}

		$objLead = CLeads::fetchLeadByUserId( $this->intUserId );
		$objPurchasedUser = new CPurchasedUser();
		$objPurchasedUser->intUserId = $this->intUserId;
		$objPurchasedUser->intBoughtUserId = $this->intBoughtUserId;

		$objCoinTransaction = new CCoinTransaction();
		$objCoinTransaction->intUserId = $this->intUserId;
		$objCoinTransaction->intDebit = (int) $objTransactionCost->getCoins();
		$objCoinTransaction->intStatus = CCoinTransaction::STATUS_APPROVED;
		$objCoinTransaction->strRemark = 'You bought ' . $arrobjLeads[$this->intBoughtLeadId]->getName() . ' for ' . $objTransactionCost->getCoins() . ' coins.';

		$intCoins = ( int ) $objLead->getCoins() - (int) $objTransactionCost->getCoins();
		$objLead->setCoins( $intCoins );

		switch( true ) {
			default:
				if( false == $objPurchasedLead->insert() ) {
					$this->arrstrSuccessMsgs[] = 'Failed to buy profile.';
					break;
				}
				
				if( false == $objCoinTransaction->insert() ) {
					$this->arrstrSuccessMsgs[] = 'Failed to complete coin transaction.';
				}

				if( false == $objLead->update() ) {
					$this->arrstrSuccessMsgs[] = 'Failed to update user coins.';
				}

				$this->arrstrSuccessMsgs[] = 'Bought profile successfully.';
				return true;
		}
		
		$this->arrstrErrorMsgs[] = 'Message system is under maintainance. Please try later.';
		return false;
	}
}
?>