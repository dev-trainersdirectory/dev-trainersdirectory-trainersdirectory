<?php

class CSmsTemplate extends CEosSingular {

	public $intId;
	public $intSmsTypeId;
	public $strContent;
	public $boolIsActive;

	public $strSmsType;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'sms_type_id', $arrstrRequestData ) )
			$this->setSmsTypeId( $arrstrRequestData['sms_type_id'] );

		if( true == array_key_exists( 'content', $arrstrRequestData ) )
			$this->setContent( $arrstrRequestData['content'] );
		
		if( true == array_key_exists( 'is_active', $arrstrRequestData ) )
			$this->setIsActive( $arrstrRequestData['is_active'] );

		if( true == array_key_exists( 'sms_type', $arrstrRequestData ) )
			$this->setSmsType( $arrstrRequestData['sms_type'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setSmsTypeId( $intSmsTypeId ) {
		$this->intSmsTypeId = $intSmsTypeId;
	}

	public function setContent( $strContent ) {
		$this->strContent = $strContent;
	}

	public function setIsActive( $boolIsActive ) {
		$this->boolIsActive = $boolIsActive;
	}

	public function setSmsType( $strSmsType ) {
		$this->strSmsType = $strSmsType;
	}

	public function getId() {
		return $this->intId;;
	}

	public function getSmsTypeId() {
		return $this->intSmsTypeId;
	}

	public function getContent() {
		return $this->strContent;
	}

	public function getIsActive() {
		return $this->boolIsActive;
	}

	public function getSmsType() {
		return $this->strSmsType;
	}

	public function validate( $strAction, $objDatabase ) {

		$boolResult = true;

		switch ( $strAction ) {
			
			case 'insert':
			case 'update':
				//$intCount = CSmsTemplates::fetchActiveSmsTemplateCountBySmsTypeId( $objDatabase );
				//if( $intCount > 0 ) $boolResult = false;
				break;

			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function insert() {

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_sms_templates', $this->db );
		}
		$arrStrInsertData = array(
								'id'			=> $this->intId,
								'sms_type_id' 	=> $this->intSmsTypeId,
								'content' 		=> $this->strContent,
								'is_active' 	=> $this->boolIsActive,
							);

		if( false == $this->db->insert( 'sms_templates', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['sms_type_id'] 	= $this->intSmsTypeId;
		$arrStrUpdateData['content'] 		= $this->strContent;
		$arrStrUpdateData['is_active'] 		= $this->boolIsActive;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'sms_templates', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'sms_templates' ) ) return false;

		return true;
	}
	
}

?>