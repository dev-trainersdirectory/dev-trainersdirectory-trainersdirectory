
<div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Email Template</h4>
        </div>
        
        <form id="frm_add_edit_email_template" method="post" enctype="multipart/form-data" class="form">
            <div class="modal-body">
            
                <div class="form-group">
                    <label><strong>Email Type: </strong></label>
                    <select name=email_template[email_type_id]>
                    <?php foreach( $emailTypes AS $emailType ) { ?>
                        <option value="<?php echo $emailType->getId()?>" <?php if( $emailTemplate->getEmailTypeId() == $emailType->getId() ) { ?> selected <?php } ?> ><?php echo $emailType->getSubject()?></option>
                    <?php } ?>
                    </select>
                    <br/><br/>
                    <label><strong>User Type: </strong></label>
                    <select name=email_template[user_type_id]>
                    <?php foreach( $userTypes AS $userType ) { ?>
                        <option value="<?php echo $userType->getId()?>" <?php if( $emailTemplate->getUserTypeId() == $userType->getId() ) { ?> selected <?php } ?> ><?php echo $userType->getName()?></option>
                    <?php } ?>
                    </select>
                    <br/><br/>
                    <strong>Subject : </strong> <textarea class="ckeditor" rows="1" cols="75" name="email_template[subject]"> <?php echo $emailTemplate->getSubject()?></textarea>
                    <br/><br/>
                    <strong>Content : </strong> <textarea class="ckeditor" rows="5" cols="90" name="email_template[content]"> <?php echo $emailTemplate->getContent()?></textarea>
                    <br/><br/>
                    <strong>Active : </strong> <input type="checkbox" name="email_template[is_active]" value="1" <?php if( true == $emailTemplate->getIsActive() ) { ?> checked <?php } ?>>
                    <input type="hidden" id="js-email_template_id" name="email_template[id]" value="<?php echo $emailTemplate->getId()?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default js-insert_email_template" >Save</button>
                <button type="button" class="btn btn-default" id="js-modal_close_add_email_template" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    
    $('.js-insert_email_template').click(function() {
        var emailTemplateId = $('#js-email_template_id').val();
        var action = 'updateEmailTemplate';
        if( '' == emailTemplateId || 0 == emailTemplateId )
            action = 'insertEmailTemplate';

        $.ajax ({
            type: "post",
            data: $( "#frm_add_edit_email_template" ).serialize(),
            url: '<?=base_url()?>email_templates/' + action,
            success: function(result) {
                result = JSON.parse(result);
                if( 'success' == result.type ) {
                    $( "#js-modal_close_add_email_template" ).trigger( "click" );
                    loadTab('<?=base_url()?>email_templates')
                } else {
                    alert( result.message )
                }
            }
        });
    });
</script>