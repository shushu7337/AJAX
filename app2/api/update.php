<?php
//處理更新資料的請求
include_once "base.php";

$db=new DB("students");
if(!empty($_POST)){
    //////如同insert的部分，但可以省略，直接讓他存入即可，但要給予id 
    echo $db->save($_POST);
}

?>