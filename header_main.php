<?php
require_once "inc/config.php";
require_once "inc/database.php"
?>
<html>
<head>
	<link href="assets/css/materialize.min.css" rel="stylesheet" />
	<script src="assets/js/materialize.min.js"></script>
	<script src="assets/js/jquery.js"></script>
	<title><?php echo $config["website_name"];?></title>
</head>
<body>
	<nav>
		<div class="nav-wrapper indigo">
			<ul class="right hide-on-med-and-down">
				<li><a href="index.php">Home</a></li>
			</ul>
		</div>
	</nav>