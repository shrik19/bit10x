<?php
class Bybit 
{
	public $btc_value = 0.00;
 	protected $base = "https://api.bybit.com/", $api_key, $api_secret;
 	
	public function __construct($para) {
		$this->api_key		 	= $para['api'];
		$this->api_secret 		= $para['secret'];
	}
		public function exchangeInfo() {
		return $this->request("v2/public/symbols");
	}
	public function buy($symbol, $quantity, $price, $type = "LIMIT", $flags = []) {
		return $this->order("BUY", $symbol, $quantity, $price, $type, $flags);
	}
	public function sell($symbol, $quantity, $price, $type = "LIMIT", $flags = []) {
		return $this->order("SELL", $symbol, $quantity, $price, $type, $flags);
	}
	public function cancel($symbol, $orderid) {
		return $this->signedRequest("v2/private/order/cancel",["symbol"=>$symbol, "orderId"=>$orderid], "POST");
	}
	public function openOrders($symbol) {
		return $this->signedRequest("/open-api/order/list",["symbol"=>$symbol,"order_status"=>"Filled,New"]);
	}
	public function orders($symbol, $limit = 500) {
		return $this->signedRequest("/open-api/order/list",["symbol"=>$symbol, "limit"=>$limit]);
	}
	public function prices() {
		return $this->priceData($this->request("/v2/public/tickers"));
	}
	public function bookPrices() {
		return $this->bookPriceData($this->request("/v2/public/tickers"));
	}
	private function bookPriceData($array) {
		$bookprices = [];
		foreach ( $array['result'] as $obj ) {
			$bookprices[$obj['symbol']] = [
				"bid"=>$obj['bid_price'],
				"ask"=>$obj['ask_price'],
			];
		}
		return $bookprices;
	}
	private function priceData($array) {
		$prices = [];
		foreach ( $array['result'] as $obj ) {
			$prices[$obj['symbol']] = $obj['index_price'];
		}
		return $prices;
	}
	private function order($side, $symbol, $quantity, $price, $type = "LIMIT", $flags = []) {
		$opt = [
			"symbol" => $symbol,
			"side" => $side,
			"order_type" => $type,
			"qty" => $quantity,
			"recvWindow" => 60000
		];
		
		
		$opt["price"] = $price;
		$opt["time_in_force"] = "GoodTillCancel";
		
		// allow additional options passed through $flags
		if ( isset($flags['recvWindow']) ) $opt["recvWindow"] = $flags['recvWindow'];
		if ( isset($flags['timeInForce']) ) $opt["time_in_force"] = $flags['timeInForce'];
		if ( isset($flags['stop_loss']) ) $opt['stop_loss'] = $flags['stop_loss'];
		if ( isset($flags['take_profit']) ) $opt['take_profit'] = $flags['take_profit'];
		return $this->signedRequest("v2/private/order/create", $opt, "POST");
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
				"header" => "User-Agent: Mozilla/4.0 (compatible; PHP Bybit API)\r\nX-MBX-APIKEY: {$this->api_key}\r\nContent-type: application/x-www-form-urlencoded\r\n"
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
	
}