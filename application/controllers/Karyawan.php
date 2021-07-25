<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_karyawan');
        $this->load->model('md_users');
        $this->load->model('md_jabatan');
        $this->load->model('md_departemen');
    }

    public function index()
    {
        $data['title'] = "Data Karyawan";
        $data['karyawan'] = $this->md_karyawan->get_all()->result();
        $this->template->load('karyawan/index', $data);
    }

    public function create()
    {
        
        $data['code']  = $this->md_karyawan->get_code()->result();
        $data['title'] = "Tambah Data Karyawan";
        $data['error_foto'] = "";
        $this->template->load('karyawan/create',$data);
    }

    public function docreate()
    {

        $config = array(
            array(
                'field' => 'code',
                'label' => 'User ID',
                'rules' => 'required|is_unique[tbl_m_karyawan.kry_no]',
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
                    'field' => 'tempat_lahir',
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                    ),
            ),
            array(
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'jk',
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'status_perkawinan',
                'label' => 'Status Perkawinan',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'jabatan',
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'departemen',
                'label' => 'Departemen',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'tanggal_gabung',
                'label' => 'Tanggal Gabung',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'pendidikan_terakhir',
                'label' => 'Pendidikan Terakhir',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'no_rek',
                'label' => 'No Rekening',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'bank',
                'label' => 'Bank',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'nama_rekening',
                'label' => 'Nama Rekening',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'telepon',
                'label' => 'No Telepon',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),

            array(
                'field' => 'hak_akses',
                'label' => 'Hak Akses',
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

            $config["upload_path"]  = './uploads/foto/';
            $config["allowed_types"] = 'gif|png|jpg|jpeg';
            $config["max_size"]      = '2000';
    
            $this->load->library('upload',$config);

            if(!empty($_FILES['foto']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    $this->session->set_flashdata('warning', $this->upload->display_errors());
                    $this->create();
                } 
            }

            $image_metadata = $this->upload->data();

            $name_file = "";
            if(!empty($image_metadata)){
                $name_file = 'uploads/foto/'.$image_metadata['file_name'];
            }

            $code                = $this->input->post('code');
            $nama                = $this->input->post('name');
            $tempat_lahir        = $this->input->post('tempat_lahir');
            $tanggal_lahir       = $this->input->post('tanggal_lahir');
            $alamat              = $this->input->post('alamat');
            $jenis_kelamin       = $this->input->post('jk');
            $status_kawin        = $this->input->post('status_perkawinan');
            $agama               = $this->input->post('agama');
            $tanggal_gabung      = $this->input->post('tanggal_gabung');
            $email               = $this->input->post('email');
            $jabatan             = $this->input->post('jabatan');
            $departemen          = $this->input->post('departemen');
            $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
            $no_rek              = $this->input->post('no_rek');
            $bank                = $this->input->post('bank');
            $nama_rekening       = $this->input->post('nama_rekening');
            $telepon             = $this->input->post('telepon');
            $hak_akses             = $this->input->post('hak_akses');
            

            $departemen_name = $this->md_departemen->get_nama($departemen);
            $jabatan_name    = $this->md_jabatan->get_nama($jabatan);


            $data = [
                'kry_no'                => $code,
                'kry_nama'              => $nama,
                'kry_tempat_lahir'      => $tempat_lahir,
                'kry_tgl_lahir'     => $tanggal_lahir,
                'kry_image'             => $name_file,
                'kry_alamat'            => $alamat,
                'kry_status_perkawinan' => $status_kawin,
                'kry_agama'             => $agama,
                'kry_jenis_kelamin'     => $jenis_kelamin,
                'kry_email'             => $email,
                'kry_telepon'           => $telepon,
                'kry_tgl_gabung'        => $tanggal_gabung,
                'kry_jabatan'           => $jabatan_name,
                'kry_jabatan_id'        => $jabatan,
                'kry_dept_nama'         => $departemen_name,
                'kry_dept_code'         => $departemen,
                'kry_no_rekening'       => $no_rek,
                'kry_bank'              => $bank,
                'kry_nama_rekening'     => $nama_rekening,
                'kry_pend_terakhir'     => $pendidikan_terakhir,
                'kry_created_at'        => date('Y-m-d H:i:s'),
                'kry_created_by'        => $this->session->userdata('data_user')[0]->kry_no
            ];

            $data_user = [
                    'usr_username'  => $code,
                    'usr_password'  => md5($code),
                    'usr_type'      => $hak_akses,
                    'usr_status'    => 'active'
            ];

            $this->md_users->insert($data_user);
            $this->md_karyawan->insert($data);

            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect(base_url('karyawan/create'));

           
        }
    }

    public function update($id)
    {
       if(!$this->md_karyawan->check_id($id)){
            $this->session->set_flashdata('warning', 'Karyawan tidak ditemukan');
            redirect(base_url('karyawan'));
       } else {
            $data['title'] = "Edit Data Karyawan";
            $data['karyawan'] = $this->md_karyawan->get_by_id($id)->result();
            $this->template->load('karyawan/edit',$data);
        }
     
    }


    public function doupdate($id)
    {
        

       if(!$this->md_karyawan->check_id($id)){
            $this->session->set_flashdata('warning', 'Karyawan tidak ditemukan');
            redirect(base_url('karyawan'));
       }

        $config = array(
            array(
                'field' => 'code',
                'label' => 'User ID',
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
                    'field' => 'tempat_lahir',
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                    ),
            ),
            array(
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'jk',
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'status_perkawinan',
                'label' => 'Status Perkawinan',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'jabatan',
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'departemen',
                'label' => 'Departemen',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'tanggal_gabung',
                'label' => 'Tanggal Gabung',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'pendidikan_terakhir',
                'label' => 'Pendidikan Terakhir',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'no_rek',
                'label' => 'No Rekening',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'bank',
                'label' => 'Bank',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'nama_rekening',
                'label' => 'Nama Rekening',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'telepon',
                'label' => 'No Telepon',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),

            array(
                'field' => 'hak_akses',
                'label' => 'Hak Akses',
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

            $config["upload_path"]  = './uploads/foto/';
            $config["allowed_types"] = 'gif|png|jpg|jpeg';
            $config["max_size"]      = '2000';
    
            $this->load->library('upload',$config);

            $name_file = $this->input->post('image_file');

            if(!empty($_FILES['foto']['name']))
            {
                if(!$this->upload->do_upload('foto'))
                {
                    $this->session->set_flashdata('warning', $this->upload->display_errors());
                    $this->update($id);
                } 


                if(file_exists($name_file))
                {
                    unlink($name_file);
                }
                
                $image_metadata = $this->upload->data();

                if(!empty($image_metadata)){
                    $name_file = 'uploads/foto/'.$image_metadata['file_name'];
                }
            }

                
                

                $code                = $this->input->post('code');
                $nama                = $this->input->post('name');
                $tempat_lahir        = $this->input->post('tempat_lahir');
                $tanggal_lahir       = $this->input->post('tanggal_lahir');
                $alamat              = $this->input->post('alamat');
                $jenis_kelamin       = $this->input->post('jk');
                $status_kawin        = $this->input->post('status_perkawinan');
                $agama               = $this->input->post('agama');
                $tanggal_gabung      = $this->input->post('tanggal_gabung');
                $email               = $this->input->post('email');
                $jabatan             = $this->input->post('jabatan');
                $departemen          = $this->input->post('departemen');
                $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
                $no_rek              = $this->input->post('no_rek');
                $bank                = $this->input->post('bank');
                $nama_rekening       = $this->input->post('nama_rekening');
                $telepon             = $this->input->post('telepon');
                $hak_akses           = $this->input->post('hak_akses');
                

                $departemen_name = $this->md_departemen->get_nama($departemen);
                $jabatan_name    = $this->md_jabatan->get_nama($jabatan);


                $data = [
                    'kry_nama'              => $nama,
                    'kry_tempat_lahir'      => $tempat_lahir,
                    'kry_tgl_lahir'         => $tanggal_lahir,
                    'kry_image'             => $name_file,
                    'kry_alamat'            => $alamat,
                    'kry_status_perkawinan' => $status_kawin,
                    'kry_agama'             => $agama,
                    'kry_jenis_kelamin'     => $jenis_kelamin,
                    'kry_email'             => $email,
                    'kry_telepon'           => $telepon,
                    'kry_tgl_gabung'        => $tanggal_gabung,
                    'kry_jabatan'           => $jabatan_name,
                    'kry_jabatan_id'        => $jabatan,
                    'kry_dept_nama'         => $departemen_name,
                    'kry_dept_code'         => $departemen,
                    'kry_no_rekening'       => $no_rek,
                    'kry_bank'              => $bank,
                    'kry_nama_rekening'     => $nama_rekening,
                    'kry_pend_terakhir'     => $pendidikan_terakhir,
                    'kry_updated_at'        => date('Y-m-d H:i:s'),
                    'kry_updated_by'        => $this->session->userdata('data_user')[0]->kry_no
                ];

                $data_user = [
                        'usr_type'      => $hak_akses,
                ];

                $this->md_users->update($data_user, $id);
                $this->md_karyawan->update($data, $id);

                $this->session->set_flashdata('success', 'Data berhasil diubah.');
                redirect(base_url('karyawan/update/'.$id.''));
        }
    }

}