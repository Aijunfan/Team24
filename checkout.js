// This is your test publishable API key.
const stripe = Stripe("pk_test_51OijO1B5KNrksgu9geGURdZZWoDRNMxNOAjtPYpTQcaVQ1eDXlaQodzjJnHE9xXVoIGcDgZadk3JrQGI5LLvZyJl005NCNI1rh");

async function createCheckoutSession() {
    // 获取购物车数据
    const cartData = localStorage.getItem("cart"); // 假设购物车数据存储在 localStorage

    const response = await fetch("checkout.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: cartData // 发送购物车数据到服务器
    });

    const session = await response.json();

    // 使用返回的会话ID重定向到Stripe Checkout
    if(session.id) {
        stripe.redirectToCheckout({ sessionId: session.id }).then(function (result) {
            // 如果`redirectToCheckout`失败，可以在这里处理结果（例如，显示错误消息）
            if (result.error) {
                alert(result.error.message);
            }
        });
    } else {
        console.error("Checkout session creation failed:", session.error ? session.error : 'Unknown error.');
        // 可以在这里处理错误（例如，显示错误消息）
    }
}

// 绑定事件监听器到 Checkout 按钮或其他触发元素
document.getElementById("checkout-button").addEventListener("click", createCheckoutSession);
