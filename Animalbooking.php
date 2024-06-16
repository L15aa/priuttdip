<?php
include 'connection.php';

session_start();
if (isset($_GET['aid']));
{
$animalid=$_GET['aid'];
$userid=$_SESSION['id'];


$qry_insbook="INSERT into booking_table (animalid, userid) VALUES('$animalid','$userid')";
if($conn->query($qry_insbook) == FALSE)
{
die("Error: ".$conn->error);
}
else
{
echo '<script>Successfully adopted</script>';
}
header("location:user.php");
}
?>