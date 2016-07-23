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
        	   
        	    <input type="hidden" id="js-advertisement_id" name="advertisement[id]"value="<?php echo $advertisement->getId()?>">
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default js-update_advertisement" >Save</button>
                <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
	        </div>
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

</script>