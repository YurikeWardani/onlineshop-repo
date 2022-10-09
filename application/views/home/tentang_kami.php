      <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Tentang Kami</h1>
          </div>
        </div>
      </div>
      <div class="container py-5 mt-md-2 mb-2">
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
              </div><br><hr><br>
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
              </div></div>
            </div>
          </div>
          <div class="col-lg-9">
            <?php
            foreach ($tentangkami->result_array() as $value) {
              $judul    = $value['judul'];  
              $deskripsi  = $value['deskripsi'];  
            }
            ?>
            <h2 class="h4 pb-3"><?php echo $judul;?></h2>
            <p class="fs-md"><?php echo $deskripsi;?></p>


            <h2 class="h4 pb-3">Pembayaran</h2>
            <?php
            foreach ($bank->result_array() as $value) {?>

              <div class="col-sm-3">
                <img src="<?php echo base_url();?>/images/bank/<?php echo $value['gambar'];?>" alt="" />
              </div>
              <?php
            }
            ?>
            <!-- Submit request-->
          </div>
        </div>
      </div>