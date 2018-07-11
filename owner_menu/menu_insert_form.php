<?php 

    include "../common_lib/common.php";


    $flag = "NO";
    $sql = "show tables from web_baedal_DB";
    $result = mysqli_query($con, $sql) or die("실패원인:".mysqli_error($con));
    while($row=mysqli_fetch_row($result)){
        if($row[0]==="menu"){
            $flag = "OK";
            break;
        }
    }
    if($flag !=="OK"){
        $sql = "create table menu(
              registration_number varchar(50) not null,
              category_name varchar(20) not null,
              menu_name varchar(20) not null,
              menu_comp varchar(100) not null,
              menu_price varchar(20) not null,
              menu_img varchar(40) not null
            
              )";
        
        //registration_number(사업자번호)를 owner_member 테이블에 foreign키로 잡아주자.
        if(mysqli_query($con, $sql)){
            echo "<script>
            alert('menu 테이블 생성성공!');
          </script>";
        }else{
            echo "<script>
            alert('menu 테이블 생성실패');
          </script>";
        }
    }



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style>
	body{
		overflow: scroll;
	}
	
	div{
		border: 1px solid black;
		margin-top: 10px;
	}
	
	.menu_info{
		margin-left: 20px;
	}
	
	.insert_form{
		height: 2000px;
		border: 1px solid black;
	}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>

	

	function add_category(){
		if($(".insert_input").val().length <= 0){
			return;
		}
		
		$(".a").before( //추가 div 앞쪽에 원하는 컨텐츠를 추가시킨다.
			"<div class='category_area'>"+
				"<div>"+
					"<input class='category' type='text' value='"+$(".insert_input").val()+"' disabled>"+
					"<input type='button' onclick='del_category(this)' value='삭제'>"+
				"</div>"+
					"<div class='add_menu'>"+
						"<input class='category_name' type='text' value='"+$(".insert_input").val()+"'> <br>"+
						"<input class='menu_name' type='text' placeholder='메뉴명'><br>"+
					    "<input class='menu_comp'type='textarea' placeholder='메뉴구성'><br>" +
					    "<input class='menu_price' type='text' placeholder='가격'><br>"+
					    "<input type='button' value='메뉴추가' onclick='add_menu(this)'>*메뉴추가 이후에 이미지를 설정해 줄 수 있습니다! "+
			    	"</div>"+
			 "</div>"
		);
		
		$(".insert_input").val(""); // 값 초기화
	}
	
	function add_menu(element){
		
		$(element).parent().before(
			"<div class='menu_info'>"+
			    "<input name='category_name[]' type='text' value='"+$(element).parent().children(".category_name").val()+"' readonly><br>"+
				"<input name='menu_name[]' type='text' value='"+$(element).parent().children(".menu_name").val()+"' readonly><br>"+
			    "<input name='menu_comp[]' type='textarea' value='"+$(element).parent().children(".menu_comp").val()+"' readonly><br>" +
			    "<input name='menu_price[]' type='text' value='"+$(element).parent().children(".menu_price").val()+"' readonly><br>"+
			    "<input name='menu_img[]' type='file' ><br>"+
			    "<input type='button' onclick='del_menu(this)' value='삭제'>"+
	   		"</div>"		
		);
	
		$(".menu_name").val("");
		$(".menu_comp").val("");
		$(".menu_price").val("");
		
	}
	
	function del_menu(element){
			$(element).parent().remove(); //부모요소(이경우 div)를 삭제한다.
	}
	
	function del_category(element){
			$(element).closest(".category_area").remove(); //부모요소중 선택자를 사용해 조작할 수 있는 closest;
	}
	
	
	
	
</script>
</head>
<body>
	<form class='insert_form' name="insert_form" method="post" action="./menu_insert.php" enctype="multipart/form-data">
			<div class="a">
				<input class="insert_input" type="text" placeholder="카테고리명을 입력하세요!"> <input type="button" value="추가" onclick="add_category()">
			</div>
		<div>
			<button>등록</button>
		</div>
	</form>
</body>
</html>