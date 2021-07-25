<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_karyawan');
        $this->load->model('md_pinjaman');
    }

    public function index()
    {
        $data['title'] = 'Data Pinjaman Karyawan';
        $data['pinjaman'] = $this->md_pinjaman->get_all()->result();
        $this->template->load('pinjaman/index',$data);
    }

    public function create()
    {

        $data['title'] = 'Tambah Data Pinjaman Karyawan';
        $userid = $this->input->get('userid');
        $data['karyawan'] = '';
        $data['userid']   = '';
        if(!empty($userid))
        {
            $data['karyawan'] = $this->md_karyawan->get_by_userid($userid)->result();
            if(empty($data['karyawan']))
            {
                $this->session->set_flashdata('warning', 'Karyawan dengan User Id <strong>'.$userid.'</strong> tidak ditemukan.');
                redirect(base_url('pinjaman/create'));
            }
            $data['userid']   = $userid;
        }
        
        $this->template->load('pinjaman/create',$data);
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
                    'field' => 'tanggal_pinjam',
                    'label' => 'Tanggal Pinjaman',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                    ),
            ),
            array(
                'field' => 'nilai',
                'label' => 'Nilai Pinjaman',
                'rules' => 'required|numeric',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                        'numeric' => '%s hanya boleh angka',
                ),
            ),
            array(
                'field' => 'jatuh_tempo',
                'label' => 'Tanggal Jatuh Tempo',
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

            $kry_no             = $this->input->post('user_id');
            $kry_nama           = $this->input->post('name');
            $tanggal_pinjam     = $this->input->post('tanggal_pinjam');
            $jatuh_tempo        = $this->input->post('jatuh_tempo');
            $nilai_pinjam       = $this->input->post('nilai');
            $deskripsi          = $this->input->post('deskripsi');
            $txj_created_at     = date('Y-m-d H:i:s');
            $txj_created_by     = $this->session->userdata('data_user')[0]->kry_no;

        
            $data = [
                'txj_code'              => $this->md_pinjaman->get_code()->result()[0]->code,
                'kry_no'                => $kry_no,
                'kry_nama'              => $kry_nama,
                'txj_tanggal_pinjam'    => $tanggal_pinjam,
                'txj_nilai_pinjam'      => $nilai_pinjam,
                'txj_deskripsi'         => $deskripsi,
                'txj_jatuh_tempo'       => $jatuh_tempo,
                'txj_created_at'        => $txj_created_at,
                'txj_created_by'        => $txj_created_by,
                'txj_parent_id'         => $txj_created_by
            ];

            $this->md_pinjaman->insert($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect(base_url('pinjaman/create'));
        }

    }

    public function update($id)
    {
        if(!$this->md_pinjaman->check_id($id)){
            $this->session->set_flashdata('warning', 'Pinjaman tidak ditemukan');
            redirect(base_url('pinjaman'));
       } else {
            $data['title'] = "Edit Data Pinjaman";
            $data['pinjaman'] = $this->md_pinjaman->get_by_id($id)->result();
            $this->template->load('pinjaman/edit',$data);
        }
     
    }

    public function doupdate($id)
    {
        if(!$this->md_pinjaman->check_id($id)){
           $this->session->set_flashdata('warning', 'Pinjaman tidak ditemukan');
           redirect(base_url('pinjaman'));
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
                    'field' => 'tanggal_pinjam',
                    'label' => 'Tanggal Pinjaman',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                    ),
            ),
            array(
                'field' => 'nilai',
                'label' => 'Nilai Pinjaman',
                'rules' => 'required|numeric',
                'errors' => array(
                        'required' => '%s tidak boleh kosong',
                        'numeric' => '%s hanya boleh angka',
                ),
            ),
            array(
                'field' => 'jatuh_tempo',
                'label' => 'Tanggal Jatuh Tempo',
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

            $kry_no             = $this->input->post('user_id');
            $kry_nama           = $this->input->post('name');
            $tanggal_pinjam     = $this->input->post('tanggal_pinjam');
            $jatuh_tempo        = $this->input->post('jatuh_tempo');
            $nilai_pinjam       = $this->input->post('nilai');
            $deskripsi          = $this->input->post('deskripsi');
            $txj_created_at     = date('Y-m-d H:i:s');
            $txj_created_by     = $this->session->userdata('data_user')[0]->kry_no;

        
            $data = [
                'kry_nama'              => $kry_nama,
                'txj_tanggal_pinjam'    => $tanggal_pinjam,
                'txj_nilai_pinjam'      => $nilai_pinjam,
                'txj_deskripsi'         => $deskripsi,
                'txj_jatuh_tempo'       => $jatuh_tempo,
                'txj_updated_at'        => $txj_created_at,
                'txj_updated_by'        => $txj_created_by,
            ];

            $this->md_pinjaman->update($data,$id);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect(base_url('pinjaman/update/'.$id.''));
        }

    }

    public function pembayaran($parent,$ids="")
    {
        $id = (!empty($this->input->get('id'))) ? $this->input->get('id') : $ids;
        if(!$this->md_pinjaman->check_id($parent)){
            $this->session->set_flashdata('warning', 'Pinjaman tidak ditemukan');
            redirect(base_url('pinjaman'));
       } else {
            $data['title'] = "Pembayaran Pinjaman";
            $data['pembayaran'] = $this->md_pinjaman->get_by_pembayaran_id($id)->result();
            $data['pinjaman'] = $this->md_pinjaman->get_by_id($parent)->result();
            $data['pembayarans'] = $this->md_pinjaman->get_by_pembayaran($parent)->result();
            $data['id']  = $id;
            $this->template->load('pinjaman/bayar',$data);
        }
    }

    public function dopembayaran($parent)
    {
        $id = $this->input->post('id');

        if(!$this->md_pinjaman->check_id($parent)){
           $this->session->set_flashdata('warning', 'Pinjaman tidak ditemukan');
           redirect(base_url('pinjaman'));
        }

        if(empty($id))
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
                        'field' => 'tanggal_bayar',
                        'label' => 'Tanggal Bayar',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => '%s tidak boleh kosong',
                        ),
                ),
                array(
                    'field' => 'nilai',
                    'label' => 'Nilai Bayar',
                    'rules' => 'required|numeric|callback_bayar_check',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                            'numeric' => '%s hanya boleh angka',
                    ),
                ),
            );
    
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === false)
            {
                $this->pembayaran($parent,"");
            } else {
    
                $kry_no             = $this->input->post('user_id');
                $kry_nama           = $this->input->post('name');
                $tanggal_pinjam     = $this->input->post('tanggal_pinjam');
                $jatuh_tempo        = $this->input->post('jatuh_tempo');
                $nilai_pinjam       = $this->input->post('nilai_pinjaman');
                $nilai_bayar        = $this->input->post('nilai');
                $tanggal_bayar      = $this->input->post('tanggal_bayar');
                $deskripsi          = $this->input->post('deskripsi');
                $txj_updated_at     = date('Y-m-d H:i:s');
                $txj_updated_by     = $this->session->userdata('data_user')[0]->kry_no;
    
            
                $data = [
                    'txj_code'              => $this->md_pinjaman->get_code_bayar()->result()[0]->code,
                    'kry_no'                => $kry_no,
                    'kry_nama'              => $kry_nama,
                    'txj_tanggal_pinjam'    => $tanggal_pinjam,
                    'txj_nilai_pinjam'      => $nilai_pinjam,
                    'txj_deskripsi'         => $deskripsi,
                    'txj_jatuh_tempo'       => $jatuh_tempo,
                    'txj_tanggal_bayar'     => $tanggal_bayar,
                    'txj_nilai_bayar'       => $nilai_bayar,
                    'txj_created_at'        => $txj_updated_at,
                    'txj_created_by'       => $txj_updated_by,
                    'txj_parent_id'         => $parent
                ];
    
                $this->md_pinjaman->insert($data);
                $this->session->set_flashdata('success', 'Pembayaran berhasil disimpan.');
                redirect(base_url('pinjaman/pembayaran/'.$parent.''));
            }
        } else 
        {
            if(!$this->md_pinjaman->check_id($id)){
                $this->session->set_flashdata('warning', 'Riwayat Pembayaran tidak ditemukan');
                redirect(base_url('pinjaman/pembayaran/'.$parent.''));
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
                        'field' => 'tanggal_bayar',
                        'label' => 'Tanggal Bayar',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => '%s tidak boleh kosong',
                        ),
                ),
                array(
                    'field' => 'nilai',
                    'label' => 'Nilai Bayar',
                    'rules' => 'required|numeric|callback_bayar_check',
                    'errors' => array(
                            'required' => '%s tidak boleh kosong',
                            'numeric' => '%s hanya boleh angka',
                    ),
                ),
            );
    
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === false)
            {
                $this->pembayaran($parent,$id);
            } else {
    
                $kry_nama           = $this->input->post('name');
                $nilai_bayar        = $this->input->post('nilai');
                $tanggal_bayar      = $this->input->post('tanggal_bayar');
                $deskripsi          = $this->input->post('deskripsi');
                $txj_updated_at     = date('Y-m-d H:i:s');
                $txj_updated_by     = $this->session->userdata('data_user')[0]->kry_no;
    
            
                $data = [
                    'kry_nama'              => $kry_nama,
                    'txj_deskripsi'         => $deskripsi,
                    'txj_tanggal_bayar'     => $tanggal_bayar,
                    'txj_nilai_bayar'       => $nilai_bayar,
                    'txj_updated_at'        => $txj_updated_at,
                    'txj_updated_by'        => $txj_updated_by,
                ];
    
                $this->md_pinjaman->update($data,$id);
                $this->session->set_flashdata('success', 'Pembayaran berhasil diubah.');
                redirect(base_url('pinjaman/pembayaran/'.$parent.''));
            }
        }

        

    }
    
    // callback method
	public function bayar_check()
	{

         $nilai_bayar        = $this->input->post('nilai');
         $sisa_pinjaman      = $this->input->post('sisa_pinjaman');

        if ($nilai_bayar <= $sisa_pinjaman && $sisa_pinjaman !=  0)
		{
			return true;

		} else
		{
			// set error
			$this->form_validation->set_message('bayar_check', 'Nilai Bayar tidak boleh 0 atau lebih besar dari sisa pinjaman');
			return false;
		}
	}

    public function deleted()
    {
         $id = (int)$this->input->post('id',TRUE);
         if(! $this->md_pinjaman->check_id($id)){
           $response=array(
             'result' => 'error',
             'msg'    => 'Tunjangan tidak ditemukan'
           );
         } else {
           $this->md_pinjaman->deleted($id);
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