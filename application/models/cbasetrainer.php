<?php

class CBaseTrainer extends CEosSingular {

	public $intId;
	public $intLeadId;
	public $intUserId;
	public $strDescription;
	public $intProfileStepId;
	public $boolIsPaidProfile;
	public $strCompletedOn;
	public $floatExperience;
	public $boolHasTaughtInSchoolColleges;
	public $boolHasVehicle;
	public $floatMinRate;
	public $floatMaxRate;
	public $intAvailableDayId;
	public $intAvailableStartTimeId;
	public $intAvailableEndTimeId;
	public $strQualities;
	public $intViews;
	public $intDeletedBy;
	public $strDeletedOn;
	public $intCreatedBy;
	public $strCreatedOn;
	
	function __construct() {
		parent::__construct();
	}

	public function assignData( $arrstrRequestData ) {

		if( false == is_array( $arrstrRequestData ) ) return false;

		if( true == array_key_exists( 'id', $arrstrRequestData ) )
			$this->setId( $arrstrRequestData['id'] );

		if( true == array_key_exists( 'lead_id', $arrstrRequestData ) )
			$this->setLeadId( $arrstrRequestData['lead_id'] );

		if( true == array_key_exists( 'user_id', $arrstrRequestData ) )
			$this->setUserId( $arrstrRequestData['user_id'] );

		if( true == array_key_exists( 'description', $arrstrRequestData ) )
			$this->setDescription( $arrstrRequestData['description'] );

		if( true == array_key_exists( 'profile_step_id', $arrstrRequestData ) )
			$this->setProfileStepId( $arrstrRequestData['profile_step_id'] );

		if( true == array_key_exists( 'is_paid_profile', $arrstrRequestData ) )
			$this->setIsPaidProfile( $arrstrRequestData['is_paid_profile'] );

		if( true == array_key_exists( 'completed_on', $arrstrRequestData ) )
			$this->setCompletedOn( $arrstrRequestData['completed_on'] );

		if( true == array_key_exists( 'experience', $arrstrRequestData ) )
			$this->setExperience( $arrstrRequestData['experience'] );

		if( true == array_key_exists( 'has_taught_in_school_colleges', $arrstrRequestData ) )
			$this->setHasTaughtInSchoolColleges( $arrstrRequestData['has_taught_in_school_colleges'] );

		if( true == array_key_exists( 'has_vehicle', $arrstrRequestData ) )
			$this->setHasVehicle( $arrstrRequestData['has_vehicle'] );
		
		if( true == array_key_exists( 'min_rate', $arrstrRequestData ) )
			$this->setMinRate( $arrstrRequestData['min_rate'] );
		
		if( true == array_key_exists( 'max_rate', $arrstrRequestData ) )
			$this->setMaxRate( $arrstrRequestData['max_rate'] );
		
		if( true == array_key_exists( 'available_day_id', $arrstrRequestData ) )
			$this->setAvailableDayId( $arrstrRequestData['available_day_id'] );
		
		if( true == array_key_exists( 'available_start_time_id', $arrstrRequestData ) )
			$this->setAvailableStartTimeId( $arrstrRequestData['available_start_time_id'] );

		if( true == array_key_exists( 'qualities', $arrstrRequestData ) )
			$this->setQualities( $arrstrRequestData['qualities'] );

		if( true == array_key_exists( 'views', $arrstrRequestData ) )
			$this->setViews( $arrstrRequestData['views'] );

		if( true == array_key_exists( 'deleted_by', $arrstrRequestData ) )
			$this->setDeletedBy( $arrstrRequestData['deleted_by'] );

		if( true == array_key_exists( 'deleted_on', $arrstrRequestData ) )
			$this->setDeletedOn( $arrstrRequestData['created_on'] );

		if( true == array_key_exists( 'created_by', $arrstrRequestData ) )
			$this->setCreatedBy( $arrstrRequestData['created_by'] );

		if( true == array_key_exists( 'created_on', $arrstrRequestData ) )
			$this->setCreatedOn( $arrstrRequestData['created_on'] );
		
	}

	public function setId( $intId ) {
		$this->intId = $intId;
	}

	public function setLeadId( $intLeadId ) {
		$this->intLeadId = $intLeadId;
	}

	public function setUserId( $intUserId ) {
		$this->intUserId = $intUserId;
	}

	public function setIsPaidProfile( $boolIsPaidProfile ) {
		$this->boolIsPaidProfile = $boolIsPaidProfile;	
	}

	public function setDescription( $strDescription ) {
		$this->strDescription = $strDescription;
	}

	public function setProfileStepId( $intProfileStepId ) {
		$this->intProfileStepId = $intProfileStepId;
	}

	public function setCompletedOn( $strCompletedOn ) {
		$this->strCompletedOn = $strCompletedOn;
	}

	public function setExperience( $floatExperience ) {
		$this->floatExperience = $floatExperience;
	}

	public function setHasTaughtInSchoolColleges( $boolHasTaughtInSchoolColleges ) {
		$this->boolHasTaughtInSchoolColleges = $boolHasTaughtInSchoolColleges;
	}

	public function setHasVehicle( $boolHasVehicle ) {
		$this->boolHasVehicle = $boolHasVehicle;
	}

	public function setMinRate( $floatMinRate ) {
		$this->floatMinRate = $floatMinRate;
	}

	public function setMaxRate( $floatMaxRate ) {
		$this->floatMaxRate = $floatMaxRate;
	}

	public function setAvailableDayId( $intAvailableDayId ) {
		$this->intAvailableDayId = $intAvailableDayId;
	}

	public function setAvailableStartTimeId( $intAvailableStartTimeId ) {
		$this->intAvailableStartTimeId = $intAvailableStartTimeId;
	}

	public function setAvailableEndTimeId( $intAvailableEndTimeId ) {
		$this->intAvailableEndTimeId = $intAvailableEndTimeId;
	}

	public function setQualities( $strQualities ) {
		$this->strQualities = $strQualities;
	}

	public function setViews( $intViews ) {
		$this->intViews = $intViews;
	}

	public function setDeletedBy( $intDeletedBy ) {
		$this->intDeletedBy = $intDeletedBy;
	}

	public function setDeletedOn( $strDeletedOn ) {
		$this->strDeletedOn = $strDeletedOn;
	}

	public function setCreatedBy( $intCreatedBy ) {
		$this->intCreatedBy = $intCreatedBy;
	}

	public function setCreatedOn( $strCreatedOn ) {
		$this->strCreatedOn = $strCreatedOn;
	}

	public function getId() {
		return $this->intId;
	}

	public function getLeadId() {
		return $this->intLeadId;
	}

	public function getUserId() {
		return $this->intUserId;
	}

	public function getDescription(){
		return $this->strDescription;
	}

	public function getProfileStepId() {
		return $this->intProfileStepId;
	}

	public function getIsPaidProfile() {
		return $this->boolIsPaidProfile;	
	}

	public function getCompletedOn() {
		return $this->strCompletedOn;
	}

	public function getExperience() {
		return $this->floatExperience;
	}

	public function getVideoLink() {
		return $this->strVideoLink;
	}

	public function getHasTaughtInSchoolColleges() {
		return $this->boolHasTaughtInSchoolColleges;
	}

	public function getHasVehicle() {
		return $this->boolHasVehicle;
	}

	public function getMinRate() {
		return $this->floatMinRate;
	}

	public function getMaxRate() {
		return $this->floatMaxRate;
	}

	public function getAvailableDayId() {
		return $this->intAvailableDayId;
	}

	public function getAvailableStartTimeId() {
		return $this->intAvailableStartTimeId;
	}

	public function getAvailableEndTimeId() {
		return $this->intId;
	}

	public function getQualities() {
		return $this->strQualities;
	}

	public function getViews() {
		return $this->intViews;
	}

	public function getDeletedBy() {
		return $this->intDeletedBy;
	}

	public function getDeletedOn() {
		return $this->strDeletedOn;
	}

	public function getCreatedBy() {
		return $this->intCreatedBy;
	}

	public function getCreatedOn() {
		return $this->strCreatedOn;
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

		if( true == is_null( $this->intId ) ) {
			$this->intId = $this->getNextId( 'sq_trainers', $this->db );
		}
		$arrStrInsertData = array(
								'id'							=> $this->intId,
								'lead_id'						=> $this->intLeadId,
								'user_id'						=> $this->intUserId,
								'description'					=> $this->strDescription,
								'is_paid_profile'				=> $this->boolIsPaidProfile,
								'profile_step_id'				=> $this->intProfileStepId,
								'completed_on'					=> $this->strCompletedOn,
								'experience' 					=> $this->floatExperience,
								'has_taught_in_school_colleges'	=> $this->boolHasTaughtInSchoolColleges,
								'has_vehicle'					=> $this->boolHasVehicle,
								'min_rate'						=> $this->floatMinRate,
								'max_rate'						=> $this->floatMaxRate,
								'available_day_id'				=> $this->intAvailableDayId,
								'available_start_time_id'		=> $this->intAvailableStartTimeId,
								'available_end_time_id'			=> $this->intAvailableEndTimeId,
								'qualities'						=> $this->strQualities,
								'views'							=> $this->intViews,
								'deleted_by'					=> $this->intDeletedBy,
								'deleted_on'					=> $this->strDeletedOn,
								'created_by'					=> $this->intCreatedBy,
								'created_on'					=> getCurrentDateTime( $this->db )
							);

		if( false == $this->db->insert( 'trainers', $arrStrInsertData ) ) return false;

		$this->setId( $this->db->insert_id() );

		return true;
	}

	public function update() {

		$arrStrUpdateData = array();

		$arrStrUpdateData['lead_id'] = $this->intLeadId;
		$arrStrUpdateData['user_id'] = $this->intUserId;
		$arrStrUpdateData['description'] = $this->strDescription;
		$arrStrUpdateData['profile_step_id'] = $this->intProfileStepId;
		$arrStrUpdateData['is_paid_profile'] = $this->boolIsPaidProfile;
		$arrStrUpdateData['completed_on'] = $this->strCompletedOn;
		$arrStrUpdateData['experience'] = $this->floatExperience;
		$arrStrUpdateData['has_taught_in_school_colleges'] = $this->boolHasTaughtInSchoolColleges;
		$arrStrUpdateData['has_vehicle'] = $this->boolHasVehicle;
		$arrStrUpdateData['min_rate'] = $this->floatMinRate;
		$arrStrUpdateData['max_rate'] = $this->floatMaxRate;
		$arrStrUpdateData['available_day_id'] = $this->intAvailableDayId;
		$arrStrUpdateData['available_start_time_id'] = $this->intAvailableStartTimeId;
		$arrStrUpdateData['available_end_time_id'] = $this->intAvailableEndTimeId;
		$arrStrUpdateData['qualities'] = $this->strQualities;
		$arrStrUpdateData['views'] = $this->intViews;

		$this->db->where( 'id =', $this->intId );

		if( false == $this->db->update( 'trainers', $arrStrUpdateData ) ) return false;

		return true;
	}

	public function delete() {

		$arrStrUpdateData['deleted_by'] = $this->intDeletedBy;
		$arrStrUpdateData['deleted_on'] = getCurrentDateTime( $this->db );

		$this->db->where( 'id =', $this->intId );
 	
 		if( false == $this->db->update( 'trainers', $arrStrUpdateData ) ) return false;

		return true;
	}

}

?>