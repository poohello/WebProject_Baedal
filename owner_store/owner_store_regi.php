<?php
session_start();

include "../common_lib/common.php";

$owner_id=$_SESSION['owner_id'];
$owner_name = $_POST['owner_name']; //대표자명
$owner_store_name= $_POST['owner_store_name']; //상호명
$owner_address = $_POST['owner_address']; //사업자주소
$business_license= $_POST['business_license']; //사업자등록번호
$business_license_img = $_POST['business_license_img']; //사업자등록증사본

$store_name = $_POST['store_name']; //가게명
$store_type = $_POST['store_type']; //업종
$store_origin = $_POST['store_origin']; //원산지
$store_delivery_time = $_POST['store_delivery_time_start']."~".$_POST['store_delivery_time_end']; //배달시간
$store_day_off = $_POST['store_day_off']; //휴무일
$store_phone = $_POST['store_phone1']."-".$_POST['store_phone2']."-".$_POST['store_phone3']; //전화번호
$store_delivery_area = $_POST['store_delivery_area']; //배달지역

  $flag = "NO";
  $sql = "show tables from web_baedal_DB";
  $result = mysqli_query($con, $sql) or die("실패원인: ".mysqli_error($con));
  while($row=mysqli_fetch_row($result)){
    if($row[0]==="store_regi"){
      $flag = "OK";
      break;
    }
  }
  if($flag !=="OK"){
    $sql = "create table store_regi(
      owner_num int(5) not null AUTO_INCREMENT,
      owner_id varchar(10) not null,
      owner_name varchar(5) not null,
      owner_store_name varchar(50) not null,
      owner_address varchar(50) not null,
      business_license varchar(50) not null,
      business_license_img varchar(50) not null,
      store_name varchar(50) not null,
      store_type varchar(50) not null,
      store_delivery_time varchar(50) not null,
      store_day_off varchar(50) not null,
      store_phone varchar(50) not null,
      store_delivery_area varchar(50) not null,
      store_logo_img varchar(50) not null,
      primary key(owner_num)
    )";
    if(mysqli_query($con, $sql)){
      echo "<script>
        alert('store_regi 테이블이 생성되었습니다!');
      </script>";
    }else{
      echo "<script>
        alert('books 테이블 생성실패');
      </script>";
    }
  }  
  
  $sql= "select * from store_regi where business_license='$business_license'";  
  $result= mysqli_query($con, $sql);  
   mysqli_num_rows($result);  
  
  if(mysqli_num_rows($result)){
      echo "<script> window.alert('해당 업체가 이미 등록되어있습니다.'); history.go(-1); </script>";
      exit();
  }else{
      $sql= "insert into store_regi (owner_id, owner_name, owner_store_name, owner_address,
             business_license, business_license_img, store_name, store_type, store_delivery_time,
             store_day_off, store_phone, store_delivery_area, store_logo_img) ";
      $sql.= "values ($owner_id, $owner_name, $owner_store_name, $owner_address,
             $business_license, $business_license_img, $store_name, $store_type, $store_delivery_time,
             $store_day_off, $store_phone, $store_delivery_area, $store_logo_img)";
 
             mysqli_query($con, $sql) or die("실패원인: ".mysqli_error($con));
  }
  
  mysqli_close($con);
  
  echo "<script>alert('매장 등록 신청이 완료되었습니다.')</script>";
  echo "<script> location.href='../index.php'; </script>";
  


?>