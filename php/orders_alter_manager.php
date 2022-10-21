<?php
    //header("Refresh:0.01,Url=orders.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
      $name = $_GET['id'];
      $id = $_GET['id'];
      $train = $_GET['train'];
      $date = $_GET['date'];
      $time1 = $_GET['time1'];
      $time2 = $_GET['time2'];
      $src = $_GET['src'];
      $dest = $_GET['dest'];
      $carriage = $_GET['carriage'];
      $seat = $_GET['seat'];
    }
    else
    {
      $name = $_POST["用户名"];
      $id = $_POST['id'];
      $train = $_POST['train'];
      $date = $_POST['date'];
      $time1 = $_POST['time1'];
      $time2 = $_POST['time2'];
      $src = $_POST['src'];
      $dest = $_POST['dest'];
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
        $sql    = "select * from orders where 用户名 = '".$id."' and 车次 = '".$train."' and 日期 = '".$time."'";         // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
    //删除玩跳转到首页
    //window.location.href = "./orders.php";
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

    <title>订单信息</title>
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
   
    <style type="text/css">
     .box {display:table;margin:0 auto;}
    h2 {text-align: center;}
    .add {margin-bottom: 20px;}
    .error {color: #FF0000;}
    .list-group-item-primary{color:#004085;background-color:#b8daff}.list-group-item-primary.list-group-item-action:focus,.list-group-item-primary.list-group-item-action:hover{color:#004085;background-color:#9fcdff}.list-group-item-primary.list-group-item-action.active{color:#fff;background-color:#004085;border-color:#004085}.list-group-item-secondary{color:#383d41;background-color:#d6d8db}.list-group-item-secondary.list-group-item-action:focus,.list-group-item-secondary.list-group-item-action:hover{color:#383d41;background-color:#c8cbcf}.list-group-item-secondary.list-group-item-action.active{color:#fff;background-color:#383d41;border-color:#383d41}.list-group-item-success{color:#155724;background-color:#c3e6cb}.list-group-item-success.list-group-item-action:focus,.list-group-item-success.list-group-item-action:hover{color:#155724;background-color:#b1dfbb}.list-group-item-success.list-group-item-action.active{color:#fff;background-color:#155724;border-color:#155724}.list-group-item-info{color:#0c5460;background-color:#bee5eb}
    .list-group-item-info.list-group-item-action:focus,.list-group-item-info.list-group-item-action:hover{color:#0c5460;background-color:#abdde5}.list-group-item-info.list-group-item-action.active{color:#fff;background-color:#0c5460;border-color:#0c5460}.list-group-item-warning{color:#856404;background-color:#ffeeba}.list-group-item-warning.list-group-item-action:focus,.list-group-item-warning.list-group-item-action:hover{color:#856404;background-color:#ffe8a1}.list-group-item-warning.list-group-item-action.active{color:#fff;background-color:#856404;border-color:#856404}.list-group-item-danger{color:#721c24;background-color:#f5c6cb}.list-group-item-danger.list-group-item-action:focus,.list-group-item-danger.list-group-item-action:hover{color:#721c24;background-color:#f1b0b7}.list-group-item-danger.list-group-item-action.active{color:#fff;background-color:#721c24;border-color:#721c24}.list-group-item-light{color:#818182;background-color:#fdfdfe}.list-group-item-light.list-group-item-action:focus,.list-group-item-light.list-group-item-action:hover{color:#818182;background-color:#ececf6}.list-group-item-light.list-group-item-action.active{color:#fff;background-color:#818182;border-color:#818182}.list-group-item-dark{color:#1b1e21;background-color:#c6c8ca}.list-group-item-dark.list-group-item-action:focus,.list-group-item-dark.list-group-item-action:hover{color:#1b1e21;background-color:#b9bbbe}.list-group-item-dark.list-group-item-action.active{color:#fff;background-color:#1b1e21;border-color:#1b1e21}

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
            <li><a href="query.php?用户名=<?php echo $id?>">首页</a></li>
            <li ><a href="query_raw.php?用户名=<?php echo $id ?>">余票查询<span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="./MyOrders.php?用户名=<?php echo $id?>">我的订单</a></li>
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
$bussiness = $firstClass = $secondClass = "-";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
  if ($_GET["carriage"] == 1)
            {
              // $sql = "update remainall set 商务座特等座余票=商务座特等座余票-1 where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."';";
              // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              // $result = mysqli_query($link, $sql); 
              // $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
              $sql = "select 商务座特等座余票 from remainall where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."'";
              $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              $result = mysqli_query($link, $sql); 
              $data   = mysqli_fetch_all($result);

              foreach($data as $key => $value){
                foreach($value as $k=>$v){
                    $arr[$k]=$v;
                }
                $bussiness = $arr[0];
              
              }

            }
            else if ($_GET["carriage"] >1 && $_GET["carriage"] <6)
            {
              // $sql = "update remainall set 一等座余票=一等座余票-1 where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."';";
              // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              // $result = mysqli_query($link, $sql); 
              // $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
              $sql = "select 一等座余票 from remainall where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."'";
              $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              $result = mysqli_query($link, $sql); 
              $data   = mysqli_fetch_all($result);
              foreach($data as $key => $value){
                foreach($value as $k=>$v){
                    $arr[$k]=$v;
                }
                $firstClass = $arr[0];
              }

            }
            else{
              // $sql = "update remainall set 二等座余票=二等座余票-1 where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."'";
              // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              // $result = mysqli_query($link, $sql); 
              // $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
              $sql = "select 二等座余票 from remainall where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."'";
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
}

if ( $_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["id"]))
  {
    $nameErr = "用户名是必须的";
  }
  else if (empty($_POST["carriage"]))
  {
    $carriageErr = "车厢号是必须的";
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
     
    $sql = "select * from orders where 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' and 车厢号=".$_POST["carriage"]." and 座位号= ".$_POST["seat"]."";
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        $num2  =  mysqli_num_rows($result);
        mysqli_close($link);
        if ($num2 != 0)
        {
          echo "<script type='text/javascript'>
            alert('当前位置不可选,请另选位置！');
            location.href='".$_SERVER["HTTP_REFERER"]."';
            </script>";
        }
        else
        {
            // location.href='".$_SERVER["HTTP_REFERER"]."';
            echo "<script type='text/javascript'>
            alert('改座成功！');
            
            </script>";
        }
      }

          $sql = "update orders set 车厢号=".$_POST["carriage"]." , 座位号= ".$_POST["seat"]." where 用户名= '".$_POST["id"]."' and 车次= '".$_POST["train"]."' and 日期= '".$_POST["date"]."' ";
          $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
          $result = mysqli_query($link, $sql); 
          $data   = mysqli_fetch_all($result); 
            // echo $_POST["carriage"];
            if ($_POST["carriage"] == 1)
            {
              // $sql = "update remainall set 商务座特等座余票=商务座特等座余票-1 where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."';";
              // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              // $result = mysqli_query($link, $sql); 
              // $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
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

            }
            else if ($_POST["carriage"] >1 && $_POST["carriage"] <6)
            {
              // $sql = "update remainall set 一等座余票=一等座余票-1 where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."';";
              // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              // $result = mysqli_query($link, $sql); 
              // $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
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

            }
            else{
              // $sql = "update remainall set 二等座余票=二等座余票-1 where 车次= '".$_GET["train"]."' and 日期= '".$_GET["date"]."' and 出发站 = '". $_GET["src"]."' and 到达站= '". $_GET["dest"]."'";
              // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
              // $result = mysqli_query($link, $sql); 
              // $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
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
            
        
    
  }


?>

    <h2>修改订单信息</h2>
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
      <form action="orders_alter.php" method="post" enctype="multipart/form-data">
      <div class="col-md-4 ">

      <p><span class="error">* 必填字段</span></p>
           
           <div class="control-group"><label class="control-label"  for="inputName">用户名<span class="error"> * <?php echo $nameErr;?></span></label>

           <div class="controls"><input class = "form-control" id="inputName" placeholder="Name" type="text" name="id" value="<?php echo $id ?>"></div>
           </div>
           <input  type = "hidden"  name = "用户名" value="<?php $name ?>"/>
        <!-- <tr><th>用户名:</th><td><input type="text" name="id" size="5" value="<?php echo $id?>" readonly="readonly"></td></tr> -->
          <div class="control-group"><label class="control-label"  for="inputTrain">车次</label>

          <div class="controls"><input class = "form-control" id="inputTrain" placeholder="Train No" type="text" name="train" value="<?php echo $train ?>"  ></div>
          </div>

        <!-- <tr><th>车次:</th><td><input type="text" name="train" size="25" value="<?php echo $train?>" readonly="readonly"></td></tr> -->
        <div class="control-group"><label class="control-label"  for="inputDate">日期</label>

            <div class="controls"><input class = "form-control" id="inputDate" placeholder="Date" type="text" name="date" value="<?php echo $date ?>" ></div>
            </div>

        <!-- <tr><th>日期:</th><td><input type="date" name="date" size="25" value="<?php echo $date?>" readonly="readonly"></td></tr> -->
        
        <div class="control-group"><label class="control-label"  for="inputTime1">出发时间</label>

            <div class="controls"><input class = "form-control" id="inputTime1" placeholder="Start Time" type="text" name="time1" value="<?php echo $time1 ?>" ></div>
            </div>

        <!-- <tr><th>出发时间:</th><td><input type="time" name="timeone" size="25" value="<?php echo $time1?>"></td></tr> -->
        <!-- <tr><th>到达时间:</th><td><input type="time" name="timetwo" size="25" value="<?php echo $time2?>"></td></tr> -->
        
        <div class="control-group"><label class="control-label"  for="inputTime2">到达时间</label>

            <div class="controls"><input class = "form-control" id="inputTime2" placeholder="End Time" type="text" name="time2" value="<?php echo $time2 ?>" ></div>
            </div>
            </div>
    <div class="col-md-4 " >
        <p></p>
        <br>
        <div class="control-group"><label class="control-label"  for="inputSrc">出发地</label>

            <div class="controls"><input class = "form-control" id="inputSrc" placeholder="Departure" type="text" name="src" value="<?php echo $src ?>"  ></div>
            </div>
        <!-- <tr><th>出发地:</th><td><input type="text" name="src0" size="25" value="<?php echo $src?>"></td></tr> -->
        <!-- <tr><th>目的地:</th><td><input type="text" name="dest" size="25" value="<?php echo $dest?>"></td></tr> -->
        
        <div class="control-group"><label class="control-label"  for="inputDest">目的地</label>

            <div class="controls"><input class = "form-control" id="inputDest" placeholder="Destination" type="text" name="dest" value="<?php echo $dest ?>"></div>
            </div>
        
            <!-- <div class="control-group"><label class="control-label"  for="inputCarriage">车厢号<span class="error"> * <?php echo $carriageErr;?></span></label>

          <div class="controls"><input class = "form-control" id="inputCarriage" placeholder="Carriage NO" type="text" name="carriage" value="<?php echo $carriage?>"></div>

          </div> -->

          <div class="control-group"><label class="control-label"  for="inputCarriage">车厢号</label>
          
          <?php
            if ($carriage == 1)
            {
              echo '<div class="controls">
              <select class = "form-selectpicker form-control" name="carriage" id="inputCarriage" require>
                  <option value="'.$carriage.'" selected >'.$carriage.'</option>
              </select>
              </div>';
         
            }
            else if ($carriage >= 2 && $carriage <= 5)
            {
              echo '<div class="controls">
              <select class = "form-selectpicker form-control" name="carriage" value="'.$carriage.'" id="inputCarriage" require >
                <option value='.$carriage.' selected >'.$carriage.'</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                
              </select>
              </div>
              ';
            }
            else
            {
              echo '<div class="controls">
              <select class = "form-selectpicker form-control" name="carriage"  id="inputCarriage" value="'.$carriage.'" require >
                <option value='.$carriage.' selected >'.$carriage.'</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
                <option value=11>11</option>
                <option value=12>12</option>
                <option value=13>13</option>
                <option value=14>14</option>
                <option value=15>15</option>
                <option value=16>16</option>
                <option value=17>17</option>
                <option value=18>18</option>
                <option value=19>19</option>
                <option value=20>20</option>
              </select>
              </div>
              ';
            }

          ?>
        </div>
        <!-- <tr><th>车厢号:</th><td><input type="text" oninput = "value=value.replace(/[^\d]/g,'')" name="carriage" size="25" value="<?php echo $carriage?>"></td></tr> -->
        <div class="control-group"><label class="control-label"  for="inputSeat">座位号(座位号1~100)<span class="error"> * <?php echo $seatErr;?></span></label>

            <div class="controls"><input class = "form-control" id="inputSeat" placeholder="Seat NO" type="text" name="seat" value="<?php echo $seat?>"></div>
            </div>
        
        <!-- <tr><th>座位号:</th><td><input type="text" oninput = "value=value.replace(/[^\d]/g,'')" name="seat" size="25" value="<?php echo $seat?>"></td></tr> -->
        <p></p>
   <br>
            <!-- <input  type="button"  onClick="javascript :history.back(-1);"  value="返回" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
            <!-- <input  type="submit"  value="提交"> -->
            
            <button  class = "btn btn-success"  type="submit">提交</button>
      </form>
      <a href="./MyOrders.php?用户名=<?php echo $id ?> " >
              <input type=button class="btn btn-info" value = "返回">   
       </a>
  </div>
  </div>
  </div>
  </body>
</html>
