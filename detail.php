<?php
include 'init.php';
include 'header.php';
require 'db_config.php'; // 确保已包含数据库配置文件

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // 准备查询数据库的语句
    $stmt = $conn->prepare("SELECT * FROM Products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // 查询该商品的所有尺寸
        $sizeStmt = $conn->prepare("SELECT size FROM ProductSizes WHERE product_id = ?");
        $sizeStmt->bind_param("i", $product_id);
        $sizeStmt->execute();
        $sizeResult = $sizeStmt->get_result();

        $sizes = [];
        while ($sizeRow = $sizeResult->fetch_assoc()) {
            $sizes[] = $sizeRow['size'];
        }
        $sizeStmt->close();
        ?>
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                        src="<?php echo $product['image']; ?>">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">
                            <?php echo ucfirst($product["category"]) ?> Shoes
                        </h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                            <?php echo $product['name']; ?>
                        </h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <span class="text-gray-600 ml-3">4 Reviews</span>
                            </span>
                            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                </a>
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-5 h-5" viewBox="0 0 24 24">
                                        <path
                                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-5 h-5" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                        <p class="leading-relaxed">
                            <?php echo $product['info']; ?>
                        </p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                            <!-- <div class="flex">
                                <span class="mr-3">Color</span>
                                <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button
                                    class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button
                                    class="border-2 border-gray-300 ml-1 bg-indigo-500 rounded-full w-6 h-6 focus:outline-none"></button>
                            </div> -->
                            <div class="flex items-center">
                                <span class="mr-3">Size</span>
                                <div class="relative">
                                    <select
                                        class="size_select rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                        <?php foreach ($sizes as $size): ?>
                                            <option value="<?php echo htmlspecialchars($size); ?>">
                                                <?php echo htmlspecialchars($size); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span
                                        class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">$
                                <?php echo $product['price']; ?>
                            </span>
                            <button onclick="addToCart(<?php echo htmlspecialchars(json_encode($product)); ?>)"
                                id="modalOpenBtn"
                                class="transition-all duration-300 flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Add
                                to Bag</button>
                            <button
                                class=" transition-all duration-300 hover:bg-gray-200  hover:text-red-500 rounded-full w-10 h-10 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } else {
        echo "商品未找到。";
    }
} else {
    echo "商品ID未提供。";
}

include 'footer.php';
$stmt->close();
$conn->close();
?>

<script>
    // JavaScript to handle opening and closing of the modal
    const modal = document.getElementById('myModal');
    const modalContent = modal.querySelector('div');

    // document.getElementById('modalOpenBtn').addEventListener('click', function(event){

    // });

    document.getElementById('modalCloseBtn').addEventListener('click', function () {
        modalContent.style.opacity = '0';
        modal.classList.add('hidden');
        modalContent.classList.add('opacity-0');
    });

    // Adding an event listener to the whole document to close the modal if clicked outside of modalContent
    document.addEventListener('click', function (event) {
        // Check if the modal is not hidden
        if (!modal.classList.contains('hidden')) {
            // Check if the click target is not inside modalContent and the click is not the modalOpenBtn
            if (!modalContent.contains(event.target) && event.target.id !== 'modalOpenBtn') {
                modalContent.style.opacity = '0';
                modal.classList.add('hidden');
                modalContent.classList.add('opacity-0');
            }
        }
    });

    function addToCart(product) {
        const size = document.querySelector('.size_select').value
        product.id = product.product_id + '_' + size
        product.size = size
        let cart = [];
        if (localStorage.getItem('cart')) {
            cart = JSON.parse(localStorage.getItem('cart'));
        }

        // 检查产品是否已经在购物车中
        const existingProductIndex = cart.findIndex(item => item.id === product.id);
        if (existingProductIndex !== -1) {
            // 如果已经存在，则增加数量
            if (cart[existingProductIndex].quantity >= 9) {
                alert("You've reached the quantity limit for this item.")
                return
            } else {
                cart[existingProductIndex].quantity += 1;
            }

        } else {
            // 如果不存在，添加新产品到购物车
            product.quantity = 1; // 设置初始数量
            cart.push(product);
        }
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.style.opacity = '1';
            modalContent.classList.remove('opacity-0');
        }, 10); // Start the opacity transition slightly after the modal is shown
        event.stopPropagation(); // 防止事件冒泡到document
        let product_count = 0
        cart.forEach((item) => {
            product_count += item.quantity
        })
        document.querySelector('.bag_div').innerHTML = `<div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-900 -mt-1">Added to Bag</h2>
        </div>
        <div class="flex justify-start items-center mt-4">
            <img class="h-20 w-20 object-cover" src="${product.image}"
            alt="Nike Dunk Low">
            <div class="ml-4">
            <p class="text-sm font-medium text-gray-900">${product.name}</p>
            <p class="text-sm text-gray-700">${product.category}</p>
            <p class="text-sm text-gray-700">Size ${size}</p>
            <p class="text-sm font-semibold text-gray-900">$${product.price}</p>
            </div>
        </div>
        <div class="flex justify-between items-center mt-4">
            <a href="cart.php"><button
                class="px-4 py-2 bg-white text-sm font-medium rounded border border-gray-300 hover:bg-gray-50">View Bag
                (${product_count})</button></a>
            <a href="cart.php"><button
                class="px-4 py-2 bg-black text-white text-sm font-medium rounded hover:bg-gray-900">Checkout</button></a>
        </div>`

        localStorage.setItem('cart', JSON.stringify(cart));
        const shit = JSON.parse(localStorage.getItem('cart'));
        console.log(shit);
        // 调用函数以更新数量
        updateCartQuantity();
    }

</script>