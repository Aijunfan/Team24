<?php
include 'init.php';
include 'header.php';

// 检查用户是否已登录，如果没有，则重定向到登录页面
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<form>
    <div class="container flex">
        <div class="flex w-1/2">
            <ul role="tablist"
                class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                <li>
                    <a href="#" data-target="Profile"
                        class="inline-flex items-center px-4 py-3 text-white bg-indigo-500 rounded-lg w-full active"
                        aria-current="page">
                        <svg class="w-6 h-6 me-2" aria-hidden="true" focusable="false" viewBox="0 0 48 48" role="img"
                            fill="none">
                            <path stroke="currentColor" stroke-width="3"
                                d="M7.5 42v-6a7.5 7.5 0 017.5-7.5h18a7.5 7.5 0 017.5 7.5v6m-9-27a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z">
                            </path>
                        </svg>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#" data-target="Address"
                        class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900  hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-6 h-6 me-2" aria-hidden="true" aria-hidden="true" focusable="false"
                            viewBox="0 0 48 48" role="img" fill="none">
                            <path stroke="currentColor" stroke-miterlimit="10" stroke-width="3"
                                d="M24 27V13c0-3.48 2.02-5.5 4.5-5.5h8.78l3.22 12m0 0h-33m33 0v21h-33v-21m0 0l3.22-12H21">
                            </path>
                        </svg>
                        Addresses
                    </a>
                </li>
            </ul>

            <div id="Profile"
                class=" tab-content p-6  text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Profile Tab</h3>
                <div class="profile ">
                    <div class="mb-6">
                        <label for="Username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="Username" id="Username"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="username" disabled>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            address</label>
                        <input type="email" id="email"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="john.doe@company.com" required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            Number
                            address</label>
                        <input type="tel" id="tel"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="+358123456789" required>
                    </div>
                    <div class="mb-6">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="flex relative items-center justify-end">
                            <input type="password" id="password"
                                class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" disabled>
                            <a href="#" data-modal-target="authentication-modal"
                                data-modal-toggle="authentication-modal"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline absolute mr-4">Edit</a>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white  bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 hover:bg-indigo-600 dark:focus:ring-blue-800">Submit</button>
                </div>
            </div>

            <div id="Address"
                class="hidden tab-content p-6  text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full min-h-64">
                <h3 class="font-bold text-gray-900 dark:text-white mb-2">Saved Delivery Addresses</h3>
                <div class="text-xs p-4 border-b-2 border-gray-100  font-normal">
                    <div class="flex  justify-between">
                        <p>Delivery Address</p>
                        <a href="#" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                    </div>
                    <p>HAO ZHANG</p>
                    <p>Visamäentie 23 95L, 34,3,102</p>
                    <p>13100</p>
                    <p>Hämeenlinna</p>

                </div>
                <div class="flex justify-end mt-6">
                    <button type="button" data-modal-target="authentication-modal"
                        data-modal-toggle="authentication-modal"
                        class=" rounded-full text-white  bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto p-2.5 text-center dark:bg-blue-600 hover:bg-indigo-600 dark:focus:ring-blue-800">
                        Add address
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>






<!-- Main modal -->
<div id="authentication-modal1" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <!-- Modal content -->
    <div
        class="modal-content relative top-20 mx-auto p-2 border w-96 shadow-lg rounded-md bg-white transition-opacity duration-300 ease-in-out">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Password</h3>
            <button type="button"
                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
            <form class="space-y-4" action="#">
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                        password</label>
                    <input type="password" name="cpassword" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                        password</label>
                    <input type="password" name="npassword" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                        new password</label>
                    <input type="password" name="cnpassword" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>
                <button type="submit"
                    class="text-white bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 hover:bg-indigo-600 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <!-- Modal content -->
    <div
        class="modal-content relative top-20 mx-auto p-6 border w-[32rem] shadow-lg rounded-md bg-white transition-opacity duration-300 ease-in-out">
        <!-- Modal header -->
        <div class="mb-4 flex items-center justify-between pb-2 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Address</h3>
        </div>
        <form>
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                        name</label>
                    <input type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required>
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                        name</label>
                    <input type="text" id="last_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" required>
                </div>
            </div>
            
            <div class="mb-2">
                <div  class="mb-2">
                <label for="line1"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address Line 1</label>
                    <input type="text" id="line1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Address Line 1" required>
                </div>
                <div  class="mb-2">
                    <label for="line2"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address Line 2</label>
                    <input type="text" id="line2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Address Line 2" required>
                </div>
            </div>
            <div class="grid gap-6 mb-2 md:grid-cols-2">
                <div>
                    <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postcode</label>
                    <input type="tel" id="postcode"
                            minlength="5"
                            maxlength="5"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="13100" pattern="[0-9]{5}" required title="postcode">

                </div>
                <div>
                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                    <input type="text" id="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="city" required>
                </div>
                <div>
                    <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">province</label>
                    <input type="text" id="province"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="province" required>
                </div>
                <div>
                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                    <input type="text" id="country"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Country" required>
                </div>
            </div>
            <div class="mb-4">
                <div class="mb-2">
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                    <input type="tel" id="phone_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                </div>
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                        required>
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Set as default delivery address.</label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Save
            </button>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 你的代码放在这里
        document.addEventListener('click', function (e) {
            console.log(e);
            // 获取模态框
            const modal = document.getElementById('authentication-modal');

            // 如果点击了toggle按钮
            if (e.target.matches('[data-modal-toggle]')) {
                modal.classList.toggle('hidden'); // 切换模态框显示和隐藏
                e.preventDefault(); // 阻止默认行为，如果有的话
            }

            // 如果点击的是模态框以外的区域且模态框是可见的
            else if (e.target === modal && !modal.classList.contains('hidden')) {
                modal.classList.add('hidden'); // 隐藏模态框
            }
        });

        // 监听关闭按钮的点击事件
        document.querySelectorAll('[data-modal-hide]').forEach(function (closeButton) {
            console.log('asdasd', closeButton);
            closeButton.addEventListener('click', function () {
                console.log('closeButton');
                const modalId = this.getAttribute('data-modal-hide');
                const modal = document.getElementById(modalId);
                modal.classList.add('hidden'); // 隐藏模态框
            });
        });



        const tabs = document.querySelectorAll('ul[role="tablist"] a');
        const tabContentBoxes = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                const target = this.getAttribute('data-target');

                // 隐藏所有tab内容区域
                tabContentBoxes.forEach(box => {
                    box.classList.add('hidden');
                });

                // 移除所有tabs的active状态和aria-current属性
                tabs.forEach(t => {
                    t.classList.remove('active', 'bg-indigo-500', 'text-white');
                    t.classList.add('hover:bg-gray-100', 'hover:text-gray-900');
                    t.removeAttribute('aria-current');
                });

                // 显示当前tab的内容区域
                document.getElementById(target).classList.remove('hidden');

                // 设置当前tab为active状态
                this.classList.add('active', 'bg-indigo-500', 'text-white');
                this.classList.remove('hover:bg-gray-100', 'hover:text-gray-900');
                this.setAttribute('aria-current', 'page');
            });
        });
    });

</script>