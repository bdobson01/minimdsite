<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="data:,">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php
require_once __DIR__ . '/../config.php';

use MatthiasMullie\Minify;

$sourcePath = __DIR__ . '/../css/site.css';
$minifier = new Minify\CSS($sourcePath);

$css = $minifier->minify();
echo $css;

$headeractive = array();
$headeractive['index'] = "";
$headeractive['contact'] = "";
$headeractive['about'] = "";
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
