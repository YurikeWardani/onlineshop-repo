<?php

class adminweb extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		$this->load->view('adminweb/login',$data);
	}

	public function login() { 

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()==FALSE) {

			$data['seo']  = $this->admin_model->GetSeo(); 
			$data['logo'] = $this->admin_model->GetLogo();
			$this->load->view('adminweb/login',$data);

		}
		else {

			$username= $this->input->post('username');
			$password = md5($this->input->post('password'));

			$this->admin_model->CekAdminLogin($username,$password);

		}
	}

	public function home() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {
			$this->load->view('adminweb/parts/header', $data);
			$this->load->view('adminweb/transaksi-produk/home', $data);
			$this->load->view('adminweb/parts/footer', $data);
		}
		else{
			redirect('adminweb');

		} 
	}

	public function logout() { 

		$this->session->sess_destroy();
		redirect("adminweb"); 
	} 

	//TRANSAKSI
	public function transaksi() { 

		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {

			$data['data_transaksi'] = $this->admin_model->GetTransaksi();
			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/transaksi-produk/transaksi',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}

	}

	public function transaksi_proses () { 

		if($this->session->userdata("logged_in")=="in") {

			$id  = $this->uri->segment(3);

			$this->admin_model->UpdateTransaksiHeader($id);

			$this->session->set_flashdata('berhasil','Transaksi Berhasil Di Proses');
			redirect("adminweb/transaksi");

		}
		else {
			redirect("adminweb");
		}

	}

	public function transaksi_detail () { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {

			$id  			= $this->uri->segment(3);
			$kode_transaksi = $this->uri->segment(4);

			$data['data_header'] 	= $this->admin_model->GetTransaksiheader($id);  
			$data['data_detail']	= $this->admin_model->GetDetailTransaksi($kode_transaksi);
			$data['data_total']		= $this->admin_model->GetDetailTotal($kode_transaksi);

			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/transaksi-produk/transaksi_detail',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}

	}

	public function semua_transaksi () { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {

			$data['data_transaksi'] = $this->admin_model->GetTransaksiSudah();

			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/transaksi-produk/transaksi_sudah',$data);
			$this->load->view('adminweb/parts/footer',$data);


		}
		else {
			redirect("adminweb");
		}

	}

	public function semua_transaksi_detail () { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {

			$id  			= $this->uri->segment(3);
			$kode_transaksi = $this->uri->segment(4);

			$data['data_header'] 	= $this->admin_model->GetTransaksiheader($id);  
			$data['data_detail']	= $this->admin_model->GetDetailTransaksi($kode_transaksi);
			$data['data_total']		= $this->admin_model->GetDetailTotal($kode_transaksi);

			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/transaksi-produk/transaksi_detail_sudah',$data);
			$this->load->view('adminweb/parts/footer',$data);

		}
		else {
			redirect("adminweb");
		}

	}

	//BRAND
	public function brand() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		$data['data_brand']= $this->admin_model->GetBrand();
		$this->load->view('adminweb/parts/header',$data);
		$this->load->view('adminweb/transaksi-produk/brand',$data);
		$this->load->view('adminweb/parts/footer',$data);
	}

	public function brand_simpan() { 
		$nama_brand = $this->input->post("nama_brand");
		$cek = $this->admin_model->BrandSama($nama_brand);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Brand Berhasil Disimpan');
			$this->admin_model->BrandSimpan($nama_brand);
			$success="0";
		}

		echo $success;
		redirect('adminweb/brand');
	}

	public function brand_update() { 
		$id_brand = $this->input->post('id_brand');
		$nama_brand = $this->input->post('nama_brand');

		$cek = $this->admin_model->BrandSama($nama_brand);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('pesan','Nama brand berhasil diubah!');
			$this->admin_model->BrandUpdate($id_brand,$nama_brand);
			$success="0";
		}

		echo $success;
		redirect('adminweb/brand');
	}

	public function brand_delete() { 
		$id_brand = $this->uri->segment(3);
		$this->admin_model->DeleteBrand($id_brand);

		$this->session->set_flashdata('message','Brand Berhasil Dihapus');
		redirect("adminweb/brand");
	}


	//KATEGORI
	public function kategori() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();

		$data['data_kategori']= $this->admin_model->GetKategori();
		$this->load->view('adminweb/parts/header',$data);
		$this->load->view('adminweb/transaksi-produk/kategori',$data);
		$this->load->view('adminweb/parts/footer',$data);
	}

	public function kategori_simpan() { 
		$nama_kategori = $this->input->post("nama_kategori");
		$cek = $this->admin_model->KategoriSama($nama_kategori);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('berhasil','Kategori Berhasil Disimpan');
			$this->admin_model->KategoriSimpan($nama_kategori);
			$success="0";
		}

		echo $success;
		redirect('adminweb/kategori');
	}

	public function kategori_delete() { 
		$id_kategori = $this->uri->segment(3);
		$this->admin_model->DeleteKategori($id_kategori);

		$this->session->set_flashdata('message','Kategori Berhasil Dihapus');
		redirect("adminweb/kategori");
	}

	public function kategori_update() { 
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');

		$cek = $this->admin_model->KategoriSama($nama_kategori);

		if ($cek->num_rows()>0) {
			$success = "1";
		}
		else {
			$this->session->set_flashdata('pesan','Nama kategori berhasil diubah!');
			$this->admin_model->KategoriUpdate($id_kategori,$nama_kategori);
			$success="0";
		}

		echo $success;
		redirect('adminweb/kategori');
	}

	//PRODUK
	public function produk () {  
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		$data['kode_produk'] = $this->admin_model->GetMaxKodeProduk();
		$data['data_brand'] = $this->admin_model->GetBrand();
		$data['data_kategori'] = $this->admin_model->GetKategori();
		$data['data_produk'] = $this->admin_model->GetProduk();

		$this->load->view('adminweb/parts/header',$data);
		$this->load->view('adminweb/transaksi-produk/produk',$data);
		$this->load->view('adminweb/parts/footer',$data);
	}

	public function produk_simpan() { 
		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
		$this->form_validation->set_rules('brand_id','Brand','required');
		$this->form_validation->set_rules('kategori_id','Kategori','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');

		if ($this->form_validation->run()==FALSE) {

			$data['kode_produk'] = $this->admin_model->GetMaxKodeProduk();
			$data['data_brand'] = $this->admin_model->GetBrand();
			$data['data_kategori'] = $this->admin_model->GetKategori();
			$this->template->load('template','adminweb/produk/add',$data);

		}
		else {

			if(empty($_FILES['userfile']['name']))
			{

				$in_data['kode_produk'] = $this->input->post('kode_produk');
				$in_data['nama_produk'] = $this->input->post('nama_produk');
				$in_data['harga'] = $this->input->post('harga');
				$in_data['stok'] = $this->input->post('stok');
				$in_data['deskripsi'] = $this->input->post('deskripsi');
				$in_data['kategori_id'] = $this->input->post('kategori_id');
				$in_data['brand_id'] = $this->input->post('brand_id');
				$this->db->insert("tbl_produk",$in_data);

				$this->session->set_flashdata('berhasil','Produk Berhasil Disimpan');
				redirect("adminweb/produk");
			}
			else
			{
				$config['upload_path'] = './images/produk/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '268';
				$config['max_height']  	= '249';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();

					/* PATH */
					$source             = "./images/produk/".$data['file_name'] ;
					$destination_thumb	= "./images/produk/thumb/" ;
					$destination_medium	= "./images/produk/medium/" ;
						// Permission Configuration
					chmod($source, 0777) ;

					/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
					$this->load->library('image_lib') ;
					$img['image_library'] = 'GD2';
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
					$limit_medium   = 268 ;
					$limit_thumb    = 249 ;

						// Size Image Limit was using (LIMIT TOP)
					$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
					if ($limit_use > $limit_thumb) {
						$percent_medium = $limit_medium/$limit_use ;
						$percent_thumb  = $limit_thumb/$limit_use ;
					}

						//// Making THUMBNAIL ///////
					$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
					$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_thumb ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
					$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

			 			// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_medium ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$in_data['kode_produk'] = $this->input->post('kode_produk');
					$in_data['nama_produk'] = $this->input->post('nama_produk');
					$in_data['harga'] = $this->input->post('harga');
					$in_data['stok'] = $this->input->post('stok');
					$in_data['deskripsi'] = $this->input->post('deskripsi');
					$in_data['kategori_id'] = $this->input->post('kategori_id');
					$in_data['brand_id'] = $this->input->post('brand_id');
					$in_data['gambar'] = $data['file_name'];

					$this->db->insert("tbl_produk",$in_data);

					$this->session->set_flashdata('berhasil','Produk Berhasil Disimpan');
					redirect("adminweb/produk");

				}
				else 
				{
					$this->session->set_flashdata('large','Produk Gagal Disimpan');
					redirect("adminweb/produk");
				}
			}

		}
	}
	public function produk_delete() {
		$id_produk = $this->uri->segment(3);
		$this->admin_model->DeleteProduk($id_produk);

		$this->session->set_flashdata('message','Produk Berhasil Dihapus');
		redirect('adminweb/produk');

	}

	public function produk_update() {
		$id['id_produk'] = $this->input->post("id_produk");

		if(empty($_FILES['userfile']['name']))
		{

			$in_data['kode_produk'] = $this->input->post('kode_produk');
			$in_data['nama_produk'] = $this->input->post('nama_produk');
			$in_data['harga'] = $this->input->post('harga');
			$in_data['stok'] = $this->input->post('stok');
			$in_data['deskripsi'] = $this->input->post('deskripsi');
			$in_data['kategori_id'] = $this->input->post('kategori_id');
			$in_data['brand_id'] = $this->input->post('brand_id');

			$this->db->update("tbl_produk",$in_data,$id);

			$this->session->set_flashdata('update','Produk Berhasil Diupdate');
			redirect("adminweb/produk");
		}
		else
		{
			$config['upload_path'] = './images/produk/';
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '3000';
			$config['max_width']  	= '268';
			$config['max_height']  	= '249';


			$this->load->library('upload', $config);

			if ($this->upload->do_upload("userfile")) {
				$data	 	= $this->upload->data();

				/* PATH */
				$source             = "./images/produk/".$data['file_name'] ;
				$destination_thumb	= "./images/produk/thumb/" ;
				$destination_medium	= "./images/produk/medium/" ;

						// Permission Configuration
				chmod($source, 0777) ;

				/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
				$this->load->library('image_lib') ;
				$img['image_library'] = 'GD2';
				$img['create_thumb']  = TRUE;
				$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
				$limit_medium   = 268 ;
				$limit_thumb    = 249 ;

						// Size Image Limit was using (LIMIT TOP)
				$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
				if ($limit_use > $limit_thumb) {
					$percent_medium = $limit_medium/$limit_use ;
					$percent_thumb  = $limit_thumb/$limit_use ;
				}

						//// Making THUMBNAIL ///////
				$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
				$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_thumb ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

						////// Making MEDIUM /////////////
				$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
				$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_medium ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

				$in_data['kode_produk'] = $this->input->post('kode_produk');
				$in_data['nama_produk'] = $this->input->post('nama_produk');
				$in_data['harga'] = $this->input->post('harga');
				$in_data['stok'] = $this->input->post('stok');
				$in_data['deskripsi'] = $this->input->post('deskripsi');
				$in_data['kategori_id'] = $this->input->post('kategori_id');
				$in_data['brand_id'] = $this->input->post('brand_id');
				$in_data['gambar'] = $data['file_name'];

				$this->db->update("tbl_produk",$in_data,$id);


				$this->session->set_flashdata('update','Produk Berhasil Diupdate');
				redirect("adminweb/produk");

			}
			else  
			{
				$this->session->set_flashdata('large-edit','Produk Gagal Disimpan');
				redirect("adminweb/produk");
			}
		}

	}

	// SETTING 	

	// TENTANG KAMI
	public function tentangkami() {  
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if ($this->session->userdata("logged_in")=="in") {

			$query = $this->admin_model->GetTentangkami();
			foreach ($query->result_array() as $tampil) {
				$data['id_tentangkami']=$tampil['id_tentangkami'];
				$data['judul']=$tampil['judul'];
				$data['deskripsi']=$tampil['deskripsi'];
			}

			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/setting/tentang_kami',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function tentangkami_simpan() { 
		$id_tentangkami = $this->input->post('id_tentangkami');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$this->admin_model->UpdateTentangkami($id_tentangkami,$judul,$deskripsi);

		$this->session->set_flashdata('message','Konten <b>Tentang Kami</b> berhasil diubah! ');
		redirect("adminweb/tentangkami");

	}

	// CARA BELANJA
	public function carabelanja() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if ($this->session->userdata("logged_in")=="in") {

			$query = $this->admin_model->GetCarabelanja();
			foreach ($query->result_array() as $tampil) {
				$data['id_carabelanja']=$tampil['id_carabelanja'];
				$data['judul']=$tampil['judul'];
				$data['deskripsi']=$tampil['deskripsi'];
			}

			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/setting/cara_belanja',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function carabelanja_simpan() { 
		$id_carabelanja = $this->input->post('id_carabelanja');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$this->admin_model->UpdateCarabelanja($id_carabelanja,$judul,$deskripsi);
		$this->session->set_flashdata('message','Konten <b>Cara Belanja</b> berhasil diubah! ');
		redirect("adminweb/carabelanja");
	}

	//SEO
	public function seo() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if ($this->session->userdata("logged_in")=="in") {

			$query = $this->admin_model->GetSeo();
			foreach ($query->result_array() as $tampil) {
				$data['id_seo']=$tampil['id_seo'];
				$data['tittle']=$tampil['tittle'];
				$data['keyword']=$tampil['keyword'];
				$data['description']=$tampil['description'];
			}
			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/setting/seo',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function seo_simpan() {
		$id_seo = $this->input->post('id_seo');
		$tittle = $this->input->post('tittle');
		$keyword = $this->input->post('keyword');
		$description = $this->input->post('description');

		$this->admin_model->UpdateSeo($id_seo,$tittle,$keyword,$description);
		$this->session->set_flashdata('message','<b>SEO</b> berhasil diubah! ');
		redirect("adminweb/seo");
	}
	
	//KONTAK
	public function kontak() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {

			$query=$this->admin_model->Getkontak();
			foreach ($query->result_array() as $tampil) {
				$data["id_kontak"]=$tampil["id_kontak"];
				$data["alamat"]=$tampil["alamat"];
				$data["phone"]=$tampil["phone"];
				$data["email"]=$tampil["email"];
			}

			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/setting/kontak',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function kontak_simpan() { 
		$id_kontak =$this->input->post("id_kontak");
		$alamat =$this->input->post("alamat");
		$phone =$this->input->post("phone");
		$email =$this->input->post("email");

		$this->admin_model->Simpankontak($id_kontak,$alamat,$phone,$email);
		$this->session->set_flashdata('message','Detail <b>Kontak</b> berhasil diubah! ');
		redirect("adminweb/kontak");
	}

	//Admin
	public function admin() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {

			$data['data_admin'] = $this->admin_model->Getadmin();
			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/setting/admin',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}
	} 

	public function admin_delete() { 
		$id = $this->uri->segment(3);
		$this->admin_model->Deleteadmin($id);

		$this->session->set_flashdata('message','Admin Berhasil Dihapus');
		redirect('adminweb/admin');
	}

	public function admin_simpan() { 

		$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','adminweb/admin/add');
		}
		else {

			$in_data['nama_admin'] 		= $this->input->post('nama_admin');
			$in_data['email'] 			= $this->input->post('email');
			$in_data['username'] 		= $this->input->post('username');
			$in_data['password'] 		= md5($this->input->post('password'));
			$in_data['phone'] 			= $this->input->post('phone');
			$in_data['hak_akses'] 		= $this->input->post('hak_akses');
			$this->db->insert("tbl_admin",$in_data);

			$this->session->set_flashdata('berhasil','Admin Berhasil Disimpan');
			redirect("adminweb/admin");

		}

	}

	public function admin_update() { 
		$id['id_admin'] = $this->input->post("id_admin");

		if ($this->input->post('password')!=="") {

			$in_data['nama_admin'] = $this->input->post('nama_admin');
			$in_data['email'] = $this->input->post('email');
			$in_data['username'] = $this->input->post('username');
			$in_data['password'] = md5($this->input->post('password'));
			$in_data['phone'] = $this->input->post('phone');
			$in_data['hak_akses'] = $this->input->post('hak_akses');

		}
		else {
			$in_data['nama_admin'] = $this->input->post('nama_admin');
			$in_data['email'] = $this->input->post('email');
			$in_data['username'] = $this->input->post('username');
			$in_data['phone'] = $this->input->post('phone');
			$in_data['hak_akses'] = $this->input->post('hak_akses');
		}

		$this->db->update("tbl_admin",$in_data,$id);

		$this->session->set_flashdata('pesan','Admin Berhasil Diupdate');
		redirect("adminweb/admin");

	}

	//SOSMED
	public function sosial_media() { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		if($this->session->userdata("logged_in")=="in") {
			$query = $this->admin_model->GetSosialMedia();
			foreach ($query->result_array() as $tampil) {
				$data['id_sosial_media'] = $tampil['id_sosial_media'];
				$data['tw'] = $tampil['tw'];
				$data['fb'] = $tampil['fb'];
				$data['gp'] = $tampil['gp'];
			}
			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/setting/sosmed',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function sosial_media_simpan() {  
		$id_sosial_media =$this->input->post("id_sosial_media");
		$tw =$this->input->post("tw");
		$fb =$this->input->post("fb");
		$gp =$this->input->post("gp");

		$this->admin_model->SimpanSosialMedia($id_sosial_media,$tw,$fb,$gp);
		$this->session->set_flashdata('berhasil','Admin Berhasil Disimpan');
		redirect("adminweb/sosial_media");
	}


	//LOGO
	public function logo () { 
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		$query = $this->admin_model->GetLogo();
		foreach ($query->result_array() as $tampil) {
			$data['id_logo']=$tampil['id_logo'];
			$data['gambar']=$tampil['gambar'];
		}
		$this->load->view('adminweb/parts/header',$data);
		$this->load->view('adminweb/setting/logo',$data);
		$this->load->view('adminweb/parts/footer',$data);
	}

	public function logo_simpan()	{
		if($this->session->userdata("logged_in")=="in") {
			$id['id_logo'] = $this->input->post("id_logo");
			$id_logo = $this->input->post("id_logo");


			if(empty($_FILES['userfile']['name']))
			{


				$this->session->set_flashdata('message','Logo Berhasil Diupdate');
				redirect("adminweb/logo");
			}
			else
			{
				$config['upload_path'] = './images/logo/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '500';
				$config['max_height']  	= '250';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();

					/* PATH */
					$source             = "./images/logo/".$data['file_name'] ;
					$destination_thumb	= "./images/logo/thumb/" ;

						// Permission Configuration
					chmod($source, 0777) ;

					/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
					$this->load->library('image_lib') ;
					$img['image_library'] = 'GD2';
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
					$limit_thumb    = 640 ;

						// Size Image Limit was using (LIMIT TOP)
					$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
					if ($limit_use > $limit_thumb) {
						$percent_thumb  = $limit_thumb/$limit_use ;
					}

						//// Making THUMBNAIL ///////
					$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
					$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_thumb ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$in_data['gambar'] = $data['file_name'];
					$this->db->update("tbl_logo",$in_data,$id);


					$this->session->set_flashdata('berhasil','Produk Berhasil Diupdate');
					redirect("adminweb/logo");

				}
				else 
				{
					$this->session->set_flashdata('error','Produk Gagal Disimpan');
					redirect("adminweb/logo");
				}
			}

		}
		else
		{
			redirect("adminweb");
		}
	}

	//BANK
	public function bank() {
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		$data['data_bank'] = $this->admin_model->GetBank();
		$this->load->view('adminweb/parts/header',$data);
		$this->load->view('adminweb/setting/bank',$data);
		$this->load->view('adminweb/parts/footer',$data);  

	}

	public function bank_simpan() {


		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
		$this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');

		if ($this->form_validation->run() == FALSE)
		{

			$this->template->load('template','adminweb/bank/add');
		}
		else {

			if(empty($_FILES['userfile']['name']))
			{

				$in_data['nama_bank'] = $this->input->post('nama_bank');
				$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
				$in_data['no_rekening'] = $this->input->post('no_rekening');
				$this->db->insert("tbl_bank",$in_data);

				$this->session->set_flashdata('berhasil','Bank Berhasil Disimpan');
				redirect("adminweb/bank");
			}
			else
			{
				$config['upload_path'] = './images/bank/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '3000';
				$config['max_height']  	= '3000';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();

					/* PATH */
					$source             = "./images/bank/".$data['file_name'] ;
					$destination_thumb	= "./images/bank/thumb/" ;
					$destination_medium	= "./images/bank/medium/" ;
						// Permission Configuration
					chmod($source, 0777) ;

					/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
					$this->load->library('image_lib') ;
					$img['image_library'] = 'GD2';
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
					$limit_medium   = 800 ;
					$limit_thumb    = 270 ;

						// Size Image Limit was using (LIMIT TOP)
					$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
					if ($limit_use > $limit_thumb) {
						$percent_medium = $limit_medium/$limit_use ;
						$percent_thumb  = $limit_thumb/$limit_use ;
					}

						//// Making THUMBNAIL ///////
					$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
					$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_thumb ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
					$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

			 			// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_medium ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$in_data['nama_bank'] = $this->input->post('nama_bank');
					$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
					$in_data['no_rekening'] = $this->input->post('no_rekening');
					$in_data['gambar'] = $data['file_name'];


					$this->db->insert("tbl_bank",$in_data);



					$this->session->set_flashdata('berhasil','Bank Berhasil Disimpan');
					redirect("adminweb/bank");

				}
				else 
				{
					$this->session->set_flashdata('large-edit','Bank Berhasil Disimpan');
					redirect("adminweb/bank");
				}
			}

		}  

	}

	public function bank_delete() {
		$id_bank = $this->uri->segment(3);
		$this->admin_model->DeleteBank($id_bank);

		$this->session->set_flashdata('message','Bank Berhasil Dihapus');
		redirect('adminweb/bank');

	}

	public function bank_update() {
		$id['id_bank'] = $this->input->post("id_bank");

		if(empty($_FILES['userfile']['name']))
		{

			$in_data['nama_bank'] = $this->input->post('nama_bank');
			$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
			$in_data['no_rekening'] = $this->input->post('no_rekening');

			$this->db->update("tbl_bank",$in_data,$id);

			$this->session->set_flashdata('update','Bank Berhasil Diupdate');
			redirect("adminweb/bank");
		}
		else
		{
			$config['upload_path'] = './images/bank/';
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '3000';
			$config['max_width']  	= '260';
			$config['max_height']  	= '100';


			$this->load->library('upload', $config);

			if ($this->upload->do_upload("userfile")) {
				$data	 	= $this->upload->data();

				/* PATH */
				$source             = "./images/bank/".$data['file_name'] ;
				$destination_thumb	= "./images/bank/thumb/" ;
				$destination_medium	= "./images/bank/medium/" ;

						// Permission Configuration
				chmod($source, 0777) ;

				/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
				$this->load->library('image_lib') ;
				$img['image_library'] = 'GD2';
				$img['create_thumb']  = TRUE;
				$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
				$limit_medium   = 90 ;
				$limit_thumb    = 60 ;

						// Size Image Limit was using (LIMIT TOP)
				$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
				if ($limit_use > $limit_thumb) {
					$percent_medium = $limit_medium/$limit_use ;
					$percent_thumb  = $limit_thumb/$limit_use ;
				}

						//// Making THUMBNAIL ///////
				$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
				$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_thumb ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

						////// Making MEDIUM /////////////
				$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
				$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_medium ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

				$in_data['nama_bank'] = $this->input->post('nama_bank');
				$in_data['nama_pemilik'] = $this->input->post('nama_pemilik');
				$in_data['no_rekening'] = $this->input->post('no_rekening');
				$in_data['gambar'] = $data['file_name'];

				$this->db->update("tbl_bank",$in_data,$id);


				$this->session->set_flashdata('update','Bank Berhasil Diupdate');
				redirect("adminweb/bank");

			}
			else 
			{
				$this->session->set_flashdata('large-edit','Bank Berhasil Disimpan');
				redirect("adminweb/bank");
			}
		}

	}

	//Jasa Pengirman
	public function jasapengiriman() { 

		$data['data_jasapengiriman'] = $this->admin_model->GetJasapengiriman();
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		$this->load->view('adminweb/parts/header',$data);
		$this->load->view('adminweb/setting/jasa_pengiriman',$data);
		$this->load->view('adminweb/parts/footer',$data); 

	}

	public function jasapengiriman_simpan() {

		$this->form_validation->set_rules('nama', 'Nama Jasa Pengiriman', 'required');




		if ($this->form_validation->run() == FALSE)
		{

			$this->template->load('template','adminweb/jasapengiriman/add');
		}
		else {

			if(empty($_FILES['userfile']['name']))
			{

				$in_data['nama'] = $this->input->post('nama');
				$this->db->insert("tbl_jasapengiriman",$in_data);

				$this->session->set_flashdata('berhasil','Jasa Pengiriman Berhasil Disimpan');
				redirect("adminweb/jasapengiriman");
			}
			else
			{
				$config['upload_path'] = './images/jasapengiriman/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '150';
				$config['max_height']  	= '60';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();

					/* PATH */
					$source             = "./images/jasapengiriman/".$data['file_name'] ;
					$destination_thumb	= "./images/jasapengiriman/thumb/" ;
					$destination_medium	= "./images/jasapengiriman/medium/" ;
						// Permission Configuration
					chmod($source, 0777) ;

					/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
					$this->load->library('image_lib') ;
					$img['image_library'] = 'GD2';
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
					$limit_medium   = 150 ;
					$limit_thumb    = 60 ;

						// Size Image Limit was using (LIMIT TOP)
					$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
					if ($limit_use > $limit_thumb) {
						$percent_medium = $limit_medium/$limit_use ;
						$percent_thumb  = $limit_thumb/$limit_use ;
					}

						//// Making THUMBNAIL ///////
					$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
					$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_thumb ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
					$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

			 			// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_medium ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$in_data['nama'] = $this->input->post('nama');
					$in_data['gambar'] = $data['file_name'];



					$this->db->insert("tbl_jasapengiriman",$in_data);



					$this->session->set_flashdata('berhasil','Berhasil Disimpan');
					redirect("adminweb/jasapengiriman");


				}
				else 
				{
					$this->session->set_flashdata('large-edit','Gagal Disimpan');
					redirect("adminweb/jasapengiriman");

				}
			}

		}

	}

	public function jasapengiriman_delete() {
		$id_jasapengiriman = $this->uri->segment(3);
		$this->admin_model->DeleteJasapengiriman($id_jasapengiriman);

		$this->session->set_flashdata('message','Jasa Pengiriman Berhasil Dihapus');
		redirect('adminweb/jasapengiriman');

	}

	public function jasapengiriman_update() { 
		$id['id_jasapengiriman'] = $this->input->post("id_jasapengiriman");

		if(empty($_FILES['userfile']['name']))
		{

			$in_data['nama'] = $this->input->post('nama');

			$this->db->update("tbl_jasapengiriman",$in_data,$id);

			$this->session->set_flashdata('update','Jasa Pengiriman Berhasil Diupdate');
			redirect("adminweb/jasapengiriman");
		}
		else
		{
			$config['upload_path'] = './images/jasapengiriman/';
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '3000';
			$config['max_width']  	= '150';
			$config['max_height']  	= '60';


			$this->load->library('upload', $config);

			if ($this->upload->do_upload("userfile")) {
				$data	 	= $this->upload->data();

				/* PATH */
				$source             = "./images/jasapengiriman/".$data['file_name'] ;
				$destination_thumb	= "./images/jasapengiriman/thumb/" ;
				$destination_medium	= "./images/jasapengiriman/medium/" ;

						// Permission Configuration
				chmod($source, 0777) ;

				/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
				$this->load->library('image_lib') ;
				$img['image_library'] = 'GD2';
				$img['create_thumb']  = TRUE;
				$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
				$limit_medium   = 800 ;
				$limit_thumb    = 270 ;

						// Size Image Limit was using (LIMIT TOP)
				$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
				if ($limit_use > $limit_thumb) {
					$percent_medium = $limit_medium/$limit_use ;
					$percent_thumb  = $limit_thumb/$limit_use ;
				}

						//// Making THUMBNAIL ///////
				$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
				$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_thumb ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

						////// Making MEDIUM /////////////
				$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
				$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_medium ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

				$in_data['nama'] = $this->input->post('nama');
				$in_data['gambar'] = $data['file_name'];

				$this->db->update("tbl_jasapengiriman",$in_data,$id);


				$this->session->set_flashdata('berhasil','Bank Berhasil Disimpan');
				redirect("adminweb/jasapengiriman");

			}
			else 
			{
				$this->session->set_flashdata('large-edit','Bank Berhasil Disimpan');
				redirect("adminweb/jasapengiriman");
			}
		} 

	}

	//Slider
	public function slider () { 

		$data['data_slider'] = $this->admin_model->GetSlider();
		$data['seo']  = $this->admin_model->GetSeo(); 
		$data['logo'] = $this->admin_model->GetLogo();
		$this->load->view('adminweb/parts/header',$data);
		$this->load->view('adminweb/setting/slider',$data);
		$this->load->view('adminweb/parts/footer',$data); 
	}

	public function slider_simpan() {
		$this->form_validation->set_rules('tittle','Tittle','required');
		$this->form_validation->set_rules('description','Description','required');

		if ($this->form_validation->run()==FALSE) {

			$this->template->load('template','adminweb/produk/add');

		}
		else {

			if(empty($_FILES['userfile']['name']))
			{

				$in_data['tittle'] = $this->input->post('tittle');
				$in_data['description'] = $this->input->post('description');
				$in_data['status'] = $this->input->post('status');
				$this->db->insert("tbl_slider",$in_data);

				$this->session->set_flashdata('berhasil','Slider Berhasil Disimpan');
				redirect("adminweb/produk");
			}
			else
			{
				$config['upload_path'] = './images/slider/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '484';
				$config['max_height']  	= '441';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();

					/* PATH */
					$source             = "./images/slider/".$data['file_name'] ;
					$destination_thumb	= "./images/slider/thumb/" ;
					$destination_medium	= "./images/slider/medium/" ;
						// Permission Configuration
					chmod($source, 0777) ;

					/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
					$this->load->library('image_lib') ;
					$img['image_library'] = 'GD2';
					$img['create_thumb']  = TRUE;
					$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
					$limit_medium   = 481 ;
					$limit_thumb    = 441 ;

						// Size Image Limit was using (LIMIT TOP)
					$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
					if ($limit_use > $limit_thumb) {
						$percent_medium = $limit_medium/$limit_use ;
						$percent_thumb  = $limit_thumb/$limit_use ;
					}

						//// Making THUMBNAIL ///////
					$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
					$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_thumb ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
					$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

			 			// Configuration Of Image Manipulation :: Dynamic
					$img['thumb_marker'] = '';
					$img['quality']      = '100%' ;
					$img['source_image'] = $source ;
					$img['new_image']    = $destination_medium ;

						// Do Resizing
					$this->image_lib->initialize($img);
					$this->image_lib->resize();
					$this->image_lib->clear() ;

					$in_data['tittle'] = $this->input->post('tittle');
					$in_data['description'] = $this->input->post('description');
					$in_data['status'] = $this->input->post('status');
					$in_data['gambar'] = $data['file_name'];



					$this->db->insert("tbl_slider",$in_data);


					$this->session->set_flashdata('berhasil','Slider Berhasil Disimpan');
					redirect("adminweb/slider");

				}
				else 
				{
					$this->session->set_flashdata('large-edit','Slider gagal Disimpan');
					redirect("adminweb/slider");
				}
			}

		}
	}

	public function slider_delete() {
		$id_slider = $this->uri->segment(3);
		$this->admin_model->DeleteSlider($id_slider);

		$this->session->set_flashdata('message','Slider Berhasil Dihapus');
		redirect('adminweb/slider');

	}

	public function slider_update() {
		$id['id_slider'] = $this->input->post("id_slider");

		if(empty($_FILES['userfile']['name']))
		{

			$in_data['tittle'] = $this->input->post('tittle');
			$in_data['description'] = $this->input->post('description');
			$in_data['status'] = $this->input->post('status');


			$this->db->update("tbl_slider",$in_data,$id);

			$this->session->set_flashdata('update','Slider Berhasil Diupdate');
			redirect("adminweb/slider");
		}
		else
		{
			$config['upload_path'] = './images/slider/';
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '3000';
			$config['max_width']  	= '481';
			$config['max_height']  	= '441';


			$this->load->library('upload', $config);

			if ($this->upload->do_upload("userfile")) {
				$data	 	= $this->upload->data();

				/* PATH */
				$source             = "./images/slider/".$data['file_name'] ;
				$destination_thumb	= "./images/slider/thumb/" ;
				$destination_medium	= "./images/slider/medium/" ;

						// Permission Configuration
				chmod($source, 0777) ;

				/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
				$this->load->library('image_lib') ;
				$img['image_library'] = 'GD2';
				$img['create_thumb']  = TRUE;
				$img['maintain_ratio']= TRUE;

						/// Limit Width Resize
				$limit_medium   = 481 ;
				$limit_thumb    = 441 ;

						// Size Image Limit was using (LIMIT TOP)
				$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

						// Percentase Resize
				if ($limit_use > $limit_thumb) {
					$percent_medium = $limit_medium/$limit_use ;
					$percent_thumb  = $limit_thumb/$limit_use ;
				}

						//// Making THUMBNAIL ///////
				$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
				$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_thumb ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

						////// Making MEDIUM /////////////
				$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
				$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

						// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_medium ;

						// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;

				$in_data['tittle'] = $this->input->post('tittle');
				$in_data['description'] = $this->input->post('description');
				$in_data['status'] = $this->input->post('status');
				$in_data['gambar'] = $data['file_name'];

				$this->db->update("tbl_slider",$in_data,$id);


				$this->session->set_flashdata('pesan','Slider Berhasil Disimpan');
				redirect("adminweb/slider");

			}
			else 
			{
				$this->session->set_flashdata('large-edit','Slider gagal Disimpan');
				redirect("adminweb/slider");
			}
		}

	}

	//BUKU TAMU

	public function buku_tamu() { 

		if($this->session->userdata("logged_in")=="in") {

			$data['data_buku_tamu'] = $this->admin_model->GetBukuTamu();
			$data['data_buku_tamu_kirim'] = $this->admin_model->GetBukuTamuKirim();
			$data['seo']  = $this->admin_model->GetSeo(); 
			$data['logo'] = $this->admin_model->GetLogo();
			$this->load->view('adminweb/parts/header',$data);
			$this->load->view('adminweb/setting/buku_tamu',$data);
			$this->load->view('adminweb/parts/footer',$data);
		}
		else {
			redirect("adminweb");
		}
	}

	public function buku_tamu_hapus() { 

		$id = $this->uri->segment(3);
		$this->admin_model->DeleteBukuTamu($id);

		$this->session->set_flashdata('hapus-baca','Pesan Berhasil Dihapus');
		redirect("adminweb/buku_tamu");  
	}

	public function buku_tamu_balas_simpan() { 
		$id = $this->input->post("id_hubungikami");
		$status ="1";
		$this->admin_model->UpdateStatusBukuTamu($status,$id);
		
		$email = $this->input->post("email");
		$judul = $this->input->post("judul");
		$isi_hubungi_kami_kirim = $this->input->post("isi_hubungi_kami_kirim");

		$this->admin_model->SimpanBukuTamuAdd($email,$judul,$isi_hubungi_kami_kirim);

		$this->load->library('email');
		$this->email->from('info@adriano.com', 'Adriano MX Online Shop');
		$this->email->to($email); 	
		$this->email->subject($judul);
		$this->email->message($isi_hubungi_kami_kirim);	
		$this->email->send();
		
		$this->session->set_flashdata('message','Pesan Berhasil Disimpan');
		redirect("adminweb/buku_tamu");

	}

	public function buku_tamu_add_simpan() { 
		$email = $this->input->post("email");
		$judul = $this->input->post("judul");
		$isi_hubungi_kami_kirim = $this->input->post("isi_hubungi_kami_kirim");

		$this->admin_model->SimpanBukuTamuAdd($email,$judul,$isi_hubungi_kami_kirim);

		$this->load->library('email');
		$this->email->from('info@adriano.com', 'Adriano MX Online Shop');
		$this->email->to($email); 	
		$this->email->subject($judul);
		$this->email->message($isi_hubungi_kami_kirim);	
		$this->email->send();

		$this->session->set_flashdata('kirim','Pesan Berhasil Dihapus');
		redirect("adminweb/buku_tamu");  
	}


	public function buku_tamu_kirim_hapus() { 

		$id = $this->uri->segment(3);
		$this->admin_model->DeleteBukuTamuKirim($id);

		$this->session->set_flashdata('hapus-kirim','Pesan Berhasil Dihapus');
		redirect("adminweb/buku_tamu");
	}

}