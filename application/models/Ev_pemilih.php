<?php
class Ev_pemilih extends CI_Model
{

	private $idpemilih;
	private $password;
	private $nourut;
	private $status;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function setIdPemilih($idpemilih)
	{
		$this->idpemilih = $idpemilih;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}
	public function setNoUrut($nourut)
	{
		$this->nourut = $nourut;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}


	public function addVote()
	{
		$this->load->database();
		$query = $this->db->query
		("
			UPDATE ev_pemilih
			SET
				nourut = '$this->nourut',
				status = '1',
				ts = NOW()
			WHERE idpemilih = '$this->idpemilih' AND
					password = '$this->password'
		");
		return $query;	
	}

	public function getPemilih()
	{
		$this->load->database();
		$query = $this->db->query
		("
			SELECT * FROM ev_pemilih
			WHERE idpemilih = '$this->idpemilih' AND
					password = '$this->password' AND
					status='0'
		");
		return $query;	
	}

	public function getJumlahPemilih()
	{
		$this->load->database();
		$query = $this->db->query
		("
			SELECT  COUNT(*) as jumlahpemilih
			FROM ev_pemilih
		");
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row)
				$data['jumlahpemilih'] = $row->jumlahpemilih;
		}
		
		return $data['jumlahpemilih'];	
	}

	public function getJumlahPemilihVoting()
	{
		$this->load->database();
		$query = $this->db->query
		("
			SELECT  COUNT(*) as jumlahpemilihvoting
			FROM ev_pemilih
			WHERE status='1'
		");
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row)
				$data['jumlahpemilihvoting'] = $row->jumlahpemilihvoting;
		}
		
		return $data['jumlahpemilihvoting'];	
	}

	public function getJumlahPemilihBelumVoting()
	{
		$this->load->database();
		$query = $this->db->query
		("
			SELECT  COUNT(*) as jumlahpemilihbelumvoting
			FROM ev_pemilih
			WHERE status='0'
		");
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row)
				$data['jumlahpemilihbelumvoting'] = $row->jumlahpemilihbelumvoting;
		}
		
		return $data['jumlahpemilihbelumvoting'];	
	}

	public function addPemilih()
	{
		$this->load->database();
		$query = $this->db->query
		("
			INSERT INTO ev_pemilih(password, nourut, status, ts)
			VALUES(
				'$this->password',
				'$this->nourut',
				'$this->status',
				NOW()
			)
		");
		return $query;	
	}

	public function getDataPemilih()
	{
		$this->load->database();
		$query = $this->db->query
		("
			SELECT * FROM ev_pemilih
		");
		return $query;	
	}

	public function resetSuara()
	{
		$this->load->database();
		$query = $this->db->query
		("
			UPDATE ev_pemilih
			SET
				nourut = 'NULL',
				status = '0',
				ts = NOW()
		");
		return $query;	
	}

	public function deleteDataPemilih()
	{
		$this->load->database();
		$query = $this->db->query
		("
			TRUNCATE TABLE ev_pemilih
		");
		return $query;	
	}

	public function getCountVoting()
		{
			$query = $this->db->query
			("
				SELECT ev_pemilih.nourut, COUNT(ev_pemilih.nourut) AS jumlahvoting, ev_calonketua.nama
				FROM ev_pemilih, ev_calonketua
				WHERE ev_calonketua.nourut = ev_pemilih.nourut
				GROUP BY ev_pemilih.nourut
				ORDER BY ev_pemilih.nourut ASC
			");
			$this->db->close();
			return $query;
		}

}