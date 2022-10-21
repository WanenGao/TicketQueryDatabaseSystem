<!DOCTYPE html>  
<html>  
<head>  
    <title> Demo</title>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />  
 <link rel="stylesheet" href="css/bootstrap.css">
 <script src="js/jquery-3.5.1.min.js"></script>
 <script src="js/bootstrap.js"></script>
 <style>
 .carousel-item img{undefined
 max-width: 70%;
 height:auto;
 }
</style>
</head>  


<body style="width:1100px; margin-left:auto; margin-right:auto;">
<div align="center" id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="img/猫.jpg" alt="">
        </div>
        <div class="item">
            <img src="img/秋色.jpg" alt="">
        </div>
        <div class="item">
            <img src="img/galaxy.jpg" alt="">
        </div>
        <div class="item">
            <img src="img/galaxy.jpg" alt="">
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" 
        data-slide="prev">‹
    </a>
    <a class="carousel-control right" href="#myCarousel" 
        data-slide="next">›
    </a>
</div>
 </body>
 </html>