<?php
if (!isset($index))
{Header("Location: index.php");}

include_once 'bbq_config.php';
$sql = new mysqli(HOST,USER,PASSWD,DB);
date_default_timezone_set("Asia/Shanghai");
$id = $sql -> query("select id from bbq order by id desc ");
$id = $id -> fetch_array();
$id = $id['id'];
$id_max = $id - (($page-1)*15);
$id_min = $id - (($page)*15+1);
$sql -> query("SET NAMES 'utf8'");
$read = $sql -> query("select nick,time,id,txt from bbq  where id between $id_min and $id_max order by id desc ");
while ($now = $read -> fetch_array())
{
 $time=date("Y-m-d h:i:s a",$now['time']);
 $nick = $now['nick'];
 $txt = $now['txt'];
 $id = $now['id'];
 echo <<<text
 <div class="box">
 <a href="pid.php?id=$id">$nick:</a>
 <br />
 <p>
 $txt
 </p>
 <span id="ttime">$time </span>
 <span id="fid">$id 楼</span>
 </div>
text;
}
$sql -> close();
echo '<div id="foot">Copyright 2014 Boot. All Rights Reserved.</div>';
?>