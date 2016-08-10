<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Email Templates <input type="button" class="btn js-add_email_template" value="Add Email Template" data-toggle="modal" data-target="#jsModal-add_email_template">
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Email Type</th>
                        <th>User Type</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $emailTemplates as $emailTemplate ) { ?>
                    <tr>
                        <td><?php echo $emailTemplate->getEmailType()?></td>
                        <td><?php echo $emailTemplate->getUserType()?></td>
                        <td><?php echo $emailTemplate->getSubject() ?></td>
                        <td><?php echo $emailTemplate->getIsActive() ?></td>
                        <td>
                         <button type="button" class="btn btn-info js-edit_email_template" data-toggle="modal" data-target="#jsModal-edit_email_template" id="<?php echo $emailTemplate->getId() ?>">Edit</button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

 <!-- Add Category Modal -->
<div class="modal fade" id="jsModal-add_email_template" role="dialog"></div>
<div class="modal fade" id="jsModal-edit_email_template" role="dialog"></div>

<script type="text/javascript">
	$(".js-add_email_template").click(function(){
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>email_templates/addEmailTemplate',
            success: function(result) {
                if(result) {
                    $('#jsModal-add_email_template').html(result);
                }
            }
        })
    });

    $(".js-edit_email_template").click(function(){
        $.ajax ({
            type: "post",
            data: { email_template_id: this.id },
            url: '<?=base_url()?>email_templates/editEmailTemplate',
            success: function(result) {
                if(result) {
                    $('#jsModal-edit_email_template').html(result);
                }
            }
        })
    });
</script>