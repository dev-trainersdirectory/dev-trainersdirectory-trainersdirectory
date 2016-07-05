<?php

	function cast( $objResult, $objStandardClass ) {
        if( is_array( $objStandardClass ) || is_object( $objStandardClass ) ) {
            foreach( $objStandardClass as $key => $value ) {
                $objResult->$key = $value;
            }
        }
        return $objResult;
    }

    function fetchData( $strSQL, $database ) {

    }

    function compressImage( $strSourcePath, $strDestinationPath ) {

		$objCI =& get_instance();
		$arrMixReturnData = array( 'result' => true, 'displayMessage' => '' );

		$arrMixResizeImage = array( 
								'image_library' => 'gd2',
								'source_image' => $strSourcePath,
								'new_image' => $strDestinationPath,
								'maintain_ratio' => TRUE,
								'width' => 180,
								'height' => 170,
								'quality' => 60
								);
		
		$objCI->load->library( 'image_lib', $arrMixResizeImage );
		
		if ( false == $objCI->image_lib->resize()) {
			return false;
		}

		return true;
    }

	function display($arrvalue ) {
		print_r('<pre>');
		print_r($arrvalue);
    }

    function show($arrvalue ) {
		print_r('<pre>');
		print_r($arrvalue);
		die;
    }

    function valArr( $arrmixValue ) {
		if( true == is_array( $arrmixValue ) && 0 < count( $arrmixValue ) ) return true;
		return false;
    }

    function rekeyObjects( $strKeyFieldName, $arrobjUnkeyedData, $boolHasMultipleObjectsWithSameKey = false, $boolExcludeNulls = false ) {

	    if( false == valArr( $arrobjUnkeyedData ) ) return $arrobjUnkeyedData;

	    $arrobjRekeyedData = array();

	    if( 'index' != $strKeyFieldName ) {
	        $strGetFunction = 'get' . $strKeyFieldName;

	        foreach( $arrobjUnkeyedData as $objUnkeyedData ) {
	            if( true == is_null( $objUnkeyedData->$strGetFunction() ) && true == $boolExcludeNulls ) continue;
	            if( true == $boolHasMultipleObjectsWithSameKey ) {
	                $arrobjRekeyedData[$objUnkeyedData->$strGetFunction()][] = $objUnkeyedData;
	            } else {
	                $arrobjRekeyedData[$objUnkeyedData->$strGetFunction()] = $objUnkeyedData;
	            }
	        }

	    } else {
	        foreach( $arrobjUnkeyedData as $objUnkeyedData ) {
	            $arrobjRekeyedData[] = $objUnkeyedData;
	        }
	    }

	    return $arrobjRekeyedData;
	}

	function rekeyArray( $strKeyFieldName, $arrmixUnkeyedData, $boolMakeKeyLowerCase = false, $boolHasMultipleArraysWithSameKey = false, $boolExcludeNulls = false ) {
	    if( false == valArr( $arrmixUnkeyedData ) ) return $arrmixUnkeyedData;

	    $arrmixRekeyedData = array();

	    if( 'index' != $strKeyFieldName ) {
	        foreach( $arrmixUnkeyedData as $arrmixUnkeyedData ) {
	            if( true == is_null( $arrmixUnkeyedData[$strKeyFieldName] ) && true == $boolExcludeNulls ) continue;
	            if( true == $boolHasMultipleArraysWithSameKey ) {
	                $strKey = ( true == $boolMakeKeyLowerCase ) ? strtolower( trim( $arrmixUnkeyedData[$strKeyFieldName] ) ) : trim( $arrmixUnkeyedData[$strKeyFieldName] );
	                $arrmixRekeyedData[$strKey][] = $arrmixUnkeyedData;
	            } else {

	            if( false == isset ( $arrmixUnkeyedData[$strKeyFieldName] ) ) {
	                $strKey = '';
	            } else {
	                $strKey = ( true == $boolMakeKeyLowerCase ) ? strtolower( trim( $arrmixUnkeyedData[$strKeyFieldName] ) ) : trim( $arrmixUnkeyedData[$strKeyFieldName] );
	            }

	                $arrmixRekeyedData[$strKey] = $arrmixUnkeyedData;
	            }
	        }
	    } else {

	        foreach( $arrmixUnkeyedData as $arrmixUnkeyedData ) {
	            $arrmixRekeyedData[] = $arrmixUnkeyedData;
	        }
	    }

	    return $arrmixRekeyedData;
	}

 	
?>