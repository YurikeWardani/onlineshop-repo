<!-- Content  -->
<style type="text/css">
  .btn1 {
    font-size: 11px;
    padding: 5px 10px;
    width:75px;
  }

</style>

<section class="col-lg-12">
  <div class="border-bottom mt-lg-2 pt-5 pb-2 mb-5">
    <h1 class="mt-3 mt-lg-4 pt-5">Slider</h1>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <p class="text-muted">Detail dan Setting </p> 
      <p class="fs-sm ps-md-4 "><a class="text-nowrap btn btn1 btn-danger" href="#tambah-slider" data-bs-toggle="modal">Tambah<i class="fa fa-plus align-middle ms-1"></i></a></p>
    </div>
  </div>

  <?php
  if ($this->session->flashdata('message')){
    echo "<div class='alert alert-danger' role='alert' style='font-size: 12px'>Slider berhasil dihapus!</div>";    
  }
  else if($this->session->flashdata('berhasil')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Slider berhasil disimpan!</div>";
  }
  else if($this->session->flashdata('pesan')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Slider berhasil diubah!</div>";
  }
  else if($this->session->flashdata('large-edit')){
    echo "
    <div class='alert alert-danger' role='alert' style='font-size: 12px'><b>Gagal</b> memperbarui!<br>Gambar terlalu besar, silahkan coba lagi!</div>
    ";
  }
  else if($this->session->flashdata('update')){
    echo "
    <div class='alert alert-success' role='alert' style='font-size: 12px'><b>Berhasil</b> memperbarui data slider!</div>
    ";
  }

  ?>
  <div class="table-responsive" style="font-size: 12px !important;">
    <table class="table table-hover ">
      <thead>
        <tr>
         <th>No</th>
         <th>Title</th>
         <th>Status</th>
         <th>Aksi</th>
       </tr>
     </thead>
     <tbody>
      <?php
      $no=1;
      if ($data_slider->num_rows()>0) {
        foreach ($data_slider->result_array() as $tampil) { ?>
          <tr >
            <td class="py-3"><?php echo $no;?></td>
            <td class="py-3"><?php echo $tampil['tittle'];?></td>
            <td class="py-3">
              <?php
              if ($tampil['status']=="0") {
                echo "Tidak Aktif";
              }
              else {
                echo "Aktif";
              }
              ?>

            </td>
            <td class="py-3">
              <a href="#edit-slider<?php echo $tampil['id_slider']?>" data-bs-toggle="modal" class="btn btn1 btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
              <a href="<?php echo base_url();?>adminweb/slider_delete/<?php echo $tampil['id_slider'];?>" class="btn btn1 btn-danger" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['tittle'];?>?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
            </td>
          </tr>
          <?php
          $no++;
        }
      }

      else { ?>
        <tr>
          <td colspan="4">No Result Data</td>
        </tr>
        <?php

      }
      ?>

    </tbody>
  </table>
</div>
</section>

<div class="modal fade" id="tambah-slider" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#tambah_slider" data-bs-toggle="tab" role="tab" aria-selected="true">Tambah Slider</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_slider" enctype="multipart/form-data" action="<?php echo base_url('adminweb/slider_simpan');?>" method="POST">
          <div class="mb-3">
            <label class="form-label" for="si-email">Status</label>
            <select class="form-select" id="order-sort" name="status" required>
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Title</label>
            <input class="form-control" name="tittle" id="tittle" type="text" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Deskripsi</label>
            <textarea name="description" id="description" required="required" class="form-control" rows="8" ></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Gambar</label>
            <input type="file" class="form-control" name="userfile" id="" accept="image/png, image/jpeg, image/jpg, image/gif" required />
          </div>
          <div class="mb-3">
            <div class='alert alert-warning' role='alert' style='font-size: 12px'>
              <b>NOTE!</b><br>File hanya dalam format gif,jpg,png,jpeg dengan resolusi 481PX x 441PX  dan ukuran maksimal file sebesar 3 MB!</div>
            </span>
          </div>
          <button class="btn btn1 btn-primary btn-shadow d-block w-100" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$no=1;
foreach ($data_slider->result_array() as $tampil) { ?>
  <div class="modal fade" id="edit-slider<?php echo $tampil['id_slider']; ?>" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#edit_slider" data-bs-toggle="tab" role="tab" aria-selected="true">Edit Slider</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_slider" enctype="multipart/form-data" action="<?php echo base_url('adminweb/slider_update');?>" method="post">
          <div class="mb-3">
            <label class="form-label" for="si-email">Status</label>
            <select class="form-select" id="order-sort" name="status" required>
              <option value="<?php echo $tampil['status']; ?>" selected>
                <?php if ($tampil['status']=="1") {
                  echo "Aktif";
                }
                else echo "Tidak Aktif";
                ?>
              </option>
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Title</label>
            <input class="form-control" name="tittle" id="tittle" type="text" required value="<?php echo $tampil['tittle']; ?>">
            <input type="hidden" name="id_slider" id="id_slider" class="form-control" value="<?php echo $tampil['id_slider']; ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Deskripsi</label>
            <textarea name="description" id="description" required="required" class="form-control" rows="8"><?php echo $tampil['description']; ?></textarea>
          </div>
          <div class="mb-3">
            <img src="<?php echo base_url();?>images/slider/<?php echo $tampil['gambar'];?>" alt="Gambar slider" class="d-block w-100"><br>
            <label class="form-label" for="si-email">Gambar</label>
            <input type="file" class="form-control" name="userfile" id="" accept="image/png, image/jpeg, image/jpg, image/gif"  />
          </div>
          <div class="mb-3">
            <div class='alert alert-warning' role='alert' style='font-size: 12px'>
              <b>NOTE!</b><br>File hanya dalam format gif,jpg,png,jpeg dengan resolusi 481PX x 441PX  dan ukuran maksimal file sebesar 3 MB!</div>
            </span>
          </div>
        <button class="btn btn1 btn-primary btn-shadow d-block w-100" type="submit">Simpan</button>
      </form>

    </div>
  </div>
</div>
</div>
<?php } ?>

