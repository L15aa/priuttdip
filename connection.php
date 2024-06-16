<?php
$conn = new mysqli("localhost","Lissa","qwe1asd2zxc3","happyness");

if(!mysqli_select_db($conn,"happyness"))
{
	header("location:setup.php");
	die();
}
if($conn->connect_error)
{
die("Connection Failed: ".$conn->connect_error);
}
?>