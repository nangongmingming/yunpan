<form enctype='multipart/form-data' method='post'>
  <input type='file' name='usrfile' />
  <input type='submit' value='上传'>
</form>
<?php
  error_reporting();
  session_start();
  if(!empty($_FILES))
  {
	  $filename=$_FILES['usrfile']['tmp_name'];
	  $filedir="../{$_SESSION['dir']}/{$_FILES['usrfile']['name']}";
	  move_uploaded_file($filename,$filedir);
	  echo"<mata http-equiv=\"refresh\" content=\"0;url=managefile.php\">";
  }
  
  //$dir=$_SESSION['dir'];
  //进入目录位置
  if(isset ($_GET['back'])&&($_GET['back']=='YES'))
     {   //路径改变  记录路径
		$_SESSION['dir']=substr($_SESSION['dir'],0,strripos($_SESSION['dir'],'/'));
	 }
	 //判断是进入下一个目录还是返回上一个目录
	 if(isset($_GET['dir']))
	 {
	  $_SESSION['dir'].="/{$_GET['dir']}";
	  chdir("../{$_SESSION['dir']}");
     }
   else   
	  chdir("../{$_SESSION['dir']}");
	 //如果进入其他目录则加入返回按键
  if($_SESSION['dir']!=$_SESSION['username'])
    { 
      echo"<a href=managefile.php?back=yes>返回上一级</a>";
    }
  //展示当前路径或者文件
  $arr=scandir(getcwd());
  if($arr==null){
	  echo"<table>";
	  mkdir('./text');
	  echo "</table>";
  }
  else 
  {
	  foreach($arr as $v)
	  {
		  echo"<table>";
		  if(is_dir("./$v"))
		  {
		     echo"<tr><a href=managefile.php?dir={$v}>{$v}</a><tr>";
		  }elseif(is_file($v))
		  {
			  
			  echo"<tr><td>{$v}</td><td><a href=down.php?filename={$v}>下载</td></tr>";
		  }   
		  echo"</table>";
		  
	  }
  }
  
  // error_reporting(NULL);
  // session_start();
  
  // if(isset($_GET['back'])&&($_GET['back']=='yes')){
	  // $_SESSION['dir']=substr($_SESSION['dir'],0,strripos($_SESSION['dir'],'/'));
  // }
  // if(isset($_GET['dir'])){
	  // $_SESSION['dir'].="/{$_GET['dir']}";
	  // chdir("../{$_SESSION['dir']}");
  // }
  // else
	  // chdir("../{$_SESSION['dir']}");
  // if($_SESSION['dir']!=$_SESSION['username'])
	  // echo "<a href=managefile.php?back=yes>返回上一级</a><br />";
  // $arr=scandir(getcwd());
  // echo "<table>";
  // foreach($arr as $v){
	  // if(is_dir("./{$v}")&&$v!='.'&&$v!='..')
		  // echo"<tr><a href=managefile.php?dir={$v}>{$v}</a><tr>";
	  // elseif(is_file($v))
	  // echo"<tr><td>{$v}</td><td><a href=down.php?filename={$v}>下载</tr>";
  // }
  // echo "</table>";
?>