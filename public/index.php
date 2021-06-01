<?php require_once("../private/initialize.php"); ?>

<?php include(SHARED_PATH . "/mall_header.php"); ?>

<style>
    <?php include("stylesheet/cookie-message.css"); ?>
</style>

<?php $page_title="Black Lotus| E-commerce Shopping Mall"; ?>

    <body>     
        <!----------------Cookie Message------------------------->
        <div class="container-cookie">
            <!-- <img src="/assets/cookie.webp" alt="cookie"> -->
            <div class="message-content">
                <header>I USE COOKIES</header>
                <p>Black Lotus uses cookies necessary for its basic functioning. By continuing browsing, you consent to its use of cookies and other technologies.</p>
            </div>
            <div class="buttons">
                <button class="item">I understand</button>
                <a href="copyright.php">Learn More</a>
            </div>
        </div>
        <script>
            const cookieBox = document.querySelector(".container-cookie"),
            acceptBtn = cookieBox.querySelector(".buttons button");
            // setting cookies for 1 day, after which time the cookie will automatically expire//
            acceptBtn.onclick = ()=>{
                document.cookie = "CookieBy=BlackLotus; max-age="+60*60*24;
                if(document.cookie){
                    //if the above cookie set
                    cookieBox.classList.add("hide"); //hide cookie box message once cookie is set
                }
                else{
                    alert("Cookie can't be set!"); //if cookie can't be set alert an error
                }
            }
            //Hide cookie box if cookie is set and not expired//
            let checkCookie = document.cookie.indexOf("CookieBy=BlackLotus"); // check Lotus' set cookies
            //if cookie is set then hide the cookie box else show it
            checkCookie != -1 ? cookieBox.classList.add("hide"): cookieBox.classList.remove("hide");
        </script>   

        <div class="header">
            <div class="header-container">
                <div class="row">
                    <div class="column-2">
                        <h1>The Lotus<br>has blossomed!</h1>
                        <p>Come try our new online mall with a variety of shops available.<br>From tech to fashion, all yours for the taking!</p>
                        <a href="store1.php" class="btn">Explore Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>

        <!---news slider-->
        <div class="container-news-roll">
            <div class="news-roll">
                <figure>
                    <img src="../assets/slider_image_1.webp" alt="slider_image_1">
                    <img src="../assets/slider_image_2.webp" alt="slider_image_2">
                    <img src="../assets/slider_image_1.webp" alt="slider_image_1">
                    <img src="../assets/slider_image_3.webp" alt="slider_image_3">
                    <img src="../assets/slider_image_1.webp" alt="slider_image_1">
                </figure>
            </div>
        </div>
        <!------------------------------------featured stores------------------------------------->
        <!-- open and read stores csv -->
<<<<<<< HEAD
        
=======
        <?php
            function all_stores(){
            $file_name = 'csv_files/stores.csv';
            $file_reading = fopen($file_name, 'r');
            $first = fgetcsv($file_reading);
            $stores = [];
            while ($row = fgetcsv($file_reading)){
                $count = 0;
                $product = [];
                foreach ($first as $col_name) {
                    $store[$col_name] = $row[$count];
                    $count++;
                }
                $stores[] = $store;
            }
            return $stores;
            }

            function get_store($store_id) {
                $stores = all_stores();
                foreach ($stores as $s) {
                    if ($s['featured'] == 'TRUE') {
                        return $s;
                    }
                }
                return false;
            }
        ?>
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
        <div class="small-container-3">
            <div class="title-store">
                <h1>Featured Stores</h1>
            </div>
        <!-- Display featured stores based on true false value in csv file -->
        <?php
<<<<<<< HEAD
            echo "<div class=\"row-2\">";
=======
            echo "<div class=\"small-container\">";
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
            $stores = all_stores();
            $count = 0;
            foreach ($stores as $store) {
                if ($store['featured'] == 'TRUE') {
                    $name = $store['name'];
                    echo "<div class=\"column-3\">
                    <a class='hover-mouse' href=\"store1.php\">
                    <img src=\"../assets/amazon-logo-featured-stores.webp\" alt=\"amazon-logo-featured-stores\">
                    <h3>$name</h3>
                    </a>
                    </div>";
                    $count++;
                    if ($count == 10) {
                        break;
                    }
                }
            }
            echo "</div>";
        ?>
<<<<<<< HEAD
=======
            <!-- <div class="small-container">
                <div class="row-2">
                    <div class="column-3">
                        <a class='hover-mouse' href="store1.php">
                            <img src="assets/amazon-logo-featured-stores.webp" alt="amazon-logo-featured-stores">
                            <h3>Amazon</h3>
                        </a>
                    </div>
                    <div class="column-3">
                        <a class='hover-mouse' href="Yeet.php">
                            <img src="assets/chanel-featured stores.webp" alt="gaming-mouse">
                            <h3>Chanel</h3>
                        </a>
                    </div>
                    <div class="column-3">
                        <a class='hover-mouse' href="store1.php">
                            <img src="assets/Louis Vuiton.webp" alt="shoes-category-3">
                            <h3>Louis Vuiton</h3>
                        </a>
                    </div>
                </div>
            </div> -->
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
        </div>
        <!--------------------------------------featured categories--------------------------------------->
        <div class="categories">
            <div class="title-store">
                <h1>Features Categories</h1>
            </div>
            <div class="small-container">
                <div class="row-2">
                    <div class="column-3">
                        <a class='hover-mouse' href='spring.php'>
                        <img src="../assets/fashion-men-category-4.webp" alt="autumn-outfit-1">
                        <h3>FASHION</h3>
                        </a>
                    </div>
                    <div class="column-3">
                        <a class='hover-mouse' href='autumn.php'>
                        <img src="../assets/razer_category_2.webp" alt="gaming-mouse">
                        <h3>GAMING TECH</h3>
                    </a>
                    </div>
                    <div class="column-3">
                        <a class='hover-mouse' href='winter.php'>
                        <img src="../assets/shoes-category-3.webp" alt="shoes-category-3">
                        <h3>FOOTWEAR</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-----------------------------------------featured products---------------------------------------------->
        <!-- open and read products csv -->
<<<<<<< HEAD
=======
        <?php
            function all_products(){
                $file_name = 'csv_files/products.csv';
                $file_reading = fopen($file_name, 'r');
                $first = fgetcsv($file_reading);
                $products = [];
                while ($row = fgetcsv($file_reading)){
                    $count = 0;
                    $product = [];
                    foreach ($first as $col_name) {
                        $product[$col_name] = $row[$count];
                        $count++;
                    }
                     $products[] = $product;
                }
                return $products;
            }   

            function get_product($product_id) {
                $products = all_products();
                foreach ($products as $p) {
                    if ($p['id'] == $product_id){
                        return $p;
                    }
        
                }
                return false;
            }
        ?>
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063

        <div class="small-container-3">
            <div class="title-store">
                <h1>Featured Products</h1>
            </div>
            <!-- Display featured products based on true false value in csv file -->
            <?php
<<<<<<< HEAD
                echo "<div class=\"row-2\">";
=======
                echo "<div class=\"small-container\">";
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
                $products = all_products();
                $count = 0;
                foreach ($products as $product) {
                    if ($product['featured_in_mall'] == 'TRUE') {
                        $name = $product['name'];
                        $price = $product['price'];
                        echo "<div class=\"column-4\">
                        <a href='detailpage.php'>
<<<<<<< HEAD
                        <img src=\"../assets/autumn4.webp\" alt=\"autumn-outfit-4\">
=======
                        <img src=\"assets/autumn4.webp\" alt=\"autumn-outfit-4\">
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
                        <h4 class='hover-mouse'>$name</h4>
                        <div class=\"rating\">
                            <i class=\"fa fa-star\" aria-hidden=\"true\"></i>
                            <i class=\"fa fa-star\" aria-hidden=\"true\"></i>
                            <i class=\"fa fa-star\" aria-hidden=\"true\"></i>
                            <i class=\"fa fa-star\" aria-hidden=\"true\"></i>
                            <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>
                        </a>
                        </div>
                        <p>$price</p>
                    </div>";
                        $count++;
                        if ($count == 10) {
                            break;
                        }
                    }
                }
            echo "</div>";
<<<<<<< HEAD
            ?> 
=======
            ?>
            <!-- <div class="row-3">
                <div class="column-4">
                    <a href='detailpage.php'>
                    <img src="assets/autumn4.webp" alt="autumn-outfit-4">
                    <h4 class='hover-mouse'>BLACK AUTUMN JACKET </h4>
                    <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </a>
                    </div>
                    <p>VND 560,000</p>
                </div>
                <div class="column-4">
                    <a href='detailpage.php'>
                        <img src="assets/autumn1.webp" alt="autumn-outfit-1">
                        <h4 class='hover-mouse'> BLACK JEAN JACKET</h4>
                        <div class="rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                    </a>
                    </div>
                    <p>VND 480,000</p>
                </div>
                <div class="column-4">
                    <a href='detailpage.php'>
                        <img src="assets/autumn3.webp" alt="autumn-outfit-3">
                        <h4 class='hover-mouse'>LONG BLACK FUR COAT</h4>
                        <div class="rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                    </a>
                    </div>
                    <p>VND 355,000</p>
                </div>
                <div class="column-4">
                    <a href='detailpage.php'>
                        <img src="assets/autumn2.webp" alt="autumn-outfit-4">
                        <h4 class='hover-mouse'>CASUAL ORANGE TURTLE NECK</h4>
                        <div class="rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </a>
                    </div>
                    <p>VND 150,000</p>
                </div>
            </div> -->
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
        </div>
<!-------------------------------------New Products------------------------------------------>

<!-- sort products from products csv and display them by created time -->
<div class="small-container-3">
    <div class="title-store">
        <h1>Latest Products</h1>
    </div>
    <?php
        function sort_products(){
            $products = all_products();
            $p_sort = $products;
            array_multisort(array_map('strtotime', array_column($p_sort, 'created_time')), SORT_DESC, $p_sort);
            return $p_sort;
        }
        echo "<div id=\"slider_1\" class=\"row-4\"";
        $p_sort = sort_products();
        $count = 0;
        foreach ($p_sort as $sort) {
            $name = $sort['name'];
            $price = $sort['price'];
            echo "<div id=\"slide_store_1\" class=\"column-5\">
            <a href=\"store1.php\">
<<<<<<< HEAD
                <img src=\"../assets/casual_black_1.webp\" alt=\"spring-outfit-1\">
=======
                <img src=\"assets/casual_black_1.webp\" alt=\"spring-outfit-1\">
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
                <h4 class=\"hover-mouse\">$name/h4>
                <div class=\"rating\">
                    <i class=\"fa fa-star\" aria-hidden=\"true\"></i>
                    <i class=\"fa fa-star\" aria-hidden=\"true\"></i>
                    <i class=\"fa fa-star\" aria-hidden=\"true\"></i>
                    <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>
                    <i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>
                </div>
                <p>$price</p>
            </a>
            </div>";
            $count++;
            if ($count == 10) {
                break;
            }
        }
        echo "</div>";
    ?>
<<<<<<< HEAD
=======
        
    <!-- <div id="slider_1" class="row-4">
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/casual_black_1.webp" alt="spring-outfit-1">
                <h4 class='hover-mouse'>CASUAL BLACK BLOUSE</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>VND 188,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
                <a href="store1.php">
                    <img src="assets/casual_black_2.webp" alt="spring-outfit-2">
                    <h4 class='hover-mouse'>DARK GREEN SHIRT</h4>
                    <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <p>VND 280,000</p>
                </a>
        </div>
        <div id="slide_store_1" class="column-5">
                <a href="store1.php">
                    <img src="assets/casual_white_1.webp" alt="spring-outfit-3">
                    <h4 class='hover-mouse'>NEON GREEN T-SHIRT</h4>
                    <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <p>VND 150,000</p>
                </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/casual_white_2.webp" alt="spring-outfit-4">
                <h4 class='hover-mouse'>WHITE COTTON SHIRT</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>VND 245,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/casual_black_3.webp" alt="spring-outfit-5">
                <h4 class='hover-mouse'>BLACK SWEATER</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>VND 185,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/casual_black_1.webp" alt="spring-outfit-1">
                <h4 class='hover-mouse'>CASUAL BLACK BLOUSE</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>VND 188,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/autumn5.webp" alt="autumn-5">
                <h4 class='hover-mouse'>BEIGE BLAZER</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>VND 545,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/autumn6.webp" alt="autumn-outfit-6">
                <h4 class='hover-mouse'>LONG NEPETA DRESS</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>VND 230,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/summer4.webp" alt="summer-outfit-4">
                <h4 class='hover-mouse'>SHORT SLEEVE BLOUSE</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>VND 424,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/summer7.webp" alt="summer-outfit-7">
                <h4 class='hover-mouse'>CASUAL BLACK BLOUSE</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>VND 265,000</p>
            </a>
        </div>
        <div id="slide_store_1" class="column-5">
            <a href="store1.php">
                <img src="assets/winter6.webp" alt="winter-outfit-6">
                <h4 class='hover-mouse'>GREY LOOSE SWEATER</h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>VND 150,000</p>
            </a>
        </div>
    </div> -->
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
</div>
 <!---------------------------------------New Stores-------------------------------->
<?php

?>
<div class="small-container-3">
    <div class="title-store">
        <h1>New Stores</h1>
    </div>
    <?php
        function sort_stores(){
            $stores= all_stores();
            $s_sort = $stores;
            array_multisort(array_map('strtotime', array_column($s_sort, 'created_time')), SORT_DESC, $s_sort);
            return $s_sort;
        }
        echo "<div id=\"slider_2\" class=\"row-4\"";
        $s_sort = sort_products();
        $count = 0;
        foreach ($s_sort as $sort) {
            $name = $sort['name'];
            echo "<div id=\"slide_store_2\" class=\"column-6\">
            <a href=\"store1.php\">
<<<<<<< HEAD
                <img src=\"../assets/balenciaga.webp\">
=======
                <img src=\"assets/balenciaga.webp\">
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
                <h4 class=\"hover-mouse\"><strong>$name</strong></h4>
            </a>
            </div>";
            $count++;
            if ($count == 10) {
                break;
            }
        }
        echo "</div>";
    ?>
<<<<<<< HEAD
=======

    <!-- <div id="slider_2" class="row-4">
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/balenciaga.webp">
                <h4 class='hover-mouse'><strong>BALENCIAGA</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/seven-eleven.webp">
                <h4 class='hover-mouse'><strong>SEVEN-ELEVEN</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/McDonalds.webp">
                <h4 class='hover-mouse'><strong>MCDONALDS</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/GUCCI.webp">
                <h4 class='hover-mouse'><strong>GUCCI</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/H&M.webp">
                <h4 class='hover-mouse'><strong>H&M</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/balenciaga.webp">
                <h4 class='hover-mouse'><strong>BALENCIAGA</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/patagonia.webp">
                <h4 class='hover-mouse'><strong>PATAGONIA</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/xiaomi.webp">
                <h4 class='hover-mouse'><strong>XIAOMI</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/subway.webp">
                <h4 class='hover-mouse'><strong>SUBWAY</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/tesla.webp">
                <h4 class='hover-mouse'><strong>TESLA</strong></h4>
            </a>
        </div>
        <div id="slide_store_2" class="column-6">
            <a href="store1.php">
                <img src="assets/coca_cola.webp">
                <h4 class='hover-mouse'><strong>COCA COLA</strong></h4>
            </a>
        </div>
    </div> -->
>>>>>>> d76ca5de05274760b2e1a3c88d8f57021874a063
</div>
</body>

<?php include(SHARED_PATH . "/mall_footer.php"); ?>

<button id="up-arrow" onclick="topfunction()" title="Go to top"><i class="fa fa-arrow-circle-up"></i></button>
<script type="text/javascript" src="shared.js"></script>
<script src="auto-sliders.js" type="text/javascript"></script>