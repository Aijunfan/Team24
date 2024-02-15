<?php
$currentScript = basename($_SERVER['PHP_SELF']);
if ($currentScript != 'index.php') {
  include 'header.php';
}

require 'db_config.php';

// 获取搜索词
$searchQuery = isset($_GET['query']) ? "%" . $_GET['query'] . "%" : null;
// 修改SQL查询来基于搜索词过滤产品
$query = "SELECT product_id, name, price, image, category FROM Products WHERE name LIKE ? OR category LIKE ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $searchQuery, $searchQuery);
$stmt->execute();
$result = $stmt->get_result();

// 获取所有匹配的产品数据
$products = [];
while ($row = $result->fetch_assoc()) {
  $products[] = $row;
}

// 关闭数据库连接
$stmt->close();
$conn->close();
?>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <?php if (empty($products)): ?>
      <!-- 如果没有搜索结果 -->
      <div class="text-center">
        <h2 class="text-lg text-gray-900 font-medium">No results found</h2>
        <p class="mt-3 text-base text-gray-600">We couldn't find any products matching your search.</p>
        <p class="mt-4"><a href="index.php" class="text-indigo-500">Return to homepage</a></p>
      </div>
    <?php else: ?>
      <!-- 如果有搜索结果 -->
      <div class="flex flex-wrap -m-4">
        <?php foreach ($products as $product): ?>
          <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
            <a href="detail.php?id=<?php echo htmlspecialchars($product['product_id']); ?>"
              class="block relative h-48 rounded overflow-hidden">
              <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                src="<?php echo htmlspecialchars($product['image']); ?>">
            </a>
            <div class="mt-4">
              <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                <?php echo htmlspecialchars(ucfirst($product['category'])); ?>
              </h3>
              <h2 class="text-gray-900 title-font text-lg font-medium">$
                <?php echo htmlspecialchars($product['price']); ?>
              </h2>
              <p class="mt-1">
                <?php echo htmlspecialchars($product['name']); ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php
if ($currentScript != 'index.php') {
  include 'footer.php';
}
?>