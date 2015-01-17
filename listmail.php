<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
if ($_COOKIE["login"]=="yes")
{
include_once 'bbq_config.php';
$sql = new mysqli(HOST,USER,PASSWD,DB);
$read = $sql -> query("select nick,txt,id,to_mail from bbq where is_send='f'");
$i = 0;
while ($now = $read -> fetch_array())
{
	$id = $now['id'];
	$mail = $now['to_mail'];
	$nick = $now['nick'];
	$txt = $now['txt'];
	$nick = base64_encode($nick);
	$txt = base64_encode($txt);

	$mail_list[$i][0] = $id;
	$mail_list[$i][1] = $mail;
	$mail_list[$i][2] = $nick;
	$mail_list[$i][3] = $txt;

	echo '$mail_list[' . "$i" . '][0] = ' . "$id" .';';
	echo '$mail_list[' . "$i" . '][1] = ' . '"' . "$mail" . '"' .';';
	echo '$mail_list[' . "$i" . '][2] = ' . '"' . "$nick" . '"' .';';
	echo '$mail_list[' ."$i" .'][3] = ' . '"' . "$txt" . '"' .';';
	echo '<br />';
	$i++;
}
}
else 
{
	Header("Location: admin.php");
}
