<?php
    //登录后台处理程序
    require_once('functions.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $passwd = $_POST['password'];
    }
    else
    {
        //$username = $_GET['username'];
        //$passwd = $_GET['password'];
    }
    
    
    $res = false;

    if (!empty($username) && !empty($passwd)) {
       
            // if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{6,16}+$/u",$username)){
            //     throw new Exception('用户名包含非法字符或长度错误，请重新输入！');
            // }
            // if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$passwd)){
            //     throw new Exception('密码包含非法字符或长度错误，请重新输入！');
            // }
            //验证用户信息
            
            $res = login($username, $passwd);
            if($res){
                echo "<script type=\"text/javascript\">
                function login(id,passwd){
                    window.location.href = \"./php/query.php?用户名=\"+id;}
                    document.getElementById('login').innerHTML = login(\"{$username}\",\"{$passwd}\");
                    </script>";
                echo "<p id='login'></p>";
                }
                else
                {
                    // location.href='".$_SERVER["HTTP_REFERER"]."';
                    echo "<script type='text/javascript'>
                        alert('账号或密码错误');
                        
                        </script>";
                    
                }
        
        // catch(Exception $e)  {
        //     echo "<script type='text/javascript'>
        //     alert('账号或密码错误');
        //     location.href='".$_SERVER["HTTP_REFERER"]."';
        //     </script>";
        // }
    }
    //登陆成功后
    //do_html_header('Home');
    
    // echo "<pre><a href='javascript:login(\"{$username}\",\"{$passwd}\")''>个人中心</a>";
    #header("Location: index.php");
    //file_get_contents('https://www.baidu.com');
//     file_get_contents('http://localhost:8089/test001/index.php');
// print_r($http_response_header);
    // print_r(parseHeaders( $http_response_header ) );
    //确保重定向后，后续代码不会被执行
    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>12306System</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Background Video-->
        <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/mp4/bg.mp4" type="video/mp4" /></video>
        <!-- Masthead-->
        <div class="masthead">
            <div class="masthead-content text-white">
                <div class="container-fluid px-4 px-lg-0">
                    <h1 class="fst-italic lh-1 mb-4">12306 System</h1>
                    <p class="mb-5">We're working hard to finish the development of this site. Sign up/login in below to surf our work. Hope you enjoy it!</p>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form action="./login2.php" method="post" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="userNname" name="username" type="text" placeholder="USERNAME" aria-label="Enter your name..." data-sb-validations="required" /></div>
                            <div class="col"><input class="form-control" id="password" name="password" type="password" placeholder="PASSWORD" aria-label="Enter your password..." data-sb-validations="required" /></div>
                            </div>
                            <br>
                            <div class="row input-group-newsletter">
                            <div class="col">
                            <a href = 'register2.php'>
                            <input class="btn btn-primary " id="registerButton" type="button" value="REGISTER">
                            </a>
                            </div>
                            <div class="col"><input class="btn btn-primary " id="resetButton" type="reset" value="RESET"></div>
                            <div class="col"><input class="btn btn-primary " id="submitButton" type="submit" value="LOGIN"></div>
                            </div>
                        <!-- ="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div> --> 
                    </form>
                </div>
            </div>
        </div>
        <!-- Social Icons-->
        <!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
        <div class="social-icons">
            <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
