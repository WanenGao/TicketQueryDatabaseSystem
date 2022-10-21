<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
      $id = $_GET['用户名'];
    }
    else
    {
      $id = $_POST['username'];
    }
    // $host     = 'localhost';
    // $username = 'root';
    // $password = false;
    // $dbname   = '12306system2';
    // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    // if($link){
    //     mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
    //     $sql    = "";       // SQL 语句
    //     $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
    //     $row = $result -> fetch_row();    //取该用户的结果
        
    //     //var_dump($row);
        
    //     $data   = mysqli_fetch_all($result,MYSQLI_ASSOC);    // 从结果集中获取所有数据
    //     mysqli_close($link);
    
    // }else{
    //     die('数据库连接失败！');
    // }
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

    <title>余票查询页面</title>

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
  
    	<!-- Le styles -->
	<link href="http://cdn.staticfile.org/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://cdn.ibootstrap.cn/css/builder/v3/layoutit.css" rel="stylesheet">
  <style>

 .carousel .item {
  height: 600px;
  background-color: #777;
}
.carousel-inner > .item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 650px;
}
</style>
    </head>

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
            <li class="active"><a href="query.php?用户名=<?php echo $id?>">首页</a></li>
            <li><a href="query_raw.php?用户名=<?php echo $id?> ">余票查询</a></li>
            <li><a href="./MyOrders.php?用户名=<?php echo $id?> ">我的订单</a></li>
            <li><a href="../personal center.php?用户名=<?php echo $id?> ">个人中心</a></li>
            <!-- <li><a href="#">个人中心</a></li> -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" style="text-align:center">
        <div class="item active">
          <img alt="First slide" src="../img/train1.jpg" ></img>
        </div>
        <div class="item">
          <img alt="Second slide" src="../img/train2.jpg" ></img>
        </div>
        <div class="item">
          <img alt="Third slide" src="../img/train3.jpg"  ></img>
        </div>
        <div class="item">
          <img alt="Forth slide" src="../img/train4.jpg"  ></img>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
 <script src="../js/jquery-3.5.1.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script type="text/javascript">
//$('.carousel').carousel('next');
 </script>

     <!-- <h>余票查询</h>
    <form action="query_raw.php" method="post">
		    <input type="text" name="start" size="20" placeholder="出发城市"> <br>
        <input type="text" name="end" size="20" placeholder="目的城市"> <br>
		<input type="submit" name="submit" value="查询">
    </form> -->
</body>
</html>