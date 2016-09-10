<?php

class CUserSms extends CBaseLibrary {

	protected $objSenderLead;
	protected $objReceiverLead;
	protected $objDatabase;

	protected $arrmixData;

	protected $intSmsTypeId;

	public function setSenderLead( $objSenderLead ) {
		$this->objSenderLead = $objSenderLead;
	}

	public function setReceiverLead( $objReceiverLead ) {
		$this->objReceiverLead = $objReceiverLead;
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
		$objSystemSMS->setSendTo( $this->objReceiverLead->getContactNumber() );
		$objSystemSMS->setSentFrom( "TrainD" );
		//$objSystemSMS->setSubject( $objSmsTemplate->getName() );
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
		$arrobjMergeFields = ( array ) CMergeFields::fetchAllMergeFields( $this->objDatabase );
		
		$arrstrMappedMergeFields = array();

		foreach( $arrobjMergeFields as $objMergeField ) {
			$strValue = '';
			switch( $objMergeField->getName() ) {

				case '{RECEIPIENT}' :
					$strValue = '' != trim($this->objReceiverLead->getFullName()) ? $this->objReceiverLead->getFullName() : 'User';
					break;

				case '{OTP}' :
					if( false == valArr( $this->arrmixData ) ) break;
					if( true == array_key_exists( 'OTP', $this->arrmixData ) ) 
						$strValue = $this->arrmixData['OTP'];
					break;

				case '{LEAD}' :
					$strValue = $this->objSenderLead->getFullName();
					break;

				case '{URL}' :
					if( false == valArr( $this->arrmixData ) ) break;
					$strValue = $this->arrmixData['viewslug'];
					break;

				case '{LEAD_MOBILE_NUMBER}' :
					$strValue = $this->objSenderLead->getContactNumber();
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