<?php
require_once __DIR__ . '/../vendor/autoload.php';
require 'db_config.php'; // 确保这里正确地包含了数据库连接配置
require_once __DIR__ . '/secrets.php'; // 包含您的Stripe Secret Key
// 设置Stripe API密钥
\Stripe\Stripe::setApiKey($stripeSecretKey);

// 获取前端传递的session_id
$sessionId = isset($_GET['session_id']) ? $_GET['session_id'] : '';

if (!empty($sessionId)) {
    try {
        // 使用Stripe API根据session_id获取Checkout会话详情
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        
        // 根据会话详情进行逻辑处理，这里以支付状态为例
        $paymentStatus = $session->payment_status;

        // 如果支付成功，更新数据库中的订单状态
        if ($paymentStatus === 'paid') {
            // 准备SQL语句
            $sql = "UPDATE orders SET status = 'paid' WHERE session_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $sessionId);
            $stmt->execute();

            // 检查是否有订单被更新
            if ($stmt->affected_rows > 0) {
                $response = ['paymentStatus' => 'paid', 'message' => 'Order status updated successfully.'];
            } else {
                $response = ['paymentStatus' => 'paid', 'message' => 'No order found or order already updated.'];
            }
            
            $stmt->close();
        } else {
            $response = ['paymentStatus' => $paymentStatus, 'message' => 'Payment not completed or failed.'];
        }

        // 返回信息给前端
        header('Content-Type: application/json');
        echo json_encode($response);
        
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
