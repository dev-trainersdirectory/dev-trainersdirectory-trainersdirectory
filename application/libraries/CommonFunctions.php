<?php

class CommonFunctions {
	public function cast( $objResult, $objStandardClass ) {
        if( is_array( $objStandardClass ) || is_object( $objStandardClass ) ) {
            foreach( $objStandardClass as $key => $value ) {
                $objResult->$key = $value;
            }
        }
        return $objResult;
    }

    public function fetchData( $strSQL, $database ) {

    }

    public function storeImage( $arrMixImageData ) {

		$objCI =& get_instance();
		$arrMixReturnData = array( 'result' => true, 'displayMessage' =>  );
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
}

 	
?>