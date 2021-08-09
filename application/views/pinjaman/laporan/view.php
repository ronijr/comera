<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Laporan Pinjaman Karyawan</title>
        <style>
            tr, td {
                padding:3px;
            }
        </style>
    </head>
<body>
    <h1 style="text-align:center">CV. COMERA</h1>
    <h3 style="text-align:center">LAPORAN PINJAMAN KARYAWAN</h3>
    <?php foreach($pinjaman as $row): ?>
        <table cellspacing="0" cellpadding="0" border="0" >
            <tbody>
                <tr>
                    <td>Transaksi No</td>
                    <td>:</td>
                    <td><?php echo $row->txj_code; ?></td>
                </tr>
                <tr>
                    <td>User ID</td>
                    <td>:</td>
                    <td><?php echo $row->kry_no; ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $row->kry_nama; ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?php echo $row->kry_jabatan; ?></td>
                </tr>
                <tr>
                    <td>Departemen</td>
                    <td>:</td>
                    <td><?php echo $row->kry_dept_nama; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pinjam</td>
                    <td>:</td>
                    <td><?php echo $row->txj_tanggal_pinjam; ?></td>
                </tr>
                <tr>
                    <td>Jatuh Tempo</td>
                    <td>:</td>
                    <td><?php echo $row->txj_jatuh_tempo; ?></td>
                </tr>
                <tr>
                    <td>Nilai Pinjaman</td>
                    <td>:</td>
                    <td>Rp<?php echo number_format($row->txj_nilai_pinjam); ?></td>
                </tr>
            </tbody>
        </table>
        <h3>Riwayat Pembayaran</h3>
        <hr>
        <table cellspacing="0" cellpadding="0" border="1" width="100%">
            <thead>
                <tr>
                    <th>Transaksi No</th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Tanggal Bayar</th>
                    <th>Nilai Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_bayar = 0; $transaksi_bayar = $this->md_pinjaman->get_by_pembayaran($row->txj_id)->result(); ?>
                <?php foreach($transaksi_bayar as $child): ?>
                    <?php $total_bayar += $child->txj_nilai_bayar; ?>
                <tr>
                    <td><?php echo $child->txj_code; ?> </td>
                    <td><?php echo $child->kry_no; ?> </td>
                    <td><?php echo $child->kry_nama; ?> </td>
                    <td><?php echo $child->txj_tanggal_bayar; ?> </td>
                    <td><?php echo number_format($child->txj_nilai_bayar); ?> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total</td>
                    <td><?php echo number_format($total_bayar); ?></td>
                </tr>
            </tfoot>
        </table>
        <br>
    <?php endforeach; ?>
</body>
</html>