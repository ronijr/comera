<div class="layout-content-body">
    <div class="title-bar">
        <?php if($this->session->userdata('data_user')[0]->usr_type == 'admin'): ?>
        <div class="title-bar-actions">
            <div class="btn-group dropdown">
                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
		            Actions
		            <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
		          </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="<?php echo base_url('absensi/create'); ?>">
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
        <?php endif; ?>
        <h1 class="title-bar-title">
            <span class="d-ib">Absensi Karyawan</span>
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
    <!-- <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    
                 </div>
             </div>
        </div>
    </div> -->
    <div class="row">
    <div class="col-xs-12">
        <div class="panel">
        <div class="panel-body">
            <div class="table-responsive">
            <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Lampiran</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($absensi as $row): ?>
                    <tr>
                        <td>
                            <span class="icon-with-child m-r">
                                <img class="circle" width="36" height="36" src="<?php echo ($row->kry_image != "") ?  base_url(''.$row->kry_image.'') : base_url('assets/img/noimage-user.jpeg'); ?>">
                                <span class="icon-child bg-warning circle sq-8"></span>
                            </span>
                            <strong><?php echo $row->kry_no; ?></strong>
                        </td>
                        <td><?php echo $row->kry_nama; ?></td>
                        <td><?php echo date('D, d M Y',strtotime($row->abs_tanggal)); ?></td>
                        <td><?php echo date('H:i',strtotime($row->abs_in)); ?></td>
                        <td><?php echo get_status_absen($row->abs_status); ?></td>
                        <td><?php echo get_ket_absen($row->abs_in); ?></td>
                        <td><?php echo ($row->abs_dokumen == "") ? '-' : '<a href="'.base_url($row->abs_dokumen).'" target="_blank">File</a>'; ?></td>
                        <td>
                            <div class="btn-group pull-right dropup">
                                <button class="btn btn-link link-muted" aria-haspopup="true" data-toggle="dropdown" type="button">
                                <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                <!-- <li><a onclick="#">Hapus</a></li> -->
                                <?php if($this->session->userdata('data_user')[0]->usr_type != 'karyawan'): ?>
                                <li><a href="<?php echo base_url('absensi/update/'.$row->abs_id.'') ;?>">Edit</a></li>
                                <?php else: ?>
                                <li><a href="<?php echo base_url('absensi/update/'.$row->abs_id.'') ;?>">Lihat</a></li>
                                <?php endif; ?>
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