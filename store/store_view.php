<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>배달 홈페이지</title>
    <link rel="stylesheet" href="../common_css/index_style.css?v=4">
    <link rel="stylesheet" href="css/store_view_style.css?v=3">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript"> 
    var BASE = 0; // 스크롤 시작 위치    
    var LEFT = 0; // 왼쪽 여백    
    var TOP1 = 0; // 위쪽 여백    
    var TOP2 = 0; // 스크롤시 브라우저 위쪽과 떨어지는 거리    
    var ActiveSpeed = 35;    
    var ScrollSpeed = 20;    
    var Timer;      

    function RefreshM(){     
        var StartPoint, EndPoint;     
        StartPoint = parseInt(document.getElementById('cart_table').style.top, 10);    
        EndPoint = Math.max(document.documentElement.scrollTop, document.body.scrollTop) + TOP2;     

        if (EndPoint < TOP1) EndPoint = TOP1;     
        if (StartPoint != EndPoint)   {      
            ScrollAmount = Math.ceil( Math.abs( EndPoint - StartPoint ) / 15 );                                 
            document.getElementById('cart_table').style.top =  
            	parseInt(document.getElementById('cart_table').style.top, 10) +  ( ( EndPoint<StartPoint ) ? -ScrollAmount : ScrollAmount ) + "px";      
            RefreshTimer = ScrollSpeed;      
       }    
       
       Timer = setTimeout("RefreshM();", ActiveSpeed);    
     }    

    function InitializeM(){    
        document.getElementById('cart_table').style.left = LEFT + "px";                              
        document.getElementById('cart_table').style.top = 
                                                 document.body.scrollTop + BASE + "px";     
        RefreshM(); 
	}
 </script>
</head>
<body onload="InitializeM();">
	<header>
		<?php include "../common_lib/top_login1.php"; ?>
	</header>
	
	<div class="logo">
		<a href="../index.php"><img alt="logo" src="../common_img/logo.JPG"></a>
	</div>
	
	<nav>
		<?php include "../common_lib/menu1_2.php"; ?>
	</nav>
	
	<div class="store_view" style="border:1px solid green">  
		<div class="store_data" style="border:1px solid green">		
    		<div class="store_outline" style="border:1px solid green">
    		<table>
    			<tr><td colspan="2" id=s1><?php ?>가게이름
    			<tr><td id=s2>별점
    			<tr><td id=s3><?php ?>배달가능지역
    			<tr><td id=s4><?php ?>배달 시간
    		</table>
    		</div><!-- end of store_data -->
    		
    		<div class="store_menu" style="border:1px solid green">
                <!-- TAB CONTROLLERS -->
                <input id="panel-1-ctrl" class="panel-radios" type="radio" name="tab-radios" checked>
                <input id="panel-2-ctrl" class="panel-radios" type="radio" name="tab-radios">
                <input id="panel-3-ctrl" class="panel-radios" type="radio" name="tab-radios">
                
                <!-- TABS LIST -->
                    <ul id="tabs-list">
                        <!-- MENU TOGGLE -->
                        <li id="li-for-panel-1">
                          <label class="panel-label" for="panel-1-ctrl">메 뉴</label>
                        </li>
                        <li id="li-for-panel-2">
                          <label class="panel-label" for="panel-2-ctrl">가게 정보</label>
                        </li>
                        <li id="li-for-panel-3">
                          <label class="panel-label" for="panel-3-ctrl">리 뷰</label>
                        </li>
                    </ul>
                     
                    <!-- THE PANELS -->
                    <article id="panels" style="border:1px solid green">
                      <div class="container">
                        <section id="panel-1">
                          <main>
                            <p>Content1</p>
                          </main>
                        </section>
                        <section id="panel-2">
                          <main>
                            <p>Content2</p>
                          </main>
                        </section>
                        <section id="panel-3">
                          <main>
                            <p>Content3</p>
                          </main>
                        </section>
                      </div>
                    </article>      		
    		
    		</div><!-- end of store_menu -->
    		    		
		</div><!-- end of store_data -->
		
		<div class="cart_view" >
		<div style="position:relative; width:100%; height:1200px; border:1px solid black"> <!--div 기준으로 table의 위치가 선정된다  -->
			<table id=cart_table>
				<tr><td id=c1>장바구니<div></div><img onclick="delCart()" src="../common_img/waste-bin.png">
				<tr><td class=cart>
				<?php ?> <!--이벤트 결과에 따라 테이블 생성 -->
				<table><tr><td colspan="2" id=c2_1>상호명
				<tr><td colspan="2" >메뉴정보
				<tr><td>가격<td id=c2_3_2>수량조절버튼
				</table>
				
				<tr><td id=c3>최소주문금액 <?php ?>원 이상
				<tr><td id=c4>합계 <?php ?>원
				<tr><td id=c5><button>주 문 하 기</button>
			</table>
		</div>
		</div><!-- end of cart_view -->		
		
		
	</div><!-- end of store_view -->
		
	
	

	<footer>
      <?php include "../common_lib/footer1.php"; ?>
	</footer>
</body>
</html>