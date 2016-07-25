<?php $subjectCounter = 0;?>
<!-- Edit Category Modal -->
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Advertiser</h4>
        </div>
        <form id="frm_add_edit_advertiser">
        	<div class="modal-body">
        	    <p>Name : <input type="text" name="advertiser[name]" value="<?php echo $advertiser->getName()?>"></p>
        	    <p>Address : <input type="text" name="advertiser[address]" value="<?php echo $advertiser->getAddress()?>"></p>
        	    <p>Contact Number : <input type="text" name="advertiser[contact_number]" value="<?php echo $advertiser->getContactNumber()?>"></p>
        	    <p>Coins : <?php echo $advertiser->getCoins()?></p>
        	    <input type="hidden" id="js-advertiser_id" name="advertiser[id]"value="<?php echo $advertiser->getId()?>">
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default js-update_advertiser" >Save</button>
                <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

<script type="text/javascript">
	$('.js-update_advertiser').click( function(){

		 advertiserId = $("#js-advertiser_id").val();

		action = 'insertAdvertiser';
        if( 0 !== advertiserId && '' != advertiserId ) {
            action = 'updateAdvertiser';
        }
           

        $.ajax ({
            type: "post",
            data: $( "#frm_add_edit_advertiser" ).serialize(),
            url: '<?=base_url()?>admin_advertisers/' + action,
            success: function(result) {
            	result = JSON.parse(result);
                if( 'success' == result.type ) {
                    $( "#jsModal-advertiser" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_advertisers')
                } else {
                    alert( result.message )
                }
            }
	    });
	});

</script>