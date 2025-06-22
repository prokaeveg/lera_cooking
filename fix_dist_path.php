<?php

declare(strict_types = 1);

require './vendor/autoload.php';

$root = __DIR__ . '/dist';
$categoryDir = $root . '/category';
$receiptDir = $root . '/receipt';

$indexFile = $root . '/index.html';
$content = file_get_contents($indexFile);
$content = replace_defaults($content, 0);
$content = preg_replace('#/category/([a-zA-Z-]*)#', 'category/$1/index.html', $content);
file_put_contents($indexFile, $content);

$categories = glob($categoryDir . '/*');
$categories = [$categories[10]];
foreach ($categories as $category) {
    $fileName = $category . '/index.html';
    $content = file_get_contents($category . '/index.html');

    $content = replace_defaults($content);
    $content = preg_replace('#/receipt/([a-zA-Z-0-9]*)#', '../../receipt/$1/index.html', $content);

    file_put_contents($fileName, $content);
}

$receipts = glob($receiptDir . '/*');
foreach ($receipts as $receipt) {
    $fileName = $receipt . '/index.html';
    $receiptCode = end(explode('/', $receipt));

    $content = file_get_contents($receipt . '/index.html');

    $content = replace_defaults($content);

    file_put_contents($fileName, $content);
}

function replace_defaults(string $content, int $nestCount = 2): string
{
    $nestString = str_repeat('../', $nestCount);

    $content = preg_replace('#https*://localhost#', '', $content);
    $content = preg_replace('#/images#', $nestString . "images", $content);
    $content = preg_replace('#/fonts#', $nestString . 'fonts', $content);
    $content = preg_replace('#/favicon.ico#', $nestString . 'favicon.ico', $content);

    return $content;
}
