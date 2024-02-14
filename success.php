<?php 
include 'init.php'; 
include 'header.php';
require_once __DIR__ . '/../vendor/autoload.php';
?>
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900" id="orderStatusTitle">Checking Order Status...</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base" id="orderStatusMessage">
        Please wait a moment while we confirm the details of your transaction.
      </p>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const sessionId = urlParams.get('session_id');
    toggleOverlay()
    if (sessionId) {
      fetch(`/Team24/verify-payment.php?session_id=${sessionId}`)
        .then(response => response.json())
        .then(data => {
          const title = document.getElementById('orderStatusTitle');
          const message = document.getElementById('orderStatusMessage');
          if (data.paymentStatus === "paid") {
            title.textContent = 'Order Confirmed!';
            message.textContent = 'Thank you for your purchase. Your order has been confirmed. If you have any questions, please email orders@24-sports.com.';
            message.innerHTML += '<br><a href="mailto:orders@24-sports.com" class="text-indigo-500">orders@24-sports.com</a>';
            localStorage.setItem('cart','[]')
            updateCartQuantity()
            toggleOverlay()
          } else {
            title.textContent = 'Order Not Confirmed';
            message.textContent = 'There was an issue confirming your order. Please contact us for assistance.';
            message.innerHTML += '<br><a href="mailto:orders@24-sports.com" class="text-indigo-500">orders@24-sports.com</a>';
          }
        })
        .catch(error => {
          console.error('Error verifying payment:', error);
          document.getElementById('orderStatusTitle').textContent = 'Error';
          document.getElementById('orderStatusMessage').textContent = 'An error occurred while verifying your order. Please try again or contact us for assistance.';
        });
    } else {
      document.getElementById('orderStatusTitle').textContent = 'Order Information Not Found';
      document.getElementById('orderStatusMessage').textContent = 'We were unable to find your order information. Please ensure you have accessed this page via the link provided after completing your purchase.';
    }
  });
</script>
