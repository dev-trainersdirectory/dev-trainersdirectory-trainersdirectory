<div class="row">
    <div class="col-lg-12">
        <form id="frm_edit_city" method="post" enctype="multipart/form-data" class="form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>First Name:</label>
                    <input class="form-control" type="text" name=city[name] value="<?php echo $city->getName() ?>" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status: </label><br>
                    <input type="checkbox" name="city[is_published]" value="1" <?php if ( 1 == $city->getIsPublished() ) {?> checked="true" <?php }?>> Is Published
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>State: </label>
                    <select class="form-control" name="city[state_id]">
                        <option value=""></option>
                        <?php foreach( $states as $state ) {?>
                        <option value="<?php echo $state->getId() ?>" <?php if( $state->getId() == $city->getStateId() ) { ?> selected <?php }?>>
                            <?php echo $state->getName() ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <input type="hidden" id="js-city_id" name=city[id] value="<?php echo $city->getId()?>"> 
        </form>
    </div>
</div>