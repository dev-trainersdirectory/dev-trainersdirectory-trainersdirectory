<div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SMS Template</h4>
        </div>
        
        <form id="frm_add_edit_sms_template" method="post" enctype="multipart/form-data" class="form">
            <div class="modal-body">
            
                <div class="form-group">
                    <label><strong>SMS Type: </strong></label>
                    <select name=sms_template[sms_type_id]>
                    <?php foreach( $smsTypes AS $smsType ) { ?>
                        <option value="<?php echo $smsType->getId()?>" <?php if( $smsTemplate->getSmsTypeId() == $smsType->getId() ) { ?> selected <?php } ?> ><?php echo $smsType->getSubject()?></option>
                    <?php } ?>
                    </select>
                    <br/><br/>
                    <strong>Content : </strong> <input type="textarea" rows="10" name="sms_template[content]" value="<?php echo $smsTemplate->getContent()?>">
                    <br/><br/>
                    <strong>Active : </strong> <input type="checkbox" name="sms_template[is_active]" value="1" <?php if( true == $smsTemplate->getIsActive() ) { ?> checked <?php } ?>>
                    <input type="hidden" id="js-sms_template_id" name="sms_template[id]" value="<?php echo $smsTemplate->getId()?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default js-insert_sms_template" >Save</button>
                <button type="button" class="btn btn-default" id="js-modal_close_add_sms_template" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    
    $('.js-insert_sms_template').click(function() {
        var smsTemplateId = $('#js-sms_template_id').val();
        var action = 'updateSmsTemplate';
        if( '' == smsTemplateId || 0 == smsTemplateId )
            action = 'insertSmsTemplate';

        $.ajax ({
            type: "post",
            data: $( "#frm_add_edit_sms_template" ).serialize(),
            url: '<?=base_url()?>sms_templates/' + action,
            success: function(result) {
                result = JSON.parse(result);
                if( 'success' == result.type ) {
                    $( "#js-modal_close_add_sms_template" ).trigger( "click" );
                    loadTab('<?=base_url()?>sms_templates')
                } else {
                    alert( result.message )
                }
            }
        });
    });
</script>