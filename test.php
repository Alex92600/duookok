<?php
// Constants
DEFINE('DS', dirname('/'));
DEFINE('DR', $_SERVER['DOCUMENT_ROOT'] . DS);
DEFINE('WR', 'webroot' . DS);

header('Content-type: image/jpg');
$img = new Imagick(DR . 'res/img/parquet3.jpg');
$img->thumbnailImage(100, 0);

echo $img;
