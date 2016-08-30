
        <div class="modal-dialog modal-lg modal-xl">
            <div class="modal-content">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="modal-header">
                                <div class="pull-right">
                                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close-circle"></i>
                                    </button>
                                    <button type="button" class="minimize" data-dismiss="modal"><i class="icon-minimize-cirle"></i>
                                    </button>
                                </div>
                                <h3 class="modal-title"><?php echo $trainer->getName(); ?></h3>
                            </div>
                            <div class="modal-body">
                                <div class="details-view">
                                    <div class="row row-simple">
                                        <div class="col-lg-7 padding-0 block-1">
                                            <div class="traner-contact-details clearfix">
                                                <div class="trainer-location-details pull-left">
                                                    <div class="trainer-profile-modal-pic">
                                                        <img alt="Profile Picture" class="rounded" src="public/images/trainer.jpg">
                                                    </div>
                                                    <div class="trainer-location">
                                                        <label class="font-13">location</label>
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d15135.551043537307!2d73.8477873!3d18.48874255!3m2!1i1024!2i768!4f13.1!2m1!1slocation+thumbnail+google!5e0!3m2!1sen!2sin!4v1467043928920" width="80" height="80" frameborder="0" style="border:3px solid #fff;border-radius:3px;-webkit-box-shadow: 0px 0px 4px 1px rgba(0,0,0,0.19);
                        -moz-box-shadow: 0px 0px 4px 1px rgba(0,0,0,0.19);
                        box-shadow: 0px 0px 4px 1px rgba(0,0,0,0.19);" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <div class="trainer-details pull-left">
                                                    <form class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="" class="col-sm-3 control-label">Trainer ID <span class="pull-right">:</span> </label>
                                                            <div class="col-sm-9">
                                                                <label for="" class="control-label text-left">T<?php echo $trainer->getId(); ?> </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="col-sm-3 control-label">Mobile <span class="pull-right">:</span> </label>
                                                            <div class="col-sm-9">
                                                                <label for="" class="control-label text-left">
                                                                <?php
                                                                echo substr($trainer->getContactNumber(), 0, -5) . str_repeat('*', 5);
                                                                ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="col-sm-3 control-label">E-mail <span class="pull-right">:</span> </label>
                                                            <div class="col-sm-9">
                                                                <label for="" class="control-label text-left">
                                                                <?php
                                                                $strToken = strtok($trainer->getEmailId(), '@');
                                                                $strReplace = str_repeat( '*', strlen($strToken));
                                                                echo str_replace($strToken,$strReplace,$trainer->getEmailId());
                                                                ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="col-sm-3 control-label">Skill <span class="pull-right">:</span> </label>
                                                            <div class="col-sm-9">
                                                                <label for="" class="control-label text-left">
                                                                <?php echo $tr_subject_names; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="trainer-social-modal">
                                                        <a class="" href="#"><i class="icon-likes"></i></a>
                                                        <a class="" href="#"><i class="icon-watched"></i><span class="watch-count">(<?php $trainer->getViews(); ?>)</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 padding-10 block-2">
                                            <label class="font-15">Reviews and Ratings</label>
                                            <div class="trainer-reviews">
                                                <ul class="reviews">
                                                <?php $floatAvgRating = 0; foreach( $trainer_reviews as $trainer_review ) {
                                                    $floatAvgRating += $trainer_review->getRatings();
                                                ?>
                                                    <li><span>“<?php echo $trainer_review->getReview(); ?>”</span></li>
                                                <?php } ?>
                                                </ul>
                                                <a href="#" class="write-review">WRITE A REVIEW</a>
                                            </div>

                                            <div class="reviews-and-ratings">
                                                <label class="margin-top-10">Average Ratings</span>
                                                </label>
                                                <div class="rating pull-right">
                                                    <i class="icon-star-sm one-rating"></i>
                                                    <i class="icon-star-sm two-rating"></i>
                                                    <i class="icon-star-sm three-rating"></i>
                                                    <i class="icon-star-sm four-rating"></i>
                                                    <i class="icon-star-sm five-rating"></i>
                                                    <span class="rating-count"><?php echo $floatAvgRating/5; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-simple">
                                        <div class="col-lg-7 block-3">
                                            <div class="">
                                                <label class="font-15">Description:</label>
                                                <p>
                                                    <?php echo $trainer->getDescription();?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 padding-0 block-4">
                                            <iframe width="450" height="252" src="https://www.youtube.com/embed/9reHIVqdFhc" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control js-view_trainer_2" data-trainer_id="" href="#carousel-example-generic" role="button" data-slide="prev" id="js-prev_trainer_id">
                        <i class="icon-arrow-left-md"></i>
                    </a>
                    <a class="right carousel-control js-view_trainer_2" data-trainer_id="" href="#carousel-example-generic" role="button" data-slide="next"  id="js-next_trainer_id">
                        <i class="icon-arrow-right-md"></i>
                    </a>
                </div>
            </div>
        </div>
<script type="text/javascript">

    function setTrainerIds() {

        prevTrainerID = $("#trainer_id_<?php echo $trainer->getId(); ?>" ).data("prev");
        nextTrainerID = $("#trainer_id_<?php echo $trainer->getId(); ?>" ).data("next");

        $("#js-prev_trainer_id").data("trainer_id", prevTrainerID);
        $("#js-next_trainer_id").data("trainer_id", nextTrainerID);
    } setTrainerIds();
    
    $(".js-view_trainer_2").click(function(){

    trainerID = $(this).data("trainer_id");

    $('#trainer-view').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: trainerID },
            url: '<?=base_url()?>csearchtrainercontroller/viewTrainer',
            success: function(result) {
                if(result) {
                    $('#myModal-view_trainer').html(result);
                }
            }
        })
    });

</script>

