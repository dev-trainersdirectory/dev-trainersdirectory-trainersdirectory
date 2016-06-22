<?php

class CBuyProfileLibrary extends CBaseLibrary {
	
	public $intCommunicationTypeId;
	public $intTrainerId;
	public $intStudentId;
	public $intUserId;

	const PROFILE_DEBIT = 50;
	public function buyProfile() {

		$arrobjLeads = ( array ) CLeads::fetchLeadByIds( array( $this->intBuyerLeadId, $this->intBoughtLeadId ) );
		$objPurchasedLead = new CPurchasedLead();
		$objPurchasedLead->intLeadId = $this->intBuyerLeadId;
		$objPurchasedLead->intBoughtLeadId = $this->intBoughtLeadId;

		$objCoinTransaction = new CCoinTransaction();
		$objCoinTransaction->intUserId = $this->intBuyerLeadId;
		$objCoinTransaction->intDebit = self::PROFILE_DEBIT;
		$objCoinTransaction->strRemark = 'You bought ' . $arrobjLeads[$this->intBoughtLeadId]->getName() . ' for 50 coins.';

		switch( true ) {
			default:
				if( false == $objPurchasedLead->insert() ) {
					$this->arrstrSuccessMsgs[] = 'Failed to buy profile.';
					break;
				}
				
				if( false == $objCoinTransaction->insert() ) {
					$this->arrstrSuccessMsgs[] = 'Failed to complete coin transaction.';
				}

				$this->arrstrSuccessMsgs[] = 'Bought profile successfully.';
				return true;
		}
		
		$this->arrstrErrorMsgs[] = 'Message system is under maintainance. Please try later.';
		return false;
	}
}
?>