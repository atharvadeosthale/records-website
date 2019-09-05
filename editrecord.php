<?php
require_once "header_main.php";
session_start();
if(isset($_POST["mobno"]))
{
	$mobno = $_SESSION["mobno"];
	$name = $_POST["name"];
	$email = $_POST["email"];

	$sql = "UPDATE records SET name='$name',email='$email' WHERE mobno='$mobno';";
	$result = mysqli_query($conn, $sql);
	if(!$result)
	{
		echo "<div class='container'><p>Error Updating Record</p></div>";
		session_destroy();
		die();
	}
	else
	{
		echo "<div class='container'><p>Record Updated Successfully</p></div>";
		session_destroy();
		die();
	}
}
if(!isset($_SESSION["mobno"]))
{
	header("Location: index.php");
	die();
}
$mobno = $_SESSION["mobno"];
$sql = "SELECT * FROM records WHERE mobno='$mobno';";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
if($data["verified"] == 0)
{
	echo "<div class='container'><p>Your record isn't verified, hence you cant edit it.</p></div>";
	die();
}
?>
<div class="container">
	<h3 align="center">Edit Record</h3>
</div>
<div class="container">
	<p align="center"> 
		A record was found associated with your Mobile Number, you can now edit your Record.
	</p>
</div>
<div class="container">
	<form method="post" action="editrecord.php">
		<div class="input-field">
			<input type="text" name="mobno1" id="mobno1" value="<?php echo $_SESSION['mobno']; ?>" disabled>
			<label for="mobno1">Mobile Number</label>
			<input type="hidden" name="mobno" value="<?php echo $_SESSION['mobno']; ?>">
		</div>
		<div class="input-field">
			<input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>">
			<label for="name">Name</label>
		</div>
		<div class="input-field">
			<input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>">
			<label for="email">E-Mail Address</label>
		</div>
		<div class="input-field">
			<button type="submit" name="submit" class="btn green waves-effect">Edit Record</button>
		</div>
	</form>
</div>
