<?php
session_start();
if(!isset($_SESSION['acc'] ))
{
header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Сведения о пользователе</title>

<link type="text/css"  rel="stylesheet" href="css/all.css">
</head>
<body class="bg">
	 <div class="animals_box">
<?php
include 'connection.php';
$id = $_GET['ids'];


setcookie('save',$id);


 //2 id clicked by user
$qry_sel = "SELECT * FROM animals_table where aid = '$id'";
$result = $conn->query($qry_sel);
$animal = $result->fetch_array();
?>


 <?php
 echo "<div class='boxinside' style='margin:2em 25em;'>
		<img src='Animalimage	/".$animal['Picture']."'
		 height='180' width='250' style='margin:5px 30px' />
		 <p><b>Имя: </b><span>".$animal['Animal_name']."</span></p>
		<p><b>Тип: </b><span>".$animal['Type']."</span></p>
		<p ><b>Порода: </b> <span>".$animal['Breed']."</span></p>
		<p ><b>Пол: </b> ".$animal['Gender']."</p>
		<p ><b>Возраст: </b> ".$animal['Age']."</p>
		<p ><b>Вес: </b> ".$animal['Weight']."</p>
		<p ><b>Цвет: </b> ".$animal['Color']."</p>
 <p style='margin-left:6em; ;'><a href='user.php?ids= ".$animal['aid']."'>Back</a></p>";
echo "</div>";
	  ?>
</div>
</body>
</html>


