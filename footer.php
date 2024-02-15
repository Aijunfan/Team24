<!-- footer.php -->
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
</footer>
<footer class="text-slate-200 bg-gray-700 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <a class="">
                <img src="image/LOGO/logo_2.png" alt="my logo" class="h-20 object-contain">
            </a>
            <span class="ml-3 text-xl text-slate-200">24-Sports</span>
        </a>
        <p class="text-sm text-slate-200 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0">© 2024
            24-Sports —
            <span class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank"
                previewlistener="true">@24-Sports</span>
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-slate-200">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                    viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
            </a>
            <a class="ml-3 text-slate-200">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                    viewBox="0 0 24 24">
                    <path
                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                    </path>
                </svg>
            </a>
            <a class="ml-3 text-slate-200">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-5 h-5" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
            </a>
            <a class="ml-3 text-slate-200">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                    <path stroke="none"
                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                    </path>
                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
            </a>
        </span>
    </div>
</footer>
<div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center">
    <!-- 加载动画 -->
    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor" />
        <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill" />
    </svg>
</div>
</body>

</html>