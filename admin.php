<?php
include 'connection.php';

session_start();
if(!isset($_SESSION['acc']) || $_SESSION['type'] !="Admin")
{
header('location:login.php');
}

$name="";
$type="";
$breed="";
$gender="";
$age="";
$weight="";
$color="";
$entry="";


if(isset($_GET['aid']))
{
$aid=$_GET['aid'];
$qry_selectrow = "SELECT * FROM animals_table WHERE aid='$aid'";
$result_animal = $conn->query($qry_selectrow);
$value_row= $result_animal->fetch_assoc();
$name = $value_row['Animal_name'];
$type = $value_row['Type'];
$breed = $value_row['Breed'];
$gender=$value_row['Gender'];
$age = $value_row['Age'];
$weight = $value_row['Weight'];
$color = $value_row['Color'];
$entry = $value_row['Entry_date'];
}

//inserting animal details
if(isset($_POST['register']))
{

$type = $_POST['type'];
$name = $_POST['animalname'];
$breed = $_POST['breed'];
$gender=$_POST['gender'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$color = $_POST['color'];
$entry = $_POST['entrydate'];

$img = $_FILES['img']['name'];
$timg = $_FILES['img']['tmp_name'];

$qry="SELECT * FROM animals_table ";
$res= $conn->query($qry);
$num= $res->num_rows+1;

$img_name="Image".$num.".jpg";

$qry_insert = "INSERT INTO animals_table (Type, Animal_name, Breed, Gender, Age, Weight, Color, Entry_date, Picture) VALUES('$type',
'$name','$breed','$gender','$age','$weight','$color','$entry','$img_name')";
if($conn->query($qry_insert) == FALSE)
{
die("Errorinsert: ".$conn->error);
}
move_uploaded_file($timg,"Animalimage/".$img_name);
echo '<script>alert("Питомец успешно зарегистрирован!")</script>';
$name="";
$type="";
$breed="";
$gender="";
$age="";
$weight="";
$color="";
$entry="";
}

//update animal table
if(isset($_POST['update']))
{
$aid=$_GET['aid'];
$type = $_POST['type'];
$name = $_POST['animalname'];
$breed = $_POST['breed'];
$gender=$_POST['gender'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$color = $_POST['color'];
$entry = $_POST['entrydate'];


$qry_update = "UPDATE animals_table SET   Type='$type',Animal_name='$name',
     Breed='$breed',Gender='$gender',Age='$age',
	   Weight='$weight',Color='$color',
	   Entry_date='$entry' WHERE aid='$aid'";
if($conn->query($qry_update) == FALSE)
{
die("Error: ".$conn->error);
}
echo '<script>alert("Данные о питомце обновлены!")</script>';
}	



//Deleting animal from table
if(isset($_POST['delete']))
{
$aid=$_GET['aid'];

$qry_delete = "DELETE from animals_table WHERE aid='$aid'";
if($conn->query($qry_delete) == FALSE)
{
die("Error: ".$conn->error);
}
echo '<script>alert("Данные о питомце удалены!")</script>';
}	

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Панель администратора</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
  <link type="text/css"  rel="stylesheet" href="css/form1.css">

  <link type="text/css"  rel="stylesheet" href="css/all.css">

</head>
 <a name="above"></a>
<body>
  <div class="main">
	<div class="headuser">
		<div class="sub_headerone">
        <div class="logo">
             <img src="images/logo.jpg" alt="Логотип" height="80" width="500" />
          </div>
          
        <div class="navbar">
           <ul type="none" >
                 <li ><a href="admin.php" >Питомцы</a></li>
                     <li ><a href="donation.php" >Пожертвование </a></li>
				        		 <li ><a href="logout.php" >Выйти</a></li>
                    
      </ul>  
    </div>
  
		</div>	
    <div class="social">
    <div class="facebook">
        <a href="https://web.telegram.org/" title="Telegram" target="_blank"><img src="images/telegram.png" alt="fbIcon" height="50" width="50"/></a>
      </div>
      <div class="instagram">
          <a href="https://chat.whatsapp.com/Is9YDP4e26w0vOtWJ40TqA"  title="Whatsapp" target="_blank"><img src="images/whatsapp.png" alt="instagramIcon" height="50" width="50"/></a>
      </div>
      <!--<div class="Twitter">
      <a href="https://www.twitter.com"  title="Twitterpage" target="_blank"><img src="images/Twitter.png" alt="twitterIcon" height="50" width="50"/></a>
      </div>-->
      <div class="youtube">
          <a href="https://www.youtube.com"  title="Youtubepage" target="_blank"><img src="images/Youtube.png" alt="InstagramIcon" height="50" width="50"/></a>
      </div>
    </div> 
	</div>

<div class="ani">
  <div class="subanimalfrm">
    <h1> О питормце</h1>
	<form method="POST" enctype="multipart/form-data"><br/>
<label>Тип питомца</label> <input type="text" name="type" value="<?php echo $type;?>" placeholder="Введите кот, собака, кролик и т.д..."/><br /><br />
<label>Имя питомца</label> <input type="text" name="animalname" value="<?php echo $name ;?>" placeholder="Имя питомца"/><br /><br />
<label>Порода</label> <input type="text" name="breed" value="<?php echo $breed ;?>" placeholder="Порода питомца"/><br /><br />
<label >Пол: </label>
<input type="radio" name="gender" value="Мужской" <?php echo ($gender=='Мужской')?'checked':'' ?> checked />
<span class="animalgen">Мужской </span>
<input type="radio" name="gender" value="Женский" <?php echo ($gender=='Женский')?'checked':'' ?>/>
<span class="animalgen">Женский </span><br><br>
<label>Возраст </label> <input type="text" name="age" value="<?php echo $age ;?>" placeholder="Возраст питомца"/><br /><br />
<label>Вес </label><input type="text" name="weight" value="<?php echo $weight ;?>" placeholder="Вес питомца"/><br /><br />
<label>Цвет</label> <input type="text" name="color" value="<?php echo $color ;?>" placeholder="Черный, Коричневый и т.д."/><br /><br />
<label>Дата поступления</label> <input type="text" name="entrydate" value="<?php if (isset($_GET['aid'])){echo $entry;} ;?>" placeholder="Дата поступления"/><br /><br />
<label>Фото</label>  <input type="file" name="img" /><br /><br />
<input class="btnanimal" type="submit" name="register" value="Register" />
<input class="btnanimal" type="submit" name="update" value="Update" />
<input class="btnanimal" type="submit" name="delete" value="Delete" />
</form>
</div>
</div>
		<div class="animaltable">
			<?php
			$qry_selectall = "SELECT * FROM animals_table";
$result = $conn->query($qry_selectall);
if($result->num_rows > 0)
{
echo "<table border='1'>
      <tr><th>Aid</th><th>Animal Type</th><th>Animal Name</th><th>Breed</th><th>Gender</th>
	  <th>Age (In year)</th><th>Weight (In kg)</th><th>Color</th><th>Entry date</th>
	  <th>Picture</th>
	  <th>Edit</th></tr>";
while($animal = $result->fetch_assoc())
{
echo "<tr>
		<td>".$animal['aid']."</td>
		<td>".$animal['Type']."</td>
		<td>".$animal['Animal_name']."</td>
		<td>".$animal['Breed']."</td>
    <td>".$animal['Gender']."</td>
		<td>".$animal['Age']."</td>
		<td>".$animal['Weight']."</td>
		<td>".$animal['Color']."</td>
		<td>".$animal['Entry_date']."</td>
		<td><img src='Animalimage/".$animal['Picture']."
		' height='80' width='100' /></td>
		<td><a href='admin.php?aid=
		".$animal['aid']."'>Edit</a></td>

     </tr>";
}
echo "<table>";
}
else
{
echo "Data not found";
}
?>
		</div>
</div>
 </body>
 </html>