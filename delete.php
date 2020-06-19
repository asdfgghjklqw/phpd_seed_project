<?php
session_start();
if($_SESSION['login']=='success'){
	$messageId=$_GET['messageId'];
	$admin=$_GET['adminName'];
	include("conn.php");
	$flag=mysql_query("delete from message where messageId=$messageId");	
	if($flag){
		header("location:index.php?adminName=$admin");	
	}
}else{
	header("location:error.php");	
}
?>