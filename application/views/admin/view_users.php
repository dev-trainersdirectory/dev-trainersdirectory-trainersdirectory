<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Users
        </h3>
    </div>
</div>
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
                    <a href="#" class="btn btn-primary js-filter_user">Filter</a>
                    <a href="#" class="btn btn-default js-filter_user" onclick="document.getElementById('filter_reset').value = 1;">
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
                        <th>Email Address</th>
                        <th>Contact No</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                        <td><a href='#' class='js-edit_user' id='<?php echo $user->getId() ?>'>Edit</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<script type="text/javascript">

    $(".js-edit_user").click(function(){
        $.ajax ({
            type: "post",
            data: { id: this.id },
            url: '<?=base_url()?>admin_users/editUser',
            success: function(result) {
                if(result) {
                    $('.container-fluid').html(result);
                }
            }
        })
    });

    $(".js-filter_user").click(function(){
        $.ajax ({
            type: "post",
            data: $( "form" ).serialize(),
            url: '<?=base_url()?>admin_users/',
            success: function(result) {
                if(result) {
                    $('.container-fluid').html(result);
                }
            }
        })
    });
        
</script>