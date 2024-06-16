 <?php
include 'connection.php';
session_start();
if(!isset($_SESSION['acc'] ))
{
header('location:login.php');
}

if(isset($_POST['ask']))
{
$name=$_SESSION['name'];
 $question=$_POST['question'];
 $qry_ask = "INSERT INTO question_table (Question, Username) VALUES ('$question','$name')";
 if($conn->query($qry_ask)==FALSE)
    {
      die("Error: ".$conn->error);
    }
     echo '<script>alert("Вопрос отправлен! Ожидайте ответа!")</script>';              
}

/*Deleting into answer table */
if(isset($_GET['answerid']))
{
  $userid=$_SESSION['id'];
  $ansid = $_GET['answerid'];
  $qry_del = "DELETE FROM answer_table WHERE aid='$ansid' and userid='$userid' ";
  if($conn->query($qry_del)==TRUE)
  {
   echo '<script>alert("Удалено успешно!")</script>';
  }
}

/*Inserting into answer table */
if(isset($_POST['ans']))
{
  $userids=$_SESSION['id'];
  $questionid=$_POST['id'];
  $answer=$_POST['answer']; 
  $name=$_SESSION['name'];
 $qry_ask = "INSERT INTO answer_table (Answer, qids, Answerby, userid) VALUES ('$answer','$questionid','$name','$userids')";
 if($conn->query($qry_ask)==FALSE)
    {
      die("Error: ".$conn->error);
    }
        echo '<script>alert("Отвечено!")</script>';              
}


?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UT=F-8">
<title>User Home</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link type="text/css"  rel="stylesheet" href="css/all.css">
<link type="text/css"  rel="stylesheet" href="css/forum.css">
</head>
 <a name="above"></a>
<body class="bf">
  <div class="main">
  <div class="headuser">
    <div class="sub_headerone">
        <div class="logo">
             <img src="images/logo.jpg" alt="Spencer Animal Shelter logo" height="80" width="500" />
          </div>
          
        <div class="navbar">
           <ul type="none" >
                 <!--<li ><a href="user.php" >Питомцы</a></li>-->
                     <li ><a href="forum.php" >Форум </a></li>
                <li ><a href="myaccount.php" > Аккаунт
                  <?php $acc=$_SESSION['acc']; 
                  echo $acc; ?> </a></li> 
                  <li ><a href="userdonation.php" >Пожертвование</a></li>
                     <li ><a href="logout.php" >Выход</a></li>
                    
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



<div class="ask">
  <div class="subask" >
    <h1>Задать вопрос</h1>
<form method="POST">         
  <textarea placeholder="Задать вопрос" name="question" rows="7" cols="80" required></textarea>
      <input type="submit" id="submitques" name="ask" value="Спросить"> <br/> <br/> 
 </form>
</div>
<div class="toys">
   <div class="slide">
    <img src="images/toy/toy.jpg" height="310px" width="80%"/>
  </div>
  <div class="slide">
    <img src="images/toy/toy1.jpg" height="310px" width="80%"/>
  </div>
 <div class="slide">
    <img src="images/toy/toy2.jpg" height="310px" width="80%"/>
  </div>
  <div class="slide">
    <img src="images/toy/toy3.jpg" height="310px" width="80%"/>
  </div>
 <div class="slide">
    <img src="images/toy/toy4.jpg" height="310px" width="80%"/>
  </div> 
   <div class="slide">
    <img src="images/toy/toy5.jpg" height="310px" width="80%"/>
  </div> 
<script>
  var slidecount = 0;
Slider();

function Slider() {
    var i;
    var slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slidecount++;
    if (slidecount > slides.length) {slidecount = 1} 
    slides[slidecount-1].style.display = "block"; 
    setTimeout(Slider, 1500); // Image slide in 1.5 sec difference..
}
</script>  

 
  </div>
</div> 
<div class="question">
<?php
$begin=0;
$maximum=2;
$qry_ques="select * from question_table ";
$result=$conn->query($qry_ques);
$total=$result->num_rows;
$pages=ceil($total/$maximum);
if(isset($_GET['pages']))
{
 $begin=($_GET['pages']-1)*$maximum;
}
$select_ques="SELECT * FROM question_table LIMIT $begin,$maximum";
$result_ques=$conn->query($select_ques);
while ($data=$result_ques->fetch_assoc())
{
    $qid=$data['qid'];
    $ques=$data['Question'];
    $names=$data['Username'];

      echo "<p><b><span style='margin: 0 5px; color:#F1A9A0;'>".$qid.".</span> 
	  <span style='font-size:25px; color:#F1A9A0;'>".$ques." </span>
      <span style='color: #4ECDC4; float:right;margin-right:7em;'>
      <span style='background-color:grey;color:white;'>
	  Спрашивал:</span> ".$names."</span><b></p>
    <form method='post'>
	<input type='text' value='$data[qid]' name='id' hidden>
	<textarea rows='6' cols='150' name='answer' placeholder='Answer Here'></textarea>
	<br><input type='submit' name='ans' value='Ответ'/> <br/>
	</form>";

      $qry_sel = "SELECT * FROM answer_table WHERE qids='$data[qid]'";
      $result_ans=$conn->query($qry_sel);
      while($data_ans=$result_ans->fetch_assoc())
      {
        $ansid=$data_ans['aid'];
      $answer=$data_ans['Answer'];
      $answerby=$data_ans['Answerby'];
       echo "<div class='answer'>
	   <div class='ansdec'> Ans.<div class='anscontent'>".$answer."</div>
       <span ><div class='ansby'><span style='background-color:grey;color:white;'>
	   От:</span> ".$answerby."</span> <br>  <br>              
     <a href='forum.php?answerid=$ansid'>Delete</a></div></div></div>";
      }
}
?>
</div>
	<div class="pagination">
	<?php               
       for($p=1;$p<=$pages;$p++)
	    {
        echo "<a href='forum.php?pages=".$p."'>$p</a> ";
		}
     ?>
        </div>
        <div class="footer">
   <a name="contact"></a>
  <h2>Свяжитесь с нами</h2>
  <div class="ephone">
          <div class="ephone1"><img src="images/phone.png" alt="GKClogo" height="60" width="60"/></div> 
          <div class="ephone2"><img src="images/Email.png" alt="GKClogo" height="60" width="60"/></div>
        </div>          
        <div class="info">
        Приют для животных "Тёплый дом"<br>
			+7(921)224-35-62<br>
      priutt@mail.ru<br>
      г.Невинномысск, ул.Калинина, дом 100<br>
      Вход со стороны двора
         </div>


          <div class="copyright">
          <p>©2024 </p>
        </div>


</div>
<div><a href="#above" id="top">Наверх страницы ↑</a></div>
</div>
</body>
</html>