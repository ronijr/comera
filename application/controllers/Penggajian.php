<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_penggajian');
        $this->load->model('md_tunjangan');
        $this->load->model('md_potongan');
    }

    public function index()
    {
        $data['title'] = 'Gaji Karyawan';
        $data['karyawan'] = $this->md_penggajian->get_list_karyawan()->result();
        $this->template->load('penggajian/index',$data);
    }

    public function detail($userid)
    {
        $data['title'] = 'Detail Gaji Karyawan';
        $data['karyawan'] = $this->md_penggajian->get_list_karyawan_byid($userid)->result();
        $data['gaji_total'] = $this->md_penggajian->gaji_total($userid)->result();
        $data['tunjangan'] = $this->md_tunjangan->get_data_level($data['karyawan'][0]->kry_jabatan_id)->result();
        $data['tunjangans'] = $this->md_tunjangan->get_tunjangan_byuser($userid)->result();
        $this->template->load('penggajian/detail',$data);
    }

    public function doupdate()
    {
        $id     = $this->input->post('pg_id');
        $userid = $this->input->post('userid');
        if($id == 0)
        {
            $config = array(
                array(
                        'field' => 'gaji_pokok',
                        'label' => 'Gaji Pokok',
                        'rules' => 'required|numeric',
                        'errors' => array(
                            'required' => '%s tidak boleh kosong',
                            'numeric' => '%s Hanya boleh angka'
                         ),
                ),
            );

            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === false)
            {
                $this->detail($userid);
            } else {

                $kry_no = $userid;
                $kry_nama = $this->input->post('name');
                $gaji_pokok = $this->input->post('gaji_pokok');
                $created_at = date('Y-m-d H:i:s');
                $created_by = $this->session->userdata('data_user')[0]->kry_no;
                $status = $this->input->post('status');

                $data = [
                    'kry_no' => $kry_no,
                    'kry_nama' => $kry_nama,
                    'pg_status' =>$status,
                    'pg_gaji_pokok' => $gaji_pokok,
                    'pg_created_at' => $created_at,
                    'pg_created_by' => $created_by
                ];

                $this->md_penggajian->insert($data);
                $this->session->set_flashdata('success','Penggajian berhasil diubah');
                redirect(base_url('penggajian/detail/'.$kry_no.''));
            }

        } else {
            $config = array(
                array(
                        'field' => 'gaji_pokok',
                        'label' => 'Gaji Pokok',
                        'rules' => 'required|numeric',
                        'errors' => array(
                            'required' => '%s tidak boleh kosong',
                            'numeric' => '%s Hanya boleh angka'
                         ),
                ),
            );

            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === false)
            {
                $this->detail($userid);
            } else {

                $kry_no = $userid;
                $kry_nama = $this->input->post('name');
                $gaji_pokok = $this->input->post('gaji_pokok');
                $status = $this->input->post('status');
                $updated_at = date('Y-m-d H:i:s');
                $updated_by = $this->session->userdata('data_user')[0]->kry_no;

                $data = [
                    'kry_no' => $kry_no,
                    'kry_nama' => $kry_nama,
                    'pg_status' => $status,
                    'pg_gaji_pokok' => $gaji_pokok,
                    'pg_updated_at' => $updated_at,
                    'pg_updated_by' => $updated_by
                ];

                $this->md_penggajian->update($data,$id);
                $this->session->set_flashdata('success','Penggajian berhasil diubah');
                redirect(base_url('penggajian/detail/'.$kry_no.''));
            }
        }
    }

    public function addtunjangan()
    {
       $tj_code = $this->input->post('tunjangan');
       $kry_no = $this->input->post('kry_no');
       $kry_nama = $this->input->post('kry_nama');
       $tj_harga = $this->input->post('nilai');

       $tj_code = explode('|',$tj_code);
       if(!empty($tj_code))
       {
           $data = [
                'kry_no' => $kry_no,
                'kry_nama' => $kry_nama,
                'tj_id'    => $tj_code[0],
                'tj_nilai' => $tj_harga,
                'txp_created_at' => date('Y-m-d H:i:s'),
                'txp_created_at' => $this->session->userdata('data_user')[0]->kry_no
           ];
           $this->md_penggajian->insert_tunjangan($data);
           $this->session->set_flashdata('success','Tunjangan berhasil ditambahkan');
           redirect(base_url('penggajian/detail/'.$kry_no.''));
       }
    }

    public function tunjangan_delete()
    {
        $id = (int)$this->input->post('id',TRUE);
         if(! $this->md_penggajian->check_tunjangan($id)){
           $response=array(
             'result' => 'error',
             'msg'    => 'Tunjangan tidak ditemukan'
           );
         } else {
           $this->md_penggajian->deleted_tunjangan($id);
           $response= array(
             'result' => 'success_load',
             'msg'    => 'Data berhasil dihapus'
           );
         }
    
         $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($response));
    }

    public function transaksi()
    {
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');
        $data['title'] = 'Transaiksi Penggajian';
        $data['tahun'] = (empty($tahun)) ? date('Y') : $tahun;
        $data['bulan'] = (empty($bulan)) ? date('m') : $bulan;
        $karyawan = $this->md_penggajian->get_list_karyawan_priode($data['tahun'], $data['bulan'] )->result();
        $data['karyawan'] = $karyawan;
        $this->template->load('penggajian/transaksi',$data);
    }

    public function transaksi_create()
    {
        $userid = $this->input->get('userid');
        $pembayaran_id = $this->input->get('txpid');
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        $data['tahun'] = (empty($tahun)) ? date('Y') : $tahun;
        $data['bulan'] = (empty($bulan)) ? date('m') : $bulan;
        $data['title'] = 'Pembayaran Gaji Karyawan';
        $data['karyawan'] = $this->md_penggajian->get_list_karyawan_byid($userid)->result();
        $data['gaji_total'] = $this->md_penggajian->gaji_total($userid)->result();
        $data['potongan'] = $this->md_potongan->get_data_level($data['karyawan'][0]->kry_jabatan_id)->result();
        $data['potongans'] = $this->md_potongan->get_tunjangan_byuser($userid)->result();
        $data['tunjangans'] = $this->md_tunjangan->get_tunjangan_byuser($userid)->result();
        $this->template->load('penggajian/detail_transaksi',$data);
    }

    public function transaksi_docreate()
    {
        $id     = $this->input->post('txp_id');
        $userid = $this->input->post('userid');

        if(empty($id))
        {
            $kry_no     = $userid;

            $data = [
                'kry_no' => $kry_no,
                'txp_code' => $this->md_penggajian->get_code()->result()[0]->code
            ];


            $this->md_penggajian->insert_transaksi($data);



            $this->session->set_flashdata('success','Potongan Gaji berhasil ditambahkan');
            redirect(base_url('penggajian/transaksi_create?/'.$kry_no.''));
        }
    }

}