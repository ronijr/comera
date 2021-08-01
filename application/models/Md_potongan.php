<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_potongan extends CI_Model 
{
    private static $table_potongan = "tbl_m_potongan";

    public function insert($data)
    {
        $this->db->insert(self::$table_potongan, $data);
    }

    public function insert_potongan($data)
    {
        $this->db->insert('tbl_txn_potongan', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('tp_id',$id);
        $this->db->update(self::$table_potongan, $data);
    }

    //Dapatkan semua data
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from(self::$table_potongan);
        $this->db->join('tbl_m_jabatan','tbl_m_jabatan.jbt_id = tbl_m_potongan.tp_level','left');
        $this->db->order_by('tp_code','asc');
        return $this->db->get();
    }

    //Dapatakan kode unique
    public function get_code()
    {
        $this->db->select("CONCAT('P',LPAD(nvl(max(substring(tp_code,3,3)),0)+1,3,'0')) AS code");
        $this->db->order_by("tp_code","desc");
        return $this->db->get(self::$table_potongan);
    }

    //Check id 
    public function check_id($id) {
        $this->db->where('tp_id',$id);
        $query = $this->db->get(self::$table_potongan);
        return ($query->num_rows() == 1) ? true : false;
    }

     //Dapatkan data berdasarkan id
     public function get_data_id($id){
        $this->db->where('tp_id',$id);
        return $this->db->get(self::$table_potongan);
    }

    public function get_data_level($level)
    {
        $this->db->where('tp_level',$level);
        $this->db->order_by('tp_code','desc');
        return $this->db->get(self::$table_potongan);
    }


    public function get_tunjangan_byuser($userid)
    {
        $this->db->select('*');
        $this->db->from(self::$table_potongan);
        $this->db->join('tbl_txn_potongan','tbl_txn_potongan.tp_id = tbl_m_potongan.tp_id');
        $this->db->join('tbl_txn_penggajian','tbl_txn_penggajian.txp_id = tbl_txn_potongan.txp_id');
        $this->db->where('kry_no',$userid);
        return $this->db->get();
    }

    public function deleted($id)
    {
        $this->db->where('tp_id',$id);
        $this->db->delete(self::$table_potongan);
    }

    public function check_id_potongan($id)
    {
        $this->db->where('txg_id',$id);
        $query = $this->db->get('tbl_txn_potongan');
        return ($query->num_rows() == 1) ? true : false;
    }

    public function deleted_potongan($id)
    {
        $this->db->where('txg_id',$id);
        $this->db->delete('tbl_txn_potongan');
    }
}