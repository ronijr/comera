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
        if($this->session->userdata('data_user')[0]->usr_type == 'karyawan'){
            $this->db->like('tbl_m_karyawan.kry_no',$this->session->userdata('data_user')[0]->kry_no);
        }
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

    public function get_sub_q_status($userid, $date, $status)
    {
        $this->db->select('count(*)');
        $this->db->from(self::$table_absensi);
        $this->db->where('kry_no ='.$userid.'');
        $this->db->where('abs_tanggal ='.$date.'');
        $this->db->where('abs_status',$status);
        return $this->db->get_compiled_select();
    }
    public function get_absen_karyawan($userid, $s_date, $e_date)
    {

        $this->db->select('tbl_absensi.abs_tanggal,
            tbl_m_karyawan.kry_no,
            tbl_m_karyawan.kry_nama,
            tbl_m_karyawan.kry_jabatan,
            tbl_m_karyawan.kry_dept_nama,
            ('.$this->get_sub_q_status('tbl_m_karyawan.kry_no','tbl_absensi.abs_tanggal','H').') hadir,
            ('.$this->get_sub_q_status('tbl_m_karyawan.kry_no','tbl_absensi.abs_tanggal','S').') sakit,
            ('.$this->get_sub_q_status('tbl_m_karyawan.kry_no','tbl_absensi.abs_tanggal','I').') ijin,
            ('.$this->get_sub_q_status('tbl_m_karyawan.kry_no','tbl_absensi.abs_tanggal','A').') alpa,
            ('.$this->get_sub_q_status('tbl_m_karyawan.kry_no','tbl_absensi.abs_tanggal','C').') cuti
            ');
        $this->db->from(self::$table_absensi);
        $this->db->join('tbl_m_karyawan','tbl_absensi.kry_no = tbl_m_karyawan.kry_no','left');
        $this->db->where('abs_tanggal >=',$s_date);
        $this->db->where('abs_tanggal <=',$e_date);
        $this->db->like('tbl_m_karyawan.kry_no',$userid,'after');
        $this->db->group_by('tbl_m_karyawan.kry_no,  tbl_m_karyawan.kry_nama, tbl_m_karyawan.kry_nama, tbl_m_karyawan.kry_dept_nama,tbl_absensi.abs_tanggal');
        $this->db->order_by('tbl_absensi.abs_tanggal,tbl_m_karyawan.kry_no,  tbl_m_karyawan.kry_nama','asc');
        return $this->db->get();
    }

}