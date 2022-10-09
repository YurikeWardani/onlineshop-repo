<style type="text/css">
 .box {
  width: 120px;
  height: 50px;
  border: 1px solid whitesmoke;
  border-radius: 5px;
  padding-left: 10%;
}
</style>
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="<?php echo base_url('home')?>"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Keranjang Belanja</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Keranjang Belanja</h1>
    </div>
  </div>
</div>
<?php if(!$this->cart->contents()): echo "<p class='text-center' style='margin-top:5%'>Maaf, Keranjang Belanja Anda Masih Kosong.</p>";
else:
  ?>
  <?php echo form_open('home/keranjang_update'); ?>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- List of items-->
      <section class="col-lg-8">
        <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
          <h2 class="h6 text-light mb-0">Produk</h2><a class="btn btn-outline-primary btn-sm ps-2" href="<?php echo base_url('home')?>"><i class="ci-arrow-left me-2"></i>Lanjut Belanja</a>
        </div>

        <?php $i = 1; ?>
        <?php foreach($this->cart->contents() as $items): ?>
          <?php echo form_hidden('rowid[]', $items['rowid']); ?>
          <!-- Item-->
          <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
            <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img src="<?php echo base_url();?>images/produk/<?php echo $items['gambar'];?>" width="160" alt="Product"></a>
              <div class="pt-2">
                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html"><?php echo $items['name']; ?></a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Harga : </span>Rp. <?php echo $this->cart->format_number($items['price']); ?></div>
                <div class="fs-sm"><span class="text-muted me-2">Sub-Total:</span></div>
                <div class="fs-lg text-accent pt-2"><small>Rp. </small><?php echo $this->cart->format_number($items['subtotal']); ?></div>
              </div>
            </div>
            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
              <label class="form-label" for="quantity1">Jumlah</label>
              <select name="qty[]" class="input-teks box">
                <?php 
                for($i=1;$i<=200;$i+=1)
                {
                  if($i==$items['qty'])
                  {
                    echo "<option selected>".$items['qty']."</option>";

                  }
                  else
                  {
                    echo "<option>".$i."</option>";
                  }
                } 
                ?>
              </select>
              <button class="btn btn-link px-0 text-danger" type="button"><i class="ci-close-circle me-2"></i><span class="fs-sm"><a href="<?php echo base_url(); ?>home/keranjang_hapus/<?php echo $items['rowid']; ?>">Hapus</a></span></button>
            </div>
          </div>
        <?php endforeach; ?>
        <button class="btn btn-outline-accent d-block w-100 mt-4"  type="submit"><i class="ci-loading fs-base me-2" ></i>Update Keranjang </button> <br>
        <div class="alert alert-warning" role="alert">
          Apabila mengubah jumlah (Qty), tekan tombol <a class="alert-link"> Update Keranjang </a><br>
          Untuk menghapus barang pada keranjang belanja, klik tombol <a class="alert-link"> Hapus </a>
      </section>
      <!-- Sidebar-->
      <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
        <div class="bg-white rounded-3 shadow-lg p-4">
          <div class="py-2 px-xl-2">
            <div class="text-center mb-4 pb-3 border-bottom">
              <h2 class="h6 mb-3 pb-1">Total Belanja</h2>
              <h3 class="fw-normal">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h3>
            </div>
            <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="<?php echo base_url(); ?>home/checkout"><i class="ci-card fs-lg me-2"></i>Checkout</a>
          </div>
        </div>
      </aside>

    </div>

  </div>
  <?php 
  echo form_close(); 
endif;
?>
