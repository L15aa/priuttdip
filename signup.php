
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Регистрация</title>
<link type="text/css"  rel="stylesheet" href="css/form.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<head>
<body>

<?php
include "connection.php";
if(isset($_POST['cancel']))
	{
	session_start();
	if(session_destroy())
	{
	header('location:login.php');
	}}
	
	//Registering user 
	if(isset($_POST['register']))
		{
	$name = $_POST['name'];
	$address = $_POST['address'];
	$dob=$_POST['dob'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$poscode=$_POST['postal'];
	$account = $_POST['account'];
	$pwd = $_POST['password'];
	$type = "User";
	$date=date("Y-m-d");

	$qry_register="INSERT INTO user_table (name, address, dob, gender, phone, email, postal_code, account, password, type, signup_date) VALUES('$name',
	'$address','$dob','$gender','$phone','$email','$poscode','$account','$pwd',
	'$type','$date')";
	if($conn->query($qry_register) == FALSE)
	{
	die("Error: ".$conn->error);
	}
	echo '<script>alert("Registered Completed")</script>';
	}
?>
<div class="register">
	<div class="forms">
		     <div class="cancel">
        <a href="logout.php" title="cancel" ><img src="images/backto.png" alt="fbIcon" height="50" width="50"/></a>
      </div>
<h1>Регистрация</h1>
<form method="post" name="regfrm">
	<label class="label">Полное имя: </label>
<input type="text" class="text" name="name" Placeholder="Ваше имя" /><br />
<label class="label">Адрес: </label>
<input type="text" class="text" name="address" Placeholder="Ваш адрес"  /><br />
<label class="label">Дата рождения: </label>
<input type="date" name="dob" Placeholder="Дата рождения" /><br />
<label class="label">Пол: </label>
<input type="radio" name="gender" value="Мужской" checked/>
<span class="gen">Мужской </span>
<input type="radio" name="gender" value="Женский"/>
<span class="gen">Женский </span>
<label class="label">Телефон: </label>
<input type="text" class="text" name="phone" Placeholder="Ваш телефон" /><br />
<label class="label">Email:</label> 
<input type="email" name="email" Placeholder="Ваш Email"  /><br />
<label class="label">Почтовый адрес:</label> 
<input type="text" name="postal" class="text" Placeholder="Ваш почтовый адрес" /><br /><br />
<label class="label">Логин:</label>
<input type="text"  id="account" name="account" Placeholder="Ваш логин" onkeyup="exist()" />
<span style=' margin-left: -4em; color:white;'>Проверить доступность</span>
<span id="show"></span><br /><br/>
<label class="label">Пароль:</label>
 <input type="password" name="password" Placeholder="Пароль"  /><br />
<label class="label">Подтвердите пароль:</label> 
<input type="password" name="conpassword" Placeholder="Подтвердите пароль"  /><br /><br />
<input type="submit" name="register" value="Регистрация" onclick="return val()"/>
<input type="submit" name="cancel" value="Вход" />
</form>
<script>
function val()
{

if (confirm("R U SURE?") == true)
{
var n=document.forms['regfrm']['name'].value;
var a=document.forms['regfrm']['address'].value;
var d=document.forms['regfrm']['dob'].value;
var p=document.forms['regfrm']['phone'].value;
var e=document.forms['regfrm']['email'].value;
var acc=document.forms['regfrm']['account'].value;
var pw=document.forms['regfrm']['password'].value;
var pwd=document.forms['regfrm']['conpassword'].value;

 var regp=/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

if(n=="" || a=="" || p=="" || d=="" || e=="" ||acc=="" ||pw=="" ||pwd=="")
{
alert ("Empty field");
return false;
}
else if(!p.match("regp"))
 {
  alert ('Телефон неверен!');
  return false;
}
}
else
{
	return false;
}
}	
</script> 

<script>
function exist()
{
var user = document.getElementById("account").value;
var req;
if(window.XMLHttpRequest)
{
req = new XMLHttpRequest()
}
else
{
req = new ActiveXObject("Microsoft.XMLHTTP");
}

req.onreadystatechange=function()
{
	if (req.readyState==4 && req.status==200) 
	{
	document.getElementById("show").innerHTML = req.responseText;	
	}
}
req.open("GET","Checking.php?value="+user,true);
req.send();
}
	
</script> 

</div>
</div>
</body>
</html>