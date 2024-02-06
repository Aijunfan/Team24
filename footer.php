<!-- <footer class="footer1">
        <p>Follow Us</p>
        <p>Be the first to know about new products, exclusives and special offers!</p>
        <div class="footer-icons">
            <img src="image/LOGO/facebook_.png" alt="fb" >
            <img src="image/LOGO/youtube_.png" alt="youtube">
            <img src="image/LOGO/twitter_.png" alt="twitter">
            <img src="image/LOGO/instagram_.png" alt="inst">
            <img src="image/LOGO/sina-weibo_.png" alt="weibo">
        </div>
    </footer>

    <footer class="footer2">
        <div class="Get-know">
            <h5>Get to know us</h5>
            <ul>
                <li>Contact Information</li>
                <li>Careers</li>
                <li><a href="about.html">About us</a></li>
            </ul>
        </div>
        <div class="Support">
            <h5>Support</h5>
            <ul>               
                <li>Help</li>
                <li>Site map</li>
                <li>Returns</li>
            </ul>
        </div>
        <div class="Business">
            <h5>Business Cooperation</h5>
            <ul>               
                <li>Join us</li>
                <li>Group purchase</li>
            </ul>
        </div>
    </footer> -->
    <footer class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
  <div class="flex flex-wrap md:text-left text-center order-first">
    <?php
    $menuSections = [
        [
            "title" => "GIFT CARDS",
            "items" => [
                "Find a Store",
                "Become a Member",
                "Student Discount",
                "Feedback"
            ]
        ],
        [
            "title" => "GET HELP",
            "items" => [
                "Order Status",
                "Shipping and Delivery",
                "Returns",
                "Payment Options"
            ]
        ],
        [
            "title" => "ABOUT 24-Sports",
            "items" => [
                "News",
                "Careers",
                "Investors",
                "Sustainability"
            ]
        ],
        [
            "title" => "JOIN US",
            "items" => [
                "24-Sports App",
                "24-Sports Run Club",
                "24-Sports Training Club",
                "SNKRS"
            ]
        ]
    ];

    foreach ($menuSections as $section) {
        echo '<div class="lg:w-1/4 md:w-1/2 w-full px-4">';
        echo '<h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">' . $section["title"] . '</h2>';
        echo '<nav class="list-none mb-10">';
        foreach ($section["items"] as $item) {
            echo '<li><a class="text-gray-600 hover:text-gray-800">' . $item . '</a></li>';
        }
        echo '</nav>';
        echo '</div>';
    }
    ?>
</div>

  </div>
  <footer class="text-slate-200 bg-gray-700 body-font">
  <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg> -->
        <a class="">
        <img src="image/LOGO/logo.webp" alt="my logo" class="h-20 object-contain">
        </a>
      <span class="ml-3 text-xl text-slate-200">24-Sports</span>
    </a>
    <p class="text-sm text-slate-200 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0">© 2024 24-Sports —
      <span class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank" previewlistener="true">@24-Sports</span>
    </p>
    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <a class="text-slate-200">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-slate-200">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-slate-200">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
          <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
        </svg>
      </a>
      <a class="ml-3 text-slate-200">
        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
          <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
          <circle cx="4" cy="4" r="2" stroke="none"></circle>
        </svg>
      </a>
    </span>
  </div>
</footer>
</footer>
</body>
</html>
