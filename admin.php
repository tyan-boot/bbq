<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width"/>
<title>表白墙--管理</title>
<link rel="stylesheet" type="text/css" href="CSS/head.css" />
</head>
<?php

include_once "bbq_config.php";
echo <<<i_d
<form action="admin.php" method=get>
id:<input type="text" value="" name="id" />
passwd:<input type="text" value="" name="passwd" />
<input type="submit"/>
</form>
i_d;
if (isset($_GET['id']))
{
	if ($_GET['passwd']=="******")
	{
	$id = $_GET['id'];
	$sql = new mysqli(HOST,USER,PASSWD,DB);
	$del = "delete from bbq where id='$id'";
	$rd = $sql -> query("delete from bbq where id='$id'");
	$sql -> close();
	echo $del;
	echo "\nfinished!";
	}
	else{echo "error passwd";}
}
?>
