<?php 
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
class Binance_features 
{
	public $btc_value = 0.00;
 	protected $base = "https://fapi.binance.com/fapi/", $api_key, $api_secret;
 	//protected $base = "https://testnet.binancefuture.com/fapi/", $api_key, $api_secret;
	public function __construct($para) {
		$this->api_key		 	= $para['api'];
		$this->api_secret 		= $para['secret'];
	}
	public function accountinfo() {
		$timeStamp			 = file_get_contents($this->base."v1/time");
		$timeStamp			 = json_decode($timeStamp,true);
		$timestamp           = $timeStamp['serverTime'];
		
		return $this->signedRequest("v2/account",[ 'timestamp'=>$timestamp ],"GET");
	}
	public function ping() {
		return $this->request("v1/ping");
	}
	public function time() {
		return $this->request("v1/time");
	}
	public function exchangeInfo() {
		return $this->request("v1/exchangeInfo");
	}

	public function buy($symbol, $quantity, $price,$type = "LIMIT", $stopPrice='', $flags = []) {
		return $this->order("BUY", $symbol, $quantity, $price, $type,$stopPrice, $flags);
	}
	public function sell($symbol, $quantity, $price, $type = "LIMIT", $stopPrice='',$flags = []) {
		return $this->order("SELL", $symbol, $quantity, $price, $type, $stopPrice,$flags);
	}
	public function cancel($symbol, $orderid) {
		return $this->signedRequest("v1/order",["symbol"=>$symbol, "orderId"=>$orderid], "DELETE");
	}
	
	public function change_margintype($symbol, $margintype) {
	   
	    $timeStamp			 = file_get_contents($this->base."v1/time");
		$timeStamp			 = json_decode($timeStamp,true);
		$timestamp           = $timeStamp['serverTime'];
		
		return $this->signedRequest("v1/marginType",["symbol"=>$symbol, "marginType"=>$margintype, 'timestamp'=>$timestamp ],"POST");
	}
	
	public function change_leverage($symbol, $leverage) {
	    $timeStamp			 = file_get_contents($this->base."v1/time");
		$timeStamp			 = json_decode($timeStamp,true);
		$timestamp           = $timeStamp['serverTime'];
		
		return $this->signedRequest("v1/leverage",["symbol"=>$symbol, "leverage"=>$leverage, 'timestamp'=>$timestamp ],"POST");
	}
	
	public function orderStatus($symbol, $orderid) {
		return $this->signedRequest("v1/order",["symbol"=>$symbol, "orderId"=>$orderid]);
	}
	public function openOrders($symbol='') {
	    
	    if($symbol!='')
		return $this->signedRequest("v1/openOrders",["symbol"=>$symbol]);
		else
		return $this->signedRequest("v1/openOrders");
	}
	public function getOrderDetails($symbol='',$orderId='') {
	    
	    $opt['symbol']  =   $symbol;
	    $opt['orderId']  =   $orderId;
	    return $this->signedRequest("v1/order", $opt, "GET");
	}
	public function positionRisk() {
		return $this->signedRequest("v2/positionRisk");
	}
	public function orders($symbol='', $limit = 500) {
	    
		
	    if($symbol!='')
		return $this->signedRequest("v1/allOrders",["symbol"=>$symbol, "limit"=>$limit]);
		else
		return $this->signedRequest("v1/allOrders",["limit"=>$limit]);
	}
	public function trades($symbol) {
		return $this->signedRequest("v1/userTrades",["symbol"=>$symbol]);
	}
	public function prices() {
		return $this->priceData($this->request("v1/ticker/price"));
	
	}
	public function price($symbol) {

	return $this->request("v1/ticker/price",["symbol"=>$symbol]);
	}
	public function bookPrices() {
		return $this->bookPriceData($this->request("v1/ticker/bookTicker"));
	}
	public function account() {
		return $this->signedRequest("v2/account");
	}
	public function depth($symbol) {
		return $this->request("v1/depth",["symbol"=>$symbol]);
	}
	public function balances($priceData = false) {
	    
		return $this->balanceData($this->signedRequest("v2/account"),$priceData);
	//	return $this->signedRequest("v2/account"); 
	}
	public function prevDay($symbol) {
		return $this->request("v1/ticker/24hr", ["symbol"=>$symbol]);
	}
	private function request($url, $params = [], $method = "GET") {
		$opt = [
			"http" => [
				"method" => $method,
				"header" => "User-Agent: Mozilla/4.0 (compatible; PHP Binance API)\r\n"
			]
		];
		$context = stream_context_create($opt);
		$query = http_build_query($params, '', '&');
		return json_decode(file_get_contents($this->base.$url.'?'.$query, false, $context), true);
	}
	private function signedRequest($url, $params = [], $method = "GET") {
		$timeStamp			 = file_get_contents($this->base."v1/time");
		$timeStamp			 = json_decode($timeStamp,true);
		$params['timestamp'] = $timeStamp['serverTime'];
		$query = http_build_query($params, '', '&');
		$signature = hash_hmac('sha256', $query, $this->api_secret);
		$opt = [
			"http" => [
				"method" => $method,
				"ignore_errors" => true,
				"header" => "User-Agent: Mozilla/4.0 (compatible; PHP Binance API)\r\nX-MBX-APIKEY: {$this->api_key}\r\nContent-type: application/x-www-form-urlencoded\r\n"
			]
		];
		if ( $method == 'GET' ) {
			// parameters encoded as query string in URL
			$endpoint = "{$this->base}{$url}?{$query}&signature={$signature}";
		} else {
			// parameters encoded as POST data (in $context)
			$endpoint = "{$this->base}{$url}";
			$postdata = "{$query}&signature={$signature}";
			$opt['http']['content'] = $postdata;
		}
		$context = stream_context_create($opt);
		return json_decode(file_get_contents($endpoint, false, $context), true);
	}
	private function order_test($side, $symbol, $quantity, $price, $type = "LIMIT", $flags = []) {
		$opt = [
			"symbol" => $symbol,
			"side" => $side,
			"type" => $type,
			"quantity" => $quantity,
			"recvWindow" => 60000
		];
		if ( $type == "LIMIT" ) {
			$opt["price"] = $price;
			$opt["timeInForce"] = "GTC";
		}
		
		// allow additional options passed through $flags
		if ( isset($flags['recvWindow']) ) $opt['recvWindow'] = $flags['recvWindow'];
		if ( isset($flags['timeInForce']) ) $opt['timeInForce'] = $flags['timeInForce'];
		if ( isset($flags['stopPrice']) ) $opt['stopPrice'] = $flags['stopPrice'];
		if ( isset($flags['stopLimitPrice']) ) $opt['stopLimitPrice'] = $flags['stopLimitPrice'];
		if ( isset($flags['icebergQty']) ) $opt['icebergQty'] = $flags['icebergQty'];
		return $this->signedRequest("v3/order/test", $opt, "POST");
	}
	
	public function sellOCO($data) {
		return $this->signedRequest("v3/order/oco", $data, "POST");
	}
	
	private function order($side, $symbol, $quantity, $price, $type = "LIMIT", $stopPrice='',$flags = []) {
		$opt = [
			"symbol" => $symbol,
			"side" => $side,
			"type" => $type,
			"quantity" => $quantity,
			"recvWindow" => 60000
		];
		if($stopPrice!='') {
		    $opt['stopPrice']=$stopPrice;
		}
		if($price!='')
	    $opt["price"] = $price;
	    
		if ( $type == "LIMIT" ) {
				
			$opt["timeInForce"] = "GTC";
		}
	//	else $opt["activationPrice"] = $price;
		
		// allow additional options passed through $flags
		if ( isset($flags['recvWindow']) ) $opt["recvWindow"] = $flags['recvWindow'];
		if ( isset($flags['timeInForce']) ) $opt["timeInForce"] = $flags['timeInForce'];
		if ( isset($flags['stopPrice']) ) $opt['stopPrice'] = $flags['stopPrice'];
		if ( isset($flags['icebergQty']) ) $opt['icebergQty'] = $flags['icebergQty'];
		//$opt=array();
		//echo'<pre>';print_r($opt);exit;
		return $this->signedRequest("v1/order", $opt, "POST");
	}
	//1m,3m,5m,15m,30m,1h,2h,4h,6h,8h,12h,1d,3d,1w,1M
	public function candlesticks($symbol, $interval = "5m") {
		return $this->request("v1/klines",["symbol"=>$symbol, "interval"=>$interval]);
	}
	private function balanceData($array, $priceData = false) {
		if ( $priceData ) $btc_value = 0.00;
		$balances = [];
		//return $array;
		$preparedArray['assets']=array();
		$availableBalance='0.00';
		foreach($array['assets'] as $assets) {
		    if($assets['asset']=='USDT') $availableBalance=$assets['availableBalance'];
		}
		foreach ( $array['positions'] as $obj ) {
		    if(strpos($obj['symbol'], 'USDT') !== false)
		    {
		        $obj['asset']=str_replace('USDT','',$obj['symbol']);
		        $obj['availableBalance']=$availableBalance;
		        $preparedArray['assets'][]=$obj;
		    }
		}
		$obj=array();
		$obj['asset']='USDT';
		$obj['availableBalance']=$availableBalance;
		$obj['initialMargin']=0;
		$preparedArray['assets'][]=$obj;
		
		$array['assets']=$preparedArray['assets'];
		foreach ( $array['assets'] as $obj ) {
		    
			$asset = $obj['asset'];
			$marginType='CROSSED';
			if($obj['isolated']==1)
			    $marginType='ISOLATED';
			$balances[$asset] = ["available"=>$obj['availableBalance'], "onOrder"=>$obj['availableBalance'], "btcValue"=>0.00000000,'leverage'=>$obj['leverage'],'marginType'=>$marginType];//$obj['initialMargin']
			if ( $priceData ) {
				if ( $obj['availableBalance'] < 0.00000001 ) continue;
				if ( $asset == 'BTC' ) {
					$balances[$asset]['btcValue'] = $obj['availableBalance'];
					$btc_value+= $obj['availableBalance'];
					continue;
				}
				$btcValue = number_format($obj['availableBalance'] * $priceData[$asset.'BTC'],8,'.','');
				$balances[$asset]['btcValue'] = $btcValue;
				$btc_value+= $btcValue;
			}
		}
		if ( $priceData ) {
			uasort($balances, function($a, $b) { return $a['btcValue'] < $b['btcValue']; });
			$this->btc_value = $btc_value;
		}
	
		return $balances; 
	}
	private function bookPriceData($array) {
		$bookprices = [];
		foreach ( $array as $obj ) {
			$bookprices[$obj['symbol']] = [
				"bid"=>$obj['bidPrice'],
				"bids"=>$obj['bidQty'],
				"ask"=>$obj['askPrice'],
				"asks"=>$obj['askQty']
			];
		}
		return $bookprices;
	}
	private function priceData($array) {
		$prices = [];
		foreach ( $array as $obj ) {
			$prices[$obj['symbol']] = $obj['price'];
		}
		return $prices;
	}

	
}

?>
