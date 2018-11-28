<?php
session_start(); //MUST START SESSION
$letters = '2223344557775345678ABCDEFGHJKLMNPQRSTUVWX';
$string_length=6; //NUMBER OF CHARS TO DISPLAY
$rand_string='';
for($i=0;$i<$string_length;$i++)
{
  //PICK A RANDOM
  $rand_string.=substr($letters, mt_rand(0, strlen($letters)-1), 1);
}//IMAGE VARIABLES
$width=95;
$height=25;
//INIT IMAGE
$img=imagecreatetruecolor($width, $height);
//ALLOCATE COLORS
$black=imagecolorallocate($img, 0, 0, 0);
$gray=imagecolorallocate($img, 200, 200, 200);
imagefilledrectangle($img, 0, 0, $width, $height, $gray);
//REPLACE THIS WITH THE FONT YOU UPLOAD
$font='captchaFont/actionj.ttf';
$font_size=16;
//CALC APPROX LOCATION FOR TEXT
$y_value=($height/2)+($font_size/2);
$x_value=($width-($string_length*$font_size))/2;
//DRAW STRING USING TRUE TYPE FUNCTION
imagettftext($img, $font_size, 0, $x_value,
    $y_value, $black, $font, $rand_string);
$_SESSION['captcha_code']=$rand_string;
//OUTPUT IMAGE HEADER AND SEND TO BROWSER
header("Content-Type: image/png");
imagepng($img);
?>