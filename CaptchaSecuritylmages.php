<?php 
session_start(); 
class CaptchaSecurityImages {
 var $font ='jigsawtr.ttf'; 
 function generateCode($characters) { 
/* Mendaftar semua karakter yang mungkin, huruf hidup, vokal dan karakl yang yang serupa telah dipindahkan*/ 
$possible = '23456789bcdfghjkmnpqrstvwxyz'; 
$code = ";
 $i = 0; 
 while ($i < $characters) { 
$code .= substr($Spossible, mt_rand(0, strlen($possible)-1), 1); 
$i++; 
} 
return $code; 

} 
function CaptchaSecurity1mages($width='120',$height='40',$characters='6') { 
$code = $this->generateCode($characters);
 /* Ukuran huruf akan menjadi 75 % sesuai dengan tinggi gambar */ 
 $font_size = $height * 0.75; 
 $image = @imagecreate($width, $height) or die('Cannot Initialize new GD image stream'); 
 /* Mengatur pewarnaan */ 
 $background_color = imagecolorallocate($image, 255, 255, 255); 
 $text_color = imagecolorallocate($image, 20, 40, 100); 
 $noise_color = imagecolorallocate($irnage, 100, 120, 180); 
 /* Menciptakan background secara acak */ 
 for($i=0; $i<($width*$Sheight)/3; $i++ ) {
 imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
 }
  /* Menciptakan garis pada background secara acak */ 
  for( $i=0; $i<($widths*$height)/150; $i++ ) { 
imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand (0,$width), mt_rand(0,$height), $noise_color);
  } 

/* Menciptakan textbox dan menambahkan teks */ 
$textbox = imagettfbbox($font_size, 0, $this->font, $code); 
$x = ($width-$Stextbox[4])/2;
 $Y = ($height-$textbox[5])/2; 
 imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font, $code); 
 /* Keluaran captcha images ke dalam browser */ 
 imagejpeg($image); 
 imagedestroy($image); 

 $_SESSION['security_code'] = $code; 
} 
}
 $width = isset($_GET['width'])? $_GET['width'] :'120';
 $height = isset($_GET['height']) ? $_GET[height]: '40';
$characters = isset($_GET['characters']) ? $_GET['characters']: '7';
header('Content-Type: image/jpeg');
$captcha = new captchasecurityimages($width,$height,$characters); 
?> 
