<?php
require_once  './pub/db.func.php';
require_once 'auth.php';


parse_str($_POST['postData'],$post);

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

//获取表单数据
$id = $post['id'];
$bookName = $post['bookName'];
$bookCode = $post['bookCode'];
$bookStock = $post['bookStock'];
$bookType = $post['bookType'];
$author = $post['author'];
$bookInfo = $post['bookInfo'];


$sql = "UPDATE book SET bookName = '$bookName',bookCode = '$bookCode',bookStock = '$bookStock',bookType = '$bookType',
        author = '$author',bookInfo = '$bookInfo'
        WHERE id = '$id'";

implement($sql);
echo json_encode(['code' => 0]);