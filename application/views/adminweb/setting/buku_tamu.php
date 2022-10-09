
<section class="col-lg-12" id="type-inline">
  <div class="border-bottom mt-lg-2 pt-5 pb-2 mb-5">
    <h1 class="mt-3 mt-lg-4 pt-5">Kelola Pesan</h1>
  </div>
  <?php
  if ($this->session->flashdata('message')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    <b>Pesan Balasan</b> berhasil dikirim!</div>";
  }
  else if ($this->session->flashdata('kirim')){
    echo "<div class='alert alert-success' role='alert' style='font-size: 12px'>
    <b>Pesan</b> berhasil dikirim!</div>";
  }
  else if (($this->session->flashdata('hapus-baca'))) {
    echo "<div class='alert alert-danger' role='alert' style='font-size: 12px'>
    <b>Pesan Masuk</b> berhasil dihapus !</div>";
  }
  else if (($this->session->flashdata('hapus-kirim'))) {
    echo "<div class='alert alert-danger' role='alert' style='font-size: 12px'>
    <b>Pesan Keluar</b> berhasil dihapus !</div>";
  }
  ?>
  <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded ">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link" href="#result1" data-bs-toggle="tab" role="tab" aria-controls="result1" aria-selected="true">Tulis Pesan</a></li>
        <li class="nav-item"><a class="nav-link active" href="#result2" data-bs-toggle="tab" role="tab" aria-controls="result2" aria-selected="true">Pesan Masuk
          <?php
          $query = $this->db->query("select count(status) as stts from tbl_hubungikami where status='0'");;
          foreach ($query->result_array() as $tampil) {
            $status = $tampil['stts'];
          }
          if ($status!="0") { ?>
            <span class="badge"> <?php echo $status; ?> </span>
            <?php 
          }
          else {}
            ?>   
        </a></li>
        <li class="nav-item"><a class="nav-link" href="#result3" data-bs-toggle="tab" role="tab" aria-controls="result3" aria-selected="true">Pesan Keluar</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade show" id="result1" role="tabpanel">
          <form id="main-contact-form" class="contact-form row border" name="contact-form" method="post" action="<?php echo base_url();?>adminweb/buku_tamu_add_simpan" method="post" style="padding: 10px;">
            <input type="hidden" name="id_tentangkami" id="id_tentangkami" class="form-control" required="required" value="">
            <div class="form-group col-md-1" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name">Untuk<strong class='text-danger'>*</strong></label>
            </div>
            <div class="form-group col-md-11" style="margin-bottom: 20px;">
              <input class="form-control" name="email" id="email" type="email" required>
            </div>
            <div class="form-group col-md-1" style="margin-bottom: 20px;">
              <label class="form-label" for="help-name">Subjek<strong class='text-danger'>*</strong></label>
            </div>
            <div class="form-group col-md-11" style="margin-bottom: 20px;">
              <input class="form-control" name="judul" id="judul" type="text" required>
            </div>
            <div class="form-group col-md-1" style="margin-bottom: 20px;">
              <label class="form-label" for="help-message">Pesan<strong class='text-danger'>*</strong></label>
            </div><div class="form-group col-md-11" style="margin-bottom: 20px;">
              <textarea name="isi_hubungi_kami_kirim" id="isi_hubungi_kami_kirim" required class="form-control" rows="12" ></textarea>
            </div>                        
            <div class="form-group col-md-12" style="margin-bottom: 20px;">
              <input type="submit" name="submit" class="btn btn-primary pull-right w-100 d-block" value="Simpan Pembaruan">
            </div>
          </form>
        </div>
        <div class="tab-pane fade show active" id="result2" role="tabpanel">
          <div class="table-responsive" style="font-size: 12px !important;">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>                  
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data_buku_tamu->result_array() as $tampil) { ?>

                  <?php
                  if ($tampil['status']=="1") {?>
                    <tr >
                      <td class="py-3"> <a href="<?php echo base_url();?>adminweb/buku_tamu_hapus/<?php echo $tampil['id_hubungikami'];?>" onclick="return confirm('Anda yakin ingin mengahapus pesan ?');" style="color: dimgray;">  <i class="fa fa-trash"></i>
                      </td>
                      <td class="py-3"> <a href="#pesan-masuk<?php echo $tampil['id_hubungikami'];?>" data-bs-toggle="modal" style="color: dimgray;" ><?php echo $tampil['nama'];?></a>
                      </td>
                      <td class="py-3"> <a href="#pesan-masuk<?php echo $tampil['id_hubungikami'];?>" data-bs-toggle="modal" style="color: dimgray; "><?php echo substr($tampil['pesan'],0,50);?></a>
                      </td>
                      <td class="py-3"> <a href="#pesan-masuk<?php echo $tampil['id_hubungikami'];?>" data-bs-toggle="modal" style="color: dimgray; "><?php echo $tampil['tanggal'];?></a>
                      </td>
                    </tr>
                    <?php
                  } 
                  else {
                    ?>
                    <tr >
                      <td class="py-3"> <a href="<?php echo base_url();?>adminweb/buku_tamu_hapus/<?php echo $tampil['id_hubungikami'];?>" onclick="return confirm('Anda yakin ingin mengahapus pesan ?');" style="color: dimgray; font-weight: bold;" >  <i class="fa fa-trash"></i>
                      </td>
                      <td class="py-3"> <a href="#pesan-masuk<?php echo $tampil['id_hubungikami'];?>" data-bs-toggle="modal" style="color: dimgray; font-weight: bold;" ><?php echo $tampil['nama'];?></a>
                      </td>
                      <td class="py-3"> <a href="#pesan-masuk<?php echo $tampil['id_hubungikami'];?>" data-bs-toggle="modal" style="color: dimgray; font-weight: bold;" ><?php echo substr($tampil['pesan'],0,50);?></a>
                      </td>
                      <td class="py-3"> <a href="#pesan-masuk<?php echo $tampil['id_hubungikami'];?>" data-bs-toggle="modal" style="color: dimgray; font-weight: bold;" ><?php echo $tampil['tanggal'];?></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>

                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade show" id="result3" role="tabpanel">
          <div class="table-responsive" style="font-size: 12px !important;">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>             
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data_buku_tamu_kirim->result_array() as $tampil_kirim) { ?>
                  <tr >
                    <td class="py-3"> <a href="<?php echo base_url();?>adminweb/buku_tamu_kirim_hapus/<?php echo $tampil_kirim['id_hubungi_kami_kirim'];?>" onclick="return confirm('Anda yakin ingin mengahapus pesan ?');" style="color: dimgray;"><i class="fa fa-trash"></i>
                    </td>
                    <td class="py-3"> <a href="#pesan-keluar<?php echo $tampil_kirim['id_hubungi_kami_kirim'];?>" data-bs-toggle="modal" style="color: dimgray;" ><?php echo $tampil_kirim['kepada'];?></a>
                    </td>
                    <td class="py-3"> <a href="#pesan-keluar<?php echo $tampil_kirim['id_hubungi_kami_kirim'];?>" data-bs-toggle="modal" style="color: dimgray; "><?php echo substr($tampil_kirim['judul'],0,50);?></a>
                    </td>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- //EMAIL MASUK -->
  <?php
  $no=1;
  foreach ($data_buku_tamu->result_array() as $tampil) { ?>
    <div class="modal fade" id="pesan-masuk<?php echo $tampil['id_hubungikami'];?>" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link fw-medium active" href="#pesan-masuk" data-bs-toggle="tab" role="tab" aria-selected="true">Pesan Masuk ( <?php echo $tampil['nama'];?> )</a></li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">

            <small>Alamat Pengirim: </small> <br>
            <div style="font-size: 14px"><b><?php echo $tampil['alamat'];?></b><br></div>
            <small>Keterangan: </small> <br>
            <div style="font-size: 14px"><b><<?php echo $tampil['email'];?>></b> to <b>me</b> on <?php echo $tampil['tanggal'];?></div><br><hr><br>

            <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="pesan-masuk">
              <div class="mb-3">
                <label class="form-label" for="pesan">Pesan</label>
                <textarea name="deskripsi" id="deskripsi" readonly class="form-control" rows="8" ><?php echo $tampil['pesan'];?></textarea>
              </div>
              <a href="#balas-tamu<?php echo $tampil['id_hubungikami'];?>" data-bs-toggle="modal">
                <button class="btn btn1 btn-primary btn-shadow d-block w-100" type="submit">Balas <i class="fa fa-reply"></i> </button>
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php
  $no=1;
  foreach ($data_buku_tamu->result_array() as $tampil) { ?>
    <div class="modal fade" id="balas-tamu<?php echo $tampil['id_hubungikami'];?>" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link fw-medium active" data-bs-toggle="tab" role="tab" aria-selected="true">Balas Pesan</a></li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">
            <form class="needs-validation tab-pane fade show active border" autocomplete="off" novalidate id="balas-tamu" action="<?php echo base_url();?>adminweb/buku_tamu_balas_simpan" method="post" style="padding: 10px;">
              <div class="mb-3">
                Untuk : <input class="form-control" name="email" id="email" type="text" readonly value="<?php echo $tampil['email'];?>">
                <input class="form-control" name="id_hubungikami " id="id_hubungikami" type="hidden" readonly value="<?php echo $tampil['id_hubungikami'];?>">
              </div>
              <div class="mb-3">
                Subjek : <input class="form-control" name="judul" id="judul" type="text" required>
              </div>
              <div class="mb-3">
                Pesan:
                <textarea name="isi_hubungi_kami_kirim" id="isi_hubungi_kami_kirim" required class="form-control" rows="12" ></textarea>
              </div>
              <button class="btn btn1 btn-primary btn-shadow d-block w-100" type="submit">Kirim <i class="fa fa-paper-plane-o"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- //EMAIL KELUAR -->
  <?php
  $no=1;
  foreach ($data_buku_tamu_kirim->result_array() as $tampil) { ?>
    <div class="modal fade" id="pesan-keluar<?php echo $tampil['id_hubungi_kami_kirim'];?>" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link fw-medium active" href="#pesan-keluar" data-bs-toggle="tab" role="tab" aria-selected="true">Pesan Keluar</a></li>
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body tab-content py-4">
            <small>Subjek: </small>
            <div style="font-size: 14px"><b><?php echo $tampil['judul'];?></b><br></div>
            <small>Kepada: </small> <br>
            <div style="font-size: 14px"><b><<?php echo $tampil['kepada'];?>></b> to <b>me</b></div><br><hr><br>

            <form class="needs-validation tab-pane fade show active border" autocomplete="off" novalidate id="balas-tamu" style="padding: 10px;">
              <div class="mb-3">
                Pesan:
                <textarea name="isi_hubungi_kami_kirim" id="isi_hubungi_kami_kirim" required class="form-control" rows="12" readonly ><?php echo $tampil['isi_hubungi_kami_kirim'];?></textarea>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
