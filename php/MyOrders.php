<?php
    $id = $_GET['用户名'];
    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = "select * from orders where 用户名 = '".$id."'";         // SQL 语句
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
  
  <link rel="stylesheet" href="demo.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">

    <title>我的订单</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style type="text/css">
  .wrapper {width: 1000px;margin: 20px auto;}
  h1 {text-align: center;}
  .add {margin-bottom: 20px;}
  .add a {text-decoration: none;color: #fff;background-color: #00CCFF;padding: 6px;border-radius: 5px;}
  td {text-align: center;}
</style>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">12306余票查询系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="query.php?用户名=<?php echo $id?> ">首页</a></li>
            <li><a href="query_raw.php?用户名=<?php echo $id ?>">余票查询</a></li>
            <li class="active"><a href="./MyOrders.php?用户名=<?php echo $id?> ">我的订单<span class="sr-only">(current)</span></a></li>
            <li><a href="../personal center.php?用户名=<?php echo $id?>">个人中心</a></li>
            <!-- <li><a href="#">个人中心</a></li> -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>


   
<script type="text/javascript">
    function del(id,train,time,carriage,src,dest){
        question = confirm("确定删除这条订单吗？")
        if(question!=0){
            window.location.href = "./orders_del.php?id="+id+'&train='+train+'&time='+time+'&carriage='+carriage+'&src='+src+'&dest='+dest;
            //window.location = "orders_del.php";
        }
    }
</script>


              <h2 align="center">我的订单</h2>
<div class="container-fluid">

      <div class="row">
     <br>
      <br>
    
    <div class="col-md-12  main">
      <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
    <thead>
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
  </thead>
  <tbody>

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
        echo "<td> <a href='javascript:del(\"{$arr[0]}\",\"{$arr[1]}\",\"{$arr[2]}\",\"{$arr[7]}\",\"{$arr[5]}\",\"{$arr[6]}\")'>删除</a> </td>";
        echo "</tr>";
       }
  mysqli_close($link);
?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</body>
</html>

