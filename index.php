<?php
$filename = 'background.jpg';
$percent = 2;

// Get new sizes
list($width, $height) = getimagesize($filename);
$newwidth = $width * $percent;
$newheight = $height * $percent;

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
$dest = $thumb;
//$dest = imagecreatefromjpeg('background.jpg');
$src = imagecreatefrompng('logo.png');

imagealphablending($dest, false);//have give up.
imagesavealpha($dest, true);//have give up.


imagecopymerge($dest, $src, 60, 10, 0, 0, 490, 90, 60); //have to play with these numbers for it to work for you, etc.

header('Content-Type: image/png');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>	