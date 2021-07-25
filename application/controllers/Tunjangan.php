<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_tunjangan');
    }

    public function index()
    {
        $data['title'] = 'Tunjangan Karyawan';
        $data['tunjangan'] = $this->md_tunjangan->get_all()->result();
        $this->template->load('tunjangan/index',$data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Tunjangan Karyawan';
        $get_code = $this->md_tunjangan->get_code()->result();
        $data["code"] = $get_code[0]->code;
        $this->template->load('tunjangan/create',$data);
    }

    public function docreate()
    {
        $config = array(
            array(
                'field' => 'code',
                'label' => 'Kode Tunjangan',
                'rules' => 'required|is_unique[tbl_tunjangan.tj_code]',
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
            $keterngan  = $this->input->post('deskripsi');

            $data = [
                'tj_code' => $kode,
                'tj_nama' => $name,
                'tj_nilai' => $jumlah,
                'tj_level' => $level,
                'tj_keterangan' => $keterngan,
                'tj_created_at' => date('Y-m-d H:i:s'),
                'tj_created_by' => $this->session->userdata('data_user')[0]->kry_no
            ];

            $this->md_tunjangan->insert($data);
            $this->session->set_flashdata('success','Data berhasil ditambahkan.');
            redirect(base_url('tunjangan/create'));
        }
    }

    public function update($id)
    {
        if(!$this->md_tunjangan->check_id($id)){
            $this->session->set_flashdata('warning', 'Tunjangan tidak ditemukan');
            redirect(base_url('tunjangan'));
       } else {
            $data['title'] = "Edit Data Tunjangan";
            $data['tunjangan'] = $this->md_tunjangan->get_data_id($id)->result();
            $this->template->load('tunjangan/edit',$data);
        }
    }

    public function doupdate($id)
    {
        if(!$this->md_tunjangan->check_id($id)){
            $this->session->set_flashdata('warning', 'Tunjangan tidak ditemukan');
            redirect(base_url('tunjangan'));
        } 

        $config = array(
            array(
                'field' => 'code',
                'label' => 'Kode Tunjangan',
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
                    'field' => 'Nilai',
                    'label' => 'Jumlah Tunjangan',
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
            $keterngan  = $this->input->post('deskripsi');

            $data = [
                'tj_nama' => $name,
                'tj_nilai' => $jumlah,
                'tj_level' => $level,
                'tj_keterangan' => $keterngan,
                'tj_updated_at' => date('Y-m-d H:i:s'),
                'tj_updated_by' => $this->session->userdata('data_user')[0]->kry_no
            ];

            $this->md_tunjangan->update($data,$id);
            $this->session->set_flashdata('success','Data berhasil diubah.');
            redirect(base_url('tunjangan/update/'.$id.''));
        }
    }

    public function deleted()
    {
         $id = (int)$this->input->post('id',TRUE);
         if(! $this->md_tunjangan->check_id($id)){
           $response=array(
             'result' => 'error',
             'msg'    => 'Tunjangan tidak ditemukan'
           );
         } else {
           $this->md_tunjangan->deleted($id);
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