<?php

class CUserSms extends CBaseLibrary {

	protected $objSender;
	protected $objReceiver;
	protected $objDatabase;

	protected $arrmixData;

	protected $intSmsTypeId;

	public function setSender( $objSender ) {
		$this->objSender = $objSender;
	}

	public function setReceiver( $objReceiver ) {
		$this->objReceiver = $objReceiver;
	}

	public function setDatabase( $objDatabase ) {
		$this->objDatabase = $objDatabase;
	}

	public function setSmsTypeId( $intSmsTypeId ) {
		$this->intSmsTypeId = $intSmsTypeId;
	}

	public function setData( $arrmixData ) {
		$this->arrmixData = $arrmixData;
	}

	public function getSms() {

		$objSmsTemplate = CSmsTemplates::fetchActiveSmsTemplateBySmsTypeId( $this->intSmsTypeId, $this->objDatabase );
	
		if( false == valobj( $objSmsTemplate, 'CSmsTemplate' ) ) return false;

		$objSystemSMS = new CSystemSMS();
		$objSystemSMS->setSmsTypeId( $this->intSmsTypeId );
		$objSystemSMS->setSmsTemplateId( $objSmsTemplate->getId() );
		$objSystemSMS->setSendTo( $this->objSender->getContactNumber() );
		$objSystemSMS->setSendFrom( "TrainD" );
		$objSystemSMS->setSubject( $objSmsTemplate->getName() );
		$objSystemSMS->setContent( $this->getSmsText( $objSmsTemplate ) );

		return $objSystemSMS;
	}

	public function getSmsText( $objSmsTemplate ) {
		$arrstrMappedMergeFields = $this->getMappedMergeFields();
		$search = array_keys($arrstrMappedMergeFields);

		$strMessage = str_replace( $search, $arrstrMappedMergeFields , $objSmsTemplate->getContent() );
		return $strMessage;
	}

	public function getMappedMergeFields() {
		$arrobjMergeFields = ( array ) CMergeFields::fetchMergeFields( $this->objDatabase );
		
		$arrstrMappedMergeFields = array();

		foreach( $arrobjMergeFields as $objMergeField ) {
			$strValue = '';
			switch( $objMergeField->getName() ) {

				case 'RECEIPIENT' :
					$strValue = $this->objReceiver->getFullName();
					break;

				case 'OTP' :
					if( true == array_key_exists( 'OTP', $this->arrmixData ) ) 
						$strValue = $this->arrmixData['OTP'];
					break;

				case 'LEAD' :
					$strValue = $this->objSender->getFullName();
					break;

				case 'URL' :
					$strValue = $this->arrmixData['viewslug'];
					break;

				case 'LEAD_MOBILE_NUMBER' :
					$strValue = $this->objSender->getContactNumber();
					break;

				default:
					break;
			}

			$arrstrMappedMergeFields[$objMergeField->getName()] = $strValue;
		}

		return $arrstrMappedMergeFields;
	}
}
?>