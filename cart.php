<?php
ob_start(); // Start buffering output
include 'init.php';
include 'header.php';

require 'db_config.php'; // 引入数据库配置文件
// 检查用户是否登录
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
$userId = $_SESSION['user_id'];
// 查询用户地址信息
$addressSql = "SELECT * FROM addresses WHERE UserID = ? ORDER BY is_default DESC, address_id ASC";
$addressStmt = $conn->prepare($addressSql);
$addressStmt->bind_param("i", $userId);
$addressStmt->execute();
$addressResult = $addressStmt->get_result();

// 创建一个数组来存储所有地址
$addresses = [];
// 使用循环来获取所有行
while ($row = $addressResult->fetch_assoc()) {
    $addresses[] = $row;
}
// 关闭语句
$addressStmt->close();
?>
<div class="container mx-auto mt-10 border-1 rounded">
    <div class="flex flex-col md:flex-row  my-10">
        <div class="md:w-3/4 bg-white px-5 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
            </div>
            <!-- <div class="flex mt-10 mb-3">
        <h3 class="font-semibold text-gray-600 text-xs uppercase w-full md:w-2/5">Product Details</h3>
      </div> -->

            <!-- Product Line Item -->
            <div id="cartContainer">
                <div class="flex flex-col md:flex-row items-center -mx-8 px-6 py-5 border-b">
                    <div>
                        <h1 class="font-bold mb-4">Bag</h1>
                        <p>There are no items in your bag.</p>
                    </div>
                    <!-- <div class="flex w-full md:w-2/5">
                        <div class="w-32">
                            <img class="h-32" src="./image/basketball/basketball (6).png" alt="product image">
                        </div>
                        <div class="flex flex-col justify-between ml-4 flex-grow">
                            <span class="font-bold text-sm">Basic Tee</span>
                            <span class="text-red-500 text-xs">Sienna | Large</span>
                            <span class="text-green-500 text-xs">In stock</span>
                        </div>
                    </div>
                    <div id="selectDiv" class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0">
                        <select class="border text-left rounded w-full md:w-20 px-4">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <span class="text-center w-full md:w-1/5 font-semibold text-sm mt-4 md:mt-0">$32.00</span>
                    <div class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0 space-x-3">
                        <button class="text-gray-500 hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div> -->
                </div>
            </div>

            <!-- Repeat for other products -->

            <!-- ... other product line items ... -->

        </div>

        <!-- Order Summary -->
        <div class="w-full md:w-1/4 px-8 py-10 bg-gray-100 rounded">
            <div class="sticky top-20 ">
                <h1 class="order-summary font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Subtotal</span>
                    <span class="subtotal font-semibold text-sm">$99.00</span>
                </div>
                <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
                    <select class="shipping-options block p-2 text-gray-600 w-full text-sm">
                        <option value="5">Standard shipping - $5.00</option>
                        <option value="10">Fast shipping - $10.00</option>
                    </select>
                </div>
                <div class="mt-4">
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping address</label>
                    <select class="shipping-address block p-2 text-gray-600 w-full text-sm">
                        <?php foreach ($addresses as $address): ?>
                            <option value="<?php echo $address['address_id']; ?>">
                                <?php
                                echo htmlspecialchars($address['first_name'] . ' ' . $address['last_name'] . ', ' . $address['line1'] . ', ' . $address['line2'] . ', ' . $address['city'] . ', ' . $address['province'] . ', ' . $address['country'] . ' - ' . $address['phone_number']);
                                if ($address['is_default']) {
                                    echo " (Default)";
                                }
                                ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span class="total_cost">$0</span>
                    </div>
                    <button
                        class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full rounded"
                        onclick="checkout()">Checkout</button>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include 'footer.php';
ob_end_flush(); // Send output buffer and turn off buffering
?>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("pk_test_51OijO1B5KNrksgu9geGURdZZWoDRNMxNOAjtPYpTQcaVQ1eDXlaQodzjJnHE9xXVoIGcDgZadk3JrQGI5LLvZyJl005NCNI1rh");
    function checkout() {
        const cartData = localStorage.getItem("cart");
        let address = getAddress()
        if (!address) {
            alert("Please select a shipping address.");
            window.location.href = "./user_center.php"
            return
        }
        let cartItems = JSON.parse(cartData) || [];
        if (!cartItems.length) {
            alert("You have nothing in your bag!")
            return
        }
        const shippingOptions = getShippingOption()
        // 构建提交的数据，包括购物车数据和地址ID
        let dataToSubmit = JSON.stringify({
            cartItems: cartItems,
            address: address, // 添加地址ID
            shippingOptions: shippingOptions
        });
        document.querySelector("#overlay").classList.remove("hidden")

        fetch('checkout.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: dataToSubmit   // 直接使用从localStorage获取的购物车数据
        })
            .then(response => response.json())
            .then(session => {
                if (session.id) {
                    console.log('cartData', cartData)
                    console.log('session', session)
                    // 使用会话ID重定向到Stripe Checkout
                    stripe.redirectToCheckout({ sessionId: session.id })
                        .then(function (result) {
                            // 如果redirectToCheckout失败，可以在这里处理结果（例如，显示错误消息）
                            if (result.error) {
                                alert(result.error.message);
                            }
                        });
                } else {
                    // 处理错误（例如显示错误消息）
                    console.error("Failed to create checkout session.", session.error ? session.error : 'Unknown error.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function getAddress() {
        let address = document.querySelector('.shipping-address').innerText
        if (!address) {
            return false
        }
        return address
    }
    function getShippingOption() {
        let amount = document.querySelector('.shipping-options').value * 100
        let display_name = 'Standard shipping'
        let dayValue1 = 5
        let dayValue2 = 7
        if (amount == 1000) {
            display_name = 'Fast shipping'
            dayValue1 = 2
            dayValue2 = 4
        }
        const shippingOptions = [
            {
                shipping_rate_data: {
                    type: 'fixed_amount',
                    fixed_amount: {
                        amount: amount, // 运费，单位为Stripe的最小货币单位，比如美分
                        currency: 'usd',
                    },
                    display_name: display_name,
                    // Delivers in 5-7 business days
                    delivery_estimate: {
                        minimum: {
                            unit: 'business_day',
                            value: 5,
                        },
                        maximum: {
                            unit: 'business_day',
                            value: 7,
                        },
                    },
                }
            },
        ];
        return shippingOptions
    }


</script>