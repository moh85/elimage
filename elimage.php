<?php
class elimage{
var $types = ['jpg', 'jpeg', 'png'], $width = '', $height = '', $old = '', $new = '', $result = '', $quality = 100, $lock = false;
function apply(){
if(!file_exists($this->old)){ exit('elimage error: "old" image isn\'t uploaded'); }
if(strlen($this->old) == 0){ exit('elimage error: "old" image isn\'t set'); }
if(strlen($this->new) == 0){ exit('elimage error: "new" image isn\'t set'); }
if(!is_numeric($this->quality)){ exit('elimage error: "quality" isn\'t a number'); }
$imagetype = strtolower(pathinfo($this->old, PATHINFO_EXTENSION)); $mime = ['mime' => 'image/' . $imagetype];
$ts = implode(', ', $this->types);
if(!in_array($imagetype, $this->types)){ exit('elimage error: accepted images types are ' . $ts); }
if($mime['mime']=='image/png'){ $src_img = imagecreatefrompng($this->old); }
if($mime['mime']=='image/jpg' || $mime['mime']=='image/jpeg'){ $src_img = imagecreatefromjpeg($this->old); }   
$old_x = imageSX($src_img); $old_y = imageSY($src_img);
if((strlen($this->width) > 0 && is_numeric($this->width)) || $this->lock); 
else { exit('elimage error: "width" or "lock" isn\'t set'); } 
if($this->lock){ $this->width = $old_x; }
$this->height = $this->width;
if($old_x > $old_y) { $thumb_w = $this->width; $thumb_h = $old_y * ($this->height/$old_x); }
if($old_x < $old_y) { $thumb_w = $old_x*($this->width/$old_y); $thumb_h = $this->height; }
if($old_x == $old_y) { $thumb_w = $this->width; $thumb_h = $this->height; }
$dst_img = ImageCreateTrueColor($thumb_w,$thumb_h);
imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
if($mime['mime']=='image/png'){
$result = imagepng($dst_img,$this->old, ($this->quality>=1&&$this->quality<=9?$this->quality:9)); }
if($mime['mime']=='image/jpg' || $mime['mime']=='image/jpeg'){ 
$result = imagejpeg($dst_img, $this->new, $this->quality); }
imagedestroy($dst_img); imagedestroy($src_img); return $this->new;
 }
}
