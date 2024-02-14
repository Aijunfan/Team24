<?php
// 引入数据库配置和验证用户登录等
require 'db_config.php';
session_start();

// 检查是否已登录
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// 获取POST请求中的地址ID
$address_id = $_POST['address_id'] ?? null;

// 进行删除操作
if($address_id) {
    // SQL 删除语句
    $sql = "DELETE FROM addresses WHERE address_id = ? AND UserID = ?";
    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $address_id, $_SESSION['user_id']);
        if($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Failed to delete address']);
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Failed to prepare SQL statement']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}

$conn->close();
?>