<?php

function connect() {
    //连接数据库
    $dsn = "mysql:host=localhost;dbname=library";
    $pdo = new PDO($dsn, 'root', 'root');
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

function query($sql) {
    $pdo = connect();
    //执行SQL语句
    $stmt = $pdo->query($sql);
    //获取结果集
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //返回数组
    return $data;
}

function execute($sql) {
    $pdo = connect();
    //执行SQL语句
    $stmt = $pdo->exec($sql);
    //返回 true 或 false
    return $stmt;
}

