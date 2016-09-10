<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( getcwd(). '/application/controllers/csystemcontroller.php' );

class CTrainerProfileController extends CSystemController {

	public function showInterest( $intTrainerUserId ) {
		
		$intUserId = (int) $this->session->userdata('userID');
		if( false == $this->validateUser( $intUserId ) ) exit;

		if( 0 == $intUserId || 0 == (int) $intTrainerUserId ) exit;

		$objStudentLead = CLeads::fetchLeadDetailsByUserId( $intUserId, $this->db );
		$objTrainerLead = CLeads::fetchLeadDetailsByUserId( $intTrainerUserId, $this->db );

		/* 
		*	Add record in show_interests table
		*/

		$objShowInterest = new CShowInterest();
		$objShowInterest->setUserId( $intUserId );
		$objShowInterest->setTrainerUserId( $intTrainerUserId );

		if( false == $objShowInterest->insert() ) {
			echo 'Failed to notify Trainer.'; exit;
		}
		/* 
		*  Send SMS / Add record in system_sms table
		*/
		$objCommunicationLibrary = new CCommunicationLibrary();
		$objCommunicationLibrary->setDatabase( $this->db );
		$objCommunicationLibrary->setSenderLead( $objStudentLead );
		$objCommunicationLibrary->setReceiverLead( $objTrainerLead );

		/*if( false == $objCommunicationLibrary->showInterest() ) {
			echo 'Failed to notify Trainer.'; exit;
		}*/

		echo 'Notified Trainer successfully';exit;
	}

	public function writeReview( $intTrainerUserId ) {
		$intUserId = (int) $this->session->userdata('userID');
		if( false == $this->validateUser( $intUserId ) ) exit;

		if( 0 == $intUserId || 0 == (int) $intTrainerUserId ) exit;

		$objReviewRating = new CReviewRating();
		$objReviewRating->setReviewerId($intUserId);
		$objReviewRating->setRevieweeId($intTrainerUserId);
		$objReviewRating->setReview( $this->input->post('review') );
		$objReviewRating->setRatings( $this->input->post('ratings') );

		$objReviewRating->insert();

		echo 'Review added successfully';exit;
	}

	public function unlockProfile( $intTrainerUserId ) {
		$intUserId = (int) $this->session->userdata('userID');
		
		if( 0 == $intUserId ) {
			alert( 'You will need to login to unlock profile.' );
			exit;
		}
		
		$objLead = CLeads::fetchLeadByUserId( $intUserId );
		$objTransactionCost = CTransactionCosts::fetchTransactionCostByTransactionTypeId( $this->intTransactionTypeId, $this->objDatabase );

		if( (int) $objLead->getCoins() < (int) $objTransactionCost->getCoins() ) {
			alert( 'Please recharge your wallet to unlock profile' );
			exit;
		} 

		$objBuyProfileLibrary = new CBuyProfileLibrary();
		$objBuyProfileLibrary->objDatabase = $this->db;
		$objBuyProfileLibrary->intUserId = $intUserId;
		$objBuyProfileLibrary->intBoughtUserId = $intTrainerUserId;

		$objBuyProfileLibrary->intTransactionTypeId = CTransactionType::STUDENT_TRAINER;
		
		switch( true ) {
			$this->db->trans_begin();
			
			if( false == $objBuyProfileLibrary->buyProfile() ) {
				$this->db->trans_rollback();
				break;
			}
			
			$this->db->trans_commit();

			//Reload Pop up in JS here
			echo json_encode( 'status'=> 'success' );
			exit;
		}

		echo json_encode( 'status'=> 'error' );
		exit;
	}
}
?>