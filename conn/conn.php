<?php

$host = "127.0.0.1";
$usr_name = "root";
$sql_pwd = "pi=311415926";
$connID = new mysqli($host,$usr_name,$sql_pwd,"pwd_md5");
 if ($connID)
 {
     echo "mysql连接成功！ <br>";
     echo "数据库创建成功!<br>";
 }

?>
