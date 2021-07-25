<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_departemen extends CI_Model 
{

    private static $table_dept = "tbl_m_dept"; 

    //Insert data
    public function insert($data)
    {
        $this->db->insert(self::$table_dept,$data);
    }
    
    //Update data
    public function update($id, $data)
    {
        $this->db->where('dept_id',$id);
        $this->db->update(self::$table_dept, $data);
    }

    //Dapatakan kode unique
    public function get_code()
    {
        $this->db->select("CONCAT('D',LPAD(nvl(max(substring(dept_code,3,3)),0)+1,3,'0')) AS code");
        $this->db->order_by("dept_code","desc");
        return $this->db->get(self::$table_dept);
    }

    //Dapatkan semua data
    public function get_all()
    {
        $this->db->order_by('dept_code','asc');
        return $this->db->get(self::$table_dept);
    }

    //Check id 
    public function check_id($id) {
        $this->db->where('dept_id',$id);
        $query = $this->db->get(self::$table_dept);
        return ($query->num_rows() == 1) ? true : false;
    }

    //Dapatkan data berdasarkan id
    public function get_data_id($id){
        $this->db->where('dept_id',$id);
        return $this->db->get(self::$table_dept);
    }

    //Delete data
    public function deleted($id) {
        $this->db->where('dept_id',$id);
        $this->db->delete(self::$table_dept);
    }

    public function get_nama($code)
    {
        $this->db->where('dept_code',$code);
        $query = $this->db->get(self::$table_dept);
        $nama = "";
        if($query->num_rows() == 1)
        {
            $nama = $query->result()[0]->dept_nama;
        }

        return $nama;
    }

}