<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_absensi extends CI_Model 
{
    private static $table_absensi = "tbl_absensi";

    public function insert($data)
    {
        $this->db->insert(self::$table_absensi, $data);
    }

    public function update($data, $id)
    {
        $this->db->where('abs_id',$id);
        $this->db->update(self::$table_absensi, $data);
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from(self::$table_absensi);
        $this->db->join('tbl_m_karyawan','tbl_absensi.kry_no = tbl_m_karyawan.kry_no');
        return $this->db->get();
    }

     //Check id 
     public function check_id($id) {
        $this->db->where('abs_id',$id);
        $query = $this->db->get(self::$table_absensi);
        return ($query->num_rows() == 1) ? true : false;
    }

    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from(self::$table_absensi);
        $this->db->join('tbl_m_karyawan','tbl_absensi.kry_no = tbl_m_karyawan.kry_no');
        $this->db->where('abs_id',$id);
        return $this->db->get();
    }

    public function get_absen_status($status= [])
    {
        $this->db->select('*');
        $this->db->from(self::$table_absensi);
        $this->db->where_in('abs_status',$status);
        $this->db->where('abs_tanggal',date('Y-m-d'));
        $query = $this->db->get();
        return $query->num_rows();
    }

}