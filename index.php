<?php
require_once "header_main.php";
?>

<div class="container">
	<h3 align="center">Welcome to <?php echo $config["website_name"]; ?></h3>
</div>
<div class="container">
	<p align="center">
		Hello, please enter your Mobile Number to Register/View Details.
	</p>
</div>
<div class="container">
	<form method="post" action="check_mobile.php">
		<div class="input-field">
			<input type="text" name="mobilenumber" id="mobilenumber">
			<label for="mobilenumber">Mobile Number</label>
		</div>
		<div class="input-field">
			<center>
				<button type="submit" name="submit" class="btn green waves-effect">Register/View Details</button>
			</center>
		</div>
	</form>
</div>