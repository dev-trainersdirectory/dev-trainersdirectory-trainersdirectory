<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th width="20%">Name</th>
            <th width="20%">Email Address</th>
            <th width="10%">Contact No</th>
            <th>Address</th>
            <th width="15%">Status</th>
            <th width="5%">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $users as $user ) {?>
        <?php $lead = $leads[$user->getId()]?>
        <tr>
            <td><?php echo $lead->getFullName()?></td>
            <td><?php echo $user->getEmailId() ?></td>
            <td><?php echo $user->getContactNumber()?></td>
            <td><?php echo $lead->getAddress()?></td>
            <td><?php echo $statuses[$user->getStatusId()]->getName()?></td>
            <td><a href='#' class='btn btn-primary js-edit_user' data-toggle="modal" data-target="#myModal-add_user" id='<?php echo $user->getId() ?>'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php echo $this->pagination->create_links(); ?>

<script type="text/javascript">
    
    $(".js-edit_user").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: this.id },
            url: '<?=base_url()?>admin_users/editUser',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });
    
</script>