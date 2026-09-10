<?php
// Debug script to test routing
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/products';
$_SERVER['HTTP_HOST'] = 'localhost';

echo "Testing routing...\n";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";

// Include the main index.php from public folder
chdir('c:\laragon\www\LavaLust\public');
require 'index.php';
?>
