<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    foreach ($seo->result_array() as $value) {
        $tittle = $value['tittle'];
        $keyword = $value['keyword'];
        $description = $value['description'];
    }
    ?>
    <meta charset="utf-8">
    <meta name="keyword" content="<?php echo $keyword;?>">
    <meta name="description" content="<?php echo $description;?>">
    <meta name="author" content="">
    <title><?php echo $tittle;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets1'); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets1'); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets1'); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('assets1'); ?>/site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="<?php echo base_url('assets1'); ?>/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="<?php echo base_url('assets1'); ?>/vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="<?php echo base_url('assets1'); ?>/vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="<?php echo base_url('assets1'); ?>/vendor/drift-zoom/dist/drift-basic.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="<?php echo base_url('assets1'); ?>/css/theme.min.css">
    <script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
       new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WKV3GT5');
</script>
<style type="text/css">
 form{
  width: inherit;
}
</style>
</head>
<!-- Body-->
<body class="handheld-toolbar-enabled">
 <!-- Google Tag Manager (noscript)-->
 <noscript>
  <iframe src="www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
</noscript>
<main class="page-wrapper">
  <!-- Quick View Modal-->

  <!-- Navbar 3 Level (Light)-->
  <header class="shadow-sm">
   <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
   <div class="navbar-sticky bg-light">
    <div class="navbar navbar-expand-lg navbar-light">
     <div class="container">

        <?php
        foreach ($logo->result_array() as $value) {
            $logo = $value['gambar'];
        }
        ?>
        <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url('images'); ?>/logo/<?php echo $logo ?>" width="142"></a><a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="<?php echo base_url('assets1'); ?>/index.html"><img src="<?php echo base_url('images'); ?>/logo/<?php echo $logo ?>" width="74"></a>

        <?php echo form_open('home/cari');?>
        <div class="input-group d-none d-lg-flex mx-4" >
           <input class="form-control rounded-end pe-5" type="text" name="cari"placeholder="Cari Produk" ><i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
       </div>
       <?php echo form_close();?>

       <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
           <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="" data-bs-toggle="modal">                  
             <div class="navbar-tool ms-3">
              <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="<?php echo base_url();?>home/keranjang">
               <i class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text" href="<?php echo base_url();?>home/keranjang">Keranjang Belanja</a>
           </div>
       </div>
   </div>
</div>
<div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
    <div class="container">
     <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- Search-->
      <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
       <input class="form-control rounded-start" type="text" placeholder="Search for products">
   </div>
   <!-- Departments menu-->
   <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
       <li class="nav-item active "><a class="nav-link  ps-lg-0" href="<?php echo base_url()?>" ><i class="ci-view-grid me-2"></i>Home</a>
       </li>
   </ul>
   <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown">Kategori</a>
        <div class="dropdown-menu px-2 pb-4">
          <div class="d-flex flex-wrap flex-sm-nowrap">
            <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
              <div class="widget widget-links">
                <ul class="widget-list">
                    <?php
                    foreach ($kategori->result_array() as $value) { ?>
                      <li class="widget-list-item mb-1"><a class="widget-list-link" href="<?php echo base_url();?>home/kategori/<?php echo $value['id_kategori'];?>"><?php echo $value['nama_kategori'];?></a></li>
                      <?php
                  }
                  ?>
              </ul>
          </div>
      </div>
  </div>
</div>
</li>
</ul>
<!-- Primary menu-->
<ul class="navbar-nav">
   <li class="nav-item "><a class="nav-link" href="<?php echo base_url();?>home/tentang_kami" >Tentang Kami</a>
   </li>
   <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>home/cara_belanja" >Cara Belanja</a>
    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>home/hubungi_kami " >Hubungi Kami</a>
    </li>
</ul>
</div>
</div>
</div>
</div>
</header>
