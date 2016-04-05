<!DOCTYPE html>
<html>
	<head>
		<title>Window 8 metro style</title>
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
		<meta name="description" content="Window 8 metro style" />
		<meta name="keywords" content="javascript, dynamic, grid, layout, jquery plugin, nested grid, metro style, window 8 metro style"/>
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/metro-style.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/freewall.js"></script>
		<style type="text/css">
			html,body {
				margin: 0px;
				width: 100%;
				height: 100%;
				padding: 0px;
			}
			.layout {
				position: fixed;
				top: 0px;
				left: 0px;
				right: 0px;
				bottom: 0px;
				margin: 4em 2%;
			}
			.head {
				margin: 1em 4em;
			}
			.free-wall {
				height: 100%;
				margin: auto;
				overflow: hidden;
			}
		</style>
	</head>
	<body>
		<!-- PHP to get Tweeeets -->
		<?php
			//https://twitter.com/raybrokowski
			require_once('TwitterAPIExchange.php');
			/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
			ini_set('default_charset', 'utf-8');
			$settings = array(
				'oauth_access_token' => "335716959-RMAbLsG9k0W5jDKqTBpAJI8nXUVte3KNCZJZdnhH",
			    'oauth_access_token_secret' => "FzlSogRw6tpSUXdAhODPUpYt8CvK2AzzhpVquqxRaRNqj",
			    'consumer_key' => "vTaaUVXJ6t6QPts0R7Ud1gASc",
			    'consumer_secret' => "o0Whf2KARnknbSNVVRfSIJ4DyMuM9Nvwl9ODLLjUCudHyNfMHg"
			);
			$url = "https://api.twitter.com/1.1/search/tweets.json";
			$urlKate = "https://api.twitter.com/1.1/search/tweets.json";
			$requestMethod = "GET";

			$getfieldKate = "?q=from:katespadeny+OR+from:katespadeuk&count=40&result_type=recent&lang=en";
			$getfield = '?q=kate+spade+OR+#missadventure+OR+katespade&count=40&result_type=recent&lang=en';

			$twitter = new TwitterAPIExchange($settings);

			$string = json_decode($twitter->setGetfield($getfield)
			->buildOauth($url, $requestMethod)
			->performRequest(),$assoc = TRUE);
			$stringKate = json_decode($twitter->setGetfield($getfieldKate)
			->buildOauth($urlKate, $requestMethod)
			->performRequest(),$assoc = TRUE);

			if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
		?>

		<!-- HTML FOR THE PAGE -->
		<script>
			var obj = <?php echo json_encode($string,JSON_PRETTY_PRINT); ?>;
			var objKate = <?php echo json_encode($stringKate,JSON_PRETTY_PRINT); ?>;
		</script>
		<div class="layout">
			<div id="freewall" class="free-wall">
				<div class="item size21 level1">
					<div class="padding">
						<h2>Kate Spade Real Time Talk</h2>
						<div>Real time tweets from Kate Spade entities and customers who love our products!</div>
					</div>
				</div>

				<div class="size22 level1" data-fixSize=0 data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="item size11"></div>
					<div class="item size11"></div>
					<div class="item size11"></div>
					<div class="item size11"></div>
					<div class="item size11"></div>
					<div class="item size11"></div>
				</div>

				<div class="item size21 level1"></div>
				<div class="item size21 level1"></div>

				<div class="item size21 level1 desktop-box">
					<div class="wallpaper">
						<div class="text-bottom">
							<h1><a href="http://katespade.co">Kate Spade</a></h1>
						</div>
					</div>
				</div>

				<div class="size22 level1" data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="item size11"></div>

					<div class="size11" data-fixSize=0 data-nested=".size2-2" data-cellW=70 data-cellH=70 >
						<div class="item size2-2"><i class="icon-facebook icon-2x"></i></div>
						<div class="item size2-2"><i class="icon-twitter icon-2x"></i></div>
						<div class="item size2-2"><i class="icon-linkedin icon-2x"></i></div>
						<div class="item size2-2"><i class="icon-google-plus icon-2x"></i></div>
					</div>

					<div class="item size11"></div>

					<div class="item size11"></div>

					<div class="item size11"></div>

					<div class="item size11"></div>

				</div>

				<div class="item size21 level1"></div>

				<div class="item size22 level1"><div class="map"></div></div>

				<!--PICTURE -->
				<div class="item size21 level1"></div>

				<div class="size22 level1" data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="item size11"></div>

					<div class="item size11"></div>

					<div class="size11" data-fixSize=0 data-nested=".size2-2" data-cellW=70 data-cellH=70 >
						<div class="item size2-2"></div>
						<div class="item size2-2"></div>
						<div class="item size2-2"></div>
						<div class="item size2-2"></div>
						<div class="item size2-2"></div>
						<div class="item size2-2"></div>
					</div>

					<div class="item size11"></div>
				</div>

				<div class="item size21 level1"></div>

				<div class="size21 level1" data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10>
					<div class="item size11"></div>
					<div class="item size11"></div>
				</div>

				<div class="item size21 level1"></div>

			</div> <!-- freewall -->
		</div> <!-- layout -->

		<script type="text/javascript">

			var colour = [
				"rgb(72, 166, 66)",
				"rgb(212, 175,55)",
				"rgb(0, 0, 0)",
				"rgb(255,105,180)"
				
			];

			$(".free-wall .item").each(function() {
				var backgroundColor = colour[colour.length * Math.random() << 0];
				$(this).css({
					backgroundColor: backgroundColor
				});
			});

			$(function() {
				var wall = new Freewall("#freewall");
				wall.reset({
					selector: '.level1',
					cellW: 320,
					cellH: 160,
					fixSize: 0,
					gutterX: 20,
					gutterY: 10,
					onResize: function() {
						wall.fitZone();
					}
				});
				wall.fitZone();
				$(window).trigger("resize");
			});

		</script>

	</body>
</html>
