<?php
include 'header.php';

// 获取商品ID
// 创建一个产品数组，包含每个产品的信息
$products = [
    ["id" => 1, "image" => "./imgs/shoe (1).jpg", "name" => "The Catalyzer", "price" => "16.00", "size" => [41, 42, 43, 44, 45],"desc"=>"With maximum cushioning to support every mile, the Invincible 3 gives you our highest level of comfort underfoot to help you stay on your feet today, tomorrow and beyond. Designed to help keep you on the run, it's super supportive and bouncy, so that you can propel down your preferred path and come back for your next run feeling ready and reinvigorated."],
    ["id" => 2, "image" => "./imgs/shoe (2).jpg", "name" => "Shooting Stars", "price" => "24.00", "size" => [41, 42, 43, 44, 45],"desc"=>"Step into a classic. This AJ4 throws it back with full-grain leather and premium textiles. Iconic design elements from the original, like floating eyestays and mesh-inspired accents, feel just as fresh as they did in '89."],
    ["id" => 3, "image" => "./imgs/shoe (3).jpg", "name" => "Shooting Stars", "price" => "30.00", "size" => [41, 42, 43, 44, 45],"desc"=>"Clean and supreme, the legendary Tinker Hatfield AJ3 design that solidified MJ's place in sneaker lore returns. Taking colour-blocking cues from a heritage AJ3 colourway, this edition swaps in Midnight Navy against a white and Cement Grey backdrop. Luxe materials and our signature elephant print elevate every step. "],
    ["id" => 4, "image" => "./imgs/shoe (4).jpg", "name" => "Shooting Stars", "price" => "27.00", "size" => [41, 42, 43, 44, 45],"desc"=>"Take note: the adults in your life might have rules, but they can also inspire some amazing drip. Inspired by the wallpaper in MJ's childhood home, this AJ1 rocks bold florals and colour-blocked canvas."],
    ["id" => 5, "image" => "./imgs/shoe (5).jpg", "name" => "Shooting Stars", "price" => "28.00", "size" => [41, 42, 43, 44, 45],"desc"=>"How do you want your game to be remembered? Preserve your place among the greats, like Giannis, in the Giannis Immortality 3. Mindfully made for today's high-paced, position-less game, it's softer than the previous iteration with a specific traction pattern that's perfect for pulling off the perfect Euro step en route to glory."],
    ["id" => 6, "image" => "./imgs/shoe (6).jpg", "name" => "Shooting Stars", "price" => "25.00", "size" => [41, 42, 43, 44, 45],"desc"=>"Here's your AJ4 done up in classic colours. This AJ4 is built to the original specs and constructed of full-grain leather and textiles for a solid feel. And all your favourite AJ4 elements are there, like the floating eyestays and the mesh-inspired side panels and tongue.Colour Shown: Blac"],
    ["id" => 7, "image" => "./imgs/shoe (7).jpg", "name" => "Shooting Stars", "price" => "24.00", "size" => [41, 42, 43, 44, 45],"desc"=>"The radiance lives on in the Air Force 1 '07, the b-ball icon that puts a fresh spin on what you know best: crisp materials, bold colours and the perfect amount of flash to make you shine."],
    ["id" => 8, "image" => "./imgs/shoe (8).jpg", "name" => "Shooting Stars", "price" => "55.00", "size" => [41, 42, 43, 44, 45],"desc"=>"Layers upon layers of dimensional style—that's a force to be reckoned with. Offering both comfort and versatility, these kicks are rooted in heritage basketball culture. The collar materials pay homage to vintage sport while the subtle platform elevates your look, literally. The Gamma Force is forging its own legacy: court style that can be worn all day, wherever you go."],
    // 其他商品
];
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // 查找对应的商品
    $product = null;
    foreach ($products as $p) {
        if ($p['id'] == $product_id) {
            $product = $p;
            break;
        }
    }

    if ($product) {
        ?>
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                        src="<?php echo $product['image']; ?>">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">BRAND NAME</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
                            <?php echo $product['name']; ?>
                        </h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <span class="text-gray-600 ml-3">4 Reviews</span>
                            </span>
                            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                </a>
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-5 h-5" viewBox="0 0 24 24">
                                        <path
                                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        class="w-5 h-5" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                        <p class="leading-relaxed"><?php echo $product['desc']; ?></p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                            <!-- <div class="flex">
                                <span class="mr-3">Color</span>
                                <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button
                                    class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button
                                    class="border-2 border-gray-300 ml-1 bg-indigo-500 rounded-full w-6 h-6 focus:outline-none"></button>
                            </div> -->
                            <div class="flex items-center">
                                <span class="mr-3">Size</span>
                                <div class="relative">
                                    <select
                                        class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                        <?php
                                        for ($i = 0; $i < count($product['size']); $i++) {
                                            ?>
                                            <option>
                                                <?php echo $product['size'][$i]; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span
                                        class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <span class="title-font font-medium text-2xl text-gray-900">$<?php echo $product['price']; ?></span>
                            <button
                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Add to Bag</button>
                            <button
                                class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } else {
        echo "商品未找到。";
    }
} else {
    echo "商品ID未提供。";
}

include 'footer.php';
?>