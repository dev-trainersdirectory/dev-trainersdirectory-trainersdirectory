<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Trainers
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
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
                        <td><a href='#' class='js-edit_trainer' id='<?php echo $user->getId() ?>'>Edit</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<script type="text/javascript">

    $(".js-edit_trainer").click(function(){
        $.ajax ({
            type: "post",
            data: { id: this.id },
            url: '<?=base_url()?>admin_trainers/editTrainer',
            success: function(result) {
                if(result) {
                    $('.container-fluid').html(result);
                }
            }
        })
    });
        
</script>