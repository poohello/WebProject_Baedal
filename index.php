<?php 
    session_start();
    $_SESSION[user] = "admin"; //여기서 설정해 줄것!
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>배달 홈페이지</title>
<link rel="stylesheet" href="./slide/css/slide.css?v=1"> 
<link rel="stylesheet" href="./common_css/index_style.css?v=2">

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>  
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./slide/js/slide.js"></script>
<script>
	var flag = "click"
function show_login_window(){
	
	
	if(flag == "click"){
		$(".form").show();
		flag = "doubleclick";
	}else{
		$(".form").hide();
		flag = "click";
	}
	
}

</script>

</head>
<body>
	<header>
		<?php include "./common_lib/top_login1.php"; ?>
	</header>
	<div class="logo">
		<a href="index.php"><img alt="logo" src="./common_img/logo.JPG"></a>
	</div>
	
	<nav>
		<?php include "./common_lib/menu1_1.php"; ?>
	</nav>
	
	
	
	
	
	
	<section>
		
		
		<div class="search">
			<p id="p1"><br><p id="p2">우리동네를 입력해보세요!
           <form>
            <input type="text" placeholder="동 이름 검색">
            <button class='btn_submit' type="submit"><img src="./common_img/search.png"></button>
            </form>
         </div>
		
	

        	<div class="slide" style="border: 1px solid black;">
        		<button class="prev" type="button"> <img id="img1" src="./slide/images/btnL.png"> </button>
       				 <ul class="images">
        				  <li><img src="./slide/images/bg1.jpg"></li>
       					  <li><img src="./slide/images/bg2.jpg"></li>
      					  <li><img src="./slide/images/bg3.jpg"></li>
      					  <li><img src="./slide/images/bg4.jpg"></li>
      			     </ul>
      			<button class="next" type="button"> <img id="img2" src="./slide/images/btnR.png"> </button>
            </div>
               
        
	</section>
	
	
	
	
	
	
	<div class="form"> <!--  로그인창 div  -->
	
        <form class="login_form">
          <div class="login_top">
	        <h1 style="display: inline;">저기요</h1>
        	<div class='close_div'>
        		<button class="close" type='button' onclick="show_login_window()"><img src="./common_img/x_btn_img.png"></button>
        	</div>
          </div>
        	<br>
          <input type="text" placeholder="아이디"/>
          <input type="password" placeholder="패스워드"/>
          
          <a id="id">login</a>
          <a href="./login/pw_find.php" id="id">비밀번호찾기</a>
          <a id="id" href="./membership/source/browsewrap.php">회원가입</a>
          <p class="message">우리팀화이팅<br><a href="#">(주)저기요</a></p>
        </form>
 	 </div><!-- END OF 로그인창 div   -->
	
	
	
	
	
	
	
	<footer>
		<?php include "./common_lib/footer1.php"; ?>
	
	</footer>

</body>

</html>