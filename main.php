<!--
	f5-hello-world - Main Page
	https://github.com/f5devcentral/f5-hello-world
	Artiom Lichtenstein
	v2.2.1, 08/01/2018
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		–––––––––––––––––––––––––––––––––––––––––––––––––– -->
		<meta charset="utf-8">
		<title>hello, world</title>
		<meta name="description" content="F5 Super-NetOps Training Series">
		<!-- Mobile Specific Metas
	 	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- FONT
		–––––––––––––––––––––––––––––––––––––––––––––––––– -->
		<link href="css/fonts.css" rel="stylesheet" type="text/css">
		<!-- CSS
		–––––––––––––––––––––––––––––––––––––––––––––––––– -->
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/skeleton.min.css">
		<link rel="stylesheet" href="css/main.css">
		<!-- Favicon
		–––––––––––––––––––––––––––––––––––––––––––––––––– -->
		<link rel="icon" type="image/png" href="img/favicon.png">
		<link rel="shortcut icon" href="img/favicon.ico">
	</head>
	<body>
		<!-- Primary Page Layout
		–––––––––––––––––––––––––––––––––––––––––––––––––– -->
		<div class="container">
			<div class="docs-section marTop15">
				<h4 class="animate fadeInDown one">hello, <?php if ($node = getenv("NODE")) echo $node; else echo "world" ?></h4>
				<h5 class="animate fadeIn two">F5 Super-NetOps Training Series</a></h5>
				<ul class="soc animate fadeIn two marTop30">
					<li><a href="https://f5.com/" target="_blank"><img style="margin-bottom: -13px" src="img/f5.svg" width="48"></a></li>
					<li><a href="https://f5.com/SuperNetOps" target="_blank"><img style="margin-bottom: -13px" src="img/sno.svg" width="48"></a></li>
					<li><a class="soc-linkedin" href="https://www.linkedin.com/groups/13539166" target="_blank"></a></li>
					<li><a class="soc-github" href="https://github.com/f5devcentral/f5-super-netops-container" target="_blank"></a></li>
					<li><a class="soc-twitter" href="https://twitter.com/F5Networks" target="_blank"></a></li>
				</ul>
			</div>
			<div class="docs-section animate fadeIn three marTop30">
				<p>A free, on-demand version of our popular instructor-led automation courses.</p>
				<p>Drive continuous improvement and deployment practices!</p>
				<p><a href="index.php">Stats</a> for nerds.</a></p>
			</div>
			<p class="animate fadeInDown four marTop15 txtRight">
				<a href="https://github.com/f5devcentral/f5-hello-world" target="_blank"><img src="https://img.shields.io/maintenance/yes/2018.svg"></a> 
				<a href="https://f5cloudsolutions.herokuapp.com" target="_blank"><img src="https://f5cloudsolutions.herokuapp.com/badge.svg"></a>
			</p>
		</div>
		<!-- End Document
		–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	</body>
</html>
