<?php
ob_start();
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/header.php';

$Parsedown = new Parsedown();
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
include __DIR__ . '/src/content_header.php';
$content = $Parsedown->text($text);
echo $content;
include __DIR__ . '/src/content_footer.php';
include __DIR__ . '/src/footer.php';
