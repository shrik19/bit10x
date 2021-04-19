<?php

$data = array(
    'merchant_id' => '10016501', //testing key
   'merchant_key' => 'fxiisx1h8stty', //testing key
   // 'merchant_id' => '15756686',//live
    //'merchant_key' => '1c9vpqme14clo', //live
    'return_url' => base_url().'user/',
    'notify_url' => base_url().'user/ipn_pay',
    'name_first' => trim($user->name),
    'name_last'  => trim($user->surname),
    'email_address'=> trim($user->email),
    'm_payment_id' => time()
  );
 
    
$pachageData							= $data;

$pachageData['amount']					= trim(number_format( sprintf( "%.2f", $amount ), 2, '.', '' ));

$pachageData['item_name']		 		= trim($coin->coin);
$pachageData['item_description']	 	= trim(str_replace('+',' ','Buying '.$coin->coin.' at BIT10x'));
$pachageData['custom_int1']	 			= $coin->id;
$pachageData['custom_int2']	 			= $this->session->userdata('is_logged_in');

$pachageData							= prepareData($pachageData);


function prepareData($data)
{
	$pfOutput 							= [];
	foreach( $data as $key => $val )
	{
		if(!empty($val))
		 {
		 	$str						= $key.'='.urlencode(trim($val));
			$pfOutput[]					= $str;
		 }
	}
	
	$getString							= http_build_query($data);
	$passPhrase 						= 'Passw0rd123456'; //testing key
    //$passPhrase                         = 'BlockAlphasubs00'; //live
	$getString2 						= $getString.'&passphrase='. urlencode( trim( $passPhrase ) );
	$sig								= md5( $getString2 );
	$data['signature'] 					= $sig;
	
	// print("<script>console.log('$getString2');</script>");
// 	echo $sig;
	//die;
	
	$testingMode = true;
	$pfHost 								= $testingMode ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
	$htmlForm 								= '<form id="form" action="https://'.$pfHost.'/eng/process" method="post">'; 
	foreach($data as $name=> $value)
	{ 
		$htmlForm .= '<input name="'.$name.'" type="hidden" value="'.$value.'" />'; 
	} 
	$htmlForm.='</form>';
//	$htmlForm .= '<input type="submit" class="btn-success" value="Subscribe" /></form>'; 	
	return $htmlForm;
}


echo $pachageData;
echo'
Processing.. not to refresh page
';
?>
<script>document.getElementById("form").submit();</script>
