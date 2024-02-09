<?php
$host = 'php_aijun_24-db-1'; // Aijun Fan's Localhost db,please change to your own one
$db_user = 'app1';
$db_password = 'password';
$db_name = 'app1';

// 创建数据库连接
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>