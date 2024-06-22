<?php
    include 'sql.php';
    $link = connect_databases();
    $data_arr = select_table($link,"select * from author");
    if(!$link)
        exit('数据库连接失败:'.mysqli_connect_error());
    mysqli_close($link);
    include "add.html";
?>