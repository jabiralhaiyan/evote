<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vote extends CI_Controller {
	public function index()
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginpemilih');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('home','location');
		}
		else
		{
			$data['title'] = 'Evote | Pilih Calon Ketua';
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

			$this->load->view('v_vote', $data);
		}
	}

	public function doVote($nourut)
	{
		$this->load->library('session');
		$login = $this->session->userdata('loginpemilih');
		$idpemilih = $this->session->userdata('idpemilih');
		$password = $this->session->userdata('password');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('home','location');
		}
		else
		{
			$this->load->model('Ev_pemilih');
			$this->Ev_pemilih->setIdPemilih($idpemilih);
			$this->Ev_pemilih->setPassword($password);
			$this->Ev_pemilih->setNoUrut($nourut);

			$query = $this->Ev_pemilih->addVote();
			$this->votingLogout();		
		}
	}

	protected function votingLogout()
	{
		$login = $this->session->userdata('loginpemilih');
		$this->session->unset_userdata('loginpemilih');
		$this->session->set_flashdata('voting_berhasil','Terima-kasih, anda telah berpartisipasi dalam pemilu ini');
		$this->load->helper('url');
		redirect('home','refresh');
	}
}
