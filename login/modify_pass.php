<?php
session_start();
?>

<?php 

include "../common_lib/common.php";         // dbconn.php 파일을 불러옴

$email=$_GET['email'];
$pass=$_POST['new_pass'];

 $sql="update membership set pass='$pass' where email='$email'"; 
/* $sql="update find set pass='$new_pass'"; */
 var_dump($sql);
 var_dump($email);

$result=mysqli_query($con, $sql) or die("오류ㅋㅋㅋㅋ : " . mysqli_error($con));


mysqli_close($con);
echo "<script>alert('회원님의 비밀번호가 변경되었습니다.')</script>";
echo"<script>location.href='../index.php';</script>";


?>