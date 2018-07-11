<?php 
if(isset($_SESSION[user]) && $_SESSION[user] == "user"){
?>
    <ul class="menu1_1">
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label"><b style="font-size: 13pt; ">전체목록</b></span></a></li> 
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">한식</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">분식</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">돈까스·회·일식</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">치킨</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">피자</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">중국집</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">족발·보쌈</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">야식</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">찜·탕</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">도시락</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">카페·디저트</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">패스트푸드</span></a></li>
      <li class="menu__item"><a href="../store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">프랜차이즈</span></a></li>
      <li class="menu__item"><a href="#" class="menu__link hover2"><span class="menu__label hover2__label">맛집랭킹</span></a></li>
    </ul>
<?php
}elseif (isset($_SESSION[user]) && $_SESSION[user]== "owner"){
?>
    <ul class="menu1_1">
      <li class="menu__item"><a href="../owner_store/owner_store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">매장정보</span></a></li> 
      <li class="menu__item"><a href="./store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">주문내역</span></a></li>
      <li class="menu__item"><a href="./store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">매출관리</span></a></li>
     
    </ul>

<?php    
}elseif (isset($_SESSION[user]) && $_SESSION[user] == "admin"){
?>
	<ul class="menu1_1">
      <li class="menu__item"><a href="./store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">매장등록관리</span></a></li> 
      <li class="menu__item"><a href="./store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label">회원관리</span></a></li>
      <li class="menu__item"><a href="./store/store_list.php" class="menu__link hover2"><span class="menu__label hover2__label"></span></a></li>
     
    </ul>
<?php 
}
?>