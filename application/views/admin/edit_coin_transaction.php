<div class="row">
    <div class="col-lg-12">
        <form id="frm_edit_coins" method="post" enctype="multipart/form-data" class="form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>User:</label>
                    <div class="dropdown">
                        <input type="text" id="js-load_userlist" class="form-control dropdown-toggle" data-toggle="dropdown">
                        <ul class="dropdown-menu js-list_content" style="width:400px; height:300px; overflow:scroll">
                            
                        </ul>
                    </div>
                    <input type="hidden" id="js-user_id" name="coin_transaction[lead_id]" value="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Transaction: </label><br>
                    <select class="form-control" name="coin_transaction[transaction_type]">
                        <option value="">Choose an option</option>
                        <option value="credit">Credit</option>
                        <option value="debit">Debit</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Coins:</label>
                    <input class="form-control" type="text" name="coin_transaction[coins]" > 
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Remark: </label><br>
                    <textarea class="form-control" name="coin_transaction[remark]"></textarea>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script type="text/javascript">

    $.ajax ({
        type: "post",
        data: { 'key' : '' },
        url: '<?=base_url()?>admin_coin_transactions/loadUsersList',
        success: function(result) {
            if(result) {
                $('.js-list_content').html(result);
            }
        }
    })

    $("#js-load_userlist").keyup(function(){
        $.ajax ({
            type: "post",
            data: { 'key' : $("#js-load_userlist").val() },
            url: '<?=base_url()?>admin_coin_transactions/loadUsersList',
            success: function(result) {
                if(result) {
                    $('.js-list_content').html(result);
                }
            }
        })
    });

    function setUsername(e) {
        userName = $(e).html();
        userId = $(e).data("userid") ;

        $("#js-load_userlist").val(userName);
        $("#js-user_id").val(userId);
    }

</script>