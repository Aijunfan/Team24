<!-- index.php -->
<?php include 'header.php'; ?>
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap">
    <div class="flex w-full mb-20 flex-wrap">
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">New Arrivals</h1>
      <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">Sabrina Ionescu’s love for the Big Apple started in 2020, when her team drafted her first overall. This special design highlights her team colors and salutes the city where it all started. Her signature shoe helps you unlock your versatility with a snappy forefoot Zoom Air unit and cloud-like React foam to help keep you energized. We used insights from next-gen athletes of all genders around the world to bring grippy, best-in-class traction, reliable midfoot support and stability to the court—which every hooper needs. Built for crafty players like Sabrina, but made for anyone who's ready to put in the work to take their game to the next level.</p>
    </div>
    <div class="flex flex-wrap md:-m-2 -m-1">
      <div class="flex flex-wrap w-1/2">
        <div class="md:p-2 p-1 w-1/2">
          <img alt="gallery" class="w-full object-cover h-full object-center block" src="./image/basketball/air-jordan-1-mid-shoes-MVp2kJ.jpg">
        </div>
        <div class="md:p-2 p-1 w-1/2">
            <img alt="gallery" class="w-full h-full object-cover object-center block" src="./image/basketball/air-jordan-1-mid-shoes-MVp2kJ.png">
        </div>
        <div class="md:p-2 p-1 w-full">
            <img alt="gallery" class="w-full object-cover h-full object-center block" src="./image/basketball/air-jordan-1-mid-shoes-MVp2kJ (2).png">
        </div>
      </div>
      <div class="flex flex-wrap w-1/2">
        <div class="md:p-2 p-1 w-full">
        <img alt="gallery" class="w-full object-cover h-full object-center block" src="./image/basketball/free-metcon-5-mens-workout-shoes-H0Qszz.png">
        </div>
        <div class="md:p-2 p-1 w-1/2">
        <img alt="gallery" class="w-full object-cover h-full object-center block" src="./image/basketball/free-metcon-5-mens-workout-shoes-H0Qszz.jpg">
        </div>
        <div class="md:p-2 p-1 w-1/2">
        <img alt="gallery" class="w-full h-full object-cover object-center block" src="./image/basketball/free-metcon-5-mens-workout-shoes-H0Qszz (1).png">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="text-gray-600 body-font">

  <div class="container px-5 py-24 mx-auto">
    <div class="flex w-full mb-20 flex-wrap">
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">Shop Basketball Essentials</h1>
      <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">Gear up with our curated selection of basketball essentials. From advanced sneakers for superior agility to the perfect basketball for every game, we've got your needs covered. Embrace comfort and style with our athletic wear designed for peak performance. Elevate your game today with our top-notch equipment and accessories. Shop now and step up your play.</p>
    </div>
    <div class="flex flex-wrap -m-4">
      <?php
      // 创建一个产品数组，包含每个产品的信息
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
    ];;

      // 使用for循环生成产品列表
      for ($i = 0; $i < count($products); $i++) {
        ?>
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="detail.php?id=<?php echo $products[$i]['id']; ?>" class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="<?php echo $products[$i]['image']; ?>">
                </a>
                <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
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

    

<?php include 'footer.php'; ?>