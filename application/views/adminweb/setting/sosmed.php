
<div class="mt-lg-2 pt-5 pb-2 mb-5 col-md-12">
</div>
<section class="col-lg-12" id="type-inline">
  <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded ">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#result4" data-bs-toggle="tab" role="tab" aria-controls="result4" aria-selected="true">Setting Sosial Media</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="result4" role="tabpanel">
          <?php
          if ($this->session->flashdata('berhasil')){
            echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
            <b>Sosial Media</b> berhasil diubah!</div>";
          }
          else if (($this->session->flashdata('error'))) {
            echo "<div class='alert alert-error' role='alert' style='font-size: 12px'>
            <b>Sosial Media</b> gagal diubah!</div>";
          }

          ?>
          <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>adminweb/sosial_media_simpan">
            <input type="hidden" name="id_sosial_media" id="id_sosial_media" class="form-control" required="required" value="<?php echo $id_sosial_media;?>">
            <div class="form-group col-md-2" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name"> <i class="fa fa-twitter-square" aria-hidden="true"> </i> Twitter</label>
            </div>
            <div class="form-group col-md-10" style="margin-bottom: 20px;">
              <input type="text" name="tw" id="tw" class="form-control" required value="<?php echo $tw;?>">
            </div>
            <div class="form-group col-md-2" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name"> <i class="fa fa-facebook-square" aria-hidden="true"> </i> Facebook</label>
            </div>
            <div class="form-group col-md-10" style="margin-bottom: 20px;">
              <input type="text" name="fb" id="fb" class="form-control" required value="<?php echo $fb;?>">
            </div>
            <div class="form-group col-md-2" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name"> <i class="fa fa-instagram" aria-hidden="true"> </i> Instagram</label>
            </div>
            <div class="form-group col-md-10" style="margin-bottom: 20px;">
              <input type="text" name="gp" id="gp" class="form-control" required value="<?php echo $gp;?>">
            </div>  
            <div class="form-group col-md-12" style="margin-bottom: 20px;">
              <div class="alert alert-warning" role="alert" style="font-size: 12px">
                Untuk update Sosial Media harap <b>http:// jangan dihapus</b>!
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
