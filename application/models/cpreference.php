<?php

class CPreference extends CEosSingular {
	
	public $intId;
	public $strTitle;
	public $strDescription;
	public $strCreatedBy;
	public $strCreatedon;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'title', $arrstrRequestData ) )
			$this->setTitle( $arrstrRequestData['title'] );

		if( true == array_key_exists( 'description', $arrstrRequestData ) )
			$this->setDescription( $arrstrRequestData['description'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );
		
		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );

	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setTitle( $strTitle ) {
		$this->strTitle = $strTitle;
	}

	public function setDescription( $strDescription ) {
		$this->strDescription = $strDescription;
	}

	public function setCreatedBy( $strCreatedBy ) {
		$this->strCreatedBy = $strCreatedBy;
	}

	public function setCreatedon( $strCreatedon ) {
		$this->strCreatedon = $strCreatedon;
	}

	public function getId() {
		return $this->intId;
	}

	public function getTitle() {
		return $this->strTitle;
	}

	public function getDescription() {
		return $this->strDescription;
	}

	public function getCreatedBy() {
		return $this->strCreatedBy;
	}

	public function getCreatedon() {
		return $this->strCreatedon;
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
								'id'			=> $this->getNextId( 'sq_preferences', $this->db ),
								'title' 		=> $this->strTitle,
								'description' 	=> $this->strDescription,
								'created_by' 	=> $this->strCreatedBy,
								'created_on' 	=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'preferences', $arrStrInsertData ) ) return false;

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		if( false == is_null( $this->strTitle )) $arrStrUpdateData['title'] = $this->strTitle;
		if( false == is_null( $this->strDescription )) $arrStrUpdateData['description'] = $this->strDescription;
		if( false == is_null( $this->strCreatedBy )) $arrStrUpdateData['created_by'] = $this->strCreatedBy;
		
		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'preferences', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->delete( 'preferences' ) ) return false;

		return true;
	}
	
}

?>