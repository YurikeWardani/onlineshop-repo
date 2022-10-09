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
    <h1 class="mt-3 mt-lg-4 pt-5">Admin</h1>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <p class="text-muted">Setting </p> 
      <p class="fs-sm ps-md-4 "><a class="text-nowrap btn btn1 btn-danger" href="#tambah-admin" data-bs-toggle="modal">Tambah<i class="fa fa-plus align-middle ms-1"></i></a></p>
    </div>
  </div>

  <?php
  if ($this->session->flashdata('message')){
    echo "<div class='alert alert-error' role='alert' style='font-size: 12px'><b>Admin</b> berhasil dihapus!</div>";
  }
  else if($this->session->flashdata('berhasil')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    <b>Admin</b> berhasil disimpan!</div>";
  }
  else if($this->session->flashdata('pesan')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    Detail <b>Admin</b> berhasil diubah!</div>";
  }

  ?>
  <div class="table-responsive" style="font-size: 12px !important;">
    <table class="table table-hover ">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Phone</th>
          <th>Hak Akses</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        if ($data_admin->num_rows()>0) {
          foreach ($data_admin->result_array() as $tampil) { ?>
            <tr >
              <td class="py-3"><?php echo $no;?></td>
              <td class="py-3"><?php echo $tampil['nama_admin'];?></td>
              <td class="py-3"><?php echo $tampil['email'];?></td>
              <td class="py-3"><?php echo $tampil['username'];?></td>
              <td class="py-3">****************</td>
              <td class="py-3"><?php echo $tampil['phone'];?></td>
              <td class="py-3"><?php echo $tampil['hak_akses'];?></td>              
              <td>

                <a href="#edit-admin<?php echo $tampil['id_admin']?>" data-bs-toggle="modal" class="btn btn1 btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                <a href="<?php echo base_url();?>adminweb/admin_delete/<?php echo $tampil['id_admin'];?>" class="btn btn1 btn-danger" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_admin'];?>?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
              </td>
            </tr>
            <?php
            $no++;
          }
        }

        else { ?>
          <tr>
            <td colspan="8">No Result Data</td>
          </tr>
          <?php

        }
        ?>
      </tbody>
    </table>
  </div>
</section>



<div class="modal fade" id="tambah-admin" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#tambah_admin" data-bs-toggle="tab" role="tab" aria-selected="true">Tambah admin</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="tambah_admin" action="<?php echo base_url();?>adminweb/admin_simpan" method="post">
          <div class="mb-3">
            <label class="form-label" for="si-email">Hak Akses</label>
            <input class="form-control" name="id_admin" id="id_admin" type="hidden" required>
            <select class="form-select" id="order-sort" name="hak_akses" required>
              <option value="Admin">Admin</option>
              <option value="Pegawai">Pegawai</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Admin</label>
            <input class="form-control" name="nama_admin" id="nama_admin" >
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Email</label>
            <input class="form-control" name="email" id="email" type="email">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Phone</label>
            <input class="form-control" name="phone" id="phone" >
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Username</label>
            <input class="form-control" name="username" id="username" >
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Password</label>
            <input class="form-control" type="password" name="password" id="password" value="" Placeholder="Password...">
          </div>
          <button class="btn btn1 btn-primary btn-shadow d-block w-100" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$no=1;
foreach ($data_admin->result_array() as $tampil) { ?>
  <div class="modal fade" id="edit-admin<?php echo $tampil['id_admin']; ?>" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link fw-medium active" href="#edit_admin" data-bs-toggle="tab" role="tab" aria-selected="true">Edit Detail Admin</a></li>
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body tab-content py-4">
        <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="edit_admin" action="<?php echo base_url();?>adminweb/admin_update" method="post">
          <div class="mb-3">
            <label class="form-label" for="si-email">Hak Akses</label>
            <input class="form-control" name="id_admin" id="id_admin" type="hidden" required value="<?php echo $tampil['id_admin'];?>">
            <select class="form-select" id="order-sort" name="hak_akses" required>
              <option value="<?php echo $tampil['hak_akses'] ?>" selected><?php echo $tampil['hak_akses'] ?></option>
              <option value="Admin">Admin</option>
              <option value="Pegawai">Pegawai</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Nama Admin</label>
            <input class="form-control" name="nama_admin" id="nama_admin" value="<?php echo $tampil['nama_admin'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Email</label>
            <input class="form-control" name="email" id="email" value="<?php echo $tampil['email'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Phone</label>
            <input class="form-control" name="phone" id="phone" value="<?php echo $tampil['phone'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Username</label>
            <input class="form-control" name="username" id="username" value="<?php echo $tampil['username'];?>">
          </div>
          <div class="mb-3">
            <label class="form-label" for="si-email">Password</label>
            <input class="form-control" type="password" name="password" id="password" value="" Placeholder="Password...">
          </div>
          <button class="btn btn1 btn-primary btn-shadow d-block w-100" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
