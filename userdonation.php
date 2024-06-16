  <?php
include 'connection.php';

session_start();
if(!isset($_SESSION['acc']) || $_SESSION['type'] !="User")
{
header('location:login.php');
}

$donar="";
$email="";
if(isset($_POST['donate']))
{
  $donar=$_SESSION['name'];
  $email=$_POST['email'];
  $amount=$_POST['amount'];


  $qry_donins="INSERT INTO donation_table (Donar_name, Email, Amount) VALUES('$donar','$email','$amount')";
  if($result=$conn->query($qry_donins)==False)
  {
die("Error: ".$conn->error);
}
echo '<script>alert("Donated Successfully")</script>';
}

$userid=$_SESSION['id'];
//Selecting the user detail from usertable who ever is active..
$qry_userselect= "SELECT * FROM user_table WHERE id='$userid'";
$result_user = $conn->query($qry_userselect);
$row_value= $result_user->fetch_assoc();
$email = $row_value['Email'];

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
  <link type="text/css"  rel="stylesheet" href="css/form1.css">
  <link type="text/css"  rel="stylesheet" href="css/all.css">

</head>
 <a name="above"></a>
<body class="bg">
  <div class="main">
	<div class="headuser">
		<div class="sub_headerone">
        <div class="logo">
             <img src="images/logo.jpg" alt="Shelter logo" height="80" width="500" />
          </div>
          
        <div class="navbar">
           <ul type="none" >
               <li ><a href="user.php" >Питомцы</a></li>
                     <li ><a href="forum.php" >Форум </a></li>
                <li ><a href="myaccount.php" > Аккаунт
                  <?php $acc=$_SESSION['acc']; 
                  echo $acc; ?> </a></li> 
                   <li ><a href="userdonation.php" >Пожертвование</a></li>
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
      <div class="Twitter">
      <a href="https://vtb.paymo.ru/collect-money/qr/?transaction=951636d9-7124-4575-a1ec-cb5d54167eef"  title="Bank" target="_blank"><img src="images/bank.png" alt="twitterIcon" height="50" width="50"/></a>
      </div>
      <div class="youtube">
          <a href="https://www.youtube.com"  title="Youtubepage" target="_blank"><img src="images/Youtube.png" alt="InstagramIcon" height="50" width="50"/></a>
      </div>
    </div> 
	</div>
<div class="donateform">
  <h1> Пожертвование </h1>
  <div class="subdonateform">
    <form method="POST">
        <label>Имя жертвующего:</label> <input type="text" name="donator"
		value="<?php echo $_SESSION['name']; ?>" placeholder="Ваше имя"/> <br><br>
        <label>Email:</label> <input type="text" name="email" 
		value="<?php echo $email; ?>" placeholder="Email"/> <br><br>
		<label>Сумма:</label> <input type="text" name="amount" placeholder="Сумма"/> <br><br>
		<input type="submit" name="donate" value="Donate"/>
    </form>
</div>
</div>
</div>
</body>
</html>
