<?php
if (!isset($_COOKIE["login"]))
{
	echo '<b>请先登录！<b>';
	echo <<<login
	<form action="login.php" method="post">
	用户名:<input type="text" name="user" /><br />
	密码 :<input type="password" name="passwd" /><br />
	<input type="submit" value="登录" /><br />
	</form>
login;
}
else {
    if ($_COOKIE["login"]=="yes")
    {
		include_once "bbq_config.php";
        echo <<<act
    <form action="admin.php" method=get>
        要删除的id: <input type="text" name="did" />
        <input type="submit" value="确认" />
    </form>
    <button onclick="window.location.href='?logout=yes'">登出</button>
	<button onclick="window.location.href='listmail.php'">打印邮件列表</button>
act;
        if (isset($_GET['did']))
        {
            $did = $_GET['did'];
            $sql = new mysqli(HOST,USER,PASSWD,DB);
            $del = "delete from bbq where id='$did'";
            $rd = $sql -> query("delete from bbq where id='$did'");
            $sql -> close();
            echo "$del \n";
            echo "\n删除成功!";
        }
        if (isset($_GET['logout']))
        {
            if ($_GET['logout']=="yes")
            setcookie("login","",time()-1800);
            Header("Location: admin.php");
        }
	}
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <title>表白墙--管理</title>
    <link rel="stylesheet" type="text/css" href="CSS/head.css" />
</head>