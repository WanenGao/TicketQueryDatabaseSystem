<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>添加订单信息</title>
   <style type="text/css">
    .box {display:table;margin:0 auto;}
    h2 {text-align: center;}
    .add {margin-bottom: 20px;}
   </style>
  </head>
  <body >
    <!--输出定制表单-->
    <div class="box">
            <h2>添加订单</h2>
      <div class="add"> 
        <form action="orders_add_raw.php" method="post" enctype="multipart/form-data">
          <table border="1">
          <tr><th>用户名：</th><td><input  type="text"  name="name"  size="25"  value=""></td></tr>
          <tr><th>车  次：</th><td><input  type="text"  name="train"  size="25"  value=""></td></tr>
          <tr><th>日  期：</th><td><input  type="date"  name="date"  size="25"  value=""></td></tr>
          <tr><th>出发时间：</th><td><input  type="time"  name="time1"  size="25"  value=""></td></tr>
          <tr><th>到达时间：</th><td><input  type="time"  name="time2"  size="25"  value=""></td></tr>
          <tr><th>出发地：</th><td><input  type="text"  name="src"  size="25"  value=""></td></tr>
          <tr><th>目的地：</th><td><input  type="text"  name="dest"  size="25"  value=""></td></tr>
          <tr><th>车厢号：</th><td><input  type="text" oninput = "value=value.replace(/[^\d]/g,'')" name="carriage"  size="25"  value=""></td></tr>
          <tr><th>座位号：</th><td><input  type="text" oninput = "value=value.replace(/[^\d]/g,'')" name="seat"  size="25"  value=""></td></tr>
          <tr><th></th><td>
                <input  type="button"  onClick="javascript :history.back(-1);"  value="返回" >&nbsp;&nbsp;&nbsp;
                <input  type="reset"  value="重置">&nbsp;&nbsp;&nbsp;
                <input  type="submit"  value="提交">&nbsp;&nbsp;&nbsp;
          </td></tr>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>