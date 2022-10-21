<?php
    //登录后台处理程序
    require_once('functions.php');
    
    $username = $_POST['username'];
    $passwd = $_POST['password'];
    
    $res = false;

    if ($username && $passwd) {
        
        try  {
            // if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{6,16}+$/u",$username)){
            //     throw new Exception('用户名包含非法字符或长度错误，请重新输入！');
            // }
            // if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$passwd)){
            //     throw new Exception('密码包含非法字符或长度错误，请重新输入！');
            // }
            //验证用户信息
            
            $res = login($username, $passwd);
        }
        catch(Exception $e)  {
            echo "<script type='text/javascript'>
            alert('账号或密码错误');
            location.href='".$_SERVER["HTTP_REFERER"]."';
            </script>";
        }
    }
    //登陆成功后
    //do_html_header('Home');
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
        echo "<script type='text/javascript'>
            alert('账号或密码错误');
            location.href='".$_SERVER["HTTP_REFERER"]."';
            </script>";
        
    }
    // echo "<pre><a href='javascript:login(\"{$username}\",\"{$passwd}\")''>个人中心</a>";
    #header("Location: index.php");
    //file_get_contents('https://www.baidu.com');
//     file_get_contents('http://localhost:8089/test001/index.php');
// print_r($http_response_header);
    // print_r(parseHeaders( $http_response_header ) );
    //确保重定向后，后续代码不会被执行
    exit;
        
?>

