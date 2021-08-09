<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
class Absensi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_absensi');
        $this->load->model('md_karyawan');
    }

    public function index()
    {
        $data['title'] = "Absensi Karyawan";
        $data['absensi'] = $this->md_absensi->get_all()->result();
        $this->template->load('absensi/index',$data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Absensi";
        $userid = $this->input->get('userid');
        $data['karyawan'] = '';
        $data['userid']   = '';
        if(!empty($userid))
        {
            $data['karyawan'] = $this->md_karyawan->get_by_userid($userid)->result();
            if(empty($data['karyawan']))
            {
                $this->session->set_flashdata('warning', 'Karyawan dengan User Id <strong>'.$userid.'</strong> tidak ditemukan.');
                redirect(base_url('absensi/create'));
            }
            $data['userid']   = $userid;
        }
        
        $this->template->load('absensi/create',$data);
    }

    public function docreate()
    {
        $config = array(
            array(
                    'field' => 'user_id',
                    'label' => 'User Id',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong',
                     ),
            ),
            array(
                    'field' => 'tanggal',
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                    ),
            ),
            array(
                'field' => 'jam',
                'label' => 'Jam Masuk',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === false)
        {
            $this->create();
        } else {

            $config["upload_path"]  = './uploads/absensi_file/';
            $config["allowed_types"] = 'gif|png|jpg|jpeg';
            $config["max_size"]      = '2000';
    
            $this->load->library('upload',$config);

            if(!empty($_FILES['file_doc']))
            {
                if(!$this->upload->do_upload('file_doc'))
                {
                    $this->session->set_flashdata('warning', $this->upload->display_errors());
                    $this->create();
                } 
            }

            $image_metadata = $this->upload->data();

            $name_file = "";
            if(!empty($image_metadata)){
                $name_file = 'uploads/absensi_file/'.$image_metadata['file_name'];
            }

            $kry_id             = $this->input->post('kry_id');
            $kry_no             = $this->input->post('user_id');
            $kry_nama           = $this->input->post('name');
            $abs_in             = $this->input->post('jam').":00";
            $abs_tanggal        = $this->input->post('tanggal');
            $abs_deskripsi      = "";
            $abs_status         = $this->input->post('status');
            $abs_dokumen        = $name_file;
            $abs_created_at     = date('Y-m-d H:i:s');
            $abs_created_by     = $this->session->userdata('data_user')[0]->kry_no;

        
            $data = [
                'kry_id'         => $kry_id,
                'kry_no'         => $kry_no,
                'kry_nama'       => $kry_nama,
                'abs_in'         => $abs_in,
                'abs_tanggal'    => $abs_tanggal,
                'abs_deskripsi'  => '',
                'abs_status'     => $abs_status,
                'abs_created_at' => $abs_created_at,
                'abs_dokumen'    => $abs_dokumen,
                'abs_created_by' => $abs_created_by
            ];

            $this->md_absensi->insert($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect(base_url('absensi/create'));
        }

    }

    public function update($id)
    {
        if(!$this->md_absensi->check_id($id)){
            $this->session->set_flashdata('warning', 'Absensi tidak ditemukan');
            redirect(base_url('absensi'));
       } else {
            $data['title'] = "Edit Data Absensi";
            $data['absensi'] = $this->md_absensi->get_by_id($id)->result();
            $this->template->load('absensi/edit',$data);
        }
     
    }

    public function doupdate($id)
    {
        if(!$this->md_absensi->check_id($id)){
           $this->session->set_flashdata('warning', 'Absensi tidak ditemukan');
           redirect(base_url('absensi'));
        }

        $config = array(
            array(
                    'field' => 'user_id',
                    'label' => 'User Id',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s tidak boleh kosong',
                     ),
            ),
            array(
                    'field' => 'tanggal',
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                    ),
            ),
            array(
                'field' => 'jam',
                'label' => 'Jam Masuk',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                ),
            )
        );

        $this->form_validation->set_rules($config);
        if($this->form_validation->run() === false)
        {
            $this->update($id);
        } else {

            $config["upload_path"]  = './uploads/absensi_file/';
            $config["allowed_types"] = 'gif|png|jpg|jpeg';
            $config["max_size"]      = '2000';
    
            $this->load->library('upload',$config);

            $name_file = $this->input->post('file_exists');

            if(!empty($_FILES['file_doc']['name']))
            {
                if(!$this->upload->do_upload('file_doc'))
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
                    $name_file = 'uploads/absensi_file/'.$image_metadata['file_name'];
                }
            }

            $kry_id             = $this->input->post('kry_id');
            $kry_no             = $this->input->post('user_id');
            $kry_nama           = $this->input->post('name');
            $abs_in             = $this->input->post('jam').":00";
            $abs_tanggal        = $this->input->post('tanggal');
            $abs_deskripsi      = "";
            $abs_status         = $this->input->post('status');
            $abs_dokumen        = $name_file;
            $abs_created_at     = date('Y-m-d H:i:s');
            $abs_created_by     = $this->session->userdata('data_user')[0]->kry_no;

        
            $data = [
                'kry_id'         => $kry_id,
                'kry_no'         => $kry_no,
                'kry_nama'       => $kry_nama,
                'abs_in'         => $abs_in,
                'abs_tanggal'    => $abs_tanggal,
                'abs_deskripsi'  => '',
                'abs_status'     => $abs_status,
                'abs_updated_at' => $abs_created_at,
                'abs_dokumen'    => $abs_dokumen,
                'abs_updated_by' => $abs_created_by
            ];

            $this->md_absensi->update($data, $id);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect(base_url('absensi/update/'.$id.''));
        }

    }

    public function laporan()
    {
        $data['title'] = 'Laporan Absen';
        $this->template->load('absensi/laporan/index',$data);
    }

    public function laporan_view()
    {
    
        $s_date = $this->input->get('s_date');
        $e_date = $this->input->get('e_date');
        $userid = $this->input->get('userid');

        $data['s_date']  = $s_date;
        $data['e_date']  = $e_date;
        $data['userid']  = $userid;
        $data['absensi'] = $this->md_absensi->get_absen_karyawan( $userid,$s_date,$e_date)->result();
        $html = $this->load->view('absensi/laporan/view',$data,true);

        $pdifFilePath = "laporan-absensi";
        $dompdf = new Dompdf;
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream($pdifFilePath.".pdf", array("Attachment" => 0));
    }
}