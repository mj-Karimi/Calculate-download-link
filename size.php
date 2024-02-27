<?php

$download_links = array(
    'https://domain.com/test.zip',
    'https://domain.com/test.mkv',
    // and other links
);

$total_size = 0;

foreach ($download_links as $link) {
    $headers = get_headers($link, 1);
    if ($headers && isset($headers['Content-Length'])) {
        $file_size = $headers['Content-Length'];
        $total_size += $file_size;
    } else {
        echo "Unable to get size for file: $link\n";
    }
}

echo "Total size of all files: " . formatBytes($total_size);

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}
