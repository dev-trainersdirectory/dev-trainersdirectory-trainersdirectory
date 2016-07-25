<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Advertisers <input type="button" class="btn js-add_advertiser" value="Add Advertiser" data-toggle="modal" data-target="#jsModal-advertiser">
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
                        <th width="20%">Name</th>
                        <th >Address</th>
                        <th width="25%">Contact Number</th>
                        <th width="10%">Coins</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $advertisers as $advertiser ) {?>
                    <tr>
                        <td><?php echo $advertiser->getName() ?></td>
                        <td><?php echo $advertiser->getAddress() ?></td>
                        <td><?php echo $advertiser->getContactNumber() ?></td>
                        <td><?php echo $advertiser->getCoins() ?></td>
                        <td>
                        <button type="button" class="btn btn-info js-edit_advertiser" data-toggle="modal" data-target="#jsModal-advertiser" id="<?php echo $advertiser->getId() ?>">Edit</button></td>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="jsModal-advertiser" role="dialog"></div>

<script type="text/javascript">
	$(".js-add_advertiser").click(function(){
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_advertisers/addAdvertiser',
            success: function(result) {
                if(result) {
                    $('#jsModal-advertiser').html(result);
                }
            }
        })
    });

     $(".js-edit_advertiser").click(function(){
        $.ajax ({
            type: "post",
            data: { advertiser_id: this.id },
            url: '<?=base_url()?>admin_advertisers/editAdvertiser',
            success: function(result) {
                if(result) {
                    $('#jsModal-advertiser').html(result);
                }
            }
        })
    });
</script>