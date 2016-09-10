<?php

class COtps extends CEosPlural {
	
	function __construct() {
		parent::__construct();
	}

	public function fetchOtps( $strSQL, $objDatabase ) {
		return self::fetchObjects( 'COtp', $strSQL, $objDatabase );
	}

	public function fetchOtp( $strSQL, $objDatabase ) {
		return self::fetchObject( 'COtp', $strSQL, $objDatabase );
	}

	public static function fetchAllPublishedOtps( $objDatabase ) {
		$strSQL = 'SELECT * FROM otps';

		return self::fetchOtps( $strSQL, $objDatabase );
	}

	public static function fetchOtpByMobileNumber( $strContactNumber, $strOtp, $objDatabase ) {

		if( false == isset( $strContactNumber ) || false == isset( $strOtp ) ) return false;

		$strSQL = ' SELECT
						*
					FROM
						otps
					WHERE
						contact_number = ' . $strContactNumber .'
						AND otp = ' . $strOtp . '
						AND expires_on > \'' . getCurrentDateTime( $objDatabase ) . '\'
						ORDER BY sent_on DESC';

		return self::fetchOtp( $strSQL, $objDatabase );
	}
}

?>