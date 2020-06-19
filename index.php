<?php  session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>todolist</title>
<link rel="stylesheet" href="css/index1.css" />
<link rel="stylesheet" href="css/left.css" />
<script src="js/jquery-1.11.2.js"></script>
<script>
$(function(){
	$("input[type=submit]").click(function(e){
		if($("input[type=text]").val()==""||$("textarea").val()==""){
			e.preventDefault();
		}	
	})
})

</script>
</head>

<body class="learn-bar">
<aside class="learn"><header> 
<h3>添加好友</h3>
<div id="black"><input type="text" /><input type="button" value="搜索" id="sousuo"/></div>
<hr> 
<h3>好友列表</h3> <span class="source-links">   
<h5>zhangsan</h5>  
<h5>李四</h5> 
<h5>cici</h5>  
<h5>tom</h5>
</span> </header> <hr> 
<a id="zhuxiao" href="loginout.php"><h4>注销</h4></a>
</aside>



<section class="todoapp">
<header class="header">
<h1>todos</h1>
<?php
$admin=$_GET['adminName'];
?>
<form name="newtodo" action="tian.php?adminName=<?php echo $admin ?>" method="post" autocomplete="off">
   <input type="text" class="new-todo" name="newtodo" placeholder="What needs to be done?" value="" autofocus/>
</form>
</header>
<section class="main" >
   <input id="toggle-all" class="toggle-all" type="checkbox" >
   <ul class="todo-list" >
   


<?php
$admin=$_GET['adminName'];
include("conn.php");
$z=mysql_query("select * from message where admin=$admin and reply='0'");
@$zz=mysql_num_rows($z);

$rs=mysql_query("select * from message where admin=$admin");
@$rscount=mysql_num_rows($rs);
@mysql_data_seek($rs);
for($i=1;$i<$rscount+1;$i++){ 
if(@$info=mysql_fetch_array($rs)){
?>
      <li class="<?php if($info['reply']==0){ ?><?php }else{ echo completed; } ?>" >
         <div class="view" >
            <input class="toggle" type="checkbox" onclick='location.href=("gai.php?adminName=<?php echo $admin ?>&messageId=<?php echo $info['messageId']; ?>&reply=<?php echo $info['reply']; ?>")'>
            <label ><?php echo $info['content'] ?></label><button class="destroy" onclick='location.href=("delete.php?adminName=<?php echo $admin ?>&messageId=<?php echo $info['messageId']; ?>")'></button>
         </div>
         <input class="edit" value="<?php echo $info['content'] ?>"  >
      </li>
<?php } }?>
   </ul>

   
   </section>
     <footer class="footer" >
     <span class="todo-count" ><strong><?php if($zz==0){ ?>0<?php }else{ echo $zz; } ?></strong><span > </span><span ><?php if($zz==0){ ?>item<?php }else{ echo 'items'; } ?></span><span > left</span></span>
       <ul class="filters" >
          <li >
             <a href="#/" class="selected">All</a>
          </li>
          <span > </span>
          <li >
             <a href="#/active" class="" >Active</a>
          </li>
          <span> </span>
          <li >
             <a href="#/completed" class="" >Completed</a>
          </li>
       </ul>
       <button class="clear-completed" onclick='location.href=("alldelete.php?adminName=<?php echo $admin ?>")'>Clear completed</button>
     </footer>
   </section>

</body>

<script type="text/javascript">
//window.onload=function(){
	//var cc=document.getElementById("cc");
	//var up=document.getElementById("up");
	//up.onclick=function(){
		//if(up.checked==true){
		//	cc.className="completed"
		//}else{
		//	cc.className=" "	
		//}
	//}
//}



</script>


</html>