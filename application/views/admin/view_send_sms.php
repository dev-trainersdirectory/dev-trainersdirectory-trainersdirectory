<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send SMS</h4>
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
                    <input class="form-control" type="hidden" name=broadcast[send_to] value="<?php echo $lead->getUserId();?>" >
                    <input class="form-control" type="hidden" name=broadcast[lead_id] value="<?php echo $lead->getId();?>" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>SMS Templates:</label>
                    <select class="form-control js-sms_type" name="broadcast[sms_type_id]" >
                        <option>Select Option</option>
                        <?php foreach( $sms_templates as $sms_template ) { $intSmsTemplateId = $sms_template->getId(); ?>
                        <option id="sms_id_<?php echo $intSmsTemplateId;?>" value="<?php echo $sms_template->getSmsTypeId();?>" data-content="<?php echo $sms_template->getContent();?>">
                            <?php echo $sms_template->getSmsType(); ?>
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
                    <input class="form-control" type="text" name="broadcast[subject]" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Message: </label><br>
                    <textarea class="form-control ckeditor js-sms_content" name="broadcast[content]"></textarea>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-send_sms" >Send</button>
      </div>
    </div>
  </div>

<script type="text/javascript">
    
    $(".js-sms_type").change(function(){
    $('.js-sms_content').html('Loading content.....');
        
        smsTypeId = $(this).val();
        smsContent = $("#sms_id_"+smsTypeId).data('content');

        $(".js-sms_content").val(smsContent);
        
    });

    $(".js-send_sms").click(function(){
    
        $.ajax ({
            type: "post",
            data: $( "#frm_edit_city" ).serialize(),
            url: '<?=base_url()?>admin_broadcast/sendSMS',
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                   $('.js-sms_alert').html('<div class="alert alert-success"><strong>Success!</strong> SMS will be sent in some time.</div>');
                } else {
                   $('.js-sms_alert').html('<div class="alert alert-danger"><strong>Error!</strong> Unable to send SMS.</div>');
                }
            }
        })

    });

</script>