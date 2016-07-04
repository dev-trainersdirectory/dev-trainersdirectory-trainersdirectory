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

    function storeImage( $arrMixImageData ) {

		$objCI =& get_instance();
		$arrMixReturnData = array( 'result' => true, 'displayMessage' => '' );
		$strOriginalImagePath = '/public/images/original_images/';
		$strThumbImagePath = '/public/images/thumb_images/thumb_';
    	
		//Upload image
		$strFileName = $arrMixImageData['input_img']['name'];
	  	$strFileSize = $arrMixImageData['input_img']['size'];
	  	$strFileTmp = $arrMixImageData['input_img']['tmp_name'];

	  	if ( false == move_uploaded_file( $strFileTmp, getcwd() . $strOriginalImagePath . $strFileName ) ) {
			$arrMixReturnData['result'] = false;
			$arrMixReturnData['displayMessage'] = 'Unable to upload file';
	  	}
		
		//Resize image
		$arrMixResizeImage = array( 
								'image_library' => 'gd2',
								'source_image' => getcwd() . $strOriginalImagePath . $strFileName,
								'new_image' => getcwd() . $strThumbImagePath . $strFileName,
								'maintain_ratio' => TRUE,
								'width' => 180,
								'height' => 170,
								'quality' => 60
								);
		
		$objCI->load->library( 'image_lib', $arrMixResizeImage );
		
		if ( false == $objCI->image_lib->resize()) {
			$arrMixReturnData['result'] = false;
			$arrMixReturnData['displayMessage'] = $objCI->image_lib->display_errors();
		}

		return $arrMixReturnData;
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