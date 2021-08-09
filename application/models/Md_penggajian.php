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
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function update_potongan($data, $id)
    {
        $this->db->where('txp_id',$id);
        $this->db->update('tbl_txn_penggajian',$data);
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
                                tbl_m_karyawan.kry_no_rekening,
                                tbl_m_karyawan.kry_bank,
                                tbl_m_karyawan.kry_nama_rekening,
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

    public function get_txn_penggajian($txp_id)
    {
        $this->db->select('tbl_txn_penggajian.txp_id,
        tbl_txn_penggajian.txp_code,
        tbl_txn_penggajian.txp_tanggal_bayar,
        tbl_txn_penggajian.txp_status,
        tbl_txn_penggajian.txp_gaji_total,
        tbl_txn_penggajian.txp_nilai_lemburan,
        tbl_txn_penggajian.txp_periode');
        $this->db->from('tbl_txn_penggajian');
        $this->db->join('tbl_txn_potongan','tbl_txn_potongan.txp_id = tbl_txn_penggajian.txp_id','left');
        $this->db->join('tbl_m_potongan','tbl_m_potongan.tp_id = tbl_txn_potongan.tp_id','left');
        $this->db->where('tbl_txn_penggajian.txp_id = '.$txp_id.'');
        return $this->db->get();
    }


    public function get_list_karyawan_byid2($userid,$periode)
    {
        $tahun = date('Y', strtotime($periode));
        $bulan = date('m',strtotime($periode));
        
        $this->db->select('tbl_m_karyawan.kry_nama, 
        tbl_m_karyawan.kry_no, 
        tbl_m_karyawan.kry_image, 
        tbl_m_karyawan.kry_jabatan, 
        tbl_m_karyawan.kry_dept_nama,
        tbl_m_karyawan.kry_jabatan_id,
        nvl(tbl_m_penggajian.pg_id,0) pg_id,
        nvl(tbl_m_penggajian.pg_gaji_pokok,0) pg_gaji_pokok,
        ('.$this->get_sub_q_txp_status($userid, $tahun, $bulan).') txp_status');
        $this->db->from('tbl_m_karyawan');
        $this->db->join('tbl_m_penggajian','tbl_m_karyawan.kry_no = tbl_m_penggajian.kry_no','left');
        $this->db->join('tbl_m_user','tbl_m_user.usr_username = tbl_m_karyawan.kry_no','left');
        $this->db->where_not_in('usr_type','owner');
        $this->db->where('tbl_m_karyawan.kry_no',$userid);
        return $this->db->get();
    }

    public function get_sub_q_txp_id($userid, $tahun, $bulan)
    {
        $this->db->select('txp_id');
        $this->db->from('tbl_txn_penggajian');
        $this->db->where('kry_no = '.$userid.'');
        $this->db->like('DATE_FORMAT(NVL(txp_periode,SYSDATE()), \'%Y-%m\')',$tahun.'-'.$bulan,'after');
        return $this->db->get_compiled_select();
    }

    public function get_sub_q_txp_status($userid, $tahun, $bulan)
    {
        $this->db->select('txp_status');
        $this->db->from('tbl_txn_penggajian');
        $this->db->where('kry_no = '.$userid.'');
        $this->db->like('DATE_FORMAT(NVL(txp_periode,SYSDATE()), \'%Y-%m\')',$tahun.'-'.$bulan,'after');
        return $this->db->get_compiled_select();
    }

    public function get_sub_nilai_potongan($userid, $tahun, $bulan)
    {
        $this->db->select('nvl(sum(txg_nilai),0)');
        $this->db->from('tbl_txn_penggajian');
        $this->db->join('tbl_txn_potongan','tbl_txn_potongan.txp_id = tbl_txn_penggajian.txp_id','left');
        $this->db->join('tbl_m_potongan','tbl_m_potongan.tp_id = tbl_txn_potongan.tp_id','left');
        $this->db->where('kry_no = '.$userid.'');
        $this->db->like('DATE_FORMAT(NVL(txp_periode,SYSDATE()), \'%Y-%m\')',$tahun.'-'.$bulan,'after');
        return $this->db->get_compiled_select();
    }

    public function get_list_karyawan_priode($tahun, $bulan, $userid = '')
    {

        
        $this->db->select('tbl_m_karyawan.kry_nama, 
                                tbl_m_karyawan.kry_no, 
                                tbl_m_karyawan.kry_image, 
                                tbl_m_karyawan.kry_jabatan, 
                                tbl_m_karyawan.kry_dept_nama,
                                tbl_m_karyawan.kry_jabatan_id,
                                nvl(tbl_m_penggajian.pg_id,0) pg_id,
                                nvl(('.$this->get_sub_q_txp_id('tbl_m_karyawan.kry_no',$tahun,$bulan).'),0) txp_id,
                                nvl(tbl_m_penggajian.pg_gaji_pokok,0) gaji_pokok,
                                nvl(('.$this->get_sub_nilai_potongan('tbl_m_karyawan.kry_no',$tahun,$bulan).'),0) potongan,
                                nvl(sum(tj_nilai),0) tunjangan,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'H\' AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') hadir,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'S\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') sakit,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'I\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') ijin,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'A\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') alpa,
                                (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'C\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') cuti,
                                tbl_m_penggajian.pg_status,
                                nvl((tbl_m_penggajian.pg_gaji_pokok + nvl(sum(tj_nilai),0)) - nvl(('.$this->get_sub_nilai_potongan('tbl_m_karyawan.kry_no',$tahun,$bulan).'),0),0)  gaji_total, 
                                ('.$this->get_sub_q_txp_status('tbl_m_karyawan.kry_no',$tahun, $bulan).') txp_status');
        $this->db->from('tbl_m_karyawan');
        $this->db->join('tbl_m_penggajian','tbl_m_karyawan.kry_no = tbl_m_penggajian.kry_no','left');
        $this->db->join('tbl_m_user','tbl_m_user.usr_username = tbl_m_karyawan.kry_no','left');
        $this->db->join('tbl_txn_tunjangan','tbl_txn_tunjangan.kry_no=tbl_m_karyawan.kry_no','left');
        $this->db->where_not_in('usr_type','owner');
        $this->db->like('tbl_m_karyawan.kry_no',$userid, 'after');
        $this->db->group_by('tbl_m_karyawan.kry_no');
        return $this->db->get();

        // $this->db->select('tbl_m_karyawan.kry_nama, 
        //     tbl_m_karyawan.kry_no, 
        //     tbl_m_karyawan.kry_image, 
        //     tbl_m_karyawan.kry_jabatan, 
        //     tbl_m_karyawan.kry_dept_nama,
        //     tbl_m_karyawan.kry_jabatan_id,
        //     nvl(tbl_m_penggajian.pg_id,0) pg_id,
        //     nvl(tbl_txn_penggajian.txp_id,0) txp_id,
        //     nvl(tbl_m_penggajian.pg_gaji_pokok,0) gaji_pokok,
        //     nvl(sum(txg_nilai),0) potongan,
        //     nvl(sum(tj_nilai),0) tunjangan,
        //     (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'H\' AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') hadir,
        //     (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'S\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') sakit,
        //     (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'I\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') ijin,
        //     (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'A\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') alpa,
        //     (select count(\'*\') from tbl_absensi where kry_no = tbl_m_karyawan.kry_no and abs_status = \'C\'  AND DATE_FORMAT(abs_tanggal, \'%Y-%m\') = \''.$tahun.'-'.$bulan.'\') cuti,
        //     tbl_m_penggajian.pg_status,
        //     nvl((tbl_m_penggajian.pg_gaji_pokok + nvl(sum(tj_nilai),0)) - nvl(sum(txg_nilai),0),0)  gaji_total, txp_status');
        // $this->db->from('tbl_m_karyawan');
        // $this->db->join('tbl_m_penggajian','tbl_m_karyawan.kry_no = tbl_m_penggajian.kry_no','left');
        // $this->db->join('tbl_m_user','tbl_m_user.usr_username = tbl_m_karyawan.kry_no','left');
        // $this->db->join('tbl_txn_tunjangan','tbl_txn_tunjangan.kry_no=tbl_m_karyawan.kry_no','left');
        // $this->db->join('tbl_txn_penggajian','tbl_txn_penggajian.kry_no = tbl_m_karyawan.kry_no','left');
        // $this->db->join('tbl_txn_potongan','tbl_txn_potongan.txp_id = tbl_txn_penggajian.txp_id','left');
        // $this->db->join('tbl_m_potongan','tbl_m_potongan.tp_id = tbl_txn_potongan.tp_id','left');
        // $this->db->where_not_in('usr_type','owner');
        // $this->db->where('txp_periode',null);
        // $this->db->group_by('tbl_txnd_penggajian.txp_id,tbl_m_karyawan.kry_no');
        // $query_2 = $this->db->get_compiled_select();

        // return $this->db->query($query_1.' UNION '.$query_2);
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

    public function gaji_total($userid, $periode)
    {
        $this->db->select('nvl(nvl(sum(tj_nilai),0) + pg_gaji_pokok +  (
            select nvl(sum(lbr_qty) * txp_nilai_lemburan,0) from tbl_txn_penggajian a, tbl_lemburan b
            where a.kry_no = b.kry_no
            AND txp_periode = \''.$periode.'\'
            AND  a.kry_no = \''.$userid.'\'
            group by a.kry_no, a.txp_id
            ) - (
                select NVL(sum(txg_nilai * txg_qty),0) from tbl_txn_penggajian a, tbl_txn_potongan b
                where a.txp_id = b.txp_id
                AND txp_periode = \''.$periode.'\'
                AND  a.kry_no = \''.$userid.'\'
                group by a.kry_no, a.txp_id
            ),nvl(sum(tj_nilai),0) + pg_gaji_pokok)
         as gaji_total,
         nvl(sum(tj_nilai),0) total_tunjangan,
        (
                select NVL(sum(txg_nilai * txg_qty),0) from tbl_txn_penggajian a, tbl_txn_potongan b
                where a.txp_id = b.txp_id
                AND txp_periode = \''.$periode.'\'
                AND  a.kry_no = \''.$userid.'\'
                group by a.kry_no, a.txp_id
         ) total_potongan,      
         (
            select nvl(sum(lbr_qty) * txp_nilai_lemburan,0) from tbl_txn_penggajian a, tbl_lemburan b
            where a.kry_no = b.kry_no
            AND txp_periode = \''.$periode.'\'
            AND  a.kry_no = \''.$userid.'\'
            group by a.kry_no, a.txp_id
            ) total_lemburan');
        $this->db->from('tbl_m_karyawan');
        $this->db->join('tbl_m_penggajian','tbl_m_penggajian.kry_no = tbl_m_karyawan.kry_no','left');
        $this->db->join('tbl_txn_tunjangan','tbl_txn_tunjangan.kry_no = tbl_m_karyawan.kry_no','left');
        $this->db->where('tbl_m_karyawan.kry_no',$userid);
        $this->db->group_by('tbl_m_karyawan.kry_no,pg_gaji_pokok');
        $query =  $this->db->get();
        return $query;
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