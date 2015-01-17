<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--
    <meta name="viewport" content="width=device-width"/>
    -->
    <title>表白墙--写下自己的话语</title>
    <link rel="stylesheet" type="text/css" href="CSS/head.css" />
    <script type="text/javascript">
    function verify(thisform)
    {
        with(thisform)
        {
            if (n_name.value==""||n_name.value==null)
            {
                alert("骚年，你的昵称不能为空~~");
                return false;
            }
            if (txt.value==""||txt.value==null)
            {
                alert("骚年，你怎么能什么也说呢~~");
                return false;
            }
        }
    }
    </script>
    </head>

    <body>
        <?php include_once 'head.html'?>
        <div class="text">
            <div class="write">
                <form action="save.php" method="post" name="write" onsubmit="return verify(this)">
                <p>注：<spwn style="color:#F00;">* </spwn>项目为必填<br /><!--&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;项目填写之后仅管理员可见，并且推荐填写，方便取得联系<br />-->
                </p>
                <p>显示昵称:<input type="text" name="n_name" /><spwn style="color:#F00;">* 必填，将会显示。</spwn></p>
                <!--
                <p>真实姓名:<input type="text" name="name" /># 他人无法知道你是谁，可以留空</p>
                <p>联系方式:<input type="text" name="contact" /># 仅管理员可见，推荐填写，方便取得联系。可填写QQ、邮箱、手机等。如需删除，此项目可作为身份标识</p>
                <p>对方邮箱:<input type="text" name="email" /> # 可选，如果填写，则向Ta的邮箱发送一封邮件通知^_^发送邮件会占用更多时间，通常在10～25秒.</p>
                -->
                <p>* 亲，你想对Ta说点什么呢？<br /><p><textarea cols=auto rows="10" name="txt"></textarea></p></p>
                <p><input type="submit" value="提交匿名表白"/></p>
                </form>
                <br />
                <br />
            </div>
            <div id="foot">Copyright 2014 Boot. All Rights Reserved.<br />Mail:tyan-bbq@outlook.com</div>
        </div>
    </body>
</html>