<?php
header("content-type:text/xml");
echo "<?xml version='1.0' ?>";
include 'connection.php';
$qry_sel = "SELECT * FROM animals_table";
$result = $conn->query($qry_sel);
echo "<animals>";
while($animal = $result->fetch_assoc())
{
	
echo "	
		<aid>".$animal['aid']."</aid>
		<type>".$animal['Type']."</type>
		<name>".$animal['Animal_name']."</name>
		<breed>".$animal['Breed']."</breed>
		<gender>".$animal['Gender']."</gender>
		<age>".$animal['Age']."</age>
		<weight> ".$animal['Weight']."</weight>
		<color>".$animal['Color']."</color>";
		}
echo "</animals>";
?>		
