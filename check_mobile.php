<?php
session_start();
require_once "header_main.php";
if(!isset($_POST["submit"]))
{
	die("No direct access allowed.");
}
$mobno = $_POST["mobilenumber"];
$sql = "SELECT * FROM records WHERE mobno='$mobno';";
$query = mysqli_query($conn, $sql);
$count = mysqli_num_rows($query);
if($count == 1)
{
	// code goes here if record exists
	$data = mysqli_fetch_assoc($query);
	$_SESSION["mobno"] = $mobno;
	$_SESSION["name"] = $data["name"];
	$_SESSION["email"] = $data["email"];
	header("Location: editrecord.php");
	die();
}
else
{
	// code goes here if record new
	$_SESSION["mobno"] = $mobno;
	header("Location: addrecord.php");
	die();
}
?>

