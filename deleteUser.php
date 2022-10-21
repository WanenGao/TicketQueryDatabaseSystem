<?php
    $id = $_GET["id"];
    
    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql = "CALL DELETEUSER('".$id."');";
        //$sql    = "delete from orders where 用户名 = '".$id."' and 车次 = '".$train."' and 日期 = '".$time."'";         // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
    //删除玩跳转到首页
    //window.location.href = "./orders.php";
    echo "<script>alert('注销成功！')
                location.href='./login2.php';</script>";
                
?>