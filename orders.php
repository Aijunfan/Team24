<?php
include 'init.php';
include 'header.php';
include 'db_config.php'; // 引入数据库配置文件
// 假设$user_id是当前登录用户的ID
$user_id = $_SESSION['user_id'];

// 查询当前用户的所有订单
$ordersSql = "SELECT * FROM orders WHERE UserID = ? ORDER BY created_at DESC";
$ordersStmt = $conn->prepare($ordersSql);
$ordersStmt->bind_param("i", $user_id);
$ordersStmt->execute();
$ordersResult = $ordersStmt->get_result();

$orders = [];
while ($order = $ordersResult->fetch_assoc()) {
    $orders[] = $order;
}

// 如果指定了订单ID，则查询该订单的详细信息及订单项
$orderDetail = [];
$orderItems = [];
if (isset($_GET['order_id']) && !empty($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // 查询选定订单的详细信息
    $orderDetailSql = "SELECT * FROM orders WHERE order_id = ? AND UserID = ?";
    $orderStmt = $conn->prepare($orderDetailSql);
    $orderStmt->bind_param("ii", $order_id, $user_id);
    $orderStmt->execute();
    $orderDetailResult = $orderStmt->get_result();
    $orderDetail = $orderDetailResult->fetch_assoc();

    // 查询选定订单的所有订单项
    $orderItemsSql = "SELECT * FROM order_items WHERE order_id = ?";
    $itemsStmt = $conn->prepare($orderItemsSql);
    $itemsStmt->bind_param("i", $order_id);
    $itemsStmt->execute();
    $itemsResult = $itemsStmt->get_result();

    while ($item = $itemsResult->fetch_assoc()) {
        $orderItems[] = $item;
    }
    // 初始化物品总价格为0  
    $totalItemsPrice = 0;
    $shippingFee = 0;
    if (!empty($orderDetail)) {
         // 遍历所有订单项以累加价格
        foreach ($orderItems as $item) {
            $totalItemsPrice += $item['price'] * $item['quantity']; // 假设$item['price']是单价，$item['quantity']是数量
            $shippingFee = $orderDetail['total_price'] - $totalItemsPrice;

        }
    }
   

    // 计算运费：订单总价减去所有物品的总价
    $itemsStmt->close();
    $orderStmt->close();
}

$ordersStmt->close();
$conn->close();
?>


<div class="container mx-auto px-4 py-8">
    <div class="mb-4">
        <h1 class="text-2xl font-semibold">My Orders</h1>
    </div>
    <div class="flex max-h-[600px]">
        <div class="w-96 flex-none bg-white shadow-md overflow-auto mr-4 ">
            <ul class="divide-y divide-gray-200">
                <?php foreach ($orders as $order): ?>
                    <li>
                        <a href="?order_id=<?php echo $order['order_id']; ?>"
                            class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="py-4 px-4 flex items-center">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        Order #
                                        <?php echo $order['order_id']; ?>
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Placed on
                                        <?php echo date("F j, Y", strtotime($order['created_at'])); ?>
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-right text-gray-900">
                                        $
                                        <?php echo number_format($order['total_price'], 2); ?>
                                    </p>
                                    <p class="text-xs text-right text-gray-500">
                                        Status:
                                        <span class="<?php echo $order['status'] == 'cancel' ? 'text-red-500' : 'text-green-500'; ?>">
                                            <?php echo $order['status']; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Order Details -->
        <?php if (!empty($orderDetail)): ?>
            <div class="flex-grow bg-white shadow overflow-hidden sm:rounded-lg ">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Order #
                        <?php echo $orderDetail['order_id']; ?>
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Placed on
                        <?php echo date("F j, Y", strtotime($orderDetail['created_at'])); ?>
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                      <!-- Assuming 'shipping_address' and 'payment_method' are available in $orderDetail -->
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t">
                            <dt class="text-sm font-medium text-gray-900">
                                Shipping Address
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <?php echo htmlspecialchars($orderDetail['shipping_address']); ?>
                            </dd>
                        </div>  

                        <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t">
                            <dt class="text-sm font-medium text-gray-900">
                                Products
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 overflow-auto  max-h-24">
                                <?php foreach ($orderItems as $item): ?>
                                    <p>
                                        <a class="hover:font-medium" href="./detail.php?id=<?php echo htmlspecialchars($item['product_id']); ?>"><?php echo htmlspecialchars($item['name']); ?> (Size:
                                        <?php echo htmlspecialchars($item['size']); ?>) x
                                        <?php echo $item['quantity']; ?> - $
                                        <?php echo number_format($item['price'], 2); ?></a>
                                    </p>
                                <?php endforeach; ?>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t">
                            <dt class="text-sm font-medium text-gray-900">
                                Shipping Fee
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                $ <?php echo htmlspecialchars($shippingFee); ?>
                            </dd>
                        </div> 
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-t">
                            <dt class="text-sm font-medium text-gray-500">
                                Total Price
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                $
                                <?php echo number_format($orderDetail['total_price'], 2); ?>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- The details view should be similar to the earlier example, iterating through $orderItems to display each item -->
        <?php endif; ?>
    </div>
</div>
<?php include 'footer.php'; ?>