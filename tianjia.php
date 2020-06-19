<?php
session_start();
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $adminName=$_POST['adminName'];
	$username=$_POST['username'];
	$adminPwd=$_POST['adminPwd'];
    include("conn.php");
	//昵称唯一
    $rs=mysql_query("select * from admins where adminName='$adminName'" );
	$num=mysql_num_rows($rs);
	if($num>0){
		echo '<script>alert("昵称已被占用");</script>';  
	    echo "<script>window.location.href='zhuce.php'</script>";
	}
    //邮箱唯一
    $as=mysql_query("select * from admins where username='$username'" );
	$nums=mysql_num_rows($as);
	if($nums>0){
		echo '<script>alert("邮箱已被占用");</script>';  
	    echo "<script>window.location.href='zhuce.php'</script>";
	}
   //注册
   $flag=mysql_query("insert into admins(adminName,username,adminPwd) values('$adminName','$username','$adminPwd')");
   if($flag){
	   $_SESSION['login']='success';
	   $_SESSION['adminName']=$adminName;
	   echo '<script>alert("注册成功");</script>';  
	   echo "<script>window.location.href='index.php?adminName=$adminName'</script>";
	}
}else{
	header("location:error.php");
}
?>