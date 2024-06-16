

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>User Home</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link type="text/css"  rel="stylesheet" href="css/all.css">
</head>
 <a name="above"></a>
<body class="bg">
  <div class="main">
	<div class="headuser">
		<div class="sub_headerone">
        <div class="logo">
             <img src="images/logo.jpg" alt="Spencer Animal Shelter logo" height="80" width="500" />
          </div>
          
        <div class="navbar">
           <ul type="none" >
              <li ><a href="index.php" >Главная</a></li>
                 <li ><a href="animalhome.php" >Питомцы</a></li>
                       <li ><a href="login.php" >Войти </a></li>
                          <li ><a href="signup.php" >Зарегистрироваться </a></li>  
                    
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

 <div class="animals_box">
	
<?php
include 'connection.php';
//selecting all data from a table
$qry_sel = "SELECT * FROM animals_table";
$result = $conn->query($qry_sel);
if($result->num_rows > 0)
{
while($animal = $result->fetch_assoc())
{
	
echo "<div class='boxinside'>
		<img src='Animalimage/".$animal['Picture']."'
		 height='180' width='250' style='margin:5px 30px' />
		<p><b>Вид: </b><span>".$animal['Type']."</span></p>
		<p ><b>Порода: </b> <span>".$animal['Breed']."</span></p>
		<p ><b>Пол: </b> ".$animal['Gender']."</p>
		<p ><b>Возраст: </b> ".$animal['Age']."</p>
		<p ><b>Вес: </b> ".$animal['Weight']."</p>
		<br/><p ><b>Цвет: </b> ".$animal['Color']."</p>";

		$aid=$animal['aid'];
		$qry_checkbooking="SELECT * From booking_table WHERE animalid='$aid'";
		$resultbook= $conn->query($qry_checkbooking);
		if($resultbook->num_rows==0)
		{	
		echo	"<br><p id='adopt' style='font-size:20px;'><a href='login.php'>Забрать</a>
		</p>";
		}
		else
		{
			echo "<br><p><b style='font-size:23px; color:#f7322e;'>Уже забрали</b></p>";
		}
	

		echo "</div>";
	
}
}
else
{
echo "No data found";
}
?>
</div> 


</div>
</body>
</html>