<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Home</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link type="text/css"  rel="stylesheet" href="css/all.css">
</head>
 <a name="above"></a>
<body>
  <div class="main">
	<div class="header">
			<img src="images/photo3.jpg" alt="Background dog and cat" height="700px" width="100%" />
		<div class="sub_header">
        <div class="logo">
             <img src="images/logo.jpg" alt="Spencer Animal Shelter logo" height="80" width="500" />
          </div>
          
        <div class="navbar">
           <ul type="none" >
               <li id="jpt"><a href="index.php" >Главная</a></li>
               <li><a href="animalhome.php" >Питомцы</a></li>
                     <li><a href="#contact">Контакты</a></li>
                       <li><a href="login.php" >Войти </a></li>
                          <li><a href="signup.php" >Зарегистрироваться</a></li>           
      </ul>  
    </div>
    <div class='visit'>
<?php
include 'connection.php';
$qry_selcount = "SELECT counter FROM counter_table";
$result = $conn->query($qry_selcount);
$count=0;
	if($result->num_rows > 0)
	{
	while($value = $result->fetch_assoc())
	{
	$count=$value['counter'];
	if($count>0){
	$count=$count+1;
	$qry_upcount = "UPDATE counter_table SET counter = '$count'";
	if($conn->query($qry_upcount) == FALSE)
	{	
	die("Error: ".$conn->error);
	}}
	}
	}
else
{
  $count=1;
  $qry_ins = "INSERT INTO counter_table Values('','$count')";
  if($conn->query($qry_ins) == FALSE)
{
die("Errorinsert: ".$conn->error);
}
}
echo '<img src="images/visit3.png"  alt="Visitor" height="20px" width="35" />'.$count;
 ?>

    </div>
		</div>	
    <div class="social">
        <<div class="facebook">
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
<div class="content">
  <div class="picture_slide">    
<!-- Sliding of pictures -->
  <div class="slide">
    <img src="images/slide/1.jpg" height="350" width="550"/>
  </div>
 <div class="slide">
    <img src="images/slide/2.jpg" height="350" width="550"/>
  </div>
  <div class="slide">
    <img src="images/slide/3.jpg" height="350" width="550"/">
  </div>
 <div class="slide">
    <img src="images/slide/4.jpg" height="350" width="550"/>
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


    <div class="content_define">
      <h1 style="font-size: 40px;">Приют для животных</h1>
         <span> Приют для животных заботится о бездомных, потерявшихся животных, в основном кошках и собаках, предоставляя им приют. Раненое животное содержится и реабилитируется. За животными ухаживают должным образом. Он обеспечивает наилучший уход за животными и дает рекомендации по совершенству владельцу, который приезжает, чтобы взять животное.</span>
    </div>
</div>
<div class="description">
    <div class="desc1"> 
      <h3>Зачем нужны пожертвования?</h3>
      <span>Каждый год к нам поступает более тысячи животных, что зависит от поддержки индивидуальный. Ваша поддержка, пожертвование помогают приюту для животных обеспечить наилучший уход за всеми животными. </span>
     </div>
    <div class="desc2">      
        <h3> Забрать животное</h3>
        <span>Взятие животного может изменить жизнь животного. Посетите приют для животных. Мы заботимся о животных каждый год и можем найти для вас то, что вам нужно. Вы можете взять животное, которое вам больше нравится.</span>
      </div>
  </div>
<div class="subscribe">
  <!--<h1 id="head">Присоединитесь к нам!</h1>
  <h1>Не упустите обновление</h1>
      <form method="POST">
        <span class="sub"><input type="email" pattern="[^ @]*@[^ @]*" placeholder="Email"/></span><br>
        <span class="sub"><input type="submit" value="Подпишитесь!"/></span>
      </form>-->
      <h1>История</h1>
      <span>В далеком городе по имени Солнечный Луч жила щедрая душа по имени Анна. Она всегда любила животных и мечтала помочь им в трудные моменты. Однажды, гуляя по улице, Анна увидела собачку, бездомную и изможденную, скрывающуюся под подворотней. Разбитое сердце Анны не могло остаться равнодушным, и она решила забрать собачку к себе.

Собачка, которую Анна назвала Милка, стала самым преданным другом для нее. Однако, каждый день Анне на пути встречались еще больше бездомных животных: кошечки, собачки, кролики, птицы. Анна поняла, что ее дом не может вместить всех, кто нуждался в помощи.

Родилась идея создать приют для бездомных животных, где каждое существо могло бы найти свой комочек счастья. Анна начала заниматься сбором пожертвований, обращаться к друзьям, местным бизнесам и сообществу за поддержкой. Постепенно, с помощью местных волонтёров и добрых сердец, приют "Найди свой комочек счастья" начал свою работу.

В приюте животные получали теплый дом, заботу и внимание. Здесь для них устраивались игровые площадки, им обеспечивался доступ к ветеринарной помощи, а каждый день приносил не только еду, но и море ласки и ласковых слов. Животные находили новых хозяев, а в некоторых случаях, новые хозяева находили своих верных друзей.

Приют "Найди свой комочек счастья" стал местом, где сбываются мечты и где каждый животное находит свое собственное счастье. Анна была рада видеть, как благодарность и радость лучатся из глаз каждого животного, которое нашло уют и заботу в этом приюте. </span>
      

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
          <p>©2024</p>
        </div>


</div>
<div><a href="#above" id="top">Наверх страницы↑</a></div>
</div>
</body>
</html>