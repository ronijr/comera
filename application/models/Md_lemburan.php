<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_lemburan extends CI_Model 
{
    private static $table_lemburan = "tbl_lemburan";

    public function insert($data)
    {
        $this->db->insert(self::$table_lemburan, $data);
    }

    public function update($data, $id)
    {
        $this->db->where('lbr_id',$id);
        $this->db->update(self::$table_lemburan, $data);
    }

    public function deleted($id)
    {
        $this->db->where('lbr_id',$id);
        $this->db->delete(self::$table_lemburan);
    }
    public function get_data_id($id)
    {
        $this->db->select('*');
        $this->db->from(self::$table_lemburan);
        $this->db->join('tbl_m_karyawan','tbl_m_karyawan.kry_no = tbl_lemburan.kry_no');
        $this->db->where('lbr_id',$id);
        return $this->db->get();
    }

    public function check_id($id)
    {
        $this->db->where('lbr_id',$id);
        $query = $this->db->get(self::$table_lemburan);
        if($query->num_rows() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from(self::$table_lemburan);
        $this->db->join('tbl_m_karyawan','tbl_m_karyawan.kry_no = tbl_lemburan.kry_no');
        $this->db->order_by('lbr_tanggal,lbr_jam_mulai,lbr_jam_selesai','asc');
        return $this->db->get();
    }

    public function get_lemburan_byuser($userid)
    {
        $this->db->select('*');
        $this->db->from(self::$table_lemburan);
        $this->db->join('tbl_m_karyawan','tbl_m_karyawan.kry_no = tbl_lemburan.kry_no');
        $this->db->where('tbl_lemburan.kry_no',$userid);
        return $this->db->get();
    }

}