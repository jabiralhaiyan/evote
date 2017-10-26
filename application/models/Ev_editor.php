<?php
class Ev_editor extends CI_Model
{

	private $judul;
	private $logo;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function setJudul($judul)
	{
		$this->judul = $judul;
	}
	public function setLogo($logo)
	{
		$this->logo = $logo;
	}


	public function getEditor()
	{
		$query = $this->db->query
		("
			SELECT * FROM ev_editor
			");
		$this->db->close();
		return $query;
	}
	public function updateEditor()
	{
		$query = $this->db->query
		("
			UPDATE ev_editor
			SET
				judul = '$this->judul',
				logo = '$this->logo',
				ts = NOW()
			");
		$this->db->close();
		return $query;
	}
	public function getLogo()
	{
		$data="";
		$this->load->database();
		$query = $this->db->query
				("
					SELECT logo
					FROM ev_editor
					WHERE 
						ideditor = '1'	
				");
		$this->db->close();

		foreach ($query->result() as $row)
			$data['logo'] = $row->logo;
		return $data['logo'];
	}


}