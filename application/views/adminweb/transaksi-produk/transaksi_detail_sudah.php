
<div class="mt-lg-2 pt-5 pb-2 mb-5 col-md-12">
</div>
<section class="col-lg-12" id="type-inline">
  <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#result4" data-bs-toggle="tab" role="tab" aria-controls="result4" aria-selected="true">Detail Pembeli</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="result4" role="tabpanel">
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
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                if ($data_header->num_rows()>0) {
                  foreach ($data_header->result_array() as $tampil) { ?>
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
                    </tr>
                    <?php
                    $no++;
                  }
                }

                else { ?>
                  <tr>
                    <td colspan="11">No Result Data</td>
                  </tr>
                  <?php

                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="col-lg-12" id="type-inline">
  <div class="card border-0 shadow-lg p-3 mb-5 bg-white rounded ">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#result4" data-bs-toggle="tab" role="tab" aria-controls="result4" aria-selected="true">Detail Produk</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="result4" role="tabpanel">
          <div class="table-responsive" style="font-size: 12px !important;">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Kode Produk</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                if ($data_detail->num_rows()>0) {
                  foreach ($data_detail->result_array() as $tampil) { ?>
                    <tr >
                      <td class="py-3"><?php echo $no;?></td>
                      <td class="py-3"><?php echo $tampil['kode_transaksi'];?></td>
                      <td class="py-3"><?php echo $tampil['kode_produk'];?></td>
                      <td class="py-3"><?php echo $tampil['nama_produk'];?></td>
                      <td class="py-3"><?php echo $tampil['harga'];?></td>
                      <td class="py-3"><?php echo $tampil['jumlah'];?></td>
                    </tr>
                    <?php
                    $no++;
                  }
                }

                else { ?>
                  <tr>
                    <td colspan="6">No Result Data</td>
                  </tr>
                  <?php

                }
                ?>

              </tbody>
            </table>
            <?php 
            foreach ($data_total->result_array() as $value) {
              $total  =  $value['total'];
            }
            ?>
            Total Transaksi =  Rp. <?php echo $total;?> ,-
            

          </div>
        </div>

      </div>
    </div>

  </div>
  <a href="<?php echo base_url();?>adminweb/semua_transaksi" class="btn btn-danger">Kembali</a>
</section>
