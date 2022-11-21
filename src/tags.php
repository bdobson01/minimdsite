<?php
require __DIR__ . '/../vendor/autoload.php';

use Pagerange\Markdown\MetaParsedown;

function minimdsite_showtags()
{
    $tags = "";
    $path = __DIR__ . '/../markdown';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));
    foreach ($files as $file)
    {
        $mp = new MetaParsedown(); 
        $text = file_get_contents($path . "/" . $file);
        $meta = $mp->meta($text);
        if (isset($meta['tags']))
        {
            $tags = $tags . "," . $meta['tags'];
        }
    }
    $new_arr = array_unique(array_map('trim', explode(',', $tags)));
    sort($new_arr);
    $content = "<h1>List of all tags</h1>";
    foreach ($new_arr as $tag)
    {
        $content .= '<p><a href="index.php?page=minimdsite_searchtags&tag=' . urlencode($tag) . '">' . $tag . '</a></p>' . "\n";
    }
    return $content;
}


function minimdsite_searchtags()
{
    $tags = "";
    $path = __DIR__ . '/../markdown';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));
    $tag = urldecode($_GET['tag']);
    $content = "<h1>Files with tag [$tag]</h1>";
    foreach ($files as $file)
    {
        $mp = new MetaParsedown(); 
        $text = file_get_contents($path . "/" . $file);
        $meta = $mp->meta($text);
        $basename = explode('.', $file);
        if (isset($meta['tags']) && strpos($meta['tags'], $tag) !== false)
        {
            $content .= '<p><a href="index.php?page=' . $basename[0] . '">' . $basename[0] . '</a></p>' . "\n";
        }
    }
    return $content;
}