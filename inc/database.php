<?php

$db["host"] = "localhost";
$db["user"] = "root";
$db["pass"] = "";
$db["name"] = "test";

$conn = mysqli_connect($db["host"], $db["user"], $db["pass"], $db["name"]);

if(!$conn)
{
	die("Connection to database failed!");
}

?>