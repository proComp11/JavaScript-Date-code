<?php 
  session_start();
  
  function randText(){
    $txt="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $str="";
    for($i=0;$i<5;$i++)
    {
      $index=rand(0,strlen($txt)-1);
      $str.=$txt[$index];
    }
    return $str;
  }

  
  header("Cache-Control: no-store, no-cache, must-revalidate"); 
  header("Content-type:image/png");
  $image=imagecreate(70,30);
  $backColor=imagecolorallocate($image,255,180,150);
  $txtColor=imagecolorallocate($image,250,250,250);
  $code=randText();
  $_SESSION["captcha"]=$code;
  imagestring($image,5,15,7,$code,$txtColor);
  imagepng($image);
  imagecolordeallocate($image,$backColor);
  imagecolordeallocate($image,$txtColor);
  imagedestroy($image);
?>