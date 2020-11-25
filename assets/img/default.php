<?php
$req = explode("/", $_SERVER['PATH_INFO']);

//Set Image Size
$size = [200,200];
if(isset($req[1])){
	$size = explode("x", $req[1]);
	if(!$size[1]) $size[1] = $size[0];
}

//Set Background Color
$hex = ( $req[2] ) ? '#'.$req[2] : '#f9f9f9';
$hex = sscanf($hex, "#%02x%02x%02x");

$outimg = imagecreate( $size[0], $size[1]);
$background = imagecolorallocate( $outimg, $hex[0], $hex[1], $hex[2]);
header('Pragma: public');
header('Cache-Control: max-age=86400');
header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
header('Content-Type: image/png');
imagepng($outimg);
imagecolordeallocate($background);
imagedestroy($outimg);
?> 