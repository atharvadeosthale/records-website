<?php
session_start();
require_once "header_main.php";
if(isset($_POST["submit"]))
{
	// checkif record already exists
	$mobno = $_SESSION["mobno"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$sql = "INSERT INTO records (mobno,name,email,verified) VALUES ('$mobno','$name','$email','0');";
	$result = mysqli_query($conn, $sql);
	if(!$result)
		die("Error adding record to Database.");
	else
	{
		$_SESSION["email"] = $email;
		header("Location: verify.php");
		die();
	}
}
if(!isset($_SESSION["mobno"]))
{
	header("Location: index.php");
	die();
}
$mobno = $_SESSION["mobno"];
?>
<div class="container">
	<h3 align="center">Add Record</h3>
	<p align="center">No record associated with the Mobile Number you specified. Therefore, you need to create a new record with the specified number. Note, an verification link will be sent to your E-Mail address in order to verify that you are the verified one to create the record. So, please provide a valid E-Mail address where you can recieve emails.</p>
</div>
<div class="container">
	<form method="post" action="addrecord.php">
		<div class="input-field">
			<input type="text" name="mobnodisabled" id="mobnodisabled" value="<?php echo $mobno; ?>" disabled>
			<label for="mobnodisabled">Mobile Number</label>
		</div>
		<div class="input-field">
			<input type="text" name="name" id="name">
			<label for="name">Name</label>
		</div>
		<div class="input-field">
			<input type="email" name="email" id="email">
			<label for="email">E-Mail Address</label>
		</div>
		<div class="input-field">
			<button type="submit" name="submit" class="btn green waves-effect">Add Record</button>
		</div>
	</form>
</div>