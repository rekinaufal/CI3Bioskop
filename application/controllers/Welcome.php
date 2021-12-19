<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('MSudi');	
	}

	public function index()
	{

			if($this->session->userdata('Cek') == "Gudang")
			{
				$data['content']='VBlank';
				$this->load->view('VGudang_page',$data);
			}
			elseif($this->session->userdata('Cek') == "Admin")
			{
				$data['content']='VBlank';
				$this->load->view('VAdmin_page',$data);
			}	
			else
			{
				$data['content']='VBlank';
				$this->load->view('VKasir_page',$data);
			}
	}

//mulai kodingan film---------------------------------------------------
	public function DataFilm()
	{
		// sintax mulai session block
		if($this->session->userdata('Cek') == "Kasir")
		{
		// sintax mulai session block
			if($this->uri->segment(4)=='view')
			{
				$kd_film=$this->uri->segment(3);
				$tampil=$this->MSudi->GetDataWhere('tbl_film','kd_film',$kd_film)->row();
				$data['detail']['kd_film']= $tampil->kd_film;
	            		$data['detail']['judul_film']= $tampil->judul_film;
	            		$data['detail']['jenis_film']= $tampil->jenis_film;
	            		$data['detail']['sutradara']= $tampil->sutradara;
	            		$data['detail']['gambar']= $tampil->gambar;
	            		$data['detail']['status_film']= $tampil->status_film;
				$data['content']='VFormUpdateFilm';
			}
			else
			{	
				$data['DataFilm']=$this->MSudi->StatusTampil('tbl_film');
				$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_film');
				$data['content']='VFilm';
			}
			$this->load->view('VKasir_page',$data);
		// sintax selesai session block
		}
		else
		{
			$this->session->sess_destroy();
			redirect(site_url('Login'));
		}
		// sintax selesai session block
	}

	public function VFormAddFilm()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
				$data['content']='VFormAddFilm';
				$this->load->view('VKasir_page',$data);
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function AddDataFilm()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			 $add['kd_film']=$this->input->post('txt_kd_film');
         	 $add['judul_film']= $this->input->post('txt_judul_film');
         	 $add['jenis_film']= $this->input->post('txt_jenis_film');
         	 $add['sutradara']= $this->input->post('txt_sutradara');
         	 $add['gambar']= $this->file_upload();
         	 $add['status_film']= $this->input->post('txt_status_film'); 

        	 $this->MSudi->AddData('tbl_film',$add);
        	 redirect(site_url('Welcome/DataFilm'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function UpdateDataFilm()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
		 $kd_film=$this->input->post('txt_kd_film');
			 $update['judul_film']= $this->input->post('txt_judul_film');
         	 $update['jenis_film']= $this->input->post('txt_jenis_film');
         	 $update['sutradara']= $this->input->post('txt_sutradara');
         	 $up_foto = $this->file_upload('./uploads/');
         	 $update['status_film']= $this->input->post('txt_status_film');
			if($up_foto){
				$update['gambar']= $up_foto;
			}
          	$this->MSudi->UpdateData('tbl_film','kd_film',$kd_film,$update);
		 	redirect(site_url('Welcome/DataFilm'));
		 }else
		 {
			$this->session->sess_destroy();
			redirect(site_url('Login'));
		}	
	}

	public function DeleteDataFilm($id)
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			// $this->MSudi->DeleteData('tbl_film','kd_film',$kd_film);
		 	$kd_film=$id;
				$row['status_tampil'] = 1;
				$row['tanggal_delete'] = Date("Y-m-d");
				$row['user'] = $this->session->userdata('username');
				$this->MSudi->UpdateData("tbl_film","kd_film",$kd_film,$row);
        	 redirect(site_url('Welcome/DataFilm'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}
//akhir kodingan film -----------------------------------------------------------

//awal kodingan upload -----------------------------------------------------------
public function file_upload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';

		$this->load->library('upload', $config);
		if($this->upload->do_upload('txt_gambar')){
			// $data = array('upload_data' => $this->upload->data());
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
			return $file_name;
		}
}
//akhir kodingan upload -----------------------------------------------------------

//mulai kodingan harga---------------------------------------------------
	public function DataHargaFilm()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			$this->db->order_by('judul_film','desc');
			if($this->uri->segment(4)=='view')
			{
				$kd_harga=$this->uri->segment(3);
				$onjoin = "tbl_film.kd_film = tbl_harga.kd_film";
				$tampil = $this->MSudi->filter('tbl_harga','tbl_film',$onjoin,'kd_harga',$kd_harga)->row();
						$data['detail']['kd_harga']= $tampil->kd_harga;
	            		$data['detail']['kd_film']= $tampil->kd_film;
	            		$data['detail']['judul_film']= $tampil->judul_film;
	            		$data['detail']['harga']= str_replace('.', '', $tampil->harga);
	            		$data['detail']['hari']= $tampil->hari;
	            		$data['detail']['keterangan']= $tampil->keterangan;
				$data['content']='VFormUpdateHargaFilm';
				$data['DataFilm']=$this->MSudi->GetData('tbl_film');
				$data['StatusFilm']=$this->MSudi->StatusFilm(1);
				$data['TotalDataStatus'] = $this->MSudi->HitungJumlahData('tbl_film','status_film',1);
			}
			else
			{	
				$onjoin = "tbl_film.kd_film = tbl_harga.kd_film";
				$data['listData']=$this->MSudi->GetDataJoinWhere('tbl_harga','tbl_film',$onjoin,'tbl_harga.status_tampil = 0');

				$data['DataFilm']=$this->MSudi->GetData('tbl_film');
				$data['DataHargaFilm']=$this->MSudi->GetData('tbl_harga');
				$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_harga');
				$data['content']='VHargaFilm';
			}
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	

		$this->load->view('VKasir_page',$data);
	}


	public function VFormAddHargaFilm()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{	
			$data['StatusFilm']=$this->MSudi->StatusFilm(1);
			
			$data['content']='VFormAddHargaFilm';
			$data['DataFilm']=$this->MSudi->GetData('tbl_film');
			$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_film','status_film',1);
			$this->load->view('VKasir_page',$data);
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function AddDataHargaFilm()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
		 	$add['kd_harga']=$this->input->post('txt_kd_harga');
         	 $add['kd_film']= $this->input->post('txt_kd_film');
         	 $add['harga']= str_replace('.', '', $this->input->post('txt_harga'));
         	 $add['hari']= $this->input->post('txt_hari');
         	 $add['keterangan']= $this->input->post('txt_keterangan');
        	 $this->MSudi->AddData('tbl_harga',$add);
        	 redirect(site_url('Welcome/DataHargaFilm'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function UpdateDataHargaFilm()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
		 $kd_harga=$this->input->post('txt_kd_harga');
			 $update['kd_film']= $this->input->post('txt_kd_film');
         	 $update['harga']= str_replace('.', '', $this->input->post('txt_harga'));
         	 $update['hari']= $this->input->post('txt_hari');
         	 $update['keterangan']= $this->input->post('txt_keterangan');
          	 $this->MSudi->UpdateData('tbl_harga','kd_harga',$kd_harga,$update);
		 	redirect(site_url('Welcome/DataHargaFilm'));
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function DeleteDataHargaFilm($id)
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
		 // $kd_harga=$this->uri->segment('3');
   //      	 $this->MSudi->DeleteData('tbl_harga','kd_harga',$kd_harga);
			$kd_harga=$id;
				$row['status_tampil'] = 1;
				$row['tanggal_delete'] = Date("Y-m-d");
				$row['user'] = $this->session->userdata('username');
				$this->MSudi->UpdateData("tbl_harga","kd_harga",$kd_harga,$row);
        	 redirect(site_url('Welcome/DataHargaFilm'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}
//akhir kodingan harga -----------------------------------------------------------

//mulai kodingan studio---------------------------------------------------
	public function DataStudio()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			if($this->uri->segment(4)=='view')
			{
				$kd_studio=$this->uri->segment(3);
				$tampil=$this->MSudi->GetDataWhere('tbl_studio','kd_studio',$kd_studio)->row();
						$data['detail']['kd_studio']= $tampil->kd_studio;
	            		$data['detail']['nama_studio']= $tampil->nama_studio;
				$data['content']='VFormUpdateStudio';
			}
			else
			{	
				$data['DataStudio']=$this->MSudi->StatusTampil('tbl_studio');
				// $data['DataStudio']=$this->MSudi->GetData('tbl_studio');
				$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_studio');
				$data['content']='VStudio';
			}
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}

			$this->load->view('VKasir_page',$data);
	}


	public function VFormAddStudio()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			$data['content']='VFormAddStudio';
			$data['DataFilm']=$this->MSudi->GetData('tbl_film');
			$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_film');
			$this->load->view('VKasir_page',$data);
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}

	public function AddDataStudio()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			 $add['kd_studio']=$this->input->post('txt_kd_studio');
         	 $add['nama_studio']= $this->input->post('txt_nama_studio');
        	 $this->MSudi->AddData('tbl_studio',$add);
        	 redirect(site_url('Welcome/DataStudio'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}

	public function UpdateDataStudio()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
		 $kd_studio=$this->input->post('txt_kd_studio');
			 $update['nama_studio']= $this->input->post('txt_nama_studio');
          	 $this->MSudi->UpdateData('tbl_studio','kd_studio',$kd_studio,$update);
			 redirect(site_url('Welcome/DataStudio'));
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}

	public function DeleteDataStudio($id)
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
		 // $kd_studio=$this->uri->segment('3');
   //      	 $this->MSudi->DeleteData('tbl_studio','kd_studio',$kd_studio);
			$kd_studio=$id;
				$row['status_tampil'] = 1;
				$row['tanggal_delete'] = Date("Y-m-d");
				$row['user'] = $this->session->userdata('username');
				$this->MSudi->UpdateData("tbl_studio","kd_studio",$kd_studio,$row);
        	 redirect(site_url('Welcome/DataStudio'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}
//akhir kodingan studio -----------------------------------------------------------

//mulai kodingan tayang---------------------------------------------------
	public function DataTayang()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			$this->db->order_by('judul_film','desc');
			if($this->uri->segment(4)=='view')
			{
				$kd_tayang=$this->uri->segment(3);
				$onjoin = "tbl_film.kd_film = tbl_tayang.kd_film AND tbl_studio.kd_studio = tbl_tayang.kd_studio";
				$tampil=$this->MSudi->filter2('tbl_tayang','tbl_film','tbl_studio',$onjoin,'kd_tayang',$kd_tayang)->row();
						$data['detail']['kd_tayang']= $tampil->kd_tayang;
	            		$data['detail']['kd_film']= $tampil->kd_film;
	            		$data['detail']['judul_film']= $tampil->judul_film;
	            		$data['detail']['kd_studio']= $tampil->kd_studio;
	            		$data['detail']['nama_studio']= $tampil->nama_studio;
	            		$data['detail']['tanggal_tayang']= $tampil->tanggal_tayang;
	            		$data['detail']['jam_tayang']= $tampil->jam_tayang;
	            		$data['detail']['status_tayang']= $tampil->status_tayang;
				$data['content']='VFormUpdateTayang';
				$data['DataStudio']=$this->MSudi->GetData('tbl_studio');
				$data['StatusFilm']=$this->MSudi->StatusFilm(1);
				$data['TotalDataStatus'] = $this->MSudi->HitungJumlahData('tbl_film','status_film',1);
			}
			else
			{	
				$onjoin = "tbl_film.kd_film = tbl_tayang.kd_film AND tbl_studio.kd_studio = tbl_tayang.kd_studio";
				$data['listData'] = $this->MSudi->GetData2JoinWhere('tbl_tayang','tbl_film','tbl_studio',$onjoin,'tbl_tayang.status_delete = 0');

				$data['DataFilm']=$this->MSudi->GetData('tbl_film');
				$data['DataStudio']=$this->MSudi->GetData('tbl_studio');
				$data['DataTayang']=$this->MSudi->GetData('tbl_tayang');
				$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_tayang');
				$data['content']='VTayang';
			}
		 }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}

		$this->load->view('VKasir_page',$data);
	}


	public function VFormAddTayang()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			$data['StatusFilm']=$this->MSudi->StatusFilm(1);

			$data['content']='VFormAddTayang';
			$data['DataFilm']=$this->MSudi->GetData('tbl_film');
			$data['DataStudio']=$this->MSudi->GetData('tbl_studio');
			$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_film','status_film',1);
			$this->load->view('VKasir_page',$data);
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}

	public function AddDataTayang()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			 $add['kd_tayang']=$this->input->post('txt_kd_tayang');
         	 $add['kd_film']= $this->input->post('txt_kd_film');
         	 $add['kd_studio']= $this->input->post('txt_kd_studio');
         	 $add['tanggal_tayang']= $this->input->post('txt_tanggal_tayang');
         	 $add['jam_tayang']= $this->input->post('txt_jam_tayang');
         	 $add['status_tayang']= $this->input->post('txt_status_tayang');
        	 $this->MSudi->AddData('tbl_tayang',$add);
        	 redirect(site_url('Welcome/DataTayang'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}

	public function UpdateDataTayang()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{

		 $kd_tayang=$this->input->post('txt_kd_tayang');
			 $update['kd_film']= $this->input->post('txt_kd_film');
			 $update['kd_studio']= $this->input->post('txt_kd_studio');
			 $update['tanggal_tayang']= $this->input->post('txt_tanggal_tayang');
			 $update['jam_tayang']= $this->input->post('txt_jam_tayang');
			 $update['status_tayang']= $this->input->post('txt_status_tayang');
          	 $this->MSudi->UpdateData('tbl_tayang','kd_tayang',$kd_tayang,$update);
			 redirect(site_url('Welcome/DataTayang'));
		  }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}

	public function DeleteDataTayang($id)
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
		 $kd_tayang=$id;
				$row['status_delete'] = 1;
				$row['tanggal_delete'] = Date("Y-m-d");
				$row['user'] = $this->session->userdata('username');
        	 $this->MSudi->UpdateData('tbl_tayang','kd_tayang',$kd_tayang,$row);
        	 redirect(site_url('Welcome/DataTayang'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
	}
//akhir kodingan tayang -----------------------------------------------------------

//mulai kodingan pembelian---------------------------------------------------
	public function DataPembelian()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
				$this->MSudi->UpdateAllTayang();
				$this->db->order_by('kd_pembelian','desc');
			if($this->uri->segment(4)=='view')
			{
				$kd_pembelian=$this->uri->segment(3);
				$onjoin = "qw_filmbelitayang1.kd_tayang = tbl_pembelian.kd_tayang";
				$tampil=$this->MSudi->filter('tbl_pembelian','qw_filmbelitayang1',$onjoin,'kd_pembelian',$kd_pembelian)->row();
						$data['detail']['kd_pembelian']= $tampil->kd_pembelian;
	            		$data['detail']['kd_tayang']= $tampil->kd_tayang;
	            		$data['detail']['judul_film']= $tampil->judul_film;
	            		$data['detail']['tanggal_tayang']= $tampil->tanggal_tayang;
	            		$data['detail']['nama_studio']= $tampil->nama_studio;
	            		$data['detail']['harga']= $tampil->harga;
	            		$data['detail']['pilih_kursi']= $tampil->pilih_kursi;
	            		$data['detail']['jumlah_kursi']= $tampil->jumlah_kursi;
	            		$data['detail']['tanggal_beli']= $tampil->tanggal_beli;
	            		$data['detail']['total']= $tampil->total;
	            		$data['detail']['bayar']= $tampil->bayar;
	            		$this->load->view('script');
				$data['content']='VFormUpdatePembelian';
				$data['TanggalTayang']=$this->MSudi->TanggalTayang(Date('Y-m-d'), 1);
				$data['DataKursi']=$this->MSudi->DaftarKursi($this->input->get('kd_tayang'));
				$data['TotalDataStatus'] = $this->MSudi->HitungJumlahData('tbl_film','status_film',1);
			}
			else
			{	
				$onjoin = "qw_filmbelitayang1.kd_tayang = tbl_pembelian.kd_tayang";
				$data['listData'] = $this->MSudi->GetDataJoin('tbl_pembelian','qw_filmbelitayang1',$onjoin);

				$data['DataPembelian']=$this->MSudi->GetData('tbl_pembelian');
				$data['TotalData'] = $this->MSudi->HitungJumlahData('tbl_pembelian');
				$data['content']='VPembelian';
			}
		 }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
			$this->load->view('VKasir_page',$data);
	}


	public function VFormAddPembelian()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			$data['content']='VFormAddPembelian';
			$data['TanggalTayang']=$this->MSudi->TanggalTayang(Date('Y-m-d'), 1);
			$data['DataKursi']=$this->MSudi->DaftarKursi($this->input->get('kd_tayang'));
			if ($this->input->get('kd_tayang')) {
				$kd_tayang = $this->input->get('kd_tayang');
				$row['status_tampil'] = 1;
				$this->MSudi->UpdateData("tbl_tayang","kd_tayang",$kd_tayang,$row);
			}
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
			$this->load->view('VKasir_page',$data);
			$this->load->view('script');
	}

	public function AddDataPembelian()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			 $add['kd_pembelian']=$this->input->post('txt_kd_pembelian');
			 $add['kd_tayang']= $this->input->post('txt_kd_tayang');
         	 $add['harga']= str_replace('.', '', $this->input->post('txt_harga'));
         	 $add['pilih_kursi']= $this->input->post('txt_pilih_kursi');
         	 $add['jumlah_kursi']= $this->input->post('txt_jumlah_kursi');
        	 $add['tanggal_beli']= $this->input->post('txt_tanggal_beli');
         	 $add['total']= str_replace('.', '', $this->input->post('txt_total'));
         	 $add['bayar']= str_replace('.', '', $this->input->post('txt_bayar'));
        	 $this->MSudi->AddData('tbl_pembelian',$add);

        	 $kursi = explode(',', $add['pilih_kursi']);
        	 foreach ($kursi as $k) 
        	 {
        	 	$data = [
        	 		'status_kursi' => 1
        	 	];
        	 	$kd_tayang = $this->input->post('txt_kd_tayang');
        	 	$this->MSudi->UpdateStatusKursi('tbl_kursi',$kd_tayang,$k,$data);
        	 }
        }
        else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}
        	 redirect(site_url('Welcome/DataPembelian'));
	}

	public function UpdateDataPembelian()
	{
		if($this->session->userdata('Cek') == "Kasir")
		{
			 $kd_pembelian=$this->input->post('txt_kd_pembelian');
				 $update['kd_tayang']= $this->input->post('txt_kd_tayang');
				 $update['tanggal_tayang']= $this->input->post('txt_tanggal_tayang');
	         	 $update['harga']= $this->input->post('txt_harga');
	         	 $update['pilih_kursi']= $this->input->post('txt_pilih_kursi');
	         	 $update['jumlah_kursi']= $this->input->post('txt_jumlah_kursi');
	     	     $update['tanggal_beli']= $this->input->post('txt_tanggal_beli');
	         	 $update['total']= $this->input->post('txt_total');
	         	 $update['bayar']= $this->input->post('txt_bayar');
	          	 $this->MSudi->UpdateData('tbl_pembelian','kd_pembelian',$kd_pembelian,$update);
			 redirect(site_url('Welcome/DataPembelian'));
		}
        else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));

			}
	}

	public function DeleteDataPembelian()
	{
		 $kd_pembelian=$this->uri->segment('3');
        	 $this->MSudi->DeleteData('tbl_pembelian','kd_pembelian',$kd_pembelian);
        	 redirect(site_url('Welcome/DataPembelian'));
	}
//akhir kodingan pembelian -----------------------------------------------------------

//awal kodingan struk -----------------------------------------------------------
	public function Struk($id)	
	{
		$kd_pembelian = $id;
			$onjoin = "qw_filmbelitayang1.kd_tayang = tbl_pembelian.kd_tayang";
			$tampil=$this->MSudi->filter('tbl_pembelian','qw_filmbelitayang1',$onjoin,'kd_pembelian',$kd_pembelian)->row();
					$data['detail']['kd_pembelian']= $tampil->kd_pembelian;
            		$data['detail']['kd_tayang']= $tampil->kd_tayang;
            		$data['detail']['judul_film']= $tampil->judul_film;
            		$data['detail']['tanggal_tayang']= $tampil->tanggal_tayang;
            		$data['detail']['nama_studio']= $tampil->nama_studio;
            		$data['detail']['harga']= $tampil->harga;
            		$data['detail']['pilih_kursi']= $tampil->pilih_kursi;
            		$data['detail']['jumlah_kursi']= $tampil->jumlah_kursi;
            		$data['detail']['total']= $tampil->total;
            		$data['detail']['bayar']= $tampil->bayar;
        
        $this->load->library('pdf');  		
		$this->load->view('Struk',$data);

	}
//akhir kodingan struk -----------------------------------------------------------

//awal kodingan dataUser -----------------------------------------------------------
	public function DataUser()
	{
		// sintax mulai session block
		if($this->session->userdata('Cek') == "Admin")
		{
		// sintax mulai session block
			if($this->uri->segment(4)=='view')
			{
				$kd_user=$this->uri->segment(3);
				$tampil=$this->MSudi->GetDataWhere('tbl_user','kd_user',$kd_user)->row();
					$data['detail']['kd_user']= $tampil->kd_user;
            		$data['detail']['username']= $tampil->username;
            		$data['detail']['password']= $tampil->password;
            		$data['detail']['hak_akses']= $tampil->hak_akses;
				$data['DataUser']=$this->MSudi->GetData('tbl_user');
				$data['content']='VFormUpdateUser';

			}
			else
			{	
				$data['DataUser']=$this->MSudi->GetData('tbl_user');
				$data['content']='VUser';
			}
			$this->load->view('VAdmin_page',$data);
		// sintax selesai session block
		}
		else
		{
			$this->session->sess_destroy();
			redirect(site_url('Login'));
		}
		// sintax selesai session block
	}

	public function VFormAddUser()
	{
		if($this->session->userdata('Cek') == "Admin")
		{
				$data['content']='VFormAddUser';
				$this->load->view('VAdmin_page',$data);
		}
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function AddDataUser()
	{
		if($this->session->userdata('Cek') == "Admin")
		{
			 $add['kd_user']=$this->input->post('txt_kd_user');
         	 $add['username']= $this->input->post('txt_username');
         	 $add['password']= md5($this->input->post('txt_password'));
         	 $add['hak_akses']= $this->input->post('txt_hak_akses');

        	 $this->MSudi->AddData('tbl_user',$add);
        	 redirect(site_url('Welcome/DataUser'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function UpdateDataUser()
	{
		if($this->session->userdata('Cek') == "Admin")
		{
		 $kd_user=$this->input->post('txt_kd_user');
         	 $update['username']= $this->input->post('txt_username');
         	 $update['password']= md5($this->input->post('txt_password'));
         	 $update['hak_akses']= $this->input->post('txt_hak_akses');

          	 $this->MSudi->UpdateData('tbl_user','kd_user',$kd_user,$update);
		 	 redirect(site_url('Welcome/DataUser'));
		  }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}

	public function DeleteDataUser($id)
	{
		if($this->session->userdata('Cek') == "Admin")
		{
			// $this->MSudi->DeleteData('tbl_film','kd_film',$kd_film);
		 	$kd_user=$id;
				$row['status_tampil'] = 1;
				$row['tanggal_delete'] = Date("Y-m-d");
				$row['user'] = $this->session->userdata('username');
				$this->MSudi->UpdateData("tbl_user","kd_user",$kd_user,$row);
        	 redirect(site_url('Welcome/DataUser'));
        }
			else
			{
				$this->session->sess_destroy();
				redirect(site_url('Login'));
			}	
	}
//akhir kodingan dataUser ----------------------------------------------------------

//awal kodingan laporan -----------------------------------------------------------
public function LaporanFilm()
{	
    if($this->session->userdata('Cek') == "Kasir")
	{
			
		$data['DataFilm']=$this->MSudi->GetData('tbl_film');
		$this->load->view('Laporan/LaporanFilm',$data);

	}
	else
	{
		$this->session->sess_destroy();
		redirect(site_url('Login'));
	}		
}

public function LaporanHargaFilm()
{	
    if($this->session->userdata('Cek') == "Kasir")
	{
		$onjoin = "tbl_film.kd_film = tbl_harga.kd_film";
		$data['listData']=$this->MSudi->GetDataJoin('tbl_harga','tbl_film',$onjoin);
		$this->load->view('Laporan/LaporanHargaFilm',$data);

	}
	else
	{
		$this->session->sess_destroy();
		redirect(site_url('Login'));
	}		
}

public function LaporanStudio()
{	
    if($this->session->userdata('Cek') == "Kasir")
	{
		$data['DataStudio']=$this->MSudi->GetData('tbl_studio');
		$this->load->view('Laporan/LaporanStudio',$data);

	}
	else
	{
		$this->session->sess_destroy();
		redirect(site_url('Login'));
	}		
}

public function LaporanTayang()
{	
    if($this->session->userdata('Cek') == "Kasir")
	{
		$onjoin = "tbl_film.kd_film = tbl_tayang.kd_film AND tbl_studio.kd_studio = tbl_tayang.kd_studio";
		$data['listData'] = $this->MSudi->GetData2Join('tbl_tayang','tbl_film','tbl_studio',$onjoin);
		$this->load->view('Laporan/LaporanTayang',$data);

	}
	else
	{
		$this->session->sess_destroy();
		redirect(site_url('Login'));
	}		
}

public function LaporanPembelian()
{	
    if($this->session->userdata('Cek') == "Kasir")
	{
		$onjoin = "qw_filmbelitayang1.kd_tayang = tbl_pembelian.kd_tayang";
		$data['listData'] = $this->MSudi->GetDataJoin('tbl_pembelian','qw_filmbelitayang1',$onjoin);
		$this->load->view('Laporan/LaporanPembelian',$data);

	}
	else
	{
		$this->session->sess_destroy();
		redirect(site_url('Login'));
	}		
}
//akhir kodingan laporan -----------------------------------------------------------

//awal kodingan layar -----------------------------------------------------------
public function Layar()
{
	$this->load->view('Layar');
	$this->load->view('script');
}

public function getTampilLayar()
{
	$data['data'] = $this->MSudi->GetDataLayar();
	if (@$data['data']->kd_tayang) 
	{
		$data['DataKursi']=$this->MSudi->DaftarKursi($data['data']->kd_tayang);
	}
	echo json_encode($data);
}
//akhir kodingan layar -----------------------------------------------------------

//awal kodingan Pendapatan -----------------------------------------------------------
public function Pendapatan()
	{
		$this->load->view('Pendapatan');
		$this->load->view('script');
	}

public function GetDataPendapatan()
	{
		$data['data'] = $this->MSudi->GetData('tbl_pembelian');
		echo json_encode($data);
	}
//akhir kodingan Pendapatan -----------------------------------------------------------

//awal kodingan logout -----------------------------------------------------------
	public function Logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect(site_url('Login'));
	}
//akhir kodingan logout -----------------------------------------------------------
}
