<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_users extends CI_Model 
{
    private static $table_users = "tbl_m_user";
    private static $table_karyawan = "tbl_m_karyawan";

    public function profile($username)
    {
        $this->db->select('*');
        $this->db->from(self::$table_users);
        $this->db->join('tbl_m_karyawan','tbl_m_user.usr_username = tbl_m_karyawan.kry_no','left');
        $this->db->where('usr_username',$username);
        $query = $this->db->get();
        return $query;
    }

    //Insert data
    public function insert($data)
    {
        $this->db->insert(self::$table_users,$data);
    }

     //Update data
     public function update($data,$id)
     {
        $this->db->where('usr_username',$id);
        $this->db->update(self::$table_users, $data);
     }

}