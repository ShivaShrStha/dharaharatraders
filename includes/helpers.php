<?php
/**
 * Small helpers for image path normalization used across templates.
 */
function normalize_image_path($imagePath) {
    $imagePath = trim((string)$imagePath);
    if (empty($imagePath)) {
        return '/img/placeholder-product.jpg';
    }

    // Already an absolute URL
    if (strpos($imagePath, 'http://') === 0 || strpos($imagePath, 'https://') === 0) {
        return $imagePath;
    }

    // If already root-absolute, keep it
    if ($imagePath[0] === '/') {
        return $imagePath;
    }

    // If stored as uploads/products/..., ensure leading slash
    if (strpos($imagePath, 'uploads/products/') === 0) {
        return '/' . $imagePath;
    }

    // If stored just as filename like product_123.jpg, assume uploads/products/
    if (preg_match('/^[\w\-]+\.(jpe?g|png|webp|gif)$/i', $imagePath)) {
        return '/uploads/products/' . $imagePath;
    }

    // Otherwise, add leading slash as a safe default
    return '/' . $imagePath;
}
