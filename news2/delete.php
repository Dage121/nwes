<?php
    include 'sql.php';
    // 连接数据库
    $conn = connect_databases();
    // 检查连接是否成功
    if (!$conn) {
        die("数据库连接失败: " . mysqli_connect_error());
    }
    // 检查是否有传递的新闻ID
    if (isset($_GET['id'])) {
        $newsId = $_GET['id'];
        // 调用删除函数
        if (delete_row($conn, $newsId)) {
            // 删除成功后，重定向到新闻列表页或其他页面
            header("Location: index.php");
            exit();
        } else {
            // 删除失败时的处理，可以根据实际情况进行调整
            echo "删除新闻失败";
        }
    } else {
        // 如果没有提供新闻ID，重定向到首页或其他页面
        header("Location: index.php");
        exit();
    }
    // 关闭数据库连接
    mysqli_close($conn);
?>