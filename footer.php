<?php
// Main Footer Template
?>
    </main>
    
    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3>Stay Connected with OneMobile</h3>
                        <p>Subscribe to get exclusive offers, new arrivals, and tech tips directly to your inbox.</p>
                    </div>
                    <div class="col-lg-6">
                        <form class="newsletter-form" id="newsletterForm">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Your email address" required>
                                <button class="btn btn-secondary" type="submit">Subscribe</button>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">
                                    I agree to receive marketing emails from OneMobile Kosovo
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 footer-widget">
                    <div class="logo mb-4">
                        <span class="brand-logo">OneMobile</span>
                        <small class="logo-tagline">Kosovo's Tech Hub</small>
                    </div>
                    <p>Kosovo's leading mobile technology store. Quality devices with local warranty and expert support.</p>
                    <div class="footer-contact mt-4">
                        <p><i class="fas fa-phone-alt"></i> +383 44 111 111</p>
                        <p><i class="fas fa-envelope"></i> support@onemobile-ks.com</p>
                        <p><i class="fas fa-map-marker-alt"></i> Pristina, Kosovo</p>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 footer-widget">
                    <h5>Shop</h5>
                    <ul class="footer-links">
                        <li><a href="products.php?category=smartphones">Smartphones</a></li>
                        <li><a href="products.php?category=tablets">Tablets</a></li>
                        <li><a href="products.php?category=laptops">Laptops</a></li>
                        <li><a href="products.php?category=accessories">Accessories</a></li>
                        <li><a href="products.php?category=wearables">Wearables</a></li>
                        <li><a href="brands.php">All Brands</a></li>
                    </ul>
                </div>
                
                <!-- Support -->
                <div class="col-lg-2 col-md-6 footer-widget">
                    <h5>Support</h5>
                    <ul class="footer-links">
                        <li><a href="support.php">Help Center</a></li>
                        <li><a href="warranty.php">Warranty Info</a></li>
                        <li><a href="repair.php">Repair Services</a></li>
                        <li><a href="shipping.php">Shipping Policy</a></li>
                        <li><a href="returns.php">Returns & Refunds</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                
                <!-- Company -->
                <div class="col-lg-2 col-md-6 footer-widget">
                    <h5>Company</h5>
                    <ul class="footer-links">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="careers.php">Careers</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="press.php">Press</a></li>
                        <li><a href="partners.php">Partners</a></li>
                        <li><a href="stores.php">Our Stores</a></li>
                    </ul>
                </div>
                
                <!-- Legal -->
                <div class="col-lg-2 col-md-6 footer-widget">
                    <h5>Legal</h5>
                    <ul class="footer-links">
                        <li><a href="terms.php">Terms of Service</a></li>
                        <li><a href="privacy.php">Privacy Policy</a></li>
                        <li><a href="cookies.php">Cookie Policy</a></li>
                        <li><a href="gdpr.php">GDPR Compliance</a></li>
                        <li><a href="security.php">Security</a></li>
                        <li><a href="compliance.php">Compliance</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p>&copy; <?php echo date('Y'); ?> OneMobile Shop Kosovo. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="payment-methods">
                            <span class="payment-icon"><i class="fab fa-cc-visa"></i></span>
                            <span class="payment-icon"><i class="fab fa-cc-mastercard"></i></span>
                            <span class="payment-icon"><i class="fab fa-cc-paypal"></i></span>
                            <span class="payment-icon"><i class="fas fa-university"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </button>
    
    <!-- Scripts -->
    <script src="js/main.js"></script>
    <script>
        // Initialize when document is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Cart functionality
            function updateCartCount() {
                // This would be updated via AJAX in a real implementation
                fetch('/api/cart/count')
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('.cart-count').textContent = data.count;
                        document.querySelector('.cart-total').textContent = '€' + data.total;
                    });
            }
            
            // Back to top button
            const backToTop = document.getElementById('backToTop');
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            });
            
            backToTop.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
            
            // Mobile menu
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const mobileMenuContainer = document.querySelector('.mobile-menu-container');
            const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
            const closeMenuBtn = document.querySelector('.btn-close-menu');
            
            function toggleMobileMenu() {
                mobileMenuContainer.classList.toggle('active');
                mobileMenuOverlay.classList.toggle('active');
                document.body.classList.toggle('menu-open');
            }
            
            mobileMenuToggle?.addEventListener('click', toggleMobileMenu);
            closeMenuBtn?.addEventListener('click', toggleMobileMenu);
            mobileMenuOverlay?.addEventListener('click', toggleMobileMenu);
            
            // Newsletter form
            const newsletterForm = document.getElementById('newsletterForm');
            newsletterForm?.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[type="email"]').value;
                
                // AJAX submission would go here
                fetch('/api/newsletter/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email: email })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Thank you for subscribing!');
                        this.reset();
                    } else {
                        alert('Subscription failed. Please try again.');
                    }
                });
            });
            
            // Initialize cart
            updateCartCount();
        });
    </script>
</body>
</html>