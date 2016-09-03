<?php

class CCommunicationLibrary extends CBaseLibrary {
	
	public $intCommunicationTypeId;
	public $objSenderLead;
	public $objReceiverLead;

	public $objDatabase;

	const COM_TYPE_STUDENT_TRAINER_SI = 1;

	public function setSenderLead( $objSenderLead ) {
		$this->objSenderLead = $objSenderLead;
	}

	public function setReceiverLead( $objReceiverLead ) {
		$this->objReceiverLead = $objReceiverLead;
	}

	public function setDatabase( $objDatabase ) {
		$this->objDatabase = $objDatabase;
	}

	public function showInterest() {

		$objUserSms = new CUserSms();
		$objUserSms->setSmsTypeId( CSmsType::SHOW_INTEREST );
		$objUserSms->setDatabase( $this->objDatabase );
		$objUserSms->setSenderLead( $this->objSenderLead );
		$objUserSms->setReceiverLead( $this->objReceiverLead );
		$objSystemSms = $objUserSms->getSms();

		//$objSystemSms->intCommunicationTypeId = $this->intCommunicationTypeId;

		switch( true ) {
			default:
				if( false == $objSystemSms->insert() ) {
					break;
				}
				$this->arrstrSuccessMsgs[] = 'Message is been sent to trainer.';
				return true;
		}
		
		$this->arrstrErrorMsgs[] = 'Message system is under maintainance. Please try later.';
		return false;
	}
}
?>