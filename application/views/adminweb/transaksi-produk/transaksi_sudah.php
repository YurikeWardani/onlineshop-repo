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
    <h1 class="mt-3 mt-lg-4 pt-5">Transaksi</h1>
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <p class="text-muted">Data Sudah Diproses </p> 
    </div>
  </div>
  <div class="table-responsive" style="font-size: 12px !important;">
    <table class="table table-hover ">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Transaksi</th>
          <th>Nama Penerima</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>No Telp</th>
          <th>Propinsi</th>
          <th>Kota</th>
          <th>Kode Pos</th>
          <th>Bank</th>
          <th>Jasa Pengiriman</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        if ($data_transaksi->num_rows()>0) {
          foreach ($data_transaksi->result_array() as $tampil) { ?>
            <tr >
              <td class="py-3"><?php echo $no;?></td>
              <td class="py-3"><?php echo $tampil['kode_transaksi'];?></td>
              <td class="py-3"><?php echo $tampil['penerima'];?></td>
              <td class="py-3"><?php echo $tampil['email'];?></td>
              <td class="py-3"><?php echo $tampil['alamat'];?></td>
              <td class="py-3"><?php echo $tampil['no_telepon'];?></td>
              <td class="py-3"><?php echo $tampil['propinsi'];?></td>
              <td class="py-3"><?php echo $tampil['kota'];?></td>
              <td class="py-3"><?php echo $tampil['kode_pos'];?></td>
              <td class="py-3"><?php echo $tampil['nama_bank'];?></td>
              <td class="py-3"><?php echo $tampil['nama'];?></td>
              <td class="py-3">
                <a href="<?php echo base_url();?>adminweb/semua_transaksi_detail/<?php echo $tampil['id_transaksi_header'];?>/<?php echo $tampil['kode_transaksi'];?>" class="btn btn1 btn-info"><i class="fa fa-search" aria-hidden="true"></i> Detail</a>
              </td>
            </tr>
            <?php
            $no++;
          }
        }
        else { ?>
          <tr>
            <td colspan="12">No Result Data</td>
          </tr>
          <?php

        }
        ?>

      </tbody>
    </table>
  </div>
</section>