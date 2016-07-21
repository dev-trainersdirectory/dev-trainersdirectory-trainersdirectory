<div class="row">
    <div class="col-lg-12">
        <form id="frm_edit_review" method="post" enctype="multipart/form-data" class="form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>
                    Reviewee:
                    <strong><?php echo $leads[$review->getRevieweeId()]->getFirstName() .' '. $leads[$review->getRevieweeId()]->getLastName() ?></strong>
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>
                    Reviewer:
                    <strong><?php echo $leads[$review->getReviewerId()]->getFirstName() .' '. $leads[$review->getReviewerId()]->getLastName() ?></strong>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Ratings: </label>
                    <select class="form-control"  name="review[ratings]">
                        <option <?php if( $review->getRatings() == 1 ) { ?> selected <?php }?> value="1" >1</option>
                        <option <?php if( $review->getRatings() == 2 ) { ?> selected <?php }?> value="2">2</option>
                        <option <?php if( $review->getRatings() == 3 ) { ?> selected <?php }?> value="3">3</option>
                        <option <?php if( $review->getRatings() == 4 ) { ?> selected <?php }?> value="4">4</option>
                        <option <?php if( $review->getRatings() == 5 ) { ?> selected <?php }?> value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>
                Review:
                <textarea class="form-control"  name="review[review]"><?php echo $review->getReview() ?></textarea>
            </div>
        </div>
        <input type="hidden" id="js-review_id" name=review[id] value="<?php echo $review->getId()?>"> 
        </form>
    </div>
</div>