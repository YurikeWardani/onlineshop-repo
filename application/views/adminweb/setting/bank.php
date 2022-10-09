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
    <h1 class="mt-3 mt-lg-4 pt-5">Bank</h1>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <p class="text-muted">Detail dan Setting </p> 
      <p class="fs-sm ps-md-4 "><a class="text-nowrap btn btn1 btn-danger" href="#tambah-bank" data-bs-toggle="modal">Tambah<i class="fa fa-plus align-middle ms-1"></i></a></p>
    </div>
  </div>

  <?php
  if ($this->session->flashdata('message')){
    echo "<div class='alert alert-danger' role='alert' style='font-size: 12px'>Bank berhasil dihapus!</div>";    
  }
  else if($this->session->flashdata('berhasil')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Bank berhasil disimpan!</div>";
  }
  else if($this->session->flashdata('pesan')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Nama bank berhasil diubah!</div>";
  }
  else if($this->session->flashdata('large')){
    echo "
    <div class='alert alert-danger' role='alert' style='font-size: 12px'><b>Gagal</b> menyimpan!<br>Gambar terlalu besar, silahkan coba lagi!</div>
    ";
  }
  else if($this->session->flashdata('large-edit')){
    echo "
    <div class='alert alert-danger' role='alert' style='font-size: 12px'><b>Gagal</b> memperbarui!<br>Gambar terlalu besar, silahkan coba lagi!</div>
    ";
  }
  else if($this->session->flashdata('update')){
    echo "
    <div class='alert alert-success' role='alert' style='font-size: 12px'><b>Berhasil</b> memperbarui data bank!</div>
    ";
  }

  ?>
  <div class="table-responsive" style="font-size: 12px !important;">
    <table class="table table-hover ">
      <thead>
        <tr>
         <th>No</th>
         <th>Nama Bank</th>
         <th>Nama Pemilik</th>
         <th>No Rekening</th>
         <th>Aksi</th>
       </tr>
     </thead>
     <tbody>
      <?php
      $no=1;
      if ($data_bank->num_rows()>0) {
        foreach ($data_bank->result_array() as $tampil) { ?>
          <tr >
            <td class="py-3"><?php echo $no;?></td>
            <td class="py-3"><?php echo $tampil['nama_bank'];?></td>
            <td class="py-3"><?php echo $tampil['nama_pemilik'];?></td>
            <td class="py-3"><?php echo $tampil['no_rekening'];?></td>
            <td class="py-3">
              <a href="#edit-bank<?php echo $tampil['id_bank']?>" data-bs-toggle="modal" class="btn btn1 btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
              <a href="<?php echo base_url();?>adminweb/bank_delete/<?php echo $tampil['id_bank'];?>" class="btn btn1 btn-danger" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_bank'];?>?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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


<div class="modal fade" id="tambah-bank" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#tambah_bank" data-bs-toggle="tab" role="tab" aria-selected="true">Tambah Bank</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_bank" enctype="multipart/form-data" action="<?php echo base_url('adminweb/bank_simpan');?>" method="POST">
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama bank</label>
            <input class="form-control" name="nama_bank" id="nama_bank" type="text" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Pemilik</label>
            <input class="form-control" name="nama_pemilik" id="nama_pemilik" type="text" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">No. Rekening</label>
            <input class="form-control" name="no_rekening" id="no_rekening" type="number" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Gambar</label>
            <input type="file" class="form-control" name="userfile" id="" accept="image/png, image/jpeg, image/jpg, image/gif" required />
          </div>
          <div class="mb-3">
            <div class='alert alert-warning' role='alert' style='font-size: 12px'>
              <b>NOTE!</b><br>File hanya dalam format gif,jpg,png,jpeg dengan resolusi 268PX x 249PX dan ukuran maksimal file sebesar 3 MB!</div>
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
foreach ($data_bank->result_array() as $tampil) { ?>
  <div class="modal fade" id="edit-bank<?php echo $tampil['id_bank']; ?>" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#edit_bank" data-bs-toggle="tab" role="tab" aria-selected="true">Edit Bank</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_bank" enctype="multipart/form-data" action="<?php echo base_url('adminweb/bank_update');?>" method="post">
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Bank</label>
            <input class="form-control" name="nama_bank" id="nama_bank" type="text" required value="<?php echo $tampil['nama_bank'];?>"> 
            <input type="hidden" name="id_bank" id="id_bank" class="form-control" value="<?php echo $tampil['id_bank']; ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Pemilik</label>
            <input class="form-control" name="nama_pemilik" id="nama_pemilik" type="text" required value="<?php echo $tampil['nama_pemilik'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">No. Rekening</label>
            <input class="form-control" name="no_rekening" id="no_rekening" type="text" required value="<?php echo $tampil['no_rekening'];?>">
          </div>
          <div class="mb-3">
             <img src="<?php echo base_url();?>images/bank/<?php echo $tampil['gambar'];?>" alt="Gambar bank" class="d-block w-100"><br>
            <label class="form-label" for="si-email">Gambar</label>
            <input type="file" class="form-control" name="userfile" id="" accept="image/png, image/jpeg, image/jpg, image/gif" />
          </div>
          <div class="mb-3">
            <div class='alert alert-warning' role='alert' style='font-size: 12px'>
              <b>NOTE!</b><br>File hanya dalam format gif,jpg,png,jpeg dengan resolusi 268PX x 249PX dan ukuran maksimal file sebesar 3 MB!</div>
            </span>
          </div>

          
          <button class="btn btn1 btn-primary btn-shadow d-block w-100" type="submit">Simpan</button>
        </form>

      </div>
    </div>
  </div>
</div>
<?php } ?>

