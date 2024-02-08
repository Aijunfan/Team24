<?php include 'header.php'; ?>
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
            <div class="flex w-full md:w-2/5"> <!-- product -->
                <div class="w-32"> <!-- Adjusted width for larger image -->
                <img class="h-32" src="./image/basketball/basketball (6).png" alt="product image"> <!-- Adjusted height for larger image -->
                </div>
                <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm">Basic Tee</span>
                <span class="text-red-500 text-xs">Sienna | Large</span>
                <span class="text-green-500 text-xs">In stock</span>
                </div>
            </div>
            <div class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0">
                <!-- Changed to dropdown with increased width -->
                <select class="border text-left rounded w-full md:w-20 px-4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <!-- ... other options ... -->
                </select>
            </div>
            <span class="text-center w-full md:w-1/5 font-semibold text-sm mt-4 md:mt-0">$32.00</span>
            <div class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0 space-x-3">
                <!-- Delete button added -->
                <button class="text-gray-500 hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
            </div>
            </div>
        </div>

      <!-- Repeat for other products -->

      <!-- ... other product line items ... -->

    </div>

    <!-- Order Summary -->
    <div class="w-full md:w-1/4 px-8 py-10 bg-gray-100 rounded">
      <div class="sticky top-20 " >
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
            <span class="font-semibold text-sm uppercase">Subtotal</span>
            <span class="font-semibold text-sm">$99.00</span>
        </div>
        <div>
            <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
            <select class="block p-2 text-gray-600 w-full text-sm">
            <option>Standard shipping - $5.00</option>
            </select>
        </div>
        <div class="py-10">
            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Tax Estimate</label>
            <span class="font-semibold text-sm">$8.32</span>
        </div>
        <div class="border-t mt-8">
            <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Total cost</span>
            <span>$112.32</span>
            </div>
            <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full rounded">Checkout</button>
        </div>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php'; ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const cartData = JSON.parse(localStorage.getItem('cart')) || [];
  const cartContainer = document.querySelector('#cartContainer'); // 定位到购物车容器

  // 清除现有的占位商品项
  cartContainer.innerHTML = '';

  // 动态添加购物车商品
  cartData.forEach((item) => {
    const productElement = document.createElement('div');
    productElement.classList.add('flex', 'flex-col', 'md:flex-row', 'items-center', '-mx-8', 'px-6', 'py-5', 'border-b');
    productElement.innerHTML = `
      <div class="flex w-full md:w-2/5"> <!-- product -->
        <div class="w-32"> <!-- Adjusted width for larger image -->
          <img class="h-32" src="${item.image}" alt="product image"> <!-- Adjusted height for larger image -->
        </div>
        <div class="flex flex-col justify-between ml-4 flex-grow">
          <span class="font-bold text-sm">${item.name}</span>
          <span class="text-red-500 text-xs">Option | Size</span>
          <span class="text-green-500 text-xs">In stock</span>
        </div>
      </div>
      <div class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0">
        <select class="border text-left rounded w-full md:w-20 px-4">
          <option value="${item.quantity}" selected>${item.quantity}</option>
        </select>
      </div>
      <span class="text-center w-full md:w-1/5 font-semibold text-sm mt-4 md:mt-0">$${item.price}</span>
      <div class="flex justify-center w-full md:w-1/5 mt-4 md:mt-0 space-x-3">
        <button class="text-gray-500 hover:text-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    `;

    // 将新创建的产品元素添加到购物车容器
    cartContainer.appendChild(productElement);
  });
});
</script>
