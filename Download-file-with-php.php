<?php

$download_links = array(
    'https://domain.com/test.zip',
    'https://domain.com/test.mkv',
    // and other links
);

foreach ($download_links as $link) {
    $file_name = basename($link);
    $file_content = file_get_contents($link);
    
    if ($file_content !== false) {
        file_put_contents($file_name, $file_content);
        echo "File downloaded: $file_name\n";
    } else {
        echo "Failed to download file: $link\n";
    }
}
