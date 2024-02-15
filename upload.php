<?php
ob_start(); // Start buffering output
include 'init.php';
include 'header.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['username'] !== 'admin') {
    // 用户未登录或不是admin角色
    // 重定向到登录页面或显示错误消息
    header('Location: index.php');
    exit; // 防止脚本继续执行
}
?>
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-10 mx-auto">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg  hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">UploadFile</button>
                </li>

            </ul>
        </div>
        <div id="default-tab-content">
            <div class=" p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-12">
                        <h2 class="text-2xl font-medium title-font mb-4 text-gray-900">Add products</h2>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please upload your product files (in JSON
                            format) for batch addition.</p>
                    </div>
                    <form id="uploadForm" class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="productsFile" class="leading-7 text-sm text-gray-600">Select commodity
                                        file (JSON format):</label>
                                    <input type="file" id="productsFile" name="productsFile" accept=".json"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <button type="button" onclick="uploadProducts('productsFile')"
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-12">
                        <h2 class="text-2xl font-medium title-font mb-4 text-gray-900">批量添加商品尺寸</h2>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">请上传您的商品尺寸文件（JSON格式）以进行批量添加。</p>
                    </div>
                    <form id="uploadForm" class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="productsSizeFile"
                                        class="leading-7 text-sm text-gray-600">选择商品尺寸文件（JSON格式）:</label>
                                    <input type="file" id="productsSizeFile" name="productsSizeFile" accept=".json"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <button type="button" onclick="uploadProducts('productsSizeFile')"
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">上传</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                aria-labelledby="settings-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                    Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                    classes to control the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                aria-labelledby="contacts-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                    Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                    classes to control the content visibility and styling.</p>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('[data-tabs-target]'); // 获取所有标签按钮

        // 默认显示 Profile 标签内容
        document.querySelector('#profile').classList.remove('hidden');
        document.querySelector('#profile-tab').setAttribute('aria-selected', 'true');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => { // 为每个标签按钮添加点击事件监听器
                const target = document.querySelector(tab.getAttribute('data-tabs-target')); // 获取目标内容面板

                // 隐藏所有内容面板
                document.querySelectorAll('[id^="default-tab-content"] > div').forEach((div) => {
                    div.classList.add('hidden');
                });

                // 移除所有标签的 `aria-selected="true"` 属性，并设置为 `false`
                tabs.forEach(t => {
                    t.setAttribute('aria-selected', 'false');
                });

                // 显示点击的标签对应的内容面板，并设置 `aria-selected="true"`
                tab.setAttribute('aria-selected', 'true');
                target.classList.remove('hidden');
            });
        });

        // 由于页面加载时Profile已经显示，这里不需要再次执行显示操作
    });
</script>


<?php include 'footer.php';
ob_end_flush(); // Send output buffer and turn off buffering
?>