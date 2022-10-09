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
    <h1 class="mt-3 mt-lg-4 pt-5">Produk</h1>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <p class="text-muted">Kategori Produk </p> 
      <p class="fs-sm ps-md-4 "><a class="text-nowrap btn btn1 btn1 btn-danger" href="#tambah-kategori" data-bs-toggle="modal">Tambah<i class="fa fa-plus align-middle ms-1"></i></a></p>
    </div>
  </div>

  <?php
  if ($this->session->flashdata('message')){
    echo "<div class='alert alert-danger' role='alert' style='font-size: 12px'>
    Kategori berhasil dihapus!</div>";
  }
  else if($this->session->flashdata('berhasil')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Kategori berhasil disimpan!</div>";
  }
  else if($this->session->flashdata('pesan')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Nama kategori berhasil diubah!</div>";
  }

  ?>
  <div class="table-responsive" style="font-size: 12px !important;">
    <table class="table table-hover ">
      <thead>
        <tr>
         <th>No</th>
         <th>Nama Kategori</th>
         <th>Aksi</th>
       </tr>
     </thead>
     <tbody>
      <?php
      $no=1;
      if ($data_kategori->num_rows()>0) {
        foreach ($data_kategori->result_array() as $tampil) { ?>
          <tr >
            <td class="py-3"><?php echo $no;?></td>
            <td class="py-3"><?php echo $tampil['nama_kategori'];?></td>
            <td class="py-3">

              <a href="#edit-kategori<?php echo $tampil['id_kategori']?>" data-bs-toggle="modal" class="btn btn1 btn1 btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
              <a href="<?php echo base_url();?>adminweb/kategori_delete/<?php echo $tampil['id_kategori'];?>" class="btn btn1 btn1 btn-danger" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_kategori'];?>?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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



<div class="modal fade" id="tambah-kategori" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#tambah_kategori" data-bs-toggle="tab" role="tab" aria-selected="true">Tambah Kategori</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_kategori" action="<?php echo base_url();?>adminweb/kategori_simpan" method="post">
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Kategori</label>
            <input class="form-control" name="nama_kategori" id="nama_kategori" type="text" required>
          </div>
          <button class="btn btn1 btn1 btn-primary btn-shadow d-block w-100" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$no=1;
  foreach ($data_kategori->result_array() as $tampil) { ?>
    <div class="modal fade" id="edit-kategori<?php echo $tampil['id_kategori']; ?>" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link fw-medium active" href="#edit_kategori" data-bs-toggle="tab" role="tab" aria-selected="true">Edit Kategori</a></li>
          </ul>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body tab-content py-4">
          <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="edit_kategori" action="<?php echo base_url();?>adminweb/kategori_update" method="post">
            <div class="mb-3">
              <label class="form-label" for="si-email">Nama Kategori</label>
              <input class="form-control" name="nama_kategori" id="nama_kategori" type="text" required value="<?php echo $tampil['nama_kategori'];?>">
              <input class="form-control" name="id_kategori" id="id_kategori" type="hidden" required value="<?php echo $tampil['id_kategori'];?>">
            </div>
            <button class="btn btn1 btn1 btn-primary btn-shadow d-block w-100" type="submit">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
