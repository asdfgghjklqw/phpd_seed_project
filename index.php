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
	$(window).keydown(function(e){ 
	if(e.keyCode==13){
		if($("input[name=newtodo]").val()==""){
			e.preventDefault();
		} } }); 
})


</script>
</head>
<?php
$admin=$_GET['adminName'];
?>
<body class="learn-bar">
<aside class="learn"><header> 
<h3>Add buddy</h3>

<form name="pengyou" action="pengyou.php?adminName=<?php echo $admin ?>" method="post" id="form1" autocomplete="off">
<ul id="sousuo">
<li>
	Name：<input type="text" name="toadmin" id="author" maxlength="20">
    <input type="submit" name="submit" value="Add" />
</li>
<li>
	<textarea name="textarea" cols="28" rows="4" id="content" style="resize:none" maxlength="100" placeholder="message：I am..."></textarea>
</li>

</ul>
</form>
<hr> 
<h3>Friend requests</h3>
<section >
<ul>
<?php
$admin=$_GET['adminName'];
include("conn.php");
$q=mysql_query("select * from pengyou where toadmin=$admin and reply='0'");
@$qq=mysql_num_rows($q);
@mysql_data_seek($q);

for($w=1;$w<$qq+1;$w++){ 
if(@$infofo=mysql_fetch_array($q)){
?>
   <li id="pengyouli">
      <?php echo $infofo['ziji'] ?> message:
      <?php echo $infofo['textarea'] ?>
      <form name="haoyou" action="jujue.php?adminName=<?php echo $admin ?>&messageId=<?php echo $infofo['messageId'] ?>" id="jujue" method="post">
          <input type="submit" name="submit" value="NO" />
      </form>
      <form name="haoyou" action="tongyi.php?adminName=<?php echo $admin ?>&messageId=<?php echo $infofo['messageId'] ?>" method="post"  >
          <input type="submit" name="submit" value="OK" />
      </form>
   </li>
<?php } }?>
  </ul>
 </section>

<hr> 
<h3>The friends list</h3> <span class="source-links">   
<?php
$admin=$_GET['adminName'];
include("conn.php");
$e=mysql_query("select * from pengyou where toadmin=$admin and reply='1'");
@$ee=mysql_num_rows($e);
@mysql_data_seek($e);
for($r=1;$r<$ee+1;$r++){ 
if(@$infofo=mysql_fetch_array($e)){
?>
<li id="shanchuhaoyou">
   <h5 id="h5"><?php echo $infofo['ziji'] ?></h5>
   <form name="shanchu" id="shanchu" action="shanchu.php?adminName=<?php echo $admin ?>&messageId=<?php echo $infofo['messageId'] ?>" method="post"  >
      <input type="submit" name="submit" value="Remove buddy" />
   </form><br /></li>
<?php } }?>
</span> </header> <hr> 
<a id="zhuxiao" href="loginout.php"><h4>The cancellation</h4></a>
</aside>



<section class="todoapp">
<header class="header">
<h1>todos</h1>

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
     <span class="todo-count" ><strong><?php if($zz==0){ ?>0<?php }else{ echo $zz; } ?></strong><span > </span><span ><?php if($zz==0||$zz==1){ ?>item<?php }else{ echo 'items'; } ?></span><span > left</span></span>
       <ul class="filters" >
          <li >
             <a href="#/" class="selected">All</a>
          </li>
         
       </ul>
       <button class="clear-completed" onclick='location.href=("alldelete.php?adminName=<?php echo $admin ?>")'>Clear completed</button>
     </footer>
   </section>
<button id="night">Night mode</button>
</body>

<script type="text/javascript">
window.onload=function(){
	var night=document.getElementById("night");
	night.onclick=function(){
		if(night.innerHTML=="Night mode"){
		document.body.style.backgroundColor="black";
		night.innerHTML="Daytime mode";
	}else{
		document.body.style.backgroundColor="#f5f5f5";
		night.innerHTML="Night mode";
	}
}
}



</script>


</html>