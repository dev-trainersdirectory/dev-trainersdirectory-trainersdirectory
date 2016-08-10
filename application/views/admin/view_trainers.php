<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Trainers
        </h3>
    </div>
</div>
<div align="right"><a hre="#" class="btn btn-primary js-add_trainer" data-toggle="modal" data-target="#myModal-add_user">Add Trainer</a></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form name="user_filter" method="post" role="form">
            <div class="row form-group">
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="filter[name]" value="<?php echo $filter['name']?>" placeholder="Name">
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="filter[email_id]" value="<?php echo $filter['email_id']?>" placeholder="Email Id">
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="filter[contact_number]" value="<?php echo $filter['contact_number']?>" placeholder="Contact Number">
                </div>
                <div class="col-lg-3">
                    <a href="#" class="btn btn-primary js-filter_trainer">Filter</a>
                    <a href="#" class="btn btn-default js-filter_trainer" onclick="document.getElementById('filter_reset').value = 1;">
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
                        <th>Name</th>
                        <th>EmailID</th>
                        <th>Contact No</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $users as $user ) {?>
                    <?php 
                        $lead = $leads[$user->getId()];
                        $trainer = $trainers[$user->getId()];
                    ?>
                    <tr>
                        <td><?php echo $lead->getFullName()?></td>
                        <td><?php echo $user->getEmailId() ?></td>
                        <td><?php echo $user->getContactNumber()?></td>
                        <td><?php echo $lead->getAddress()?></td>
                        <td><?php echo $statuses[$user->getStatusId()]->getName()?></td>
                        <td><a href='#' class='js-edit_trainer' data-toggle="modal" data-target="#myModal-add_user" id='<?php echo $user->getId() ?>'>Edit</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="myModal-add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Trainer</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-update_trainer" >Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $(".js-filter_trainer").click(function(){
        $.ajax ({
            type: "post",
            data: $( "form" ).serialize(),
            url: '<?=base_url()?>admin_trainers/',
            success: function(result) {
                if(result) {
                    $('.container-fluid').html(result);
                }
            }
        })
    });

    $(".js-add_trainer").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_trainers/addTrainer',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-edit_trainer").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: this.id },
            url: '<?=base_url()?>admin_trainers/editTrainer',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-update_trainer").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        if( 0 !== <?php echo ( int ) $user->getId() ?> )
            action = 'updateTrainer';
        else
            action = 'insertTrainer';

        $.ajax ({
            type: "post",
            data: $( "form" ).serialize(),
            url: '<?=base_url()?>admin_trainers/' + action,
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_trainers')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>