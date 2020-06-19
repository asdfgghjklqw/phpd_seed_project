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
	}
}else{
	header("location:error.php");	
}
?>