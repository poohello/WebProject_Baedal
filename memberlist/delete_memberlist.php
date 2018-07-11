<?php

include "../common_lib/common.php";

$id=$_GET['id'];

$sql="select * from memberlist where id='$id'";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
$id2=$row['id'];

if(empty($id2)){

$sql="delete from membership where id='$id' ";
$result=mysqli_query($con, $sql) or die("실패원인 : ".mysqli_error($con));

echo"
    <script>
    alert('회원삭제 완료');
    location.href='memberlist.php';
</script>
";
}


mysqli_close($con);
?>