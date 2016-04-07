﻿<!DOCTYPE html>
<html>
	<head>
		<title>KS Real Time Talk</title>
		<meta name="viewport" content="width=device-width, initial-scale=.5, maximum-scale=1, user-scalable=0"/>
		<meta http-equiv="refresh" content="120">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/metro-style.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/freewall.js"></script>
		<script type="text/javascript" src="js/home.js"></script>
		<?php include 'php/twit.php'; ?>
		<script> jQuery(window).load(function(){jQuery('#overlay').fadeOut();});
function update() {
    $.ajax({
        url: 'php/twit.php', //php          
        success: function (data) {
        }
    });
}

$(document).ready(update); // Call on page load
//                ^^^^^^


setInterval(update, 10000); //every 10 secs
//          ^^^^^^

		</script>
		
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
			#overlay {
		        background: #ffffff;
		        color: #666666;
		        position: fixed;
		        height: 100%;
		        width: 100%;
		        z-index: 5000;
		        top: 0;
		        left: 0;
		        float: left;
		        text-align: center;
		        padding-top: 25%;
		    }
		</style>

	</head>
	<body>
		<div id="overlay">
		    <img src="i/201.gif" alt="Loading" /><br/>
		    Loading...
		</div>
		<!-- Move to seperate JS file -->
		<div class="layout">

			<div id="freewall" class="free-wall">
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
							<script>displayMedia(otherText1.length, "otherText1ID", " ", otherText1, false, 13000, 13000);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "otherText2ID" class = "divCenter">
							<script>displayMedia(otherText2.length, "otherText2ID", " ", otherText2, false, 13500, 13500);</script>
						</div>
					</div>

					<div class="size11" data-fixSize=0 data-nested=".size2-2" data-cellW=70 data-cellH=70 >
						<a href = "https://www.facebook.com/katespadeny">
							<div class="item size2-2">
								<i class="icon-facebook icon-2x"></i><br><i class = "socialFont">Kate Spade</i>
							</div>
						</a>
						<a href = "https://twitter.com/katespadeny">
							<div class="item size2-2">
									<i class="icon-twitter icon-2x"></i><br><i class = "socialFont">Kate Spade</i>
							</div>
						</a>
						<a href = "https://www.linkedin.com/company/kate-spade-new-york">
							<div class="item size2-2">								
								<i class="icon-linkedin icon-2x"></i><br><i class = "socialFont">Kate Spade</i>
							</div>
						</a>
						<a href = "https://www.instagram.com/katespadeny/">
							<div class="item size2-2">
								<i class="icon-instagram icon-2x"></i><br><i class = "socialFont">Kate Spade</i>
							</div>
						</a>
					</div>	
					<div class="item size11">
						<div id = "otherMedia3IMG" class = "map2">
						</div>
						<div id = "otherMedia3BottomText" class = "tempBottomSmall">
							<!-- KSMEDIA!!!!-->
							<script>displayMedia(otherMedia3.length, "otherMedia3BottomText", "otherMedia3IMG", otherMedia3, true, 15000, 18000);</script>
						</div>
					</div>
				</div>
				<!-- KATE SPADE WALLPAPER LINK -->
				<div class="item size21 level1 desktop-box">
					<a href="https://katespade.com">
						<div class="wallpaper">
						<div class="text-bottom-right">
								KATE SPADE
								</div>
						</div>
					</a>
				</div>
				<!-- KATE SPADE TWEETS AND SOCIAL -->
				<div class="size22 level1" data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="item size11">
						<div id = "ksText1ID" class = "divCenter">
							<script>displayMedia(ksText1.length, "ksText1ID", " ", ksText1, false, 13000, 15000);</script>
						</div>	
					</div>
					<div class="item size11">
							<div id = "ksText4ID" class = "divCenter">
								<script>displayMedia(ksText4.length, "ksText4ID", " ", ksText4, false, 15000, 16000);</script>
							</div>
					</div>
					<div class="item size11">
						<div id = "ksText3ID" class = "divCenter">
							<script>displayMedia(ksText3.length, "ksText3ID", " ", ksText3, false, 14000, 15000);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "ksText6ID" class = "divCenter">
							<script>displayMedia(ksText6.length, "ksText6ID", " ", ksText6, false, 13000, 17000);</script>
						</div>
					</div>
				</div>
				<div class="size22 level1" data-fixSize=0 data-nested=".level-1" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="item level-1 size42">
						<a href="https://jackspade.com">
							<div class="wallpaperJack">
								<div class="text-bottom-left">
								JACK SPADE
								</div>
							</div>
						</a>
					</div>
					<div class="item level-1 size222">
						<div id = "jsMediaIMG1" class = "map2">
						</div>
						<div id = "jsMediaBottom1" class = "tempBottomSmall">
							<script>displayMedia(jsMedia1.length, "jsMediaBottom1", "jsMediaIMG1", jsMedia1, true, 17000, 17000);</script>
						</div>
					</div>
					<div class="item level-1 size222">
						<div id = "ksText2ID" class = "divCenter">
							<script>displayMedia(ksText2.length, "ksText2ID", " ", ksText2, false, 14000, 12000);</script>
						</div>
					</div>
				</div>
				<!-- JACK SPADE TWEETS AND SOCIAL STUFF -->
				<div class="size22 level1" data-nested=".size11" data-cellW=150 data-cellH=150 data-gutterX=10 >
					<div class="size11" data-fixSize=0 data-nested=".size2-2" data-cellW=70 data-cellH=70 >
						<a href = "https://www.facebook.com/jackspadeny">
							<div class="item size2-2">
								<i class="icon-facebook icon-2x"></i>
								<br><i class = "socialFont">Jack Spade</i>
							</div>
						</a>
						<a href = "https://twitter.com/jackspadeny">
							<div class="item size2-2">
									<i class="icon-twitter icon-2x"></i>
									<br><i class = "socialFont">Jack Spade</i>
							</div>
						</a>
						<a href = "https://www.linkedin.com/company/jack-spade">
							<div class="item size2-2">								
								<i class="icon-linkedin icon-2x"></i>
								<br><i class = "socialFont">Jack Spade</i>
							</div>
						</a>
						<a href = "https://www.instagram.com/jackspadeny/?hl=en">
							<div class="item size2-2">
								<i class="icon-instagram icon-2x"></i>
								<br><i class = "socialFont">Jack Spade</i>
							</div>
						</a>
					</div>
					<div class="item size11">
						<div id = "jack2ID" class = "divCenter">
							<script>displayMedia(jsText2.length, "jack2ID", " ", jsText2, false, 13000, 15000);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "jack3ID" class = "divCenter">
							<script>displayMedia(jsText3.length, "jack3ID", " ", jsText3, false, 12000, 17000);</script>
						</div>
					</div>
					<div class="item size11">
						<div id = "jack1ID" class = "divCenter">
							<script>displayMedia(jsText1.length, "jack1ID", " ", jsText1, false, 14000, 16000);</script>
						</div>
					</div>
				</div>
				<!-- KATE SPADE PICTURES ENTITES -->
				<div class="item size22 level1">
					<div id = "otherMedia2IMG" class = "map2">
					</div>
					<div id = "otherMedia2BottomText" class = "tempBottom">
						<script>displayMedia(otherMedia2.length, "otherMedia2BottomText", "otherMedia2IMG", otherMedia2, true, 17000, 15000);</script>
					</div>
				</div>
				<!-- JS ENTITY BIG PICTURE -->
				<div class="item size22 level1">
					<div id = "imgJSBIG" class = "map2"></div>
					<div id = "jackMediaBig" class = "tempBottom">
						<script>
							displayMedia(jsMedia.length, "jackMediaBig", "imgJSBIG", jsMedia, true, 1000, 1000);
						</script>
					</div>
				</div>
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
						<div id = "otherIDJACK" class = "divCenter">
							<script>displayMedia(onlyTextJ.length, "otherIDJACK", " ", onlyTextJ, false, 3000, 12000);</script>
						</div>
					</div>
					<div class="item level-1 size222">
						<div id = "jack1ID" class = "divCenter">
							<script>displayMedia(jsText1.length, "jack1ID", " ", jsText1, false, 13000, 14000);</script>
						</div>
					</div>
				</div>
				<div class="item size21 level1">
					<div id = "ksMediaIMG" class = "map2">
					</div>
					<div id = "ksMediaBottomText" class = "tempBottom">
						<script>displayMedia(ksMedia.length, "ksMediaBottomText", "ksMediaIMG", ksMedia, true, 14000, 17000);</script>
					</div>
				</div>
				<!-- ADD NEW -->
				<div class="item size21 level1">
					<div id = "jOtherMedia" class = "map2">
					</div>
					<div id = "jOtherMediaBottomText" class = "tempBottom">
						<script>displayMedia(onlyMediaJ.length, "jOtherMediaBottomText", "jOtherMedia", onlyMediaJ, true, 8000, 4000);</script>
					</div>
				</div>
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
