<?php
session_start();
include "../common_lib/common.php";

$search_value=$_POST['search_value'];
$kind=$_POST['kind'];

if(empty($search_value)){
    $sql = "select * from membership order by id";
}else if($kind=="user"){
    $sql="select * from membership where user like '%$search_value%' ";
}else if($kind=="id"){
    $sql="select * from membership where id like '%$search_value%' ";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>배달 홈페이지</title>
    <link rel="stylesheet" href="../common_css/common.css">
    <link rel="stylesheet" href="./css/memberlist.css?v=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
	<header>
		<?php include "../common_lib/top_login1.php"; ?>
	</header>
	
	<div class="logo">
		<a href="../index.php"><img alt="logo" src="../common_img/logo.JPG"></a>
	</div>
	
	<nav>
		<?php include "../common_lib/menu1_2.php"; ?>
	</nav>
	
	<div style="border:1px solid black; height:1000px; width:1200px; margin: auto auto;">
		<div id="head_list2">
		<h2>회원리스트</h2>

        <form action="memberlist.php" method="post" id="form1">
				<select class="" name="kind">
					<option value="">전체보기</option>
					<option value="user">점주/고객</option>
					<option value="id">아이디</option>
				</select>
        <input type="text" name="search_value">
        <input type="submit" value="검색" id="form1">
		</form>
		</div>	
		
		
		<hr>
	
		<table id="memberlist">
		
		<?php
        if (empty($page)) {
            $page = 1;
        }
        

                
            $members_per_page = 30;
   
            $result = mysqli_query($con, $sql);
            $total_members = mysqli_num_rows($result);
            $total_pages = ceil($total_members / $members_per_page);
            $start_per_page = $members_per_page * ($page - 1);
        
       
        

            echo "<tr class='memberlist_tr'>
                    <td width='108'>점주/고객</td>
                    <td width='124'>아이디</td>
                    <td width='179.2'>닉네임</td>
                    <td width='257.6'>이메일</td>
                    <td width='83.6'>회원삭제</td>
                    </tr>";
            

        for ($i = $start_per_page; $i < $start_per_page + $members_per_page && $i < $total_members; $i ++) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);
            
            $user = $row['user'];
            $id = $row['id'];
            $nick = $row['nick'];
            $email = $row['email'];
            
            
   
            
            echo "<tr class='memberlist_tr2'>
                    <td>$user</td>
                    <td>$id</td>
                    <td>$nick</td>
                    <td>$email</td>
                    <td><a href='./delete_memberlist.php?id=$id'><button type='button' class='button'>삭제</button></a></td>
                    </tr>";
          echo"  <tr class='gray' bgcolor='#cccccc'><td colspan='7'></td></tr>";
        }
        
        
        $block_per_page_num = 2;
        $total_blocks = ceil($total_pages / $block_per_page_num);
        $current_block = ceil($page / $block_per_page_num);
        $current_block_start_page = $block_per_page_num * ($current_block -1);
        $current_block_end_page = ($current_block == $total_blocks) ? $total_pages : $block_per_page_num * $current_block;
        $pre_page = $page > 1 ? $page - 1 : NULL;
        $next_page = $page < $total_members ? $page + 1 : NULL;
        ?>
        	<table id="bottom_page" >
					<tr>
						<td>
                <?php
                if ($page > 1) {
                    echo ("<a href='memberlist.php?page=$pre_page'>[이전]&nbsp;&nbsp;&nbsp;</a>");
                }
                if(mysqli_num_rows($result)==0){
                    $i=1;
                    echo("<td class='for_td'>&nbsp;$i&nbsp;</td>");
                }else{
                for ($i = $current_block_start_page + 1; $i <= $current_block_end_page; $i ++) {
                    if ($i == $page) {
                        echo ("&nbsp;$i&nbsp;");
                    } else {
                        echo ("<a href='memberlist.php?page=$i'>[$i]</a>");
                    }
                }
                }
                if ($current_block < $total_blocks) {
                    echo ("<a href='memberlist.php?page=$next_page'>&nbsp;&nbsp;&nbsp;[다음]</a>");
                }
                ?>
              </td>
					</tr>
				</table>
        </table>
		
	</div>
	
	
	
	<div class="store_btn">

	</div>
	
	<footer>
      <?php include "../common_lib/footer1.php"; ?>
	</footer>
</body>
</html>
