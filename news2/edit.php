<?php
    include 'sql.php';
    $id = $_GET['id'];
    $link = connect_databases();
    if(!$link)
        exit('数据库连接失败:'.mysqli_connect_error());
    $sql = "select n.*,a.name from news n left join author a on n.a_id = a.id";
    $data = select_table($link,$sql);
    $news = $data[$id - 1];
    include 'edit.html';
?>