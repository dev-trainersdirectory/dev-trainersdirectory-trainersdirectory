<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            SMS Templates <input type="button" class="btn js-add_sms_template" value="Add SMS Template" data-toggle="modal" data-target="#jsModal-add_sms_template">
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Sms Type</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $smsTemplates as $smsTemplate ) { ?>
                    <tr>
                        <td><?php echo $smsTemplate->getSmsType()?></td>
                        <td><?php echo $smsTemplate->getContent() ?></td>
                        <td><?php echo $smsTemplate->getIsActive() ?></td>
                        <td>
                         <button type="button" class="btn btn-info js-edit_sms_template" data-toggle="modal" data-target="#jsModal-edit_sms_template" id="<?php echo $smsTemplate->getId() ?>">Edit</button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

 <!-- Add Category Modal -->
<div class="modal fade" id="jsModal-add_sms_template" role="dialog"></div>
<div class="modal fade" id="jsModal-edit_sms_template" role="dialog"></div>

<script type="text/javascript">
	$(".js-add_sms_template").click(function(){
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>sms_templates/addSmsTemplate',
            success: function(result) {
                if(result) {
                    $('#jsModal-add_sms_template').html(result);
                }
            }
        })
    });

    $(".js-edit_sms_template").click(function(){
        $.ajax ({
            type: "post",
            data: { sms_template_id: this.id },
            url: '<?=base_url()?>sms_templates/editSmsTemplate',
            success: function(result) {
                if(result) {
                    $('#jsModal-edit_sms_template').html(result);
                }
            }
        })
    });
</script>