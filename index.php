<?php
    $id =$_GET['用户名'];
    $passwd = $_GET['登陆密码'];
    
    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = 'show tables';         // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        mysqli_close($link);
        
    }else{
        die('数据库连接失败！');
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>12306系统</title>
</head>
<style type="text/css">
  .wrapper {width: 1000px;margin: 20px auto;}
  h1 {text-align: center;}
  .add {margin-bottom: 20px;}
  .add a {text-decoration: none;color: #fff;background-color: #00CCFF;padding: 6px;border-radius: 5px;}
  td {text-align: center;}
</style>
<body>
 <div class="wrapper">
     <h>12306system</h>
     
     <script type = "text/javascript" src = "./php/test.php"></script>
     <script type="text/javascript">
      function personalcenter(id,passwd){
          window.location.href = "./personal center.php?用户名="+id+'&登陆密码='+passwd;
      }
      </script>
<?php

foreach($data as $key => $value){
        foreach($value as $k=>$v){
        echo '<pre>';
        echo "<a href=./php/$v.php>$v</a>";
        }
       }
  mysqli_close($link);
  echo "<pre><a href='javascript:personalcenter(\"{$id}\",\"{$passwd}\")''>个人中心</a>"
?>

</div>
</body>
</html>

