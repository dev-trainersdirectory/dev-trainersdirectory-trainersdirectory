<div class="row">
    <div class="col-lg-12">
        <form id="frm_edit_state" method="post" enctype="multipart/form-data" class="form  frm_edit_state_1">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>First Name:</label>
                    <input class="form-control" type="text" name=state[name] value="<?php echo $state->getName() ?>" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status: </label><br>
                    <input type="checkbox" name="state[is_published]" value="1" <?php if ( 1 == $state->getIsPublished() ) {?> checked="true" <?php }?>> Is Published
                </div>
            </div>
        </div>
        <input type="hidden" id="js-state_id" name=state[id] value="<?php echo $state->getId()?>"> 
        </form>
    </div>
</div>