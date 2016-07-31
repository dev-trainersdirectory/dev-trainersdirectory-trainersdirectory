<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/admin/cadminsystemcontroller.php' );

class CAdminVideosImagesController extends CAdminSystemController {

	public $_arrstrVideosImagesFields = array( 
		'id' => NULL,
		'trainer_id' => NULL,
		'trainer_skill_id' => NULL,
		'vidw_link' => NULL,
		'is_published' => NULL
		);

	public function index() {

		$arrobjVideos = CTrainerVideos::fetchAllTrainerVideos( $this->db );
		$arrobjVideos = rekeyObjects( 'TrainerId', $arrobjVideos );

		$arrobjTrainerNames = CTrainers::fetchTrainerDetailsByIds( array_keys( $arrobjVideos ), $this->db );

		$data['videos'] = $arrobjVideos;
		$data['trainers'] = $arrobjTrainerNames;

		$this->load->view( 'admin/view_videos_images', $data );
	}

	public function updateVideoStatus() {

		$intTrainerVideoId = $this->input->post( 'trainer_videos' )['id'];
		$objTrainerVideo = CTrainerVideos::fetchVideoById( $intTrainerVideoId, $this->db );

		$objTrainerVideo->setIsPublished( $this->input->post( 'trainer_videos' )['is_published'] );

		switch( NULL ) {
			default:
				$this->db->trans_begin();

				if( false == $objTrainerVideo->update( $this->db ) ) {
					$this->db->trans_rollback();
					break;
				}

				if( 1 == $this->input->post( 'trainer_videos' )['delete'] ) {
					if( false == $objTrainerVideo->delete( $this->db ) ) {
						$this->db->trans_rollback();
						break;
					}
				}

				$this->db->trans_commit();
				echo json_encode( array( 'type' => 'success', 'message' => 'Video approved.' ) );
		}
	}

}
