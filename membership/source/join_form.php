<?php 
session_start();
    include "../../common_lib/common.php";
    
    $flag = "NO";
    $sql = "show tables from web_baedal_DB";
    $result = mysqli_query($con, $sql) or die("실패원인1:".mysqli_error($con));
    while($row=mysqli_fetch_row($result)){
        if($row[0]==="membership"){
            $flag ="OK";
            break;
        }
    }
    
    if($flag!=="OK"){
        $sql= "create table membership (
                  user char(3) not null,
                  id char(12) not null primary key,
                  nick char(16) not null,
                  email char(12) not null,
                  pass char(12) not null,
                  file_name_0 char(40) null,
                  file_copied_0 char(40) null
               )default charset=utf8;";
        if(mysqli_query($con,$sql)){
            echo "<script>alert('membership 테이블이 생성되었습니다.')</script>";
        }else{
            echo "실패원인2:".mysqli_query($con);
        }
    }
    
    $sql="select * from membership where id='$id'";
    $result= mysqli_query($con, $sql);
    $row= mysqli_fetch_array($result);
    if(strlen($id) >= 6 && strlen($id) <= 12){
        $num_record= mysqli_num_rows($result);
    }else{
        $num_record=1;
    }
        
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href=../css/join_form.css?ver=1 rel=stylesheet>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
//replace, realscap rqwe , html
	var conf="y";
	var email_pass="N";
		function check_exp(elem, exp, msg){
			if(!elem.value.match(exp)){
				alert(msg);
				return true;
			}
		}
		
		function check_id(){
			var exp_id= /^[0-9a-zA-Z]{6,12}$/;	//0~9, a~z, A~Z
	    	var id_val= document.join_form.id.value;
			if(!id_val){
				alert("ID를 입력해주세요");
				return ;
			}
			
			if(!check_exp(document.join_form.id.value, exp_id, "ID는 6~12자리 영문 또는 숫자만 입력해주세요!")){
	    		document.join_form.id.focus();
	    		document.join_form.id.select();
	    		
	    		return ;
			} 
			
			
			
			window.open("check_id.php?id=" + document.join_form.id.value,
			         "idcheck",
			          "left=200,top=200,width=500,height=300,scrollbars=no,resizable=yes");
			
		}
		
		 function check_nick(){
			 var exp_nick= /^[0-9a-zA-Z]{6,12}$/;	//0~9, a~z, A~Z
		    	var nick_val= document.join_form.nick.value;
				if(!nick_val){
					alert("닉네임을 입력해주세요");
					return ;
				}
		   
		     window.open("check_nick.php?nick=" + document.join_form.nick.value,
		         "NICKcheck",
		          "left=200,top=200,width=500,height=300,scrollbars=no,resizable=yes");
		   }
		
		
		 function check_email(){	//수정
		    	var email_val= document.join_form.email.value;
				if(!email_val){
					alert("이메일을 입력해주세요");
					return ;
				}
				window.open("../PHPMailer/send_email.php?email=" + document.join_form.email.value,
				"IDEmail", "left=200, top=200, width=500, height=350, scrollbars=no, resizable=yes");
			}
		 
		 function email_ok(){
				/* document.getElementById("email_ook").innerHTML="인증 완료"; 
				 $("#email_ook").html("인증완료"); 
				 $("#check_email").attr("readonly","readonly");
				 $("#email").attr("disabled","disabled"); */
				email_pass="Y";
			}
		 
		 
		function check_input(){
			if(!document.join_form.user.value){
				alert("회원종류를 선택해주세요");
				return;
			}
			
			// 아이디 검사
			var exp_id= /^[0-9a-zA-Z]{6,12}$/;
			if(check_exp(document.join_form.id, exp_id, "ID는 6~12자리 영문 또는 숫자만 입력해주세요!")){
				document.join_form.id.focus();
				document.join_form.id.select();
				return ;
			}
			
			
			var exp_nick= /^[0-9a-zA-Z가-하]{2,10}$/;
			if(!document.join_form.nick.value){
				alert("닉네임을 입력 해주세요");
				document.join_form.nick.focus();
				return ;
			}			
			if(check_exp(document.join_form.nick, exp_nick, "닉네임 올바르게 입력해주세요")){
				document.join_form.nick.focus();
				document.join_form.nick.select();
				return ;
			}	
			
			 if(email_pass === "N"){
					alert("이메일을 인증해주세요 !!");
					return;
				}
			
		 	// 암호 검사
			var exp_pass= /^[0-9a-zA-Z~!@#$%^&*()]{10,16}$/;
			if(!document.join_form.pass.value){
				alert("암호를 입력해주세요");
				document.join_form.pass.focus();
				return ;
			}			
			if(check_exp(document.join_form.pass, exp_pass, "암호는 6~12자리 영문 또는 숫자만 입력해주세요!")){
				document.join_form.pass.focus();
				document.join_form.pass.select();
				return ;
			}		
			
			// 암호 일치 확인
			if(document.join_form.pass.value != document.join_form.passcheck.value){
				alert("암호가 일치하지 않습니다. 다시 입력해주세요");
				document.join_form.pass.focus();
				document.join_form.pass.select();
				return ;
			}
			
			
			
			/* // 이메일 확인
			if(!document.join_form.email.value){
				alert("e-mail 인증을 해주세요");
				document.join_form.pass.focus();
				document.join_form.pass.select();
				return ;
			}  */
			
			
			document.join_form.submit();
		}


// function manager(){
// 	var chk = document.getElementById("owner");
// 	var chk2 = document.getElementById("user");
	
// 	if(chk.checked==true){
// 		alert("ㅋㅋ");
// 		$(document).ready(function(){
// 			$("#owner").click(function(){
// 				$("#password").html(
// 						"<div>"+" *사업자등록증 "+"<input type='file' style='margin-left: 80px'>"+
// 						"</div>"
					
// 				);
// 			});
// 		});
// 	}else if(chk2.checked==true){
// 		alert("선택2");
// 		$(document).ready(function(){
// 			$("#owner").remove();
// 		});
// 	}
		
// }//end of function

$(document).ready(function(){
	$("#owner").click(function(){
		$("#password").append(
					"<div id='manage'>"+" *사업자등록증 "+"<input type='file' name='upfile[]' style='margin-left: 80px; margin-top: 30px'>"+
					"</div>"
					);
	
	$("#user").click(function(){
		$("#manage").remove();	
	});
	});
	
});

function cancel(){
	location.href='./browsewrap.php'; 
}

</script>
<title>회원가입</title>
</head>
<body>
<header>

</header>

<div id="wrapper">
<img src="../images/baemin_logo.PNG" width="200px"><br><br>
<p id="main" style="font:gray">회원가입</p>
<div style="border : 0.5px solid gray;" ></div><br>
<form name="join_form" method="post" action="insert.php" enctype="multipart/form-data">
<div>*회원종류&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 점주<input type="radio" class="ok" name="user" id="owner" onclick="manager()" value="점주" >
이용자<input type="radio" id="user" class="ok" name="user" value="이용자"></div><br>

<div>*아이디 <input type="text" style="margin-left: 80px" name="id" placeholder="2~10글자로 입력하세요.">
<input class="ok" type="button" onclick="check_id()" value="중복확인"></div> 

<div style="margin-top: 50px;"> *닉네임 <input type="text" style="margin-left: 80px" name="nick" placeholder="2~10글자로 입력하세요."> 
<input class="ok" type="button" value="중복확인" onclick="check_nick()"></div> 

<div style="margin-top: 50px;">*이메일<input type="text" style="margin-left: 90px" name="email" placeholder="ex)mirae@baemin.com" id="confirm">
<input class="ok"  type="button" value="인증하기" onclick="check_email()"><span id="email_ook"></span></div> 

<input type="hidden" name="email_num2" >
<div style="margin-top: 50px;">*비밀번호 <input type="password" name="pass" style="margin-left: 65px" placeholder="8~20자로 입력하세요."></div>

<div style="margin-top: 50px;" id="password">*비밀번호 확인 <input type="password" name="passcheck" style="margin-left: 25px" placeholder="8~20자로 입력하세요."><br><br></div>

<div id="wrapper2" align="center"><br><br><br> 
<input type='button' class="ok" style="width: 100px; height: 50px; font-size: 17px" onclick="check_input()" value='가입하기'></button> 
<input type='button' class="ok"  style="width: 100px;  height: 50px; font-size: 17px" onclick="cancel()" value="취소하기" ></button>
</div>
</form>
</div>

</body>
</html>


