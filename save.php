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
    $sql -> close();

    if ($_POST['email']!=null ||$_POST['email']!="")
    {
        include_once "mail.php";
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            sendmail($email,$id);
        }
        else
        {
            echo "对不起您输入的邮件地址有误，不予发送，但消息依旧会发布到首页:)";}
        }
        echo ('<div onclick="window.location.href=\'index.php\' " style=" padding:15px;text-align:center; height:50px; width:100px; background-color:#ccc;font:微软雅黑;text-decoration: none;COLOR:#333;cursor:default;margin:30%;border-radius:10px;">提交成功<br />返回查看</div>');
    }
?>
