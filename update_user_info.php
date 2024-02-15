<?php
include 'db_config.php'; // 引入数据库配置文件

// 检查用户是否已登录，如果没有，则重定向到登录页面
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// 假设用户ID存储在session中
$userId = $_SESSION['user_id'];

// 从表单获取新的电子邮件和电话号码
$newEmail = $_POST['Email'];
$newPhone = $_POST['Mobile'];

// 准备更新语句
$sql = "UPDATE Users SET Email = ?, Mobile = ? WHERE UserID = ?";
$stmt = $conn->prepare($sql);

// 绑定参数并执行
$stmt->bind_param("ssi", $newEmail, $newPhone, $userId);
if ($stmt->execute()) {
    // 可以在这里重定向用户回到个人中心或显示一个成功消息
    $_SESSION["success_message"] = "The userinfo was updated successfully!";
    header("location: user_center.php?update=success");
} else {
    echo "Error updating record: " . $conn->error;
}

$stmt->close();
$conn->close();
?>