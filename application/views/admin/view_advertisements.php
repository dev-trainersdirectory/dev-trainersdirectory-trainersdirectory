<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Advertisements <input type="button" class="btn js-add_advertisement" value="Add Advertisement" data-toggle="modal" data-target="#jsModal-advertisement">
        </h3>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="20%">Advertiser Name</th>
                        <th >Notes</th>
                        <th width="25%">Redirect Link</th>
                        <th width="10%">Active</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $advertisements as $advertisement ) {?>
                    <tr>
                        <td><?php echo $advertisement->getAdvertiserName() ?></td>
                        <td><?php echo $advertisement->getNotes() ?></td>
                        <td><?php echo $advertisement->getRedirectLink() ?></td>
                        <td><?php echo $advertisement->getIsActive() ?></td>
                        <td>
                        <button type="button" class="btn btn-info js-edit_advertisement" data-toggle="modal" data-target="#jsModal-advertisement" id="<?php echo $advertisement->getId() ?>">Edit</button></td>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="jsModal-advertisement" role="dialog"></div>

<script type="text/javascript">
	$(".js-add_advertisement").click(function(){
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_advertisements/addadvertisement',
            success: function(result) {
                if(result) {
                    $('#jsModal-advertisement').html(result);
                }
            }
        })
    });

     $(".js-edit_advertisement").click(function(){
        $.ajax ({
            type: "post",
            data: { advertisement_id: this.id },
            url: '<?=base_url()?>admin_advertisements/editadvertisement',
            success: function(result) {
                if(result) {
                    $('#jsModal-advertisement').html(result);
                }
            }
        })
    });
</script>