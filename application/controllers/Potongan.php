<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_potongan');
    }

    public function index()
    {
        $data['title'] = 'Potongan Gaji Karyawan';
        $data['potongan'] = $this->md_potongan->get_all()->result();
        $this->template->load('potongan/index',$data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Potongan Gaji Karyawan';
        $get_code = $this->md_potongan->get_code()->result();
        $data["code"] = $get_code[0]->code;
        $this->template->load('potongan/create',$data);
    }

    public function docreate()
    {
        $config = array(
            array(
                'field' => 'code',
                'label' => 'Kode',
                'rules' => 'required|is_unique[tbl_m_potongan.tp_code]',
                'errors' => array(
                    'required' => '%s tidak boleh kosong',
                    'is_unique' => '%s sudah ada'
                 ),
            ),
            array(
                    'field' => 'name',
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong',
                     ),
            ),
            array(
                    'field' => 'jumlah',
                    'label' => 'Nilai',
                    'rules' => 'required|numeric',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                            'numeric' => '%s hanya boleh angka'
                    ),
            ),
            array(
                'field' => 'level',
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
        );

        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === false)
        {
            $this->create();
        } else {

            $kode       = $this->input->post('code');
            $name       = $this->input->post('name');
            $jumlah     = $this->input->post('jumlah');
            $level      = $this->input->post('level');

            $data = [
                'tp_code' => $kode,
                'tp_nama' => $name,
                'tp_nilai' => $jumlah,
                'tp_level' => $level,
                'tp_created_at' => date('Y-m-d H:i:s'),
                'tp_created_by' => $this->session->userdata('data_user')[0]->kry_no
            ];

            $this->md_potongan->insert($data);
            $this->session->set_flashdata('success','Data berhasil ditambahkan.');
            redirect(base_url('potongan/create'));
        }
    }

    public function update($id)
    {
        if(!$this->md_potongan->check_id($id)){
            $this->session->set_flashdata('warning', 'Potongan Gaji tidak ditemukan');
            redirect(base_url('tunjangan'));
       } else {
            $data['title'] = "Edit Data Potongan Gaji";
            $data['potongan'] = $this->md_potongan->get_data_id($id)->result();
            $this->template->load('potongan/edit',$data);
        }
    }

    public function doupdate($id)
    {
        if(!$this->md_potongan->check_id($id)){
            $this->session->set_flashdata('warning', 'Potongan Gaji tidak ditemukan');
            redirect(base_url('potongan'));
        } 

        $config = array(
            array(
                'field' => 'code',
                'label' => 'Kode',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s tidak boleh kosong',
                    'is_unique' => '%s sudah ada'
                 ),
            ),
            array(
                    'field' => 'name',
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong',
                     ),
            ),
            array(
                    'field' => 'jumlah',
                    'label' => 'Nilai',
                    'rules' => 'required|numeric',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                            'numeric' => '%s hanya boleh angka'
                    ),
            ),
            array(
                'field' => 'level',
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
        );

        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === false)
        {
            $this->update($id);
        } else {

            $name       = $this->input->post('name');
            $jumlah     = $this->input->post('jumlah');
            $level      = $this->input->post('level');

            $data = [
                'tp_nama' => $name,
                'tp_nilai' => $jumlah,
                'tp_level' => $level,
                'tp_updated_at' => date('Y-m-d H:i:s'),
                'tp_updated_by' => $this->session->userdata('data_user')[0]->kry_no
            ];

            $this->md_potongan->update($data,$id);
            $this->session->set_flashdata('success','Data berhasil diubah.');
            redirect(base_url('potongan/update/'.$id.''));
        }
    }

    public function deleted()
    {
         $id = (int)$this->input->post('id',TRUE);
         if(! $this->md_potongan->check_id($id)){
           $response=array(
             'result' => 'error',
             'msg'    => 'Potongan Gaji tidak ditemukan'
           );
         } else {
           $this->md_potongan->deleted($id);
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