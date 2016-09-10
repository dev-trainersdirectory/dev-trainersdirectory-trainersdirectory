<form action="<?php echo $action; ?>" method="post" name="payuForm"> <br />
<!--	<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" /><br />
	<input type="hidden" name="hash" value="<?php echo $hash ?>"/><br />
	<input type="hidden" name="txnid" value="<?php echo $txnid ?>" /><br />
	<input  type="hidden" name="amount" value="<?php echo $posted['amount']; ?>" /><br />
	<input  type="hidden"name="firstname" id="firstname" value="<?php echo $posted['firstname']; ?>" /><br />
	<input type="hidden" name="email" id="email" value="<?php echo $posted['email']; ?>" /><br />
	<input  type="hidden"name="phone" value="<?php echo $posted['phone'] ?>" /><br />
	<input type="hidden" name="productinfo" value="<?php echo $posted['productinfo'] ?>" /><br />
	<input  type="hidden" name="surl" value="<?=site_url?>/paymentsuccess/?id=<?=$getId?>/?orderid=<?=$orderid?>/?mode=<?=$mode?>" size="64" /><br />
	<input type="hidden" name="furl" value="<?=site_url?>/paymentfailed/?id=<?=$getId?>" size="64" /><br />
	-->
	<input type="hidden" name="service_provider" value="payu_paisa" size="64" /><br />
</form>
	
<script>
	//document.payuForm.submit();
</script> 