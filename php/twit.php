<!-- PHP to get Tweeeets -->
<!-- PHP to get Tweeeets -->
	<?php
		require_once('TwitterAPIExchange.php');
		$anyFile = 'data/twitter_resultK.json';
		$twitter_result = false;
		if (file_exists($anyFile)) {
		    $dataK = json_decode(file_get_contents($anyFile));
		    if ($dataK->timestamp > time() - 1 * 30) {
		        $twitter_result = true;
		    }
		}

		//USE THIS TO CACHE DATA TO NOT EXCEED API RATE
		if (!$twitter_result) { 
		// cache doesn't exist or is older than 10 mins
			$settings = array(
				//Use consumer tokens from twitter dev
				'oauth_access_token' => "335716959-RMAbLsG9k0W5jDKqTBpAJI8nXUVte3KNCZJZdnhH",
			    'oauth_access_token_secret' => "FzlSogRw6tpSUXdAhODPUpYt8CvK2AzzhpVquqxRaRNqj",
			    'consumer_key' => "vTaaUVXJ6t6QPts0R7Ud1gASc",
			    'consumer_secret' => "o0Whf2KARnknbSNVVRfSIJ4DyMuM9Nvwl9ODLLjUCudHyNfMHg"
			);
			//request urls to twitter
			$url = "https://api.twitter.com/1.1/search/tweets.json";
			$urlJack = "https://api.twitter.com/1.1/statuses/user_timeline.json";
			$requestMethod = "GET";

			//query strings appeneded to request urls
			$getfieldKate = "?q=from:katespadeny+OR+from:katespadeuk&count=100&result_type=recent";
			$getfield = '?q=kate+spade+OR+#missadventure+OR+katespade&count=100&result_type=recent';
			$getfieldJack = "?screen_name=jackspadeny&count=3200&include_rts=true";
			$getfieldJ = '?q=jackspadeny&count=100';
			//start it up
			$twitter = new TwitterAPIExchange($settings);

			//get data back via OAuth
			$string = json_decode($twitter->setGetfield($getfield)
			->buildOauth($url, $requestMethod)
			->performRequest(),$assoc = TRUE);
			$stringKate = json_decode($twitter->setGetfield($getfieldKate)
			->buildOauth($url, $requestMethod)
			->performRequest(),$assoc = TRUE);
			$stringJ = json_decode($twitter->setGetfield($getfieldJ)
			->buildOauth($url, $requestMethod)
			->performRequest(),$assoc = TRUE);
			$stringJack = json_decode($twitter->setGetfield($getfieldJack)
			->buildOauth($urlJack, $requestMethod)
			->performRequest(),$assoc = TRUE);

		    $dataK = array ('twitter_result' => $string, 'timestamp' => time());
		    $dataKate = array ('twitter_result' => $stringKate, 'timestamp' => time());
		    $dataJ = array ('twitter_result' => $stringJ, 'timestamp' => time());
		    $dataJack = array ('twitter_result' => $stringJack, 'timestamp' => time());
		    file_put_contents('data/twitter_resultK.json', json_encode($dataK, JSON_PRETTY_PRINT));
		    file_put_contents('data/twitter_resultKate.json', json_encode($dataKate,JSON_PRETTY_PRINT));
		    file_put_contents('data/twitter_resultJ.json', json_encode($dataJ,JSON_PRETTY_PRINT));
		    file_put_contents('data/twitter_resultJack.json', json_encode($dataJack,JSON_PRETTY_PRINT));
		}
		function getNewJson(){
			if (file_exists($anyFile)) {
			    $dataK = json_decode(file_get_contents($anyFile));
			    if ($dataK->timestamp > time() - 1 * 30) {
			        $twitter_result = true;
			    }
			}

			//USE THIS TO CACHE DATA TO NOT EXCEED API RATE
			if (!$twitter_result) { 
			// cache doesn't exist or is older than 10 mins
				$settings = array(
					//Use consumer tokens from twitter dev
					'oauth_access_token' => "335716959-RMAbLsG9k0W5jDKqTBpAJI8nXUVte3KNCZJZdnhH",
				    'oauth_access_token_secret' => "FzlSogRw6tpSUXdAhODPUpYt8CvK2AzzhpVquqxRaRNqj",
				    'consumer_key' => "vTaaUVXJ6t6QPts0R7Ud1gASc",
				    'consumer_secret' => "o0Whf2KARnknbSNVVRfSIJ4DyMuM9Nvwl9ODLLjUCudHyNfMHg"
				);
				//request urls to twitter
				$url = "https://api.twitter.com/1.1/search/tweets.json";
				$urlJack = "https://api.twitter.com/1.1/statuses/user_timeline.json";
				$requestMethod = "GET";

				//query strings appeneded to request urls
				$getfieldKate = "?q=from:katespadeny+OR+from:katespadeuk&count=100&result_type=recent";
				$getfield = '?q=kate+spade+OR+#missadventure+OR+katespade&count=100&result_type=recent';
				$getfieldJack = "?screen_name=jackspadeny&count=3200&include_rts=true";
				$getfieldJ = '?q=jackspadeny&count=100';
				//start it up
				$twitter = new TwitterAPIExchange($settings);

				//get data back via OAuth
				$string = json_decode($twitter->setGetfield($getfield)
				->buildOauth($url, $requestMethod)
				->performRequest(),$assoc = TRUE);
				$stringKate = json_decode($twitter->setGetfield($getfieldKate)
				->buildOauth($url, $requestMethod)
				->performRequest(),$assoc = TRUE);
				$stringJ = json_decode($twitter->setGetfield($getfieldJ)
				->buildOauth($url, $requestMethod)
				->performRequest(),$assoc = TRUE);
				$stringJack = json_decode($twitter->setGetfield($getfieldJack)
				->buildOauth($urlJack, $requestMethod)
				->performRequest(),$assoc = TRUE);

			    $dataK = array ('twitter_result' => $string, 'timestamp' => time());
			    $dataKate = array ('twitter_result' => $stringKate, 'timestamp' => time());
			    $dataJ = array ('twitter_result' => $stringJ, 'timestamp' => time());
			    $dataJack = array ('twitter_result' => $stringJack, 'timestamp' => time());
			    file_put_contents('data/twitter_resultK.json', json_encode($dataK, JSON_PRETTY_PRINT));
			    file_put_contents('data/twitter_resultKate.json', json_encode($dataKate,JSON_PRETTY_PRINT));
			    file_put_contents('data/twitter_resultJ.json', json_encode($dataJ,JSON_PRETTY_PRINT));
			    file_put_contents('data/twitter_resultJack.json', json_encode($dataJack,JSON_PRETTY_PRINT));
			};
		}
	?>