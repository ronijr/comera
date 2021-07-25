<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_penggajian extends CI_Model 
{
    private static $table_penggajian = "tbl_m_penggajian";


    //Dapatkan kode unique
    public function get_code()
    {
        $this->db->select("CONCAT('TXP',DATE_FORMAT(CURDATE(),'%y%m%d'),LPAD(nvl(max(substring(txp_code,9,3)),0)+1,3,'0')) AS code");
        $this->db->where('SUBSTR(txp_code,2,6)',"DATE_FORMAT(CURDATE(),'%y%m%d')");
        $this->db->order_by("txp_code","desc");
        return $this->db->get('tbl_txn_penggajian');
    }

    public function insert_transaksi($data)
    {
        $this->db->insert('tbl_txn_penggajian',$data);
    }

    public function get_list_karyawan()
    {
        $this->db->select('tbl_m_karyawan.kry_nama, 
                                tbl_m_karyawan.kry_no, 
                                tbl_m_karyawan.kry_image, 
                                tbl_m_karyawan.kry_jabatan, 
                                tbl_m_karyawan.kry_dept_nama,
                                nvl(tbl_m_penggajian.pg_gaji_pokok,0) pg_gaji_pokok,
                                tbl_m_penggajian.pg_status,
                                nvl(sum(tj_nilai),0) tunjangan,
                                nvl(sum(tj_nilai) + pg_gaji_pokok,0) gaji_pokok');
        $this->db->from('tbl_m_karyawan');
        $this->db->join('tbl_m_penggajian','tbl_m_karyawan.kry_no = tbl_m_penggajian.kry_no','left');
        $this->db->join('tbl_m_user','tbl_m_user.usr_username = tbl_m_karyawan.kry_no','left');
        $this->db->join('tbl_txn_tunjangan','tbl_txn_tunjangan.kry_no = tbl_m_karyawan.kry_no','left');
        $this->db->where_not_in('usr_type','owner');
        $this->db->group_by('tbl_m_karyawan.kry_no');
        return $this->db->get();
    }

    public function get_list_karyawan_byid($userid)
    {
        $this->db->select('tbl_m_karyawan.kry_nama, 
                                tbl_m_karyawan.kry_no, 
                                tbl_m_karyawan.kry_image, 
                                tbl_m_karyawan.kry_jabatan, 
                                tbl_m_karyawan.kry_dept_nama,
                                tbl_m_karyawan.kry_jabatan_id,
                                nvl(tbl_m_penggajian.pg_id,0) pg_id,
                                nvl(tbl_m_penggajian.pg_gaji_pokok,0) pg_gaji_pokok,
                                tbl_m_penggajian.pg_status');
        $this->db->from('tbl_m_karyawan');
        $this->db->join('tbl_m_penggajian','tbl_m_karyawan.kry_no = tbl_m_penggajian.kry_no','left');
        $this->db->join('tbl_m_user','tbl_m_user.usr_username = tbl_m_karyawan.kry_no','left');
        $this->db->where_not_in('usr_type','owner');
        $this->db->where('tbl_m_karyawan.kry_no',$userid);
        return $this->db->get();
    }

    public function get_list_karyawan_priode($tahun, $bulan)
    {
        $this->db->select('tbl_m_karyawan.kry_nama, 
                                tbl_m_karyawan.kry_no, 
                                tbl_m_karyawan.kry_image, 
                                tbl_m_karyawan.kry_jabatan, 
                                tbl_m_karyawan.kry_dept_nama,
                                tbl_m_karyawan.kry_jabatan_id,
                                nvl(tbl_m_penggajian.pg_id,0) pg_id,
                                nvl(tbl_txn_penggajian.txp_id,0) txp_id,
                                nvl(tbl_m_penggajian.pg_gaji_pokok,0) gaji_pokok,
                                nvl(sum(txg_nilai),0) potongan,
                                nvl(sum(tj_nilai),0) tunjangan,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'H\' AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') hadir,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'S\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') sakit,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'I\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') ijin,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'A\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') alpa,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'C\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') cuti,
                                tbl_m_penggajian.pg_status,
                                nvl((tbl_m_penggajian.pg_gaji_pokok + nvl(sum(tj_nilai),0)) - nvl(sum(txg_nilai),0),0)  gaji_total');
        $this->db->from('tbl_m_karyawan');
        $this->db->join('tbl_m_penggajian','tbl_m_karyawan.kry_no = tbl_m_penggajian.kry_no','left');
        $this->db->join('tbl_m_user','tbl_m_user.usr_username = tbl_m_karyawan.kry_no','left');
        $this->db->join('tbl_txn_tunjangan','tbl_txn_tunjangan.kry_no=tbl_m_karyawan.kry_no','left');
        $this->db->join('tbl_txn_penggajian','tbl_txn_penggajian.kry_no = tbl_m_karyawan.kry_no','left');
        $this->db->join('tbl_txn_potongan','tbl_txn_potongan.txp_id = tbl_txn_penggajian.txp_id','left');
        $this->db->join('tbl_m_potongan','tbl_m_potongan.tp_id = tbl_txn_potongan.tp_id','left');
        $this->db->where_not_in('usr_type','owner');
        $this->db->or_like('DATE_FORMAT(NVL(txp_periode,SYSDATE()), \'%Y\')',$tahun,'after');
        $this->db->or_like('DATE_FORMAT(NVL(txp_periode, SYSDATE()), \'%m\')',$bulan,'after');
        $this->db->group_by('tbl_txn_penggajian.txp_id,tbl_m_karyawan.kry_no');
        return $this->db->get();
    }

    public function insert($data)
    {
        $this->db->insert(self::$table_penggajian, $data);
    }

    public function update($data,$id)
    {
        $this->db->where('pg_id',$id);
        $this->db->update(self::$table_penggajian, $data);
    }

    public function gaji_total($userid)
    {
        $this->db->select('nvl(nvl(sum(tj_nilai),0) + pg_gaji_pokok,0) as gaji_total');
        $this->db->from('tbl_m_karyawan');
        $this->db->join('tbl_m_penggajian','tbl_m_penggajian.kry_no = tbl_m_karyawan.kry_no','left');
        $this->db->join('tbl_txn_tunjangan','tbl_txn_tunjangan.kry_no = tbl_m_karyawan.kry_no','left');
        $this->db->where('tbl_m_karyawan.kry_no',$userid);
        $this->db->group_by('tbl_m_karyawan.kry_no');
        return $this->db->get();
    }

    public function insert_tunjangan($data)
    {
        $this->db->insert('tbl_txn_tunjangan',$data);
    }

    public function check_tunjangan($id)
    {
        $this->db->where('txt_id',$id);
        $query = $this->db->get('tbl_txn_tunjangan');
        return ($query->num_rows() == 1) ? true : false;
    }

    public function deleted_tunjangan($id)
    {
        $this->db->where('txt_id',$id);
        $this->db->delete('tbl_txn_tunjangan');
    }
}