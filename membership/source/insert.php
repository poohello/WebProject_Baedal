<meta charset=utf-8>
<?php
    include "../../common_lib/common.php";

    //이용자
    $user = $_POST['user'];
    //아이디
    $id= $_POST['id'];
    //닉네임
    $nick = $_POST['nick'];
    //이메일
    $email= $_POST['email'];
    //패스워드    
    $pass = $_POST['pass'];
    
    
    /* 
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    /*   단일 파일 업로드
     $upfile_name	 = $_FILES["upfile"]["name"];
     $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
     $upfile_type     = $_FILES["upfile"]["type"];
     $upfile_size     = $_FILES["upfile"]["size"];
     $upfile_error    = $_FILES["upfile"]["error"];
     */
    
    // 다중 파일 업로드
    $files = $_FILES["upfile"];    //enctype="multipart/form-data"를 보내면 이쪽에서 받는다. write_form.php의 name = upfile[]
    //$_FILES["upfile"]["name"]["index"]로 값을 참조한다. 3차원배열.
    $count = count($files["name"]);//($files["name"])의 갯수가 몇개냐(3개), 배열의 수를 구하는 함수
    
    $upload_dir = './data/';   //상위 폴더인 data폴더에 저장
    
    for ($i=0; $i<$count; $i++){
        $upfile_name[$i]     = $files["name"][$i];    //실제파일명 배열
        $upfile_tmp_name[$i] = $files["tmp_name"][$i];    //서버에 저장되는 임시 파일경로 및 이름의 배열
        $upfile_type[$i]     = $files["type"][$i];    //업로드 파일 형식 배열
        $upfile_size[$i]     = $files["size"][$i];    //업로드 파일 크기 배열 1바이트 단위
        $upfile_error[$i]    = $files["error"][$i];   //에러발생 확인 배열
        
        $file = explode(".", $upfile_name[$i]);
        //밑과 같이 배열을 나열하여 .을 기준으로 name과 ext가 찍힘.
        $file_name = $file[0];
        $file_ext  = $file[1];
        
        
        if (!$upfile_error[$i]){   //에러가 안뜨면 새로운 파일명을 설정 else 4
            $new_file_name = date("Y_m_d_H_i_s");  //년도 월 일 시간 분 초
            $new_file_name = $new_file_name."_".$i;//_1 _2 _3...
            $copied_file_name[$i] = $new_file_name.".".$file_ext;//.확장자
            $uploaded_file[$i] = $upload_dir.$copied_file_name[$i];//업로드할 위치
            
            if( $upfile_size[$i]  > 1000000 ){
                echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1000KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
                exit;
            }//end of if
            
            if ( ($upfile_type[$i] != "image/gif") &&
                ($upfile_type[$i] != "image/jpeg") &&
                ($upfile_type[$i] != "image/pjpeg") )
            {
                echo("
					<script>
						alert('JPG와 GIF 이미지 파일만 업로드 가능합니다!');
						history.go(-1)
					</script>
					");
                exit;
            }
            
            if(!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i])){
                //move_uploaded_file(파일이름변수, "저장디렉토리/저장될파일이름"), 로드된 파일을 새 위치로 옮기는 함수
                echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
                exit;
            }//end of if
        }//end of if
    }//end of for
    
    $sql= "select * from membership where id='$id'";

    $result= mysqli_query($con, $sql) or die("실패원인1:".mysqli_error($con));
    
    $exist_id=mysqli_num_rows($result);

    
    if($exist_id){
        echo "<script> window.alert('해당 아이디가 존재합니다.'); history.go(-1); </script>";
        exit();
    }else{
        $sql= "insert into membership (user, id, nick, email, pass, file_name_0, file_copied_0) ";
        $sql.= "values ('$user','$id','$nick','$email','$pass','$image, $file_name_0, $file_copied_0')";
        
    
        mysqli_query($con, $sql) or die("실패원인2:".mysqli_error($con));
    }
    
    mysqli_close($con);
    
    echo "<script>alert('회원가입이 완료되었습니다.')</script>";
    echo "<script> location.href='./browsewrap.php'; </script>";

?>