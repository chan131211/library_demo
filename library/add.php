<?php
require_once 'auth.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加页面</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/site.min.css" rel="stylesheet">
</head>

<body>
    <!--导航栏-->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand hidden-sm" href="index.php">小白网</a>
                <a class="navbar-brand hidden-sm" href="index.php">首页</a>
            </div>
        </div>
    </div>
    <!--导航栏结束-->
    <!-- 添加页面 -->
    <div class="container projects">
        <div class="projects-header page-header" style="background-color: lightgray; border-radius: 15px;">
            <h1><p style="padding-top: 20px;">图书管理系统</p></h1>
        </div>
        <div class="projects-header page-header">
            <h3>添加图书</h3>
        </div>
        <!--添加框-->
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" onsubmit=" return post(this)" enctype="multipart/form-data" >
              <div class="form-group">
                  <label  class="col-sm-2 control-label">名称:</label>
                  <div class="col-sm-10">
                      <input type="text" name="bookName" class="form-control" placeholder="请输入图书名称">
                      <label class="error" style="color: #ff0000;display: none;">*请输入合法的图书名称</label>
                  </div>
              </div>
              <div class="form-group">
                    <label  class="col-sm-2 control-label">编号:</label>
                    <div class="col-sm-10">
                        <input type="text" name="bookCode" class="form-control" placeholder="请输入8位数的图书编号">
                        <label class="error" style="color: #ff0000;display: none;">*请输入合法的图书编号</label>
                    </div>
                </div><div class="form-group">
                    <label  class="col-sm-2 control-label">数量:</label>
                    <div class="col-sm-10">
                        <input type="text" name="bookStock" class="form-control" placeholder="请输入图书数量">
                        <label class="error" style="color: #ff0000;display: none;">*请输入合法图书数量</label>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">类型:</label>
                    <div class="col-sm-10">
                        <select name="bookType">
                            <option></option>
                            <option>历史</option>
                            <option>心理学</option>
                            <option>政治军事</option>
                            <option>国学古籍</option>
                            <option>哲学宗教</option>
                            <option>社会科学</option>
                            <option>文化</option>
                            <option>法律</option>
                            <option>其他</option>
                        </select>
                        <label class="error" style="color: #ff0000;display: none;">*请选择图书类型</label>
                    </div>

                </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">作者:</label>
                  <div class="col-sm-10">
                      <input type="text"name="author" class="form-control" placeholder="请输入作者名称">
                      <label class="error" style="color: #ff0000;display: none;">*请输入合法的作者名称</label>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">简介:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="bookInfo" rows="2"  placeholder="请输入图书简介"></textarea>
                      <label class="error" style="color: #ff0000;display: none;">*请输入合法的图书简介</label>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-default">添加</button>
                      <button type="reset" class="btn btn-default">重置</button>
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
    <script>
        function post(obj) {
            var postData = $(obj).serialize();
            $.post('check.php', {postData:postData}, function (data) {
                if (data.code) {
                    if (data.sign == 'bookInfo') {
                        $("textarea[name="+ data.sign +"]").siblings('.error').show();
                    }else if (data.sign == 'bookType') {
                        $("select[name="+ data.sign +"]").siblings('.error').show();
                    }else {
                        $("input[name="+ data.sign +"]").siblings('.error').show();
                    }
                }else {
                    alert('添加成功');
                    window.location.replace("index.php");
                }
            }, 'json');
            return false;
        }
    </script>
</body>

</html>
