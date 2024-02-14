<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/secrets.php'; // 包含您的Stripe Secret Key
require_once __DIR__ . '/db_config.php'; // 引入数据库配置

\Stripe\Stripe::setApiKey($stripeSecretKey);

session_start();

// 检查用户是否登录
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo json_encode(['error' => '用户未登录']);
    exit;
}

$userId = $_SESSION['user_id'];

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// 从客户端获取请求数据
$jsonData = file_get_contents('php://input');
$requestData = json_decode($jsonData, true);

if (!$requestData || !isset($requestData['cartItems'])) {
    echo json_encode(['error' => 'Invalid request data.']);
    exit;
}

$cartItems = $requestData['cartItems'];
$address = $requestData['address']; // 从请求中获取地址文本内容

// 构建line_items数组
$line_items = array_map(function ($item) {
    return [
        'price' => $item['stripe_price_id'],
        'quantity' => $item['quantity'],
    ];
}, $cartItems);

// 指定您的域名
$YOUR_DOMAIN = 'http://localhost:81/Team24';

try {
    // 创建Checkout会话
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => $line_items,
        'mode' => 'payment',
        'success_url' => $YOUR_DOMAIN . '/success.php?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => $YOUR_DOMAIN . '/cart.php',
    ]);
    $sessionId = $checkout_session->id; // 获取会话ID
    // 计算总价
    $totalPrice = array_reduce($cartItems, function ($carry, $item) {
        return $carry + ($item['price'] * $item['quantity']);
    }, 0);

    // 创建订单
    $orderSql = "INSERT INTO orders (UserID, total_price, status, shipping_address,session_id, created_at, updated_at) VALUES (?, ?, 'pending', ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($orderSql);
    $stmt->bind_param("idss", $userId, $totalPrice, $address, $sessionId);

    if ($stmt->execute()) {
        $orderId = $conn->insert_id;

        // 创建订单项
        foreach ($cartItems as $item) {
            $itemSql = "INSERT INTO order_items (order_id,name, product_id, quantity, price, size, created_at) VALUES (?, ?,?, ?, ?, ?, NOW())";
            $itemStmt = $conn->prepare($itemSql);
            $itemStmt->bind_param("isiids", $orderId, $item['name'],$item['product_id'], $item['quantity'], $item['price'], $item['size']);
            $itemStmt->execute();
            $itemStmt->close();
        }
    }
    $stmt->close();

    // 返回会话信息给客户端
    echo json_encode(['id' => $checkout_session->id]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn->close();
?>
