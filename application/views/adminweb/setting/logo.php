
<div class="mt-lg-2 pt-5 pb-2 mb-5 col-md-12">
</div>
<section class="col-lg-12" id="type-inline">
  <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded ">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#result4" data-bs-toggle="tab" role="tab" aria-controls="result4" aria-selected="true">Setting Logo</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="result4" role="tabpanel">
          <?php
          if ($this->session->flashdata('berhasil')){
            echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
            <b>Berhasil</b> memperbarui Logo!</div>";
          }
          else if (($this->session->flashdata('error'))) {
            echo "<div class='alert alert-danger' role='alert' style='font-size: 12px'><b>Gagal</b> memperbarui Logo!<br>Gambar terlalu besar, silahkan coba lagi!</div>";
          }
          ?>
          <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>adminweb/logo_simpan" enctype="multipart/form-data">
            <input type="hidden" name="id_logo" id="id_logo" class="form-control" required="required" value="<?php echo $id_logo;?>">
            <div class="form-group col-md-2" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name">  Logo</label>
            </div>
             <div class="form-group col-md-5" style="margin-bottom: 20px;">
              <?php
              foreach ($logo->result_array() as $value) {
                $logo = $value['gambar'];
              }
              ?>
              <img src="<?php echo base_url();?>images/logo/<?php echo $logo;?>" alt="Gambar Produk" class="d-block w-100">
            </div>
             <div class="form-group col-md-5" style="margin-bottom: 20px;"></div>
            <div class="form-group col-md-2" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name">  Upload Logo</label>
            </div>
            <div class="form-group col-md-10" style="margin-bottom: 20px;">
              <input type="file" class="form-control" name="userfile" id="" accept="image/png, image/jpeg, image/jpg, image/gif"/>
            </div>
            <div class="form-group col-md-2" style="margin-bottom: 20px;"></div>
            <div class="form-group col-md-10" style="margin-bottom: 20px;">
              <div class='alert alert-warning' role='alert' style='font-size: 12px'>
              <b>NOTE!</b><br>File hanya dalam format gif,jpg,png,jpeg dengan resolusi 268PX x 249PX dan ukuran maksimal file sebesar 3 MB!
            </div>
            </div>
            <div class="form-group col-md-12" style="margin-bottom: 20px;">
              <input type="submit" name="submit" class="btn btn-primary pull-right w-100 d-block" value="Simpan Pembaruan">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
