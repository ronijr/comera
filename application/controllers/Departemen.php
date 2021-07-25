<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_departemen');
    }

    //View data departemen
    public function index()
    {
        $data['departemen'] = $this->md_departemen->get_all()->result();
        $data['title']  = 'Data Departemen';
        $this->template->load('dept/index',$data);
    }

    //View form departemen
    public function create()
    {
        $get_code = $this->md_departemen->get_code()->result();
        $data["code"] = $get_code[0]->code;
        $data['title']  = 'Tambah data Departemen';
        $this->template->load('dept/create',$data);
    }

    //Proses simpan data departemen ke database
    public function docreate()
    {
        $config = array(
                array(
                        'field' => 'name',
                        'label' => 'Nama',
                        'rules' => 'required',
                        'errors' => array(
                            'required' => '%s tidak boleh kosong',
                         ),
                ),
                array(
                        'field' => 'code',
                        'label' => 'Kode',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => '%s tidak boleh kosong',
                        ),
                ),
        );

        $this->form_validation->set_rules($config);

        $data['title']  = 'Tambah data Departemen';

        if($this->form_validation->run() == false)
        {
            
            $this->template->load('dept/create',$data);
        } else 
        {
            $kode = $this->input->post('code');
            $name = $this->input->post('name');
            $desk = $this->input->post('deskripsi');

            $data = [
                'dept_code' => $kode,
                'dept_nama' => $name,
                'dept_deskripsi' => $desk
            ];

            $this->md_departemen->insert($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect(base_url('departemen/create'));

        }
    
    }

    //View form edit departemen
    public function update($id)
    {
        if(!$this->md_departemen->check_id($id)){
            $this->session->set_flashdata('warning', 'Departemen tidak ditemukan');
            redirect(base_url('dapartemen'));
          } else {
            $data = array(
              'title'  => 'Edit Data Departemen',
              'table'  => $this->md_departemen->get_data_id($id)->result(),
              'rowid'  => $id,
     
            );
            $this->template->load('dept/edit',$data);
         }
    }

    //Proses edit data departemen ke database
    public function doupdate($id)
    {

        if(!$this->md_departemen->check_id($id)){
            $this->session->set_flashdata('warning', 'Departemen tidak ditemukan');
            redirect(base_url('departemen/update/'.$id.''));
        }

        $config = array(
                array(
                        'field' => 'name',
                        'label' => 'Nama',
                        'rules' => 'required',
                        'errors' => array(
                            'required' => '%s tidak boleh kosong',
                         ),
                ),
                array(
                        'field' => 'code',
                        'label' => 'Kode',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => '%s tidak boleh kosong',
                        ),
                ),
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false)
        {
            
           $this->update($id);
        } else 
        {
            $name = $this->input->post('name');
            $desk = $this->input->post('deskripsi');

            $data = [
                'dept_nama' => $name,
                'dept_deskripsi' => $desk
            ];

            $this->md_departemen->update($id,$data);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect(base_url('departemen/update/'.$id.''));

        }
    }

    public function deleted()
    {
         $id = (int)$this->input->post('id',TRUE);
         if(! $this->md_departemen->check_id($id)){
           $response=array(
             'result' => 'error',
             'msg'    => 'Departemen tidak ditemukan'
           );
         } else {
           $this->md_departemen->deleted($id);
           $response= array(
             'result' => 'success',
             'msg'    => 'Data berhasil dihapus'
           );
         }
    
         $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($response));
    }
}