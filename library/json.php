<?php
require_once './pub/db.func.php';
require_once 'auth.php';
///请求数据库，响应对应页码的数据
//PDO

//接收请求数据
$pageNo = $_GET['page'] ?? 1;
$pageSize = 5;

//接收查询参数

@$keywords = $_GET['keywords'] ?? '';



$data = [];
try {
    //连接数据库
    $pdo = connect();


    //请求mysql 查询记录总数
//    $sql = "SELECT count(*) AS aggregate FROM book";
    $sql = "SELECT count(*) AS aggregate FROM book ";
    if (strlen($keywords) > 0) {
        $sql .= "WHERE bookName like ?";
    }
    $stmt=$pdo->prepare($sql);
    if (strlen($keywords) > 0) {
        $stmt->bindValue(1,'%'.$keywords.'%',PDO::PARAM_STR);
    }
    $stmt->execute();
    $total = $stmt->fetch(PDO::FETCH_ASSOC)['aggregate'];

    //计算最大页码，设置页码边界
    $minPage = 1;
    $maxPage = ceil($total / $pageSize);
    $pageNo = max($pageNo,$minPage);
    $pageNo = min($pageNo,$maxPage);
    $offset = ($pageNo - 1) * $pageSize;

    $sql = "SELECT id,bookName,bookCode,bookStock,bookType,author,bookInfo,created_at
            FROM book ";
    if (strlen($keywords) > 0) {
        $sql .= "WHERE bookName LIKE ?";
    }
    $sql .= "ORDER BY created_at DESC LIMIT ?,?";
    //创建预编译对象
    $stmt = $pdo->prepare($sql);
    if (strlen($keywords) > 0) {
        $stmt->bindValue(1,'%' .$keywords. '%',PDO::PARAM_STR);
        $stmt->bindValue(2,(int)$offset,PDO::PARAM_INT);
        $stmt->bindValue(3,(int)$pageSize,PDO::PARAM_INT);
    }else {
        $stmt->bindValue(1,(int)$offset,PDO::PARAM_INT);
        $stmt->bindValue(2,(int)$pageSize,PDO::PARAM_INT);
    }
    //执行代码
    $stmt->execute();
    //获取所有结果
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $data = [
        'code' => 1,
        'msg' => 'ok',
        'rows' => $result,
        'total_records' => (int)$total,
        'page_number' => (int)$pageNo,
        'page_size' => (int)$pageSize,
        'page_total' => (int)$maxPage
    ];
}catch (Exception $e) {
    $data = [
        'code' => 0,
        'msg' => $e->getMessage(),
        'rows' => [],
        'total_records' => 0,
        'page_number' => 0,
        'page_size' => (int)$pageSize,
        'page_total' => 0
    ];
}

header('Content-type:application/json');
//将数组转变为json
echo json_encode($data);