<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> - Kosovo's Mobile Technology Leader</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="OneMobile Shop Kosovo - Premium smartphones, tablets, laptops and accessories with Kosovo warranty and support">
    <meta name="keywords" content="mobile kosovo, smartphones pristina, tablets kosovo, laptops kosovo, mobile accessories">
    <meta name="author" content="OneMobile Shop Kosovo">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo SITE_NAME; ?>">
    <meta property="og:description" content="Kosovo's leading mobile technology store">
    <meta property="og:image" content="https://onemobile-ks.com/assets/logo-og.jpg">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- JavaScript -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    
    <style>
        :root {
            --primary-color: #2A5CAA;
            --primary-dark: #1E4788;
            --primary-light: #4A7FC6;
            --secondary-color: #FF6B35;
            --dark-color: #1A1A2E;
            --light-color: #F8F9FA;
            --success-color: #28A745;
            --warning-color: #FFC107;
            --danger-color: #DC3545;
            --border-radius: 8px;
            --box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        
        .brand-logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="top-bar-info">
                        <span><i class="fas fa-phone-alt"></i> <?php echo SITE_PHONE; ?></span>
                        <span><i class="fas fa-envelope"></i> <?php echo SITE_EMAIL; ?></span>
                        <span><i class="fas fa-map-marker-alt"></i> <?php echo SITE_ADDRESS; ?></span>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="top-bar-links">
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <a href="account.php"><i class="fas fa-user"></i> My Account</a>
                            <a href="orders.php"><i class="fas fa-shopping-bag"></i> Orders</a>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        <?php else: ?>
                            <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                            <a href="register.php"><i class="fas fa-user-plus"></i> Register</a>
                        <?php endif; ?>
                        <a href="#" class="currency-selector"><?php echo SITE_CURRENCY; ?> EUR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="logo">
                        <a href="index.php">
                            <span class="brand-logo">OneMobile</span>
                            <small class="logo-tagline">Kosovo's Tech Hub</small>
                        </a>
                    </div>
                </div>
                
                <!-- Search Bar -->
                <div class="col-lg-6 col-md-8 d-none d-md-block">
                    <div class="search-box">
                        <form action="search.php" method="GET" class="search-form">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" placeholder="Search for smartphones, tablets, accessories..." aria-label="Search">
                                <select class="form-select" name="category">
                                    <option value="">All Categories</option>
                                    <option value="smartphones">Smartphones</option>
                                    <option value="tablets">Tablets</option>
                                    <option value="laptops">Laptops</option>
                                    <option value="accessories">Accessories</option>
                                </select>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Cart & Actions -->
                <div class="col-lg-3 col-md-12 col-6">
                    <div class="header-actions">
                        <div class="action-item wishlist">
                            <a href="wishlist.php">
                                <i class="fas fa-heart"></i>
                                <span class="action-count">0</span>
                            </a>
                        </div>
                        <div class="action-item cart">
                            <a href="cart.php" class="cart-toggle">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="action-count cart-count">0</span>
                                <span class="cart-total">€0.00</span>
                            </a>
                            <!-- Mini Cart Dropdown -->
                            <div class="mini-cart">
                                <div class="mini-cart-header">
                                    <h6>Shopping Cart</h6>
                                </div>
                                <div class="mini-cart-body">
                                    <div class="empty-cart">
                                        <p>Your cart is empty</p>
                                    </div>
                                </div>
                                <div class="mini-cart-footer">
                                    <a href="cart.php" class="btn btn-primary btn-sm">View Cart</a>
                                    <a href="checkout.php" class="btn btn-secondary btn-sm">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <div class="action-item mobile-menu-toggle">
                            <button class="btn" id="mobileMenuToggle">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Navigation -->
    <nav class="main-navigation">
        <div class="container">
            <div class="nav-container">
                <!-- Categories Menu -->
                <ul class="main-menu">
                    <li class="active"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="products.php?category=smartphones">Smartphones</a></li>
                    <li><a href="products.php?category=tablets">Tablets</a></li>
                    <li><a href="products.php?category=laptops">Laptops</a></li>
                    <li><a href="products.php?category=accessories">Accessories</a></li>
                    <li><a href="products.php?category=wearables">Wearables</a></li>
                    <li><a href="brands.php">Brands</a></li>
                    <li><a href="deals.php">Hot Deals</a></li>
                    <li><a href="support.php">Support</a></li>
                </ul>
                
                <!-- Promo Banner -->
                <div class="nav-promo">
                    <span>🔥 Free Delivery in Pristina | 2-Year Warranty</span>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div>
    <div class="mobile-menu-container">
        <div class="mobile-menu-header">
            <h5>Menu</h5>
            <button class="btn-close-menu"><i class="fas fa-times"></i></button>
        </div>
        <div class="mobile-menu-body">
            <!-- Mobile menu content will be loaded via JS -->
        </div>
    </div>
    
    <!-- Main Content Area -->
    <main class="main-content"></main>