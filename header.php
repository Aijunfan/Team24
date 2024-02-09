<!-- header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>24-Sports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-CSdW2DALEW1KHu1eq0RGssLxFH6SkcY4cF4jAOGb3A4=" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="main.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <script src="main.js"></script>
</head>

<body class="relative">
  <header class="text-gray-600 body-font">
    <div class="flex bg-gray-100 h-6 text-xs	items-center justify-end px-4">
      <a href="join.php" class="hover:text-gray-900 px-4">Join Us</a>
      <span >|</span>
      <a href="login.php" class="hover:text-gray-900 px-4">Sign In</a>
      <span >|</span>
      <a href="index.php#feedback" class="hover:text-gray-900 px-4">Feedback</a>
      
    </div>
    <div class="container mx-auto flex flex-wrap p-4 flex-col md:flex-row items-center">
      <a class="" href="index.php">
        <img src="image/LOGO/logo.png" alt="my logo" class="h-20 object-contain">
      </a>
      <nav
        class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center title-font font-medium">
        <a class="mr-5 hover:text-gray-900" href="index.php">Home</a>
        <a class="mr-5 hover:text-gray-900" href="products.php?category=running">Running</a>
        <a class="mr-5 hover:text-gray-900" href="products.php?category=football">Football</a>
        <a class="mr-5 hover:text-gray-900" href="products.php?category=basketball">Basketball</a>
        <a class="mr-5 hover:text-gray-900" href="products.php?category=hike">Hike</a>
        <a class="mr-5 hover:text-gray-900" href="products.php?category=others">Others</a>
        <a class="mr-5 hover:text-gray-900" href="ourteam.php">About Us</a>
        <a class="mr-5 hover:text-gray-900" href="upload.php">Upload json</a>
      </nav>

      <div class="lg:w-1/3 md:w-1/2 w-full ">
        <div
          class="flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center  md:justify-start items-center">
          <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
            <input type="text" id="footer-field" name="footer-field"
              class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <button
            class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base md:mt-0">Search
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>

          <div id="nav-cart" class="relative inline-flex justify-center items-center border-0 px-3" data-pre="Cart">
            <a data-var="anchor" title="Bag Items: 5" aria-label="Bag Items: 5" rel="nofollow" data-type="click_navCart"
              data-path="cart" href="cart.php" class="icon-btn ripple d-sm-b flex justify-center items-center"
              data-pre="ILink" previewlistener="true">
              <div
                class="flex justify-center items-center hover:bg-gray-200 rounded-full p-1 transition-all duration-150">
                <svg aria-hidden="true" class="w-8 h-8" focusable="false" viewBox="0 0 24 24" role="img" width="24px"
                  height="24px" fill="none">
                  <path stroke="currentColor" stroke-width="1.5"
                    d="M8.25 8.25V6a2.25 2.25 0 012.25-2.25h3a2.25 2.25 0 110 4.5H3.75v8.25a3.75 3.75 0 003.75 3.75h9a3.75 3.75 0 003.75-3.75V8.25H17.5">
                  </path>
                </svg>
                <span class="absolute text-xs" style="top:14px" data-var="jewel">5</span>
              </div>
            </a>
          </div>


        </div>
      </div>
    </div>
  </header>

  <div id="myModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div
      class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white opacity-0 transition-opacity duration-300 ease-in-out">
      <!-- Modal content -->
      <!-- Your modal content here -->
      <div class="flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-900 -mt-1">Added to Bag</h2>
      </div>
      <div class="flex justify-start items-center mt-4">
        <img class="h-20 w-20 object-cover" src="./image/basketball/air-jordan-1-mid-shoes-MVp2kJ (2).png"
          alt="Nike Dunk Low">
        <div class="ml-4">
          <p class="text-sm font-medium text-gray-900">Nike Dunk Low</p>
          <p class="text-sm text-gray-700">Women's Shoes</p>
          <p class="text-sm text-gray-700">Size W 6 / M 4.5</p>
          <p class="text-sm font-semibold text-gray-900">$115</p>
        </div>
      </div>
      <div class="flex justify-between items-center mt-4">
      <a href="cart.php"><button class="px-4 py-2 bg-white text-sm font-medium rounded border border-gray-300 hover:bg-gray-50">View Bag
          (7)</button></a>
          <a href="cart.php"><button class="px-4 py-2 bg-black text-white text-sm font-medium rounded hover:bg-gray-900">Checkout</button></a>
      </div>

      <p class="text
-sm text-gray-500 mt-4">
        Members get free shipping on orders $50+. <a href="#" class="text-indigo-600 hover:underline">Join Us</a> or
        <a href="#" class="text-indigo-600 hover:underline">Sign-in</a>.
      </p>

      <!-- Close Button -->
      <button id="modalCloseBtn" class="absolute top-0 right-0 mt-2 mr-2">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>
  </div>

  <script>
    updateCartQuantity();
  </script>