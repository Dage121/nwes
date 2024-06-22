<?php
    // 连接数据库
    function connect_databases(){
        return mysqli_connect('localhost','root','root','news');
    }
    // 查询表
    function select_table($link,$sql){
        $result = mysqli_query($link,$sql);
        $data = array();
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
                $data[] = $row;
        }
        return $data;
    }
    // 插入数据
    function insert_table($link,$sql){
        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "插入失败:".mysqli_error($link);
            return false;
        }else{
            echo "插入成功！";
            return true;
        }       
    }
    // 更新数据
    function update_table($link, $sql)
    {
        $result = mysqli_query($link, $sql);
        if (!$result) {
            echo "更新失败：".mysqli_error($link);
            return false;
        } else {
            echo "更新成功";
            return true;
        }
    }
    // 对 ID 进行重新排列 (确保ID是连续的)
    function reorder_ids($link) {
        // @new_id 表示 自定义变量
        $sql = "SET @new_id := 0; UPDATE news SET id = @new_id := @new_id + 1; ALTER TABLE news AUTO_INCREMENT = 1;";
        // mysqli_multi_query 会一次性执行 $query 中的所有查询语句，返回一个布尔值表示是否执行成功。如果执行成功，返回 true，否则返回 false。
        $result = mysqli_multi_query($link, $sql);
        return $result;
    }
    // 根据 ID 删除行
    function delete_row($link, $id){
        $id = mysqli_real_escape_string($link, $id);
        $sql = "DELETE FROM news WHERE id = $id";
        $result = mysqli_query($link, $sql);
    
        if ($result) {
            // 删除成功后，重新排序id
            reorder_ids($link);
        }
        return $result;
    }    
?>