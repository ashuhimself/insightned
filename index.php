<!DOCTYPE html>
<html lang="en">
<head><?php require_once 'includes/meta-tags-config.php'; ?>
<?php echo getMetaTags('index', ''); ?>

    
    
    <!-- Primary Meta Tags -->
    
    
    
    
    
    
    
    
    
    <!-- Open Graph / Facebook -->
    
    
    
    
    
    
    
    
    <!-- Twitter -->
    
    
    
    
    
    
    
    <!-- Additional SEO Tags -->
    
    
    
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=YOUR-ACTUAL-GA-ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXXXXX');
    </script>

    <!-- Schema.org markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ProfessionalService",
        "name": "Insightned",
        "url": "https://insightned.com",
        "logo": "https://insightned.com/images/logo.png",
        "description": "Enterprise-grade data analytics, AI solutions, and MLOps expertise. Specialized in data engineering, machine learning, and business intelligence consulting.",
        "foundingDate": "2023",
        "image": [
            "https://insightned.com/images/office.jpg",
            "https://insightned.com/images/team.jpg"
        ],
        "priceRange": "₹₹₹",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Bangalore",
            "addressRegion": "Karnataka",
            "addressCountry": "India"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "12.9716",
            "longitude": "77.5946"
        },
        "areaServed": {
            "@type": "GeoCircle",
            "geoMidpoint": {
                "@type": "GeoCoordinates",
                "latitude": "12.9716",
                "longitude": "77.5946"
            },
            "geoRadius": "50000"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-9956167803",
            "contactType": "customer service",
            "email": "contact@insightned.com",
            "availableLanguage": ["English", "Hindi"]
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday"
            ],
            "opens": "09:00",
            "closes": "18:00"
        },
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Data Services",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Data Analytics Solutions",
                        "description": "Enterprise data analytics and business intelligence solutions"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "AI Implementation",
                        "description": "Custom AI and machine learning solutions"
                    }
                }
            ]
        },
        "sameAs": [
            "https://linkedin.com/company/insightned",
            "https://twitter.com/insightned",
            "https://github.com/insightned"
        ]
    }
    </script>

    <!-- Favicons -->
    <link rel="icon" href="public/favicons/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="public/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="public/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/favicons/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body id="top">
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container" >
            <a href="#top" class="logo">
                <span class="logo-text">Insightned</span>
            </a>
            <div class="nav-links" id="nav-links">
                <a href="#services">Services</a>
                <a href="#case-studies">Case Studies</a>
                <a href="about.html">About</a>
                <!-- <a href="#blog">Blog</a> -->
                <a href="contact.html" class="cta-button" target="_blank">Contact Us</a>
            </div>
            <button class="mobile-menu-toggle" aria-label="Toggle Menu" id="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero" role="banner">
        <div class="hero-background">
            <canvas id="dataCanvas"></canvas>
            <div class="particles"></div>
            <div class="gradient-overlay"></div>
        </div>
        <div class="container" role="main">
            <h1>Transform Your Business with Data-Driven Intelligence</h1>
            <meta itemprop="headline" content="Transform Your Business with Data-Driven Intelligence">
            <svg class="hero-chart" viewBox="0 0 1000 600" preserveAspectRatio="none">
                <!-- Data Pipeline Path -->
                <path class="pipeline-path" 
                    d="M0,300 C200,300 300,100 500,100 S800,300 1000,300" 
                    stroke="rgba(0, 196, 204, 0.8)" 
                    stroke-width="3" 
                    fill="none">
                </path>
                
                <!-- Line Chart Path -->
                <path class="chart-line" 
                    d="M0,400 Q250,200 500,300 T1000,200" 
                    stroke="rgba(255, 255, 255, 0.6)" 
                    stroke-width="2" 
                    fill="none">
                </path>

                <!-- Additional Data Points -->
                <circle class="data-point" cx="250" cy="200" r="4" fill="rgba(0, 196, 204, 0.8)"/>
                <circle class="data-point" cx="500" cy="300" r="4" fill="rgba(0, 196, 204, 0.8)"/>
                <circle class="data-point" cx="750" cy="250" r="4" fill="rgba(0, 196, 204, 0.8)"/>
            </svg>
            <div class="data-streams">
                <div class="data-stream" style="left: 10%; animation-delay: 0s;"></div>
                <div class="data-stream" style="left: 20%; animation-delay: 1s;"></div>
                <div class="data-stream" style="left: 35%; animation-delay: 2s;"></div>
                <div class="data-stream" style="left: 50%; animation-delay: 0.5s;"></div>
                <div class="data-stream" style="left: 65%; animation-delay: 1.5s;"></div>
                <div class="data-stream" style="left: 80%; animation-delay: 2.5s;"></div>
                <div class="data-stream" style="left: 90%; animation-delay: 3s;"></div>
            </div>
            <div class="container">
                <h1>Transform Your Business with Data-Driven Intelligence</h1>
                <p>
                    <strong>Navigate Tomorrow's Success with Today's Data</strong>
                    We're modern-day alchemists transforming raw information into business brilliance. Our expert team dives deep into your data landscape, architects powerful solutions, and stands beside you as your long-term analytics partner. At Insightned, we don't just process data – we help it tell your success story.
                    Let's unlock your data's hidden potential together. In today's digital age, success belongs to those who can make their data sing.
                </p>
                <div class="cta-group">
                    <a href="contact.html" class="primary-cta" target="_blank">Start Your Data Journey</a>
                    <a href="#services" class="secondary-cta">Explore Solutions</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Combined Sections Container -->
    <div class="toggle-sections-container">
        <section id="industries" class="industries active">
            <div class="container">
                <h2 class="section-title">Industries We Serve</h2>
                <p class="section-subtitle">Delivering Data Excellence Across Diverse Sectors</p>
                <div class="industries-content">
                    <div class="domains-horizontal">
                        <div class="domain-card">
                            <div class="domain-icon">
                                <img src="images/icons/banking.svg" alt="Banking Icon">
                            </div>
                            <h3>Banking & Finance</h3>
                        </div>

                        <div class="domain-card">
                            <div class="domain-icon">
                                <img src="images/icons/loyalty.svg" alt="Loyalty Icon">
                            </div>
                            <h3>Loyalty Programs</h3>
                        </div>

                        <div class="domain-card">
                            <div class="domain-icon">
                                <img src="images/icons/advertising.svg" alt="Advertising Icon">
                            </div>
                            <h3>Advertisement</h3>
                        </div>

                        <div class="domain-card">
                            <div class="domain-icon">
                                <img src="images/icons/ecommerce.svg" alt="E-commerce Icon">
                            </div>
                            <h3>E-commerce</h3>
                        </div>

                        <div class="domain-card">
                            <div class="domain-icon">
                                <img src="images/icons/hospitality.svg" alt="Hospitality Icon">
                            </div>
                            <h3>Hospitality</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="tech-stack" class="tech-stack">
            <div class="container">
                <h2 class="section-title">Our Tech Stack</h2>
                <p class="section-subtitle">Powered by Industry-Leading Technologies</p>
                <div class="tech-content">
                    <div class="tech-stack-grid">
                        <!-- Tech Stack Rows -->
                        <div class="tech-row">
                            <!-- Technology Items -->
                            <div class="tech-item">
                                <img src="images/logos/aws.svg" alt="AWS">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/gcp.svg" alt="Google Cloud Platform">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/azure.svg" alt="Microsoft Azure">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/kubernetes.svg" alt="Kubernetes">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/docker.svg" alt="Docker">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/terraform.svg" alt="Terraform">
                            </div>
                        </div>
                        <!-- Data & Analytics Row -->
                        <div class="tech-row">
                            <div class="tech-item">
                                <img src="images/logos/spark.svg" alt="Apache Spark">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/Airflow.svg" alt="Apache Airflow">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/kafka.svg" alt="Apache Kafka">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/postgresql.svg" alt="PostgreSQL">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/mongodb.svg" alt="MongoDB">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/databricks.svg" alt="Databricks">
                            </div>
                        </div>
                        <!-- ML & Programming Row -->
                        <div class="tech-row">
                            <div class="tech-item">
                                <img src="images/logos/tensorflow.svg" alt="TensorFlow">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/pytorch.svg" alt="PyTorch">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/python.svg" alt="Python">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/scala.svg" alt="Scala">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/github.svg" alt="GitHub">
                            </div>
                            <div class="tech-item">
                                <img src="images/logos/hadoop.svg" alt="Hadoop">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2 class="section-title">Our Services & Products</h2>
            <p class="section-subtitle">Transforming Data into Business Value</p>
            
            <div class="services-grid">
                <!-- Data Analytics -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Data Architecture and Strategy</h3>
                    <p>Optimizing data processes and integration for better decision-making.</p>
                    <a href="services/data-archi.html" class="service-cta">Learn More →</a>
                </div>

                <!-- Data Engineering -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3>Data Engineering</h3>
                    <p>Transforming data for insights across industries.</p>
                    <a href="services/data-engineering.html" class="service-cta">Learn More →</a>
                </div>

                <!-- MLOps -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>AI & Machine Learning</h3>
                    <p>Custom AI solutions and predictive analytics for smart decisions.</p>
                    <a href="services/mlops.html" class="service-cta">Learn More →</a>
                </div>

                <!-- Business Analytics -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Business Analytics</h3>
                    <p>Transform business data into strategic decisions.</p>
                    <a href="services/business-analytics.html" class="service-cta">Learn More →</a>
                </div>

                <!-- Data Warehouse Design -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <h3>Data Warehouse Design</h3>
                    <p>Design and implement scalable data warehouses for efficient data management.</p>
                    <a href="services/data-warehouse.html" class="service-cta">Learn More →</a>
                </div>

                <!-- Data Migration -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h3>Data Migration</h3>
                    <p>Seamlessly migrate your data across platforms with zero downtime.</p>
                    <a href="services/data-migration.html" class="service-cta">Learn More →</a>
                </div>

                <!-- AI Agent -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>AI Agent for Data Tasks</h3>
                    <p>Custom AI solutions for automated data processing and analysis.</p>
                    <a href="services/ai-agent.html" class="service-cta">Learn More →</a>
                </div>

                <!-- Ad Platforms Integration -->
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3>Ad Platforms Integration</h3>
                    <p>Seamless integration and optimization of advertising platforms for maximum ROI.</p>
                    <a href="services/ad-platforms.html" class="service-cta">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies Section -->
    <section id="case-studies" class="case-studies">
        <div class="container">
            <h2 class="section-title">Case Studies</h2>
            <p class="section-subtitle">Success Stories from Our Clients</p>

            <div class="case-studies-grid">
                 <!-- Health care -->
                 <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="images/healthcare.webp" alt="Healthcare Case Study">
                    </div>
                    <div class="case-study-content">
                        <h3>Health Care</h3>
                        <p>Transforming Healthcare Efficiency: How AI-Powered Appointment Scheduling Revolutionized Patient Care at a Multi-Specialty Clinic.</p>
                        <a href="case-studies.html#health-care" class="case-study-link" target="_blank">Read Case Study →</a>
                    </div>
                </div>

                <!-- logistics -->
                <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="images/logistics.png" alt="Logistics Case Study">
                    </div>
                    <div class="case-study-content">
                        <h3>Logistics</h3>
                        <p>Revolutionizing Logistics: How AI-Driven Automation Boosted Efficiency and Customer Satisfaction for a Nationwide Fleet.</p>
                        <a href="case-studies.html#logistics" class="case-study-link" target="_blank">Read Case Study →</a>
                    </div>
                </div>
                <!-- Customer 360° Analytics -->
                <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&q=80" alt="Customer Analytics">
                    </div>
                    <div class="case-study-content">
                        <h3>Customer 360° Analytics</h3>
                        <p>Created unified customer view across channels, improving customer retention by 40%.</p>
                        <a href="case-studies.html#customer-360-analytics" class="case-study-link" target="_blank">Read Case Study →</a>
                    </div>
                </div>

                <!-- Real-time E-commerce Pipeline -->
                <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="https://images.unsplash.com/photo-1542744094-24638eff58bb?w=500&q=80" alt="Data Pipeline Case Study">
                    </div>
                    <div class="case-study-content">
                        <h3>Real-time E-commerce Pipeline</h3>
                        <p>Built real-time data pipeline processing 1M+ events daily, reducing latency by 90% for a major e-commerce platform.</p>
                        <a href="case-studies.html#real-time-e-commerce-pipeline" class="case-study-link" target="_blank">Read Case Study →</a>
                    </div>
                </div>

                <!-- Data Pipeline Development -->
                <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=500&q=80" alt="Pipeline Development Case Study">
                    </div>
                    <div class="case-study-content">
                        <h3>Large-Scale Pipeline Development</h3>
                        <p>Built and orchestrated 50+ data pipelines for e-commerce and advertising data processing, achieving 99.9% reliability.</p>
                        <a href="case-studies.html#large-scale-pipeline-development" class="case-study-link" target="_blank">Read Case Study →</a>
                    </div>
                </div>

                <!-- Cross-Platform Ad Analytics -->
                <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="https://images.unsplash.com/photo-1533750516457-a7f992034fec?w=500&q=80" alt="Ad Analytics Case Study">
                    </div>
                    <div class="case-study-content">
                        <h3>Cross-Platform Ad Analytics</h3>
                        <p>Unified analytics across Google, Meta, and LinkedIn, improving ROAS by 55% for a D2C brand.</p>
                        <a href="case-studies.html#cross-platform-ad-analytics" class="case-study-link" target="_blank">Read Case Study →</a>
                    </div>
                </div>

                <!-- Ad Campaign Optimization -->
                <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=500&q=80" alt="Ad Analytics Case Study">
                    </div>
                    <div class="case-study-content">
                        <h3>Ad Campaign Optimization</h3>
                        <p>Optimized multi-channel ad campaigns, reducing CAC by 40%.</p>
                        <a href="case-studies.html#ad-campaign-optimization" class="case-study-link" target="_blank">Read Case Study →</a>
                    </div>
                </div>

                <!-- Automated MLOps Pipeline -->
                <div class="case-study-card">
                    <div class="case-study-image">
                        <img src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?w=500&q=80" alt="MLOps Case Study">
                    </div>
                    <div class="case-study-content">
                        <h3>Automated MLOps Pipeline</h3>
                        <p>Implemented end-to-end MLOps pipeline reducing model deployment time from weeks to hours.</p>
                        <a href="case-studies.html#automated-mlops-pipeline" class="case-study-link" target="_blank">Read Case Study →</a>
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
                        <a href="https://www.linkedin.com/company/90716061" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://twitter.com/Insightned" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <!-- <a href="https://github.com/orgs/Insightned" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a> -->
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#case-studies">Case Studies</a></li>
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
                            <span>contact@insightned.com</span>
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
                    <form class="footer-contact-form" id="contactForm" action="api/contact.php" method="POST">
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
                    <a href="privacy.html">Privacy Policy</a>
                    <a href="terms.html">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/section-toggle.js"></script>
    <script src="js/data-mesh.js"></script>
    <script src="js/main.js"></script>
    <!-- to add menu bar -->
    <script>
        const mobilemenuToggle = document.getElementById('menu-toggle')
        const navLinks = document.getElementById('nav-links')


        mobilemenuToggle.addEventListener('click', () =>{
            navLinks.classList.toggle('active')
        })

    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5R6P2N7KBJ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5R6P2N7KBJ');
    </script>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="/">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
        </ol>
    </nav>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "item": {
                    "@type": "Service",
                    "name": "Data Architecture and Strategy",
                    "description": "Optimizing data processes and integration for better decision-making",
                    "url": "https://insightned.com/services/data-archi.html"
                }
            },
            {
                "@type": "ListItem",
                "position": 2,
                "item": {
                    "@type": "Service",
                    "name": "AI & Machine Learning",
                    "description": "Custom AI solutions and predictive analytics for smart decisions",
                    "url": "https://insightned.com/services/mlops.html"
                }
            }
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "What services does Insightned provide?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Insightned provides comprehensive data solutions including data architecture, analytics, AI implementation, MLOps, and business intelligence consulting."
            }
        },
        {
            "@type": "Question",
            "name": "Where is Insightned located?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Insightned is headquartered in Bangalore, Karnataka, India, serving clients globally with enterprise data and AI solutions."
            }
        }]
    }
    </script>
</body>
</html> 

