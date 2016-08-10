<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Coin Transactions
        </h3>
    </div>
</div>
 <div align="right">
    <a hre="#" class="btn btn-primary js-add_coins" data-toggle="modal" data-target="#myModal-add_coins">Add Coins</a>
</div>
<br>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th width="25%">User</th>
                        <th width="5%">Credit</th>
                        <th width="5%">Dedit</th>
                        <th>Remark</th>
                        <th width="10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $coin_transactions as $coin_transaction ) {?>
                    <tr>
                        <td><?php echo $leads[$coin_transaction->getLeadId()]->getFirstName().' '.$leads[$coin_transaction->getLeadId()]->getLastName()?></td>
                        <td><?php echo $coin_transaction->getCredit() ?></td>
                        <td><?php echo $coin_transaction->getDebit() ?></td>
                        <td><?php echo $coin_transaction->getRemark() ?></td>
                        <td><?php echo $coin_transaction->getStatus() ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<div class="modal fade" id="myModal-add_coins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Coins</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-update_coins" >Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    $(".js-add_coins").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_coin_transactions/addCoins',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-update_coins").click(function(){
        action = 'insertCoins';

        $.ajax ({
            type: "post",
            data: $( "#frm_edit_coins" ).serialize(),
            url: '<?=base_url()?>admin_coin_transactions/' + action,
            success: function(result) {
                //$('.modal-body').html(result);
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_coin_transactions')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>