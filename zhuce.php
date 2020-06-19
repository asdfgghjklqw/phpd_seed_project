<?php  session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="css/zhuce.css" />
</head>

<body>
<form name="login" id="form1" action="tianjia.php" method="post" autocomplete="off">
昵称：<input type="text" id="adminName" name="adminName" autofocus/><br />
邮箱：<input type="text" id="userName" name="username" οnclick="username.value='' username.id='username1'" οnblur="isEmail(this.value)"/><br />
<span id="test_user"></span>
密码：<input id="pwd" type="password" name="adminPwd" /><br />
<input type="submit" name="submit" value="注册" />
</form>


<script type="text/javascript">	  
 window.onload=function (){
	    	var $=function(id){
	    		return document.getElementById(id);
	    	}
			var form1=$('form1');
			var adminName=$("adminName");
	    	var userName=$("userName");
			var pwd=$("pwd");
			
			form1.onsubmit=function(e){
				//用户名为空阻止提交
				var a=/^[0-9]/;
                if (adminName.value==""){
                	alert("昵称不能为空");
					e.preventDefault();
                }else if (!a.test(adminName.value)){
					//昵称格式不正确阻止提交
					alert("昵称只能包含数字");
                	e.preventDefault();
				}
				//邮箱为空阻止提交
				var reg=/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/; 
                if (userName.value==""){
                	alert("邮箱不能为空");
					e.preventDefault();
                }else if (!reg.test(userName.value)){
					//邮箱格式不正确阻止提交
					alert("邮箱格式不正确");
                	e.preventDefault();
				}
                //密码为空阻止提交
                if (pwd.value==""){
                	alert("密码不能为空");
                	e.preventDefault();
                }
			}
			
 }
</script>




</body>
</html>