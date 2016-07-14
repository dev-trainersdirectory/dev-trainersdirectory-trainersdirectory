<?php if ( ! defined('BASEPATH') ) exit( 'No direct script access allowed' );
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminCategorySubjectsController extends CAdminSystemController {

	public $_arrstrCategoryFields = array(
		'id' => NULL,
		'parent_tr_category_id' => NULL,
		'name' => '',
		'description' => '',
		'is_published' => false
		);

	public $_arrstrUpdateCategoryFields = array(
		'id' => NULL,
		'parent_tr_category_id' => NULL,
		'name' => '',
		'is_published' => false
		);

	public function index() {

		$arrobjTrCategories = ( array ) CTrCategories::fetchAllPublishedTrCategories( $this->db ); 
		$arrobjTrSubjects	= ( array ) CTrSubjects::fetchAllPublishedSubjects( $this->db );
		
		foreach( $arrobjTrCategories as $objTrCategory ) {
			if( false == is_null( $objTrCategory->getParentTrCategoryId() ) ) continue;
			$arrobjMainCategories[$objTrCategory->getId()] = $objTrCategory;
		}

		foreach( $arrobjTrCategories as $objTrCategory ) {
			if( true == is_null( $objTrCategory->getParentTrCategoryId() ) ) continue;
			$intParentCategoryId = $objTrCategory->getParentTrCategoryId();
			$arrobjMainCategories[$intParentCategoryId]->addTrCategory( $objTrCategory );
		}
		
		$arrobjSubjects = rekeyObjects('TrCategoryId', $arrobjTrSubjects, true );

		$data = array();
		$data['categories'] 	= $arrobjMainCategories;
		$data['subjects'] 		= $arrobjSubjects;

		$this->load->view( 'admin/view_category_subjects', $data );
	}

	public function addCategory() {
		$arrobjParentCategories = ( array ) CTrCategories::fetchParentCategories( $this->db );
		
		$data = array();
		$data['categories'] 	= $arrobjParentCategories;

		$this->load->view( 'admin/add_category', $data );
	}

	public function insertCategory() {

		$objTrCategory = new CTrCategory();
		$objTrCategory->applyRequestForm( $this->input->post( 'category' ), $this->_arrstrCategoryFields );

		switch( NULL ) {
			default:

				$this->db->trans_begin();

				if( false == $objTrCategory->validate( 'insert', $this->db ) ) {
					break;
				}

				if( false == $objTrCategory->insert( $this->db ) ) {
					break;
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Category Added Successfully.' ) );
				exit;
		}

		$this->db->trans_rollback();
		echo json_encode( array( 'type' => 'error', 'message' => 'Failed to add category.' ) );
		exit;
	}

	public function editCategory() {

		$intTrCategoryId = $this->input->post('category_id');
		$objTrCategory = CTrCategories::fetchTrCategoryById( $intTrCategoryId, $this->db );

		$arrobjParentCategories = ( array ) CTrCategories::fetchParentCategories( $this->db );
		$arrobjSubjects = ( array ) CTrSubjects::fetchSubjectsByTrcategoryId( $intTrCategoryId, $this->db );

		$data = array();
		$data['category'] 	= $objTrCategory;
		$data['parent_categories'] = $arrobjParentCategories;
		$data['subjects'] 		= $arrobjSubjects;

		$this->load->view( 'admin/edit_category_subjects', $data );
	}

	function updateCategory() {

		$intTrCategoryId = $this->input->post( 'category' )['id'];
		$objTrCategory = CTrCategories::fetchTrCategoryById( $intTrCategoryId, $this->db );

		$objTrCategory->applyRequestForm( $this->input->post( 'category' ), $this->_arrstrUpdateCategoryFields );

		$arrobjDeleteSubjects =  ( array ) CTrSubjects::fetchSubjectsByTrcategoryId( $intTrCategoryId, $this->db );

		$arrobjInsertSubjects = array();
		$arrobjUpdateSubjects = array();
		$arrmixInputSubjects = $this->input->post( 'subject' );

		foreach( $arrmixInputSubjects as $arrstrSubject ) {
			if( '' !==  $arrstrSubject['id'] ) {
				$objTempSubject = $arrobjDeleteSubjects[$arrstrSubject['id']];
				if( true == array_key_exists( 'is_published', $arrstrSubject ) && false == $objTempSubject->getIsPublished() ) {
					$objTempSubject->setIsPublished( true );
				} elseif( false == array_key_exists( 'is_published', $arrstrSubject ) && true == $objTempSubject->getIsPublished() ) {
					$objTempSubject->setIsPublished( false );
				}
				$arrobjUpdateSubjects[] = $objTempSubject;
				unset($arrobjDeleteSubjects[$arrstrSubject['id']]);
			} else {
				$objSubject = $objTrCategory->createSubject($arrstrSubject);
				$arrobjInsertSubjects[] = $objSubject;
			}
		}

		switch( NULL ) {
			default:

				$this->db->trans_begin();

				if( false == $objTrCategory->validate( 'insert', $this->db ) ) {
					break;
				}

				if( false == $objTrCategory->insert( $this->db ) ) {
					break;
				}

				if( true == valArr( $arrobjDeleteSubjects ) ) {
					foreach( $arrobjDeleteSubjects as $objDeleteSubject ) {
						if( false == $objDeleteSubject->delete( $this->db ) ) {
							break;
						}
					}
				}

				if( true == valArr( $arrobjUpdateSubjects ) ) {
					foreach( $arrobjUpdateSubjects as $objDeleteSubject ) {
						if( false == $objDeleteSubject->update( $this->db ) ) {
							break;
						}
					}
				}

				if( true == valArr( $arrobjInsertSubjects ) ) {
					foreach( $arrobjInsertSubjects as $objDeleteSubject ) {
						if( false == $objDeleteSubject->insert( $this->db ) ) {
							break;
						}
					}
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Category Added Successfully.' ) );
				exit;
		}

		$this->db->trans_rollback();
		echo json_encode( array( 'type' => 'error', 'message' => 'Failed to add category.' ) );
		exit;
	}
}
?>