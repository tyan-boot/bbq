# 匿名表白墙

匿名表白墙使用PHP写成，数据库默认使用MySQL，邮件发送类库使用[PHPMailer](https://github.com/PHPMailer/PHPMailer)

##协议

遵守GPL V2，虽然页脚写有Copyright，但这会在将来移除

##文件列表

**CSS/**
* **head.css** 主要CSS样式表

**image/**
* **favicon.png** 网站图标
* **logo.png** 网站LOGO图片
* **head-bg.png** 头部背景图片

**/**
* **admin.php** 用来对消息进行删除
* **install.php** 数据库初始化文件
> **你必须首先执行一次install.php来初始化数据库!

* **bbq_config.php** 数据库配置文件
* **class.phpmailer.php**
* **class.smtp.php** 上述两文件为phpmailer核心文件
* **head.html** 页头文件
* **index.php** 首页文件，调用read.php并设置一些参数
* **mail.php** 调用phpmailer进行邮件发送
* **pid.php** 接受GET参数读取指定消息
* **read.php** 读取数据库当中全部数据并输出
* **write.php** 撰写消息页面
* **save.php** 供write.php调用并写入数据库

##数据库配置文件

```php
<?php
// root改为用户名
define("USER","root",true);

//127.0.0.1改为数据库地址
define("HOST","127.0.0.1",true);

//123456改为数据库密码
define("PASSWD","123456",true);

//bbq改为数据库名称
define("DB","bbq",true);

//废弃不用
define("CFG","",true);
?>
```

##注意
* PHPMailer需PHP服务器启用socket支持
* bbq_config.php暂时需要手动更新，内容如上所示

##联系我
发送邮件到 <a href=mailto:tyan-bbq@outlook.com?subject=表白墙源码反馈>tyan-bbq@outlook.com</a>
