<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_login extends CI_Model 
{
	private static $table_users = "tbl_m_user";

    // Cek user yang aktif
	public function active_user($username)
	{
		$this->db->where('usr_username', $username);
		$this->db->where('usr_status', 'active');
		$query = $this->db->get(self::$table_users);

		return ($query->num_rows() == 1) ? true: false;
	}

    //login proses
	public function username_check()
	{
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');

		$this->db->where('usr_username', $username);
		$query = $this->db->get(self::$table_users);

		if ($query->num_rows() == 1)
		{
			foreach ($query->result() as $row)
			{
				$db_pass = $row->usr_password;
			}

			if (md5($password) == $db_pass) return true; else return false;

		} else return false;
	}
}
