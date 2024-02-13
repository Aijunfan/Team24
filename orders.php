<?php
include 'init.php';
include 'header.php';
?>
<div></div>

<div class="container mx-auto px-4 py-8">
    <div class="mb-4">
        <h1 class="text-2xl font-semibold">Order Details</h1>
    </div>
    <div class="flex">
    <div class="w-64 flex-none bg-white shadow-md overflow-auto mr-4">
        <div class="py-4 px-3 bg-gray-50">
            <h3 class="text-sm font-semibold text-gray-700">My Orders</h3>
        </div>
        <ul class="divide-y divide-gray-200">
            <!-- Example Order -->
            <li>
                <a href="#"
                    class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="py-4 px-4 flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                Order #123456
                            </p>
                            <p class="text-sm text-gray-500">
                                Placed on Jan 1, 2024
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-right text-gray-900">
                                $170.00
                            </p>
                            <p class="text-xs text-right text-gray-500">
                                3 items
                            </p>
                        </div>
                    </div>
                </a>
            </li>
            <!-- Repeat for each order -->
            <!-- Example Order -->
            <li>
                <a href="#"
                    class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="py-4 px-4 flex items-center">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                Order #654321
                            </p>
                            <p class="text-sm text-gray-500">
                                Placed on Dec 15, 2023
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-right text-gray-900">
                                $80.00
                            </p>
                            <p class="text-xs text-right text-gray-500">
                                1 item
                            </p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>




    <div class="flex-grow bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Order #123456
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Placed on January 1, 2024
            </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Shipping Address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        Jane Doe, 123 Main St, Anytown, CA 12345
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Payment Method
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        Visa ending in 4242
                    </dd>
                </div>
                <!-- Repeat for each product in the order -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Products
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <p>Running Shoes (Size: 10) x 1 - $50.00</p>
                        <p>Basketball Shoes (Size: 11) x 2 - $120.00</p>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Total Price
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        $170.00
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    </div>
</div>
<?php include 'footer.php'; ?>