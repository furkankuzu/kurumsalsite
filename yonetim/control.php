<?php

  include_once("assets/function.php");

  $yonetim = new yonetim();

  $yonetim->kontrolet("cot");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>Kuzu Nakliyat-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">    
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">   
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>

  <div id="preloader">
    <div class="loader">

    </div>

  </div>

  <div class="page-container">
    <div class="sidebar-menu">
      <div class="sidebar-header">

        <div class="logo">
          <a href="control.php"><img src="assets/images/logo/logo.png" alt="logo"/> </a>
        </div>
      </div>

      <div class="main-menu">

        <div class="menu-inner">

          <nav>
            <ul class="metismenu" id="menu">
              <li><a href="control.php?sayfa=settings"><i class="ti-pencil"></i><span>Site Ayarları</span></a></li>
              <li><a href="control.php?sayfa=carousel"><i class="ti-image"></i><span>Carousel Ayarları</span></a></li>
              <li><a href="control.php?sayfa=aracfilo"><i class="ti-car"></i><span>Araç Filosu Ayarları</span></a></li>
              <li><a href="control.php?sayfa=hakkimizda"><i class="ti-flag"></i><span>Hakkımızda Ayarları</span></a></li>
              <li><a href="control.php?sayfa=hizmetler"><i class="ti-medall"></i><span>Hizmetler Ayarları</span></a></li>
              <li><a href="control.php?sayfa=references"><i class="ti-eye"></i><span>Referans Ayarları</span></a></li>              
              <li><a href="control.php?sayfa=customer"><i class="ti-comment-alt"></i><span>Müşteri Yorumları</span></a></li>

            </ul>
          </nav>
        </div>
      </div>
    </div>

    <!-----SİDEBAR BİTİYOR.--->


  <div class="main-content">
    <div class="header-area">
      <div class="row align-items-center">

        <div class="col-md-6 col-sm-8 clearfix">

          <div class="nav-btn pull-left">
            
            <span></span>
            <span></span>
            <span></span>

          </div> 
        </div>
        

        <div class="col-sm-6 clearfix">

        <div class="user-profile pull-right" style="margin-right: 1px;">
          <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar" />
          <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $yonetim->kuladial($baglanti); ?><i class="fa fa-angle-down"></i></h4>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="control.php?sayfa=cikis">Çıkış</a>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-content-inner">
      <div class="row">
        <div class="col-lg-12 mt-5 bg-white text-center" style="min-height:500px;">

          
          <?php
          
            @$sayfa = $_GET["sayfa"];

            switch($sayfa):
              //--------SİTE AYARLARI---------
              case "settings":

                $yonetim->siteAyar($baglanti);
              break;
              //--------KULLANICI ÇIKIŞ-------
              case "cikis":

                $yonetim->cikis($baglanti);
              break;
              //------CAROUSEL AYARLARI--------
              case "carousel":

                $yonetim->introayar($baglanti);
              break;
              case "carouselekle":

                $yonetim->carouselekle($baglanti);
              break;
              
              case "carouselsil":

                $yonetim->carouselsil($baglanti);
              break;
              
              case "carouselguncelle":

                $yonetim->carouselguncelle($baglanti);
              break;
              //---------------ARAÇ FİLOSU--------------
              case "aracfilo":

                $yonetim->aracfilo($baglanti);
              break;
              case "filoekle":

                $yonetim->filoekle($baglanti);
              break;
              
              case "filosil":

                $yonetim->filosil($baglanti);
              break;
              
              case "filoguncelle":

                $yonetim->filoguncelle($baglanti);
              break;

              //----------HAKKIMIZDA AYARLARI----------

              case "hakkimizda":

                $yonetim->hakkimizda($baglanti);

              break;
              //----------HİZMETLER AYARLARI----------

              case "hizmetler":

                $yonetim->hizmetler($baglanti);

              break;

            endswitch;

          ?>



        </div>
      </div>
    </div>
      
  </div>

  
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script> 
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
