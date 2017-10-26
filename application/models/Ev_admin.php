<?php
class Ev_admin extends CI_Model
{

	private $username;
	private $password;

	private $password2nd;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function setUsername($username)
	{
		$this->username = $username;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}
		public function setPassword2nd($password2nd)
	{
		$this->password2nd = $password2nd;
	}

	

	public function getAdminByUsername()
	{
		$query = $this->db->query
		("
			SELECT * FROM ev_admin
			WHERE 
				username = '$this->username'
			");
		//$this->db->close();
		return $query;
	}

	public function getAdmin()
	{
		$query = $this->db->query
		("
			SELECT *
			FROM ev_admin
			WHERE 
				username = '$this->username' AND
				password = '$this->password'  
			");
		$this->db->close();
		return $query;
	}

	public function getPassword2nd()
	{
		$query = $this->db->query
		("
			SELECT password2nd
			FROM ev_admin
			WHERE 
				password2nd = '$this->password2nd'  
			");
		$this->db->close();
		return $query;
	}

	public function updatePassword()
	{
		$query = $this->db->query
		("
			UPDATE ev_admin
			SET 
				username = '$this->username',
				password = md5('$this->password'),
				ts = NOW()
			WHERE
				username = '$this->username'
			");
		//$this->db->close();
		return $query;
	}

	public function update2ndPassword()
	{
		$query = $this->db->query
		("
			UPDATE ev_admin
			SET 
				password2nd = '$this->password2nd',
				ts = NOW()
			WHERE
				username = '$this->username'
			");
		//$this->db->close();
		return $query;
	}

}