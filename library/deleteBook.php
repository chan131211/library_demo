<?php
require_once './pub/db.func.php';

//实现删除功能
// GET 获取id
//书写并执行sql语句

$id = (int)$_GET['id'];
$sql = "DELETE FROM book
        WHERE id = '$id'";
$result = implement($sql);
if (!$result) {

}
header('location:index.php');