<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Videos
        </h3>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="25%">Trainer</th>
                        <th>Video</th>
                        <th width="5%">Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $videos as $video ) {?>
                    <tr>
                        <td><?php echo $trainers[$video->getTrainerId()]->getName() ?></td>
                        <td> </td>
                        <td><?php if( 1 == $video->getIsPublished() ) { echo "Active"; } else { echo "Inactive"; } ?></td>
                        <td>
                        <?php if( 0 == $video->getIsPublished() ) { ?>
                            <a onclick="setId( 'approve_vdo_id', <?=$video->getId()?> );" href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal-approve_video" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                        <?php } else { ?>
                            <a onclick="setId( 'reject_vdo_id', <?=$video->getId()?> );" hre="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal-reject_video" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        <?php } ?>
                            <a onclick="setId( 'delete_vdo_id', <?=$video->getId()?> );" hre="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal-delete_video" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="myModal-approve_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approve</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to approve this video?
        <form id="frm_approve_vdo" method="post">
            <input id="approve_vdo_id" type="hidden" name="trainer_videos[id]" value="">
            <input type="hidden" name="trainer_videos[is_published]" value="1">
            <input type="hidden" name="trainer_videos[delete]" value="0">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary js-approve" >Yes</button>
        <button type="button" class="btn btn-default" id="js-modal_close_1" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal-reject_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reject</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to reject this video?
        <form id="frm_reject_vdo" method="post">
            <input id="reject_vdo_id" type="hidden" name="trainer_videos[id]" value="">
            <input type="hidden" name="trainer_videos[is_published]" value="0">
            <input type="hidden" name="trainer_videos[delete]" value="0">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary js-reject" >Yes</button>
        <button type="button" class="btn btn-default" id="js-modal_close_2" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal-delete_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this video?
        <form id="frm_delete_vdo" method="post">
            <input id="delete_vdo_id" type="hidden" name="trainer_videos[id]" value="">
            <input type="hidden" name="trainer_videos[is_published]" value="0">
            <input type="hidden" name="trainer_videos[delete]" value="0">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary js-delete" >Yes</button>
        <button type="button" class="btn btn-default" id="js-modal_close_3" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    function setId( div, value ) {
        $( "#"+div ).val(value);
    }
    
    $(".js-approve").click(function(){
        $.ajax ({
            type: "post",
            data: $( "#frm_approve_vdo" ).serialize(),
            url: '<?=base_url()?>admin_videos_images/updateVideoStatus',
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close_1" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_videos_images')
                } else {
                    alert( output.message )
                }
            }
        })
    });

    $(".js-reject").click(function(){
        $.ajax ({
            type: "post",
            data: $( "#frm_reject_vdo" ).serialize(),
            url: '<?=base_url()?>admin_videos_images/updateVideoStatus',
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close_2" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_videos_images')
                } else {
                    alert( output.message )
                }
            }
        })
    });

    $(".js-delete").click(function(){
        $.ajax ({
            type: "post",
            data: $( "#frm_delete_vdo" ).serialize(),
            url: '<?=base_url()?>admin_videos_images/updateVideoStatus',
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close_3" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_videos_images')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>