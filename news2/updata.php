<?php
    include 'sql.php';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $link = connect_databases();
        if(!$link)
            exit('数据库连接失败:'.mysqli_connect_error());

        $sql = "UPDATE news SET title='$title',content='$content' WHERE id=$id";
        if(update_table($link,$sql)){
            header("Refresh:2;url=index.php?id=".$id);
            echo "更新成功";
            exit;
        }
    }
?>