function uploadProducts(id) {
    const input = document.getElementById(id);
    if (!input.files[0]) {
        alert('请先选择一个文件。');
        return;
    }
    const file = input.files[0];
    const formData = new FormData();
    formData.append(id, file);
    console.log('formData', formData);
    fetch('upload_products.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log(response.headers.get("Content-Type")); // 检查Content-Type是否正确
        return response.json(); // 应该不会抛出错误，因为响应是有效的JSON
    })
    .then(data => {
        console.log(data); // 确认解析后的数据
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
        alert("发生错误：" + error.toString());
    });
}

function toggleOverlay(){
    document.querySelector("#overlay").classList.toggle("hidden")
}
// 示例函数：计算购物车中所有物品的总数量并更新页面
function updateCartQuantity() {
    // 从localStorage读取购物车数据
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    // 计算总数量
    const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);

    // 更新页面上的购物车数量显示
    const cartQuantityElement = document.querySelector('#nav-cart [data-var="jewel"]');
    if (cartQuantityElement) {
        cartQuantityElement.textContent = totalQuantity;

        // 同时更新带有 "Bag Items:" 的属性，以确保辅助技术（如屏幕阅读器）也能获取更新后的数量
        const cartLinkElement = document.querySelector('#nav-cart [data-var="anchor"]');
        if (cartLinkElement) {
            const updatedAriaLabel = `Bag Items: ${totalQuantity}`;
            cartLinkElement.setAttribute('title', updatedAriaLabel);
            cartLinkElement.setAttribute('aria-label', updatedAriaLabel);
        }
    }
}


document.addEventListener('DOMContentLoaded', () => {
    const cartContainer = document.querySelector('#cartContainer'); // 定位到购物车容器
    if(!cartContainer){
        return
    }
    const cartData = JSON.parse(localStorage.getItem('cart')) || [];
    if (cartData.length) {
        // 清除现有的占位商品项
        cartContainer.innerHTML = '';

        // 动态添加购物车商品
        cartData.forEach((item) => {
            const productElement = document.createElement('div');
            productElement.classList.add('productElement','flex', 'flex-col', 'md:flex-row', 'items-center', '-mx-8', 'px-6', 'py-5', 'border-b');
            productElement.value = item.product_id
            productElement.price = item.price
            // 构建商品基础信息
            const productInfoHTML = `
            <div class="flex w-full md:w-2/5" > <!-- product -->
            <div class="w-32"> <!-- Adjusted width for larger image -->
            <img class="h-32" src="${item.image}" alt="product image"> <!-- Adjusted height for larger image -->
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
            <span class="font-bold text-sm">${item.name}</span>
            <span class="text-red-500 text-xs">Size ${item.size}</span>
            <span class="text-green-500 text-xs">In stock</span>
            </div>
            </div>
            <div id="selectDiv" class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0">
            </div>
            <span class="text-center w-full md:w-1/5 font-semibold text-sm mt-4 md:mt-0">$${item.price}</span>
            <div class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0 space-x-3">
            <button class="cursor-pointer delete_product"><svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none"><path stroke="currentColor" stroke-miterlimit="10" stroke-width="1.5" d="M14.25 7.5v12m-4.5-12v12M5.25 6v13.5c0 1.24 1.01 2.25 2.25 2.25h9c1.24 0 2.25-1.01 2.25-2.25V5.25h2.75m-2.75 0H21m-12-3h5.25c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5H3"></path></svg></button>
            
            </div>`;
            // 将基础信息添加到productElement
            productElement.innerHTML = productInfoHTML;
            productElement['size'] = item.size;
            productElement['productid'] = item.id;


            // 创建<select>元素
            const quantitySelect = document.createElement('select');
            quantitySelect.classList.add('border', 'text-left', 'rounded', 'w-full', 'md:w-20', 'px-4');

            // 动态添加<option>元素
            for (let i = 1; i <= 9; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                if (i === item.quantity) option.selected = true;
                quantitySelect.appendChild(option);
            }

            // 插入<select>到对应的div中
            const selectDiv = productElement.querySelector('#selectDiv');
            // console.log(quantitySelect);
            selectDiv.appendChild(quantitySelect);

            // 将新创建的产品元素添加到购物车容器
            cartContainer.appendChild(productElement);
        });
        // 为容器添加点击事件监听器
        cartContainer.addEventListener('click', function(event) {
            // 判断点击的是否为删除按钮
            // 检查事件的目标是否为你关心的元素或其子元素
            if (event.target.closest('.delete_product') || event.target.classList.contains('delete_product')) {
                // 1. 读取并解析购物车数据
                const cartData = JSON.parse(localStorage.getItem("cart") || "[]");
                
                // 从这里开始，你可以对button进行你需要的操作
                const items = Array.from(cartContainer.children); // 将子元素转换为数组
                const parentItem = event.target.closest('.productElement'); // 使用closest找到最近的列表项
                const index = items.indexOf(parentItem); // 计算下标
                
                const product_id = parentItem.value
                // 2. 查找并删除特定项
                console.log(parentItem);
                // return 
                
                const updatedCartData = cartData.filter(item => !(item.product_id == product_id && item.size == parentItem.size));

                // const updatedCartData = cartData.filter(item => item.product_id !== product_id);
                // 3. 更新localStorage
                localStorage.setItem("cart", JSON.stringify(updatedCartData));
                // 执行删除操作，例如移除点击按钮所在的列表项
                console.log("cartContainer",cartContainer);
                cartContainer.children[index].remove();
                if(cartData.length==1){
                    // setTimeout(() => {
                    document.querySelector('#cartContainer').innerHTML = `
                    <div id="cartContainer">
                    <div class="flex flex-col md:flex-row items-center -mx-8 px-6 py-5 border-b">
                        <div>
                            <h1 class="font-bold mb-4">Bag</h1>
                            <p>There are no items in your bag.</p>
                        </div>
                        </div>
                    </div>
                    `;
                    // }, 0);
                }
                // 可以在这里添加其他删除逻辑，如更新数据存储或通知服务器
                updatePrices();
                updateCartQuantity()
                
            }
        });
    }
    const updatePrices = () => {
        let subtotal = 0;
        let total_cost = 0
        document.querySelectorAll('#cartContainer .productElement').forEach((productElement) => {
            const quantitySelect = productElement.querySelector('select');
            const priceElement = productElement.querySelector('.font-semibold.text-sm');
            const quantity = parseInt(quantitySelect.value, 10);
            // const pricePerItem = parseFloat(priceElement.textContent.replace('$', ''));
            const cartData = JSON.parse(localStorage.getItem('cart')) || [];
            const product_id = productElement.value
            const product_price = productElement.price
            // const found = cartData.find(item => item.product_id === product_id);
            let item = cartData.find(item => item.product_id === product_id&& item.size == productElement.size);
            // const updatedCartData = cartData.filter(item => !(item.product_id == product_id && item.size == parentItem.size));

            if (item) {
                item.quantity = quantity; // 修改quantity为5
            }
            
            // 步骤4: 更新localStorage中的数据
            localStorage.setItem("cart", JSON.stringify(cartData));
            const totalPrice = quantity * product_price;
            // 更新单个商品总价
            priceElement.textContent = `$${totalPrice.toFixed(2)}`;

            shipping_fee = parseInt(document.querySelector('.shipping').value)
            // 累加到Subtotal
            subtotal += totalPrice;
            console.log(subtotal);
            total_cost = subtotal + shipping_fee
            
        });

        // 更新Subtotal总价
        document.querySelector('.subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.querySelector('.total_cost').textContent = `$${total_cost.toFixed(2)}`;
    };

    // 初始化和监听选择框的变化
    document.querySelectorAll('#cartContainer select, .shipping').forEach((selectElement) => {
        selectElement.addEventListener('change', ()=>{
            updatePrices()
            updateCartQuantity()
        });
    });

    // 初始化价格
    updatePrices();
});
