<?php
/* include elimage class */
include_once 'elimage.php';

/* new elimage object */
$image = new elimage;
/* original image */
$image->old = './test.jpg';
/* new image to create */
$image->new = './test-thumb.jpg';
/* set the new image width: auto preserve aspect ratio */
$image->width = 500;
/* set quality: (1-100 for jpeg / 1 to 9 for png) */
$image->quality = 90;
/* create the image and get the new image path */
$new_image_path = $image->apply();

echo $new_image_path;
