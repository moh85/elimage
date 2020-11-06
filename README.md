# elimage
PHP class to resize and compress images (thumbnail, optimization etc.)

`Accepted images types: PNG, JPG, JPEG`

# Usage

Create new elimage object:

```php
<?php
include_once 'elimage.php';
$elimage = new elimage;
```

## Required options:

`$elimage->old` {String} (the original image path)

`$elimage->new` {String} (the new image path, can be the same as "old" if you want to replace the original with the new one)



## Optional options:

`$elimage->quality` {Numeric} (for jpg and jpeg: 1 to 100 - the default quality is 100 / for png: from 1 to 9 - the default quality is 9)

`$elimage->width` {Numeric} (the new image width - respecting the original aspect ratio)

`$elimage->lock` - {Boolean} (if you don't want to change the image dimension, set this option to TRUE)

* Note: it's required to use one of the above options "width" or "lock".

## Sample usage (new custom dimensions based on width)

```php
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
```


## Sample usage (preserve original image dimensions)

```php
/* new elimage object */
$image = new elimage;
/* original image */
$image->old = './test.jpg';
/* new image to create */
$image->new = './test-thumb.jpg';
/* preserve the original image width and height */
$image->lock = true;
/* set quality: (1-100 for jpeg / 1 to 9 for png) */
$image->quality = 90;
/* create the image and get the new image path */
$new_image_path = $image->apply();
```

## Demo

https://uplody.com/elimage/
