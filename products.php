<?php
$currentScript = basename($_SERVER['PHP_SELF']);
if ($currentScript != 'index.php') {
    include 'header.php';
}
require 'db_config.php';
      // 假设类目通过URL参数传递，例如 products.php?category=basketball
    $category = isset($_GET['category']) ? $_GET['category'] : 'basketball';

    $query = "SELECT * FROM Products WHERE category=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // 将数据转换为JSON格式
    $jsonData = json_encode($products);

// 输出JavaScript代码到HTML中，使其在浏览器控制台中打印数据
echo "<script>console.log('PHP Data: ', JSON.parse('$jsonData'));</script>";
?>

<section class="text-gray-600 body-font">

  <div class="container px-5 py-24 mx-auto">
    <div class="flex w-full mb-20 flex-wrap">
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4"><?php echo "Shop " . $category . " Essentials"; ?></h1>
      <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">Gear up with our curated selection of <?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?> essentials. From advanced sneakers for superior agility to the perfect <?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?> for every game, we've got your needs covered. Embrace comfort and style with our athletic wear designed for peak performance. Elevate your game today with our top-notch equipment and accessories. Shop now and step up your play.</p>
      <!-- <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">Gear up with our curated selection of basketball essentials. From advanced sneakers for superior agility to the perfect basketball for every game, we've got your needs covered. Embrace comfort and style with our athletic wear designed for peak performance. Elevate your game today with our top-notch equipment and accessories. Shop now and step up your play.</p> -->
    </div>
    <div class="flex flex-wrap -m-4">
      <?php
    

      // 创建一个产品数组，包含每个产品的信息
    // $products = [
    //     ["id" => 1, "image" => "./imgs/shoe (1).jpg", "name" => "The Catalyzer", "price" => "16.00", "size" => [41, 42, 43, 44, 45],"info"=>"With maximum cushioning to support every mile, the Invincible 3 gives you our highest level of comfort underfoot to help you stay on your feet today, tomorrow and beyond. Designed to help keep you on the run, it's super supportive and bouncy, so that you can propel down your preferred path and come back for your next run feeling ready and reinvigorated."],
    //     ["id" => 2, "image" => "./imgs/shoe (2).jpg", "name" => "Shooting Stars", "price" => "24.00", "size" => [41, 42, 43, 44, 45],"info"=>"Step into a classic. This AJ4 throws it back with full-grain leather and premium textiles. Iconic design elements from the original, like floating eyestays and mesh-inspired accents, feel just as fresh as they did in '89."],
    //     ["id" => 3, "image" => "./imgs/shoe (3).jpg", "name" => "Shooting Stars", "price" => "30.00", "size" => [41, 42, 43, 44, 45],"info"=>"Clean and supreme, the legendary Tinker Hatfield AJ3 design that solidified MJ's place in sneaker lore returns. Taking colour-blocking cues from a heritage AJ3 colourway, this edition swaps in Midnight Navy against a white and Cement Grey backdrop. Luxe materials and our signature elephant print elevate every step. "],
    //     ["id" => 4, "image" => "./imgs/shoe (4).jpg", "name" => "Shooting Stars", "price" => "27.00", "size" => [41, 42, 43, 44, 45],"info"=>"Take note: the adults in your life might have rules, but they can also inspire some amazing drip. Inspired by the wallpaper in MJ's childhood home, this AJ1 rocks bold florals and colour-blocked canvas."],
    //     ["id" => 5, "image" => "./imgs/shoe (5).jpg", "name" => "Shooting Stars", "price" => "28.00", "size" => [41, 42, 43, 44, 45],"info"=>"How do you want your game to be remembered? Preserve your place among the greats, like Giannis, in the Giannis Immortality 3. Mindfully made for today's high-paced, position-less game, it's softer than the previous iteration with a specific traction pattern that's perfect for pulling off the perfect Euro step en route to glory."],
    //     ["id" => 6, "image" => "./imgs/shoe (6).jpg", "name" => "Shooting Stars", "price" => "25.00", "size" => [41, 42, 43, 44, 45],"info"=>"Here's your AJ4 done up in classic colours. This AJ4 is built to the original specs and constructed of full-grain leather and textiles for a solid feel. And all your favourite AJ4 elements are there, like the floating eyestays and the mesh-inspired side panels and tongue.Colour Shown: Blac"],
    //     ["id" => 7, "image" => "./imgs/shoe (7).jpg", "name" => "Shooting Stars", "price" => "24.00", "size" => [41, 42, 43, 44, 45],"info"=>"The radiance lives on in the Air Force 1 '07, the b-ball icon that puts a fresh spin on what you know best: crisp materials, bold colours and the perfect amount of flash to make you shine."],
    //     ["id" => 8, "image" => "./imgs/shoe (8).jpg", "name" => "Shooting Stars", "price" => "55.00", "size" => [41, 42, 43, 44, 45],"info"=>"Layers upon layers of dimensional style—that's a force to be reckoned with. Offering both comfort and versatility, these kicks are rooted in heritage basketball culture. The collar materials pay homage to vintage sport while the subtle platform elevates your look, literally. The Gamma Force is forging its own legacy: court style that can be worn all day, wherever you go."],
    //     // 其他商品
    // ];
      // 使用for循环生成产品列表
      for ($i = 0; $i < count($products); $i++) {
        ?>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="detail.php?id=<?php echo $products[$i]['product_id']; ?>" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="<?php echo $products[$i]['image']; ?>">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><?php echo ucfirst($category); ?></h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">$<?php echo $products[$i]['price']; ?></h2>
                    <p class="mt-1"><?php echo $products[$i]['name']; ?></p>
                </div>
            </div>
        <?php
        }
      ?>
    </div>
  </div>
</section>

<?php
$currentScript = basename($_SERVER['PHP_SELF']);
if ($currentScript != 'index.php') {
    include 'footer.php';
}
$stmt->close();
$conn->close();
?>