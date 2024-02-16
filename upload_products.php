<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('html_errors', 0);
error_reporting(E_ALL);
// 如果你打算删除表中的所有数据并重置自增值：
// TRUNCATE TABLE Products;
// 如果你只想重置自增值而不删除数据：
// ALTER TABLE Products AUTO_INCREMENT = 1;


// 引入数据库配置和Stripe库
require_once 'db_config.php';
require_once __DIR__ . '/secrets.php'; // 包含您的Stripe Secret Key
require_once __DIR__ . '/../vendor/autoload.php';

// 设置Stripe API密钥
\Stripe\Stripe::setApiKey($stripeSecretKey);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['productsFile'])) {
    $jsonFile = $_FILES['productsFile']['tmp_name'];
    $jsonData = file_get_contents($jsonFile);
    $products = json_decode($jsonData, true);

    // 将解析结果记录到PHP错误日志
    // error_log(print_r($products, true));
    foreach ($products as $product) {
        // 在Stripe创建商品
        $stripeProduct = \Stripe\Product::create([
            'name' => $product['name'],
            'description' => $product['info'],
        ]);

        // 为商品创建价格
        $stripePrice = \Stripe\Price::create([
            'product' => $stripeProduct->id,
            'unit_amount' => $product['price'] * 100, // 假设价格以美元存储，转换为分
            'currency' => 'usd',
        ]);

        // 准备批量插入的SQL语句，包括stripe_price_id
        $sql = "INSERT INTO Products (name, category, price, image, info, stripe_price_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // 绑定参数，并执行SQL语句
        $stmt->bind_param("ssdsss", $product['name'], $product['category'], $product['price'], $product['image'], $product['info'], $stripePrice->id);
        $stmt->execute();

        // 获取刚刚插入的产品ID
        $productId = $stmt->insert_id;

        // 插入尺码信息到ProductSizes表
        $sizeSql = "INSERT INTO ProductSizes (product_id, size) VALUES (?, ?)";
        $sizeStmt = $conn->prepare($sizeSql);

        // 假设尺码从40到45
        for ($size = 40; $size <= 45; $size++) {
            $sizeStmt->bind_param("ii", $productId, $size);
            $sizeStmt->execute();
        }
        $operationSuccess = true; // 您可能需要根据实际逻辑来设置这个变量
    }
    // echo json_encod
    if ($operationSuccess) {
        // 如果所有操作都成功执行，则返回成功的消息
        echo json_encode(['message' => '商品批量上传成功']);
    } else {
        // 如果有任何操作失败，则返回失败的消息
        echo json_encode(['message' => '商品上传失败，请检查数据格式是否正确。']);
    }
    $sizeStmt->close();
    $stmt->close();
} else {
    echo json_encode(['message' => '无效的请求']);
}
?>