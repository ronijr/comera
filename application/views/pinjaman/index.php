<div class="layout-content-body">
    <div class="title-bar">
       
        <div class="title-bar-actions">
            <div class="btn-group dropdown">
                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
		            Actions
		            <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
		          </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="<?php echo base_url('pinjaman/create'); ?>">
                                <div class="media">
                                <div class="media-left">
                                    <span class="icon icon-plus icon-lg icon-fw"></span>
                                </div>
                                <div class="media-body">
                                    <span class="d-b">Transaksi Pinjaman</span>
                                </div>
                                </div>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
        <h1 class="title-bar-title">
            <span class="d-ib">Pinjaman Karyawan</span>
        </h1>
    </div>

    <?php if(!empty($this->session->flashdata('warning'))): ?>
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <span class="icon icon-info icon-lg"></span>&nbsp;
                <?php echo $this->session->flashdata('warning'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
    <div class="col-xs-12">
        <div class="panel">
        <div class="panel-body">
            <div class="table-responsive">
            <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nama</th>
                    <th>Kode Pinjaman</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Pinjaman</th>
                    <th>Sudah Bayar</th>
                    <th>Sisa Pinjaman</th>
                    <th>Keterangan</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($pinjaman as $row): ?>
                    <tr>
                        <td>
                            <div class="btn-group pull-left dropup">
                                <button class="btn btn-link link-muted" aria-haspopup="true" data-toggle="dropdown" type="button">
                                <span class="icon icon-ellipsis-v icon-lg icon-fw"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                <li><a onclick="delete_data('<?php echo $row->txj_id ?>', '<?php echo base_url('pinjaman/deleted'); ?>')">Hapus</a></li>
                                <li><a href="<?php echo base_url('pinjaman/update/'.$row->txj_id.''); ?>">Edit</a></li>
                                <li><a href="<?php echo base_url('pinjaman/pembayaran/'.$row->txj_id.''); ?>">Bayar</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <span class="icon-with-child m-r">
                                <img class="circle" width="36" height="36" src="<?php echo ($row->kry_image != "") ?  base_url(''.$row->kry_image.'') : base_url('assets/img/noimage-user.jpeg'); ?>">
                                <span class="icon-child bg-warning circle sq-8"></span>
                            </span>
                        </td>
                        <td>
                                        <strong><?php echo $row->kry_no; ?></strong>
                                        <br><?php echo $row->kry_nama;?> 
                                        <br><?php echo $row->kry_jabatan.'/'.$row->kry_dept_nama;?>
                        </td>
                        <td><?php echo $row->txj_code; ?>
                        <td><?php echo date('D, d F Y', strtotime($row->txj_tanggal_pinjam)); ?></td>
                        <td>Rp<?php echo number_format($row->txj_nilai_pinjam); ?></td>
                        <td>Rp<?php echo number_format($row->txj_nilai_bayar); ?></td>
                        <td>Rp<?php echo number_format($row->sisa_pinjaman); ?></td>
                        <td><?php echo $row->txj_deskripsi; ?></td>
                        <td><?php echo date('D, d F Y', strtotime($row->txj_jatuh_tempo)); ?></td>
                        <?php if($row->sisa_pinjaman == 0): ?>
                            <td><span class="label label-success">Lunas</span></td>
                        <?php else: ?>
                            <td><span class="label label-warning">Belum Lunas</span></td>
                        <?php endif; ?>
                      
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>