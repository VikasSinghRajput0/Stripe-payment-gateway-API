



<?php

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "description=hii am vikas&email=vk41@gmail.com&name=aman&address[city]=punjab&address[country]=INDIA&address[state]=punjab&phone=9805487548");

	curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_51Hz4GEKEezb4E17nriTz1ejcBu7pMAHrIuYUkbd4Rlkmuk3rrouSz2ucPMiSx5FUgUn1wK3jGtZf4DtChRi8aXrF00BpQoTI4o' . ':' . '');

	$headers = array();
	$headers[] = 'Content-Type: application/x-www-form-urlencoded';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);

	$customers = json_decode($result,true);
 //echo'<pre>';
  // print_r($customers);
  //echo '</pre>';



$customer_id = $customers['id'];
if(!empty($customer_id))
{
			$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=12&card[exp_year]=2025&card[cvc]=314");
		curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_51Hz4GEKEezb4E17nriTz1ejcBu7pMAHrIuYUkbd4Rlkmuk3rrouSz2ucPMiSx5FUgUn1wK3jGtZf4DtChRi8aXrF00BpQoTI4o' . ':' . '');

		$headers = array();
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		$tokens = json_decode($result,true);

 $token_id = $tokens['id'];
 if(!empty($token_id))
 {
 	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.stripe.com/v1/customers/$customer_id/sources");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "source=$token_id");
		curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_51Hz4GEKEezb4E17nriTz1ejcBu7pMAHrIuYUkbd4Rlkmuk3rrouSz2ucPMiSx5FUgUn1wK3jGtZf4DtChRi8aXrF00BpQoTI4o' . ':' . '');

		$headers = array();
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);

	    $cards = json_decode($result,true);
	   

$card_id =$cards['id'];
if(!empty($token_id))
{


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "amount=2000&currency=inr&source=$token_id&description=My");
curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_51Hz4GEKEezb4E17nriTz1ejcBu7pMAHrIuYUkbd4Rlkmuk3rrouSz2ucPMiSx5FUgUn1wK3jGtZf4DtChRi8aXrF00BpQoTI4o' . ':' . '');

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

$charges =json_decode($result,true);
echo '<pre>';
	print_r($charges);
	echo'</pre>';
	

}

}
}
                       //print_r($token_id);die;


	





?>
