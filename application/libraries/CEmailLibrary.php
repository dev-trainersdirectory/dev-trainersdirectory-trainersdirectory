<?php

class CEmailLibrary {

	const EMAIL_CONTENT_TYPE = "text/html; charset=UTF-8";
	const EMAIL_BODY_TYPE = "text/html";

	public $arrobjSystemEmails;

    public function __construct() {
    	$this->load->third_party( 'swiftmailer','swift_required.php' );
    }

    public function sendEmail() {

    	$this->objMailer 	= new Swift_Mailer( new Swift_MailTransport() );
    	$this->objMessage 	= new Swift_Message();

    	foreach ($this->arrobjSystemEmails as $objSystemEmail) {

			$this->objMessage->setSubject( $objSystemEmail->strEmailSubject );
			$this->objMessage->setTo( $objSystemEmail->strEmailTo );
			$this->objMessage->setFrom( $objSystemEmail->strEmailFrom );
			$this->objMessage->setContentType( EMAIL_CONTENT_TYPE )
			$this->objMessage->setBody( $objSystemEmail->strEmailBody, EMAIL_BODY_TYPE);

			if( true == $this->objMailer->send( $this->objMessage ) ) {
				$objSystemEmail->strDeliveredOn = 'NOW()';
			} 
    	}

    	return $this->updateSystemEmails();
    }

    public updateSystemEmails() {

    	foreach ($this->arrobjSystemEmails as $objSystemEmail) {

    		if( false == $objSystemEmail->update( array( 'delivered_on' ) ) ) {
    			return false;
    		}
    	}
        return true;
    }
}

/* End of file CEmailLibrary.php */