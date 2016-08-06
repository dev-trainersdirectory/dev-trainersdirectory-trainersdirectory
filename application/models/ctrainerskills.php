<?php

class CTrainerSkills extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchTrainerSkills( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'CTrainerSkill', $strSQL, $objDatabase );
	}

	public function fetchTrainerSkill( $strSQL, $objDatabase ) {
		return self::fetchObject( 'CTrainerSkill', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedTrainerSkills( $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_skills';

		return self::fetchTrainerSkills( $strSQL, $objDatabase );
	}

	public static function fetchTrainerSkillsByTrainerId( $intTrainerId, $objDatabase ) {
		$strSQL = 'SELECT * FROM trainer_skills WHERE trainer_id = ' . (int) $intTrainerId;

		return self::fetchTrainerSkills( $strSQL, $objDatabase );
	}

}

?>