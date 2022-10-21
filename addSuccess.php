<!DOCTYPE html>
<!-- saved from url=(0047)file:///D:/web%E8%84%9A%E6%9C%AC/WEB/login.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>注册成功</title>
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
        }a
         
        #loginDiv {
            width: 37%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            background-color: rgba(75, 81, 95, 0.3);
            box-shadow: 7px 7px 17px rgba(52, 56, 66, 0.5);
            border-radius: 5px;
        }
         
        #name_trip {
            margin-left: 50px;
            color: red;
        }
         
        p {
            margin-top: 30px;
            margin-left: 20px;
            color: azure;
        }
        
        .sexDiv {
            margin-top: 10px;
            margin-left: 20px;
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
            height: 30px;
            width: 140px;
            background-color: rgba(216, 191, 216, 0.5);
            outline: none;
            color: #f0edf3;
            padding-left: 10px;
        }
        input {
            margin-left: 15px;
            border-radius: 5px;
            border-style: hidden;
            height: 30px;
            width: 140px;
           background-color: rgba(216, 191, 216, 0.5);
            outline: none;
            color: #f0edf3;
            padding-left: 10px;
        }
         
        .button {
            border-color: cornsilk;
            background-color: rgba(100, 149, 237, .7);
            color: aliceblue;
            border-style: hidden;
            border-radius: 5px;
            width: 120px;
            height: 31px;
            font-size: 16px;
        }
    </style>
</head>
 
<body>
    <div id="loginDiv">
            <h1 style="text-align: center;color: aliceblue;">注册成功！</h1>
            
            <div style="text-align: center;margin-top: 30px;">
                <input type="submit" class="button" onclick="window.open('login2.php')" value="返回登录">
            </div>

    </div>
 
 
</body></html>

