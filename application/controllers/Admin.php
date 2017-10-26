<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

<<<<<<< HEAD
=======
	protected function zerofill ($num, $zerofill)
	{
		return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
	}
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
	public function index()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$data;
<<<<<<< HEAD
			//title head
			$data['title']='Admin E-Vote | Login';
			//pesan berhasil
			$data['logout_berhasil'] = $this->session->flashdata('logout_berhasil');
			//pesan gagal
			$data['username_password_salah'] = $this->session->flashdata('username_password_salah');
			$this->load->view('admin/v_loginadmin', $data);
=======
		//title head
			$data['title']='Login | MAU-MBI Amanatul Ummah Surabaya';
		//pesan berhasil
			$data['logout_berhasil'] = $this->session->flashdata('logout_berhasil');
		//pesan gagal
			$data['username_email_password_salah'] = $this->session->flashdata('username_email_password_salah');

			$this->load->view('admin/v_login', $data);
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		}
		else
		{
			$this->load->helper('url');
			redirect('admin/datapemilih','location');
		}  
	}

	//fungsi untuk login
	public function login()
	{
		$this->load->model('Ev_admin');
		$this->Ev_admin->setUsername($this->input->post('inputUsername'));
		$this->Ev_admin->setPassword(md5($this->input->post('inputPassword')));

<<<<<<< HEAD
		$query = $this->Ev_admin->getAdmin();
=======
		$this->load->model('M_admin');
		$this->M_admin->setUsername($this->input->post('inputUserEmail'));
		$this->M_admin->setEmail($this->input->post('inputUserEmail'));
		$this->M_admin->setPassword(md5($this->input->post('inputPassword')));
		
		$query = $this->M_admin->getAdmin();
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		if ($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$newdata = array(
					'username' => $row->username,
					'loginadmin' => TRUE
					);
				$this->session->set_userdata($newdata);
			}
						//notifikasi login
			//$query = $this->Alumni->setNotificationLogin();
						//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
			$this->load->helper('url');
			redirect('admin','location');
		}
		else 
		{
			$this->session->set_flashdata('username_password_salah','Maaf ! Username & Password Anda Salah');
			//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
			$this->load->helper('url');
			redirect('admin','location');
		}
	}

	public function logout()
	{
		$login = $this->session->userdata('loginadmin');
		$this->session->unset_userdata('loginadmin');
		$this->session->set_flashdata('logout_berhasil','Anda berhasil logout');
<<<<<<< HEAD
		$this->load->helper('url');
		redirect('admin','refresh');
=======
			//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
		$this->load->helper('url');
		redirect('admin','referesh');
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
	}

	public function dataPemilih()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$data['title'] = 'Admin Evote | Data Pemilih';
			//notifikasi berhasil
			$data['reset_suara_berhasil'] = $this->session->flashdata('reset_suara_berhasil');
			$data['hapus_data_berhasil'] = $this->session->flashdata('hapus_data_berhasil');
			$data['tambah_data_berhasil'] = $this->session->flashdata('tambah_data_berhasil');
			//notifikasi gagal
			$data['password2nd_salah'] = $this->session->flashdata('password2nd_salah');
			$this->load->model('Ev_pemilih');
			$data['jumlahpemilih'] = $this->Ev_pemilih->getJumlahPemilih();
			$data['jumlahpemilihvoting'] = $this->Ev_pemilih->getJumlahPemilihVoting();
			$data['jumlahpemilihbelumvoting'] = $this->Ev_pemilih->getJumlahPemilihBelumVoting();
			$this->load->view('admin/v_datapemilih', $data);
=======
			$data="";
			$this->load->model('M_calonsiswa');
			$this->load->model('M_referensi');
			$this->load->model('M_log');

			//title head
			$data['title']='Dashboard | PSB MAU-MBI Amanatul Ummah Surabaya';
			//session nama lengkap
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			
			//tahunmasuk aktif
			$data['tahunmasukaktif'] = $this->M_referensi->getTahunMasukAktif();
			$tahunmasukaktif = $data['tahunmasukaktif'];
			$this->M_calonsiswa->setTahunMasuk($tahunmasukaktif);

			$data['jumlahpsb'] = $this->M_calonsiswa->getJumlahPSB();
			$data['jumlahlakilaki'] = $this->M_calonsiswa->getJumlahLakiLaki();
			$data['jumlahperempuan'] = $this->M_calonsiswa->getJumlahPerempuan();
			//grafik psb per lembaga
			$data['psbmau'] = $this->M_calonsiswa->getPSBMAU();
			$data['psbmbi'] = $this->M_calonsiswa->getPSBMBI();

			//grafik psb per kelompok tiap lembaga
			//mau
			$this->M_calonsiswa->setLembaga('MA Unggulan Amanatul Ummah');
			$this->M_calonsiswa->setKelompok('Gelombang 1');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
				foreach ($query->result() as $row)
					$data['kelompok1mau'] = $row->kelompoklembaga;
			}
			
			$this->M_calonsiswa->setKelompok('Gelombang 2');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
				foreach ($query->result() as $row)
					$data['kelompok2mau'] = $row->kelompoklembaga;
			}	
			
			//mbi
			$this->M_calonsiswa->setLembaga('MBI Amanatul Ummah');
			$this->M_calonsiswa->setKelompok('Gelombang 1');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
				foreach ($query->result() as $row)
					$data['kelompok1mbi'] = $row->kelompoklembaga;
			}
			
			$this->M_calonsiswa->setKelompok('Gelombang 2');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
				foreach ($query->result() as $row)
					$data['kelompok2mbi'] = $row->kelompoklembaga;
			}	

			//Jumlah Login Sistem sampai saat ini
			$query = $this->M_log->getAllCountLogin();
			if ($query->num_rows()>0){
				foreach ($query->result() as $row)
					$data['jumlahlogin'] = $row->jumlahlogin;
			}	
			
			//grafik pengunjung login tiap hari
			$data['pengunjunglogin'] = $this->M_log->getCountVisitorLogin();

			$this->load->view('admin/v_dashboard', $data);
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		}
	}

	public function doTambahPemilih()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$this->load->model('Ev_pemilih');
			$jumlahdatapemilih = $this->input->post('inputDataPemilih');
			for ($i = 0; $i < $jumlahdatapemilih; $i++) {
				$this->Ev_pemilih->setPassword($this->generateRandomString());
				$this->Ev_pemilih->setNoUrut('NULL');
				$this->Ev_pemilih->setStatus('0');
				$query = $this->Ev_pemilih->addPemilih();
=======
			$data="";
			//title head
			$data['title'] = 'Data Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin

			//notifikasi
			$data['tambah_calonsiswa_berhasil'] = $this->session->flashdata('tambah_calonsiswa_berhasil');
			$data['hapus_siswa_berhasil'] = $this->session->flashdata('hapus_siswa_berhasil');
			$data['update_datasiswa_berhasil'] = $this->session->flashdata('update_datasiswa_berhasil');

			//gagal upload foto
			$data['upload_foto_gagal'] = $this->session->flashdata('upload_foto_gagal');

			$this->load->model('M_referensi');
			$this->load->model('M_calonsiswa');

			$data['_lembaga'] = $this->M_referensi->getLembaga();
			$lembaga = $this->input->get('lembaga');

			$queryproses = $this->M_referensi->getProsesPenerimaanAktif($lembaga);
			if($queryproses->num_rows()>0)
			{
				foreach ($queryproses->result() as $row) {
					$data['idprosespenerimaan'] = $row->idprosespenerimaan;
					$data['proses'] = $row->proses;
				}
			}
			$data['_kelompok'] = $this->M_referensi->getKelompok('1');
			$data['_tahunmasuk'] = $this->M_referensi->getTahunMasuk($lembaga);
			
			$data['status'] = 0;

			if (($data['_kelompok']->num_rows()>0) && ($queryproses->num_rows()>0)){
				$this->load->view('admin/ajax/ajax_select_datasiswa', $data);
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
			}
			$this->session->set_flashdata('tambah_data_berhasil', 'Anda berhasil menambah data pemilih !');

			redirect('admin/datapemilih', 'location');
		}
	}

	protected function generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function doCetakExcel()
	{
		$this->load->library('session');
		$this->load->library("PHPExcel");
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$this->load->model('Ev_pemilih');
			$data['datapemilih'] = $this->Ev_pemilih->getDataPemilih();
			$this->load->view('admin/v_cetakexcel', $data);
		}
	}

	public function doResetSuara()
	{
		$this->load->library('session');
=======
			$data="";

			//title head
			$data['title'] = 'Tambah Calon Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';

			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin

			$this->load->model('M_referensi');

			$data['_lembaga'] = $this->M_referensi->getLembaga();
			$lembaga = $this->input->get('lembaga'); 

			$queryproses = $this->M_referensi->getProsesPenerimaanAktif($lembaga);
			if($queryproses->num_rows()>0)
			{
				foreach ($queryproses->result() as $row) {
					$data['idprosespenerimaan'] = $row->idprosespenerimaan;
					$data['proses'] = $row->proses;
				}
			}

			$data['_kelompok'] = $this->M_referensi->getKelompok('1');
			$data['_tahunmasuk'] = $this->M_referensi->getTahunMasuk($lembaga);

			$data['_agama'] = $this->M_referensi->getAgama();
			$data['_pekerjaan'] = $this->M_referensi->getPekerjaan();
			$data['_kondisi'] = $this->M_referensi->getKondisi();
			$data['_penghasilan'] = $this->M_referensi->getPenghasilan();
			$data['_statusortu'] = $this->M_referensi->getStatusOrtu();
			$data['_suku'] = $this->M_referensi->getSuku();
			$data['_pendidikan'] = $this->M_referensi->getPendidikan();


			if (($data['_kelompok']->num_rows()>0) && ($queryproses->num_rows()>0))
				$this->load->view('admin/ajax/ajax_select_formsiswa', $data);
			else
				$this->load->view('admin/v_tambahcalonsiswa', $data);
		}
	}

	protected function do_unggahfoto($nopendaftaran)
	{
		    //$this->load->model('M_calonsiswa');
		$nama = $this->input->post('inputNama');

		$namaedit =  str_replace(" ", "_", $nama);

			//UPLOAD FOTO
		$this->load->library('upload');
	        $namafile = $nopendaftaran.'-'.$namaedit.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
	        $path = './assets/profpic/';
	        $config['upload_path'] = $path; //path folder
	        $config['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
	        $config['max_size'] = '1048'; //maksimum besar file 1M
	        $config['max_width']  = '450'; //lebar maksimum 400 px
	        $config['max_height']  = '650'; //tinggi maksimu 600 px
	        $config['file_name'] = $namafile; //nama yang terupload nantinya

	        $this->upload->initialize($config);

	        if(!empty($_FILES['fileFoto']['name']))
	        {
	        	if ($this->upload->do_upload('fileFoto'))
	        	{
	        		$this->upload->data();
	        		$linkfoto = $namafile.'.jpg';
	        		$data['linkfoto'] = $this->M_calonsiswa->setLinkFoto($linkfoto);

	        	}else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	        		$this->session->set_flashdata("upload_foto_gagal", "Format atau Ukuran Foto Tidak Sesuai");
	        	}
	        }
	        else{
	        	$data['foto'] = $this->M_calonsiswa->getFotoFromAdmin($nopendaftaran);
	        	$linkfoto = $data['foto'];
	        	$data['linkfoto'] = $this->M_calonsiswa->setLinkFoto($linkfoto);
	        }	

	        //END UPLOAD FOTO
	    } 

	    public function do_tambahcalonsiswa()
	    {
	    	$this->load->library('session');
	    	$login = $this->session->userdata('loginadmin');
	    	if ($login==false)
	    	{
	    		$this->load->helper('url');
	    		redirect('admin','location');
	    	}
	    	else
	    	{
	    		$this->load->model('M_calonsiswa');

			//input penerimaan calon siswa		
	    		$this->M_calonsiswa->setLembaga($this->input->post('inputLembaga'));
	    		$this->M_calonsiswa->setKelompok($this->input->post('inputKelompok'));
	    		$this->M_calonsiswa->setTahunMasuk($this->input->post('inputTahunMasuk'));

			//input data diri calon siswa
	    		$this->M_calonsiswa->setNISN($this->input->post('inputNISN'));
	    		$this->M_calonsiswa->setNIK($this->input->post('inputNIK'));
	    		$this->M_calonsiswa->setNoUN($this->input->post('inputNoUN'));
	    		$this->M_calonsiswa->setNama($this->input->post('inputNama'));
	    		$this->M_calonsiswa->setPanggilan($this->input->post('inputPanggilan'));
	    		$this->M_calonsiswa->setJenisKelamin($this->input->post('inputJenisKelamin'));
	    		$this->M_calonsiswa->setTempatLahir($this->input->post('inputTempatLahir'));

	    		$this->M_calonsiswa->setTanggalLahir($this->input->post('inputTanggalLahir'));
	    		$this->M_calonsiswa->setAgama($this->input->post('inputAgama'));
	    		$this->M_calonsiswa->setSuku($this->input->post('inputSuku'));
	    		$this->M_calonsiswa->setKondisi($this->input->post('inputKondisi'));
	    		$this->M_calonsiswa->setKewarganegaraan($this->input->post('inputKewarganegaraan'));
	    		$this->M_calonsiswa->setAnakKe($this->input->post('inputAnakKe'));
	    		$this->M_calonsiswa->setJumlahSaudara($this->input->post('inputJumlahSaudara'));

	    		$this->M_calonsiswa->setAlamatSiswa($this->input->post('inputAlamatSiswa'));
	    		$this->M_calonsiswa->setDesa($this->input->post('inputDesa'));
	    		$this->M_calonsiswa->setRT($this->input->post('inputRT'));
	    		$this->M_calonsiswa->setRW($this->input->post('inputRW'));
	    		$this->M_calonsiswa->setKecamatan($this->input->post('inputKecamatan'));
	    		$this->M_calonsiswa->setKota($this->input->post('inputKota'));
	    		$this->M_calonsiswa->setProvinsi($this->input->post('inputProvinsi'));
	    		$this->M_calonsiswa->setKodePos($this->input->post('inputKodePos'));
	    		$this->M_calonsiswa->setJarak($this->input->post('inputJarak'));
	    		$this->M_calonsiswa->setHPSiswa($this->input->post('inputHPSiswa'));
	    		$this->M_calonsiswa->setEmailSiswa($this->input->post('inputEmailSiswa'));
	    		$this->M_calonsiswa->setAsalSekolah($this->input->post('inputAsalSekolah'));
	    		$this->M_calonsiswa->setNoIjasah($this->input->post('inputNoIjasah'));
	    		$this->M_calonsiswa->setTanggalIjasah($this->input->post('inputTanggalIjasah'));
	    		$this->M_calonsiswa->setKeteranganSekolah($this->input->post('inputKeteranganSekolah'));

			//input fisik calon siswa
	    		$this->M_calonsiswa->setDarah($this->input->post('inputDarah'));
	    		$this->M_calonsiswa->setBerat($this->input->post('inputBerat'));
	    		$this->M_calonsiswa->setTinggi($this->input->post('inputTinggi'));
	    		$this->M_calonsiswa->setUkuranSepatu($this->input->post('inputUkuranSepatu'));
	    		$this->M_calonsiswa->setUkuranBaju($this->input->post('inputUkuranBaju'));
	    		$this->M_calonsiswa->setUkuranCelana($this->input->post('inputUkuranCelana'));
	    		$this->M_calonsiswa->setKesehatan($this->input->post('inputKesehatan'));
	    		$this->M_calonsiswa->setHobi($this->input->post('inputHobi'));

			//input data orang tua
	    		$this->M_calonsiswa->setNamaAyah($this->input->post('inputNamaAyah'));
	    		$this->M_calonsiswa->setNamaIbu($this->input->post('inputNamaIbu'));
	    		$this->M_calonsiswa->setAlmAyah($this->input->post('inputAlmAyah'));
	    		$this->M_calonsiswa->setAlmIbu($this->input->post('inputAlmIbu'));
	    		$this->M_calonsiswa->setStatusAyah($this->input->post('inputStatusAyah'));
	    		$this->M_calonsiswa->setStatusIbu($this->input->post('inputStatusIbu'));
	    		$this->M_calonsiswa->setTempatLahirAyah($this->input->post('inputTempatLahirAyah'));
	    		$this->M_calonsiswa->setTempatLahirIbu($this->input->post('inputTempatLahirIbu'));

	    		$this->M_calonsiswa->setTanggalLahirAyah($this->input->post('inputTanggalLahirAyah'));
	    		$this->M_calonsiswa->setTanggalLahirIbu($this->input->post('inputTanggalLahirIbu'));
	    		$this->M_calonsiswa->setPendidikanAyah($this->input->post('inputPendidikanAyah'));
	    		$this->M_calonsiswa->setPendidikanIbu($this->input->post('inputPendidikanIbu'));
	    		$this->M_calonsiswa->setPekerjaanAyah($this->input->post('inputPekerjaanAyah'));
	    		$this->M_calonsiswa->setPekerjaanIbu($this->input->post('inputPekerjaanIbu'));

	    		$this->M_calonsiswa->setPenghasilanAyah($this->input->post('inputPenghasilanAyah'));
	    		$this->M_calonsiswa->setPenghasilanIbu($this->input->post('inputPenghasilanIbu'));
	    		$this->M_calonsiswa->setEmailAyah($this->input->post('inputEmailAyah'));
	    		$this->M_calonsiswa->setEmailIbu($this->input->post('inputEmailIbu'));
	    		$this->M_calonsiswa->setAlamatOrtu($this->input->post('inputAlamatOrtu'));
	    		$this->M_calonsiswa->setHPOrtu($this->input->post('inputHPOrtu'));

	    		$this->M_calonsiswa->setPrestasi($this->input->post('inputPrestasi'));

	    		$this->M_calonsiswa->setBinSmt1($this->input->post('inputBinSmt1'));
	    		$this->M_calonsiswa->setBinSmt2($this->input->post('inputBinSmt2'));
	    		$this->M_calonsiswa->setBinSmt3($this->input->post('inputBinSmt3'));
	    		$this->M_calonsiswa->setBinSmt4($this->input->post('inputBinSmt4'));
	    		$this->M_calonsiswa->setBinSmt5($this->input->post('inputBinSmt5'));
	    		$this->M_calonsiswa->setBingSmt1($this->input->post('inputBingSmt1'));
	    		$this->M_calonsiswa->setBingSmt2($this->input->post('inputBingSmt2'));
	    		$this->M_calonsiswa->setBingSmt3($this->input->post('inputBingSmt3'));
	    		$this->M_calonsiswa->setBingSmt4($this->input->post('inputBingSmt4'));
	    		$this->M_calonsiswa->setBingSmt5($this->input->post('inputBingSmt5'));
	    		$this->M_calonsiswa->setMatSmt1($this->input->post('inputMatSmt1'));
	    		$this->M_calonsiswa->setMatSmt2($this->input->post('inputMatSmt2'));
	    		$this->M_calonsiswa->setMatSmt3($this->input->post('inputMatSmt3'));
	    		$this->M_calonsiswa->setMatSmt4($this->input->post('inputMatSmt4'));
	    		$this->M_calonsiswa->setMatSmt5($this->input->post('inputMatSmt5'));
	    		$this->M_calonsiswa->setIpaSmt1($this->input->post('inputIpaSmt1'));
	    		$this->M_calonsiswa->setIpaSmt2($this->input->post('inputIpaSmt2'));
	    		$this->M_calonsiswa->setIpaSmt3($this->input->post('inputIpaSmt3'));
	    		$this->M_calonsiswa->setIpaSmt4($this->input->post('inputIpaSmt4'));
	    		$this->M_calonsiswa->setIpaSmt5($this->input->post('inputIpaSmt5'));
	    		$this->M_calonsiswa->setIpsSmt1($this->input->post('inputIpsSmt1'));
	    		$this->M_calonsiswa->setIpsSmt2($this->input->post('inputIpsSmt2'));
	    		$this->M_calonsiswa->setIpsSmt3($this->input->post('inputIpsSmt3'));
	    		$this->M_calonsiswa->setIpsSmt4($this->input->post('inputIpsSmt4'));
	    		$this->M_calonsiswa->setIpsSmt5($this->input->post('inputIpsSmt5'));
	    		$this->M_calonsiswa->setAgamaSmt1($this->input->post('inputAgamaSmt1'));
	    		$this->M_calonsiswa->setAgamaSmt2($this->input->post('inputAgamaSmt2'));
	    		$this->M_calonsiswa->setAgamaSmt3($this->input->post('inputAgamaSmt3'));
	    		$this->M_calonsiswa->setAgamaSmt4($this->input->post('inputAgamaSmt4'));
	    		$this->M_calonsiswa->setAgamaSmt5($this->input->post('inputAgamaSmt5'));
	    		$this->M_calonsiswa->setPpknSmt1($this->input->post('inputPpknSmt1'));
	    		$this->M_calonsiswa->setPpknSmt2($this->input->post('inputPpknSmt2'));
	    		$this->M_calonsiswa->setPpknSmt3($this->input->post('inputPpknSmt3'));
	    		$this->M_calonsiswa->setPpknSmt4($this->input->post('inputPpknSmt4'));
	    		$this->M_calonsiswa->setPpknSmt5($this->input->post('inputPpknSmt5'));
	    		$this->M_calonsiswa->setPenjasSmt1($this->input->post('inputPenjasSmt1'));
	    		$this->M_calonsiswa->setPenjasSmt2($this->input->post('inputPenjasSmt2'));
	    		$this->M_calonsiswa->setPenjasSmt3($this->input->post('inputPenjasSmt3'));
	    		$this->M_calonsiswa->setPenjasSmt4($this->input->post('inputPenjasSmt4'));
	    		$this->M_calonsiswa->setPenjasSmt5($this->input->post('inputPenjasSmt5'));
	    		$this->M_calonsiswa->setSeniSmt1($this->input->post('inputSeniSmt1'));
	    		$this->M_calonsiswa->setSeniSmt2($this->input->post('inputSeniSmt2'));
	    		$this->M_calonsiswa->setSeniSmt3($this->input->post('inputSeniSmt3'));
	    		$this->M_calonsiswa->setSeniSmt4($this->input->post('inputSeniSmt4'));
	    		$this->M_calonsiswa->setSeniSmt5($this->input->post('inputSeniSmt5'));

	    		if ($this->input->post('inputLembaga')=='MA Unggulan Amanatul Ummah')
	    		{
	    			$data['psbmau'] = $this->M_calonsiswa->getPSBMAU();
	    			$nomorpsb = $this->zerofill($data['psbmau']+1, 3);
	    			$lembaga = 'MAU';
	    		}
	    		if ($this->input->post('inputLembaga')=='MBI Amanatul Ummah')
	    		{
	    			$data['psbmbi'] = $this->M_calonsiswa->getPSBMBI();
	    			$nomorpsb = $this->zerofill($data['psbmbi']+1, 3);
	    			$lembaga = 'MBI';
	    		}
	    		if ($this->input->post('inputKelompok')=='Gelombang 1')
	    			$urutkelompok = 'G1';
	    		if ($this->input->post('inputKelompok')=='Gelombang 2')
	    			$urutkelompok = 'G2';
	    		if ($this->input->post('inputKelompok')=='Gelombang 3')
	    			$urutkelompok = 'G3';
	    		if ($this->input->post('inputKelompok')=='Prestasi')
	    			$urutkelompok = 'P1';

	    		$tahunmasuk = SUBSTR($this->input->post('inputTahunMasuk'), 2);
			$nopendaftaran = 'PSB'.$lembaga.$urutkelompok.$tahunmasuk.$nomorpsb;  //belum ada nomor pendaftaran
			$this->M_calonsiswa->setNoPendaftaran($nopendaftaran);	

			$this->do_unggahfoto($nopendaftaran); //unggah foto

			$query = $this->M_calonsiswa->addCalonSiswaFromAdmin();

			$this->session->set_flashdata('tambah_calonsiswa_berhasil','Anda berhasil menambah data calon siswa');
			$this->load->helper('url');
			redirect('admin/datasiswa','location');
		}

	}

	public function do_cetakexcel()
	{
		$this->load->library('session');
		$this->load->library("PHPExcel");
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$this->load->model('Ev_pemilih');
			$this->load->model('Ev_admin');

			$this->Ev_admin->setPassword2nd($this->input->post('inputPassword2nd'));
			$query = $this->Ev_admin->getPassword2nd();

			if($query->num_rows() > 0)
			{
				$this->Ev_pemilih->resetSuara();
				$this->session->set_flashdata('reset_suara_berhasil', 'Anda berhasil mereset seluruh suara data pemilih !');
				redirect('admin/datapemilih', 'location');
			}
			else
			{
				$this->session->set_flashdata('password2nd_salah', 'Maaf! 2nd Password anda salah, Silahkan coba lagi');
				redirect('admin/datapemilih', 'location');
			}
=======
			$this->load->model('M_calonsiswa');
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
			
		}
	}

	public function doHapusDataPemilih()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$this->load->model('Ev_pemilih');
			$this->load->model('Ev_admin');
			$this->Ev_admin->setPassword2nd($this->input->post('inputPassword2nd'));
			$query = $this->Ev_admin->getPassword2nd();
=======
			$data="";

			//title head
			$data['title'] = 'Update Calon Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';

			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
>>>>>>> 023b1edb67d4709724da4de37634675374c78491

			if($query->num_rows() > 0)
			{
				$this->Ev_pemilih->deleteDataPemilih();
				$this->session->set_flashdata('hapus_data_berhasil', 'Anda berhasil menghapus seluruh data pemilih !');
				redirect('admin/datapemilih', 'location');
			}
<<<<<<< HEAD
			else
=======

			$data['_kelompok'] = $this->M_referensi->getKelompok('1');
			$data['_tahunmasuk'] = $this->M_referensi->getTahunMasuk($lembaga);

			$data['_agama'] = $this->M_referensi->getAgama();
			$data['_pekerjaan'] = $this->M_referensi->getPekerjaan();
			$data['_kondisi'] = $this->M_referensi->getKondisi();
			$data['_penghasilan'] = $this->M_referensi->getPenghasilan();
			$data['_statusortu'] = $this->M_referensi->getStatusOrtu();
			$data['_suku'] = $this->M_referensi->getSuku();
			$data['_pendidikan'] = $this->M_referensi->getPendidikan();

			$this->load->model('M_calonsiswa');
			$this->M_calonsiswa->setNoPendaftaran($nopendaftaran);

			$query = $this->M_calonsiswa->getCalonSiswaByNoPendaftaran();
			
			if ($query->num_rows()>0)
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
			{
				$this->session->set_flashdata('password2nd_salah', 'Maaf! 2nd Password anda salah, Silahkan coba lagi');
				redirect('admin/datapemilih', 'location');
			}
		}
	}

	public function calonKetua()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data['title'] = 'Admin Evote | Calon Ketua';
			//notifikasi berhasil
			$data['tambah_calonketua_berhasil'] = $this->session->flashdata('tambah_calonketua_berhasil');
			$data['hapus_berhasil'] = $this->session->flashdata("hapus_berhasil");
			$data['update_berhasil'] = $this->session->flashdata("update_berhasil");
			//notifikasi gagal
			$data['nourut_sudah_dipakai'] = $this->session->flashdata('nourut_sudah_dipakai');
			$data['upload_foto_gagal'] = $this->session->flashdata("upload_foto_gagal");

			$this->load->model('Ev_calonketua');
			$data['query'] = $this->Ev_calonketua->getCalonKetua();
			$this->load->view('admin/v_calonketua', $data);
		}
	}

	public function doTambahCalonKetua()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('Ev_calonketua');
			$this->Ev_calonketua->setNoUrut($this->input->post('inputNoUrut'));
			$query = $this->Ev_calonketua->getNoUrut();
			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('nourut_sudah_dipakai', 'Maaf! Nomor urut sudah dipakai');
				redirect('admin/calonketua', 'location');
			}
			$nama = $this->input->post('inputNama');
			$this->Ev_calonketua->setNama($nama);
			$this->doUnggahFoto($nama); // unggah foto

			$query = $this->Ev_calonketua->addCalonKetua();
			$this->session->set_flashdata('tambah_calonketua_berhasil', 'Anda berhasil menambah calon ketua');
			redirect('admin/calonketua', 'location');
		}
	}

	protected function doUnggahFoto($nama)
	{
			$data = "";
			$namaedit =  str_replace(" ", "_", $nama); //agar spasi diganti dengan underscore
			//UPLOAD FOTO
			$this->load->library('upload');
			$path = './assets/profpic/';
	        $config['upload_path'] = $path; //path folder
	        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	        $config['max_size'] = '1048'; //maksimum besar file 1M
	        $config['max_width']  = '450'; //lebar maksimum 400 px
	        $config['max_height']  = '650'; //tinggi maksimu 600 px
	        $config['file_name'] = $namaedit; //nama yang terupload nantinya

	        $this->upload->initialize($config); 
	        if(!empty($_FILES['fileFoto']['name']))
	        {
	        	if ($this->upload->do_upload('fileFoto'))
	        	{
	        		$this->Ev_calonketua->setFoto($this->upload->data('file_name'));

	        	}else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	        		$this->session->set_flashdata("upload_foto_gagal", "Format atau Ukuran Foto Tidak Sesuai");
	               redirect('admin/calonketua', 'location'); //jika gagal maka akan ditampilkan form upload
	           }
	       }
	       else{
	        	$data['foto'] = $this->Ev_calonketua->getFoto(); //mengambil foto yang lama
	        	$foto = $data['foto'];
	        	$this->Ev_calonketua->setFoto($foto);
	        }	
	    }

	    public function doHapusCalonKetua($idcalonketua)
	    {
	    	$this->load->library('session');
	    	$login = $this->session->userdata('loginadmin');
	    	if ($login==false)
	    	{
	    		$this->load->helper('url');
	    		redirect('admin','location');
	    	}
	    	else
	    	{
	    		$this->load->model('Ev_calonketua');
	    		$this->Ev_calonketua->setIdCalonKetua($idcalonketua);
	    		$query = $this->Ev_calonketua->deleteCalonKetua();
	    		$this->session->set_flashdata("hapus_berhasil", "Anda berhasil menghapus calon ketua");
	    		redirect('admin/calonketua', 'location');
	    	}
	    }

	    public function doEditCalonKetua($idcalonketua)
	    {
	    	$this->load->library('session');
	    	$login = $this->session->userdata('loginadmin');
	    	if ($login==false)
	    	{
	    		$this->load->helper('url');
	    		redirect('admin','location');
	    	}
	    	else
	    	{
	    		$this->load->model('Ev_calonketua');
	    		$this->Ev_calonketua->setIdCalonKetua($idcalonketua);
	    		$this->Ev_calonketua->setNoUrut($this->input->post('inputNoUrut'));

	    		$nama = $this->input->post('inputNama');
	    		$this->Ev_calonketua->setNama($nama);
			$this->doUnggahFoto($nama); // unggah foto
			$query = $this->Ev_calonketua->updateCalonKetua();
			$this->session->set_flashdata("update_berhasil", "Anda berhasil mengedit calon ketua");
			redirect('admin/calonketua', 'location');
		}
	}

	public function hasilVoting()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data['title'] = 'Admin Evote | Hasil Voting';
			//notifikasi
			$data['password2nd_salah'] = $this->session->flashdata('password2nd_salah');
			$this->load->view('admin/v_hasilvoting', $data);
		}
	}

	public function doHasilVoting()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('Ev_pemilih');
			$this->load->model('Ev_admin');
			$this->Ev_admin->setPassword2nd($this->input->post('inputPassword2nd'));
			$query = $this->Ev_admin->getPassword2nd();

<<<<<<< HEAD
			if($query->num_rows() > 0)
			{
				redirect('admin/hitunghasilvoting', 'location');
			}
			else
			{
				$this->session->set_flashdata('password2nd_salah', 'Maaf! 2nd Password anda salah, Silahkan coba lagi');
				redirect('admin/hasilvoting', 'location');
			}
			
		}
	}

	public function doGrafikVoting()
=======
			$data="";
			//title head
			$data['title']='Cari Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin

			$this->load->view('admin/v_pencariansiswa', $data);
		}
	}

	public function referensipsb()
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$this->load->model('Ev_pemilih');
			$this->load->model('Ev_admin');
			$this->Ev_admin->setPassword2nd($this->input->post('inputPassword2nd'));
			$query = $this->Ev_admin->getPassword2nd();
			if($query->num_rows() > 0)
			{
				redirect('admin/grafikvoting', 'location');
			}
			else
			{
				$this->session->set_flashdata('password2nd_salah', 'Maaf! 2nd Password anda salah, Silahkan coba lagi');
				redirect('admin/hasilvoting', 'location');
			}
=======
			$data="";

			//title head
			$data['title']='Referensi | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin

			$this->load->view('admin/v_referensipsb', $data);
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		}
	}

	public function grafikVoting()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$data['title'] = 'Grafik Perolehan Hasil Voting';
			$this->load->model('Ev_pemilih');	
			$data['jumlahvoting'] = $this->Ev_pemilih->getCountVoting();


			$data['jumlahpemilihvoting'] = $this->Ev_pemilih->getJumlahPemilihVoting();
			$data['jumlahpemilihbelumvoting'] = $this->Ev_pemilih->getJumlahPemilihBelumVoting();
			$data['jumlahpemilih'] = $this->Ev_pemilih->getJumlahPemilih();

			$this->load->view('admin/v_grafikvoting', $data);
=======
			$data="";

			//title head
			$data['title']='Referensi Lembaga | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['tambah_lembaga_berhasil'] = $this->session->flashdata('tambah_lembaga_berhasil');
			$data['hapus_lembaga_berhasil'] = $this->session->flashdata('hapus_lembaga_berhasil');
			$data['update_lembaga_berhasil'] = $this->session->flashdata('update_lembaga_berhasil');
			$data['urutan_sudah_ada'] = $this->session->flashdata('urutan_sudah_ada');

			$this->load->model('M_referensi');
			$data['query'] = $this->M_referensi->getAllLembaga();

			$this->load->view('admin/v_reflembaga', $data);
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		}
	}

	public function hitungHasilVoting()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$data['title'] = 'Hitung Hasil Voting';
			$this->load->model('Ev_pemilih');
			$this->load->model('Ev_calonketua');
			


			$data['query'] = $this->Ev_calonketua->getCalonKetua();
			$data['jumlahcalonketua'] = $this->Ev_calonketua->getJumlahCalonKetua();

			$data['md'] = 12/$data['jumlahcalonketua'];

			//get ev_editor
			$this->load->model('Ev_editor');
			$query = $this->Ev_editor->getEditor();
			if($query->num_rows()>0)
			{
				foreach($query->result() as $row)
				{
					$data['judul'] = $row->judul;
					$data['logo'] = $row->logo;
				}
			}
			$data['jumlahvoting'] = $this->Ev_pemilih->getCountVoting();


			$this->load->view('admin/v_hitunghasilvoting', $data);
=======
			$data="";
			//menu active
			$this->load->model('M_referensi');
			$this->M_referensi->setLembaga($this->input->post('inputLembaga'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$queryurutan = $this->M_referensi->getUrutanLembaga();
			if($queryurutan->num_rows() > 0)
			{
				$this->session->set_flashdata('urutan_sudah_ada', 'Maaf ! nomor urut sudah dipakai, silahkan mengganti nomor urut');
				redirect('admin/referensi_lembaga', 'location');
			}
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			$this->M_referensi->addLembaga();
			$this->session->set_flashdata('tambah_lembaga_berhasil', 'Anda berhasil menambahkan lembaga, Silahkan aktifasi lembaga');
			redirect('admin/referensi_lembaga', 'location');
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		}
	}

	public function pengaturan()
	{
		$this->load->library('session');
		$useradmin = $this->session->userdata('username');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data['title'] = 'Admin Evote | Pengaturan';
			//notifikasi berhasil
			$data['update_admin_berhasil'] = $this->session->flashdata('update_admin_berhasil');
			$data['update_editor_berhasil'] = $this->session->flashdata("update_editor_berhasil");
			//notifikasi gagal
			$data['password_konfirmasi_beda'] = $this->session->flashdata('password_konfirmasi_beda');
			$data['password2nd_lama_salah'] = $this->session->flashdata("password2nd_lama_salah");
			$data['upload_logo_gagal'] = $this->session->flashdata("upload_logo_gagal");

			$this->load->model('Ev_admin');	
			$this->Ev_admin->setUsername($useradmin);
			$query = $this->Ev_admin->getAdminByUsername();
			if($query->num_rows()>0)
			{
				foreach($query->result() as $row)
				{
					$data['username'] = $row->username;
					$data['password'] = $row->password;
					$data['password2nd'] = $row->password2nd;
				}
			}

			//get ev_editor
			$this->load->model('Ev_editor');
			$query = $this->Ev_editor->getEditor();
			if($query->num_rows()>0)
			{
				foreach($query->result() as $row)
				{
					$data['judul'] = $row->judul;
					$data['logo'] = $row->logo;
				}
			}

			$this->load->view('admin/v_pengaturan', $data);
		}
	}


	public function doUpdateAdmin()
	{
		$this->load->library('session');
		$username = $this->session->userdata('username');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('Ev_admin');				
			$this->Ev_admin->setUsername($username);
			$password = $this->input->post('inputPassword');
			$konfirmasi = $this->input->post('inputKonfirmasiPassword');

			if($password != $konfirmasi)
			{
				$this->session->set_flashdata("password_konfirmasi_beda", "Maaf ! Password & konfirmasi password tidak sama");
				redirect('admin/pengaturan', 'location');
			}
			$this->Ev_admin->setPassword($password);
			$query = $this->Ev_admin->updatePassword();
			$this->session->set_flashdata("update_admin_berhasil", "Anda berhasil mengubah password admin");
			redirect('admin/pengaturan', 'location');
		}
	}
	public function doUpdate2ndPassword()
	{
		$this->load->library('session');
		$username = $this->session->userdata('username');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
<<<<<<< HEAD
			$this->load->model('Ev_admin');				
			$this->Ev_admin->setUsername($username);
			//2nd Password
			$password2nd = $this->input->post('inputPassword2nd');
			$this->Ev_admin->setPassword2nd($password2nd);
			$query = $this->Ev_admin->getPassword2nd();
			if($query->num_rows() == 0)
			{	
				$this->session->set_flashdata("password2nd_lama_salah", "Maaf ! 2nd Password lama anda salah");
				redirect('admin/pengaturan', 'location');
			}
			$query = $this->Ev_admin->update2ndPassword();
			$this->session->set_flashdata("update_admin_berhasil", "Anda berhasil mengubah 2nd password admin");
			redirect('admin/pengaturan', 'location');
=======
			$data="";
			//title head
			$data['title']='Referensi Tahun Masuk | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['tambah_tahun_berhasil'] = $this->session->flashdata('tambah_tahun_berhasil');
			$data['tahun_masuk_sudah_ada'] = $this->session->flashdata('tahun_masuk_sudah_ada');
			$data['update_tahun_berhasil'] = $this->session->flashdata('update_tahun_berhasil');
			$data['hapus_tahun_berhasil'] = $this->session->flashdata('hapus_tahun_berhasil');

			$this->load->model('M_referensi');
			$data['_lembaga'] = $this->M_referensi->getLembaga();

			//$data['query'] = $this->M_referensi->getAllTahunMasuk();
			$lembaga = $this->input->get('lembaga');
			$data['query'] = $this->M_referensi->getAllTahunMasuk($lembaga);
			
			if($data['query']->num_rows()>0)
			{
				$data['status'] = 1;
				$data['carilembaga'] = $lembaga;
				$this->load->view('admin/ajax/ajax_table_tahunmasuk', $data);
			}
			else{
				$this->load->view('admin/v_reftahunmasuk', $data);
			}

>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		}
	}

	public function doUpdateEditor()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('Ev_editor');

			//upload logo
			//$namaedit =  str_replace(" ", "_", $nama); //agar spasi diganti dengan underscore
			//UPLOAD FOTO
			$this->load->library('upload');
			$path = './assets/img/';
	        $config['upload_path'] = $path; //path folder
	        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	        $config['max_size'] = '512'; //maksimum besar file 1M
	        $config['max_width']  = '1000'; //lebar maksimum 400 px
	        $config['max_height']  = '1000'; //tinggi maksimu 600 px
	        $config['file_name'] = 'evote-logo'; //nama yang terupload nantinya

<<<<<<< HEAD
	        $this->upload->initialize($config); 
=======
			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setTahunMasuk($this->input->post('inputTahunMasuk'));
			$query = $this->M_referensi->checkTahunMasuk($lembaga);
			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('tahun_masuk_sudah_ada', 'Tahun Masuk sudah ada pada lembaga '.$lembaga.', Silahkan masukkan tahun lain !');
				redirect('admin/referensi_tahun', 'location');
			}

			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			
			$this->M_referensi->addTahunMasuk();
			$this->session->set_flashdata('tambah_tahun_berhasil', 'Anda berhasil menambah tahun masuk pada lembaga '.$lembaga.'');
			redirect('admin/referensi_tahun', 'location');
		}
	}

	public function do_updatetahun($idtahunmasuk)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setTahunMasuk($this->input->post('inputTahunMasuk'));

			$this->M_referensi->setIdTahunMasuk($idtahunmasuk);
			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			$this->M_referensi->updateTahunMasuk();

			$this->session->set_flashdata('update_tahun_berhasil', 'Anda berhasil mengubah data tahun masuk');
			redirect('admin/referensi_tahun', 'location');
		}
	}

	public function do_hapustahun($idtahunmasuk)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$this->M_referensi->setIdTahunMasuk($idtahunmasuk);
			$this->M_referensi->deleteTahunMasuk();
			$this->session->set_flashdata('hapus_tahun_berhasil', 'Anda berhasil menghapus tahun masuk');
			redirect('admin/referensi_tahun', 'location');
		}
	}

	public function do_aktiftahun($idtahunmasuk)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$this->M_referensi->setIdTahunMasuk($idtahunmasuk);
			
			$this->M_referensi->setAktif($this->input->get('aktif'));
			$this->M_referensi->setLembaga($this->input->get('lembaga'));

			//echo $this->input->get('aktif');
			//echo $this->input->get('lembaga');

			$this->M_referensi->setPasifAllTahunMasuk();
			$this->M_referensi->setAktifTahunMasuk();

			redirect('admin/referensi_tahun', 'location');
		}
	}


	/* END REFERENSI TAHUN MASUK */

	/* REFERENSI PROSES PENERIMAAN */
	public function referensi_prosespenerimaan()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Referensi Proses Penerimaan | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['kode_awalan_sudah_ada'] = $this->session->flashdata('kode_awalan_sudah_ada');
			$data['tambah_proses_berhasil'] = $this->session->flashdata('tambah_proses_berhasil');
			$data['update_proses_berhasil'] = $this->session->flashdata('update_proses_berhasil');
			$data['hapus_proses_berhasil'] = $this->session->flashdata('hapus_proses_berhasil');

			$this->load->model('M_referensi');
			$data['_lembaga'] = $this->M_referensi->getLembaga();

			$lembaga = $this->input->post('lembaga');
			$data['query'] = $this->M_referensi->getProsesPenerimaan($lembaga);
			//$data['proses'] = '<script>$(document).ready(function(){$("#ref_proses").submit();});</script>';
			//$data['status'] = 0;
			
			if($data['query']->num_rows()>0)
			{
				$data['status'] = 1;
				$data['carilembaga'] = $lembaga;
				$this->load->view('admin/ajax/ajax_table_prosespenerimaan', $data);
			}
			else{
				$this->load->view('admin/v_refprosespenerimaan', $data);
			}
		}
	}
	public function do_tambahproses()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";

			$this->load->model('M_referensi');

			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setKodeAwalan($this->input->post('inputKodeAwalan'));

			$query = $this->M_referensi->getKodeAwalan();
			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('kode_awalan_sudah_ada', 'Kode Awalan sudah ada pada lembaga '.$lembaga.', Silahkan masukkan kode awalan lain !');
				redirect('admin/referensi_prosespenerimaan', 'location');
			}

			$this->M_referensi->setProses($this->input->post('inputProses'));
			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			
			$this->M_referensi->addProsesPenerimaan();
			$this->session->set_flashdata('tambah_proses_berhasil', 'Anda berhasil menambah proses penerimaan pada lembaga '.$lembaga.'');
			redirect('admin/referensi_prosespenerimaan', 'location');
		}
	}
	public function do_updateproses($idprosespenerimaan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setIdProsesPenerimaan($idprosespenerimaan);
			$this->M_referensi->setKodeAwalan($this->input->post('inputKodeAwalan'));
			$this->M_referensi->setProses($this->input->post('inputProses'));
			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			
			$this->M_referensi->updateProsesPenerimaan();
			$this->session->set_flashdata('update_proses_berhasil', 'Anda berhasil mengubah proses penerimaan pada lembaga '.$lembaga.'');
			redirect('admin/referensi_prosespenerimaan', 'location');
		}
	}

	public function do_hapusproses($idprosespenerimaan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$this->M_referensi->setIdProsesPenerimaan($idprosespenerimaan);
			$this->M_referensi->deleteProsesPenerimaan();
			$this->session->set_flashdata('hapus_proses_berhasil', 'Anda berhasil menghapus proses penerimaan');
			redirect('admin/referensi_prosespenerimaan', 'location');
		}
	}

	/* END REFERENSI PROSES PENERIMAAN */

	public function referensi_kelompok()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			//title head
			$data['title']='Referensi Kelompok | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['tambah_kelompok_berhasil'] = $this->session->flashdata('tambah_kelompok_berhasil');
			$data['tanggal_salah'] = $this->session->flashdata('tanggal_salah');
			$data['update_kelompok_berhasil'] = $this->session->flashdata('update_kelompok_berhasil');
			$data['hapus_berhasil'] = $this->session->flashdata('hapus_berhasil');

			$this->load->model('M_referensi');
			$data['_lembaga'] = $this->M_referensi->getLembaga();
			
			$lembaga = $this->input->get('lembaga');
			$queryproses = $this->M_referensi->getProsesPenerimaanAktif($lembaga);
			if($queryproses->num_rows()>0)
			{
				foreach ($queryproses->result() as $row) {
					$data['idprosespenerimaan'] = $row->idprosespenerimaan;
					$data['proses'] = $row->proses;
				}
			}

			$idprosespenerimaan = $this->input->post('inputIdProses');
			$data['query'] = $this->M_referensi->getAllKelompok($idprosespenerimaan);

			if ($queryproses->num_rows()>0){
				$this->load->view('admin/ajax/ajax_select_prosespenerimaan', $data);
			}	
			else
			{
				$data['status'] = 1;
				$data['carilembaga'] = $this->input->post('inputLembaga');
				$data['cariproses'] = $this->input->post('inputProses');
				$data['idproses'] = $idprosespenerimaan;
				$this->load->view('admin/v_refkelompok', $data);
			}
		}
	}
	public function do_tambahkelompok()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$tanggalmulai = $this->input->post('inputTanggalMulai');
			$tanggalselesai = $this->input->post('inputTanggalSelesai');
			if($tanggalmulai > $tanggalselesai)
			{
				$this->session->set_flashdata('tanggal_salah', 'Maaf ! tanggal mulai harus lebih kecil dari tanggal selesai');
				redirect('admin/referensi_kelompok', 'location');
			}
			$prosespenerimaan = $this->input->post('inputProsesPenerimaan');
			$this->M_referensi->setKelompok($this->input->post('inputKelompok'));
			$this->M_referensi->setIdProsesPenerimaan($this->input->post('inputIdProsesPenerimaan'));
			$this->M_referensi->setKapasitas($this->input->post('inputKapasitas'));
			$this->M_referensi->setTanggalMulai($tanggalmulai);
			$this->M_referensi->setTanggalSelesai($tanggalselesai);

			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			$this->M_referensi->addKelompok();
			$this->session->set_flashdata('tambah_kelompok_berhasil', 'Anda berhasil menambah kelompok pada proses penerimaan '.$prosespenerimaan.'');
			redirect('admin/referensi_kelompok', 'location');
		}
	}

	public function do_updatekelompok($idkelompok)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$tanggalmulai = $this->input->post('inputTanggalMulai');
			$tanggalselesai = $this->input->post('inputTanggalSelesai');
			if($tanggalmulai > $tanggalselesai)
			{
				$this->session->set_flashdata('tanggal_salah', 'Maaf ! tanggal mulai harus lebih kecil dari tanggal selesai');
				redirect('admin/referensi_kelompok', 'location');
			}
			$prosespenerimaan = $this->input->post('inputProsesPenerimaan');
			$this->M_referensi->setIdKelompok($idkelompok);
			$this->M_referensi->setKelompok($this->input->post('inputKelompok'));
			$this->M_referensi->setIdProsesPenerimaan($this->input->post('inputIdProsesPenerimaan'));
			$this->M_referensi->setKapasitas($this->input->post('inputKapasitas'));
			$this->M_referensi->setTanggalMulai($tanggalmulai);
			$this->M_referensi->setTanggalSelesai($tanggalselesai);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			$this->M_referensi->updateKelompok();
			$this->session->set_flashdata('update_kelompok_berhasil', 'Anda berhasil mengubah kelompok pada proses penerimaan '.$prosespenerimaan.'');
			redirect('admin/referensi_kelompok', 'location');
		}
	}
	public function do_hapuskelompok($idkelompok)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdKelompok($idkelompok);
			$query = $this->M_referensi->deleteKelompok();
			$this->session->set_flashdata('hapus_berhasil', 'Anda berhasil menghapus data kelompok');
			redirect('admin/referensi_kelompok', 'location');
		}
	}

	/*REFERENSI UMUM*/
	public function referensiumum()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Referensi Umum | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['tambah_berhasil'] = $this->session->flashdata('tambah_berhasil');
			$data['hapus_berhasil'] = $this->session->flashdata('hapus_berhasil');
			$data['update_berhasil'] = $this->session->flashdata('update_berhasil');
			$data['urutan_sudah_ada'] = $this->session->flashdata('urutan_sudah_ada');

			$this->load->model('M_referensi');
			$data['queryagama'] = $this->M_referensi->getAllAgama();
			$data['querysuku'] = $this->M_referensi->getAllSuku();
			$data['querykondisi'] = $this->M_referensi->getAllKondisi();
			$data['querystatusortu'] = $this->M_referensi->getAllStatusOrtu();
			$data['querypendidikan'] = $this->M_referensi->getAllPendidikan();
			$data['querypenghasilan'] = $this->M_referensi->getAllPenghasilan();

			$this->load->view('admin/v_referensiumum', $data);
		}
	}
	/*END REFERENSI UMUM*/
	/*CRUD AGAMA*/
	public function do_tambahagama()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setAgama($this->input->post('inputAgama'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$queryurutan = $this->M_referensi->getUrutanAgama();
			if($queryurutan->num_rows() > 0)
			{
				$this->session->set_flashdata('urutan_sudah_ada', 'Maaf ! nomor urut sudah dipakai, silahkan mengganti nomor urut');
				redirect('admin/referensiumum', 'location');
			}
			$query = $this->M_referensi->addAgama();
			$this->session->set_flashdata('tambah_berhasil', 'Anda berhasil menambahkan data agama');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_updateagama($idagama)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdAgama($idagama);
			$this->M_referensi->setAgama($this->input->post('inputAgama'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$query = $this->M_referensi->updateAgama();
			$this->session->set_flashdata('update_berhasil', 'Anda berhasil mengubah data agama');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_hapusagama($idagama)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdAgama($idagama);
			$query = $this->M_referensi->deleteAgama();
			$this->session->set_flashdata('hapus_berhasil', 'Anda berhasil menghapus data agama');
			redirect('admin/referensiumum', 'location');
		}
	}
	/*END CRUD AGAMA*/
	/*CRUD PENGHASILAN*/
	public function do_tambahpenghasilan()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setPenghasilan($this->input->post('inputPenghasilan'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$queryurutan = $this->M_referensi->getUrutanPenghasilan();
			if($queryurutan->num_rows() > 0)
			{
				$this->session->set_flashdata('urutan_sudah_ada', 'Maaf ! nomor urut sudah dipakai, silahkan mengganti nomor urut');
				redirect('admin/referensiumum', 'location');
			}
			$query = $this->M_referensi->addPenghasilan();
			$this->session->set_flashdata('tambah_berhasil', 'Anda berhasil menambahkan data penghasilan');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_updatepenghasilan($idpenghasilan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdPenghasilan($idpenghasilan);
			$this->M_referensi->setPenghasilan($this->input->post('inputPenghasilan'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$query = $this->M_referensi->updatePenghasilan();
			$this->session->set_flashdata('update_berhasil', 'Anda berhasil mengubah data penghasilan');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_hapuspenghasilan($idpenghasilan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdPenghasilan($idpenghasilan);
			$query = $this->M_referensi->deletePenghasilan();
			$this->session->set_flashdata('hapus_berhasil', 'Anda berhasil menghapus data penghasilan');
			redirect('admin/referensiumum', 'location');
		}
	}
	/*END CRUD PENGHASILAN*/
	/*CRUD KONDISI SISWA*/
	public function do_tambahkondisi()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setKondisi($this->input->post('inputKondisi'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$queryurutan = $this->M_referensi->getUrutanKondisi();
			if($queryurutan->num_rows() > 0)
			{
				$this->session->set_flashdata('urutan_sudah_ada', 'Maaf ! nomor urut sudah dipakai, silahkan mengganti nomor urut');
				redirect('admin/referensiumum', 'location');
			}
			$query = $this->M_referensi->addKondisi();
			$this->session->set_flashdata('tambah_berhasil', 'Anda berhasil menambahkan data kondisi siswa');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_updatekondisi($idkondisi)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdKondisi($idkondisi);
			$this->M_referensi->setKondisi($this->input->post('inputKondisi'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$query = $this->M_referensi->updateKondisi();
			$this->session->set_flashdata('update_berhasil', 'Anda berhasil mengubah data kondisi');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_hapuskondisi($idkondisi)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdKondisi($idkondisi);
			$query = $this->M_referensi->deleteKondisi();
			$this->session->set_flashdata('hapus_berhasil', 'Anda berhasil menghapus data kondisi');
			redirect('admin/referensiumum', 'location');
		}
	}
	/*END CRUD KONDISI SISWA*/
	/*STATUS ORTU*/
	public function do_tambahstatusortu()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setStatusOrtu($this->input->post('inputStatusOrtu'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$queryurutan = $this->M_referensi->getUrutanStatusOrtu();
			if($queryurutan->num_rows() > 0)
			{
				$this->session->set_flashdata('urutan_sudah_ada', 'Maaf ! nomor urut sudah dipakai, silahkan mengganti nomor urut');
				redirect('admin/referensiumum', 'location');
			}
			$query = $this->M_referensi->addStatusOrtu();
			$this->session->set_flashdata('tambah_berhasil', 'Anda berhasil menambahkan data status Orang Tua');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_updatestatusortu($idstatusortu)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdStatusOrtu($idstatusortu);
			$this->M_referensi->setStatusOrtu($this->input->post('inputStatusOrtu'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$query = $this->M_referensi->updateStatusOrtu();
			$this->session->set_flashdata('update_berhasil', 'Anda berhasil mengubah data status Orang Tua');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_hapusstatusortu($idstatusortu)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdStatusOrtu($idstatusortu);
			$query = $this->M_referensi->deleteStatusOrtu();
			$this->session->set_flashdata('hapus_berhasil', 'Anda berhasil menghapus data status Orang Tua');
			redirect('admin/referensiumum', 'location');
		}
	}
	/*END CRUD STATUS ORTU*/
	/*TINGKAT PENDIDIKAN*/
	public function do_tambahpendidikan()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setPendidikan($this->input->post('inputPendidikan'));
			$query = $this->M_referensi->addPendidikan();
			$this->session->set_flashdata('tambah_berhasil', 'Anda berhasil menambahkan data tingkat pendidikan');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_updatependidikan($idpendidikan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdPendidikan($idpendidikan);
			$this->M_referensi->setPendidikan($this->input->post('inputPendidikan'));
			$query = $this->M_referensi->updatePendidikan();
			$this->session->set_flashdata('update_berhasil', 'Anda berhasil mengubah data tingkat pendidikan');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_hapuspendidikan($idpendidikan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdPendidikan($idpendidikan);
			$query = $this->M_referensi->deletePendidikan();
			$this->session->set_flashdata('hapus_berhasil', 'Anda berhasil menghapus data tingkat pendidikan');
			redirect('admin/referensiumum', 'location');
		}
	}
	/*END CRUD TINGKAT PENDIDIKAN*/
	/*SUKU*/
	public function do_tambahsuku()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setSuku($this->input->post('inputSuku'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$queryurutan = $this->M_referensi->getUrutanSuku();
			if($queryurutan->num_rows() > 0)
			{
				$this->session->set_flashdata('urutan_sudah_ada', 'Maaf ! nomor urut sudah dipakai, silahkan mengganti nomor urut');
				redirect('admin/referensiumum', 'location');
			}
			$query = $this->M_referensi->addSuku();
			$this->session->set_flashdata('tambah_berhasil', 'Anda berhasil menambahkan data suku');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_updatesuku($idsuku)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdSuku($idsuku);
			$this->M_referensi->setSuku($this->input->post('inputSuku'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$query = $this->M_referensi->updateSuku();
			$this->session->set_flashdata('update_berhasil', 'Anda berhasil mengubah data suku');
			redirect('admin/referensiumum', 'location');
		}
	}
	public function do_hapussuku($idsuku)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_referensi');
			$this->M_referensi->setIdSuku($idsuku);
			$query = $this->M_referensi->deleteSuku();
			$this->session->set_flashdata('hapus_berhasil', 'Anda berhasil menghapus data suku');
			redirect('admin/referensiumum', 'location');
		}
	}
	/*END CRUD SUKU*/

	public function dataadmin()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Data Admin | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['username_sudah_ada'] = $this->session->flashdata('username_sudah_ada');
			$data['tambah_admin_berhasil'] = $this->session->flashdata('tambah_admin_berhasil');
			$data['update_admin_berhasil'] = $this->session->set_flashdata('update_admin_berhasil');
			$data['hapus_admin_berhasil'] = $this->session->flashdata('hapus_admin_berhasil');
			$data['ubah_password_berhasil'] = $this->session->flashdata('ubah_password_berhasil');

			$this->load->model('M_admin');
			$data['query'] = $this->M_admin->getAllAdmin();

			$this->load->view('admin/v_dataadmin', $data);
		}
	}

	public function tambahadmin()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Tambah Admin | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin

			$this->load->view('admin/v_tambahadmin', $data);
		}
	}
	
	public function do_tambahadmin()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			
			$this->load->model('M_admin');

			$this->M_admin->setUsername($this->input->post('inputUsername'));
			$query = $this->M_admin->getUsername();
			if ($query->num_rows()>0)
			{
				$this->session->set_flashdata('username_sudah_ada', 'Maaf ! Username sudah ada, Silahkan masukkan username lain');
				redirect('admin/dataadmin', 'location');
			}

			$this->M_admin->setPassword($this->input->post('inputPassword'));
			$this->M_admin->setEmail($this->input->post('inputEmail'));	
			$this->M_admin->setNama($this->input->post('inputNama'));
			$this->M_admin->setPanggilan($this->input->post('inputPanggilan'));		

			$query = $this->M_admin->addAdmin();

			$this->session->set_flashdata('tambah_admin_berhasil', 'Anda berhasil menambahkan user admin');
			redirect('admin/dataadmin', 'location');
		}
	}

	public function updateadmin($username)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Update Admin | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin

			$this->load->model('M_admin');
			$this->M_admin->setUsername($username);
			$query = $this->M_admin->getAdminByUsername();

			if ($query->num_rows() > 0)
			{
				foreach($query->result() as $row)
				{
					$data['username'] = $row->username;
					$data['password'] = $row->password;
					$data['email'] = $row->email;
					$data['nama'] = $row->nama;
					$data['panggilan'] = $row->panggilan;
				}
			}

			$this->load->view('admin/v_updateadmin', $data);
		}
	}

	public function do_updateadmin()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";

			$this->load->model('M_admin');
			$this->M_admin->setUsername($this->input->post('inputUsername'));
			$this->M_admin->setEmail($this->input->post('inputEmail'));
			$this->M_admin->setNama($this->input->post('inputNama'));
			$this->M_admin->setPanggilan($this->input->post('inputPanggilan'));

			$query = $this->M_admin->updateAdmin();

			$this->session->set_flashdata('update_admin_berhasil', 'Anda berhasil mengubah data admin');
			redirect('admin/dataadmin','location');
		}
	}

	public function do_hapusadmin($username)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";

			$this->load->model('M_admin');
			$this->M_admin->setUsername($username);

			$query = $this->M_admin->deleteAdmin();

			$this->session->set_flashdata('hapus_admin_berhasil', 'Anda berhasil menghapus admin');
			redirect('admin/dataadmin','location');
		}
	}

	public function profil()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		$username = $this->session->userdata('username');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Profil Admin | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['update_profil_berhasil'] = $this->session->flashdata('update_profil_berhasil');
			$data['upload_foto_berhasil'] = $this->session->flashdata('upload_foto_berhasil');
			$data['upload_foto_gagal'] = $this->session->flashdata("upload_foto_gagal");

			$this->load->model('M_admin');
			$this->M_admin->setUsername($username);
			
			$query = $this->M_admin->getAdminByUsername();
			if($query->num_rows() > 0)
			{
				foreach($query->result() as $row)
				{
					$data['username'] = $row->username;
					$data['nama'] = $row->nama;
					$data['panggilan'] = $row->panggilan;
					$data['email'] = $row->email;
					$data['password'] = $row->password;
					$data['foto'] = $row->foto;
				}	
			}
			$this->load->view('admin/v_profiladmin', $data);
		}
	}

	public function do_updateprofil()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		$username = $this->session->userdata('username');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_admin');
			$this->M_admin->setUsername($username);
			$this->M_admin->setEmail($this->input->post('inputEmail'));
			$this->M_admin->setNama($this->input->post('inputNama'));
			$this->M_admin->setPanggilan($this->input->post('inputPanggilan'));

			$query = $this->M_admin->updateAdmin();

			$this->session->set_flashdata('update_profil_berhasil', 'Anda berhasil mengubah profil admin');
			redirect('admin/profil','location');
		}
	}

	public function do_gantipassword($username)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_admin');
			$this->M_admin->setUsername($username);
			$this->M_admin->setPassword($this->input->post('inputPassword'));

			$query = $this->M_admin->changePassword();

			$this->session->set_flashdata('ubah_password_berhasil', 'Anda berhasil mengubah password admin');
			redirect('admin/dataadmin','location');
		}
	}

	public function do_unggahfotoprofil()
	{

		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		$username = $this->session->userdata('username');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_admin');
			$this->M_admin->setUsername($username);

			//UPLOAD FOTO
			$this->load->library('upload');
	        $namafile = $username.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
	        $path = './assets2/images/profpic/';
	        $config['upload_path'] = $path; //path folder
	        $config['allowed_types'] = 'jpg|png|jpeg|bmp|gif'; //type yang dapat diakses bisa anda sesuaikan
	        $config['max_size'] = '1048'; //maksimum besar file 1M
	        $config['max_width']  = '600'; //lebar maksimum 400 px
	        $config['max_height']  = '900'; //tinggi maksimu 600 px
	        $config['file_name'] = $namafile; //nama yang terupload nantinya

	        $this->upload->initialize($config);

>>>>>>> 023b1edb67d4709724da4de37634675374c78491
	        if(!empty($_FILES['fileFoto']['name']))
	        {
	        	if ($this->upload->do_upload('fileFoto'))
	        	{
<<<<<<< HEAD
	        		$this->Ev_editor->setLogo($this->upload->data('file_name'));
	        	}else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	        	   $this->session->set_flashdata("upload_logo_gagal", "Format atau Ukuran Logo Tidak Sesuai");
	               redirect('admin/pengaturan', 'location'); //jika gagal maka akan ditampilkan form upload
	           }
	       }
	       else{
	        	$data['logo'] = $this->Ev_editor->getLogo(); //mengambil foto yang lama
	        	$logo = $data['logo'];
	        	$this->Ev_editor->setLogo($logo);
	        }	
	        $this->Ev_editor->setJudul($this->input->post('inputJudul'));

	        $query = $this->Ev_editor->updateEditor();
	        $this->session->set_flashdata("update_editor_berhasil", "Anda berhasil mengubah tampilan Evote");
			redirect('admin/pengaturan', 'location');
		}
=======
	        		$gambar = $this->upload->data();
	        		$linkfoto =  $namafile.'.'.$gambar['image_type'];
	        		$this->M_admin->setLinkFoto($linkfoto);

	        		$query = $this->M_admin->updateFotoProfil();
	        		$this->session->set_flashdata('upload_foto_berhasil', 'Anda berhasil mengunggah foto profil admin');

	        		redirect('admin/profil','location');
	        	}else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	        		$this->session->set_flashdata("upload_foto_gagal", "Format atau Ukuran Foto Tidak Sesuai");
	        		redirect('admin/profil','location');
	        	}
	        }
	        //END UPLOAD FOTO
	    }	
	} 

	public function resetpassword()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Reset Password Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			$data['fotoadmin'] = $this->session->userdata('foto'); //session foto admin
			//notifikasi
			$data['reset_password_berhasil'] = $this->session->flashdata('reset_password_berhasil');
			$data['email_belum_terdaftar'] = $this->session->flashdata('email_belum_terdaftar');
			$data['reset_password_gagal'] = $this->session->flashdata('reset_password_gagal');

			$this->load->view('admin/v_resetpassword', $data);
		}
	}

	public function do_resetpassword()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginadmin');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_user');
			$email = $this->input->post('inputEmail');
			$this->M_user->setEmail($email);
			$query = $this->M_user->getEmail();
			if($query->num_rows()==0)
			{
				$this->session->set_flashdata('email_belum_terdaftar','Maaf ! Email siswa belum terdaftar');
				redirect('admin/resetpassword', 'location');
			}
			$passwordbaru = $this->input->post('inputPassword');
			$this->M_user->setPassword($passwordbaru);

			$this->M_user->updatePassword();

			//memanggil library email dan set konfigurasi untuk pengiriman email	    
			$this->load->library('email');
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
	    	$config['smtp_host']= "srv24.niagahoster.com";//pengaturan smtp
	    	$config['smtp_port']= "465";
	    	$config['smtp_crypto'] = 'ssl';
	    	$config['smtp_timeout']= "400";
	    	$config['smtp_user']= "admin@mau-mbi-ausby.sch.id"; // isi dengan email kamu
	    	$config['smtp_pass']= "suaraamanatulummah"; // isi dengan password kamu
	    	$config['crlf']="\r\n"; 
	    	$config['newline']="\r\n"; 
	    	$config['wordwrap'] = TRUE;
	    	

	    	$this->email->initialize($config);
	    	//konfigurasi pengiriman
	    	$this->email->from($config['smtp_user'], 'PSB MAU-MBI Surabaya');
	    	$this->email->to($this->input->post('inputEmail'));
	    	$this->email->subject("Reset Password Akun PSB MAU-MBI Amanatul Ummah Surabaya");
	    	$this->email->message(
	    		"<strong>Berikut informasi akun PSB kamu yang baru:</strong><br>
	    		Email : ".$email." <br>
	    		Password : ".$passwordbaru." <br><br>
	    		*Kami menyarankan untuk mengganti password untuk menjaga privasi anda <br>
	    		Link registrasi PSB MAU-MBI Amanatul Ummah Sby :".site_url()."
	    		<br><br>
	    		Hormat Kami, <br><br><br><br>
	    		Panitia PSB MAU-MBI Amanatul Ummah Surabaya
	    		"
	    		);

	    	if($this->email->send())
	    	{
	    		$this->session->set_flashdata('reset_password_berhasil', 'Anda berhasil reset password siswa dengan password baru "'.$passwordbaru.'", dan Password Baru sudah terkirim ke email tujuan');
	    	}else
	    	{
	    		$this->session->set_flashdata('reset_password_gagal', 'Anda berhasil reset password siswa, namu gagal mengirim ke email tujuan');
	    	}
	    	redirect('admin/resetpassword', 'location');
	    }
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
	}
}
