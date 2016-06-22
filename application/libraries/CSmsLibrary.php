<?php

class CSmsLibrary {

	const SMS_API_URL = "http://message.maharashtrainfosoft.com/api/sendhttp.php";
	const AUTHENTICATION_KEY = "3644AZmxwBWoF5587fc96";
	const ROUTE = "default";
	const COUNTRY_CODE = "91";
	const FLASH = "0";
	const UNICODE = "0";
	const RESPOSSE = "jason";
	const CAMPAIGN = "API";

	public $arrobjSystemSmses;
	public $arrstrSmsErrors;

    public function __construct()
    {
    }

    public function sendSms() {

    	foreach ( $tnis->arrobjSystemSmses as $objSyatemSms ) {

    		$arrstrApiPostData = array(
						'authkey'  => AUTHENTICATION_KEY,
						'mobiles'  => $objSyatemSms->intSendTo,
						'message'  => $objSyatemSms->strContent,
						'sender'   => $objSyatemSms->intSentFrom,
						'route'    => ROUTE,
						'country'  => COUNTRY_CODE,
						'flash'    => FLASH,
						'unicode'  => UNICODE,
						'response' => RESPOSSE,
						'campaign' => CAMPAIGN
					);
		
			$objSmsApi = curl_init();
		
			curl_setopt_array( $objSmsApi,
				array(
					CURLOPT_URL => ,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $arrstrApiPostData,
					CURLOPT_HEADER => false
				));
		
			curl_setopt( $objSmsApi, CURLOPT_SSL_VERIFYHOST, 0 );
			curl_setopt( $objSmsApi, CURLOPT_SSL_VERIFYPEER, 0 );
			 
			$objResponse = curl_exec( $objSmsApi );

			if( true == curl_errno( $objSmsApi ) ) {
				$this->arrstrSmsErrors[$objSmsApi] = curl_error( $objSmsApi );
			} else {
				$objSyatemSms->strDeliveredOn = 'NOW()';
			}

			curl_close( $objSmsApi );

    	}

    	$this->updateSystemSmses();
    }

    public function updateSystemSmses() {

    	foreach ( $tnis->arrobjSystemSmses as $objSyatemSms ) {
    		if( false == $objSyatemSms->update() ) {
    			return false;
    		}
    	}
    }
}

/* End of file CSmsLibrary.php */