      <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Hubungi Kami</h1>
          </div>
        </div>
      </div>
      <div class="container py-5 mt-md-2 mb-md-4">
        <div class="row">
          <div class="col-lg-3">
            <!-- Related articles sidebar-->
            <div class="offcanvas offcanvas-collapse border-end" id="help-sidebar">
              <div class="offcanvas-body py-grid-gutter py-lg-1" data-simplebar data-simplebar-auto-hide="true">
                <!-- Links-->
                <div class="widget widget-links">
                  <h3 class="widget-title d-none d-lg-block">Kontak Kami</h3>
                  <address>
                    <?php 
                    foreach ($kontak->result_array() as $value) {
                      $alamat = $value['alamat'];
                      $phone = $value['phone'];
                      $email = $value['email'];
                    }
                    ?>
                  </address>
                  <ul class="widget-list">
                    <li class="widget-list-item"><a class="widget-list-link" href="#"><i class="ci-book opacity-60 align-middle mt-n1 me-1"></i>Adriano MX-Shop</a></li>
                    <li class="widget-list-item"><a class="widget-list-link" href="#"><i class="ci-book opacity-60 align-middle mt-n1 me-1"></i><?php echo $alamat;?></a></li>
                    <li class="widget-list-item"><a class="widget-list-link" href="#"><i class="ci-book opacity-60 align-middle mt-n1 me-1"></i>Mobile: <?php echo $phone;?></a></li>
                    <li class="widget-list-item"><a class="widget-list-link" href="#"><i class="ci-book opacity-60 align-middle mt-n1 me-1"></i>Email: <?php echo $email;?></a></li>
                  </ul>
                </div>
              </div>
              <br><hr><br>
              <div class="offcanvas-body py-grid-gutter py-lg-1" data-simplebar data-simplebar-auto-hide="true">
                <div class="widget widget-links">
                  <h3 class="widget-title d-none d-lg-block">Temukan Kami</h3>
                  <ul class="widget-list">
                   <?php 
                   foreach ($sosial_media->result_array() as $value) {
                    $tw = $value['tw'];
                    $fb = $value['fb'];
                    $gp = $value['gp'];
                  }
                  ?>
                  <ul class="nav navbar-nav">
                    <li><a href="<?php echo $fb;?>" style="color: dimgray;"> <i class="fa fa-facebook"> Facebook</i></a></li>
                    <li><a href="<?php echo $tw;?>" style="color: dimgray;"> <i class="fa fa-twitter"> Twitter</i></a></li>
                    <li><a href="<?php echo $gp;?>" style="color: dimgray;"> <i class="fa fa-google-plus"> Google</i></a></li>
                  </ul>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <?php
          if ($this->session->flashdata('sukses')){
            echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
            Terimakasih!<br><b>Pesan</b> Anda telah dikirim!</div>";
          }
          else if (($this->session->flashdata('error'))) {
            echo "<div class='alert alert-error' role='alert' style='font-size: 12px'>
            Maaf!<br><b>Pesan</b> gagal diubah!</div>";
          }
          ?>
        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>home/hubungi_kami_kirim">
          <div class="form-group col-md-6" style="margin-bottom: 20px;">
            <label class="form-label" for="help-name">Nama <strong class='text-danger'>*</strong></label>
            <input type="text" name="nama" class="form-control" required="required" placeholder="Nama">
          </div>
          <div class="form-group col-md-6" style="margin-bottom: 20px;">
            <label class="form-label" for="help-email">E-mail<strong class='text-danger'>*</strong></label>
            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
          </div>
          <div class="form-group col-md-6" style="margin-bottom: 20px;">
            <label class="form-label" for="help-name"> No. Telp <strong class='text-danger'>*</strong></label>
            <input type="text" name="hp" class="form-control" required="required" placeholder="No. Telp">
          </div>
          <div class="form-group col-md-6" style="margin-bottom: 20px;">
            <label class="form-label" for="help-name">Alamat <strong class='text-danger'>*</strong></label>
            <input type="text" name="alamat" class="form-control" required="required" placeholder="Alamat">
          </div>
          <div class="form-group col-md-12" style="margin-bottom: 20px;">
            <label class="form-label" for="help-message">Pesan<strong class='text-danger'>*</strong></label>
            <textarea name="pesan" id="message" required="required" class="form-control" rows="8" placeholder="Ketikkan Pesan Anda Disini"></textarea>
          </div>                        
          <div class="form-group col-md-12" style="margin-bottom: 20px;">
            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Kirim">
          </div>
        </form>
      </div>
    </div>
  </div>