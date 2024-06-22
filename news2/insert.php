<?php
    include 'sql.php';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $a_id = $_POST['news_author'];

        $link = connect_databases();
        if(!$link)
            exit('数据库连接失败:'.mysqli_connect_error());
        $date = time();
        $currenttime = date("Y-m-d H:i:s",$date);
        
        $sql = "insert into news values(NULL,"."'$title"."',"."'$content"."',"."'$a_id"."',"."'$date"."')";
        $res = insert_table($link,$sql);
        mysqli_close($link);
        if($res){
            header('refresh:2;url=index.php');
            echo "新闻".$title."新增成功！";
        }
        else{
            header('refresh:3;url=add.php');
            echo "新闻".$title."新增失败！";
        }
    }
?>