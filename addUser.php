<?php
    $username0 = $_POST['userName'];
    $password0 = $_POST['password'];
    $trueName = $_POST['trueName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $idNo = $_POST['idNo'];
    $userType = $_POST['type'];

    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = "insert into users values ('".$username0."', '".$password0."', '".$trueName."', ".$mobile.", '".$email."', '". $idNo."', '". $userType."')";         // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        mysqli_close($link);
        echo "注册成功！";
        //window.open('addSuccess.php');
        header('Refresh:0.01,Url=addSuccess.php');
    }else{
        die('数据库连接失败！');
    }
    echo "<script type=\"text/javascript\">
    function success(){
        window.location.href = \"./php/query.php?用户名=\"+id;}
        document.getElementById('login').innerHTML = login(\"{$username}\",\"{$passwd}\");
        </script>";
    echo "<p id='login'></p>";

?>