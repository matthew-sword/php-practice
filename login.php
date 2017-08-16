
<head>
     <title>login</title>
</head>
<body>
<form name="login" method="get" action="login.php">

用户名:<input type="text" name="user" value="请输入用户名" size="20" maxlength="100"> <br>

密&nbsp;码:<input type="password" name="pwd" size="20" maxlength="100"> <br>
<br>

<input type="submit" name="login" value="登录"/>

</form>

<?php

if (isset($_GET["login"]) && $_GET["login"] == "登录")
{
    if ($_GET["user"] === "请输入用户名")
    {
         echo "用户名不能为空！请重新输入 \n";
    }
    else
    {
        //连接数据库
        include("conn/conn.php");

        //create data_table
        $sql = "create table IF NOT EXISTS pwd_tb(id      INT PRIMARY KEY ,
                                                  pwd     VARCHAR(32))";
        if ($connID->query($sql) === true)
            echo "数据表创建成功<br>";
        else
            echo $connID->error;

        //添加数据
        $md5 = md5($_GET["pwd"]);
        $id = 1;
        $sql = "insert into pwd_tb (id,pwd) VALUES ($id,'$md5')";

        if ($connID->query($sql) === true)
            echo "数据写入成功 <br>";
        else
            echo $connID->error;

        $connID->close();

    }

}  


?>

</body>
</html>
