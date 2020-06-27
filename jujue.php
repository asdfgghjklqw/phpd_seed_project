<?php
session_start();
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
   $messageId=$_GET['messageId'];
   $admin=$_GET['adminName'];
   include("conn.php");
   $a=mysql_query("delete from pengyou where messageId=$messageId");
   if($a){
	   echo "<script>window.location.href='index.php?adminName=$admin'</script>";
   }
}else{
	header("location:error.php");
}
?>

