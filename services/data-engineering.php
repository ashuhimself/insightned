<!DOCTYPE html>
<html lang="en">
<head><?php require_once 'includes/meta-tags-config.php'; ?>
<?php echo getMetaTags('data-engineering', 'data-engineering'); ?>

    
    
    
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/service-pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <a href="../index.html" class="logo">
                <span class="logo-text">Insightned</span>
            </a>
            <div class="nav-links">
                <a href="../index.html#services">Services</a>
                <a href="../index.html#case-studies">Case Studies</a>
                <a href="../about.html">About</a>
                <a href="../index.html#footer-contact" class="cta-button">Get Started</a>
            </div>
        </div>
    </nav>

    <div class="service-hero">
        <div class="container">
            <h1>Data Engineering Services</h1>
            <p>Build scalable and reliable data infrastructure for your business</p>
        </div>
    </div>

    <div class="service-content">
        <div class="container">
            <div class="service-features">
                <h2>Our Offerings</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <i class="fas fa-database"></i>
                        <h3>ETL/ELT Solutions</h3>
                        <p>Design and implement robust data pipelines for efficient data processing.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-code-branch"></i>
                        <h3>Data Pipeline Development</h3>
                        <p>Create automated workflows for seamless data movement and transformation.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-warehouse"></i>
                        <h3>Data Warehouse Design</h3>
                        <p>Build optimized data warehouses for efficient data storage and retrieval.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-cloud"></i>
                        <h3>Cloud Infrastructure</h3>
                        <p>Deploy and manage scalable cloud-based data solutions.</p>
                    </div>
                </div>

                <!-- Quick CTA -->
                <div class="quick-cta">
                    <a href="../contact.html" class="cta-button" target="_blank">Get Consultation Today</a>
                </div>
            </div>

            <div class="service-benefits">
                <!-- Add more sections as needed -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Company Info -->
                <div class="footer-section">
                    <a href="../index.html" class="footer-logo">
                        <span class="logo-text">Insightned</span>
                    </a>
                    <p class="company-description">
                        Transforming businesses through data-driven intelligence and advanced analytics solutions.
                    </p>
                    <div class="social-links">
                        <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://github.com" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="../index.html#services">Services</a></li>
                        <li><a href="../index.html#case-studies">Case Studies</a></li>
                        <li><a href="../about.html">About Us</a></li>
                        <li><a href="#careers">Careers</a></li>
                    </ul>
                </div>

                <!-- Contact Us -->
                <div class="footer-section">
                    <h4>Contact Us</h4>
                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>ashutosh@insightned.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+91 9956167803</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>HSR Layout, Bangalore, Karnataka, India</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="footer-section" id="footer-contact">
                    <h4>Hi 👋</h4>
                    <form class="footer-contact-form" id="contactForm" action="/api/contact.php" method="POST">
                        <input type="hidden" name="csrf_token" id="csrf_token">
                        <div class="form-row">
                            <input type="text" id="name" name="name" placeholder="Full Name" required>
                        </div>
                        <div class="form-row">
                            <input type="email" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-row">
                            <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="form-row">
                            <textarea id="message" name="message" placeholder="Message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="footer-submit-btn">
                            <span class="btn-text">Send Message</span>
                            <span class="btn-loading" style="display: none;">
                                <i class="fas fa-spinner fa-spin"></i>
                            </span>
                            <span class="btn-success" style="display: none;">
                                <i class="fas fa-check"></i> Sent!
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="copyright">
                    © 2024 Insightned. All rights reserved.
                </div>
                <div class="legal-links">
                    <a href="/privacy">Privacy Policy</a>
                    <a href="/terms">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5R6P2N7KBJ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5R6P2N7KBJ');
    </script>
</body>
</html> 