<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Reviews and Ratings
        </h3>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form id="frm_filter_reviewee" method="post" role="form">
            <div class="row form-group">
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="filter[name]" value="<?php echo $filter['name']?>" placeholder="Trainer Name">
                </div>
                <div class="col-lg-3">
                    <a href="#" class="btn btn-primary js-filter_reviewee">Filter</a>
                    <a href="#" class="btn btn-default js-filter_reviewee" onclick="document.getElementById('filter_reset').value = 1;">
                        Reset
                    </a>
                </div>
                <input class="form-control" type="hidden" name="filter[reset]" vaue="0" id="filter_reset">
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="15%">Reviewee</th>
                        <th width="15%">Reviewer</th>
                        <th>Ratings</th>
                        <th width="10%">Review</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $reviews as $review ) {?>
                    <tr>
                        <td>
                        <?php echo $leads[$review->getRevieweeId()]->getFirstName() .' '. $leads[$review->getRevieweeId()]->getLastName() ?>
                        </td>
                        <td>
                        <?php echo $leads[$review->getReviewerId()]->getFirstName() .' '. $leads[$review->getRevieweeId()]->getLastName() ?>
                        </td>
                        <td><?php echo $review->getReview() ?></td>
                        <td><?php echo $review->getRatings() ?></td>
                        <td>
                        <button class='js-edit_review btn btn-primary' data-toggle="modal" data-target="#myModal-edit_review" id='<?php echo $review->getId() ?>'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal-edit_review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add City</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-update_review" >Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    
     $(".js-filter_reviewee").click(function(){
    
        $.ajax ({
            type: "post",
            data: $( '#frm_filter_reviewee' ).serialize(),
            url: '<?=base_url()?>admin_reviews/',
            success: function(result) {
                if(result) {
                    $('.container-fluid').html(result);
                }
            }
        })
    });

    $(".js-edit_review").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { review_id: this.id },
            url: '<?=base_url()?>admin_reviews/editReview',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-update_review").click(function(){
        reviewId = $("#js-city_id").val();

        if( 0 !== reviewId && '' != reviewId )
            action = 'updateReview';
        else
            action = 'insertReview';

        $.ajax ({
            type: "post",
            data: $( "#frm_edit_review" ).serialize(),
            url: '<?=base_url()?>admin_reviews/' + action,
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_reviews')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>