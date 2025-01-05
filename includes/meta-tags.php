<?php
require_once 'meta-config.php';

function outputMetaTags($page = 'home', $subpage = '') {
    global $metaConfig;
    
    // Get meta data based on page and subpage
    $meta = isset($subpage) && !empty($subpage) 
        ? $metaConfig[$page][$subpage] 
        : $metaConfig[$page];
    ?>
    <!-- Primary Meta Tags -->
    <title><?php echo htmlspecialchars($meta['title']); ?></title>
    <meta name="title" content="<?php echo htmlspecialchars($meta['title']); ?>">
    <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta['keywords']); ?>">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="author" content="Insightned">
    
    <!-- Canonical Tag -->
    <link rel="canonical" href="<?php echo htmlspecialchars($meta['canonical']); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($meta['canonical']); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($meta['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta['description']); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($meta['og_image']); ?>">
    <meta property="og:site_name" content="Insightned">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Insightned">
    <meta name="twitter:creator" content="@Insightned">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($meta['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($meta['description']); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($meta['og_image']); ?>">
    
    <!-- Additional SEO Tags -->
    <meta name="google-site-verification" content="your-verification-code">
    <meta name="msvalidate.01" content="your-bing-verification-code">
    <?php
}
?> 