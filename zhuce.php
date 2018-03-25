<?php
     $link=mysql_connect('localhost','root','')or die('没有成功连接到数据库') ;
     mysql_select_db('yunpan',$link)or die('选择数据表失败');
     $username=$_POST['username'];
     $password=$_POST['password'];
     $search="SELECT * FROM users WHERE username='{$username}' ";
     $result=mysql_query($search,$link)or die('查询失败');//判断用户名是否存在
	 $arr=mysql_fetch_row($result);
//点击提交按钮后进行操作
if(isset($_POST['submit'])){
	//数据库中的值存在或者输入值为空
	if($_POST['username']==null||$_POST['password']==null)
	{
		echo'注册用户名或者登录密码未填写';
		echo"注册失败！请您重新<a href=zhuce.html>注册</a>";
	}
	elseif($arr!=null){
		echo'用户名已经被注册';
		echo"注册失败！请您重新<a href=zhuce.html>注册</a>";
	}
	else{
		$adddata="INSERT users VALUES('{$username}','{$password}')";
		mysql_query($adddata,$link) or die('添加数据失败');
		echo"注册成功！现在您可以去<a href=denglu.html>登录</a>";
		mkdir("../{$username}");//创建文件目录用于存贮
	}
	}
?>