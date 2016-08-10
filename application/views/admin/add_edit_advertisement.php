<?php $subjectCounter = 0;?>
<!-- Edit Category Modal -->
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Advertisement</h4>
        </div>
        <form id="frm_add_edit_advertisement">
        	<div class="modal-body">
        	   <p>Advertiser : 
                <select name="advertisement[advertiser_id]" >
                    <option></option>
                    <?php foreach( $advertisers as $advertiser ) { ?>
                        <option value=<?php echo $advertiser->getId()?> <?php if( $advertisement->getAdvertiserId() == $advertiser->getId()) {?> selected <?php }?>><?php echo $advertiser->getName() ?></option>
                    <?php } ?>
                </select>
                </p>
                <p> Redirect Link : <input type="text" name="advertisement[redirect_link]" value="<?php echo          $advertisement->getRedirectLink()?>"></input>
                </p>
                <p>Categories : 
                </p>
                <p> Notes : <textarea name="advertisement[notes]"><?php echo $advertisement->getNotes()?> </textarea>
                </p>
                <p> Active : <input type="checkbox" name="advertisement[is_active]" <?php if( $advertisement->getIsActive() ) { ?> selected<?php } ?> > </p>
                <?php if( $advertisement->getId() ) {?>
                    <p> Advertisement Image : 
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <image src="<?=base_url() . $advertisement->getImagePath()?>" height="42" width="42" class="js-advertisement_img"></image>
                                <input type="hidden" name="advertisement[image_path]" class="js-image_path" value="<?php echo $advertisement->getImagePath()?>">
                                <a href="#" class="js-delete_image">X</a>
                            </div>
                        </div>
                    </div>
                    </p>
                <?php } ?>
                
        	    <input type="hidden" id="js-advertisement_id" name="advertisement[id]"value="<?php echo $advertisement->getId()?>">
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default js-update_advertisement" >Save</button>
                <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
	        </div>
        </form>
        <form id="frm_advertisement_image" style="display:none" enctype="multipart/form-data"> 
            <input type="hidden" name=advertisement[id] id="js-advertisement_id" value="<?php echo $advertisement->getId()?>">
            <input type="file" name="advertisement[image_path]" id="advertisement_img">
            <input type="submit" id="frm_advertisement_image_submit">
        </form>
      </div>
    </div>
  </div>

<script type="text/javascript">
	$('.js-update_advertisement').click( function(){

		 advertisementId = $("#js-advertisement_id").val();

		action = 'insertAdvertisement';
        if( 0 !== advertisementId && '' != advertisementId ) {
            action = 'updateAdvertisement';
        }
           

        $.ajax ({
            type: "post",
            data: $( "#frm_add_edit_advertisement" ).serialize(),
            url: '<?=base_url()?>admin_advertisements/' + action,
            success: function(result) {
            	result = JSON.parse(result);
                if( 'success' == result.type ) {
                    $( "#jsModal-advertisement" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_advertisements')
                } else {
                    alert( result.message )
                }
            }
	    });
	});

    $(".js-advertisement_img").click(function(){
       $( "#advertisement_img" ).click();
    });

    $("#advertisement_img").change(function(){
        var data1 = new FormData($('#frm_advertisement_image')[0]);
        
         $.ajax ({
            type: "post",
            data: data1,
            url: '<?=base_url()?>admin_advertisements/uploadAdvertisementImage',
            contentType: false,
            processData: false,
            success: function(result) {
                $('.js-advertisement_img').attr('src', '<?=base_url() ?>' + result );
                $('.js-image_path').val( result );
            }
        });

    });
    $(".js-delete_image").click(function(){
        $('.js-image_path').val( '' );
        $('.js-advertisement_img').attr('src', '<?=base_url() ?>' );
    }); 
</script>