<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>배달 홈페이지</title>
<link rel="stylesheet" href="../common_css/index_style.css?v=1">
<link rel="stylesheet" href="./css/store_list_style.css?v=5">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>	
		function tableClicked(){
			window.location.href="store_view.php";
		}
	</script>
</head>
<body>
	<header>
		<?php include "../common_lib/top_login1.php"; ?>
	</header>

	<div class="logo">
		<a href="../index.php"><img alt="logo" src="../common_img/logo.JPG"></a>
	</div>

	<nav>
		<?php include "../common_lib/menu1_2.php"; ?>
	</nav>

	<div class="store_top">
		<div id="store_head"><?php ?> 주변 음식점 <?php ?>곳을 찾았습니다!</div>
		
		
		<div id="store_head_list">
			<select name="sort_list">
				<option value="">기 본</option>
				<option value="별점">별 점</option>
				<option value="리뷰">리뷰수</option>
				<option value="금액">최소주문금액</option>
				<option value="배달시간">배달시간</option>
			</select>
		</div>
		<!-- end of head_list -->

		<div id='search_window'>
			<input id=text type="text" class='input_text' name="search"
				onkeydown="enterSearch()" />
		</div>
		<div id="store_search">
			<input type="button" class='store_search' value="검색"
				onclick="myFunction()" />
		</div>

	</div>
	<!-- end of menu_top -->
	<hr>

	<div class="store_list">
		<div class="store_list_info1">
			<!-- DB에서 불러온 가게수에 따라서 div 생성하면댄다 >내부 내용도 써야함 -->
			<table onclick="tableClicked()">
				<tr>
					<td rowspan="4" id=store_list_img>					
					<td>가게이름					
					<td>쿠폰				
				<tr>
					<td>별점					
					<td>좋아요수
				<tr>
					<td>대표메뉴					
					<td>리뷰수				
				<tr>
					<td>최소주문금액					
					<td>			
			</table>
		</div>
		<div class="store_list_info2">
			<!-- DB에서 불러온 가게수에 따라서 div 생성하면댄다 >내부 내용도 써야함 -->
			<table onclick="tableClicked()">
				<tr>
					<td rowspan="4" id=store_list_img>					
					<td>가게이름					
					<td>쿠폰				
				<tr>
					<td>별점					
					<td>리뷰수
				<tr>
					<td>대표메뉴					
					<td>				
				<tr>
					<td>최소주문금액					
					<td>			
			</table>
		</div>


	</div>

	<footer>
      <?php include "../common_lib/footer1.php"; ?>
	</footer>
</body>
</html>