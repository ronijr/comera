<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_karyawan extends CI_Model 
{
    private static $table_karyawan = "tbl_m_karyawan";

    //Dapatkan kode unique
    public function get_code()
    {
        $this->db->select("CONCAT('CM',DATE_FORMAT(CURDATE(),'%y%m%d'),LPAD(nvl(max(substring(kry_no,9,3)),0)+1,3,'0')) AS code");
        $this->db->where('SUBSTR(kry_no,3,6) = DATE_FORMAT(CURDATE(),\'%y%m%d\')');
        $this->db->order_by("kry_no","desc");
        return $this->db->get(self::$table_karyawan);
    }

    //Insert data
    public function insert($data)
    {
        $this->db->insert(self::$table_karyawan,$data);
    }

     //Update data
     public function update($data,$id)
     {
        $this->db->where('kry_id',$id);
        $this->db->update(self::$table_karyawan, $data);
     }
 

    //Dapatkan semua data
    public function get_all()
    {
        $this->db->order_by('kry_created_at','desc');
        return $this->db->get(self::$table_karyawan);
    }

    //Dapatkan data karyawan berdasarkan id
    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from(self::$table_karyawan);
        $this->db->join('tbl_m_user','tbl_m_karyawan.kry_no = tbl_m_user.usr_username');
        $this->db->where('kry_id',$id);
        return $this->db->get();
    }

      //Check id 
      public function check_id($id) {
        $this->db->where('kry_id',$id);
        $query = $this->db->get(self::$table_karyawan);
        return ($query->num_rows() == 1) ? true : false;
    }


     //Dapatkan data karyawan berdasarkan user id
     public function get_by_userid($id)
     {
         $this->db->select('*');
         $this->db->from(self::$table_karyawan);
         $this->db->join('tbl_m_user','tbl_m_karyawan.kry_no = tbl_m_user.usr_username');
         $this->db->where('kry_no',$id);
         return $this->db->get();
     }

     public function get_num_rows()
     {
         $this->db->select('*');
         $this->db->from(self::$table_karyawan);
         $this->db->join('tbl_m_user','tbl_m_user.usr_username = tbl_m_karyawan.kry_no');
         $this->db->where_not_in('usr_type',['owner']);
         $query = $this->db->get();
         return $query->num_rows();
     }
}