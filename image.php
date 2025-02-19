<?php

require 'vendor/autoload.php';

use Nesk\Puphpeteer\Puppeteer;

$puppeteer = new Puppeteer();
$browser = $puppeteer->launch();

$page = $browser->newPage();
$page->goto('test3.php?DestinationID=1');

// Adjust viewport size if needed
$page->setViewport(['width' => 800, 'height' => 600]);

// Generate a unique image name
$imageName = 'map_' . uniqid() . '.png';

// Take a screenshot
$page->screenshot(['path' => $imageName]);

$browser->close();

echo "Screenshot taken successfully! Image saved as: " . $imageName;
?>
