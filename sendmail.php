<?php

$mail_list[0][0] = 1;$mail_list[0][1] = "735718299@qq.com";$mail_list[0][2] = "5rWL6K+V";$mail_list[0][3] = "5rWL6K+V";

$i = 0;
include_once 'bbq_config.php';
include_once 'mail.php';
while ($i <=2)
{
	sendmail($mail_list[$i][0],$mail_list[$i][1],$mail_list[$i][2],$mail_list[$i][3]);
	$i++;
}
