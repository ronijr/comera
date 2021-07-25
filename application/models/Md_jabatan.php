<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_jabatan extends CI_Model 
{
    private static $table_jabatan = "tbl_m_jabatan";

    //Dapatkan kode unique
    public function get_code()
    {
        $this->db->select("CONCAT('J',LPAD(nvl(max(substring(jbt_code,3,3)),0)+1,3,'0')) AS code");
        $this->db->order_by("jbt_code","desc");
        return $this->db->get(self::$table_jabatan);
    }

    //Insert data
    public function insert($data)
    {
        $this->db->insert(self::$table_jabatan,$data);
    }

    //Update data
    public function update($id, $data)
    {
        $this->db->where('jbt_id',$id);
        $this->db->update(self::$table_jabatan, $data);
    }

    //Dapatkan semua data
    public function get_all()
    {
        $this->db->order_by('jbt_code','asc');
        return $this->db->get(self::$table_jabatan);
    }

     //Check id 
     public function check_id($id) {
        $this->db->where('jbt_id',$id);
        $query = $this->db->get(self::$table_jabatan);
        return ($query->num_rows() == 1) ? true : false;
    }

    //Dapatkan data berdasarkan id
    public function get_data_id($id){
        $this->db->where('jbt_id',$id);
        return $this->db->get(self::$table_jabatan);
    }

    //Delete data
    public function deleted($id) {
        $this->db->where('jbt_id',$id);
        $this->db->delete(self::$table_jabatan);
    }

    public function get_nama($code)
    {
        $this->db->where('jbt_id',$code);
        $query = $this->db->get(self::$table_jabatan);
        $nama = "";
        if($query->num_rows() == 1)
        {
            $nama = $query->result()[0]->jbt_nama;
        }

        return $nama;
    }
}