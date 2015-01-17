<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width"/>
<title>表白墙--提交</title>
<link rel="stylesheet" type="text/css" href="CSS/head.css" />
</head>
<?php
include_once 'bbq_config.php';
$sql = new mysqli(HOST,USER,PASSWD,DB);
//$r_name=$_POST['name'];
if ($_POST['n_name']=="")
{
    echo "骚年，你的昵称不能为空~~";
    echo '<br />';
    echo '<input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回上一页">';
}
else if ($_POST['txt']=="")
{
    echo "骚年，你怎么能什么也说呢~~";
    echo '<br />';
    echo '<input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回上一页">';
}
else
{
	/*if ($r_name=="")
    {
        $r_name="匿名";
    }*/
    date_default_timezone_set("Asia/Shanghai");
    $time=time();
    $now = $sql -> query("select id from bbq order by id desc;");
    $id = $now -> fetch_array();
    $id=$id['id']+1;
    //txt过滤
    $txt = $_POST['txt'];
    $txt = stripslashes($txt);
    $txt = htmlspecialchars($txt);
    //昵称过滤
    $nname = $_POST['n_name'];
    $nname = stripslashes($nname);
    $nname = htmlspecialchars($nname);
    $mail = $_POST['email'];

    if (isset($_SERVER["HTTP_X_REAL_IP"]))
    {
        if ($_SERVER["HTTP_X_REAL_IP"]=="")
        {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        else $ip = $_SERVER["HTTP_X_REAL_IP"];
    }
    else
    {
        $ip = $_SERVER["REMOTE_ADDR"];
    }

    $sql -> query("SET NAMES 'utf8'");
    $sql -> query("insert into bbq (nick,time,id,txt,ip) values('$nname','$time','$id','$txt','$ip');");
    if (filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
	    $sql -> query("update bbq set to_mail = '$mail' where id = '$id'");
	    $sql -> query("update bbq set is_send = 'f' where id = '$id'");
	    echo <<<sus
<div onclick="window.location.href='index.php' " style=" padding:15px;text-align:center; height:100px; width:300px; background-color:#ccc;font:微软雅黑;text-decoration: none;COLOR:#333;cursor:default;margin:30%;border-radius:10px;">提交成功<br />邮件已加入发送队列<br />系统将会定时检查队列并发送<br />或者你可以将地址发给Ta看<br />点击返回查看</div>
sus;
}else echo <<<sus_nomail
<div onclick="window.location.href='index.php' " style=" padding:15px;text-align:center; height:100px; width:300px; background-color:#ccc;font:微软雅黑;text-decoration: none;COLOR:#333;cursor:default;margin:30%;border-radius:10px;">提交成功<br />但是由于你填写的邮箱地址错误<br />不予发送，如果想发送，请联系tyan-boot@outlook.com<br />点击返回查看</div>
sus_nomail;
    $sql -> close();
    }
?>
