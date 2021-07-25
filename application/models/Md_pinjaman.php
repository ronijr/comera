<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_pinjaman extends CI_Model 
{
    private static $table_pinjaman = "tbl_txn_pinjaman";

    public function insert($data)
    {
        $this->db->insert(self::$table_pinjaman, $data);
    }

    public function update($data, $id)
    {
        $this->db->where('txj_id',$id);
        $this->db->update(self::$table_pinjaman, $data);
    }

     //Dapatkan kode unique
     public function get_code()
     {
         $this->db->select("CONCAT('PJ',DATE_FORMAT(SYSDATE(),'%y%m%d'),LPAD(nvl(max(substring(txj_code,9,3)),0)+1,3,'0')) AS code");
         $this->db->where('SUBSTR(txj_code,3,6) = DATE_FORMAT(CURDATE(),\'%y%m%d\')');
         $this->db->order_by("txj_code","desc");
         return $this->db->get(self::$table_pinjaman);
     }


     public function get_code_bayar()
     {
         $this->db->select("CONCAT('PB',DATE_FORMAT(SYSDATE(),'%y%m%d'),LPAD(nvl(max(substring(txj_code,9,3)),0)+1,3,'0')) AS code");
         $this->db->where('SUBSTR(txj_code,3,6) = DATE_FORMAT(CURDATE(),\'%y%m%d\')');
         $this->db->like('txj_code','PB','after');
         $this->db->order_by("txj_code","desc");
         return $this->db->get(self::$table_pinjaman);
     }


     public function get_all()
     {
         $this->db->select('
                tbl_m_karyawan.kry_no,
                tbl_m_karyawan.kry_nama,
                tbl_m_karyawan.kry_jabatan,
                tbl_m_karyawan.kry_dept_nama,
                tbl_m_karyawan.kry_image,
                tbl_txn_pinjaman.txj_id,
                tbl_txn_pinjaman.txj_code,
                tbl_txn_pinjaman.txj_tanggal_pinjam,
                tbl_txn_pinjaman.txj_nilai_pinjam,
                tbl_txn_pinjaman.txj_jatuh_tempo,
                tbl_txn_pinjaman.txj_deskripsi,
                nvl(sum(c.txj_nilai_bayar),0) txj_nilai_bayar,
                nvl(tbl_txn_pinjaman.txj_nilai_pinjam - nvl(sum(c.txj_nilai_bayar),0),0) sisa_pinjaman
         ');
         $this->db->from('tbl_txn_pinjaman');
         $this->db->join('tbl_m_karyawan','tbl_m_karyawan.kry_no = tbl_txn_pinjaman.kry_no');
         $this->db->join('tbl_txn_pinjaman c','c.txj_parent_id=tbl_txn_pinjaman.txj_id','left');
         $this->db->where('tbl_txn_pinjaman.txj_parent_id',0);
         $this->db->order_by('tbl_txn_pinjaman.txj_code','desc');
         $this->db->group_by('tbl_txn_pinjaman.txj_id');
         return $this->db->get();
     }

      //Check id 
      public function check_id($id) {
        $this->db->where('txj_id',$id);
        $query = $this->db->get(self::$table_pinjaman);
        return ($query->num_rows() == 1) ? true : false;
    }

    public function get_by_id($id)
    {
        $this->db->select('
            tbl_m_karyawan.kry_no,
            tbl_m_karyawan.kry_nama,
            tbl_m_karyawan.kry_jabatan,
            tbl_m_karyawan.kry_dept_nama,
            tbl_m_karyawan.kry_image,
            tbl_txn_pinjaman.txj_id,
            tbl_txn_pinjaman.txj_code,
            tbl_txn_pinjaman.txj_tanggal_pinjam,
            tbl_txn_pinjaman.txj_tanggal_bayar,
            tbl_txn_pinjaman.txj_nilai_pinjam,
            tbl_txn_pinjaman.txj_nilai_bayar,
            tbl_txn_pinjaman.txj_jatuh_tempo,
            tbl_txn_pinjaman.txj_deskripsi,
            nvl(sum(c.txj_nilai_bayar),0) txj_nilai_bayar,
            nvl(tbl_txn_pinjaman.txj_nilai_pinjam - nvl(sum(c.txj_nilai_bayar),0),0) sisa_pinjaman
            ');
        $this->db->from('tbl_txn_pinjaman');
        $this->db->join('tbl_m_karyawan','tbl_m_karyawan.kry_no = tbl_txn_pinjaman.kry_no');
        $this->db->join('tbl_txn_pinjaman c','c.txj_parent_id=tbl_txn_pinjaman.txj_id','left');
        $this->db->where('tbl_txn_pinjaman.txj_id',$id);
        $this->db->where('tbl_txn_pinjaman.txj_parent_id',0);
        $this->db->order_by('tbl_txn_pinjaman.txj_code','desc');
        $this->db->group_by('tbl_txn_pinjaman.txj_parent_id');
        return $this->db->get();
    }

    public function get_by_pembayaran($id)
    {
        $this->db->select('
                tbl_m_karyawan.kry_no,
                tbl_m_karyawan.kry_nama,
                tbl_m_karyawan.kry_jabatan,
                tbl_m_karyawan.kry_dept_nama,
                tbl_m_karyawan.kry_image,
                tbl_txn_pinjaman.txj_id,
                tbl_txn_pinjaman.txj_parent_id,
                tbl_txn_pinjaman.txj_code,
                tbl_txn_pinjaman.txj_tanggal_pinjam,
                tbl_txn_pinjaman.txj_tanggal_bayar,
                tbl_txn_pinjaman.txj_nilai_bayar,
                tbl_txn_pinjaman.txj_nilai_pinjam,
                tbl_txn_pinjaman.txj_jatuh_tempo,
                tbl_txn_pinjaman.txj_deskripsi,
         ');
         $this->db->from('tbl_txn_pinjaman');
         $this->db->join('tbl_m_karyawan','tbl_m_karyawan.kry_no = tbl_txn_pinjaman.kry_no','left');
         $this->db->where('txj_parent_id',$id);
         $this->db->order_by('tbl_txn_pinjaman.txj_code','desc');
         return $this->db->get();
    }

    public function get_by_pembayaran_id($id)
    {
        $this->db->select('
                tbl_m_karyawan.kry_no,
                tbl_m_karyawan.kry_nama,
                tbl_m_karyawan.kry_jabatan,
                tbl_m_karyawan.kry_dept_nama,
                tbl_m_karyawan.kry_image,
                tbl_txn_pinjaman.txj_id,
                tbl_txn_pinjaman.txj_parent_id,
                tbl_txn_pinjaman.txj_code,
                tbl_txn_pinjaman.txj_tanggal_pinjam,
                tbl_txn_pinjaman.txj_nilai_pinjam,
                tbl_txn_pinjaman.txj_tanggal_bayar,
                tbl_txn_pinjaman.txj_nilai_bayar,
                tbl_txn_pinjaman.txj_jatuh_tempo,
                tbl_txn_pinjaman.txj_deskripsi,
         ');
         $this->db->from('tbl_txn_pinjaman');
         $this->db->join('tbl_m_karyawan','tbl_m_karyawan.kry_no = tbl_txn_pinjaman.kry_no','left');
         $this->db->where('txj_id',$id);
         $this->db->order_by('tbl_txn_pinjaman.txj_code','asc');
         return $this->db->get();
    }

    public function deleted($id)
    {
        $this->db->where('txj_id',$id);
        $this->db->delete(self::$table_pinjaman);
    }

    public function get_total()
    {
        $this->db->select('nvl(sum(txj_nilai_pinjam),0) nilai_pinjam');
        $this->db->from('tbl_txn_pinjaman');
        $this->db->where('txj_parent_id',0);
        $query = $this->db->get();

        $qty = 0;
        if($query->num_rows() > 0)
        {
            $qty = $query->result()[0]->nilai_pinjam;
        }
        return $qty;
    }
}