<?php
    $id = $_GET['用户名'];

    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = "select * from users where 用户名 = '".$id."'";       // SQL 语句
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $row = $result -> fetch_row();    //取该用户的结果
        
        //var_dump($row);
        
        $data   = mysqli_fetch_all($result,MYSQLI_ASSOC);    // 从结果集中获取所有数据
        mysqli_close($link);
        //echo $data[2];
        //print_r($data);
        //window.open('addSuccess.php');
        //header('Refresh:0.01,Url=addSuccess.php');
    }else{
        die('数据库连接失败！');
    }
?>

<html>
    <head>
    <meta http-equiv="Content-Type" content="register/html; charset=gb2312">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">

    <title>个人信息</title>

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
        
    <script>
    function del(id){
        question = confirm("确定注销账号吗？");
        if(question!=0){
            window.location.href = "./deleteUser.php?id="+id;
            //window.location = "orders_del.php";
        }
    }
  </script>
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
            <li><a href="./php/query.php?用户名=<?php echo $id?>">首页</a></li>
            <li><a href="./php/query_raw.php?用户名=<?php echo $id ?>">余票查询<span class="sr-only">(current)</span></a></li>
            <li><a href="./php/MyOrders.php?用户名=<?php echo $id?>">我的订单</a></li>
            <li class="active"><a href="./personal center.php?用户名=<?php echo $id?>">个人中心</a></li>
            <!-- <li><a href="#">个人中心</a></li> -->
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
  <!-- <div id="loginDiv"> -->
        
            <h2 align = "center">个人信息</h2>
            <div class="container">
                <hr>
                <div class="row">
                <div class="col-md-4">
                </div>
                <form action="alterUser.php" method="post" enctype="multipart/form-data">
                <div class="col-md-4 ">
                <input  type = "hidden" name='oldname' value="<?php echo $id?>"/> 
                <div class="control-group"><label class="control-label"  for="inputName">用户名</label>

                <div class="controls"><input class = "form-control" id="inputName" placeholder="Name" type="text" name="userName" value="<?php echo $row[0] ?>"  ></div>
                </div>
            <!-- <p>用户名:<input id ="userName" name="userName" type="text" value="<?php echo $row[0]?>" autofocus required><label id="name_trip"></label></p> -->
            <div class="control-group"><label class="control-label"  for="inputPasswd">登录密码</label>

            <div class="controls"><input class = "form-control" id="inputPasswd" placeholder="Password" type="text" name="password" value=<?php echo $row[1] ?> ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputTruename">真实姓名</label>

            <div class="controls"><input class = "form-control" id="inputTruename" placeholder="True Name" type="text" name="trueName" value=<?php echo $row[2] ?> ></div>
            </div>

            <div class="control-group"><label class="control-label"  for="inputPhoneNumber">手机号</label>

            <div class="controls"><input class = "form-control" id="inputPhoneNumber" placeholder="Phone Number" type="text" name="mobile" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength=11 value=<?php echo $row[3] ?> ></div>
            </div>

            <!-- <p>登录密码:<input id = "password" name="password" type="text" value="<?php echo $row[1]?>" required><label id="password_trip"></label></p> -->
            <!-- <p>真实姓名:<input id ="trueName" name="trueName" type="text" value="<?php echo $row[2]?>" autofocus required><label id="name_trip"></label></p> -->
            <!-- <p>手机号:<input style="width: 100px;" id ="mobile" name="mobile" value="<?php echo $row[3]?>" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength=11> -->
                    <!-- <label id="name_trip"></label></p> -->
            <div class="control-group"><label class="control-label"  for="inputEmail">邮件</label>

            <div class="controls"><input class = "form-control" id="inputEmail" placeholder="Email" type="text" name="email" value=<?php echo $row[4] ?> ></div>
            </div>
            <!-- <p>
            
                邮件:
                <input id ="email" name="email" type="email" value="<?php echo $row[4]?>" required>
                <label id="name_trip"></label>
            </p> -->
            <div class="control-group"><label class="control-label"  for="inputID">证件号</label>
            <div class="controls"><input class = "form-control" id="inputID" placeholder="ID" type="text" name="idNo" value=<?php echo $row[5] ?> ></div>
            </div>
            <!-- <p>证件号:<input id = "idNo" name="idNo" type="text" value="<?php echo $row[5]?>" required><label id="name_trip"></label></p> -->
            
            <div class="control-group"><label class="control-label"  for="userType">旅客类型</label>

            <div class="controls">
                <!-- <input class = "form-control" id="userType" placeholder="User Type" type="text" name="userType" value=<?php echo $row[6] ?> > -->
                <div class="controls"><select class = "form-control" name="type" id="userType" value="<?php echo $row[6]?>">
                    <option value="<?php echo $row[6]?>" selected ><?php echo $row[6]?></option>
                    <option value="成人">成人</option>
                    <option value="儿童">儿童</option>
                    <option value="学生票">学生票</option>
                </select>
                </div>
                </div>
           </div>
           <br>
        <p align = "center">
                <input type="submit" class="btn btn-success" onclick=''value="修改">
                <input type="reset" class="btn btn-warning" value="重置">
                <input type="button" class="btn btn-danger" onclick="del('<?php echo $row[0]?>')" value="注销" >
</p>
        </form>
    </div>

  </body>
</html>