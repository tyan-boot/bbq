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
<?php
    include_once 'bbq_config.php';
    include_once 'head.html';
    echo <<<eot
    <div class="text pid">
eot;
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = new mysqli(HOST,USER,PASSWD,DB);
        date_default_timezone_set("Asia/Shanghai");
        $sql -> query("set names utf8");
        $read = $sql -> query("select nick,time,id,txt from bbq  where id=$id");
        $now = $read -> fetch_array();
        $time=date("Y-m-d h:i:s a",$now['time']);
        $nick = $now['nick'];
        $txt = $now['txt'];
        echo <<<pid
        <span id="tid" >$nick:
        </span>
        <br />
        <p>
        $txt
        </p>
        <span id="ttime">$time </span>
        <span id="fid">$id 楼 </span>
pid;
        echo <<<ret
        <br />
        <br />
        <button onclick="window.location.href='index.php'" class="page"/>返回</button>
ret;
    }
?>
</div>
</body>