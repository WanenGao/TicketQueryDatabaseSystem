<?php
// header("Refresh:0.01,Url=addSuccess.php");


    $host     = 'localhost';
    $username = 'root';
    $password = false;
    $dbname   = '12306system2';
    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['userName'];
        $password0 = $_POST['password'];
        $surePassword = $_POST['surePassword'];
        $trueName = $_POST['trueName'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $idNo = $_POST['idNo'];
        $type = $_POST['type'];
    if($link){
        mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
        $sql    = "select * from users where 用户名 = '".$name."'";         // SQL 语句
        $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
        $row    = mysqli_num_rows($result);  
        mysqli_close($link);
        if (!empty($row)){
        echo "<script>alert('该用户名已存在');history.go(-1);
        </script>";
        }
        else
        {
            if ($password0 != $surePassword){
                echo "<script>alert('两次密码输入不同！请重新输入密码！');history.go(-1);
                </script>";
            }
            else
            {
                $sql    = "select * from users where 手机号 = ".$mobile."";         // SQL 语句
                $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                $row    = mysqli_num_rows($result);  
                mysqli_close($link);
                if (!empty($row)){
                    echo "<script>alert('该手机号已存在')
                    ;history.go(-1);
                    </script>";
                }
                else
                {
                    $sql    = "select * from users where 邮箱 = '".$email."'";         // SQL 语句
                    $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                    $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                    $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                    $row    = mysqli_num_rows($result);  
                    mysqli_close($link);
                    if (!empty($row)){
                        echo "<script>alert('该邮箱已被注册');history.go(-1);</script>";
                    }
                    else
                    {
                        $sql = "CALL ADDUSER('".$name."','".$password0."', '".$trueName."', ".$mobile.", '".$email."', '".$idNo."', '".$type."');";
                        $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
                        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
                        $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
                        echo "<script>alert('注册成功！')</script>";
                    }
                }
            }

        }
        mysqli_close($link);
    }else{
        die('数据库连接失败！');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
 
<head>
<meta http-equiv="Content-Type" content="register/html; charset=gb2312">
    
    <meta http-equiv="Content-Type" content="register/html; charset=gb2312">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://cdn.jsdelivr.net/npm/@bootcss/v3.bootcss.com@1.0.25/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/dashboard/">

    <title>注册</title>

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
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        
        html {
            height: 100%;
            width: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            background: url(./img/galaxy.jpg) no-repeat 0px 0px;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -moz-background-size: 100% 100%;
        }
        
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        
        #loginDiv {
            width: 37%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 600px;
            background-color: rgba(75, 81, 95, 0.3);
            box-shadow: 7px 7px 17px rgba(52, 56, 66, 0.5);
            border-radius: 5px;
        }
        
        #name_trip {
            margin-left: 50px;
            color: red;
        }
        
        p,
        .sexDiv {
            text-align: center;
            margin-top: 10px;
            margin-left: -40px;
            color: azure;
        }
        
        .sexDiv>input,
        .hobby>input {
            width: 30px;
            height: 17px;
        }
        
        input,
        select {
            margin-left: 15px;
            border-radius: 5px;
            border-style: hidden;
            height: 40px;
            width: 140px;
            background-color: rgba(216, 191, 216, 0.5);
            outline: none;
            color: #f0edf3;
            padding-left: 10px;
        }
        
        /* .button {
            border-color: cornsilk;
            background-color: rgba(100, 149, 237, .7);
            color: aliceblue;
            border-style: hidden;
            border-radius: 5px;
            width: 100px;
            height: 31px;
            font-size: 16px;
        } */
        
        .introduce {
            margin-left: 110px;
        }
        
        .introduce>textarea {
            background-color: rgba(216, 191, 216, 0.5);
            border-style: hidden;
            outline: none;
            border-radius: 5px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
            color: #f0edf3;
        }
        
        b {
            margin-left: 50px;
            color: #FFEB3B;
            font-size: 10px;
            font-weight: initial;
        }
    </style>
</head>
 
<body>

<div id="loginDiv">
        <div class="container">
        <h1>REGISTER</h1>
        <div class="row">
                <div class="col-md-1">
                </div>
        <form action='./register2.php' method="post" enctype="multipart/form-data">
        <div class="col-md-5 ">
            

        <!-- <input id ="userName" name="userName" type="text" autofocus required><label id="name_trip"></label></p> -->
        <div class="control-group"><label class="control-label"  for="userName">用户名</label>
        <div class="controls"><input class = "form-control" id ="userName" name="userName" type="text" autofocus required><label id="name_trip"></label>
        </div>
        </div>

            <!-- <p>用户密码:<input id = "password" name="password" type="password" required><label id="password_trip"></label></p> -->
            <div class="control-group"><label class="control-label"  for="password">用户密码</label>
            <div class="controls"><input class = "form-control" id ="password" name="password" type="password" autofocus required><label id="password_trip"></label>
            </div>
            </div>

            <!-- <p>确认密码:<input id="surePassword" name="surePassword" type="password" required><label id="surePassword_trip"></label></p> -->
            <div class="control-group"><label class="control-label"  for="surePassword">确认密码</label>

            <div class="controls"><input class = "form-control" id ="surePassword" name="surePassword" type="password" autofocus required><label id="surePassword_trip"></label>
            </div>
            </div>


            <!-- <p>真实姓名:<input id ="trueName" name="trueName" type="text" autofocus required><label id="name_trip"></label></p> -->
            
            <div class="control-group"><label class="control-label"  for="trueName">真实姓名</label>

            <div class="controls"><input class = "form-control" id ="trueName" name="trueName" type="text" autofocus required><label id="name_trip"></label>
            </div>
            </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
            <!-- <p>手机号:<input style="width: 100px;" id ="mobile" name="mobile" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength=11>
                    <label id="phoneNumber_trip"></label></p> -->
            
            <div class="control-group">
                <label class="control-label"  for="mobile">手机号</label>

            <div class="controls"><input class = "form-control" id ="mobile" name="mobile" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength=11 autofocus required><label id="phoneNumber_trip"></label>
            </div>
            </div>
            

            <!-- <p>
                邮件:
                <input id ="email" name="email" type="email" required>
                <label id="emil_trip"></label>
            </p> -->

            <div class="control-group"><label class="control-label"  for="trueName">邮箱</label>

            <div class="controls"><input class = "form-control" id ="email" name="email" type="email" required><label id="email_trip"></label>
            </div>
            </div>
           
            <!-- <p>证件号:<input id = "idNo" name="idNo" type="text" required><label id="idNo_trip"></label></p> -->

            <div class="control-group"><label class="control-label"  for="idNo">证件号</label>

            <div class="controls"><input class = "form-control" id ="idNo" name="idNo" type="text" required><label id="idNo_trip"></label>
            </div>
            </div>

            <div class="control-group"><label class="control-label"  for="userType">旅客类型</label>

            <div class="controls">
                <select class = "form-control" name="type" id="userType" required>
                    <option  ></option>
                    <option value="成人">成人</option>
                    <option value="儿童">儿童</option>
                    <option value="学生票">学生票</option>
                </select>
                <label id="type_trip"></label>
            </div>
            </div>
            </div>
            
            <p align="center">
                <a href="./login2.php">
                <input type="button" class="btn btn-danger"  value="LOGIN" >
                </a>   
                <input type="reset" class="btn btn-warning" value="RESET">
                <input type="submit" class="btn btn-success" onblur="javascript:submit()" onclick=''value="SUBMIT">
            </p>
            
        </form>
    </div>
    </div>
    </div>
 
</body>
<script type="text/javascript">
    function trip(obj, trip) {
        document.getElementById(obj).innerHTML = "<b>" + trip + "</b>";
    }

    // function checkName(){
    //     var name = document.getElementsByName("userName");
    // <?php
    //      $host     = 'localhost';
    //      $username = 'root';
    //      $password = false;
    //      $dbname   = '12306system2';
    //      $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
    //      if($link){
    //          mysqli_set_charset($link,'UTF-8');      // 设置数据库字符集
    //          $sql    = "select * from users where 用户名 = '".$name."'";         // SQL 语句
    //          $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
    //          $data   = mysqli_fetch_all($result);    // 从结果集中获取所有数据
    //          $row    = mysqli_num_rows($result); 
    //          mysqli_close($link);
    //          if(!empty($row)){
    //             echo "<script>alert('该用户名已存在')</script>";
    //          }else{
    //             echo "<script>alert('用户名不存在，可以注册')</script>";
    //          }
            
    //          echo "注册成功！";
    //          //window.open('addSuccess.php');
    //          header('Refresh:0.01,Url=addSuccess.php');
    //      }else{
    //          die('数据库连接失败！');
    //      }
    //  ?>
    // }
 
    function checkSex() {
        var sexNum = document.getElementsByName("sex");
        var sex = "";
        for (let i = 0; i < sexNum.length; ++i) {
            if (sexNum[i].checked) {
                sex = sexNum[i];
             }
 
         }
         if (sex == "") {
             trip("sex_trip", "ERROR!!");
             return false;
         } else {
             trip("sex_trip", "OK!!");
         }
    }
 
    function checkHobby() {
        var hobbyNum = document.getElementsByName("hobby");
        var hobby = "";
        for (let i = 0; i < hobbyNum.length; ++i) {
            if (hobbyNum[i].checked) {
                hobby = hobbyNum[i];
            }
        }
        if (hobby == "") {
            trip("hobby_trip", "ERROR!!");
            return false;
        } else {
            trip("hobby_trip", "OK!!");
 
        }
    }
 
    function checkSelect() {
        var myselect = document.getElementById("userType");
        var index = myselect.selectedIndex;
        var checkValue = myselect.options[index].value;
        if (checkValue == 0) {
            trip("type_trip", "请选择!!");
            return false;
        } else {
            trip("type_trip", "OK!!");
        }
    }

 
    function checkForm() {
        // checkName();
    
 
        var trip = document.getElementsByName("em");
        var tripV = trip.innerHTML();
        //获取用户名输入项
        var userNname = document.getElementById("userNname");
        var uName = userNname.value;
        if (uName.length < 1 || uName.length > 10) {
            trip("name_trip", "账号长度为1-10位!!");
            return false;
        } else {
            trip("name_trip", "OK!!");
 
        }
 
        //密码长度大于6 和确认必须一致 
        var password = document.getElementById("password");
        var userPass = password.value;
        if (userPass.length < 6) {
            trip("password_trip", "密码要>6位!!");
            return false;
        } else {
            trip("password_trip", "OK!!");
        }
 
        //获取确认密码框的值 var
        var surePassword = document.getElementById("surePassword");
        var surePass = surePassword.value;
        if (userPass != surePass) {
            trip("surePassword_trip", "两次密码不一致!!");
            return false;
        }
 
        //校验邮箱:/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/
        var inputEmail = document.getElementById("email");
        var uEmail = inputEmail.value;
        if (!/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/.test(uEmail)) {
            trip("email_trip", "邮箱不合法!!");
            return false;
        } else {
            trip("email_trip", "OK!!");
        }
 
 
        return true;
    }
 
    function submit() {
        if (checkForm()) {
            return true;
        } else {
            return false;
        }
    }
</script>
</html>

