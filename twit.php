<!DOCTYPE html>
<html>
	<head>
		<title>KS Real Time Talk</title>
		<meta name="viewport" content="width=device-width, initial-scale=.5, maximum-scale=1, user-scalable=0"/>
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
			.size42 {
				width: 100%;
				height: 50%;
			}
			.size222 {
				width: 50%;
				height: 50%;
			}
			.size3200 {
				width: 320px;
				height: 320px;
			}
		</style>
	</head>
		<body>
		<!-- PHP to get Tweeeets -->
		<?php
			require_once('TwitterAPIExchange.php');
			ini_set('default_charset', 'utf-8');
			//Use consumer tokens from twitter dev
			$settings = array(
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
			$getfieldKate = "?q=from:katespadeny+OR+from:katespadeuk&count=100&result_type=recent&lang=en";
			$getfield = '?q=kate+spade+OR+#missadventure+OR+katespade&count=100&result_type=recent&lang=en';
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
		?>
		<!-- Move to seperate JS file -->
		<script>
			//Split the JS var into sepreate arrays MEDIA||TEXT
			function splitObjMedia(object, length, isProfile){
				var mediaArr = [], textArr = [];
				for(var i = 0; i < length; i++){
					//Need to check if using twitter search or twitter profile
					if(isProfile){
						if(object[i].entities.hasOwnProperty('media'))
							mediaArr.push([object[i].user.screen_name,object[i].text,object[i].entities.media[0].media_url_https]);
						else
							textArr.push([object[i].user.screen_name,object[i].text]);
					}
					else{
						if(object.statuses[i].entities.hasOwnProperty('media'))
							mediaArr.push([object.statuses[i].user.screen_name,object.statuses[i].text,object.statuses[i].entities.media[0].media_url_https]);
						else
							textArr.push([object.statuses[i].user.screen_name,object.statuses[i].text]);
					}
				}
				return {
					mediaArr: mediaArr,
					textArr: textArr
				};
			};

			//Split the array for each div
			function splitArray(arr, length){
				var newArr = [];
				for(var i = 0; i < length; i++){
					newArr.push(arr[i]);
					arr.shift();
				}
				return newArr;
			};

			//Display the items in the divs of choice
			function displayMedia(length, bottomTextImage, classID, arr, isMedia){
				var limit = (length - 1);
				document.getElementById(bottomTextImage).innerHTML = "@" + arr[0][0] + ":</br>" + arr[0][1];
				if(isMedia)
					document.getElementById(classID).style.backgroundImage =  "url('" + arr[0][2] +"')";
				for (var i=	1;i< arr.length;i++) {
				   (function(ind) {
				       setTimeout(function(){
				           document.getElementById(bottomTextImage).innerHTML = "@" + arr[ind][0] + ":</br>" + arr[ind][1];
				           	if(isMedia)
				           		document.getElementById(classID).style.backgroundImage =  "url('" + arr[ind][2] +"')";
				           	if(ind == limit){
				               displayMedia(length, bottomTextImage, classID, arr, isMedia );
				           	}
				       }, 1000 + (1000 * ind));
				   })(i);
				}
			};
			//Grab PHP string as JS variable
			var obj = <?php echo json_encode($string,JSON_PRETTY_PRINT); ?>;
			var objKate = <?php echo json_encode($stringKate,JSON_PRETTY_PRINT); ?>;
			var objJ = <?php echo json_encode($stringJ,JSON_PRETTY_PRINT); ?>;
			var objJack = <?php echo json_encode($stringJack,JSON_PRETTY_PRINT); ?>;

			var onlyMedia = splitObjMedia(obj, obj.statuses.length, false).mediaArr;
			var onlyText = splitObjMedia(obj, obj.statuses.length, false).textArr;
			var onlyMediaKate = splitObjMedia(objKate, objKate.statuses.length, false).mediaArr;
			var onlyTextKate = splitObjMedia(objKate, objKate.statuses.length, false).textArr;
			var onlyMediaJ = splitObjMedia(objJ, objJ.statuses.length, false).mediaArr;
			var onlyTextJ = splitObjMedia(objJ, objJ.statuses.length, false).textArr;
			var onlyMediaJack = splitObjMedia(objJack, objJack.length, true).mediaArr;
			var onlyTextJack = splitObjMedia(objJack, objJack.length, true).textArr;

			//split them to display them in seperate divs
			var otherMediaLength = Math.floor(onlyMedia.length/3);
			var ksTextLength = Math.floor(onlyTextKate.length/6);
			var jsTextLength = Math.floor(onlyTextJack.length/3);
			var jsMediaLength = Math.floor(onlyMediaJack.length/2);
			var otherText1 = splitArray(onlyText,Math.floor(onlyText.length/2));//used
			var otherText2 = onlyText;//used
			var otherMedia1 = splitArray(onlyMedia,otherMediaLength); //used
			var otherMedia2 = splitArray(onlyMedia,otherMediaLength);//used
			var otherMedia3 = onlyMedia;//used
			var ksText1 = splitArray(onlyTextKate,ksTextLength);//Used
			var ksText2 = splitArray(onlyTextKate,ksTextLength);//used
			var ksText3 = splitArray(onlyTextKate,ksTextLength);//used
			var ksText4 = splitArray(onlyTextKate,ksTextLength);//used
			var ksText5 = splitArray(onlyTextKate,ksTextLength);//used
			var ksText6 = onlyTextKate;//used
			var ksMedia = onlyMediaKate; //used
			var jsText1 = splitArray(onlyTextJack,jsTextLength);//used
			var jsText2 = splitArray(onlyTextJack,jsTextLength);//used
			var jsText3 = onlyTextJack;//used
			var jsMedia = splitArray(onlyMediaJack,jsMediaLength);//used
			var jsMedia1 = onlyMediaJack; //used
		</script>
		<div class="layout">
			<div id="freewall" class="free-wall">
			
				<!--DESCRIPTION -->
				<div class="item size21 level1">
					<div class="padding">
						<h2>Kate Spade Real Time Talk</h2>
						<div>Real time tweets from Kate Spade entities and customers who love our products!</div>
					</div>
				</div>
				<!--KATE SPADE TWEETS AND USER -->
				<div class="size22 level1" data-fixSize=0 data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="item size11">
						<div id = "otherText1ID" class = "divCenter">
							<script>displayMedia(otherText1.length, "otherText1ID", " ", otherText1, false);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "otherText2ID" class = "divCenter">
							<script>displayMedia(otherText2.length, "otherText2ID", " ", otherText2, false);</script>
						</div>
					</div>

					<div class="item size11">
						<div id = "ksText1ID" class = "divCenter">
							<script>displayMedia(ksText1.length, "ksText1ID", " ", ksText1, false);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "otherMedia3IMG" class = "map2">
						</div>
						<div id = "otherMedia3BottomText" class = "tempBottomSmall">
							<!-- KSMEDIA!!!!-->
							<script>displayMedia(otherMedia3.length, "otherMedia3BottomText", "otherMedia3IMG", otherMedia3, true);</script>
						</div>
					</div>
				</div>
				<!-- KATE SPADE WALLPAPER LINK -->
				<div class="item size21 level1 desktop-box">
					<a href="https://katespade.com">
						<div class="wallpaper">
						</div>
					</a>
				</div>
				<!-- KATE SPADE TWEETS AND SOCIAL -->
				<div class="size22 level1" data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="size11" data-fixSize=0 data-nested=".size2-2" data-cellW=70 data-cellH=70 >
						<a href = "https://www.facebook.com/katespadeny">
							<div class="item size2-2">
								<i class="icon-facebook icon-2x"></i>
							</div>
						</a>
						<a href = "https://twitter.com/katespadeny">
							<div class="item size2-2">
									<i class="icon-twitter icon-2x"></i>
							</div>
						</a>
						<a href = "https://www.linkedin.com/company/kate-spade-new-york">
							<div class="item size2-2">								
								<i class="icon-linkedin icon-2x"></i>
							</div>
						</a>
						<a href = "https://plus.google.com/115965100513811940775/posts">
							<div class="item size2-2">
								<i class="icon-google-plus icon-2x"></i>
							</div>
						</a>
					</div>		
					<div class="item size11">
							<div id = "ksText4ID" class = "divCenter">
								<script>displayMedia(ksText4.length, "ksText4ID", " ", ksText4, false);</script>
							</div>
					</div>
					<div class="item size11">
						<div id = "ksText3ID" class = "divCenter">
							<script>displayMedia(ksText3.length, "ksText3ID", " ", ksText3, false);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "ksText6ID" class = "divCenter">
							<script>displayMedia(ksText6.length, "ksText6ID", " ", ksText6, false);</script>
						</div>
					</div>
				</div>
				<!-- JS SPLIT WITH BANNER MIN VIEW -->
				<div class="size22 level1" data-fixSize=0 data-nested=".level-1" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="item level-1 size42">
						<a href="https://jackspade.com">
							<div class="wallpaperJack">
								<div class="text-bottom">
								JACK SPADE
								</div>
							</div>
						</a>
					</div>
					<div class="item level-1 size222">
						<div id = "jsMediaIMG1" class = "map2">
						</div>
						<div id = "jsMediaBottom1" class = "tempBottomSmall">
							<script>displayMedia(jsMedia1.length, "jsMediaBottom1", "jsMediaIMG1", jsMedia1, true);</script>
						</div>
					</div>
					<div class="item level-1 size222">
						<div id = "ksText2ID" class = "divCenter">
							<script>displayMedia(ksText2.length, "ksText2ID", " ", ksText2, false);</script>
						</div>
					</div>
				</div>
				<!-- JACK SPADE TWEETS AND SOCIAL STUFF -->
				<div class="size22 level1" data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="size11" data-fixSize=0 data-nested=".size2-2" data-cellW=70 data-cellH=70 >
						<a href = "https://www.facebook.com/jackspadeny">
							<div class="item size2-2">
								<i class="icon-facebook icon-2x"></i>
							</div>
						</a>
						<a href = "https://twitter.com/jackspadeny">
							<div class="item size2-2">
									<i class="icon-twitter icon-2x"></i>
							</div>
						</a>
						<a href = "https://www.linkedin.com/company/jack-spade">
							<div class="item size2-2">								
								<i class="icon-linkedin icon-2x"></i>
							</div>
						</a>
						<a href = "https://plus.google.com/115965100513811940775/posts">
							<div class="item size2-2">
								<i class="icon-google-plus icon-2x"></i>
							</div>
						</a>
					</div>
					<div class="item size11">
						<div id = "jack2ID" class = "divCenter">
							<script>displayMedia(jsText2.length, "jack2ID", " ", jsText2, false);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "jack3ID" class = "divCenter">
							<script>displayMedia(jsText3.length, "jack3ID", " ", jsText3, false);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "jack1ID" class = "divCenter">
							<script>displayMedia(jsText1.length, "jack1ID", " ", jsText1, false);</script>
						</div>
					</div>
				</div>
				<!-- KATE SPADE PICTURES ENTITES -->
				<div class="item size22 level1">
					<div id = "otherMedia2IMG" class = "map2">
					</div>
					<div id = "otherMedia2BottomText" class = "tempBottom">
						<script>displayMedia(otherMedia2.length, "otherMedia2BottomText", "otherMedia2IMG", otherMedia2, true);</script>
					</div>
				</div>
				<!-- JS ENTITY BIG PICTURE -->
				<div class="item size22 level1">
					<div id = "imgJSBIG" class = "map2"></div>
					<div id = "jackMediaBig" class = "tempBottom">
						<script>
							displayMedia(jsMedia.length, "jackMediaBig", "imgJSBIG", jsMedia, true);
						</script>
					</div>
				</div>
				<!-- JS MEDIA SPLIT WITH BANNER -->
				<div class="size22 level1" data-fixSize=0 data-nested=".level-1" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="brick level-1 size42">
						<a href="https://jackspade.com">
							<div class="wallpaperJack">
								<div class="text-bottom">
								JACK SPADE
								</div>
							</div>
						</a>
					</div>
					<div class="brick level-1 size222"></div>
					<div class="brick level-1 size222">
						<div id = "ksText2ID" class = "divCenter">
							<script>displayMedia(ksText2.length, "ksText2ID", " ", ksText2, false);</script>
						</div>
					</div>
				</div>
				<!--KS MEDIA BIG -->
				<div class="item size21 level1">
					<div id = "ksMediaIMG" class = "map2">
					</div>
					<div id = "ksMediaBottomText" class = "tempBottom">
						<script>displayMedia(ksMedia.length, "ksMediaBottomText", "ksMediaIMG", ksMedia, true);</script>
					</div>
				</div>
				<!--JS MEDIA ENTITY SMALL -->
				<div class="item size21 level1">
					<div id = "imgJS" class = "map2"></div>
					<div id = "jackMedia" class = "tempBottom">
						<script>
							displayMedia(jsMedia.length, "jackMedia", "imgJS", jsMedia, true);
						</script>
					</div>
				</div>

			</div>
		</div> 

		<script type="text/javascript">
			//document.body.style.zoom = "90%";
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
