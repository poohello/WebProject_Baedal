<?php 
include "../common_lib/common.php";
$email=$_GET['email'];
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>배달 홈페이지</title>
<link rel="stylesheet" href="./css/pw_reset.css"> 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
        <form class="form" method="post" action="./modify_pass.php?email=<?= $email?>">
    	<div class="safety">
    		<img alt="fuck" src="../common_img/key.jpg"><img alt="fuck" src="../common_img/logo.jpg">
    	</div>
          <input type="password" name="new_pass" placeholder="새로운 비밀번호 입력(최소 8자리 이상)"/>
          <input type="password" placeholder="새로운 비밀번호 확인"/>
           
          <button style="font-size: 26px;">비밀번호 재설정 완료</button>
          <p class="message">우리팀화이팅<br><a href="#">(주) 저기요</a></p>
        </form>

</body>
</html>
