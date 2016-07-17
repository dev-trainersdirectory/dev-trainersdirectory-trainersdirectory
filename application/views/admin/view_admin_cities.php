<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Cities
        </h3>
    </div>
</div>
<div align="right"><a hre="#" class="btn btn-primary js-add_city" data-toggle="modal" data-target="#myModal-add_city">Add City</a></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>City</th>
                        <th>State</th>
                        <th>Status</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $cities as $city ) {?>
                    <tr>
                        <td><?php echo $city->getName()?></td>
                        <td>
                        <?php foreach( $states as $state ) {
                           if( $state->getId() == $city->getStateId() ) echo $state->getName() . ' ';
                         } ?>
                        </td>
                        <td>
                        <?php if( 1 == $city->getIsPublished() ) { ?> Active <?php } else { ?> Inactive <?php } ?>    
                        </td>
                        <td>
                        <button class='js-edit_city btn btn-primary' data-toggle="modal" data-target="#myModal-add_city" id='<?php echo $city->getId() ?>'>Edit</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="myModal-add_city" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <button type="button" class="btn btn-primary js-update_city" >Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    $(".js-add_city").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_cities/addCity',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-edit_city").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: this.id },
            url: '<?=base_url()?>admin_cities/editCity',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-update_city").click(function(){
        cityId = $("#js-city_id").val();

        if( 0 !== cityId && '' != cityId )
            action = 'updateCity';
        else
            action = 'insertCity';

        $.ajax ({
            type: "post",
            data: $( "#frm_edit_city" ).serialize(),
            url: '<?=base_url()?>admin_cities/' + action,
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_cities')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>