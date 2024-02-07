<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// 引入数据库配置文件
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['productsFile'])) {
    // 读取文件内容
    $jsonFile = $_FILES['productsFile']['tmp_name'];
    $jsonData = file_get_contents($jsonFile);
    $products = json_decode($jsonData, true);

    // 准备批量插入的SQL语句
    $sql = "INSERT INTO Products (name, category, price, image, info) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // 遍历商品数据，绑定参数，并执行SQL语句
    foreach ($products as $product) {
        $stmt->bind_param("ssdss", $product['name'], $product['category'], $product['price'], $product['image'], $product['info']);
        $stmt->execute();
    }

    // 检查是否成功执行
    if ($stmt->affected_rows > 0) {
        header('Content-Type: application/json');
        echo json_encode(['message' => '商品批量上传成功']);
    } else {
        echo json_encode(['message' => '商品上传失败，请检查数据格式是否正确。']);
    }
    
    // 关闭语句
    $stmt->close();
} else {
    echo json_encode(['message' => '无效的请求']);
}

// 不需要在这里关闭数据库连接，
// 因为db_config.php中创建的连接在脚本执行完毕后会自动关闭
?>
