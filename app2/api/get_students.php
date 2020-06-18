<?php
include "base.php";

//前端採用get的方式送出請求及參數，因此使用$_GET來接收資料
$class=$_GET['class'];
$db=new DB("students");

//建立查詢語法來取得班級學生的資料
$students=$db->q("select id,name,class_num,dept,nat_id from students where substring(`class_num`,1,3)='$class'");

//用回圈列出所有符合條件的學生並加上html標籤
foreach($students as $stu){
    // 新增編輯與刪除功能
    echo "<div class='stu'>".$stu['name'];
    echo    "<button onclick='getUpdateForm(".$stu['id'].")'>編輯</button>";
    echo    "<button onclick='del(".$stu['id'].")''>刪除</button>";
    
    echo "</div>";
}


?> 