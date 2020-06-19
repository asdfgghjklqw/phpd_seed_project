<?php
session_start();
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
   $newtodo=$_POST['newtodo'];
   $admin=$_GET['adminName'];
   include("conn.php");
   $a=mysql_query("insert into message(content,admin) values('$newtodo','$admin')");
   if($a){
	   echo "<script>window.location.href='index.php?adminName=$admin'</script>";
   }
}else{
	header("location:error.php");
}
?>

