<?php

class CCommunicationLibrary extends CBaseLibrary {
	
	public $intCommunicationTypeId;
	public $intTrainerId;
	public $intStudentId;
	public $intUserId;

	const COM_TYPE_STUDENT_TRAINER_SI = 1;

	public function showInterest() {

		$objSystemSms = new CSystemSms();
		$objSystemSms->intCommunicationTypeId = $this->intCommunicationTypeId;

		switch( true ) {
			default:
				if( false == $objSystemSms->insert( $this->intUserId ) ) {
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