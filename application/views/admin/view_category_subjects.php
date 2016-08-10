<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Category & Subjects
        </h3>
    </div>
</div>
 <div align="right">
     <input type="button" class="btn js-add_category" value="Add Category" data-toggle="modal" data-target="#jsModal-add_category">
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sub Category</th>
                        <th>Subjects</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $categories as $category ) {
                	foreach( $category->getTrCategories() as $subCategory ) { ?>
                    <tr>
                        <td><?php echo $category->getName()?></td>
                        <td><?php echo $subCategory->getName() ?></td>
                        <td><?php if( true == array_key_exists( $subCategory->getId(), $subjects ) ) {
                        		foreach( $subjects[$subCategory->getId()] as $subject ) {
                        			echo $subject->getName() . ', ';
                        		} }
                        	?></td>
                        <td>
                         <button type="button" class="btn btn-info js-edit_category" data-toggle="modal" data-target="#jsModal-edit_category" id="<?php echo $subCategory->getId() ?>">Edit</button></td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

 <!-- Add Category Modal -->
<div class="modal fade" id="jsModal-add_category" role="dialog"></div>
<div class="modal fade" id="jsModal-edit_category" role="dialog"></div>

<script type="text/javascript">
	$(".js-add_category").click(function(){
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>category_subjects/addCategory',
            success: function(result) {
                if(result) {
                    $('#jsModal-add_category').html(result);
                }
            }
        })
    });

    $(".js-edit_category").click(function(){
        $.ajax ({
            type: "post",
            data: { category_id: this.id },
            url: '<?=base_url()?>category_subjects/editCategory',
            success: function(result) {
                if(result) {
                    $('#jsModal-edit_category').html(result);
                }
            }
        })
    });
</script>