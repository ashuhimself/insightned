<?php
require_once 'includes/meta-config.php';

function generateSitemap() {
    global $metaConfig;
    
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');
    
    // Add each URL from meta config
    foreach ($metaConfig as $page => $data) {
        if (is_array($data) && isset($data['canonical'])) {
            $url = $xml->addChild('url');
            $url->addChild('loc', $data['canonical']);
            $url->addChild('lastmod', date('Y-m-d'));
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.8');
        }
        
        // Handle subpages
        if (is_array($data) && !isset($data['canonical'])) {
            foreach ($data as $subpage => $subdata) {
                $url = $xml->addChild('url');
                $url->addChild('loc', $subdata['canonical']);
                $url->addChild('lastmod', date('Y-m-d'));
                $url->addChild('changefreq', 'weekly');
                $url->addChild('priority', $page === 'services' ? '0.9' : '0.8');
            }
        }
    }
    
    // Save sitemap
    $xml->asXML('sitemap.xml');
}

generateSitemap();
?> 