<?php
require_once './pub/db.func.php';
require_once './pub/tools.func.php';

//1.判断是否为post提交
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    try {
        //2.判断post提交数据是否为空，不为空则接收数据 ，为空则抛出异常
        if (!empty($_POST['username'])) {
            $username = htmlentities($_POST['username']);
            $password = htmlentities(md5($_POST['password']));
            //3.书写并执行sql语句，判断用户名或密码是否正确，正确则写入session并跳转到index.php页面，错误则抛出异常
            $sql = "SELECT id, username, password
                FROM admin
                WHERE username = '$username'
                AND password = '$password'";
            $result = queryOne($sql);
            if ($result) {
                setSession('admin', ['username' => $username, 'id' => $result['id']]);
                header('location:index.php');
            }else {
                throw new Exception('用户名或密码错误');
            }
        }else {
            throw new Exception('请输入用户名或密码');
        }
    }catch (Exception $e) {
        $errors = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登陆页面</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/site.min.css" rel="stylesheet">
</head>
<body style="background-color: whitesmoke">
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <h4 style="color: #D3D3D3">小白网</h4>
        </div>
    </div>
</div>
<!--导航栏结束-->
<!-- 登录页面 -->
<div class="container projects">
    <!--登录框-->

    <div class="projects-header page-header" style="background-color: lightgray; border-radius: 15px;">
        <h1><p style="padding-top: 20px;">图书管理系统</p></h1>
    </div>
    <!-- 登录框 -->
    <div class="row" >
        <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;margin-bottom: 30px;">
            <p style="color: red"><?php if ($method == 'POST') echo $errors; ?></p>
            <form class="form-horizontal" action="login.php" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">用户名:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="请输入姓名,字数不超过5位" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">密码:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="请输入密码，数字或字母8~16位" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-default" style="width: 100px">登陆</button>
                        <button type="reset" class="btn btn-default" style="width: 100px">重置</button>
                    </div>
                </div>
            </form>
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