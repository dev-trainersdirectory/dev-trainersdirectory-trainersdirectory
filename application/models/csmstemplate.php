<?php

class CSmsTemplate extends CEosSingular {

	public $intId;
	public $intSmsTypeId;
	public $strContent;
	public $boolIsActive;
	
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

	public function validate( $strAction ) {

		$boolResult = true;

		switch ( $strAction ) {
			
			default:
				return true;
				break;
		}

		return $boolResult;
	}

	public function insert() {

		$arrStrInsertData = array(
								'sms_type_id' 	=> $this->intSmsTypeId,
								'content' 		=> $this->strContent,
								'is_active' 	=> $this->boolIsActive,
							);

		if( false == $this->db->insert( 'sms_templates', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->intSmsTypeId ) ) $arrStrUpdateData['sms_type_id'] 		= $this->intSmsTypeId;
		if( false == is_null( $this->strContent ) ) $arrStrUpdateData['content'] 	= $this->strContent;
		if( false == is_null( $this->boolIsActive ) ) $arrStrUpdateData['is_active'] = $this->boolIsActive;

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