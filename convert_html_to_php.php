<?php

$htmlFiles = [
    'index.html' => 'index.php',
    'about.html' => 'about.php',
    'case-studies.html' => 'case-studies.php',
    'contact.html' => 'contact.php',
    'services/data-engineering.html' => 'services/data-engineering.php',
    'services/mlops.html' => 'services/mlops.php',
    'services/business-analytics.html' => 'services/business-analytics.php',
    'services/data-warehouse.html' => 'services/data-warehouse.php',
    'services/ai-agent.html' => 'services/ai-agent.php',
    'services/ad-platforms.html' => 'services/ad-platforms.php',
    'services/data-migration.html' => 'services/data-migration.php',
    'services/data-archi.html' => 'services/data-archi.php'
];

function convertHtmlToPhp($inputFile, $outputFile) {
    $content = file_get_contents($inputFile);
    
    // Extract the page name
    $pageName = basename($inputFile, '.html');
    $subpage = '';
    
    // Check if it's a service page
    if (strpos($inputFile, 'services/') !== false) {
        $subpage = $pageName;
    }
    
    // Find the <head> section
    $headStart = strpos($content, '<head>');
    $metaEnd = strpos($content, '</head>', $headStart);
    
    if ($headStart !== false && $metaEnd !== false) {
        // Get existing head content
        $headContent = substr($content, $headStart + 6, $metaEnd - ($headStart + 6));
        
        // Remove existing meta tags and title
        $cleanHead = preg_replace('/<title>.*?<\/title>/s', '', $headContent);
        $cleanHead = preg_replace('/<meta[^>]*>/i', '', $cleanHead);
        $cleanHead = preg_replace('/<link[^>]*canonical[^>]*>/i', '', $cleanHead);
        
        // Create new head content with PHP include
        $newHead = "<?php require_once 'includes/meta-tags-config.php'; ?>\n";
        $newHead .= "<?php echo getMetaTags('$pageName', '$subpage'); ?>\n";
        $newHead .= $cleanHead;
        
        // Replace head content
        $newContent = substr($content, 0, $headStart + 6);
        $newContent .= $newHead;
        $newContent .= substr($content, $metaEnd);
        
        // Save the new PHP file
        file_put_contents($outputFile, $newContent);
        
        echo "Converted $inputFile to $outputFile\n";
    } else {
        echo "Could not find head section in $inputFile\n";
    }
}

// Create output directories if they don't exist
if (!file_exists('services')) {
    mkdir('services', 0755, true);
}

// Convert each HTML file to PHP
foreach ($htmlFiles as $html => $php) {
    convertHtmlToPhp($html, $php);
}

echo "Conversion complete!\n";