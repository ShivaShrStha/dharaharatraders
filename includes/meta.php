<?php
/*
 * Site-wide meta and structured data
 * Uses optional variables set by pages: $meta_title, $meta_description, $meta_image, $meta_url
 */

// Defaults
$site_url = 'https://dharaharatraders.com';
$site_name = 'Dharahara Traders';
$default_description = 'Dharahara Traders Pvt. Ltd. — Reliable import-export company in Nepal specializing in medical equipment, cosmetics, herbs and electronics.';
$default_image = $site_url . '/img/Dharaharalogo.png';

$meta_title = isset($meta_title) ? $meta_title : ($site_name);
$meta_description = isset($meta_description) ? $meta_description : $default_description;
$meta_image = isset($meta_image) ? $meta_image : $default_image;
$meta_url = isset($meta_url) ? $meta_url : ($site_url . $_SERVER['REQUEST_URI']);

// Canonical
echo "<link rel=\"canonical\" href=\"" . htmlspecialchars($meta_url) . "\">\n";

// Open Graph / Twitter
echo "<meta property=\"og:site_name\" content=\"" . htmlspecialchars($site_name) . "\">\n";
echo "<meta property=\"og:title\" content=\"" . htmlspecialchars($meta_title) . "\">\n";
echo "<meta property=\"og:description\" content=\"" . htmlspecialchars($meta_description) . "\">\n";
echo "<meta property=\"og:image\" content=\"" . htmlspecialchars($meta_image) . "\">\n";
echo "<meta property=\"og:url\" content=\"" . htmlspecialchars($meta_url) . "\">\n";
echo "<meta property=\"og:type\" content=\"website\">\n";
echo "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
echo "<meta name=\"twitter:title\" content=\"" . htmlspecialchars($meta_title) . "\">\n";
echo "<meta name=\"twitter:description\" content=\"" . htmlspecialchars($meta_description) . "\">\n";
echo "<meta name=\"twitter:image\" content=\"" . htmlspecialchars($meta_image) . "\">\n";

// Organization JSON-LD
$org = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $site_name,
    'url' => $site_url,
    'logo' => $default_image,
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+9779818852676',
        'contactType' => 'customer service',
        'areaServed' => 'NP'
    ]
];

echo "<script type=\"application/ld+json\">" . json_encode($org, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) . "</script>\n";

// Header stylesheet: load early in the head for better render performance
echo "<link rel=\"stylesheet\" href=\"/includes/header.css\">\n";

?>
