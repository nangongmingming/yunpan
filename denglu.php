<?php
//登录验证
  session_start();
 // setcookie(session_name(),session_id());
  $username=$_POST['username'];
  $password=$_POST['password'];
  $link=mysql_connect('localhost','root','') or die('连接数据库失败');
  mysql_select_db('yunpan',$link) or die('连接云盘失败');
  $text="SELECT * FROM users WHERE username='{username}'"or die('用户名不存在');
  $result=mysql_query($text,$link);
  //$arr1=mysql_fetch_row($result);
  $arr=mysql_fetch_assoc($result);
  if(isset ($_POST['submit'])){
	  if($username==null||$password==null||$_POST['incode']==null){
		  echo'输入用户名,密码或者验证码没有输入，请重新<a href=denglu.html>登录</a>';
	  }
	  elseif($arr!=null){
		  echo'输入用户名不存在，请重新<a href=denglu.html>登录</a>或<a href=zhuce.html>注册</a>';
	  }elseif($arr['$password']=$password&&strtoupper($_SESSION['outcode']) == strtoupper($_POST['incode'])){
		  $_SESSION['username']=$username;
		  $_SESSION['dir']=$username;
		  echo'<h1>登录成功</h1>';
		  echo"{$_SESSION['dir']}";
		  echo'正在跳转管理界面请稍候................';
		  echo"<meta http-equiv=\"refresh\" content=\"1;url=managefile.php\">";
		  //记录目录 
	  }
	  else
		  echo'验证码输入错误 请重新请重新<a href=denglu.html>登录</a>';
  }




 

?>