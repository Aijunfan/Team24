<?php
require_once 'db_config.php'; // 引入数据库配置

// SQL 语句创建 users 表
$sql_users = "CREATE TABLE IF NOT EXISTS users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) UNIQUE NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// SQL 语句创建 login_logs 表
$sql_login_logs = "CREATE TABLE IF NOT EXISTS login_logs (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  login_time DATETIME DEFAULT CURRENT_TIMESTAMP,
  login_ip VARCHAR(255),
  login_device VARCHAR(255),
  login_result BOOLEAN,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
)";

// 执行 SQL 语句
if ($conn->query($sql_users) === TRUE) {
    echo "Table 'users' created successfully.<br>";
} else {
    echo "Error creating table 'users': " . $conn->error . "<br>";
}

if ($conn->query($sql_login_logs) === TRUE) {
    echo "Table 'login_logs' created successfully.<br>";
} else {
    echo "Error creating table 'login_logs': " . $conn->error . "<br>";
}

// 关闭数据库连接
$conn->close();
?>
