<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lemburan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('md_lemburan');
        $this->load->model('md_karyawan');
    }

    public function index()
    {
        $data['title'] = 'Data Lemburan';
        $data['lemburan'] = $this->md_lemburan->get_all()->result();
        $this->template->load('lemburan/index',$data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Lemburan';
        $userid = $this->input->get('userid');
        $data['karyawan'] = '';
        $data['userid']   = '';
        if(!empty($userid))
        {
            $data['karyawan'] = $this->md_karyawan->get_by_userid($userid)->result();
            if(empty($data['karyawan']))
            {
                $this->session->set_flashdata('warning', 'Karyawan dengan User Id <strong>'.$userid.'</strong> tidak ditemukan.');
                redirect(base_url('lemburan/create'));
            }
            $data['userid']   = $userid;
        }
        
        $this->template->load('lemburan/create',$data);
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
                    'field' => 'jam_mulai',
                    'label' => 'Jam Mulai',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'jam_akhir',
                'label' => 'Jam Selesai',
                'rules' => 'required|callback_check_range_hours',
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
             
            $userid = $this->input->post('user_id');
            $nama   = $this->input->post('name');
            $tanggal = $this->input->post('tanggal');
            $jam_mulai = date('H:i:s',strtotime($this->input->post('jam_mulai').':00'));
            $jam_akhir =  date('H:i:s',strtotime($this->input->post('jam_akhir').':00'));
            $keterangan = $this->input->post('deskripsi');

            $date_1 = new DateTime(str_replace('/','-',''.$tanggal.' '.$jam_mulai.''));
            $date_2 = new DateTime(str_replace('/','-',''.$tanggal.' '.$jam_akhir.''));
            $interval = $date_1->diff($date_2);

            $data = [
                'kry_no'          => $userid,
                'kry_nama'        => $nama,
                'lbr_tanggal'     => $tanggal,
                'lbr_jam_mulai'   => $jam_mulai,
                'lbr_jam_selesai' => $jam_akhir,
                'lbr_qty'         => (int)$interval->format('%H'),
                'lbr_deskripsi'   => $keterangan,
                'lbr_created_at'  => date('Y-m-d H:i:s'),
                'lbr_created_by'  => $this->session->userdata('data_user')[0]->kry_no,
                'lbr_updated_at'  => date('Y-m-d H:i:s'),
                'lbr_updated_by'  => $this->session->userdata('data_user')[0]->kry_no
            ];

            $this->md_lemburan->insert($data);
            $this->session->set_flashdata('success','Data berhasil disimpan.');
            redirect(base_url('lemburan/create'));
        }


    }

    public function check_range_hours()
    {

        $jam_mulai = $this->input->post('jam_mulai');
        $jam_akhir = $this->input->post('jam_akhir');
        $tanggal = $this->input->post('tanggal');

        $date_1 = new DateTime(str_replace('/','-',''.$tanggal.' '.$jam_mulai.':00'));
        $date_2 = new DateTime(str_replace('/','-',''.$tanggal.' '.$jam_akhir.':00'));
        $interval = $date_1->diff($date_2);

        if((int)$interval->format('%H') <= 0)
        {
            $this->form_validation->set_message('check_range_hours', 'Jam selesai tidak boleh kurang dari 1 Jam');
			return false;
        } else {
            return true;
        }
    }

    public function update($id)
    {   
        if(!$this->md_lemburan->check_id($id)){
            $this->session->set_flashdata('warning', 'Lemburan tidak ditemukan');
            redirect(base_url('lemburan'));
          } else {
            $data = array(
              'title'  => 'Edit Data Lemburan',
              'lemburan'  => $this->md_lemburan->get_data_id($id)->result(),
              'rowid'  => $id,
     
            );
            $this->template->load('lemburan/edit',$data);
         }

    }

    public function doupdate($id)
    {

        if(!$this->md_lemburan->check_id($id)){
            $this->session->set_flashdata('warning', 'Lemburan tidak ditemukan');
            redirect(base_url('lemburan'));
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
                    'field' => 'jam_mulai',
                    'label' => 'Jam Mulai',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                ),
            ),
            array(
                'field' => 'jam_akhir',
                'label' => 'Jam Selesai',
                'rules' => 'required|callback_check_range_hours',
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
             
            $tanggal = $this->input->post('tanggal');
            $jam_mulai = date('H:i:s',strtotime($this->input->post('jam_mulai').':00'));
            $jam_akhir =  date('H:i:s',strtotime($this->input->post('jam_akhir').':00'));
            $keterangan = $this->input->post('deskripsi');

            $date_1 = new DateTime(str_replace('/','-',''.$tanggal.' '.$jam_mulai.''));
            $date_2 = new DateTime(str_replace('/','-',''.$tanggal.' '.$jam_akhir.''));
            $interval = $date_1->diff($date_2);

            $data = [
                'lbr_tanggal'     => $tanggal,
                'lbr_jam_mulai'   => $jam_mulai,
                'lbr_jam_selesai' => $jam_akhir,
                'lbr_qty'         => (int)$interval->format('%H'),
                'lbr_deskripsi'   => $keterangan,
                'lbr_updated_at'  => date('Y-m-d H:i:s'),
                'lbr_updated_by'  => $this->session->userdata('data_user')[0]->kry_no
            ];

            $this->md_lemburan->update($data,$id);
            $this->session->set_flashdata('success','Data berhasil diubah.');
            redirect(base_url('lemburan/update/'.$id.''));
        }

    }

    public function deleted()
    {
         $id = (int)$this->input->post('id',TRUE);
         if(! $this->md_lemburan->check_id($id)){
           $response=array(
             'result' => 'error',
             'msg'    => 'Lemburan tidak ditemukan'
           );
         } else {
           $this->md_lemburan->deleted($id);
           $response= array(
             'result' => 'success_load',
             'msg'    => 'Data berhasil dihapus'
           );
         }
    
         $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($response));
    }
}