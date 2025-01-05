<?php

// Script to convert all HTML files to PHP and update meta tags
echo "Starting meta tags update process...\n";

// First run the conversion script
require_once 'convert_html_to_php.php';

// Then update sitemap.xml to reflect new .php URLs
$sitemapContent = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>https://insightned.com/</loc>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>https://insightned.com/about.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>https://insightned.com/case-studies.php</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>https://insightned.com/contact.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/data-engineering.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/mlops.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/business-analytics.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/data-warehouse.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/ai-agent.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/ad-platforms.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/data-migration.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>https://insightned.com/services/data-archi.php</loc>
    <changefreq>monthly</changefreq>
    <priority>0.9</priority>
  </url>
</urlset>';

file_put_contents('sitemap.xml', $sitemapContent);

echo "Meta tags update complete! All HTML files have been converted to PHP with proper meta tags.\n";
echo "Sitemap has been updated with new PHP URLs.\n";

// Reminder for manual tasks
echo "\nReminder: Please update the following:\n";
echo "1. Update all internal links to point to .php files instead of .html\n";
echo "2. Configure your web server to handle PHP files\n";
echo "3. Set up URL rewriting if you want to keep .html in URLs\n";
echo "4. Test all pages to ensure meta tags are properly displayed\n";