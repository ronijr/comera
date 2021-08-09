<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Slip Gaji Karyawan</title>
        <style>
            tr, td {
                padding:3px;
            }
        </style>
    </head>
<body>
    <h1 style="text-align:center">CV. COMERA</h1>
    <h3 style="text-align:center">SLIP GAJI</h3>
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tbody>
            <tr>
                <td>Periode</td>
                <td>:</td>
                <td><?php echo date('Y-m',strtotime($penggajian[0]->txp_periode)); ?></td>
            </tr>
            <tr>
                <td>User ID</td>
                <td>:</td>
                <td><?php echo $karyawan[0]->kry_no; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $karyawan[0]->kry_nama; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $karyawan[0]->kry_jabatan; ?></td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>:</td>
                <td><?php echo $karyawan[0]->kry_dept_nama; ?></td>
            </tr>
            <tr>
                <td>No Rekening</td>
                <td>:</td>
                <td><?php echo $karyawan[0]->kry_bank." ".$karyawan[0]->kry_no_rekening."A/n ".$karyawan[0]->kry_nama_rekening; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
        <table cellspacing="0" cellpadding="0" border="0" style="margin:auto 0;" width="100%"> 
            <tbody>
                <tr>
                    <td>Total Gaji Pokok</td>
                    <td>:</td>
                    <td>Rp<?php echo number_format($karyawan[0]->pg_gaji_pokok); ?></td>
                </tr>
                <tr>
                    <td>Tunjangan</td>
                    <td>:</td>
                    <td>Rp<?php echo number_format($gaji_total[0]->total_tunjangan); ?></td>
                </tr>
                <tr>
                    <td>Lemburan</td>
                    <td>:</td>
                    <td>Rp<?php echo number_format($gaji_total[0]->total_lemburan); ?></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Total Gaji</td>
                    <td style="font-weight:bold;">:</td>
                    <td style="font-weight:bold;">Rp<?php echo number_format($gaji_total[0]->total_lemburan + $karyawan[0]->pg_gaji_pokok + $gaji_total[0]->total_tunjangan); ?></td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                <tr>
                    <td>Potongan/Pinjaman/Cashbon</td>
                    <td>:</td>
                    <td>- Rp<?php echo number_format($gaji_total[0]->total_potongan); ?></td>
                </tr>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                <tr>
                    <td style="font-weight:bold;">Total Gaji Diterima</td>
                    <td style="font-weight:bold;">:</td>
                    <td style="font-weight:bold;">Rp<?php echo number_format($gaji_total[0]->gaji_total); ?></td>
                </tr>
            </tbody>
        </table>
</body>
</html>