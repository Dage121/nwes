<?php
    include 'sql.php';

    $link = connect_databases();
    if(!$link)
        exit('数据库连接失败:'.mysqli_connect_error());
    $news = select_table($link,"select n.*,a.name from news n left join author a on n.a_id = a.id");
    mysqli_close($link);
    include 'index.html';
?>