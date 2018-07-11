<?php
include "../../common_lib/common.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = "";
    }
    
    if($_GET['id']==""){
       echo "아이디를 입력하세요";
       return;
    }
    
    $sql = "select * from membership where id='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if (strlen($id) >= 6 && strlen($id) <= 12) {
        $num_record = mysqli_num_rows($result);
    } else {
        $num_record = 1;
    }

    
    if ($num_record) {
        echo "아이디 중복<br>";
        echo "다른 아이디 사용<br>";
    } else {
        echo "사용가능 아이디";
    }

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<link href=../css/join.css rel=stylesheet>
</head>
<script>
	// 요소 검사 함수
	function check_exp(elem, exp, msg){
		if(!elem.value.match(exp)){
			alert(msg);
			return true;
		}
	}
	//아이디 검사
	function id_check(){
    	var exp_id= /^[0-9a-zA-Z]{6,12}$/;	//0~9, a~z, A~Z
    	var id_val= document.id_check_form.id.value;
		if(!id_val){
			alert("ID를 입력해주세요");
			
			return ;
		}
    	if(check_exp(document.id_check_form.id, exp_id, "ID는 6~12자리 영문 또는 숫자만 입력해주세요!")){
    		document.id_check_form.id.focus();
    		document.id_check_form.id.select();
    		return ;
    	}
    	document.id_check_form.submit();
	}
	
	function id_use(a){
		opener.join_form.id.value=a;
		window.close();
	}
	
	function closer(){
		window.close();
	}

</script>
<body>

</body>
</html>
<?php
mysqli_close($con);
?>


