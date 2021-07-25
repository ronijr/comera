<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_tunjangan extends CI_Model 
{

    private static $table_tunjangan = "tbl_tunjangan";

    public function insert($data)
    {
        $this->db->insert(self::$table_tunjangan, $data);
    }

    public function update($data, $id)
    {
        $this->db->where('tj_id',$id);
        $this->db->update(self::$table_tunjangan, $data);
    }

    //Dapatkan semua data
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from(self::$table_tunjangan);
        $this->db->join('tbl_m_jabatan','tbl_m_jabatan.jbt_id = tbl_tunjangan.tj_level','left');
        $this->db->order_by('tj_code','asc');
        return $this->db->get();
    }

    //Dapatakan kode unique
    public function get_code()
    {
        $this->db->select("CONCAT('T',LPAD(nvl(max(substring(tj_code,3,3)),0)+1,3,'0')) AS code");
        $this->db->order_by("tj_code","desc");
        return $this->db->get(self::$table_tunjangan);
    }

    //Check id 
    public function check_id($id) {
        $this->db->where('tj_id',$id);
        $query = $this->db->get(self::$table_tunjangan);
        return ($query->num_rows() == 1) ? true : false;
    }

     //Dapatkan data berdasarkan id
     public function get_data_id($id){
        $this->db->where('tj_id',$id);
        return $this->db->get(self::$table_tunjangan);
    }

    public function get_data_level($level)
    {
        $this->db->where('tj_level',$level);
        $this->db->order_by('tj_code','desc');
        return $this->db->get(self::$table_tunjangan);
    }


    public function get_tunjangan_byuser($userid)
    {
        $this->db->select('*');
        $this->db->from(self::$table_tunjangan);
        $this->db->join('tbl_txn_tunjangan','tbl_txn_tunjangan.tj_id = tbl_tunjangan.tj_id');
        $this->db->where('kry_no',$userid);
        return $this->db->get();
    }

    public function deleted($id)
    {
        $this->db->where('tj_id',$id);
        $this->db->delete(self::$table_tunjangan);
    }
}