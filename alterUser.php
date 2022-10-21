<?php
    $oldname = $_POST['oldname'];
    $name = $_POST['userName'];
    $password0 = $_POST['password'];
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
        mysqli_set_charset($link,'UTF-8');     
        $sql    = "select * from users where 用户名 = '".$name."'";         // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        $row    = mysqli_num_rows($result);  
        mysqli_close($link);
        if (!empty($row) && $oldname <> $name){
            echo "<script>alert('该用户名已存在');location.href='./personal center.php?用户名=".$oldname."';</script>";
        }
        else
        {
            $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
            $sql    = "select * from users where 手机号 = ".$mobile." and 用户名 <> '".$oldname."'";         // SQL 语句
            $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
            $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
            $row    = mysqli_num_rows($result);  
            mysqli_close($link);
            if (!empty($row) ){
                echo "<script>alert('该手机号已被使用');location.href='./personal center.php?用户名=".$name."';
                </script>";
                
            }
            else
            { 
                $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                $sql    = "select * from users where 邮箱 = '".$email."'and 用户名 <> '".$oldname."'";       // SQL 语句
                $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                $row    = mysqli_num_rows($result);  
                mysqli_close($link);
                if (!empty($row)){
                    echo "<script>alert('该邮箱已被使用');location.href='./personal center.php?用户名=".$name."';</script>";
                }
                else
                {
                    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                    $sql    = "select * from users where 证件号 = '".$idNo."'and 用户名 <> '".$oldname."'";       // SQL 语句
                    $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                    $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                    $row    = mysqli_num_rows($result);  
                    mysqli_close($link);
                    if (!empty($row)){
                        echo "<script>alert('该证件号已被使用');location.href='./personal center.php?用户名=".$name."';</script>";
                    }
                    else
                    {
                        $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                        $sql = "CALL ALTERUSER('".$name."','".$password0."', '".$trueName."', ".$mobile.", '".$email."', '".$idNo."', '".$type."', '".$oldname."');";
                        //print_r($sql);
                        // echo $sql;
                        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                        mysqli_close($link);
                        $sql = "update orders set 用户名 = '".$name."' where 用户名='".$oldname."'";
                        //echo $sql;
                        $link     = @mysqli_connect($host,$username,$password,$dbname);
                        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                        mysqli_close($link);
                        echo "<script type=\"text/javascript\">
        
                            alert('修改成功！');
                            location.href='./personal center.php?用户名=".$name."';
                            </script>";
            }
                }
            }
        }
    }else{
        die('数据库连接失败！');
    }
    // 
    
    // echo "<p id='success()'></p>";
?>