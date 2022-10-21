<?php
    $username0 = $_POST['username'];
    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = "select * from orders where 用户名 = '".$username0."'";         // SQL 语句
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
  <title>订单表</title>
  <link rel="stylesheet" href="demo.css"/>
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
     <h>订单表</h>
    <form action="orders_find.php" method="post">
		查询用户名:
		<input type="text" name="username" size="20"> <br>
		<input type="submit" name="submit" value="Find">
	</form>
 <script type="text/javascript">
    function del(id,train,time){
        question = confirm("确定删除这个学生吗？")
        if(question!=0){
            window.location.href = "./orders_del.php?id="+id+'&train='+train+'&time='+time;
            //window.location = "orders_del.php";
        }
     }
 </script>
<table width="960" border="1">
<tr>
    <th>用户名</th>
    <th>车次</th>
    <th>日期</th>
    <th>出发时间</th>
    <th>到达时间</th>
    <th>出发地</th>
    <th>目的地</th>
    <th>车厢号</th>
    <th>座位号</th>
    <th>操作1</th>
    <th>操作2</th>
</tr>

<?php

foreach($data as $key => $value){
        foreach($value as $k=>$v){
            $arr[$k]=$v;
        }
        echo "<tr>";
        echo "<td>{$arr[0]}</td>";
        echo "<td>{$arr[1]}</td>";
        echo "<td>{$arr[2]}</td>";
        echo "<td>{$arr[3]}</td>";
        echo "<td>{$arr[4]}</td>";
        echo "<td>{$arr[5]}</td>";
        echo "<td>{$arr[6]}</td>";
        echo "<td>{$arr[7]}</td>";
        echo "<td>{$arr[8]}</td>";
        echo "<td> <a href='orders_alter.php?id={$arr[0]}&train={$arr[1]}&date={$arr[2]}&time1={$arr[3]}&time2={$arr[4]}&src={$arr[5]}&dest={$arr[6]}&carriage={$arr[7]}&seat={$arr[8]}'
        >修改</a></td>";
        //echo "<script type='text/javascript'>del({$arr[0]});</script>";
        echo "<td> <a href='javascript:del(\"{$arr[0]}\",\"{$arr[1]}\",\"{$arr[2]}\")'>删除</a> </td>";
        //echo "<td> <a href='javascript:' onclick="del({$arr[0]})">删除</a></td>";
        //echo "<td> <input type=button on_click=a({$arr[0]});> </td>"
//         echo "<td> <input name="delete" type="delete" onClick="return del({$arr[0]})" value="删除">
//         <script type="text/javascript"> function del(id) { if (!confirm("确定删除这个学生吗？")) window.location = "orders_del.php?id="+id; } </script></td>";
        echo "</tr>";
       }
  mysqli_close($link);
?>
</table>

<a href='orders_add.php'>添加</a>
</div>



</body>
</html>
