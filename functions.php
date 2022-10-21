<?php

    function db_connect() {
        $host     = 'localhost';
        $username = 'root';
        $password = false;
        $dbname   = '12306system2';
        $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
        if($link){
            return $link;
        }else{
            die('数据库连接失败！');
        }
    }
        //登录时验证用户信息函数
    function login($username, $password) {
        $host     = 'localhost';
        $username0 = 'root';
        $password0 = false;
        $dbname   = '12306system2';
        $link     = @mysqli_connect($host,$username0,$password0,$dbname);   // 连接到数据库
        // $link     = @mysqli_connect($host,$username,$password,$dbname);   // 连接到数据库
        //$sql = "select * from users where 用户名='".$username."' and 登录密码 = sha1('".$password."')";
        $sql = "call login('".$username."', '".$password."')";
        $result = mysqli_query($link, $sql);    // 执行 SQL 语句，并返回结果
        $num = $result -> fetch_row();
        mysqli_close($link);
        if ($num >0) {
            return true;
        } else {
            return false;
        }
    }
    // 输出头部标题的函数
function do_html_header($title) {
    ?>
      <html>
      <head>
        <title><?php echo $title;?></title>
        <style>
          body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
          li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
          hr { color: #3333cc; width=300; text-align=left}
          a { color: #000000 }
        </style>
      </head>
      <body>
      <!-- <img src="" alt="PHPbookmark logo" border="0"
           align="left" valign="bottom" height="30" width="30" /> -->
      <h1>12306系统</h1>
      <?php echo $title;?>
      <br>
      <hr />
      <?php
    
    }

// 跳转页面的函数
function do_html_URL($url, $name) {
?>
    <br>
  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
<?php
}

function do_html_footer() {
?>
  </body>
  </html>
<?php
}
?>