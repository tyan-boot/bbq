<?php
/*
*@author Boot
*var 12.31
*var 15-1.9
* add mail supposed
* @var 2.1.12
* 全新样式全新体验
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--
<meta name="viewport" content="width=device-width"/>
-->
<title>表白墙</title>
<link rel="stylesheet" type="text/css" href="CSS/head.css" />
<link rel="shortcut icon" href="image/favicon.png" >
</head>

<body>
<?php include_once 'head.html';
if (!isset($_GET['page']))
{$_GET['page']=1;}
$page=$_GET['page'];
include_once 'bbq_config.php';
$sql = new mysqli(HOST,USER,PASSWD,DB);
$rd = $sql -> query("select id from bbq order by id desc");
$id = $rd -> fetch_array();
$id = $id['id'];
$pg_max = $id/15;
$pg_max = ceil($pg_max);
if ($page >= $pg_max)
{$page = $pg_max;}
else if ($page <= 0)
{$page = 1;}
$sql -> close();
?>

<div class="text">
<?php 
if ($page!=1){$page_p = $page-1;} else {$page_p = $page;}
echo <<<btn_w
<button onclick="window.location.href='write.php'" class="button black"/>我也要写表白</button>
btn_w;
echo <<<btn_p
<button onclick="window.location.href='?page=$page_p'" class="page"/>上一页</button>
btn_p;
echo <<<n_p
<button class="page" />	第 $page 页</button>
n_p;
if ($page != $pg_max){$page_n = $page+1;} else {$page_n = $page;}
echo <<<btn_n
<button onclick="window.location.href='?page=$page_n'" class="page"/>下一页</button>
btn_n;
?>
<?php
if (isset($_GET['lover']) && $_GET['lover']=="boot")
{
	echo "花花:";
	echo '<br />';
	echo '<p>';
	$lover = "5q2m5Y+45rid77yM5oiR54ix5L2g";
	echo base64_decode($lover);
	echo '</p>';
	echo date("Y-m-d h:i:s a",time());
	echo '<hr />';
}
$index = "index.php";
echo <<<top
<div class="box">
<b>02^华:</b>
<p>欢迎来到表白墙，在这里你所发送的消息通通是匿名的！ 如果有疑问，请发送邮件到<a href=mailto:tyan-bbq@outlook.com?subject=表白墙反馈>tyan-bbq@outlook.com</a>有什么想写给Ta但是又不好意思直说的，这里可以满足你的要求！</p>
</div>
top;
include "read.php";
unset($index);
?>
</div>
</body>
</html>