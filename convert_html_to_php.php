<?php

function findHtmlFiles($directory = '.') {
    $htmlFiles = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'html') {
            $relativePath = str_replace('\\', '/', ltrim(str_replace(realpath($directory), '', $file->getRealPath()), '/'));
            $phpPath = substr($relativePath, 0, -5) . '.php';
            $htmlFiles[$relativePath] = $phpPath;
        }
    }
    
    return $htmlFiles;
}

$htmlFiles = findHtmlFiles('.');

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

// Process each HTML file
foreach ($htmlFiles as $htmlFile => $phpFile) {
    // Create output directory if it doesn't exist
    $dir = dirname($phpFile);
    if (!file_exists($dir)) {
        mkdir($dir, 0755, true);
    }
    
    // Convert the file
    convertHtmlToPhp($htmlFile, $phpFile);
}

echo "\nAll HTML files have been converted to PHP!\n";

// Convert each HTML file to PHP
foreach ($htmlFiles as $html => $php) {
    convertHtmlToPhp($html, $php);
}

echo "Conversion complete!\n";