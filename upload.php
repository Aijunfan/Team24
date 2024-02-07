<?php include 'header.php'; ?>
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h2 class="text-2xl font-medium title-font mb-4 text-gray-900">批量添加商品</h2>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">请上传您的商品文件（JSON格式）以进行批量添加。</p>
        </div>
        <form id="uploadForm" class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="productsFile" class="leading-7 text-sm text-gray-600">选择商品文件（JSON格式）:</label>
                        <input type="file" id="productsFile" name="productsFile" accept=".json" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button type="button" onclick="uploadProducts()" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">上传</button>
                </div>
            </div>
        </form>
    </div>
</section>


<?php include 'footer.php'; ?>
