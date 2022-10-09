<style type="text/css">
 .set-slider {
  width: 750px;
 }
</style>
<!-- Hero slider-->
<section class="tns-carousel tns-controls-lg">
 <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
  <!-- Item-->


  <?php
  $terakhir = $this->db->query("select max(id_slider) as terakhir from tbl_slider where status='1' ");
  foreach ($terakhir->result_array() as $value) {
   $t = $value['terakhir'];
  }
  ?>
  <?php
  foreach ($slider->result_array() as $value) { 

   if ($value['id_slider']==$t) { ?>
    <div class="px-lg-5" style="background-color: #3aafd2;">
     <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="set-slider d-block order-lg-2 me-lg-n5 flex-shrink-0" src="<?php echo base_url();?>images/slider/<?php echo $value['gambar'];?>" alt="Slider">
      <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
       <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
        <h3 class="h2 text-light fw-light pb-1 from-start"><span>Adriano MX</span>-Shop</h3>
        <h2 class="text-light display-5 from-start delay-1"><?php echo $value['tittle'];?></h2>
        <div class="text-light from-start text-wrap delay-2" style="height: 100%">
         <?php echo strip_tags(substr($value['description'],0,200));?>...
        </div>
        <h3 class="h2 text-light fw-light pb-1 from-start"></h3>
        <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="">Baca Selengkapnya<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
       </div>
      </div>
     </div>
    </div>
    <?php
   }
   else { ?>
    <div class="px-lg-5" style="background-color: #3aafd2;">
     <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="set-slider d-block order-lg-2 me-lg-n5 flex-shrink-0" src="<?php echo base_url();?>images/slider/<?php echo $value['gambar'];?>" alt="Slider">
      <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
       <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
        <h3 class="h2 text-light fw-light pb-1 from-start"><span>Adriano MX</span>-Shop</h3>
        <h2 class="text-light display-5 from-start delay-1"><?php echo $value['tittle'];?></h2>
        <div class="text-light from-start text-wrap delay-2" style="height: 100%">
         <?php echo strip_tags(substr($value['description'],0,200));?>...
        </div>
        <h3 class="h2 text-light fw-light pb-1 from-start"></h3>
        <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="" >Baca Selengkapnya<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
       </div>
      </div>
     </div>
    </div>
    <?php
   }

   ?>

   <?php
  }
  ?>

 </div>
</section>

<section class="container pt-md-3 pb-5 mb-md-3" style="margin-top:20px">
 <div class="row">
  <div class="col-lg-3">
   <div class="offcanvas offcanvas-collapse border-end" id="help-sidebar">
    <div class="offcanvas-body py-grid-gutter py-lg-1" data-simplebar data-simplebar-auto-hide="true">
     <!-- Links-->
     <div class="widget widget-links">
      <h3 class="widget-title d-none d-lg-block">Kategori</h3>
      <ul class="widget-list">
       <?php
       foreach ($kategori->result_array() as $value) {?>
        <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url();?>home/kategori/<?php echo $value['id_kategori'];?>"><?php echo $value['nama_kategori'];?> </a></li>
        <?php
       }
       ?>  
      </ul>
     </div>
    </div>
    <br><hr><br>
    <div class="offcanvas-body py-grid-gutter py-lg-1" data-simplebar data-simplebar-auto-hide="true">
     <div class="widget widget-links">
      <h3 class="widget-title d-none d-lg-block">Brand</h3>
      <ul class="widget-list">
       <?php
       foreach ($brand->result_array() as $value) { ?>
        <li class="widget-list-item"><a class="widget-list-link" href="<?php echo base_url();?>home/brand/<?php echo $value['id_brand'];?>"><?php echo $value['nama_brand'];?> </a></li>
        <?php
       }
       ?>  
      </ul>
     </div>
    </div>
   </div>
  </div>
  <div class="col-lg-9">
   <h2 class="h3 text-center">Features Producs</h2>
   <div class="row pt-4 mx-n2">
    <?php
    foreach ($produk->result_array() as $value) { ?>
     <!-- Product-->
     <div class="col-lg-4 col-md-3 col-sm-6 px-2 mb-4">
      <div class="card product-card">
       <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="fa fa-heart-o"></i></button>
       <a class="card-img-top d-block overflow-hidden" href="#quick-view<?php echo $value['id_produk']; ?>" data-bs-toggle="modal"><img src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="Product"></a>
       <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?php echo $value['kode_produk'];?></a>
        <h3 class="product-title fs-sm"><a href="shop-single-v1.html"><?php echo $value['nama_produk'];?></a></h3>
        <div class="d-flex justify-content-between">
         <div class="product-price"><span class="text-accent">Rp. <?php echo $value['harga'];?> ,-</span></div>

        </div>
       </div>
       <div class="card-body card-body-hidden">
        <a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-danger add-to-cart d-block"><i class="fa fa-shopping-cart"></i> Add to cart</a>
        <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view<?php echo $value['id_produk']; ?>" data-bs-toggle="modal"><i class="fa fa-eye align-middle me-1"></i> Quick view</a></div>
       </div>
      </div>
      <hr class="d-sm-none">
     </div>

     <?php
    }
    ?>

   </div>
   <div class="text-center pt-3"><a class="btn btn-outline-accent" href="">More products<i class="ci-arrow-right ms-1"></i></a></div>
  </div>
 </div>
</section>

<?php $no=0;
foreach ($produk->result_array() as $value) : $no++ ?>
 <div class="modal-quick-view modal fade" id="quick-view<?php echo $value['id_produk']; ?>" tabindex="-1">
  <div class="modal-dialog modal-xl">
   <div class="modal-content">
    <div class="modal-header">
     <h4 class="modal-title product-title"><a data-bs-toggle="tooltip" data-bs-placement="right">Detail Produk<i class="ci-arrow-right fs-lg ms-2"></i></a></h4>
     <button class="btn-close" type="button" title="Keluar" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <div class="row">
      <!-- Product gallery-->
      <div class="col-lg-7 pe-lg-0">
       <div class="product-gallery">
        <div class="product-gallery-preview order-sm-2">
         <div class="product-gallery-preview-item active" id="first"><img class="image-zoom" src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" data-zoom="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="Product image">
          <div class="image-zoom-pane"></div>
         </div>
        </div>
        <div class="product-gallery-thumblist order-sm-1">
         <a class="product-gallery-thumblist-item active" href="#first">
          <img src="<?php echo base_url();?>images/produk/<?php echo $value['gambar'];?>" alt="Product thumb">
         </a>
        </div>
       </div>
      </div>
      <!-- Product details-->
      <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
       <div class="product-details ms-auto pb-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
         <span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1"> <h3><?php echo $value['nama_produk'];?></h3></span>
         <button class="btn-wishlist" type="button" data-bs-toggle="tooltip" title="Add to wishlist"><i class="ci-heart"></i></button>
        </div>
        <div class="mb-3"><span class="h3 fw-normal text-accent me-1">Rp. <?php echo $value['harga'];?> ,-</span>
        </div>
        <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Kode Produk:</span><span class="text-muted" id="colorOptionText"><?php echo $value['kode_produk'];?></span></div>
        <form class="mb-grid-gutter">

         <div class="mb-3 d-flex align-items-center">


          <a href="<?php echo base_url();?>home/keranjang/<?php echo $value['id_produk'];?>" class="btn btn-danger add-to-cart d-block w-100"><i class="fa fa-shopping-cart"></i> Add to cart</a>
         </div>
        </form>
        <h5 class="h6 mb-3 pb-2 border-bottom"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</h5>
        <h6 class="fs-sm mb-2">Stok Tersedia</h6>
        <ul class="fs-sm ps-4">
         <li><?php echo $value['stok']?> item</li>
        </ul>
        <h6 class="fs-sm mb-2">Category:</h6>
        <ul class="fs-sm ps-4">
         <li><?php echo $value['nama_kategori']?></p></li>
        </ul> 
        <h6 class="fs-sm mb-2">Brand:</h6>
        <ul class="fs-sm ps-4">
         <li><?php echo $value['nama_brand'];?></p></li>
        </ul> 
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <?php endforeach; ?>