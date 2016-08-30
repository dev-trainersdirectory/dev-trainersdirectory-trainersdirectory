<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send Email</h4>
      </div>
      <div class="modal-body">
<div class="row">
    <div class="col-lg-12">
        <form id="frm_edit_city" method="post" enctype="multipart/form-data" class="form">
        <div class="row">
            <div class="col-lg-12 js-sms_alert">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>To:</label><br>
                    <strong><?php echo $lead->getFirstName() .' '. $lead->getLastName(); ?></strong>
                    <input class="form-control" type="hidden" name=broadcast[email_to] value="<?php echo $lead->getUserId();?>" >
                    <input class="form-control" type="hidden" name=broadcast[lead_id] value="<?php echo $lead->getId();?>" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>SMS Templates:</label>
                    <select class="form-control js-email_type" name="broadcast[email_type_id]" >
                        <option>Select Option</option>
                        <?php foreach( $email_templates as $email_template ) { $intEmailTemplateId = $email_template->getId(); ?>
                        <option id="email_id_<?php echo $intEmailTemplateId;?>" value="<?php echo $email_template->getSmsTypeId();?>" data-content="<?php echo $email_template->getContent();?>">
                            <?php echo $email_template->getSmsType(); ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Subject: </label><br>
                    <input class="form-control" type="text" name="broadcast[email_subject]" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Message: </label><br>
                    <textarea class="form-control ckeditor js-email_content" name="broadcast[email_body]"></textarea>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-send_email" >Send</button>
      </div>
    </div>
  </div>

<script type="text/javascript">
    
    $(".js-email_type").change(function(){
    $('.js-email_content').html('Loading content.....');
        
        emailTypeId = $(this).val();
        emailContent = $("#email_id_"+emailTypeId).data('content');

        $(".js-email_content").val(emailContent);
        
    });

    $(".js-send_email").click(function(){
    
        $.ajax ({
            type: "post",
            data: $( "#frm_edit_city" ).serialize(),
            url: '<?=base_url()?>admin_broadcast/sendEmail',
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                   $('.js-sms_alert').html('<div class="alert alert-success"><strong>Success!</strong> Email will be sent in some time.</div>');
                } else {
                   $('.js-sms_alert').html('<div class="alert alert-danger"><strong>Error!</strong> Unable to send email.</div>');
                }
            }
        })

    });

</script>