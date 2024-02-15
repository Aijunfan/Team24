<?php
$currentScript = basename($_SERVER['PHP_SELF']);
if ($currentScript != 'index.php') {
    include 'header.php';
}
require 'db_config.php';
      // 假设类目通过URL参数传递，例如 products.php?category=basketball
    $category = isset($_GET['category']) ? $_GET['category'] : 'basketball';
    $query = "SELECT product_id, name, price, image, category FROM Products WHERE category=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // 将数据转换为JSON格式
    // $jsonData = json_encode($products);

// 输出JavaScript代码到HTML中，使其在浏览器控制台中打印数据
// echo "<script>console.log('PHP Data: ', JSON.parse('$jsonData'));</script>";
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