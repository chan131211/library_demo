<?php
//require_once './pub/UploadImage.php';

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


echo json_encode(['code' => 0]);

//$upload = new \library\file\UploadImage('bookImage');
//$upload->setDestinationDir('./upload');
//$upload->setAllowMime(['image/jpeg', 'image/jpg', 'image/gif', 'image/png']);
//$upload->setAllowExt(['jpeg', 'jpg', 'gif', 'png']);
//$upload->setAllowSize(10*1024*1024);
//try {
//    $upload->setFileInfo();
//    $upload->checkError();
//    $upload->checkMime();
//    $upload->checkExt();
//    $upload->checkSize();
//    $upload->moveFile();
//
//}catch (Exception $e) {
//    echo $e->getMessage();
//}
//$data = (array)$upload;
//$image = $data['newFileDir'];



//array(6) {
//    ["bookName"]=>
//  string(3) "123"
//    ["bookCode"]=>
//  string(0) ""
//    ["bookStock"]=>
//  string(0) ""
//    ["bookType"]=>
//  string(6) "历史"
//    ["author"]=>
//  string(0) ""
//    ["bookInfo"]=>
//  string(0) ""
//}
