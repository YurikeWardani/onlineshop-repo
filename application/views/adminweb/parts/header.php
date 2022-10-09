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
<!-- Viewport-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon and Touch Icons-->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets1'); ?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets1'); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets1'); ?>/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url('assets1'); ?>/site.webmanifest">
<link rel="mask-icon" color="#fe6a6a" href="<?php echo base_url('assets1'); ?>/safari-pinned-tab.svg">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<!-- Vendor Styles including: Font Icons, Plugins, etc.-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url('assets1'); ?>/vendor/simplebar/dist/simplebar.min.css"/>
<link rel="stylesheet" media="screen" href="<?php echo base_url('assets1'); ?>/vendor/tiny-slider/dist/tiny-slider.css"/>


<!-- Main Theme Styles + Bootstrap-->
<link rel="stylesheet" media="screen" href="<?php echo base_url('assets1'); ?>/css/theme.min.css">
<script src="https://kit.fontawesome.com/206142bfe3.js" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<!-- Google Tag Manager-->
<script>
  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
     new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WKV3GT5');
</script>
<style type="text/css">

   .badge {
      display: inline-block;
      min-width: 12px; 
      padding: 4px 6px; 
      border-radius: 50%;
      text-align: center;
      background: red;
      color: white;
      margin-left: 5px;

  }
</style>
</head>

<body>

   <noscript>
      <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
  </noscript>
  <main class="container-fluid">

      <section class="offcanvas-enabled row pb-3 pb-md-4">
         <div class="col-xxl-12">
            <!-- Navbar-->
            <?php
                foreach ($logo->result_array() as $value) {
                   $logo = $value['gambar'];
               }
           ?>
           <header class="navbar navbar-expand navbar-light fixed-top bg-light shadow-sm px-3 px-lg-4" data-scroll-header data-fixed-element><a class="navbar-brand d-lg-none" href="<?php echo base_url(''); ?>adminweb ?>"><img src="<?php echo base_url('images'); ?>/logo/<?php echo $logo ?>" width="142" alt="Cartzilla"></a>
               <ul class="navbar-nav ms-auto d-none d-lg-flex">
                  <li class="nav-item">
                     <div class="navbar-tool ms-3">
                        <a class="navbar-tool-icon-box bg-secondary" href="<?php echo base_url();?>adminweb/buku_tamu"  title="Buka Semua Pesan">
                           <?php
                               $query = $this->db->query("select count(status) as stts from tbl_hubungikami where status='0'");;
                               foreach ($query->result_array() as $tampil) {
                                  $status = $tampil['stts'];
                              }
                              if ($status!="0") { ?>
                              <span class="navbar-tool-label"> <?php echo $status; ?> </span>
                              <?php 
                              }
                              else {}
                          ?>   
                          <i class="navbar-tool-icon ci-mail"></i>
                      </a>
                      <a class="navbar-tool-text" href="<?php echo base_url();?>adminweb/buku_tamu" ></a>
                  </div>
              </li>
              <li class="nav-item">
                 <div class="navbar-tool ms-3">
                    <a class="navbar-tool-icon-box bg-secondary" href="<?php echo base_url();?>adminweb/transaksi"  title="Buka Semua Transaksi">
                       <?php
                           $query = $this->db->query("select count(status) as stts from tbl_transaksi_header where status='0'");
                           foreach ($query->result_array() as $tampil) {
                              $status = $tampil['stts'];
                          }
                          if ($status!="0") { ?>
                          <span class="navbar-tool-label"> <?php echo $status; ?> </span>
                          <?php 
                          }
                          else {}
                      ?>   
                      <i class="navbar-tool-icon ci-cart"></i>
                  </a>
                  <a class="navbar-tool-text" href="<?php echo base_url();?>adminweb/transaksi" ></a>
              </div>
          </li>
      </ul>
      <button class="navbar-toggler d-block d-lg-none ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#components-nav"><span class="navbar-toggler-icon"></span></button><a class="btn btn-primary btn-shadow ms-2 ms-lg-4" href="<?php echo base_url();?>adminweb/logout" rel="noopener" onclick="return confirm('Konfirmasi Logout?')"><i class="fa fa-key me-2"></i>Log Out </a>
  </header>
  <!-- Side navigation-->
  <aside class="offcanvas offcanvas-expand bg-dark" id="components-nav">
   <div class="offcanvas-header bg-darker d-none d-lg-block"><a class="navbar-brand py-1" href="<?php echo base_url(''); ?>adminweb ?>"><img src="<?php echo base_url('images'); ?>/logo/<?php echo $logo ?>" width="142" alt="logo"></a></div>
   <div class="offcanvas-header bg-darker align-items-center d-flex d-lg-none">
      <div class="d-flex align-items-center">
         <h5 class="text-light mb-0 me-2">Menu</h5>
     </div>
     <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
 </div>
 <div class="offcanvas-body py-0" data-simplebar data-simplebar-auto-hide="true">
  <div class="pt-4 pb-3 mt-lg-3">
     <div class="d-flex d-lg-none pb-4 mb-4 border-bottom border-light">
        <a class="btn btn-outline-light btn-sm me-3" href="<?php echo base_url();?>adminweb/buku_tamu"><i class="ci-mail align-middle mt-n1 me-2"> </i> 
           Pesan
           <?php
               $query = $this->db->query("select count(status) as stts from tbl_hubungikami where status='0'");
               foreach ($query->result_array() as $tampil) {
                  $status = $tampil['stts'];
              }
              if ($status!="0") { ?>
              <span class="badge"><?php echo $status; ?></span>
              <?php 
              }
              else {} ?>  
          </a>
          <a class="btn btn-outline-light btn-sm  me-3" href="<?php echo base_url();?>adminweb/transaksi"><i class="ci-cart align-middle mt-n1 me-2"> </i> 
            Transaksi
            <?php
                $query = $this->db->query("select count(status) as stts from tbl_transaksi_header where status='0'");
                foreach ($query->result_array() as $tampil) {
                   $status = $tampil['stts'];
               }
               if ($status!="0") { ?>
               <span class="badge"><?php echo $status; ?></span>
               <?php 
               }
               else {} ?> 

           </a>
       </div>
       <div class="widget widget-links widget-light border-bottom border-light mb-4 ">
           <h3 class="widget-title text-white"><a href="<?php echo base_url('adminweb/home')?>">Dashboard</a></h3>
       </div>
       <div class="widget widget-links widget-light border-bottom border-light mb-4 pb-4 me-n3">
           <h3 class="widget-title text-white">Transaksi</h3>
           <ul class="widget-list">
              <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/transaksi')?>">Transaksi Belum Diproses</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/semua_transaksi')?>">Transaksi Sudah Diproses</a></li>
          </ul>
      </div>
      <div class="widget widget-links widget-light border-bottom border-light mb-4 pb-4 me-n3">
       <h3 class="widget-title text-white">Produk</h3>
       <ul class="widget-list">
          <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/brand')?>"> Brand</a></li>
          <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/kategori')?>"> Kategori</a></li>
          <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/produk')?>"> Produk</a></li>
      </ul>
  </div>
  <div class="widget widget-links widget-light border-bottom border-light mb-4 pb-4 me-n3">
   <h3 class="widget-title text-white">Setting</h3>
   <ul class="widget-list">
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/tentangkami')?>"> Tentang Kami</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/carabelanja')?>"> Cara Belanja</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/slider')?>"> Slider</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/kontak')?>"> Kontak</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/logo')?>"> Logo</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/sosial_media')?>"> Sosial Media</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/seo')?>"> SEO</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/bank')?>"> Bank</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/jasapengiriman')?>"> Jasa Pengiriman</a></li>
      <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url('adminweb/admin')?>"> Admin</a></li>
  </ul>
</div>
</div>
</aside>
