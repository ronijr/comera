<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Laporan Gaji Karyawan</title>
        <style>
            tr, td {
                padding:3px;
            }
        </style>
    </head>
<body>
    <h1 style="text-align:center">CV. COMERA</h1>
    <h3 style="text-align:center">LAPORAN GAJI KARYAWAN</h3>
    <table cellspacing="0" cellpadding="0" border="1" width="100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Departemen</th>
                <th>Kehadiran</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Lemburan</th>
                <th>Potongan</th>
                <th>Gaji Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $gaji_total = 0; ?>
            <?php foreach($penggajian as $row): ?>
                <?php
                     $txn_penggajian = $this->md_penggajian->get_txn_penggajian($row->txp_id)->result();
                     $gaji_total += $this->md_penggajian->gaji_total($row->kry_no, $tahun.'-'.$bulan.'-01')->result()[0]->gaji_total;
                ?>
                
                <tr>
                    <td><?php echo $row->kry_no; ?>
                    <td><?php echo $row->kry_nama; ?>
                    <td><?php echo $row->kry_jabatan; ?>
                    <td><?php echo $row->kry_dept_nama; ?>
                    <td><?php echo "Hadir : ".$row->hadir."<br> Sakit : ".$row->sakit."<br> Ijin : ".$row->ijin."<br> Alpa : ".$row->alpa."<br> Cuti : ".$row->cuti; ?>
                    <td><?php echo $tahun.'/'.$bulan; ?>
                    <td><?php echo ($row->txp_status == 'Y') ? 'Sudah Dibayar' : 'Belum Dibayar'; ?></td>
                    <td style="text-align:right;"><?php echo number_format($row->gaji_pokok); ?>
                    <td style="text-align:right;"><?php echo number_format($row->tunjangan); ?>
                    <td style="text-align:right;"><?php echo number_format($this->md_penggajian->gaji_total($row->kry_no, $tahun.'-'.$bulan.'-01')->result()[0]->total_lemburan); ?>
                    <td style="text-align:right;"><?php echo number_format($row->potongan); ?>
                    <td style="text-align:right;"><?php echo number_format($this->md_penggajian->gaji_total($row->kry_no, $tahun.'-'.$bulan.'-01')->result()[0]->gaji_total); ?>
                </tr>
                
            <?php endforeach; ?>
               
        </tbody>
        <tfoot>
                    <tr>
                        <td colspan="11">Sub Total</td>
                        <td style="text-align:right;"><?php echo number_format($gaji_total); ?></td>
                    </tr>
      </tfoot>
    </table>
</body>
</html>