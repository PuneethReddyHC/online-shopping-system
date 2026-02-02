<?php
require_once 'config.php';
require_once 'header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">Kosovo's Premium Mobile Technology Store</h1>
                    <p class="hero-subtitle">Experience the latest smartphones, tablets, and accessories with local warranty and expert support.</p>
                    <div class="hero-badges">
                        <span class="badge"><i class="fas fa-shield-alt"></i> 2-Year Warranty</span>
                        <span class="badge"><i class="fas fa-truck"></i> Free Pristina Delivery</span>
                        <span class="badge"><i class="fas fa-headset"></i> 24/7 Support</span>
                    </div>
                    <div class="hero-actions">
                        <a href="products.php" class="btn btn-primary btn-lg">Shop Now</a>
                        <a href="#featured" class="btn btn-outline btn-lg">View Deals</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <img src="assets/images/hero-devices.png" alt="Latest Mobile Devices" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="categories-section">
    <div class="container">
        <div class="section-header">
            <h2>Shop by Category</h2>
            <p>Find exactly what you're looking for</p>
        </div>
        <div class="row">
            <?php
            $conn = getDBConnection();
            $sql = "SELECT * FROM categories WHERE is_active = TRUE AND parent_id IS NULL ORDER BY sort_order LIMIT 6";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0):
                while($category = $result->fetch_assoc()):
            ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <a href="products.php?category=<?php echo $category['slug']; ?>" class="category-card">
                    <div class="category-image">
                        <img src="<?php echo $category['image_url'] ?: 'assets/images/category-default.jpg'; ?>" 
                             alt="<?php echo htmlspecialchars($category['name']); ?>">
                    </div>
                    <div class="category-info">
                        <h4><?php echo htmlspecialchars($category['name']); ?></h4>
                        <p><?php echo htmlspecialchars($category['description']); ?></p>
                        <span class="category-link">Shop Now <i class="fas fa-arrow-right"></i></span>
                    </div>
                </a>
            </div>
            <?php
                endwhile;
            endif;
            $conn->close();
            ?>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section id="featured" class="products-section">
    <div class="container">
        <div class="section-header">
            <h2>Featured Products</h2>
            <p>Our most popular items this week</p>
        </div>
        <div class="product-grid">
            <?php
            $conn = getDBConnection();
            $sql = "SELECT p.*, c.name as category_name, b.name as brand_name 
                    FROM products p 
                    LEFT JOIN categories c ON p.category_id = c.id 
                    LEFT JOIN brands b ON p.brand_id = b.id 
                    WHERE p.is_active = TRUE AND p.is_featured = TRUE 
                    ORDER BY p.created_at DESC 
                    LIMIT 8";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0):
                while($product = $result->fetch_assoc()):
            ?>
            <div class="product-card">
                <?php if($product['compare_price']): ?>
                <span class="product-badge">Save <?php echo round(100 - ($product['price'] / $product['compare_price'] * 100)); ?>%</span>
                <?php endif; ?>
                
                <div class="product-image">
                    <a href="product.php?id=<?php echo $product['id']; ?>">
                        <img src="assets/products/<?php echo $product['sku']; ?>/main.jpg" 
                             alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </a>
                </div>
                
                <div class="product-info">
                    <div class="product-category"><?php echo htmlspecialchars($product['brand_name']); ?></div>
                    <h3 class="product-title">
                        <a href="product.php?id=<?php echo $product['id']; ?>">
                            <?php echo htmlspecialchars($product['name']); ?>
                        </a>
                    </h3>
                    
                    <div class="product-price">
                        <span class="current-price">€<?php echo number_format($product['price'], 2); ?></span>
                        <?php if($product['compare_price']): ?>
                        <span class="original-price">€<?php echo number_format($product['compare_price'], 2); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-count">(42)</span>
                    </div>
                    
                    <div class="product-actions">
                        <button class="btn-add-cart" data-product-id="<?php echo $product['id']; ?>">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                        <button class="btn-wishlist" data-product-id="<?php echo $product['id']; ?>">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            else:
            ?>
            <div class="col-12">
                <div class="alert alert-info">No featured products available at the moment.</div>
            </div>
            <?php
            endif;
            $conn->close();
            ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="products.php" class="btn btn-outline btn-lg">View All Products</a>
        </div>
    </div>
</section>

<!-- Brands Section -->
<section class="brands-section">
    <div class="container">
        <div class="section-header">
            <h2>Trusted Brands</h2>
            <p>We carry only the best brands</p>
        </div>
        <div class="brands-slider">
            <?php
            $conn = getDBConnection();
            $sql = "SELECT * FROM brands WHERE is_active = TRUE ORDER BY name LIMIT 10";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0):
                while($brand = $result->fetch_assoc()):
            ?>
            <div class="brand-item">
                <a href="brand.php?slug=<?php echo $brand['slug']; ?>">
                    <img src="<?php echo $brand['logo_url'] ?: 'assets/brands/default.jpg'; ?>" 
                         alt="<?php echo htmlspecialchars($brand['name']); ?>">
                </a>
            </div>
            <?php
                endwhile;
            endif;
            $conn->close();
            ?>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h4>Free Shipping</h4>
                    <p>Free delivery in Pristina for orders over €50</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>2-Year Warranty</h4>
                    <p>Full warranty on all products purchased</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h4>14-Day Returns</h4>
                    <p>Easy returns within 14 days of purchase</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Our team is always here to help you</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'footer.php';
?>