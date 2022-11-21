<?php
ob_start();
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/header.php';
include __DIR__ . '/src/tags.php';
include __DIR__ . '/src/search.php';

use Pagerange\Markdown\MetaParsedown;

$mp = new MetaParsedown(); 

$page = __DIR__ . '/markdown/index.md';
if (isset($_GET['page']))
{
    $page = __DIR__ . '/markdown/' . $_GET['page'] . '.md';
}
$text = "file $page not found.";
if (file_exists($page))
{
    $text = file_get_contents($page);
}
$content = $mp->text($text);
if (strpos($page, "minimdsite_") !== false)
{
    $fn = $_GET['page'];
    if (function_exists($fn))
    {
        $content = $fn();
    }
}
showHeader($mp->meta($text));
include __DIR__ . '/src/content_header.php';
echo $content;

include __DIR__ . '/src/content_footer.php';
include __DIR__ . '/src/footer.php';
