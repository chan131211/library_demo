<?php
require_once './pub/db.func.php';
require_once 'auth.php';

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>图书管理系统</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/one.css" rel="stylesheet">
<!--    <link href="style/css/site.min.css" rel="stylesheet">-->
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
            <a class="navbar-brand hidden-sm" href="index.php">小白网,欢迎您！</a>
        </div>
    </div>
</div>
<!--导航栏结束-->
<!--巨幕-->
<div class="jumbotron masthead">
    <div class="container">
        <h1>图书管理系统</h1>
        <h2>实现图书的增删改查功能</h2>
        <p class="masthead-button-links">
            <div class="form-group">
                <a href="add.php"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  添加图书  </button></a>
                <a href="del.php"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  退出  </button></a>
            </div>
        </p>
    </div>
</div>
<!--巨幕结束-->
<div class="container projects">
    <div class="projects-header page-header">
        <h2>图书展示</h2>
        <p>将图书信息展示在页面中</p>
    </div>
    <form class="form-inline" onsubmit="return false;">
        <div class="form-group" style="width:100%;margin-bottom: 20px;">
            <div class="form-button" style="float:right">
                <input type="search" class="form-control keywords" id="exampleInputName2" placeholder="输入搜索的图书名称" name="" value="">
                <button class="btn btn-default searchBtn" type="submit">搜索</button>
            </div>
        </div>
    </form>
    <!--信息展示-->
    <div class="row" style="background-color: lightgray">
        <table class="table table-striped table-dark" style="margin-bottom: 0px" >
            <thead style="background-color: rgba(23,23,23,0.58)">
            <tr>
                <th scope="col">id</th>
                <th scope="col">书名</th>
                <th scope="col">编号</th>
                <th scope="col">类型</th>
                <th scope="col">数量</th>
                <th scope="col">作者</th>
                <th scope="col">简介</th>
                <th scope="col">添加时间</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
    <!--Pagination-->
    <nav aria-label="Page navigation example">
        <ul class="pagination"></ul>
    </nav>
</div>
<footer class="footer  container">
    <div class="row footer-bottom">
        <ul class="list-inline text-center">
            <h4>小白网</h4>
        </ul>
    </div>
</footer>

</body>
<script src="style/js/jquery-3.4.1.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
<script src="./style/js/Ajax.js"></script>
<script>
    let pageNo = 1 ;
    let kws = '';
    let searchBtn = document.getElementsByClassName('searchBtn')[0];
    searchBtn.onclick = function() {
        let search = document.getElementsByClassName('keywords')[0];
        let keywords = search.value;
        requestData(pageNo,keywords);
        kws = keywords;
    }

    let requestPage = function (page) {
        let search = document.getElementsByClassName('keywords')[0];
        let keywords = search.value;
        requestData(page,keywords);
        pageNo = page;

    };
    // 重复请求 requestData
    let requestData = function (page_number,keywords) {
        let pagination = document.getElementsByClassName("pagination")[0];
        let tbody = document.getElementsByTagName("tbody")[0];
        ajax.get('json.php', {"page" : page_number,"keywords": keywords}, function (res) {
            tbody.innerHTML = '<tr><td colspan="9" style="text-align: center">加载中...</td></tr>';
            //遍历结果
            let trs = '';
            if (res.code == 1) {
                res.rows.forEach(function (item) {
                    let tr = '<tr><th scope="row">' + item.id + '</th>' +
                        '<td>' + '<a href="detail.php?id='+ item.id +'">'+  item.bookName +'</a>' + '</td>' +
                        '<td>' + item.bookCode + '</td>' +
                        '<td>' + item.bookType + '</td>' +
                        '<td>' + item.bookStock + '</td>' +
                        '<td>' + item.author + '</td>' +
                        '<td>' + item.bookInfo.substring(0, 7) + '...' + '</td>' +
                        '<td>' + item.created_at + '</td>' +
                        '<td>'+ '<a href="editable.php?id='+ item.id +'">编辑</a>' + ' | ' + '<a href="deleteBook.php?id='+ item.id +' ">删除</a>' + '</td>' +
                         '</tr>';
                    trs += tr;
                });
                tbody.innerHTML = trs;

                //加载页码导航
                //pervious 并判断是否为第一页
                let previousBtn = '';
                if (res.page_number == 1) {
                    previousBtn = '<li class="page-item disabled"><a class="page-link" href="javascript:requestPage(' + (res.page_number - 1) + ')">Previous</a></li>';
                } else {
                    previousBtn = '<li class="page-item "><a class="page-link" href="javascript:requestPage(' + (res.page_number - 1) + ')">Previous</a></li>';
                }
                //next
                let nextBtn = '';
                if (res.page_total == res.page_number) {
                    nextBtn = '<li class="page-item disabled"><a class="page-link" href="javascript:requestPage(' + (res.page_number + 1) + ')">Next</a></li>';
                } else {
                    nextBtn = '<li class="page-item"><a class="page-link" href="javascript:requestPage(' + (res.page_number + 1) + ')">Next</a></li>';
                }
                let pages = previousBtn;
                for (let page = 1; page <= res.page_total; page++) {
                    let active = '';
                    if (page == res.page_number) {
                        active = 'active';
                    }
                    pages += '<li class="page-item ' + active + '"><a class="page-link" href="javascript:requestPage(' + page + ')">' + page + '</a></li>';
                }
                pages += nextBtn;
                pagination.innerHTML = pages;
            }
        },'json');
    };
    requestData(1,kws);
</script>
</html>