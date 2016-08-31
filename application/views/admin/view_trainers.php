<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Trainers
        </h3>
    </div>
</div>
<div align="right">
    <a hre="#" class="btn btn-primary js-add_trainer" data-toggle="modal" data-target="#myModal-add_user">Add Trainer</a>
    <a hre="#" class="btn btn-primary js-send_broadcast" data-action="showBulkSMSPopup" data-toggle="modal" data-target="#myModal-add_user">Send Email</a>
    <a hre="#" class="btn btn-primary js-send_broadcast" data-action="showBulkEmailPopup" data-toggle="modal" data-target="#myModal-add_user">Send SMS</a>
</div><br>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form id="form_user_filter" method="post" role="form">
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
            <form id="frm_broadcast" method="post" class="form">
                <thead>
                    <tr>
                        <th width="2%"></th>
                        <th width="20%">Name</th>
                        <th width="20%">EmailID</th>
                        <th width="10%">Contact No</th>
                        <th>Address</th>
                        <th width="15%">Status</th>
                        <th width="5%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $users as $key => $user ) {?>
                    <?php 
                        $lead = $leads[$user->getId()];
                        $trainer = $trainers[$user->getId()];
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="broadcast[user_ids][<?=$key?>]" value="<?=$user->getId()?>" />
                            <input type="hidden" name="broadcast[lead_ids][<?=$key?>]" value="<?=$lead->getId()?>" />
                        </td>
                        <td><?php echo $lead->getFullName()?></td>
                        <td><?php echo $user->getEmailId() ?></td>
                        <td><?php echo $user->getContactNumber()?></td>
                        <td><?php echo $lead->getAddress()?></td>
                        <td><?php echo $statuses[$user->getStatusId()]->getName()?></td>
                        <td><a href='#' class='btn btn-primary js-edit_trainer' data-toggle="modal" data-target="#myModal-add_user" id='<?php echo $user->getId() ?>'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </form>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="myModal-add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
        
      
</div>

<script type="text/javascript">

    $(".js-filter_trainer").click(function(){
        $.ajax ({
            type: "post",
            data: $( "#form_user_filter" ).serialize(),
            url: '<?=base_url()?>admin_trainers/',
            success: function(result) {
                if(result) {
                    $('.container-fluid').html(result);
                }
            }
        })
    });

    $(".js-add_trainer").click(function(){
    $('#myModal-add_user').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_trainers/addTrainer',
            success: function(result) {
                if(result) {
                    $('#myModal-add_user').html(result);
                }
            }
        })
    });

    $(".js-edit_trainer").click(function(){
    $('#myModal-add_user').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: this.id },
            url: '<?=base_url()?>admin_trainers/editTrainer',
            success: function(result) {
                if(result) {
                    $('#myModal-add_user').html(result);
                }
            }
        })
    });

    $(".js-send_broadcast").click(function(){
        action = $( this ).data("action");

        $.ajax ({
            type: "post",
            data: $( "#frm_broadcast" ).serialize(),
            url: '<?=base_url()?>admin_broadcast/' + action,
            success: function(result) {
                if(result) {
                    $('#myModal-add_user').html(result);
                }
            }
        })
    });

</script>