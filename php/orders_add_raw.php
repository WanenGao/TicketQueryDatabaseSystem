<?php
header("Refresh:0.01,Url=orders.php");

    $name = $_POST['name'];
    $train = $_POST['train'];
    $date = $_POST['date'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];
    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $carriage = $_POST['carriage'];
    $seat = $_POST['seat'];

    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        //$sql = "call INSERTDATA('".$train."','".$date."','".src."','".$dest."',".$carriage.",".$seat."9);";
        $sql    = "insert into orders values ('".$name."', '".$train."', '".$date."', '".$time1.":00', '".$time2.":00', '". $src."', '". $dest."', ".$carriage.", ". $seat.")";         // SQL 语句
        print_r($sql);
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
?>