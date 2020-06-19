<?php
session_start();
if($_SESSION['login']=='success'){
	$messageId=$_GET['messageId'];
	$admin=$_GET['adminName'];
	$reply=$_GET['reply'];
	include("conn.php");
	if($reply=='0'){
		$flag=mysql_query("update message set reply='1' where messageId=$messageId");	
	}else{
		$flag=mysql_query("update message set reply='0' where messageId=$messageId");	
	};
	if($flag){
		header("location:index.php?adminName=$admin");	
	}else{
		echo '<script>alert("删除失败，请联系高级管理员");location.href="index.php";</script>';	
	}
}else{
	header("location:error.php");	
}



?>