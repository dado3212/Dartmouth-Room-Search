<!DOCTYPE html>
<html>
	<head>
		<!-- SEO Markup -->
		<title>Dartmouth Room Search</title>
		<meta name="robots" content="index, follow, archive">
		<meta name="description" content="Easily search through upperclass rooming options,
		filtering by location, number of roommates, size, and more.  The easiest way to 
		find the perfect room.">
		<meta charset="utf-8" />
		<meta http-equiv="Cache-control" content="public">
		<!-- old -->
		<meta name="google-site-verification" content="9U8kYC24rUGX98pnl1EDy0A4tY4EE8DxFAvpPwNNAEs" />
		<!-- new -->
		<meta name="google-site-verification" content="SmeVIjL9gg0LUuOrJ-ozBhozzBg0ZpmSZ_u86do4Y7U" />

		<!-- Semantic Markup -->
		<meta property="og:title" content="Dartmouth Room Search">
		<meta property="og:type" content="website">
		<meta property="og:image" content="http://dartmouthroomsearch.com/imgs/cover.jpg">
		<meta property="og:url" content="http://dartmouthroomsearch.com">
		<meta property="og:description" content="Easily search through upperclass rooming options,
		filtering by location, number of roommates, size, and more.  The easiest way to 
		find the perfect room.">

		<meta name="twitter:card" content="summary">
		<meta name="twitter:creator" content="@alex_beals">

		<link rel="stylesheet" type="text/css" href="/css/display.css">

		<!-- Hello a metric ton of favicon code! -->
		<link rel="apple-touch-icon" sizes="57x57" href="/imgs/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/imgs/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/imgs/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/imgs/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/imgs/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/imgs/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/imgs/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/imgs/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/imgs/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192" href="/imgs/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/imgs/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/imgs/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/imgs/favicon/favicon-16x16.png">
		<link rel="manifest" href="/imgs/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#006841">
		<meta name="msapplication-TileImage" content="/imgs/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#006841">

		<!--
			Created as a fun side project by Alex Beals '18!
			If you have any problems, please feel free to email me at Alex.Beals.18@dartmouth.edu
		-->

		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-61493621-1', 'auto');
		  ga('send', 'pageview');

		</script>

		<!-- Respects 'Request Desktop Site' -->
		<?php
			if (preg_match("/(iPhone|iPod|iPad|Android|BlackBerry|Mobile)/i", $_SERVER["HTTP_USER_AGENT"])) {
				?><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"><?php
			}
		?>

	</head>
	<body class="fof">
		<div id="wrapper">
			<div id="header">
				<img itemprop="image" src="/imgs/logo.png" alt="Dartmouth Room Search Logo white" title="DRC Logo"/>
				<a href="//dartmouthroomsearch.com">Dartmouth Room Search</a>
			</div>
			<div class="error">
				<h1>404</h1>
				<span>Page Not Found!</span>
			</div>
			<div class="footer">
				Alex Beals &#169;2016 <a href="mailto:Alex.Beals.18@dartmouth.edu">Email me here with any issues or requests for features!</a>
			</div>
		</div>
	</body>
</html>