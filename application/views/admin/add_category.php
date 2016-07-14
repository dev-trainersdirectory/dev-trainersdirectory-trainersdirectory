<!-- Add Category Modal -->
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Category</h4>
        </div>
        <form id="frm_add_category">
        	<div class="modal-body">
        	    <p>Parent Category :
		          <select name="category[parent_tr_category_id]">
		          		<option></option>
		          		<?php foreach( $categories as $category ) { ?>
		          			<option value="<?php echo $category->getId()?>"><?php echo $category->getName()?></option>
		          		<?php } ?>
		          </select>
	          	</p>
	          	<p> Name : <input type="text" name="category[name]"></p>
	          	<p> Description : <input type="text" name="category[description]"></p>
	          	<p> Is Published : <input type="checkbox" name="category[is_published]" value="1" checked> </p>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default js-add_categoty" >Save</button>
                <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

<script type="text/javascript">

    $(".js-add_categoty").click(function(){
        $.ajax ({
            type: "post",
            data: $( "#frm_add_category" ).serialize(),
            url: '<?=base_url()?>category_subjects/insertCategory',
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close" ).trigger( "click" );
                    loadTab('<?=base_url()?>category_subjects')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>