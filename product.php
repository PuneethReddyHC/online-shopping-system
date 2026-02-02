<?php
include "header.php";
?>
<!-- OneMobile Product View -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){		
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
        });
    });
</script>
<script>
    (function (global) {
        if(typeof (global) === "undefined") {
            throw new Error("window is undefined");
        }
        var _hash = "!";
        var noBackPlease = function () {
            global.location.href += "#";
            global.setTimeout(function () {
                global.location.href += "!";
            }, 50);
        };	
        global.onhashchange = function () {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
            }
        };
        global.onload = function () {        
            noBackPlease();
            document.body.onkeydown = function (e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                    e.preventDefault();
                }
                e.stopPropagation();
            };		
        };
    })(window);
</script>

<!-- SECTION -->
<div class="section main main-raised">
    <div class="container">
        <div class="row">
            <?php 
            include 'db.php';
            // Security: Cast to integer to prevent SQL injection
            $product_id = (int)$_GET['p'];
            
            $sql = "SELECT * FROM products WHERE product_id = $product_id";
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                    </div>
                </div>
                
                <div class="col-md-2 col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                        <div class="product-preview"><img src="product_images/'.$row['product_image'].'" alt=""></div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">'.$row['product_title'].'</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                            </div>
                            <a class="review-link" href="#review-form">Verified OneMobile Reviews</a>
                        </div>
                        <div>
                            <h3 class="product-price">€'.$row['product_price'].'<del class="product-old-price">€990.00</del></h3>
                            <span class="product-available">In Stock - Ready for Shipping in Kosovo</span>
                        </div>
                        <p>Experience the best of mobile technology with OneMobile. This device comes with a full local warranty valid in Pristina and across all Kosovo regions.</p>

                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <div class="btn-group" style="margin-left: 25px; margin-top: 15px">
                                <button class="primary-btn add-to-cart-btn" pid="'.$row['product_id'].'" id="product"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>

                        <ul class="product-links">
                            <li>Share OneMobile:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="mailto:oneMobile@gmail.com"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">OneMobile Support</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews (OneMobile Community)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p>This premium product is strictly tested by OneMobile engineers. We ensure that every device sold in Kosovo meets the highest quality standards. Enjoy high performance, sleek design, and the latest software updates.</p>
                            </div>
                            <div id="tab2" class="tab-pane fade">
                                <p>Need help? Contact OneMobile Kosovo Support:<br>
                                Phone: <strong>+383 44 '.rand(100,999).' '.rand(100,999).'</strong><br>
                                Email: <strong>oneMobile@gmail.com</strong></p>
                            </div>
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">Arben (Pristina)</h5>
                                                    <p class="date">12 JAN 2024</p>
                                                    <div class="review-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                                </div>
                                                <div class="review-body"><p>Great service from OneMobile, delivered fast in Kosovo!</p></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form">
                                                <input class="input" type="text" placeholder="Your Name">
                                                <input class="input" type="email" placeholder="oneMobile@gmail.com">
                                                <textarea class="input" placeholder="Your OneMobile Experience"></textarea>
                                                <button class="primary-btn">Submit Review</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
                $_SESSION['product_id'] = $row['product_id'];
                }
            } 
            ?>	
            
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related in OneMobile Store</h3>
                </div>
            </div>

            <?php
            $product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id != $product_id LIMIT 4";
            $run_query = mysqli_query($con,$product_query);
            while($row = mysqli_fetch_array($run_query)){
                $pro_id    = $row['product_id'];
                $pro_title = $row['product_title'];
                $pro_price = $row['product_price'];
                $pro_image = $row['product_image'];
                $cat_name  = $row["cat_title"];

                echo "
                <div class='col-md-3 col-xs-6'>
                    <div class='product'>
                        <a href='product.php?p=$pro_id'>
                            <div class='product-img'>
                                <img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
                            </div>
                        </a>
                        <div class='product-body'>
                            <p class='product-category'>$cat_name</p>
                            <h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
                            <h4 class='product-price'>€$pro_price</h4>
                        </div>
                        <div class='add-to-cart'>
                            <button pid='$pro_id' id='product' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>

<?php
include "newslettter.php";
include "footer.php";
?>