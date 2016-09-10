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

	public function generateOPT() {

		$arrmixData['OTP'] = rand(0000,9999);

		$objOtp = new COtp();
		$objOtp->setContactNumber( $this->objReceiverLead->getContactNumber() );
		$objOtp->setOtp( $arrmixData['OTP'] );


		$objUserSms = new CUserSms();
		$objUserSms->setSmsTypeId( CSmsType::OTP );
		$objUserSms->setDatabase( $this->objDatabase );
		$objUserSms->setSenderLead( $this->objSenderLead );
		$objUserSms->setReceiverLead( $this->objReceiverLead );
		$objUserSms->setData( $arrmixData );
		$objSystemSms = $objUserSms->getSms();

		switch( true ) {
			default:
				if( false == $objSystemSms->insert() ) {
					break;
				}

				if( false == $objOtp->insert() ) {
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