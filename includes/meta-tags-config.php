<?php

$metaTagsConfig = [
    'index' => [
        'title' => 'Insightned | Data Analytics & AI Solutions',
        'description' => 'Transform your business with enterprise-grade data analytics, AI solutions, and MLOps services. Get expert data engineering and business intelligence solutions.',
        'canonical' => 'https://insightned.com/'
    ],
    'about' => [
        'title' => 'About Us | Insightned - Data Analytics & AI Solutions',
        'description' => 'Learn about Insightned\'s journey in delivering cutting-edge data analytics and AI solutions. Meet our team of experts dedicated to transforming businesses through data.',
        'canonical' => 'https://insightned.com/about.html'
    ],
    'case-studies' => [
        'title' => 'Case Studies | Insightned - Success Stories in Data Analytics',
        'description' => 'Explore our success stories in data analytics, AI implementation, and digital transformation across various industries.',
        'canonical' => 'https://insightned.com/case-studies.html'
    ],
    'contact' => [
        'title' => 'Contact Us | Insightned - Data Analytics & AI Solutions',
        'description' => 'Get in touch with Insightned for your data analytics and AI solution needs. Expert consultation available.',
        'canonical' => 'https://insightned.com/contact.html'
    ],
    'services' => [
        'data-engineering' => [
            'title' => 'Data Engineering Services | Insightned',
            'description' => 'Professional data engineering services including ETL/ELT, pipeline development, and data warehouse solutions.',
            'canonical' => 'https://insightned.com/services/data-engineering.html'
        ],
        'mlops' => [
            'title' => 'MLOps Services | Insightned',
            'description' => 'Enterprise MLOps solutions for streamlined machine learning operations and AI model deployment.',
            'canonical' => 'https://insightned.com/services/mlops.html'
        ],
        'business-analytics' => [
            'title' => 'Business Analytics Services | Insightned',
            'description' => 'Transform your business data into actionable insights with our comprehensive business analytics services.',
            'canonical' => 'https://insightned.com/services/business-analytics.html'
        ],
        'data-warehouse' => [
            'title' => 'Data Warehouse Solutions | Insightned',
            'description' => 'Custom data warehouse design and implementation services for efficient data management.',
            'canonical' => 'https://insightned.com/services/data-warehouse.html'
        ],
        'ai-agent' => [
            'title' => 'AI Agent Solutions | Insightned',
            'description' => 'Intelligent AI agent solutions for automated data processing and analysis.',
            'canonical' => 'https://insightned.com/services/ai-agent.html'
        ],
        'ad-platforms' => [
            'title' => 'Ad Platform Integration Services | Insightned',
            'description' => 'Seamless advertising platform integration services for maximum ROI.',
            'canonical' => 'https://insightned.com/services/ad-platforms.html'
        ],
        'data-migration' => [
            'title' => 'Data Migration Services | Insightned',
            'description' => 'Expert data migration services with zero downtime and complete data integrity.',
            'canonical' => 'https://insightned.com/services/data-migration.html'
        ],
        'data-archi' => [
            'title' => 'Data Architecture Services | Insightned',
            'description' => 'Strategic data architecture design and implementation for modern enterprises.',
            'canonical' => 'https://insightned.com/services/data-archi.html'
        ]
    ]
];

function getMetaTags($page, $subpage = '') {
    global $metaTagsConfig;
    
    if ($subpage && isset($metaTagsConfig['services'][$subpage])) {
        $config = $metaTagsConfig['services'][$subpage];
    } elseif (isset($metaTagsConfig[$page])) {
        $config = $metaTagsConfig[$page];
    } else {
        return '';
    }
    
    $metaTags = "
    <title>{$config['title']}</title>
    <meta name=\"title\" content=\"{$config['title']}\">
    <meta name=\"description\" content=\"{$config['description']}\">
    <meta name=\"keywords\" content=\"data analytics, AI solutions, MLOps, machine learning, data engineering, business intelligence, data warehouse, big data, artificial intelligence, data science\">
    <meta name=\"robots\" content=\"index, follow\">
    <meta name=\"language\" content=\"English\">
    <meta name=\"revisit-after\" content=\"7 days\">
    <meta name=\"author\" content=\"Insightned\">
    
    <!-- Open Graph Meta Tags -->
    <meta property=\"og:type\" content=\"website\">
    <meta property=\"og:url\" content=\"{$config['canonical']}\">
    <meta property=\"og:title\" content=\"{$config['title']}\">
    <meta property=\"og:description\" content=\"{$config['description']}\">
    <meta property=\"og:image\" content=\"https://insightned.com/images/og-image.jpg\">
    <meta property=\"og:site_name\" content=\"Insightned\">
    <meta property=\"og:locale\" content=\"en_US\">
    
    <!-- Twitter Meta Tags -->
    <meta name=\"twitter:card\" content=\"summary_large_image\">
    <meta name=\"twitter:site\" content=\"@Insightned\">
    <meta name=\"twitter:creator\" content=\"@Insightned\">
    <meta name=\"twitter:title\" content=\"{$config['title']}\">
    <meta name=\"twitter:description\" content=\"{$config['description']}\">
    <meta name=\"twitter:image\" content=\"https://insightned.com/images/og-image.jpg\">
    
    <!-- Canonical URL -->
    <link rel=\"canonical\" href=\"{$config['canonical']}\">
    ";
    
    return $metaTags;
}
?>