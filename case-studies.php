<!DOCTYPE html>
<html lang="en">
<head><?php require_once 'includes/meta-tags-config.php'; ?>
<?php echo getMetaTags('case-studies', ''); ?>

    
    
    
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/case-studies.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <a href="index.html" class="logo">
                <span class="logo-text">Insightned</span>
            </a>
            <div class="nav-links">
                <a href="index.html#services" target="_blank">Services</a>
                <a href="#case-studies">Case Studies</a>
                <a href="about.html" target="_blank">About</a>
                <a href="contact.html" class="cta-button" target="_blank">Contact Us</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="case-studies-hero">
        <div class="container">
            <h1>Our Success Stories</h1>
            <p>Discover how we've helped businesses transform their data into success</p>
        </div>
    </div>

    <!-- Case Studies Section -->
    <section class="case-studies">
        <div class="container">
            <!-- Case Study 7 -->
            <div id="health-care" class="case-study">
                <div class="case-study-content">
                    <h2>AI-Driven Appointment Scheduling System</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-building"></i> Healthcare</span>
                        <span class="duration"><i class="fas fa-clock"></i> 6 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>A multi-specialty clinic with five locations, 50 doctors, and 100 support staff faced inefficiencies in their appointment scheduling system, leading to long patient wait times, overbooked doctors, and frustrated staff. The clinic needed a solution to streamline scheduling, reduce no-shows, and improve patient satisfaction.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Implemented AI-powered appointment scheduling software</li>
                            <li>Automated scheduling, rescheduling, and cancellations in real-time</li>
                            <li>Incorporated predictive analytics to forecast no-shows and suggest optimal appointment times</li>
                            <li>Introduced a patient self-service portal for easy appointment management</li>
                            <li>Integrated automated SMS and email reminders to reduce missed appointments</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>30% reduction in wait times</li>
                            <li>20% increase in operational efficiency</li>
                            <li>25% boost in patient satisfaction</li>
                            <li>50% reduction in no-shows</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Case study 8 -->
            <div id="logistics" class="case-study">
                <div class="case-study-content">
                    <h2>AI-Powered Logistics Management</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-building"></i> Logistics</span>
                        <span class="duration"><i class="fas fa-clock"></i> 9 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>A nationwide logistics provider faced challenges in customer service delays, fleet inefficiencies, and limited transparency, leading to high fuel costs, longer delivery times, and low customer retention.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Implemented AI-powered real-time vehicle tracking and updates</li>
                            <li>Integrated chatbot for instant customer support</li>
                            <li>Applied AI algorithms for route optimization to reduce fuel consumption and delivery time</li>
                            <li>Introduced predictive maintenance tools to monitor fleet health and prevent breakdowns</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>50% reduction in customer inquiries</li>
                            <li>20% decrease in fuel costs</li>
                            <li>30% faster delivery times</li>
                            <li>40% increase in customer retention</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Case Study 1 -->
            <div id="banking-analytics" class="case-study">
                <div class="case-study-content">
                    <h2>Banking Analytics Platform</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-building"></i> Banking & Finance</span>
                        <span class="duration"><i class="fas fa-clock"></i> 8 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>A leading bank needed to modernize their analytics infrastructure to improve customer insights and risk assessment.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Implemented modern data lake architecture</li>
                            <li>Developed real-time analytics pipeline</li>
                            <li>Created ML models for risk assessment</li>
                            <li>Built interactive dashboards for insights</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>40% faster data processing</li>
                            <li>25% improvement in risk assessment accuracy</li>
                            <li>Real-time customer insights</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Case Study 2 -->
            <div id="real-time-e-commerce-pipeline" class="case-study">
                <div class="case-study-content">
                    <h2>Real-time E-commerce Pipeline</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-shopping-cart"></i> E-commerce</span>
                        <span class="duration"><i class="fas fa-clock"></i> 6 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>A major e-commerce platform needed to process millions of events daily with minimal latency for real-time inventory and pricing decisions.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Built scalable real-time data pipeline</li>
                            <li>Implemented stream processing with Apache Kafka</li>
                            <li>Created real-time analytics dashboard</li>
                            <li>Automated alerting system for anomalies</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>90% reduction in data processing latency</li>
                            <li>Processing 1M+ events daily</li>
                            <li>99.9% system reliability</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Case Study 3 -->
            <div id="large-scale-pipeline-development" class="case-study">
                <div class="case-study-content">
                    <h2>Large-Scale Pipeline Development</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-database"></i> Data Engineering</span>
                        <span class="duration"><i class="fas fa-clock"></i> 12 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>A large enterprise needed to orchestrate and manage multiple data pipelines for their e-commerce and advertising data with high reliability.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Designed scalable data architecture</li>
                            <li>Implemented 50+ automated data pipelines</li>
                            <li>Built monitoring and alerting system</li>
                            <li>Created data quality checks and validation</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>99.9% pipeline reliability</li>
                            <li>60% reduction in data processing time</li>
                            <li>Automated data quality assurance</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Case Study 4 -->
            <div id="cross-platform-ad-analytics" class="case-study">
                <div class="case-study-content">
                    <h2>Cross-Platform Ad Analytics</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-ad"></i> Digital Marketing</span>
                        <span class="duration"><i class="fas fa-clock"></i> 4 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>A D2C brand struggled to consolidate and analyze advertising data across multiple platforms (Google, Meta, LinkedIn) for optimizing their marketing spend.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Developed unified data model for cross-platform analytics</li>
                            <li>Automated data collection from multiple ad platforms</li>
                            <li>Built custom attribution modeling</li>
                            <li>Created interactive performance dashboards</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>55% improvement in ROAS</li>
                            <li>30% reduction in data analysis time</li>
                            <li>Real-time campaign performance visibility</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Case Study 5 -->
            <div id="ad-campaign-optimization" class="case-study">
                <div class="case-study-content">
                    <h2>Ad Campaign Optimization</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-bullseye"></i> Digital Advertising</span>
                        <span class="duration"><i class="fas fa-clock"></i> 3 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>A growing startup needed to optimize their multi-channel advertising campaigns to reduce customer acquisition costs while maintaining growth.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Implemented automated bid management</li>
                            <li>Created cross-channel attribution model</li>
                            <li>Developed A/B testing framework</li>
                            <li>Built real-time performance monitoring</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>40% reduction in CAC</li>
                            <li>35% increase in conversion rate</li>
                            <li>Improved campaign ROI by 50%</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Case Study 6 -->
            <div id="automated-mlops-pipeline" class="case-study">
                <div class="case-study-content">
                    <h2>Automated MLOps Pipeline</h2>
                    <div class="case-meta">
                        <span class="industry"><i class="fas fa-robot"></i> Machine Learning</span>
                        <span class="duration"><i class="fas fa-clock"></i> 5 months</span>
                    </div>
                    <div class="challenge">
                        <h3>Challenge</h3>
                        <p>An AI-focused company needed to streamline their ML model deployment process to reduce time-to-production and ensure model reliability.</p>
                    </div>
                    <div class="solution">
                        <h3>Solution</h3>
                        <ul>
                            <li>Built automated CI/CD pipeline for ML models</li>
                            <li>Implemented model versioning and tracking</li>
                            <li>Created automated testing framework</li>
                            <li>Developed model monitoring system</li>
                        </ul>
                    </div>
                    <div class="results">
                        <h3>Results</h3>
                        <ul>
                            <li>Reduced deployment time from weeks to hours</li>
                            <li>99% model deployment success rate</li>
                            <li>Automated model performance monitoring</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Footer Section -->
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
                        <li><a href="index.html#services" target="_blank">Services</a></li>
                        <li><a href="#case-studies">Case Studies</a></li>
                        <li><a href="about.html" target="_blank">About Us</a></li>
                        <li><a href="#careers" target="_blank">Careers</a></li>
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
                    <a href="/privacy" target="_blank">Privacy Policy</a>
                    <a href="/terms" target="_blank">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
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