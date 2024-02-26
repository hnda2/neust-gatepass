<?php 
function generateRandomNumber($length = 50) {
    $number = '1234567890SourceCodePhAndresJario';
    $numberLength = strlen($number);
    $randomNumber = '';
    for ($i = 0; $i < $length; $i++) {
        $randomNumber .= $number[rand(0, $numberLength - 1)];
    }
    return $randomNumber;
}
$code= date('Ymd').generateRandomNumber();

$timezone = 'Asia/Manila';date_default_timezone_set($timezone);
include "conn.php";

$setting_query ="SELECT * FROM tbl_system_setting WHERE SYS_ISDEFAULT='YES'";
$setting_query_run=$conn->query($setting_query);
if($setting_query_run->num_rows>0){
    foreach ($setting_query_run as $key => $value) {
       $SYS_NAME =$value['SYS_NAME'];
       $SYS_ADDRESS =$value['SYS_ADDRESS'];
       $SYS_LOGO =$value['SYS_LOGO'];
       $SYS_EMAIL =$value['SYS_EMAIL'];
       $SYS_ABOUT =$value['SYS_ABOUT'];
    }
}else{
    $SYS_NAME ="NAME NOT SET";
    $SYS_ADDRESS ="";
    $SYS_LOGO ="";
    $SYS_EMAIL ="";
    $SYS_ABOUT ="";
}

?>
<!DOCTYPE html>
<html class="no-js" lang="en" 
xmlns:og="http://opengraphprotocol.org/schema/"
xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <?php 
        if($SYS_NAME==""){
        ?>
        <title>Not Set</title>
        <?php }else{ ?>
        <title><?=$SYS_NAME;?></title>
        <?php }?>
    
        <?php 
        if($SYS_LOGO==""){
        ?>
        <link rel="icon" type="image/x-icon" href="../images/logo.png">
        <?php }else{ ?>
        <link rel="icon" type="image/x-icon" href="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>">
        <?php }?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link rel="stylesheet" type="text/css" href="slider/css/demos.css" />
        <link rel="stylesheet" type="text/css" href="slider/css/style2.css" />
		<link rel="stylesheet"href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
		<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
		 <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
      

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    </head>