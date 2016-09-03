            <form id="frm_broadcast" method="post" class="form">
            <table class="table table-bordered table-hover table-striped">
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
            </table>
            </form>
            <?php echo $this->pagination->create_links(); ?>

<script type="text/javascript">
    
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
    
</script>