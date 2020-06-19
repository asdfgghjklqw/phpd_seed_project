<?php  session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="css/login.css" />
</head>

<body>
<?php if(@$_SESSION['login']=='success'){ 
	$adminName=$_SESSION['adminName'];
	header("location:index.php?adminName=$adminName");
}else{ ?>
	<form name="login" action="check.php" method="post" autocomplete="off">
        昵称：<input type="text" name="adminName" autofocus/><br />
        <span id="test_user"></span>
        密码：<input type="password" name="adminPwd" /><br />
        <input type="button" onclick='location.href=("zhuce.php")' value="注册" />
        <input type="submit" name="submit" value="登录" />
    </form>
<?php } ?>


</body>
</html>