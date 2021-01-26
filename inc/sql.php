<?php
    header("Content-type:text/html;charset=utf-8");
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "s_t_u201814860";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,'utf8'); //设定字符集
    
    if(!$conn) die("连接失败: ".mysqli_connect_error());
?>