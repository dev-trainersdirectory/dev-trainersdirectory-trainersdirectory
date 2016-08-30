<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Videos
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
                        <th width="5%">#</th>
                        <th width="50%">Transaction Type</th>
                        <th width="10%">Coins</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach( $transaction_costs as $key => $transaction_cost ) {?>
                    <tr>
                    <form id="frm_transaction_cost_<?php echo $key; ?>" method="post" class="form">
                        <input type="hidden" name="transaction_costs[id]" value="<?php echo $key; ?>" />
                        <td><?php echo $key; ?></td>
                        <td>
                            <?php echo $transaction_types[$transaction_cost->getTransactionTypeId()]->getName(); ?>
                        </td>
                        <td>
                            <span id="t_coin_div_<?php echo $key; ?>"><?php echo $transaction_cost->getCoins(); ?></span>
                            <input id="t_coin_text_<?php echo $key; ?>" style="display:none;" class="form-control" type="text" name="transaction_costs[<?php echo $key; ?>][coins]" value="<?php echo $transaction_cost->getCoins(); ?>" />    
                        </td>
                        <td>
                        <div id="t_coin_action_<?php echo $key; ?>" style="display:none;">
                            <a hre="#" class="btn btn-warning js-update_coin" id="<?php echo $key; ?>">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </a>
                            <a hre="#" onclick="hideCoin(<?php echo $key; ?>)" class="btn btn-danger" id="<?php echo $key; ?>">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                        </div>
                        <a id="t_coin_edit_<?php echo $key; ?>" hre="#" onclick="showCoin(<?php echo $key; ?>)" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        </td>
                    </form>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<script type="text/javascript">

    function showCoin(id) {
        $( "#t_coin_text_"+id ).show();
        $( "#t_coin_div_"+id ).hide();
        $( "#t_coin_action_"+id ).show();
        $( "#t_coin_edit_"+id ).hide();
    }

    function hideCoin(id) {
        $( "#t_coin_text_"+id ).hide();
        $( "#t_coin_div_"+id ).show();
        $( "#t_coin_action_"+id ).hide();
        $( "#t_coin_edit_"+id ).show();
    }

    $(".js-update_coin").click(function(){

        id = $(this).attr("id");
        coin = $("#t_coin_text_"+id).val();

        $.ajax ({
            type: "post",
            data: { transaction_cost_id: id, coin: coin},
            url: '<?=base_url()?>admin_transactions/updateTransactionCosts',
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close_3" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_videos_images')
                } else {
                    alert( output.message )
                }
            }
        })
    });


</script>