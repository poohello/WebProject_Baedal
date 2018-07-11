<meta charset="utf-8">
<?php
include "../../common_lib/common.php";
   if(!isset($_GET['nick'])) 
   {
      echo("닉네임을 입력하세요.");
   }
   else
   {
      $nick = $_GET['nick'];
     
      
 
      $sql = "select * from membership where nick='$nick'";

      $result= mysqli_query($con, $sql);
      $row= mysqli_fetch_array($result);
      if(strlen($id) >= 6 && strlen($id) <= 12){
          $num_record= mysqli_num_rows($result);
      }else{
          $num_record=1;
      }

      $result = mysqli_query($con,$sql);
      $num_record = mysqli_num_rows($result);
      
      if ($num_record){
         echo "닉네임이 중복<br>";
         echo "다른 닉네임 사용<br>";
      }else{
         echo "사용가능 닉네임";
      }
    
      mysqli_close($con);
   }
?>
