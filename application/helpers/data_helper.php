<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('get_agama'))
{
    function get_agama()
    {
        $agama = [
            'islam'=>'Islam',
            'protestan' => 'Protestan',
            'katolik'   => 'Katolik',
            'hindu' => 'Hindu',
            'buddha' =>'Buddha',
            'khonghucu' => 'Khonghucu'
        ];

        return $agama;
    }
}

if ( ! function_exists('get_jk'))
{
    function get_jk()
    {
        $jk = [
            'L'=>'Laki-laki',
            'P' => 'Perempuan',
        ];

        return $jk;
    }
}

if ( ! function_exists('get_bulan'))
{
    function get_bulan()
    {
        $bulan = [
            '01'=>'Januari',
            '02'=>'Februari',
            '03'=>'Maret',
            '04'=>'April',
            '05'=>'Mei',
            '06'=>'Juni',
            '07'=>'Juli',
            '08'=>'Agustus',
            '09'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember',
        ];

        return $bulan;
    }
}

if ( ! function_exists('get_tahun'))
{
    function get_tahun()
    {
        $result= [];
        for($tahun=2021; $tahun<=date('Y'); $tahun++)
        {
            $result[$tahun] = $tahun;
        }
        return $result;
    }
}

if ( ! function_exists('get_pendidikan'))
{
    function get_pendidikan()
    {
        $result = [
            'smp'=>'SMP',
            'sma' => 'SMA',
            'D3' => 'D3',
            'S1' => 'S1',
            'S2' => 'S2'
        ];

        return $result;
    }
}

if ( ! function_exists('get_status_perkawinan'))
{
    function get_status_perkawinan()
    {
        $status = [
            'Y'=>'Sudah Menikah',
            'N' => 'Belum Menikah',
        ];

        return $status;
    }
}

if ( ! function_exists('get_jabatan'))
{
    function get_jabatan()
    {
        $ci =& get_instance();
		$ci->load->model("md_jabatan");

        $jabatan = $ci->md_jabatan->get_all()->result();
        $result  = [];
        foreach($jabatan as $row)
        {   
            $result[$row->jbt_id] = $row->jbt_nama; 
        }

        return $result;
    }
}

if ( ! function_exists('get_departemen'))
{
    function get_departemen()
    {
        $ci =& get_instance();
		$ci->load->model("md_departemen");

        $jabatan = $ci->md_departemen->get_all()->result();
        $result  = [];
        foreach($jabatan as $row)
        {   
            $result[$row->dept_code] = $row->dept_nama; 
        }

        return $result;
    }
}

if ( ! function_exists('get_type_user'))
{
    function get_type_user()
    {
        $result = [
            'admin' => 'Admin',
            'owner' => 'Owner',
            'manager' => 'Manager',
            'karyawan'  => 'Karyawan'
        ];

        return $result;
    }
}

if ( ! function_exists('get_type_status_absen'))
{
    function get_type_status_absen()
    {
        $result = [
            'H' => 'Hadir',
            'S' => 'Sakit',
            'I' => 'Ijin',
            'C' => 'Cuti',
            'A' => 'Alpa'
        ];

        return $result;
    }
}

if ( ! function_exists('get_type_status_gaji'))
{
    function get_type_status_gaji()
    {
        $result = [
            'Y' => 'Disetujui',
            'N' => 'Tidak Disetujui'
        ];

        return $result;
    }
}

if ( ! function_exists('get_type_status_bayar'))
{
    function get_type_status_bayar()
    {
        $result = [
            'Y' => 'Sudah Dibayar',
            'N' => 'Belum Dibayar'
        ];

        return $result;
    }
}

if ( ! function_exists('get_status_gaji'))
{
    function get_status_gaji($code)
    {
       $result;
       switch($code)
       {    
           case "Y":
                $result = '<span class="label label-success">Disetujui</span>';
                break;
            case "N":
                $result = '<span class="label label-danger">Tidak Disetujui</span>';
                break;
            default: 
                $result =  '<span class="label label-info">Menugggu</span>';
                break;
       }

        return $result;
    }
}

if ( ! function_exists('get_status_absen'))
{
    function get_status_absen($code)
    {
       $result;
       switch($code)
       {    
           case "H":
                $result = '<span class="label label-success">Hadir</span>';
                break;
            case "S":
                $result = '<span class="label label-default">Sakit</span>';
                break;
            case "I": 
                $result = '<span class="label label-info">Ijin</span>';
                break;
            case "C": 
                $result =  '<span class="label label-warning">Cuti</span>';
                break;
            default: 
                $result =  '<span class="label label-danger">Alpa</span>';
                break;
       }

        return $result;
    }
}

if ( ! function_exists('get_ket_absen'))
{
    function get_ket_absen($time)
    {
        $time_default = date('H:i', strtotime('08:00:00'));
        $time_abs_in  = date('H:i', strtotime($time));
        $result = "Tapat Waktu";
        if($time_default < $time_abs_in)
        {
            
            $result = "Terlambat ";
        }
        return $result;
    }
}



