<?php

function connect() {
    //连接数据库
    $dsn = "mysql:host=localhost;dbname=library";
    $pdo = new PDO($dsn, 'root', 'root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //设置字符集
    $pdo->exec('set names utf8');
    return $pdo;
}

function queryOne($sql) {
    $pdo = connect();
    //执行SQL语句
    $stmt = $pdo->query($sql);
    //获取结果集
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //返回数组
    return $data;
}


function implement($sql) {
    $pdo = connect();
    //执行SQL语句
    $stmt = $pdo->exec($sql);
    //返回 true 或 false
    return $stmt;
}

