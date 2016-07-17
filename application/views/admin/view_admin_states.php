<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            States
        </h3>
    </div>
</div>
<div align="right"><a hre="#" class="btn btn-primary js-add_state" data-toggle="modal" data-target="#myModal-add_state">Add States</a></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>State</th>
                        <th>City</th>
                        <th>Status</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $states as $state ) {?>
                    <tr>
                        <td><?php echo $state->getName()?></td>
                        <td>
                        <?php foreach( $cities as $city ) {
                           if( $state->getId() == $city->getStateId() ) echo $city->getName() . ' ';
                         } ?>
                        </td>
                        <td>
                        <?php if( 1 == $state->getIsPublished() ) { ?> Active <?php } else { ?> Inactive <?php } ?>    
                        </td>
                        <td>
                        <button class='js-edit_state btn btn-primary' data-toggle="modal" data-target="#myModal-add_state" id='<?php echo $state->getId() ?>'>Edit</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="myModal-add_state" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add State</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-update_state" >Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    $(".js-add_state").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_states/addState',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-edit_state").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: this.id },
            url: '<?=base_url()?>admin_states/editState',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-update_state").click(function(){
        stateId = $("#js-state_id").val();

        if( 0 !== stateId && '' != stateId )
            action = 'updateState';
        else
            action = 'insertState';

        $.ajax ({
            type: "post",
            data: $( "#frm_edit_state" ).serialize(),
            url: '<?=base_url()?>admin_states/' + action,
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_states')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>