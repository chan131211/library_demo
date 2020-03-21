<?php
require './pub/db.func.php';
require 'auth.php';

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>图书管理系统</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/site.min.css" rel="stylesheet">
    <style>
        .container  .row .col-lg-4 img{ display: block; margin-left: auto; margin-right: auto; }
        .container .row .col-lg-4 h3,p{ text-align: center; }
        .row .col-lg-4 .button{ width: 360px; margin-left: 150px; margin-bottom: 10px;}
    </style>
</head>

<body>
    <!--导航栏-->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand hidden-sm" href="index.php">小白网</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand hidden-sm" href="">欢迎您！</a>
            </div>
        </div>
    </div>
    <!--导航栏结束-->
    <!--巨幕-->
    <div class="jumbotron masthead">
        <div class="container">
          <h1>图书管理系统</h1>
          <h2>实现图书查看功能</h2>
            <p class="masthead-button-links">
                <form class="form-inline" action="" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="输入搜索内容" name="key" value="">
                        <button class="btn btn-default" type="submit">搜索</button>
                        <a href="add.php"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  添加  </button></a>
                        <a href="del.php"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  退出  </button></a>
                    </div>
                </form>
            </p>
        </div>
    </div>
    <!--巨幕结束-->
    <div class="container projects">
        <div class="projects-header page-header">
            <h2>图书展示</h2>
            <p>将图书信息展示在页面中</p>
        </div>
        <!--信息展示-->
        <div class="row">

        </div>
    </div>
    <footer class="footer  container">
        <div class="row footer-bottom">
            <ul class="list-inline text-center">
                <h4>小白网</h4>
            </ul>
        </div>
    </footer>
    <script src="style/js/jquery.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
</body>

</html>
