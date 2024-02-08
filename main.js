function uploadProducts() {
    const input = document.getElementById('productsFile');
    if (!input.files[0]) {
        alert('请先选择一个文件。');
        return;
    }
    const file = input.files[0];
    const formData = new FormData();
    formData.append('productsFile', file);
    console.log(formData.get('productsFile'));
    fetch('upload_products.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
        });
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