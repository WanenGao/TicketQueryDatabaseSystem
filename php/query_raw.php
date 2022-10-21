<?php
    $start = $_POST['start'];
    $end = $_POST['end'];
    $date = $_POST['select_date'];
    $id = $_GET['用户名'];

    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库

    if (!empty($start) && !empty($end) && !empty(date)){
      if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = " CALL SELECTN('".$start."','".$end."','".$date."');";          // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        $num  =  mysqli_num_rows($result);
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
    }
   
    
    
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">

    <title>余票表</title>

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


<body>
<!-- <div class="wrapper"> -->
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
            <li><a href="query.php?用户名=<?php echo $id?>">首页</a></li>
            <li class="active"><a href="query_raw.php?用户名=<?php echo $id ?>">余票查询</a></li>
            <li><a href="./MyOrders.php?用户名=<?php echo $id?>">我的订单<span class="sr-only">(current)</span></a></li>
            <li><a href="../personal center.php?用户名=<?php echo $id?> ">个人中心</a></li>
            <!-- <li><a href="#">个人中心</a></li> -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
     <br>
      <br>
      <div class="col-md-7 col-md-offset-3">
        <form class="form-inline" role="form" action="query_raw.php?用户名=<?php echo $id ?> " method="post">
          <div class="form-group">
            <label for="start">from </label>
                 <input type="text" class="form-control" name="start" size="20" placeholder="出发城市" value="<?php echo $start?>" required > 
            <label for="end">to </label>
                    <input type="text" class="form-control" name="end" size="20" placeholder="目的城市" value="<?php echo $end?>"  required > 
            <label for="">date: </label>
            <select class="selectpicker form-control" name="select_date" title="<?php echo $date?>" required >
            <option ><?php echo $date?></option>
              <option>2021-12-17</option>
              <option>2021-12-18</option>
              <option>2021-12-19</option>
              <option>2021-12-20</option>
              <option>2021-12-21</option>
            </select>
                    <!-- <input type="date" class="form-control" name="date" size ="20" placeholder="日期" value=<?php echo $date?>> -->

              <!-- <li id="date" class="input-append date form_datetime">日期： <input data-format="yyyy-MM-dd hh:mm:ss"
							size="20" type="text" value="" readonly> <span
							class="add-on calendarIcon"><i
								class="icon-calendar glyphicon glyphicon-th"></i></span> -->
						</li>
              <input type="submit" name="submit" value="查询">
          </div>
        </form>
        <br>
    </div>
    <script type='text/javascript'>
      var v = <?php echo $num ?>;
      var start = <?php echo strlen($start) ?>;
      if(v=="0" &&  start != "0")
      {
        alert("没有从 <?php echo $start?> 到 <?php echo $end?> 的直达车");
      }
      
    </script>
    
    <div class="col-md-12  main">
      <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
          <th> 添加订单</th>
          <th> 车次</th>
          <th> 出发站</th>
          <th> 到达站</th>
          <th> 起始时间</th>
          <th> 到达时间</th>
          <th> 历时</th>
          <th> 车型</th>
          <th> 商务座特等座余票</th>
          <th> 商务座特等座票价</th>
          <th> 一等座余票</th>
          <th> 一等座票价</th>
          <th> 二等座票价</th>
          <th> 二等座余票</th>
      </tr>
  </thead>
  <tbody>

<?php

foreach($data as $key => $value){
        foreach($value as $k=>$v){
            $arr[$k]=$v;
        }
        
        echo "<tr>";
        echo "<td> <a href='add_my_orders.php?用户名={$id}&车次={$arr[0]}&日期={$date}&出发站={$arr[1]}&到达站={$arr[2]}&起始时间={$arr[3]}&到达时间={$arr[4]}&".
        "历时={$arr[5]}&车型={$arr[6]}&商务座特等座余票={$arr[7]}&商务座特等座票价={$arr[8]}&一等座余票={$arr[9]}&一等座票价={$arr[10]}&".
        "二等座余票={$arr[11]}&二等座票价={$arr[12]}'>ADD</a></td>";
        echo "<td><a href='selectTrain.php?车次={$arr[0]}&用户名={$id}'>{$arr[0]}</a></td>";
        echo "<td>{$arr[1]}</td>";
        echo "<td>{$arr[2]}</td>";
        echo "<td>{$arr[3]}</td>";
        echo "<td>{$arr[4]}</td>";
        echo "<td>{$arr[5]}</td>";
        echo "<td>{$arr[6]}</td>";
        echo "<td>{$arr[7]}</td>";
        echo "<td>{$arr[8]}</td>";
        echo "<td>{$arr[9]}</td>";
        echo "<td>{$arr[10]}</td>";
        echo "<td>{$arr[11]}</td>";
        echo "<td>{$arr[12]}</td>";
        
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
