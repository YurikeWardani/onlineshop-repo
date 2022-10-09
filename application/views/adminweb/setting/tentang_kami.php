
<div class="mt-lg-2 pt-5 pb-2 mb-5 col-md-12">
</div>
<section class="col-lg-12" id="type-inline">
  <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded ">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#result4" data-bs-toggle="tab" role="tab" aria-controls="result4" aria-selected="true">Setting Tentang Kami</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="result4" role="tabpanel">
          <?php
          if ($this->session->flashdata('message')){
            echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
            Konten <b>Tentang Kami</b> berhasil diubah!</div>";
          }
          else if (($this->session->flashdata('error'))) {
            echo "<div class='alert alert-error' role='alert' style='font-size: 12px'>
            Konten <b>Tentang Kami</b> gagal diubah!</div>";
          }

          ?>
          <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>adminweb/tentangkami_simpan">
            <input type="hidden" name="id_tentangkami" id="id_tentangkami" class="form-control" required="required" value="<?php echo $id_tentangkami;?>">
            <div class="form-group col-md-1" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name">Judul <strong class='text-danger'>*</strong></label>
            </div>
            <div class="form-group col-md-11" style="margin-bottom: 20px;">
              <input type="text" name="judul" id="judul" class="form-control" required  value="<?php echo $judul;?>">
            </div>
            <div class="form-group col-md-1" style="margin-bottom: 20px;">
              <label class="form-label" for="help-message">Deskripsi<strong class='text-danger'>*</strong></label>
            </div><div class="form-group col-md-11" style="margin-bottom: 20px;">
              <textarea name="deskripsi" id="deskripsi" required="required" class="form-control" rows="8" value="<?php echo $deskripsi;?>"><?php echo $deskripsi;?></textarea>
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
