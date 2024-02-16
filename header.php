<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!-- header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="cache-control" content="no-store">
  <title>24-Sports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css?v2s2221221122222">
  <script src="main.js?v112"></script>

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="relative">
  <header class="text-gray-600 body-font hidden md:block">
    <div class="flex bg-gray-100 h-10 text-xs items-center justify-end px-4 font-medium">
      <a href="index.php#feedback" class="hover:text-gray-900 px-4">Feedback</a>
      <span>|</span>

      <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
        <div class="relative group">
          <a href="user_center.php" class=" px-2 flex items-center justify-center">
            <span class="mx-2 hover:text-gray-900">Hi,
              <?php echo strtoupper(htmlspecialchars($_SESSION["username"])); ?>
            </span>
          </a>
          <div class="z-10 absolute hidden group-hover:block shadow-lg bg-white">
            <div class="mt-2"> <!-- 应用间隙 -->
              <a href="user_center.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
              <a href="orders.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Orders</a>
              <a href="favourites.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Favourites</a>
            </div>
          </div>
        </div>
        <a href="user_center.php"
          class="flex justify-center items-center hover:bg-gray-200 rounded-full p-1 transition-all duration-150  mr-2">
          <svg aria-hidden="true" class="pre-nav-design-icon" focusable="false" viewBox="0 0 24 24" role="img"
            width="24px" height="24px" fill="none" data-var="glyph" style="display: inline-block;">
            <path fill="currentColor"
              d="M12 3a4.5 4.5 0 00-4.5 4.5H9a3 3 0 013-3V3zM7.5 7.5A4.5 4.5 0 0012 12v-1.5a3 3 0 01-3-3H7.5zM12 12a4.5 4.5 0 004.5-4.5H15a3 3 0 01-3 3V12zm4.5-4.5A4.5 4.5 0 0012 3v1.5a3 3 0 013 3h1.5zM4.5 21v-3H3v3h1.5zm0-3a3 3 0 013-3v-1.5A4.5 4.5 0 003 18h1.5zm3-3h9v-1.5h-9V15zm9 0a3 3 0 013 3H21a4.5 4.5 0 00-4.5-4.5V15zm3 3v3H21v-3h-1.5z">
            </path>
          </svg>
        </a>
        <span>|</span>
        <a href="logout.php" class="hover:text-gray-900 px-4">Logout</a>
      <?php else: ?>
        <a href="join.php" class="hover:text-gray-900 px-4">Join Us</a>
        <span>|</span>
        <a href="login.php" class="hover:text-gray-900 px-4">Sign In</a>
      <?php endif; ?>
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
        <form action="search.php" method="get">
          <div
            class="flex xl:flex-nowrap md:flex-nowrap lg:flex-wrap flex-wrap justify-center  md:justify-start items-center">
            <div class="relative w-40 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4 mr-2">
              <input type="text" id="search-field" name="query"
                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button type="submit"
              class="transition-all duration-300 inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base md:mt-0">Search
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </button>
        </form>
        <div id="nav-cart" class="relative inline-flex justify-center items-center border-0 px-3" data-pre="Cart">
          <a data-var="anchor" title="Bag Items: 5" aria-label="Bag Items: 5" rel="nofollow" data-type="click_navCart"
            data-path="cart" href="cart.php" class="icon-btn ripple d-sm-b flex justify-center items-center"
            data-pre="ILink" previewlistener="true">
            <div
              class="transition-all duration-300 flex justify-center items-center hover:bg-gray-200 rounded-full p-1 ">
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
  </header>

  <header class="block md:hidden text-gray-600 body-font">
    <div class="flex bg-gray-100 h-10 text-xs items-center justify-end px-4 font-medium">
      <a href="index.php#feedback" class="hover:text-gray-900 px-4">Feedback</a>
      <span>|</span>

      <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
        <div class="relative group">
          <a href="user_center.php" class=" px-2 flex items-center justify-center">
            <span class="mx-2 hover:text-gray-900">Hi,
              <?php echo strtoupper(htmlspecialchars($_SESSION["username"])); ?>
            </span>
          </a>
          <div class="z-10 absolute hidden group-hover:block shadow-lg bg-white">
            <div class="mt-2"> <!-- 应用间隙 -->
              <a href="user_center.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
              <a href="orders.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Orders</a>
              <a href="favourites.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Favourites</a>
            </div>
          </div>
        </div>
        <a href="user_center.php"
          class="flex justify-center items-center hover:bg-gray-200 rounded-full p-1 transition-all duration-150  mr-2">
          <svg aria-hidden="true" class="pre-nav-design-icon" focusable="false" viewBox="0 0 24 24" role="img"
            width="24px" height="24px" fill="none" data-var="glyph" style="display: inline-block;">
            <path fill="currentColor"
              d="M12 3a4.5 4.5 0 00-4.5 4.5H9a3 3 0 013-3V3zM7.5 7.5A4.5 4.5 0 0012 12v-1.5a3 3 0 01-3-3H7.5zM12 12a4.5 4.5 0 004.5-4.5H15a3 3 0 01-3 3V12zm4.5-4.5A4.5 4.5 0 0012 3v1.5a3 3 0 013 3h1.5zM4.5 21v-3H3v3h1.5zm0-3a3 3 0 013-3v-1.5A4.5 4.5 0 003 18h1.5zm3-3h9v-1.5h-9V15zm9 0a3 3 0 013 3H21a4.5 4.5 0 00-4.5-4.5V15zm3 3v3H21v-3h-1.5z">
            </path>
          </svg>
        </a>
        <span>|</span>
        <a href="logout.php" class="hover:text-gray-900 px-4">Logout</a>
      <?php else: ?>
        <a href="join.php" class="hover:text-gray-900 px-4">Join Us</a>
        <span>|</span>
        <a href="login.php" class="hover:text-gray-900 px-4">Sign In</a>
      <?php endif; ?>
    </div>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a class="" href="index.php">
          <img src="image/LOGO/logo.png" alt="my logo" class="h-20 object-contain">
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
          class="mobile-menu-button inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
        <div class="mobile-menu hidden w-full md:block md:w-auto" id="navbar-default">
          <ul
            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="index.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                aria-current="page">Home</a>
            </li>
            <li>
              <a href="products.php?category=running"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Running</a>
            </li>
            <li>
              <a href="products.php?category=football"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent ">Football</a>
            </li>
            <li>
              <a href="products.php?category=basketball"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Basketball</a>
            </li>
            <li>
              <a href="products.php?category=hike"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Hike</a>
            </li>
            <li>
              <a href="products.php?category=others"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Others</a>
            </li>
            <li>
              <a href="ourteam.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About
                Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div id="myModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <?php
    include "bag.php";
    ?>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {

      // Toggle mobile menu
      document.querySelector('.mobile-menu-button').addEventListener('click', function () {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
      });
    })
    updateCartQuantity();
  </script>