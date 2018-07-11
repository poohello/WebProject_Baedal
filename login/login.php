<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="./css/login.css"> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<script type="text/javascript">
function popup(){
    var popupX = (window.screen.width/2)-(1200/2);
    var popupY = (window.screen.height/2)-(600/2);
    window.open('./login.php','','left='+popupX+',top='+popupY+', width=400, height=600, status=no, scrollbars=no');
  }
</script>
<body>
<form class="signUp" id="signupForm">
<div class="login-page">
  <div class="form">
    <form class="login-form">
    <h1>저기요</h1>
      <input type="text" placeholder="아이디"/>
      <input type="password" placeholder="패스워드"/>
      <div style="text-align: left">
        <div class="clearfix" style="display:inline-block;">
     		 <small><input id="option1" type="checkbox" name="opt" style="width: 20px;">로그인 상태 유지</small>
        </div>
      </div>  
      <!-- <small id="b"><input type="checkbox">로그인 상태 유지 </small> -->
      <button id="id">login</button>
      <button id="id">아이디찾기</button>
      <button id="id">비밀번호찾기</button>
      <button id="id">회원가입</button>
      <p class="message">우리팀화이팅<br><a href="#">(주)저기요</a></p>
    </form>
  </div>
</div>
</form>
</body>
</html>