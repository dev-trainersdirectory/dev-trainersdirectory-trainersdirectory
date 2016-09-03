<?php

class CTrainerViewsService extends CBaseLibrary{
	
	public function addTrainerView( $objTrainer, $objDatabase, $intIncrement = 1 ) {

		$objTrainer->setViews( (int) $objTrainer->getViews() + $intIncrement );

		$objTrainer->update( $objDatabase );
	}
}

?>