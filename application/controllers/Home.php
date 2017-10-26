<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
<<<<<<< HEAD

=======
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
	public function index()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginpemilih');
		if($login==false)
		{
<<<<<<< HEAD
			$data['title'] = 'Evote | Login';
			//notifikasi
			$data['id_password_salah'] = $this->session->flashdata('id_password_salah');
			$data['voting_berhasil'] = $this->session->flashdata('voting_berhasil');

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
			$this->load->view('index', $data);
		}
		else
		{
			redirect('vote', 'location');
		}
=======

			$data;

		//menu active
			$data=array(	
				'pendaftaran_active' 	=> 'class="active"',
				'panduanpendaftaran_active' 	=> 'class=""'
				);

		//title head
			$data['title']='Login | MAU-MBI Amanatul Ummah Surabaya';

		//pesan berhasil
			$data['logout_berhasil'] = $this->session->flashdata('logout_berhasil');
			$data['registrasi_berhasil'] = $this->session->flashdata('registrasi_berhasil');

		//pesan gagal
			$data['email_sudah_ada'] = $this->session->flashdata('email_sudah_ada');
			$data['password_dan_ulangi_password_tidak_sama'] = $this->session->flashdata('password_dan_ulangi_password_tidak_sama');
			$data['email_belum_terdaftar'] = $this->session->flashdata('email_belum_terdaftar');
			$data['email_password_salah'] = $this->session->flashdata('email_password_salah');
		$data['verifikasi_gagal'] = $this->session->flashdata('verifikasi_gagal'); //verifikasi email gagal
		$data['captcha_tidak_sama'] = $this->session->flashdata('captcha_tidak_sama');
		$data['aktifasi_berhasil'] = $this->session->flashdata('aktifasi_berhasil');

		// load codeigniter captcha helper
		$this->load->helper('captcha');
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => '270',
			'img_height' => 40,
			'word_length'   => 5,
			'font_size'     => 18,
			'border' => 0, 
			'expiration' => 7200
			);

         // create captcha image
		$cap = create_captcha($vals);

         // store image html code in a variable
		$data['image'] = $cap['image'];

         // store the captcha word in a session
		$this->session->set_userdata('mycaptcha', $cap['word']);
		$this->load->view('calonsiswa/v_login', $data);
	}

	else
	{
			//$this->session->set_flashdata('login_berhasil','Login berhasil');
		$this->load->helper('url');
		redirect('pendaftaran','location');
	}
}

public function register()
{
	$data;
	$this->load->model('M_user');
	$this->load->model('M_calonsiswa');

	if ($this->input->post() && ($this->input->post('inputCaptcha') != $this->session->userdata('mycaptcha')))
	{
		$this->session->set_flashdata('captcha_tidak_sama','Maaf ! Captcha tidak sesuai');
		$this->load->helper('url');
		redirect('home','location');
	}
	if ($this->input->post('inputPassword')!=$this->input->post('inputUlangiPassword'))
	{
		$this->session->set_flashdata('password_dan_ulangi_password_tidak_sama','Konfirmasi Password tidak sesuai');
		$this->load->helper('url');
		redirect('home','location');
	}

	$this->M_user->setEmail($this->input->post('inputEmail'));
	$query = $this->M_user->getEmail();
	if ($query->num_rows()>0)
	{
		$this->session->set_flashdata('email_sudah_ada','Email sudah ada! Silahkan masukkan email lain');
		$this->load->helper('url');
		redirect('home','location');
	}
	$this->M_user->setNama($this->input->post('inputNama'));
	$this->M_user->setPanggilan($this->input->post('inputPanggilan'));
	$this->M_user->setEmail($this->input->post('inputEmail'));
	$this->M_user->setPassword($this->input->post('inputPassword'));

	$email = $this->input->post('inputEmail');
	$password = $this->input->post('inputPassword');
	$id = 'psbau'.$email.$password;

	$query = $this->M_user->addUser();

	$this->M_calonsiswa->setEmail($this->input->post('inputEmail'));

	$query = $this->M_calonsiswa->addCalonSiswa();

		//mengambil id penyimpanan addUser dan dienkripsi md5
	$encrypted_id = md5($id);
		$this->M_user->setVerifikasi($encrypted_id); //memasukkan ke tabel psb_user kolom key
		$query = $this->M_user->updateVerifikasi(); //update key di tabel psb_user
		
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
	    $this->email->subject("Verifikasi Akun PSB MAU-MBI Amanatul Ummah Surabaya");
	    $this->email->message(
	    	"Selamat datang di <strong>PSB MAU-MBI Amanatul Ummah Surabaya,</strong> <br><br>
	    	Terima-kasih telah melakukan registrasi, Silahkan verifikasi email anda dengan mengklik tautan berikut ini<br><br>".
	    	site_url("home/verification/$encrypted_id").
	    	"<br><br><br><strong>Berikut informasi akun PSB kamu :</strong><br>
	    	Email : ".$this->input->post('inputEmail')." <br>
	    	Password : ".$this->input->post('inputPassword')." <br><br><br>
	    	Hormat Kami, <br><br><br><br>
	    	Panitia PSB MAU-MBI Amanatul Ummah Surabaya
	    	"

	    	);

	    //echo $this->email->print_debugger();

	    if($this->email->send())
	    {
	    	$this->session->set_flashdata('registrasi_berhasil','Anda berhasil melakukan registrasi, silahkan cek email kamu untuk verifikasi !');
	    }else
	    {
	    	$this->session->set_flashdata('verifikasi_gagal','Berhasil melakukan registrasi, namu gagal mengirim verifikasi email');
	    }

	    $this->load->helper('url');
	    redirect('home','location');
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
	}

	public function login() //fungsi untuk login
	{
<<<<<<< HEAD
		$this->load->model('Ev_pemilih');
		$this->Ev_pemilih->setIdPemilih($this->input->post('inputIdPemilih'));
		$this->Ev_pemilih->setPassword($this->input->post('inputPassword'));

		$query = $this->Ev_pemilih->getPemilih();
=======
		$this->load->helper('url');
		$this->load->model('M_user');
		$this->M_user->changeActiveState($key);
		$this->session->set_flashdata('aktifasi_berhasil','Selamat kamu telah memverifikasi akun kamu, Silahkan Login !');
		redirect('home', 'location');
	}

	public function login()
	{
		$this->load->model('M_user');
		$this->load->model('M_log');
		$this->M_log->setEmail($this->input->post('inputEmail'));
		$this->M_user->setEmail($this->input->post('inputEmail'));
		$this->M_user->setPassword(md5($this->input->post('inputPassword')));
		
		$query = $this->M_user->getUser();
		$queryemail = $this->M_user->getEmail();
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
		if ($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$newdata = array(
					'idpemilih' => $row->idpemilih,
					'password' => $row->password,
					'loginpemilih' => TRUE
					);
				$this->session->set_userdata($newdata);
			}
<<<<<<< HEAD
						//notifikasi login
			//$query = $this->Alumni->setNotificationLogin();
						//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
			redirect('vote', 'location');
		}
		else 
		{
			$this->session->set_flashdata('id_password_salah','Maaf ! ID & Password Anda Salah atau Anda sudah melakukan Voting.<br>Silahkan hubungi admin');
			//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
=======
			$query = $this->M_log->setNotifikasiLogin();
			$this->load->helper('url');
			redirect('home','location');
		}
		else if($queryemail->num_rows()==0)
		{
			$this->session->set_flashdata('email_belum_terdaftar','Email belum terdaftar! Silahkan Registrasi terlebih dahulu');
			$this->load->helper('url');
			redirect('home','location');
		}
		else 
		{
			$this->session->set_flashdata('email_password_salah','Maaf ! Email & Password anda SALAH atau Akun anda BELUM AKTIF, silahkan cek email untuk verifikasi !');
>>>>>>> 023b1edb67d4709724da4de37634675374c78491
			$this->load->helper('url');
			redirect('home', 'location');
		}
	}
<<<<<<< HEAD
=======

	function logout()
	{
		$login = $this->session->userdata('login');
		$this->session->unset_userdata('login');
		$this->session->set_flashdata('logout_berhasil','Anda berhasil logout');
		$this->load->helper('url');
		redirect('home','refresh');
	}

>>>>>>> 023b1edb67d4709724da4de37634675374c78491
}
