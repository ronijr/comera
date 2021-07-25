<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->secure->is_login();
        $this->load->model('md_karyawan');
        $this->load->model('md_absensi');
        $this->load->model('md_pinjaman');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['karyawan'] = $this->md_karyawan->get_num_rows();
        $data['absensi_sakit_ijin'] = $this->md_absensi->get_absen_status(['I','S']);
        $data['absensi_hadir'] = $this->md_absensi->get_absen_status(['H']);
        $data['total_pinjaman'] = $this->md_pinjaman->get_total();
        $this->template->load('dashboard', $data);
    }

}