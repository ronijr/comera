<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_jabatan');
    }

     //View data jabatan
    public function index()
    {
        $data['jabatan'] = $this->md_jabatan->get_all()->result();
        $data['title']  = 'Data Jabatan';
        $this->template->load('jabatan/index', $data);
    }

    //View form tambah data jabatan
    public function create()
    {
        $get_code = $this->md_jabatan->get_code()->result();
        $data["code"] = $get_code[0]->code;
        $data['title']  = 'Tambah Data Jabatan';
        $this->template->load('jabatan/create',$data);
    }

    //Proses simpan data jabatan ke database
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


        if($this->form_validation->run() == false)
        {
            $this->create();
        } else 
        {
            $kode = $this->input->post('code');
            $name = $this->input->post('name');
            $desk = $this->input->post('deskripsi');

            $data = [
                'jbt_code' => $kode,
                'jbt_nama' => $name,
                'jbt_deskripsi' => $desk,
                'jbt_created_at' => date('Y-m-d h:i:s'),
                'jbt_created_by' => $this->session->userdata('data_user')[0]->kry_no,
            ];

            $this->md_jabatan->insert($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect(base_url('jabatan/create'));

        }
    }

    //View form edit departemen
    public function update($id)
    {
        if(!$this->md_jabatan->check_id($id)){
            $this->session->set_flashdata('warning', 'Jabatan tidak ditemukan');
            redirect(base_url('jabatan'));
          } else {
            $data = array(
              'title'  => 'Edit Data Jabatan',
              'table'  => $this->md_jabatan->get_data_id($id)->result(),
              'rowid'  => $id,
     
            );
            $this->template->load('jabatan/edit',$data);
         }
    }

    //Proses edit data jabatan ke database
    public function doupdate($id)
    {

        if(!$this->md_jabatan->check_id($id)){
            $this->session->set_flashdata('warning', 'Jabatan tidak ditemukan');
            redirect(base_url('jabatan/update/'.$id.''));
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
                'jbt_nama' => $name,
                'jbt_deskripsi' => $desk,
                'jbt_updated_at' => date('Y-m-d h:i:s'),
                'jbt_updated_by' => $this->session->userdata('data_user')[0]->kry_no
            ];

            $this->md_jabatan->update($id,$data);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect(base_url('jabatan/update/'.$id.''));

        }
    }

    public function deleted()
    {
         $id = (int)$this->input->post('id',TRUE);
         if(! $this->md_jabatan->check_id($id)){
           $response=array(
             'result' => 'error',
             'msg'    => 'Jabatan tidak ditemukan'
           );
         } else {
           $this->md_jabatan->deleted($id);
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