<?php
function outputStructuredData($page = 'home', $subpage = '') {
    global $metaConfig;
    
    // Get meta data based on page and subpage
    $meta = isset($subpage) && !empty($subpage) 
        ? $metaConfig[$page][$subpage] 
        : $metaConfig[$page];
    ?>
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Insightned",
        "url": "https://insightned.com",
        "logo": "https://insightned.com/images/logo.png",
        "description": "Leading provider of data analytics and AI solutions",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "US"
        },
        "sameAs": [
            "https://twitter.com/Insightned",
            "https://www.linkedin.com/company/insightned",
            "https://github.com/insightned"
        ]
    }
    </script>

    <?php if ($page === 'services' && !empty($subpage)) : ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Service",
        "serviceType": "<?php echo htmlspecialchars($meta['title']); ?>",
        "provider": {
            "@type": "Organization",
            "name": "Insightned"
        },
        "description": "<?php echo htmlspecialchars($meta['description']); ?>",
        "areaServed": "Worldwide"
    }
    </script>
    <?php endif; ?>
    <?php
}