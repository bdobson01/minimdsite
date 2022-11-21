<?php
require_once __DIR__ . '/../config.php';

use MatthiasMullie\Minify;

function showHeader($meta)
{
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="data:,">
<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<?php
  if (isset($meta["title"]))
  {
    echo '<title>' . $meta["title"] . '</title>' . "\n";
  }
  if (isset($meta["description"]))
  {
    echo '<meta name="description" content="' . $meta["description"] . '">' . "\n";
  }
  if (isset($meta["tags"]))
  {
    echo '<meta name="keywords" content="' . $meta["tags"] . '">' . "\n";
  }
  if (isset($meta["author"]))
  {
    echo '<meta name="author" content="' . $meta["author"] . '">' . "\n";
  }
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php
$sourcePath = __DIR__ . '/../css/site.css';
$minifier = new Minify\CSS($sourcePath);

$css = $minifier->minify();
echo $css;

$headeractive = array();
$headeractive['index'] = "";
$headeractive['contact'] = "";
$headeractive['about'] = "";
$headeractive['minimdsite_search'] = '';
$headeractive['minimdsite_showtags'] = '';
$headeractive['minimdsite_searchtags'] = '';
if (isset($_GET['page']))
{
    $headeractive[$_GET['page']] = 'active';
}
else
{
  $headeractive['index'] = "active";
}

?>
</style>
</head>
<body>
<div class="header">
  <a href="index.php" class="logo"><?php echo WEBSITE_NAME; ?></a>
  <div class="header-right">
<?php
foreach (HEADER_ITEMS as $key => $value)
{
?>
    <a <?php if ($headeractive[$value] != "") echo 'class="' . $headeractive[$value] . '"'; ?> href="index.php?page=<?php echo $value; ?>"><?php echo $key; ?></a>
<?php
}
?>
  </div>
</div>
<?php
}
