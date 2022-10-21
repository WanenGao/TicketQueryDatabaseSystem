<?php
// header("Refresh:0.01,Url=addSuccess.php");

    $name = $_POST['userName'];
    $password0 = $_POST['password'];
    $surePassword = $_POST['surePassword'];
    $trueName = $_POST['trueName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $idNo = $_POST['idNo'];
    $type = $_POST['type'];

    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = "select * from users where 用户名 = '".$name."'";         // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        $row    = mysqli_num_rows($result);  
        mysqli_close($link);
        if (!empty($row)){
        echo "<script>alert('该用户名已存在')</script>";
        }
        else
        {
            $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
            $sql    = "select * from users where 手机号 = '".$mobile."'";         // SQL 语句
            $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
            $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
            $row    = mysqli_num_rows($result);  
            mysqli_close($link);
            if (!empty($row)){
                echo "<script>alert('该手机号已存在')
                location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
                
            }
            else
            {
                $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                $sql    = "select * from users where 邮箱 = '".$email."'";         // SQL 语句
                $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                $row    = mysqli_num_rows($result);  
                mysqli_close($link);
                if (!empty($row)){
                    echo "<script>alert('该邮箱已被注册')</script>";
                }
                else
                {
                    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                    $sql = "CALL ADDUSER('".$name."','".$password0."', '".$trueName."', ".$mobile.", '".$email."', '".$idNo."', '".$type."');";
                    $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                    $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                    echo "<script>alert('注册成功！')</script>";
                }
            }
        }
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
?>