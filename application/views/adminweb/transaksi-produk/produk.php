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
      <p class="text-muted">Detail Produk </p> 
      <p class="fs-sm ps-md-4 "><a class="text-nowrap btn btn1 btn-danger" href="#tambah-produk" data-bs-toggle="modal">Tambah<i class="fa fa-plus align-middle ms-1"></i></a></p>
    </div>
  </div>

  <?php
  if ($this->session->flashdata('message')){
    echo "<div class='alert alert-danger' role='alert' style='font-size: 12px'>Produk berhasil dihapus!</div>";    
  }
  else if($this->session->flashdata('berhasil')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Produk berhasil disimpan!</div>";
  }
  else if($this->session->flashdata('pesan')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Nama Produk berhasil diubah!</div>";
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
    <div class='alert alert-success' role='alert' style='font-size: 12px'><b>Berhasil</b> memperbarui data produk!</div>
    ";
  }

  ?>
  <div class="table-responsive" style="font-size: 12px !important;">
    <table class="table table-hover ">
      <thead>
        <tr>
         <th>No</th>
         <th>Kode Produk</th>
         <th>Nama Produk</th>
         <th>Harga</th>
         <th>Stok</th>
         <th>Brand</th>
         <th>Kategori</th>
         <th>Aksi</th>
       </tr>
     </thead>
     <tbody>
      <?php
      $no=1;
      if ($data_produk->num_rows()>0) {
        foreach ($data_produk->result_array() as $tampil) { ?>
          <tr >
            <td class="py-3"><?php echo $no;?></td>
            <td class="py-3"><?php echo $tampil['kode_produk'];?></td>
            <td class="py-3"><?php echo $tampil['nama_produk'];?></td>
            <td class="py-3"><?php echo $tampil['harga'];?></td>
            <td class="py-3"><?php echo $tampil['stok'];?></td>
            <td class="py-3"><?php echo $tampil['nama_brand'];?></td>
            <td class="py-3"><?php echo $tampil['nama_kategori'];?></td>
            <td class="py-3">
              <a href="#edit-produk<?php echo $tampil['id_produk']?>" data-bs-toggle="modal" class="btn btn1 btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
              <a href="<?php echo base_url();?>adminweb/produk_delete/<?php echo $tampil['id_produk'];?>" class="btn btn1 btn-danger" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_produk'];?>?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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


<div class="modal fade" id="tambah-produk" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#tambah_produk" data-bs-toggle="tab" role="tab" aria-selected="true">Tambah produk</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_produk" enctype="multipart/form-data" action="<?php echo base_url('adminweb/produk_simpan');?>" method="POST">
          <div class="mb-3">
            <label class="form-label" for="si-email">Kode Produk</label>
            <input class="form-control" name="kode_produk" id="kode_produk" type="text" value="<?php echo $kode_produk;?>" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Produk</label>
            <input class="form-control" name="nama_produk" id="nama_produk" type="text" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Brand</label>
            <select class="form-select" id="order-sort" name="brand_id" required>
              <option><?php
              foreach ($data_brand->result_array() as $tampil) { ?>
                <option value="<?php echo $tampil['id_brand'];?>"><?php echo $tampil['nama_brand'];?>
              </option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="si-email">Kategori</label>
          <select class="form-select" id="order-sort" name="kategori_id" required>
            <option><?php
            foreach ($data_kategori->result_array() as $tampil) { ?>
              <option value="<?php echo $tampil['id_kategori'];?>"><?php echo $tampil['nama_kategori'];?>
            </option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="si-email">Harga</label>
        <input class="form-control" name="harga" id="harga" type="number" required>
      </div>
      <div class="mb-3">
        <label class="form-label" for="si-email">Stok</label>
        <input class="form-control" name="stok" id="stok" type="number" required>
      </div>
      <div class="mb-3">
        <label class="form-label" for="si-email">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" required="required" class="form-control" rows="8" ></textarea>
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
foreach ($data_produk->result_array() as $tampil) { ?>
  <div class="modal fade" id="edit-produk<?php echo $tampil['id_produk']; ?>" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#edit_produk" data-bs-toggle="tab" role="tab" aria-selected="true">Edit Kategori</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">

        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_produk" enctype="multipart/form-data" action="<?php echo base_url('adminweb/produk_update');?>" method="post">
          <div class="mb-3">
            <label class="form-label" for="si-email">Kode Produk</label>
            <input type="text" name="kode_produk" id="kode_produk" class="form-control" value="<?php echo $kode_produk;?>" readonly="true"/>
            <input type="hidden" name="id_produk" id="id_produk" class="form-control" value="<?php echo $tampil['id_produk']; ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Produk</label>
            <input class="form-control" name="nama_produk" id="nama_produk" type="text" required value="<?php echo $tampil['nama_produk'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Brand</label>
            <select class="form-select" id="order-sort" name="brand_id" required>
              <?php
              foreach ($data_brand->result_array() as $brand) { 
                if ($brand_id==$brand['id_brand']) { ?>
                  <option value="<?php echo $brand['id_brand'];?>" selected="selected"><?php echo $brand['nama_brand'];?></option>
                  <?php
                }
                else { ?>
                  <option value="<?php echo $brand['id_brand'];?>"><?php echo $brand['nama_brand'];?></option>
                  <?php
                }

              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Kategori</label>
            <select class="form-select" id="order-sort" name="kategori_id" required>
              <?php
              foreach ($data_kategori->result_array() as $kategori) { 
                if ($kategori_id==$kategori['id_brand']) { ?>
                  <option value="<?php echo $kategori['id_kategori'];?>" selected="selected"><?php echo $kategori['nama_kategori'];?></option>
                  <?php
                }
                else { ?>
                  <option value="<?php echo $kategori['id_kategori'];?>"><?php echo $kategori['nama_kategori'];?></option>
                  <?php
                }

              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Harga</label>
            <input class="form-control" name="harga" id="harga" type="number" required  value="<?php echo $tampil['harga'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Stok</label>
            <input class="form-control" name="stok" id="stok" type="number" required value="<?php echo $tampil['stok'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"  class="form-control" rows="8"><?php echo $tampil['deskripsi'];?></textarea>
          </div>
          <div class="mb-3">
            <img src="<?php echo base_url();?>images/produk/<?php echo $tampil['gambar'];?>" alt="Gambar Produk" class="d-block w-100"><br>
            <label class="form-label" for="si-email">Gambar</label>
            <input type="file" class="form-control" name="userfile" id="" accept="image/png, image/jpeg, image/jpg, image/gif"/>
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

