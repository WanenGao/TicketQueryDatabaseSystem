<?php
header("Refresh:0.01,Url=orders.php");

    $id = $_POST['id'];
    $train = $_POST['train'];
    $date = $_POST['date'];
    $time1 = $_POST['timeone'];
    $time2 = $_POST['timetwo'];
    $src = $_POST['src0'];
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
        $sql    = "update orders set 出发时间='".$time1.":00', 到达时间='".$time2.":00', 出发地='". $src."', 目的地='". $dest."', 车厢号=".$carriage.", 座位号=". $seat." where 用户名='".$id."' and 车次='".$train."' and 日期='".$date."'";         // SQL 语句
        print_r($sql);
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
?>