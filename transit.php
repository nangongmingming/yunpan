<?php
// session_start();
// include 'register.php';
// $code= new Code();
// $_SESSION['outcode']=$code->outcode();
// $code->outimg();
//感觉是图片输出后才会与浏览器产生SESSION 所以上述程序没有实现
session_start();
include 'register.php';
$code= new Code();
$code->outimg();
$_SESSION['outcode']=$code->outcode();
?>