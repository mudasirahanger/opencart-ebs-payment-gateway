		<?php
			$string = "$secret_key|$account_id|$amount|$reference_no|$return_url|$mode";
			$secure_hash = md5($string);
		?>
	<form action="<?php echo $action; ?>" method="post" id="payment">
			<input name="secure_hash" type="hidden" value="<?php echo $secure_hash; ?>" />
			<input type="hidden" name="account_id" value="<?php echo $account_id; ?>" />
		    <input type="hidden" name="reference_no" value="<?php echo $reference_no; ?>" />
			<input type="hidden" name="amount" value="<?php echo $amount; ?>" /> 
			<input type="hidden" name="description" value="<?php echo $description; ?>" />
  			<input type="hidden" name="name" value="<?php echo $name; ?>" />
  		    <input type="hidden" name="address" value="<?php echo $address; ?>" />
	        <input type="hidden" name="city" value="<?php echo $city; ?>" />
	        <input type="hidden" name="state" value="<?php echo $state; ?>" />
		    <input type="hidden" name="postal_code" value="<?php echo $postal_code; ?>" />
		    <input type="hidden" name="country" value="<?php echo $country; ?>" />
		    <input type="hidden" name="email" value="<?php echo $email; ?>" />
		    <input type="hidden" name="phone" value="<?php echo $phone; ?>" />
		    <input type="hidden" name="ship_name" value="<?php echo $ship_name; ?>" />			
  		    <input type="hidden" name="ship_address" value="<?php echo $ship_address; ?>" />
		    <input type="hidden" name="ship_city" value="<?php echo $ship_city; ?>" />
		    <input type="hidden" name="ship_state" value="<?php echo $ship_state; ?>" />
			<input type="hidden" name="ship_postal_code" value="<?php echo $ship_postal_code; ?>" />
		    <input type="hidden" name="ship_country" value="<?php echo $ship_country; ?>" />
		    <input type="hidden" name="ship_phone" value="<?php echo $ship_phone; ?>" />
		    <input type="hidden" name="return_url" value="<?php echo $return_url; ?>" />
		    <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
		   
 <div class="buttons">
    <div class="right"><a onclick="$('#payment').submit();" class="button"><span><?php echo $button_confirm; ?></span></a></div>
  </div>			
</form>
