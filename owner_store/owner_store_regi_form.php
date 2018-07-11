<?php 
    session_start();
?>

 <?php
//   session_start();
//   include "../common_lib/common.php";
  

// ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>배달 홈페이지 - 사장님 - 매장 등록하기</title>
    <link rel="stylesheet" href="../common_css/common.css?v=2">
    <link rel="stylesheet" href="./css/owner_store_regi.css?v=3">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    	//데이터 유효성검사
    	function check_exp(elem, exp, msg){
			if(!elem.value.match(exp)){
				alert(msg);
				return true;
			}
		}
	
		function inputStore(){
// 			// 이름 검사
// 			var exp= /^[가-힣]{2,5}$/;
// 			if(!document.store_regi.owner_name.value){
// 				alert("대표자명을 입력해주세요");
// 				document.store_regi.owner_name.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.owner_name, exp, "이름은 한글로 2~5자 까지 입력해주세요")){
// 				document.store_regi.owner_name.focus();
// 				document.store_regi.owner_name.select();
// 				return ;
// 			}	
// 			// 상호명
// 			var exp= /^[가-힣a-zA-Z0-9\s]{1,20}$/;
// 			if(!document.store_regi.owner_store_name.value){
// 				alert("상호명을 입력해주세요");
// 				document.store_regi.owner_store_name.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.owner_store_name, exp, "상호명은 특수문자 제외 20자 까지 입력이 가능합니다")){
// 				document.store_regi.owner_store_name.focus();
// 				document.store_regi.owner_store_name.select();
// 				return ;
// 			}			
// 			//사업자주소
// 			var exp_name= /^[가-힣0-9\s-]{1,50}$/;
// 			if(!document.store_regi.owner_address.value){
// 				alert("사업자 주소를 입력해주세요");
// 				document.store_regi.owner_address.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.owner_address, exp_name, "사업자 주소는 50자 까지 입력이 가능합니다")){
// 				document.store_regi.owner_address.focus();
// 				document.store_regi.owner_address.select();
// 				return ;
// 			}		
			
// 			// 사업자 등록번호
// 			var exp= /^[0-9]{9,10}$/;
// 			if(!document.store_regi.business_license.value){
// 				alert("사업자 등록번호를 입력해주세요");
// 				document.store_regi.business_license.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.business_license, exp, "사업자 등록번호는 숫자만 입력 가능합니다!")){
// 				document.store_regi.business_license.focus();
// 				document.store_regi.business_license.select();
// 				return ;
// 			}	
// 			//매장 이름
// 			var exp= /^[가-힣a-zA-Z0-9\s]{1,15}$/;
// 			if(!document.store_regi.store_name.value){
// 				alert("매장 이름을 입력해주세요");
// 				document.store_regi.store_name.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_name, exp, "매장이름은 특수문자 제외 15자 까지 입력이 가능합니다")){
// 				document.store_regi.store_name.focus();
// 				document.store_regi.store_name.select();
// 				return ;
// 			}	
			
// 			if(document.store_regi.store_type.value=="선택"){
// 				alert("업종을 선택해주세요");
// 				document.store_regi.store_type.focus();
// 				return ;
// 			}
// 			//원산지
// 			var exp= /^[가-힣\s(),]{1,100}$/;
// 			if(!document.store_regi.store_origin.value){
// 				alert("원산지 정보를 입력해주세요");
// 				document.store_regi.store_origin.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_origin, exp, "특수문자는 ,와 ()만 입력이 가능합니다. 100자 이내로 입력해주세요")){
// 				document.store_regi.store_origin.focus();
// 				document.store_regi.store_origin.select();
// 				return ;
// 			}	
// 			//배달시작시간
// 			var exp= /^[가-힣0-9\s:,]{1,10}$/;
// 			if(!document.store_regi.store_delivery_time_start.value){
// 				alert("배달시작시간을 입력해주세요");
// 				document.store_regi.store_delivery_time_start.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_delivery_time_start, exp, "특수문자는 :만 입력 가능합니다. 10자 이내로 입력해주세요")){
// 				document.store_regi.store_delivery_time_start.focus();
// 				document.store_regi.store_delivery_time_start.select();
// 				return ;
// 			}	
// 			//배달종료시간
// 			var exp= /^[가-힣0-9\s:,]{1,10}$/;
// 			if(!document.store_regi.store_delivery_time_end.value){
// 				alert("배달종료시간을 입력해주세요");
// 				document.store_regi.store_delivery_time_end.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_delivery_time_end, exp, "특수문자는 :만 입력 가능합니다. 10자 이내로 입력해주세요")){
// 				document.store_regi.store_delivery_time_end.focus();
// 				document.store_regi.store_delivery_time_end.select();
// 				return ;
// 			}	
// 			//휴무일
// 			var exp= /^[가-힣0-9\s,]{1,30}$/;
// 			if(!document.store_regi.store_day_off.value){
// 				alert("휴무일을 입력해주세요");
// 				document.store_regi.store_day_off.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_day_off, exp, "휴무일은 한글과 숫자만 입력 가능합니다.")){
// 				document.store_regi.store_day_off.focus();
// 				document.store_regi.store_day_off.select();
// 				return ;
// 			}			
// 			//전화번호2
// 			var exp= /^[0-9]{3,4}$/;
// 			if(!document.store_regi.store_phone2.value){
// 				alert("전화번호를 입력해주세요");
// 				document.store_regi.store_phone2.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_phone2, exp, "전화번호는 숫자만 입력 가능합니다.")){
// 				document.store_regi.store_phone2.focus();
// 				document.store_regi.store_phone2.select();
// 				return ;
// 			}			
// 			//전화번호3
// 			var exp= /^[0-9]{3,4}$/;
// 			if(!document.store_regi.store_phone3.value){
// 				alert("전화번호를 입력해주세요");
// 				document.store_regi.store_phone3.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_phone3, exp, "전화번호는 숫자만 입력 가능합니다.")){
// 				document.store_regi.store_phone3.focus();
// 				document.store_regi.store_phone3.select();
// 				return ;
// 			}
// 			//배달가능지역
// 			var exp= /^[가-힣\s,]{2,100}$/;
// 			if(!document.store_regi.store_delivery_area.value){
// 				alert("배달가능지역을 입력해주세요");
// 				document.store_regi.store_delivery_area.focus();
// 				return ;
// 			}
// 			if(check_exp(document.store_regi.store_delivery_area, exp, "배달가능지역은 한글과 특수문자 ,만 입력가능합니다.")){
// 				document.store_regi.store_delivery_area.focus();
// 				document.store_regi.store_delivery_area.select();
// 				return ;
// 			}
			alert("매장 등록 신청이 완료되면 내용을 수정하기 어렵습니다. \n모두 정확하게 입력하셨나요?")
			document.store_regi.submit();		
		}
		
    	//이미지 미리보기
    	$(function() {
    		$("#business_license_img").on('change', function(){
    			readURL(this);
    		});
    	});
    	
    	function readURL(input){
    		if(input.files && input.files[0]){
    			var reader = new FileReader();
    			reader.onload = function(e){
    				$("#loadImg1").attr('src', e.target.result);
    			}
    			reader.readAsDataURL(input.files[0]);
    		}
    	}
    	
    	$(function() {
    		$("#store_logo_img").on('change', function(){
    			readURL(this);
    		});
    	});
    	
    	function readURL(input){
    		if(input.files && input.files[0]){
    			var reader = new FileReader();
    			reader.onload = function(e){
    				$("#loadImg2").attr('src', e.target.result);
    			}
    			reader.readAsDataURL(input.files[0]);
    		}
    	}
    	
    	function checkInput(text){
    		if(text.value==""){
    			$(text).attr('placeholder', '해당 내용을 입력해주세요!')
    			
    		}
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
	<form action="./owner_store_regi.php" name="store_regi" method="post" enctype="multipart/form-data">
	<div class="store_regi">
		<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;매장정보 > 매장 등록 하기</h3>
		<hr>
		<div class="ceo_info">
		<br>
		<p>사업자 정보</p>		
    	<table>
    		<tr><td class="td1">대표자명<td class="td2"><input type="text" name="owner_name" placeholder="예) 김동진" onblur="checkInput(this)"><td class="td3" colspan="2">사업자 등록증 사진          
    		<tr><td class="td1">상 호 명<td class="td2"><input type="text" name="owner_store_name" placeholder="예) 주식회사 배달의신"><td rowspan="4" style="text-align: center"><img id="loadImg1" src="../common_img/사진없음.JPG"> 
    		<tr><td class="td1">사업자 주소<td class="td2"><input type="text" name="owner_address" placeholder="예) 서울시 광진구 화양동 111-27">
    		<tr><td class="td1">사업자 등록번호<td class="td2"><input type="text" name="business_license" placeholder="예) 1775100068"><td><input class="content" type="file" id="business_license_img" name="business_license_img"> 
    		
    	</table>
    	</div><!-- end of ceo_info -->
    	
    	<div class="store_info">
        	<br>
        	<hr>
          	<br>
    		
        	<p>매장 정보</p>
        	<table>
        		<tr><td class="td1">매장이름<td class="td2"><input type="text" name="store_name" placeholder="예) 돈구어" ><td class="td3">매장 로고 사진
        		<tr><td class="td1">업  종<td class="td2"><select name="store_type">
                                           <option value="선택">선택</option>
                                           <option value="한식">한식</option>
                                            <option value="분식">분식</option>
                                            <option value="돈까스">돈까스·회·일식</option>
                                            <option value="치킨">치킨</option>
                                            <option value="피자">피자</option>
                                            <option value="중국집">중국집</option>
                                            <option value="족발">족발·보쌈</option>
                                            <option value="야식">야식</option>
                                            <option value="찜">찜·탕</option>
                                            <option value="도시락">도시락</option>
                                            <option value="카페">카페·디저트</option>
                                            <option value="패스트푸드">패스트푸드</option>
                                         </select></td><td rowspan="5" style="text-align: center;"><img id="loadImg2" src="../common_img/사진없음.JPG">
        		<tr><td class="td1">원 산 지<td class="td2"><textarea name="store_origin"  placeholder="예) 쌀(국내산), 돼지고기(호주산) 500자 내외"></textarea>
        		<tr><td class="td1">배달시간<td class="td2"><input type="text" name="store_delivery_time_start" id="block2"  placeholder="예) 오전 9시 or 9:00"> ~ <input type="text" size="10" name="store_delivery_time_end" id="block2"  placeholder="예) 익일 새벽 2시 or 26:00">
        		<tr><td class="td1">휴 무 일<td class="td2"><input type="text" name="store_day_off"  placeholder="예) 마지막 주 일요일">
        		<tr><td class="td1">전화번호<td class="td2"><select name="store_phone1" id="block3">
                                           <option value="02">02</option>
                                           <option value="031">031</option>
                                            <option value="032">032</option>
                                            <option value="033">033</option>
                                            <option value="041">041</option>
                                            <option value="042">042</option>
                                            <option value="043">043</option>
                                            <option value="044">044</option>
                                            <option value="051">051</option>
                                            <option value="052">052</option>
                                            <option value="053">053</option>
                                            <option value="054">054</option>
                                            <option value="055">055</option>
                                            <option value="061">061</option>
                                            <option value="062">062</option>
                                            <option value="063">063</option>
                                            <option value="064">064</option>
                                         </select> - <input type="text"  name="store_phone2" id="block3"> - <input type="text"  name="store_phone3" id="block3">
        		<tr><td class="td1">배달가능지역<td class="td2"><textarea name="store_delivery_area" placeholder="예)동 이름을 입력해주세요"></textarea><td><input class="content" type="file" id="store_logo_img" name="store_logo_img" onchange="loadImg2"> 
        	</table>        	
    	</div><!-- end of store_info -->
    	<div class="store_regi_btn">
    		<button type='button' onclick="inputStore()">등 록</button><button>취 소</button>
    	</div>
	</div><!-- end of store_regi-->
	
	</form>
	
	
<footer>
      <?php include "../common_lib/footer1.php"; ?>
	</footer>
</body>
</html>

<?php
?>
