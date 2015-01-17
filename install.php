<?php
    include 'bbq_config.php';
    $con = new mysqli(HOST,USER,PASSWD,DB);
    $sql = "CREATE TABLE bbq
        (
        nick varchar(64) character set utf8,
        time int(12),
        id int(5),
        txt text character set utf8,
	ip varchar(15),
	to_mail varchar(320),
	is_send varchar(1)
        )";
    $con -> query($sql);
    $con -> query("ALTER TABLE `bbq` ADD PRIMARY KEY(`id`);");
    $con -> close();
    echo "finished!";
