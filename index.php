<?php 

		// + Get course BTC +
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,'https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=USD');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Ответ сервера сохранять в переменную, а не на экран
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 	//Переходить по редиректам
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response_data = curl_exec($ch);

		if (curl_errno($ch)) {
			$this->log->write('API ERROR :: CURL failed ' . curl_error($curl) . '(' . curl_errno($curl) . ')');
		}
		curl_close($ch);
		$btc_course = 0;

		if ($response_data !== false) {			
			$response_data = json_decode($response_data, true);

			if (isset($response_data[0]['price_usd'])) {
				$btc_course =  $response_data[0]['price_usd'];
			}
		}
		
		echo $btc_course;
		
		// - Get course BTC -

?>