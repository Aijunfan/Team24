<?php
$host = 'php24-db-1'; // 或者 MySQL 服务器的 IP
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


<!-- CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    info TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ProductSizes (
    size_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    size VARCHAR(10) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
); -->