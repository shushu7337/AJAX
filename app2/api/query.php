<?php
//處理查詢資料的請求
include_once "base.php";

//前端使用GET的方式來傳送請求，因此後端api使用$_GET來接收請求
$str=$_GET['str'];
$db=new DB("students");

//以like指令來進行模糊查詢的功能
$query=$db->all([]," where name like '%$str%'");

//利用迴圈來列出查詢到的資料並加上需要的html標籤或其它內容
// 不要多餘的空白或符號存在
$data=[];

foreach($query as $q){
    $data[]=[
        '_id' => $q['id'],
        '學號' => $q['uni_id'],
        '班級座號' => mb_substr($q['class_num'],3,2),
        '班級' => mb_substr($q['class_num'],0,3),
        '姓名' => $q['name'],
        '畢業國中' => mb_substr($q['grad_at'],0,mb_strlen($q['grad_at'])-2,'utf8'),
        '科別' => $q['dept']
    ];
}

echo json_encode($data);
?>