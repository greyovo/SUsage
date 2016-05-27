<?php 
session_start(); 
$flag=true;//Verify to_sql.php
require_once("../functions/to_sql.php");

//姓氏拼音首字母串定义
$surname="ABCDFGHJKLMNOPQRSTWXYZ";
//循环过程中抽取字母串的位置
$c=-1;
//目前登录用户ID
$uid=$_SESSION['userid']; 

//获取GET数据
$my=$_GET['my'];
$you=$_GET['you'];
//判断页面是否正确
if($my>$you){$who=$you.",".$my;}
else{$who=$my.",".$you;}
if($my!=$uid){
	header("Location: /SUsage/entity/chat.php");
}

//获取对方真实姓名
$r=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user_list WHERE uid='{$you}' "));
$tname=$r['tname'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Zhixin StudentUnion OA System #Codename"SUsage" MSG System Version 0.2.1-milestone1 -->
<!-- ©2016 @Zhxsupc -->
<!-- something new -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/SUsage/res/css/themes/GGB-blue.css" />
<link rel="stylesheet" href="/SUsage/res/css/md/material.css" />
<link rel="stylesheet" href="/SUsage/res/css/modules/ex-mail.css" />
<link rel="stylesheet" href="../res/css/modules/ex-united.css" />
<title>朝发白帝，暮到江陵 / VegeChat </title>
<link rel="shortcut icon" href="/SUsage/res/icons/title/chat_128X128.ico"/>
</head>

<body style="position:absolute;width:100%;">
<?php 
require_once("../functions/Personal.php"); 
?>



<!--第一个appbox-->
<a href="/SUsage/entity/index.php">
	<div id="ex-dnavbar-appbox1" class="ex-dnavbar-appbox">
	  <div class="ex-dnavbar-appbox-fixbox">
	    <img src="/SUsage/res/icons/bar/ic_task.png" style="height:52px;width:52px;" />
	  </div>
		<div class="ex-dnavbar-appbox-text">主页</div>
	</div>
</a>

	<!--第二个appbox-->
<div id="ex-dnavbar-appbox2" class="ex-dnavbar-appbox-selected" title="朝发白帝，暮到江陵">
  <div class="ex-dnavbar-appbox-fixbox">
    <img src="/SUsage/res/icons/bar/ic_chat.png" style="height:52px;width:52px;" />
  </div>
  <div class="ex-dnavbar-appbox-text">聊天</div>
</div>

<!--返回顶部-->
<a onclick="backtop(); return false" href="#">
<div id="ex-dnavbar-appbox3" class="ex-dnavbar-appbox" title="咻咻~">
  <div class="ex-dnavbar-appbox-fixbox">
	  <img src="/SUsage/res/icons/bar/ic_backtop.png" style="height:52px;width:52px;" />
	</div>
  <div class="ex-dnavbar-appbox-text">返回顶部</div> 
</div>
</a>

</div>
<!--导航栏结束 -->

<!--退出提示-->
<div class="toast" id="toast-exit" style="background-color:#FFA000;position:fixed;width:100%;height:75px;z-index:100;display:none;">
	<label class="toast-label" style="font-family:微软雅黑;color:#ffffff;position:absolute;left:10%;line-height:55px;">你你你你你你你~真的要退出吗w</label>
	<button class="button flat" style="font-family:微软雅黑;color:#ffffff;position:absolute;right:10%;line-height:60px;font-size:16px" onclick="window.location.href='logout.php'">是的</button>
    <button id="cancelexit" class="button flat" style="font-family:微软雅黑;color:#ffffff;position:absolute;right:20%;line-height:60px;font-size:16px;font-weight:bold">不是</button>
</div>

<!-- 站内信主体 -->
<div id	="ex-mail-entity-all">

<!-- 收件箱主体 -->
<div id="ex-mail-entity-container-inbox">

<div class="card" z="2" id="ex-mail-entity-container-inbox-list">
<!-- 姓氏排序 -->
<?php
for($t=0; $t<22; $t++){ 
	//从0开始，从A开始获取
	$c=$c+1; 
	//根据位置抽取对应字母
	$nowsurname=substr($surname,$c,1);
  $sql="select * from user_list order by uid asc";
  $result=mysqli_query($conn,$sql);
  $total=mysqli_num_rows($result);
  $page=isset($_GET['page'])?intval($_GET['page']):1;//当前页码  
  $info_num=100; //一页显示数据数量
  $totalpage=ceil($total/$info_num); //总共页数
  $offset=($page-1)*$info_num; 
  $info=mysqli_query($conn,"select * from user_list WHERE sname='{$nowsurname}' order by uid desc limit $offset,$info_num");
?>

<!-- 字母列表 -->

	<ul class="list">
		<li><?php echo $nowsurname; ?></li>
	</ul>
	
<!-- 用户列表 -->
<?php while($rs=mysqli_fetch_array($info)){ 
	$id=$rs["uid"]; //目前这行的用户ID
	$sql="SELECT * FROM chat_content WHERE (SenderID='{$id}' AND RecipientID='{$uid}') OR (SenderID='{$uid}' AND RecipientID='{$id}') ORDER BY id DESC";
	$query=mysqli_fetch_array(mysqli_query($conn,$sql));
?>

<ul class="list">
	<li ripple>
	<a href="/SUsage/entity/chat_room.php?my=<?php echo $uid;?>&you=<?php echo $id;?>">
		<img class="item-icon" src="<?php echo $rs['headimg']; ?>">
		  <span class="item-text" style="font-family:微软雅黑;">
		    <?php echo $rs['stuid']."(".$rs['tname'].")"; ?> 
			  <!-- 获取用户最新消息 -->
		    <span class="secondary-text">			
			    <?php echo $query['content']; ?>
		    </span>
		  </span>
		</a>
	</li>
</ul>
<?php } } ?>
</div>

<!-- 收件箱viewer-->
<?php
$ccsql="SELECT * FROM chat_content where whoID='{$who}'";
$chatcontent=mysqli_query($conn,$ccsql);
?>

<div class="card" z="2" id="ex-mail-entity-container-inbox-viewer">
<p style="text-align:center;font-family:微软雅黑;font-size:14px;line-height:8px">与 
<span style="font-weight:bold"><?php echo $tname; ?></span> 对话中</p>
<div class="info-container">
<!-- 对话界面 -->
<?php while($query=mysqli_fetch_array($chatcontent)){ ?>
<?php if($query['SenderID']==$my){ ?><div class="my"><?php echo $query['content'] ?></div><?php } ?>
<?php if($query['SenderID']==$you){ ?><div class="your"><?php echo $query['content'] ?></div><?php } ?>
<?php } ?>
</div>

<input required="required" class="text-input" style="position:fixed;width:67%;height:10px;bottom:0px;resize: none" placeholder="写点什么…按Enter发送 >" id="SendContent" onkeyup="send();">
</div>


<!-- 收件箱结束-->
</div>

<!--脚本引用-->
<script src="/SUsage/res/js/jquery-2.2.1.min.js"></script>
<script src="/SUsage/res/js/basic.js"></script>

<script>
function easteregg(){
 if(event.altKey  &&  event.shiftKey  &&  event.keyCode == 71){
  window.location.href = "about.html";
 }
}


function send(){
 if(event.keyCode == 13){
  var CT=$("#SendContent").val();
  var SSID=<?php echo $_SESSION['userid']; ?>;
  var SRID=<?php echo $you; ?>;
  $.ajax({
  type:"post",
  url:"../../functions/Chat_Send.php",
  data:{RID:SRID,SID:SSID,Content:CT},
  success:function(got){posted=1;
  // 以下代码包括部分测试代码
  if(got=1){alert(1);}
  else if(got=2){alert(2);}
  else{alert(666);}
  alert(0);
  },
  error:function(e){alert(9);},
  });
 }
}


function GetCT(){ 
//每2.5秒调用一次toGetCT函数(暂无，未写)
setInterval(toGetCT(),2500);
}

function toGetCT(){

}


//页面自启动 onkey
document.onkeydown = function(){easteregg();};

//页面自运行
window.onload=function(){GetCT();}

</script>
</body>
</html>