<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/secrets.php'; // 确保这里正确引用了包含您Stripe Secret Key的文件

\Stripe\Stripe::setApiKey($stripeSecretKey);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// 从客户端获取购物车数据
$jsonData = file_get_contents('php://input');
$cartItems = json_decode($jsonData, true);

if (!$cartItems) {
    echo json_encode(['error' => 'Invalid cart data.']);
    exit;
}

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

    // 返回会话信息给客户端
    echo json_encode(['id' => $checkout_session->id]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}