<?php
session_start();
require 'db_config.php'; // 引入数据库配置文件

// 检查是否登录
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// 获取用户ID
$userId = $_SESSION['user_id'];

// 如果表单被提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // 验证当前密码
    $sql = "SELECT PasswordHash FROM Users WHERE UserID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
      }
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        
        if (password_verify($current_password, $hashed_password)) {
            // 验证新密码和确认新密码是否匹配
            if ($new_password == $confirm_new_password) {
                // 更新密码
                $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $updateSql = "UPDATE Users SET PasswordHash = ? WHERE UserID = ?"; // 假设字段名是PasswordHash
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("si", $new_hashed_password, $userId);
                
                if ($updateStmt->execute()) {
                    // 密码更新成功，重定向或显示成功消息
                    $_SESSION["success_message"] = "The password was updated successfully!";
                    header("location: user_center.php?password=changed");
                } else {
                    echo "Something went wrong. Please try again later.";
                }
                $updateStmt->close();
            } else {
                echo "New password and confirm new password do not match.";
            }
        } else {
            echo "The current password is not correct.";
        }
    } else {
        echo "An error occurred. Please try again later.";
    }
    $stmt->close();
}
$conn->close();
?>
