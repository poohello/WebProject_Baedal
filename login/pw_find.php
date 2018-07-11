<?php 
include "../common_lib/common.php";
if(isset($email)){
    $sql = "select * from membership where email='$email'";
    $result = mysqli_query($con, $sql) or die("실패원인 : ".mysqli_error($con));
    if(mysqli_num_rows($result)==0){
        echo "<script>
          alert('회원님의 정보가 존재하지 않습니다.');
        </script>";
    }else{
        $row = mysqli_fetch_array($result);
        $emailz = $row['email'];
    }
}
?>
<?php 
$new_pass=$_POST['new_pass'];

?>               
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function mail(){
	location.href="./PHPMailer/webemail_index.php";
}
</script>
<meta charset="UTF-8">
<title>배달 홈페이지</title>
<link rel="stylesheet" href="./css/pw_find.css"> 

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


</head>
<body>

    <form class="form" method="post" action="./PHPMailer/webemail_index.php">
      <input type="text" name="email" placeholder="이메일 주소 입력(필수)"/>
      <div style="text-align: left">
        <div style="display:inline-block;">
     		 <li>비밀번호 설정을 위해 가입하신 이메일 주소를 입력 후, 이메일 발송 버튼을 눌러주세요.</li>
        </div>
      </div>  
      <button id="email_go">이메일 발송</button>
      <p class="message">우리팀화이팅<br><a href="#">(주) 저기요</a></p>
    </form>
</body>


</html>