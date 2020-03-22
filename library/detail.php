<?php
require_once './pub/db.func.php';
require_once 'auth.php';
//获取id
$id = $_GET['id'];
$sql = "SELECT bookName,bookCode,bookStock,bookType,author,bookInfo,created_at FROM book
        WHERE  id = '$id'";
$result = queryOne($sql);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>图书详情页面</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/site.min.css" rel="stylesheet">
</head>
<body style="background-color: whitesmoke">
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand hidden-sm" href="index.php">小白网,欢迎您</a>
            <a class="navbar-brand hidden-sm" href="index.php">首页</a>
        </div>
    </div>
</div>
<!--导航栏结束-->
<!-- 图书详情页面 -->
<div class="container projects">
    <!--登录框-->

    <div class="projects-header page-header" style="background-color: lightgray; border-radius: 15px;">
        <h1><p style="padding-top: 20px;">图书管理系统</p></h1>
    </div>
    <!-- 图书详情框 -->
    <div class="row" style="border: 1px solid lightgray;width: 800px;margin: auto;border-radius: 15px;" >
        <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;margin-bottom: 30px;">
            <div style="text-align: center;margin-bottom: 30px">
                <h1><p><?php echo $result['bookName']; ?></p></h1>
            </div>
            <div style="text-align: center">
                <h3><p>作者：<?php echo $result['author']; ?></p></h3>
                <h3><p>类型：<?php echo $result['bookType']; ?></p></h3>
            </div>
            <div style="width: 300px;margin: auto;">
                <div style="float: left"><h3><p>编号：<?php echo $result['bookCode']; ?></p></h3></div>
                <div style="float: right;"><h3><p>数量：<?php echo $result['bookStock']; ?></p></h3></div>
            </div>
            <div style="margin-top: 90px;">
                <h4><p>简介：<?php echo $result['bookInfo']; ?></p></h4>
                <h4><p>创建时间：<?php echo $result['created_at']; ?></p></h4>
            </div>
        </div>
    </div>
</div>
<footer class="footer  container">
    <div class="row footer-bottom">
        <ul class="list-inline text-center">
            <h4>小白网</h4>
        </ul>
    </div>
</footer>
<script src="style/js/jquery-3.4.1.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
</body>

</html>