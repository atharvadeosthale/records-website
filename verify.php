<?php
session_start();
require_once "header_main.php";
if(isset($_GET["mobno"]))
{
	$mobno = $_GET["mobno"];
	$sql = "SELECT * FROM records WHERE mobno='$mobno';";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{
		$sql2 = "UPDATE records SET verified='1' WHERE mobno='$mobno';";
		$result2 = mysqli_query($conn, $sql2);
		if(!$result2)
			die("Error Verifying Record");
		echo "<div class='container'><p>Record Successfully Verified</p></div>";
		die();
	}
	else
	{
		echo "<div class='container'>";
		echo "<p>Invalid Verification Link</p>";
		echo "</div>";
		die();
	}
}
if(isset($_SESSION["email"]))
{
	$email = $_SESSION["email"];
	$mobno = $_SESSION["mobno"];
	session_destroy();
	$link = $config["base_url"]."verify.php?mobno=".$mobno;
	$message = wordwrap($email, 70);
	mail($email, "Verify your account", $message, "From: ".$config["website_name"]."<".$config["noreply_email"].">");
	echo "<div class='container'>";
	echo "<p align='center'>An verification link has been sent to your E-Mail address. Please check your Inbox and Spam folders</p>";
	echo "</div>";
	die();
} 
header("Location: index.php");
die();
?>