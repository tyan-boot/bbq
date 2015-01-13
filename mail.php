<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
require "class.phpmailer.php";
require "class.smtp.php";
//require 'PHPMailerAutoload.php'; 
function sendmail($email,$id)
{
	 $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp-mail.outlook.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tyan-bbq@outlook.com';                 // SMTP username
    $mail->Password = '******';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->From = 'tyan-bbq@outlook.com';
    $mail->FromName = '表白墙';
    $mail->addAddress("$email");     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('tyan-bbq@outlook.com', '表白墙反馈');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = '表白墙通知';
    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = "UTF-8";
    $mail ->Body = <<<body
<p>你好：</p><p>有匿名用户在表白墙给您写了匿名消息，点击下面的链接查看</p><a href=http://bbq.jsahz.com/pid.php?id=$id>http://bbq.jsahz.com/pid.php?id=$id</a><p>如果你不能正常访问，请将上述链接复制到浏览器当中打开</p><p>请勿回复此邮件，如果你有任何疑问，请回复<a href=mailto:tyan-bbq@outlook.com?subject=表白墙反馈>tyan-bbq@outlook.com</a>这个邮箱，谢谢合作</p><br /><b>Tyan-Boot 敬上！</b>
body;
    $mail ->AltBody = <<<altbody
你好：
有匿名用户在表白墙给您写了匿名消息，点击下面的链接查看
http://bbq.jsahz.com/pid.php?id=$id
如果你不能正常访问，请将上述链接复制到浏览器当中打开

请勿回复此邮件，如果你有任何疑问，请回复tyan-bbq@outlook.com这个邮箱，谢谢合作


Tyan-Boot 敬上！
altbody;
    if(!$mail->send()) {
        echo '抱歉，邮件发送失败.';
        echo '错误原因: ' . $mail->ErrorInfo;
        echo '如果你看到此消息，请截图并发送到邮箱：<a href=mailto:tyan-bbq@outlook.com?subject=表白墙反馈>tyan-bbq@outlook.com</a>';
    } else {
        echo '邮件发送成功！';
    }
}
?>