<!DOCTYPE html>
<html lang="en">
<head><?php require_once 'includes/meta-tags-config.php'; ?>
<?php echo getMetaTags('about', ''); ?>

    
    
    
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="public/favicons/android-chrome-512x512.png" type="image/x-icon">
</head>
<body>
    <!-- Navigation (same as main page) -->
    <nav class="main-nav">
        <div class="container">
            <a href="index.html" class="logo">
                <span class="logo-text">Insightned</span>
            </a>
            <div class="nav-links">
                <a href="index.html#services">Services</a>
                <a href="index.html#case-studies">Case Studies</a>
                <a href="about.html">About</a>
                <a href="index.html#footer-contact" class="cta-button">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="about-hero">
        <div class="neural-network"></div>
        <div class="container">
            <h1 class="reveal-text">Transforming Data Into Impact</h1>
            <p class="fade-in">Empowering businesses with data-driven intelligence and innovative solutions.</p>
        </div>
    </header>

    <!-- Mission Section -->
    <section class="mission">
        <div class="container">
            <div class="mission-grid">
                <div class="mission-content slide-in-left">
                    <h2>Our Mission</h2>
                    <p>To revolutionize how businesses harness their data potential through cutting-edge analytics and AI solutions. We're committed to delivering actionable insights that drive growth and innovation.</p>
                    <div class="mission-stats">
                        <div class="stat-item">
                            <span class="stat-number">100+</span>
                            <span class="stat-label">Projects Delivered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Happy Clients</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">95%</span>
                            <span class="stat-label">Client Retention</span>
                        </div>
                    </div>
                </div>
                <div class="mission-visual slide-in-right">
                    <div class="data-visualization">
                        <!-- Add animated SVG visualization -->
                        <svg class="mission-chart" viewBox="0 0 400 400">
                            <defs>
                                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:var(--primary-color);stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:var(--accent-color);stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <!-- Add animated paths and circles -->
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <h2 class="section-title fade-in">Our Core Values</h2>
            <div class="values-grid">
                <div class="value-card pop-in">
                    <i class="fas fa-lightbulb"></i>
                    <h3>Innovation</h3>
                    <p>Pushing boundaries with cutting-edge solutions and staying ahead of technological advancements.</p>
                </div>
                <div class="value-card pop-in" style="animation-delay: 0.2s;">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Integrity</h3>
                    <p>Building trust through transparency, reliability, and ethical data practices.</p>
                </div>
                <div class="value-card pop-in" style="animation-delay: 0.4s;">
                    <i class="fas fa-chart-line"></i>
                    <h3>Excellence</h3>
                    <p>Delivering exceptional results consistently through expertise and dedication.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Section -->
    <section class="journey">
        <div class="container">
            <h2 class="section-title fade-in">Our Journey</h2>
            <div class="timeline">
                <div class="timeline-item slide-in-left">
                    <div class="year">2020</div>
                    <div class="content">
                        <h3>Foundation</h3>
                        <p>Started with a vision to transform data analytics and empower businesses.</p>
                    </div>
                </div>
                <div class="timeline-item slide-in-right">
                    <div class="year">2021</div>
                    <div class="content">
                        <h3>Growth</h3>
                        <p>Expanded services and team</p>
                    </div>
                </div>
                <div class="timeline-item slide-in-left">
                    <div class="year">2022</div>
                    <div class="content">
                        <h3>Innovation</h3>
                        <p>Launched AI-powered solutions</p>
                    </div>
                </div>
                <div class="timeline-item slide-in-right">
                    <div class="year">2023</div>
                    <div class="content">
                        <h3>Global Reach</h3>
                        <p>Extended services worldwide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (same as main page) -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Company Info -->
                <div class="footer-section">
                    <a href="/" class="footer-logo">
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
                        <li><a href="index.html#services">Services</a></li>
                        <li><a href="index.html#case-studies">Case Studies</a></li>
                        <li><a href="about.html">About Us</a></li>
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

    <script src="js/about.js"></script>
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