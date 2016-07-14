<?php $subjectCounter = 0;?>
<!-- Edit Category Modal -->
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Category</h4>
        </div>
        <form id="frm_edit_category">
        	<div class="modal-body">
        	    <p>Parent Category : 
				<select name="category[parent_tr_category_id]" >
					<option></option>
					<?php foreach( $parent_categories as $p_category ) { ?>
						<option value=<?php echo $p_category->getId()?> <?php if( $category->getParentTrCategoryId() == $p_category->getId()) {?> selected <?php }?>><?php echo $p_category->getName() ?></option>
					<?php } ?>
				</select>
				</p>
				<p>Category Name : <input type="text" name="category[name]" value="<?php echo $category->getName()?>"></p>
				<p>Is Published : <input type="checkbox" value="1" name="category[is_published]" <?php if( true == $category->getIsPublished() ) { ?> checked <?php } ?> ></p>
				<p>Subjects : 
					<ul class="js-subjects">
						<?php foreach( $subjects as $subject ) { ?>
							<li> <input type="text" value="<?php echo $subject->getName()?>" name="subject[<?php echo $subjectCounter?>][name]">
								<input type="checkbox" value="1" name="subject[<?php echo $subjectCounter?>][is_published]" <?php if( true == $subject->getIsPublished() ) { ?> checked <?php } ?>>
								<a href="#" class="js-remove_subject">X</a>
								<input type="hidden" name="subject[<?php echo $subjectCounter?>][id]" value="<?php echo $subject->getId()?>">
								<?php $subjectCounter++;?>
							</li>
						<?php } ?>
					</ul>
					<input type="button" class="js-add_subject" value="Add Subject">
					<input type="hidden" name="category[id]" value="<?php echo $category->getId()?>">
				</p>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn btn-default js-update_category" >Save</button>
                <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

<script type="text/javascript">

	var counter = <?php echo (int) $subjectCounter?>;
	$('.js-add_subject').click(function() {
		
		var add_subject = '<li><input type="text" value="" name="subject['+counter +'][name]"> <input type="checkbox" value="1" name="subject['+counter +'][is_published]" > <a href="#" class="js-remove_subject" onclick="$(this).parent(\'li\').remove();">X</a><input type="hidden" name="subject['+counter +'][id]" value=""> </li>';
		counter = counter+1;
		$(".js-subjects").append(add_subject);  
	});

	$('.js-remove_subject').on('click',function(){
		 $(this).parent('li').remove();
	});

	$('.js-update_category').click(function(){
        $.ajax ({
            type: "post",
            data: $( "#frm_edit_category" ).serialize(),
            url: '<?=base_url()?>category_subjects/updateCategory',
            success: function(result) {
                
            }
	    });
	});

</script>