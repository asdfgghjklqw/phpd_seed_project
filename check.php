<?php
session_start();
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
	$adminName=$_POST['adminName'];
	$adminPwd=$_POST['adminPwd'];
	include("conn.php");
	$rs=mysql_query("select * from admins where adminName='$adminName' and adminPwd='$adminPwd'" );
	$num=mysql_num_rows($rs);
	if($num>0){
		$_SESSION['login']='success';
		$_SESSION['adminName']=$adminName;
		header("location:index.php?adminName=$adminName");	
	}else{
		echo '<script>alert("账号或密码错误");location.href="login.php";</script>';
	}
}else{
	header("location:error.php");	
}

?>