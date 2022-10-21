<?php
    $id = $_GET['id'];
    $train = $_GET['train'];
    $time = $_GET['time'];
    $carriage = $_GET['carriage'];
    $src = $_GET['src'];
    $dest = $_GET['dest'];

    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        
        $sql    = "delete from orders where 用户名 = '".$id."' and 车次 = '".$train."' and 日期 = '".$time."' and 出发地 = '".$src."' and 目的地 = '".$dest."'";         // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        mysqli_close($link);
        if ($carriage == 1)
        {
            $sql    = "update remainall set 商务座特等座余票 = 商务座特等座余票+1 where 车次 ='".$train."' and 日期 = '".$time."' and 出发站 = '".$src."' and 到达站 = '".$dest."'";
            $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
            $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
            $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        }
        else if ($carriage >=2 && $carriage <=5)
        {
            $sql    = "update remainall set 一等座余票 = 一等座余票+1 where 车次 ='".$train."' and 日期 = '".$time."' and 出发站 = '".$src."' and 到达站 = '".$dest."'";
            $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
            $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
            $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        }
        else
        {
            $sql    = "update remainall set 二等座余票 = 二等座余票+1 where 车次 ='".$train."' and 日期 = '".$time."' and 出发站 = '".$src."' and 到达站 = '".$dest."'";
            echo $sql;
            $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
            $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
            $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        }
        
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
    //删除玩跳转到首页
    //window.location.href = "./orders.php";

    echo "<script type='text/javascript'>
            alert('删除订单成功！');
            location.href='".$_SERVER["HTTP_REFERER"]."';
            </script>";
    
?>