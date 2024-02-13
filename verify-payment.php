<?php
require_once __DIR__ . '/../vendor/autoload.php';

// 设置Stripe API密钥
\Stripe\Stripe::setApiKey('sk_test_51OijO1B5KNrksgu9EYiE46NgLQlBAdw1axDlNrzd08sQUWPZzTrxGzrwgFd94VCNnEA5i0wKCmd1HrEVLIIoYgAM00yemogmtZ');

// 获取前端传递的session_id
$sessionId = isset($_GET['session_id']) ? $_GET['session_id'] : '';

if (!empty($sessionId)) {
    try {
        // 使用Stripe API根据session_id获取Checkout会话详情
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        
        // 根据会话详情进行逻辑处理，这里以支付状态为例
        $paymentStatus = $session->payment_status;

        // 返回支付状态给前端
        header('Content-Type: application/json');
        echo json_encode([
            'paymentStatus' => $paymentStatus,
            // 可以添加更多需要返回的信息
        ]);
    } catch (\Exception $e) {
        // 处理错误
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // session_id参数缺失
    http_response_code(400);
    echo json_encode(['error' => 'session_id is required']);
}
?>
