<div class="slider-row">
    <div id="owl2row-plugin" class="owl-carousel">
    <?php $prevId = NULL; foreach( $trainers as $key => $trainer ) { ?>
        <div class="item">
            <button hidden="true" id="trainer_id_<?php echo $key; ?>" data-prev="<?php echo $prevId;?>" data-next=""></button>
            <script type="text/javascript"> $("#trainer_id_<?php echo $prevId; ?>").data("next", <?php echo $key; ?> ); </script>
            <div class="flip-container">
                <div class="flipper">
                    <div class="front show">
                        <div class="trainer-panel widget">
                            <div class="widget-header bg-success text-right">
                                
                            </div>
                            <div class="widget-body text-center">
                                <!--trainer profile picture-->
                                <div class="trainer-profile-pic">
                                    <a href='#' id="<?php echo $key; ?>" onclick="setValue(<?php echo $key; ?>);" class="js-view_trainer" data-toggle="modal" data-target="#myModal-view_user" >
                                        <img alt="Profile Picture" class="rounded" id="image-1" src="<?php echo base_url() . $trainer->getProfilePic() ?>">
                                    </a>
                                </div>
                                <!-- / trainer profile picture-->
                                <!--ratings-->
                                <div class="rating">
                                <?php for( $count = 0; $count < $trainer->getRating(); $count++ ) { ?>
                                <i class="icon-star-sm active one-rating"></i>
                                <?php } ?>
                                </div>
                                <!-- / ratings-->
                                <!-- trainer details -->
                                <h3 class="trainer-name"><?php echo $trainer->getName();?></h3>
                                <p class="trainer-profession">English Trainer</p>
                                <p class="trainer-subjects"><?php echo $trainer->getSkills();?></p>
                                <!-- / trainer details -->
                                <!-- social details -->
                                <div class="trainer-social">
                                    <a class="" href="#"><i class="icon-call"></i></a>
                                    <a class="" href="#"><i class="icon-msgs"></i></a>
                                    <a class="" href="#"><i class="icon-likes"></i></a>
                                    <a class="" href="#"><i class="icon-watched"></i><span class="watch-count">(<?php echo $trainer->getViews();?>)</span></a>
                                </div>
                                <!-- / social details -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $prevId = $key; } ?>
    </div>
</div>