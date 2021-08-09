<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Laporan Absensi Karyawan</title>
        <style>
            tr, td {
                padding:3px;
            }
        </style>
    </head>
<body>
    <h1 style="text-align:center">CV. COMERA</h1>
    <h3 style="text-align:center">LAPORAN ABSENSI KARYAWAN</h3>
    <table cellspacing="0" cellpadding="0" border="1" width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>User ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Departemen</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Ijin</th>
                <th>Alpa</th>
                <th>Cuti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($absensi as $row): ?>
                <tr>
                    <td><?php echo $row->abs_tanggal; ?></td>
                    <td><?php echo $row->kry_no; ?></td>
                    <td><?php echo $row->kry_nama; ?></td>
                    <td><?php echo $row->kry_jabatan; ?></td>
                    <td><?php echo $row->kry_dept_nama; ?></td>
                    <td style="text-align:right;"><?php echo $row->hadir; ?></td>
                    <td style="text-align:right;"><?php echo $row->sakit; ?></td>
                    <td style="text-align:right;"><?php echo $row->ijin; ?></td>
                    <td style="text-align:right;"><?php echo $row->alpa; ?></td>
                    <td style="text-align:right;"><?php echo $row->cuti; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>