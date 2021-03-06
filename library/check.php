<?php

require_once  './pub/db.func.php';
require_once 'auth.php';
parse_str($_POST['postData'],$post);

//判断图书名称是否合法
if (!preg_match('/[\da-zA-Z\x80-\xff]/', $post['bookName'])) {
    echo json_encode(['code' =>1, 'sign' => 'bookName']);
    return;
}
//判断图书编号是否合法
if (!preg_match('/\d{8}/', $post['bookCode'])) {
    echo json_encode(['code' =>1, 'sign' => 'bookCode']);
    return;
}
//判断图书数量是否合法
if (!preg_match('/\d/', $post['bookStock'])) {
    echo json_encode(['code' =>1, 'sign' => 'bookStock']);
    return;
}
if (empty($post['bookType'])) {
    echo json_encode(['code' =>1, 'sign' => 'bookType']);
    return;
}
//判断作者名称是否合法
if (!preg_match('/[\x80-\xff]{6,15}/', $post['author'])) {
    echo json_encode(['code' =>1, 'sign' => 'author']);
    return;
}
//判断图书简介是否合法
if (!preg_match('/[\x80-\xff]{30,300}/', $post['bookInfo'])) {
    echo json_encode(['code' =>1, 'sign' => 'bookInfo']);
    return;
}

$bookName = $post['bookName'];
$bookCode = $post['bookCode'];
$bookStock = $post['bookStock'];
$bookType = $post['bookType'];
$author = $post['author'];
$bookInfo = $post['bookInfo'];
$created_at = date('Y-m-d H:i:s');


$sql = "INSERT INTO book(bookName,bookCode,bookStock,bookType,author,bookInfo,created_at)
        VALUES('$bookName','$bookCode','$bookStock','$bookType','$author','$bookInfo','$created_at')";
implement($sql);
echo json_encode(['code' => 0]);


