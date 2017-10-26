<?php
class Ev_calonketua extends CI_Model
{

	private $idcalonketua;
	private $nama;
	private $nourut;
	private $foto;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function setIdCalonKetua($idcalonketua)
	{
		$this->idcalonketua = $idcalonketua;
	}
	public function setNama($nama)
	{
		$this->nama = $nama;
	}
	public function setNoUrut($nourut)
	{
		$this->nourut = $nourut;
	}
		public function setFoto($foto)
	{
		$this->foto = $foto;
	}

	public function getCalonKetua()
	{
		$query = $this->db->query
		("
			SELECT * FROM ev_calonketua
			ORDER BY nourut ASC
			");
		$this->db->close();
		return $query;
	}

	public function addCalonKetua()
	{
		$query = $this->db->query
		("
			INSERT INTO ev_calonketua (nama, nourut, foto, ts)
			VALUES
			(
			   '$this->nama',
			   '$this->nourut',
			   '$this->foto',
			   NOW()
			)
			");
		$this->db->close();
		return $query;
	}

	public function getNoUrut()
	{
		$query = $this->db->query
		("
			SELECT nourut FROM ev_calonketua
				WHERE nourut='$this->nourut'
			");
		$this->db->close();
		return $query;
	}

	public function updateCalonKetua()
	{
		$query = $this->db->query
		("
			UPDATE ev_calonketua
			SET
				nama = '$this->nama',
				nourut = '$this->nourut',
				foto = '$this->foto',
				ts = NOW()
			WHERE idcalonketua = '$this->idcalonketua'	
			");
		$this->db->close();
		return $query;
	}

	public function deleteCalonKetua()
	{
		$query = $this->db->query
		("
			DELETE FROM ev_calonketua
				WHERE idcalonketua = '$this->idcalonketua'
			");
		$this->db->close();
		return $query;
	}


	public function getFoto()
	{
		$data="";
		$this->load->database();
		$query = $this->db->query
				("
					SELECT foto
					FROM ev_calonketua
					WHERE 
						idcalonketua = '$this->idcalonketua'	
				");
		$this->db->close();

		foreach ($query->result() as $row)
			$data['foto'] = $row->foto;
		return $data['foto'];
	}

	public function getJumlahCalonKetua()
	{
		$query = $this->db->query
		("
			SELECT COUNT(*) AS jumlahcalonketua
			FROM ev_calonketua
			");
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row)
				$data['jumlahcalonketua'] = $row->jumlahcalonketua;
		}
		return $data['jumlahcalonketua'];
	}

}