<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
 <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
  <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
     <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
     <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
     </li>
     <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
    </ol>
   </nav>
  </div>
  <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
   <h1 class="h3 text-light mb-0">Checkout</h1>
  </div>
 </div>
</div>
<?php if(validation_errors()) { ?>
 <div class="alert alert-block alert-danger show">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <?php echo validation_errors(); ?>
 </div>
 <?php 
} 
?>
<?php echo form_open('home/checkout_invoice');?>
<div class="container pb-5 mb-2 mb-md-4">
 <div class="row">
  <section class="col-lg-8">
   <!-- Steps-->
   <!-- Autor info-->
   <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
    <h2 class="h6 text-light mb-0">Detail dan Metode</h2><a class="btn btn-outline-primary btn-sm ps-2" href="<?php echo base_url('home')?>"><i class="ci-arrow-left me-2"></i>Lanjut Belanja</a>
   </div>

   <!-- Shipping address-->
   <h3 class="pt-1 pb-3 mb-3 border-bottom">Detail Pemesanan</h3>
   <div class="row">
    <div class="col-sm-12">
     <div class="mb-3">
      <label class="form-label" for="checkout-fn">Nama</label>
      <input class="form-control" type="text" id="checkout-fn"  placeholder="Nama Penerima" name="penerima" required>
     </div>
    </div>
   </div>
   <div class="row">
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-email">E-mail</label>
      <input class="form-control" type="email" id="checkout-email" placeholder="Email Penerima" name="email"  required>
     </div>
    </div>
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-phone">No. Telp</label>
      <input class="form-control" type="number" id="checkout-phone" placeholder="No Telp" name="no_telepon"  required>
     </div>
    </div>
   </div>
   <div class="row">
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-address-2">Alamat Penerima</label>
      <input class="form-control" type="text" id="checkout-address-2" placeholder="Alamat Penerima" name="alamat" required>
     </div>
    </div>
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-address-2">Provinsi</label>
      <input class="form-control" type="text" id="checkout-address-2" placeholder="Propinsi" name="propinsi" required>
     </div>
    </div>
   </div>
   <div class="row">
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-address-2">Kota</label>
      <input class="form-control" type="text" id="checkout-address-2"placeholder="Kota" name="kota"  required>
     </div>
    </div>
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-address-1">Kode Pos</label>
      <input class="form-control" type="text" id="checkout-address-1 " placeholder="Kode Pos" name="kode_pos" required>
     </div>
    </div>
   </div>
   <h3 class="mb-3 py-3 border-bottom">Metode Pembayaran</h3>
   <div class="row">
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-email">E-mail</label>
      <select class="form-select" id="checkout-city" name="bank_id">
       <?php
       foreach ($bank->result_array() as $value) { ?>
        <option value="<?php echo $value['id_bank'];?>"><?php echo $value['nama_bank'];?>- <?php echo $value['no_rekening'];?></option>
        <?php
       }
       ?>
      </select>
     </div>
    </div>
    <div class="col-sm-6">
     <div class="mb-3">
      <label class="form-label" for="checkout-phone">No. Telp</label>
      <select class="form-select" id="checkout-city" name="jasapengiriman_id">
       <?php
       foreach ($jasapengiriman->result_array() as $value) { ?>
        <option value="<?php echo $value['id_jasapengiriman'];?>"><?php echo $value['nama'];?></option>
        <?php
       }
       ?>
      </select>
     </div>
    </div>
   </div>

   <!-- Navigation (desktop)-->
   <div class="d-none d-lg-flex pt-4 mt-3">
    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="<?php echo base_url();?>home/keranjang"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Kembali ke Keranjang Belanja</span><span class="d-inline d-sm-none">Back</span></a></div>

   <div class="w-50 ps-2"><button class="btn btn-primary d-block w-100" type="submit">Kirim <i class="ci-arrow-right mt-sm-0 ms-1"></i></button> </div>
   

        <?php echo form_close();?>
  </section>
  <!-- Sidebar-->
  <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
   <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
    <div class="py-2 px-xl-2">
     <div class="widget mb-3">
      <h2 class="widget-title text-center">Produk</h2>

      <?php $i = 1; ?>
      <?php foreach($this->cart->contents() as $items): ?>

       <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="

        <?php echo base_url();?>images/produk/<?php echo $items['gambar'];?>

        " width="64" alt="Product"></a>
        <div class="ps-2">
         <h6 class="widget-product-title"><a href="shop-single-v1.html"><?php echo $items['name']; ?></a></h6>
         <div class="widget-product-meta"><span class="text-accent me-2">Rp. <?php echo $this->cart->format_number($items['price']); ?></span><span class="text-muted">x <?php echo $items['qty']; ?></span></div>
        </div>
       </div>

      </div>
     <?php endforeach; ?>
     <h3 class="fw-normal text-center my-4">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h3>
     <?php $i++; ?>

    </div>
   </div>
  </aside>
 </div>
 <!-- Navigation (mobile)-->
 <div class="row d-lg-none">
  <div class="col-lg-8">
   <div class="d-flex pt-4 mt-3">
    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
   </div>
  </div>
 </div>
</div>
