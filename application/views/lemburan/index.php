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
                            <a href="<?php echo base_url('lemburan/create'); ?>">
                                <div class="media">
                                <div class="media-left">
                                    <span class="icon icon-plus icon-lg icon-fw"></span>
                                </div>
                                <div class="media-body">
                                    <span class="d-b">Tambah Data</span>
                                </div>
                                </div>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
        <h1 class="title-bar-title">
            <span class="d-ib">Data Lemburan</span>
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
                    <th>Nama</th>
                    <th>Tanggal Lembur</th>
                    <th>Dari Jam</th>
                    <th>Sampai Jam</th>
                    <th>Jam</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                   <?php foreach($lemburan as $row): ?>
                    <tr>
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
                        <td><?php echo $row->lbr_tanggal; ?>
                        <td><?php echo $row->lbr_jam_mulai; ?></td>
                        <td><?php echo $row->lbr_jam_selesai; ?></td>
                        <td><?php echo $row->lbr_qty; ?> Jam</td>
                        <td><?php echo $row->lbr_deskripsi; ?> </td>
                        <td>
                            <div class="btn-group pull-right dropup">
                                <button class="btn btn-link link-muted" aria-haspopup="true" data-toggle="dropdown" type="button">
                                <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                <li><a onclick="delete_data('<?php echo $row->lbr_id ?>', '<?php echo base_url('lemburan/deleted'); ?>')">Hapus</a></li>
                                <li><a href="<?php echo base_url('lemburan/update/'.$row->lbr_id.'') ?>">Edit</a></li>
                                </ul>
                            </div>
                        </td>
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