<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
      $id = $_GET['用户名'];

    $train = $_GET['车次'];
    $date = $_GET['日期'];
    $startstation = $_GET['出发站'];
    $endstation = $_GET['到达站'];
    $starttime = $_GET['起始时间'];
    $endtime = $_GET['到达时间'];
    $duration = $_GET['历时'];
    $type = $_GET['车型'];
    $headremain = $_GET['商务座特等座余票'];
    $headprice = $_GET['商务座特等座票价'];
    $firstremain = $_GET['一等座余票'];
    $firstprice = $_GET['一等座票价'];
    $secondremain = $_GET['二等座余票'];
    $secondprice = $_GET['二等座票价'];
    }
    else
    {
      $id = $_POST["用户名"];
      $other = $_POST['name'];
      $train = $_POST['train'];
      $date = $_POST['date'];
      $starttime = $_POST['time1'];
      $endtime = $_POST['time2'];
      $startstation = $_POST['src'];
      $endstation = $_POST['dest'];
      $carriage = $_POST['carriage'];
      $seat = $_POST['seat'];
    }
        
    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        //$sql    = "select * from orders where 用户名 = '".$id."' and 车次 = '".$train."' and 日期 = '".$time."'";          // SQL 语句
        //$sql = "insert into orders values ($id,$train,$date,$starttime,$endtime,$startstation,$endstation, ";
        //$result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        //$data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        //mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }

?>

<html>
  <head>
    <meta charset = "UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">

    <title>购票通道</title>
    <!-- <link href="./list-group-item.css" type="text/css" rel="stylesheet"> -->

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/assets/js/ie-emulation-modes-warning.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
     .box {display:table;margin:0 auto;}
    h2 {text-align: center;}
    .add {margin-bottom: 20px;}
    .error {color: #FF0000;}
    .list-group-item-primary{color:#004085;background-color:#b8daff}.list-group-item-primary.list-group-item-action:focus,.list-group-item-primary.list-group-item-action:hover{color:#004085;background-color:#9fcdff}.list-group-item-primary.list-group-item-action.active{color:#fff;background-color:#004085;border-color:#004085}.list-group-item-secondary{color:#383d41;background-color:#d6d8db}.list-group-item-secondary.list-group-item-action:focus,.list-group-item-secondary.list-group-item-action:hover{color:#383d41;background-color:#c8cbcf}.list-group-item-secondary.list-group-item-action.active{color:#fff;background-color:#383d41;border-color:#383d41}.list-group-item-success{color:#155724;background-color:#c3e6cb}.list-group-item-success.list-group-item-action:focus,.list-group-item-success.list-group-item-action:hover{color:#155724;background-color:#b1dfbb}.list-group-item-success.list-group-item-action.active{color:#fff;background-color:#155724;border-color:#155724}.list-group-item-info{color:#0c5460;background-color:#bee5eb}.list-group-item-info.list-group-item-action:focus,.list-group-item-info.list-group-item-action:hover{color:#0c5460;background-color:#abdde5}.list-group-item-info.list-group-item-action.active{color:#fff;background-color:#0c5460;border-color:#0c5460}.list-group-item-warning{color:#856404;background-color:#ffeeba}.list-group-item-warning.list-group-item-action:focus,.list-group-item-warning.list-group-item-action:hover{color:#856404;background-color:#ffe8a1}.list-group-item-warning.list-group-item-action.active{color:#fff;background-color:#856404;border-color:#856404}.list-group-item-danger{color:#721c24;background-color:#f5c6cb}.list-group-item-danger.list-group-item-action:focus,.list-group-item-danger.list-group-item-action:hover{color:#721c24;background-color:#f1b0b7}.list-group-item-danger.list-group-item-action.active{color:#fff;background-color:#721c24;border-color:#721c24}.list-group-item-light{color:#818182;background-color:#fdfdfe}.list-group-item-light.list-group-item-action:focus,.list-group-item-light.list-group-item-action:hover{color:#818182;background-color:#ececf6}.list-group-item-light.list-group-item-action.active{color:#fff;background-color:#818182;border-color:#818182}.list-group-item-dark{color:#1b1e21;background-color:#c6c8ca}.list-group-item-dark.list-group-item-action:focus,.list-group-item-dark.list-group-item-action:hover{color:#1b1e21;background-color:#b9bbbe}.list-group-item-dark.list-group-item-action.active{color:#fff;background-color:#1b1e21;border-color:#1b1e21}

    </style>
  </head>
  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          /* <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> */
          <a class="navbar-brand" href="#">12306余票查询系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="query.php?用户名=<?php echo $id?> ">首页</a></li>
            <li class="active"><a href="query_raw.php?用户名=<?php echo $id ?>">余票查询<span class="sr-only">(current)</span></a></li>
            <li><a href="./MyOrders.php?用户名=<?php echo $id?> ">我的订单</a></li>
            <li><a href="../personal center.php?用户名=<?php echo $id?>">个人中心</a></li>
            <!-- <li><a href="#">个人中心</a></li> -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
<?php

$nameErr = $carriageErr = $seatErr = "";
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  $sql = "select 商务座特等座余票 from remainall where 车次= '".$train."' and 日期= '".$date."' and 出发站 = '". $startstation."' and 到达站= '". $endstation."'";
$link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
$result = mysqli_query($link, $sql); 
$data   = mysqli_fetch_all($result);

foreach($data as $key => $value){
  foreach($value as $k=>$v){
      $arr[$k]=$v;
  }
  $bussiness = $arr[0];
}

$sql = "select 一等座余票 from remainall where 车次= '".$train."' and 日期= '".$date."' and 出发站 = '". $startstation."' and 到达站= '". $endstation."'";
$link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
$result = mysqli_query($link, $sql); 
$data   = mysqli_fetch_all($result);
foreach($data as $key => $value){
  foreach($value as $k=>$v){
      $arr[$k]=$v;
  }
  $firstClass = $arr[0];
}

$sql = "select 二等座余票 from remainall where 车次= '".$train."' and 日期= '".$date."' and 出发站 = '". $startstation."' and 到达站= '". $endstation."'";
$link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
$result = mysqli_query($link, $sql); 
$data   = mysqli_fetch_all($result);
foreach($data as $key => $value){
  foreach($value as $k=>$v){
      $arr[$k]=$v;
  }
  $secondClass = $arr[0];
}
}

if ( $_SERVER["REQUEST_METHOD"] == "POST")
{
  $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
  mysqli_set_charset($link,'UTF-8');     
  $sql    = "select * from users where 用户名 = '".$other."'";         // SQL 语句
  $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
  $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
  $row    = mysqli_num_rows($result);  
  mysqli_close($link);
  if (empty($_POST["name"]))
  {
    $nameErr = "用户名是必须的";
  }
  else if (empty($row) ){
    $nameErr = "该用户名不存在";
  }
  else if (empty($_POST["carriage"]))
  {
    $carriageErr = "车厢号是必须的";
  }
  else if ($_POST["carriage"] > 20 || $_POST["carriage"] < 0)
  {
    $carriageErr = "请选择1~20号车厢.车厢规格详见最左侧列表";
  }
  else if (empty($_POST["seat"]))
  {
    $seatErr = "座位号是必须的";
  }
  
  else if ($_POST["seat"] > 100 || $_POST["seat"] <= 0)
  {
    $seatErr = "请选择1~100号座位";
  }
  else 
  {
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    $sql = "select * from orders where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 车厢号=".$_POST["carriage"]." and 座位号= ".$_POST["seat"]."";
    $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
    $num  =  mysqli_num_rows($result);
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    $sql = "select * from orders where 用户名= '".$other."' and 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 出发地 = '". $_POST["src"]."' and 目的地= '". $_POST["dest"]."'";
    
    $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
    $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
    $num3  =  mysqli_num_rows($result);
    // location.href='".$_SERVER["HTTP_SELF"]."';
    if ($num3 != 0){
      echo "<script type='text/javascript'>
          alert('{$other} 已购买过这趟旅程的车票，一人只能购买同一趟旅程的一张票');
          
          </script>";
    }
    else{
      if ($num == 0){
        $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
        $sql = "insert into orders values ('".$other."', '".$_POST["train"]."', '".$_POST["date"]."', '".$_POST["time1"]."', '".$_POST["time2"]."', '". $_POST["src"]."', '". $_POST["dest"]."', ".$_POST["carriage"].", ".$_POST["seat"].");";
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
        $sql = "select * from orders where 用户名= '".$other."' and 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 车厢号=".$_POST["carriage"]." and 座位号= ".$_POST["seat"]."";
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        $num2  =  mysqli_num_rows($result);
        mysqli_close($link);
        if ($num2 == 1)
        {
            // echo $_POST["carriage"];
            if ($_POST["carriage"] == 1)
            {
              $sql = "update remainall set 商务座特等座余票=商务座特等座余票-1 where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 出发站 = '". $_POST["src"]."' and 到达站= '". $_POST["dest"]."';";
              $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              $result = mysqli_query($link, $sql); 
              $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据

            }
            else if ($_POST["carriage"] >1 && $_POST["carriage"] <6)
            {
              $sql = "update remainall set 一等座余票=一等座余票-1 where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 出发站 = '". $_POST["src"]."' and 到达站= '". $_POST["dest"]."';";
              $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              $result = mysqli_query($link, $sql); 
              $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
            }
            else{
              $sql = "update remainall set 二等座余票=二等座余票-1 where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 出发站 = '". $_POST["src"]."' and 到达站= '". $_POST["dest"]."'";
              $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              $result = mysqli_query($link, $sql); 
              $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
            }
            
            echo "<script type='text/javascript'>
            alert('购票成功！');
            
            </script>";
        }
        else
        {
          echo "<script type='text/javascript'>
            alert('当前位置不可选,请另选位置！');
            
            </script>";
        }
      }
      else 
      {
        echo "<script type='text/javascript'>
            alert('当前位置不可选,请另选位置！');
            
            </script>";
      }
    }
    
  }

$sql = "select 商务座特等座余票 from remainall where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 出发站 = '". $_POST["src"]."' and 到达站= '". $_POST["dest"]."'";
$link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
$result = mysqli_query($link, $sql); 
$data   = mysqli_fetch_all($result);

foreach($data as $key => $value){
  foreach($value as $k=>$v){
      $arr[$k]=$v;
  }
  $bussiness = $arr[0];
 
}

$sql = "select 一等座余票 from remainall where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 出发站 = '". $_POST["src"]."' and 到达站= '". $_POST["dest"]."'";
$link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
$result = mysqli_query($link, $sql); 
$data   = mysqli_fetch_all($result);
foreach($data as $key => $value){
  foreach($value as $k=>$v){
      $arr[$k]=$v;
  }
  $firstClass = $arr[0];
}

$sql = "select 二等座余票 from remainall where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 出发站 = '". $_POST["src"]."' and 到达站= '". $_POST["dest"]."'";
$link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
$result = mysqli_query($link, $sql); 
$data   = mysqli_fetch_all($result);
foreach($data as $key => $value){
  foreach($value as $k=>$v){
      $arr[$k]=$v;
  }
  $secondClass = $arr[0];
}
}

?>

<script type="text/javascript">
    function goBack(){
      question = confirm("确定删除这个学生吗？")
             window.location.href = "./query_raw.php?用户名="+<?php echo $id ?>+"& "+<?php echo $passwd ?>;
            // window.location.href =$_SERVER["HTTP_REFERER"];
            //window.location = "./query_raw.php";
    }
</script>

        <h2>购票通道</h2>   
        <div class="container">
         <hr>
          
<div class="row">
 <div class="col-md-2">
 
  <ul class="list-group">
    <li class="list-group-item list-group-item-danger">商务座余票：<br>(carriage = 1)</li>
    <li class="list-group-item"><?php echo $bussiness ?></li>
    </ul>
    <ul class="list-group">
    <li class="list-group-item list-group-item-warning ">一等座余票：<br>(2<=carriage<=5)</li>
    <li class="list-group-item"><?php echo $firstClass ?></li>
    </ul>
    <ul class="list-group">
    <li class="list-group-item list-group-item-primary">二等座余票：<br>(6<=carriage<=20)</li>
    <li class="list-group-item"><?php echo $secondClass ?></li>
  </ul>

 </div>
 <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
 <div class="col-md-4 ">

 <p><span class="error">* 必填字段</span></p>
 <input  type = "hidden" name='用户名' value="<?php echo $id?>"/>
            
            <div class="control-group"><label class="control-label"  for="inputName">用户名<span class="error"> * <?php echo $nameErr;?></span></label>

            <div class="controls"><input class = "form-control" id="inputName" placeholder="Name" type="text" name="name" value="" ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputTrain">车次</label>

            <div class="controls"><input class = "form-control" id="inputTrain" placeholder="Train No" type="text" name="train" value="<?php echo $train ?>" readonly ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputDate">日期</label>

            <div class="controls"><input class = "form-control" id="inputDate" placeholder="Date" type="text" name="date" value="<?php echo $date ?>" readonly ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputTime1">出发时间</label>

            <div class="controls"><input class = "form-control" id="inputTime1" placeholder="Start Time" type="text" name="time1" value="<?php echo $starttime ?>" readonly ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputTime2">到达时间</label>

            <div class="controls"><input class = "form-control" id="inputTime2" placeholder="End Time" type="text" name="time2" value="<?php echo $endtime ?>" readonly ></div>
            </div>
            </div>
 <div class="col-md-4 " >
   <p></p>
   <br>
            <div class="control-group"><label class="control-label"  for="inputSrc">出发地</label>

            <div class="controls"><input class = "form-control" id="inputSrc" placeholder="Departure" type="text" name="src" value="<?php echo $startstation ?>" readonly ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputDest">目的地</label>

            <div class="controls"><input class = "form-control" id="inputDest" placeholder="Destination" type="text" name="dest" value="<?php echo $endstation ?>" readonly ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputCarriage">车厢号<span class="error"> * <?php echo $carriageErr;?></span></label>

            <div class="controls"><input class = "form-control" id="inputCarriage" placeholder="Carriage NO" type="text" name="carriage" value="<?php $_POST["carriage"]?>"></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputSeat">座位号<span class="error"> * <?php echo $seatErr;?></span></label>

            <div class="controls"><input class = "form-control" id="inputSeat" placeholder="Seat NO" type="text" name="seat" value="<?php $_POST["seat"]?>"></div>
            </div>

            <!-- <div class="control-group"> -->
            <p></p>
   <br>
            <!-- <div class="controls"> -->
            <!-- <button  class="btn"  onClick="javascript :history.back(-1);"  >返回 </button> -->
            
            <!-- <button  class="btn" type="reset"  > 重置</button> -->
            <button  class = "btn btn-success"  type="submit">购买</button>
            <!-- </div> -->
            </form>
            <a href="./query_raw.php?用户名=<?php echo $id ?> " >
              <input type=button class="btn btn-info" value = "返回">   
            </a>
            </div>
            
            <!-- <button  class="btn"  onClick="javascript :goBack()"  >返回 </button> -->
          
      </div>
    </div>
  </body>
</html>



