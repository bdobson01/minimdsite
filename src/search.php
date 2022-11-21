<?php
require __DIR__ . '/../vendor/autoload.php';

use Pagerange\Markdown\MetaParsedown;

function minimdsite_search()
{
    $content = '
    <br><form action="index.php?page=minimdsite_search" method="get">
    <label for="text">Text:</label>
    <input type="text" id="text" name="text">
    <input type="hidden" id="page" name="page" value="minimdsite_search">
    <input type="submit" value="Search">
    </form>';

    if (isset($_GET['text']))
    {
        $results = 0;
        $search = trim(urldecode($_GET['text']));
        if ($search != "")
        {
            $mp = new MetaParsedown(); 
            $path = __DIR__ . '/../markdown';
            $files = scandir($path);
            $files = array_diff(scandir($path), array('.', '..'));
            foreach ($files as $file)
            {
                $text = file_get_contents($path . "/" . $file);
                if (strpos($text, $search) !== false)
                {
                    $basename = explode('.', $file);
                    $page = $basename[0];
                    $content .= '<p><a href="index.php?page=' . $page . '">' . $page . '</a>';
                    $meta = $mp->meta($text);
                    if (isset($meta['title']))
                    {
                        $content .= ': ' . $meta['title'];
                    }    
                    if (isset($meta['description']))
                    {
                        $content .= ': ' . $meta['description'];
                    }    
                    $content .= '</p>' . "\n";
                    $results++;
                }
            }
        }
        $content .= "<h2>$results results found</h2>";
    }
    return $content;
}
