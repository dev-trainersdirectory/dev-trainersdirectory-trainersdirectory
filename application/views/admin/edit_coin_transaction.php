<div class="row">
    <div class="col-lg-12">
        <form id="frm_edit_coins" method="post" enctype="multipart/form-data" class="form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>User:</label>
                    
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