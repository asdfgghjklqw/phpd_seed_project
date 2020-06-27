<?php
session_start();
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
   $toadmin=$_POST['toadmin'];
   $textarea=$_POST['textarea'];
   $admin=$_GET['adminName'];
   include("conn.php");
   $a=mysql_query("insert into pengyou(toadmin,textarea,ziji) values('$toadmin','$textarea','$admin')");
   if($a){
	   echo "<script>window.location.href='index.php?adminName=$admin'</script>";
   }
}else{
	header("location:error.php");
}
?>

