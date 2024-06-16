<?php
include 'connection.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Забыл пароль</title>
<link type="text/css"  rel="stylesheet" href="style.css">
</head>
<body>
	<div class="login">
<div class="sublogin">
        <h1>Войти</h1>
    <form  method="post">       
      
            <input type="text"  placeholder="Новый пароль" name="pwd" />               
                
                    <input type="text"  placeholder="Подтвердите пароль" name="conpwd" />
              
                <span class="forgotpw"><a href="forget.php?">Забыл пароль</span>
        
                <input type="submit" name="save" value="Reset" />  
    
    </form>
</div>
</div>

</body>
</html>
